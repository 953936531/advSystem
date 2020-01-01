<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台注册-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./update/admin/css/font.css">
    <link rel="stylesheet" href="./update/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./update/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./update/admin/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">x-admin2.0-管理注册</div>
        <div id="darkbannerwrap"></div>
        <div>
          <a href="{{ route('login') }}"><<返回登陆</a>
        </div>
        <hr class="hr15">
        <form method="post" class="layui-form"  >
            <input name="name" placeholder="用户名"  type="text"  class="layui-input" lay-verify="required|name" >
            <hr class="hr15">
            <input name="email" placeholder="邮箱"  type="text"  class="layui-input" lay-verify="required|email" >
            <hr class="hr15">
            <input name="password"  placeholder="密码"  type="password" class="layui-input" lay-verify="required|pass">
            <hr class="hr15">
            <input name="password_confirmation"  placeholder="重复密码"  type="password" class="layui-input" lay-verify="repass">
            <hr class="hr15">
            <input value="注册" lay-submit lay-filter="register" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

  <script>
  layui.use(['jquery','form'], function(){
    var $ = layui.$ //重点处
    var form = layui.form;
    //ajax提交 添加csrf验证
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    //表单验证
    form.verify({
      name: function(value, item){ //value：表单的值、item：表单的DOM对象
        if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
          return '用户名不能有特殊字符';
        }
        if(/(^\_)|(\__)|(\_+$)/.test(value)){
          return '用户名首尾不能出现下划线\'_\'';
        }
        if(/^\d+$/.test(value)){
          return '用户名不能全为数字';
        }
      }
      //我们既支持上述函数式的方式，也支持下述数组的形式
      //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
      ,pass: [
        /^[\S]{6,12}$/
        ,'密码必须6到12位，且不能出现空格'
      ]
      ,repass:function(value,item){
        var pass = $(item).prev().prev().val();
        if (value!==pass) {
          return '两次密码不一致';
        }   
      }
    });   
    //监听提交
    form.on('submit(register)', function(data){
      $.ajax({
          type: "POST",
          url: "{{ route('register') }}",
          data: data.field,
          dataType: 'json',
          success: function(msg){
            layer.msg(msg.message, {icon: 6,anim:6,time: 1000}, function(){
              //重定向
              // location.href=msg.redirectPath
              $(location).attr('href', msg.redirectPath);
            });
          },
          error:function(XMLHttpRequest){
            var errorData = $.parseJSON(XMLHttpRequest.responseText).errors;
            $.each( errorData, function(i, n){
              layer.msg(n[0], {icon: 5,anim:6});
              return ;
            }); 
          }
      });
      return false;
    });
  });


        
    </script>

</body>
</html>