@extends('gonglist.list')

@section('x-body')
<div class="x-body"> 
        <form class="layui-form" action="/stus" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="layui-form-item">
              <label for="name" class="layui-form-label">
                  <span class="x-red">*</span>姓名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="name" name="name" 
                  autocomplete="off" class="layui-input" value="{{old('name')}}">
              </div>
              <div class="layui-form-mid layui-word-aux" >
                @if($errors->has('name'))
                 <span class="x-red">*{{$errors->first('name')}}</span> 
                @endif
                  
              </div>
          </div> 
          <div class="layui-form-item">
              <label for="head_img" class="layui-form-label">
                  <span class="x-red">*</span>一寸照
              </label>
              <div class="layui-input-inline">
                  <input type="file" id="head_img" name="head_img" 
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>将会成为您唯一的登入名
              </div>
          </div>
          <div class="layui-form-item">
              <label for="age" class="layui-form-label">
                  <span class="x-red">*</span>年龄
              </label>
              <div class="layui-input-inline">
                  <input type="number" id="age" name="age" 
                  autocomplete="off" class="layui-input" value="{{old('age')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">
                   @if($errors->has('age'))
                   <span class="x-red">*{{$errors->first('age')}}</span> 
                  @endif
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>性别</label>
              <div class="layui-input-block">
                <input type="radio" name="sex" lay-skin="primary" value="1" title="男">
                <input type="radio" name="sex" lay-skin="primary" value="2" title="女">
                <input type="radio" name="sex" lay-skin="primary" value="3" title="保密"  checked>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="class" class="layui-form-label">
                  <span class="x-red">*</span>班级
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="class" name="class" 
                  autocomplete="off" class="layui-input" value="{{old('class')}}">
              </div>
              
          </div>
          <div class="layui-form-item">
             @if (count($errors) > 0)
              <label class="layui-form-label" style="color: red;">错误信息:
              </label>
                  <div style="color: red;">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <a  class="layui-btn layui-btn-danger" href="/astus">
                  返回
              </a>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
              
          </div>

      </form>
    </div>
@endsection