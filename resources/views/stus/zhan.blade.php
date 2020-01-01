@extends('gonglist.list')

@section('x-body')
<div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/stus" method="get">
          <div class="layui-inline">
          <input class="layui-input" placeholder="姓名" name="name" id="start" value="@if(isset($search['name'])){{$search['name']}}@endif">
          </div>
          <div class="layui-inline">
             <select name="sex" >
                <option value="">请选择性别</option>
                <option value="1">男</option>
                <option value="2">女</option>
                <option value="3">保密</option> 
              </select>   
          </div>
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <a class="layui-btn" href="/stus/create"><i class="layui-icon"></i>添加</a>
        <span class="x-right" style="line-height:40px">共有数据：{{$stus->total()}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th> 
            <th>ID</th>
            <th>姓名</th>
            <th>一寸照</th>
            <th>性别</th>
            <th>年龄</th>
            <th>班级</th>
            <th>操作</th>
        </thead>
        <tbody>
        @foreach($stus as $stu)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$stu->id}}</td>
            <td>{{$stu->name}}</td>
             <td><img src="/storage/{{$stu->head_img}}" title="一寸照片" alt="11"></td>
          
            <td>
            @if($stu->sex==1)男
            @elseif($stu->sex==2)女
            @elseif($stu->sex==3)保密
            @endif
            </td>
            <td>{{$stu->age}}</td>
            <td>{{$stu->class}}</td>
            
            <td class="td-manage">
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">
                <i class="layui-icon">&#xe601;</i>
              </a>
              <a title="编辑"  href="/stus/{{$stu->id}}/edit">
                <i class="layui-icon">&#xe642;</i>
              </a>

              <form action="/stus/{{$stu->id}}" method="post">
                  {{method_field('DELETE')}}
                  {{csrf_field()}}
                   <button class="layui-btn layui-btn-xs layui-btn-danger"><i class="layui-icon" style="font-size: 15px;">&#xe640;</i></button>
              </form>
            </td>

          </tr>
        @endforeach
        </tbody>
      </table>
     <div class="page">
      {{ $stus->appends($search)->links() }}
     </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
	layui.use('layer', function(){
		var layer = layui.layer;
		  
	 	@if(session('info'))
		layer.alert("{{session('info')}}", {icon: 1});
		@endif	
	}); 
		
 
</script>
@endsection 
