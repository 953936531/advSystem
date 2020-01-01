<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stu;
use Illuminate\Support\Facades\Storage;
class StuController extends Controller
{   
     protected $rule = [
            'name'=>'required',
            'age'=>'required|numeric|between:18,35',
            'sex'=>'required',
            'class'=>'required',
        ]; 
    protected $message = [
            'name.required'=>'姓名必填',
            'age.required'=>'年龄必填',
            'sex.required'=>'性别必填',
            'class.required'=>'班级必填',
            'age.between'=>'年龄必须在18~35之间',
            'age.numeric'=>'年龄必须为数字',
        ]; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $where = [];
        $search = [];
        if ($request->filled('name')) {
            $where[] = ['name','like','%'.$request->name.'%'];
            $search['name'] = $request->name;
        }
        if ($request->filled('sex')) {
            $where[] = ['sex','=',$request->sex];
            $search['sex'] = $request->sex;
        }
        $stus=Stu::where($where)->orderby('id','desc')->paginate(2);
        return view('stus.zhan',['stus'=>$stus,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stus.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $path='';
        $path = $this->upload($request,'head_img');//初始化图片路径
        $this->validate($request,$this->rule,$this->message);
        $data=$request->only(['name','age','sex','class']);
        $data['head_img']=$path;

        $stus=Stu::create($data);
        if($stus){
            return redirect('stus')->with('info','添加成功');
        }

        return back()->with('info','添加失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {   
       $stus = Stu::find($id);
       return view('stus.edit',['stus'=>$stus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     
         $path = $this->upload($request,'head_img');
         $data = $request->only(['name','age','sex','class']);
         $stus = Stu::findOrFail($id);
         if($path!=''){
             $data['head_img'] = $path;
         }
        
         $this->validate($request,$this->rule,$this->message);
         $res = Stu::where('id',$stus->id)->update($data);

         //删除图片
        if (isset($data['head_img']) && !empty($stus->head_img)) {
            Storage::disk('public')->delete($stus->head_img);
        }

        return redirect('/stus')->with('info','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stus = Stu::findOrFail($id);

           if(!empty($stus->head_img)){
                    Storage::disk('public')->delete($stus->head_img);
             }

        $num = $stus->delete();
     
        if($num){
            return redirect('stus')->with('info','删除成功');
        }
        return back()->with('info','删除失败');
    }
}
