<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="/update/admin/css/font.css">
  <link rel="stylesheet" href="/update/admin/css/xadmin.css">
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/update/admin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/update/admin/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">x-admin2.0-管理登陆</div>
        <div id="darkbannerwrap"></div>
        <div>
          <a  href="{{ route('login') }}"><<返回去登陆</a>
          <a class="x-right" href="{{ route('register') }}">去注册>></a>
        </div>
        <hr class="hr15">
        <form method="post" class="layui-form"  >
            <input name="email" placeholder="邮箱"  type="text"  class="layui-input" lay-verify="required|email" >
            <hr class="hr15">
            <input value="发送邮件" lay-submit lay-filter="sendEmail" style="width:100%;" type="submit">
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

    //监听提交
    form.on('submit(sendEmail)', function(data){
     alert(111);
      $.ajax({

          type: "POST",
          url: "{{ route('password.email') }}",
          data: data.field,
          dataType: 'json',
          success: function(msg){
            layer.msg(msg.message, {icon: 6,anim:6,time: 2000});
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
