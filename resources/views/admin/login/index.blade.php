<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登录</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .login-box{
            position: absolute;
            top: 30%;
            left: 50%;
            -webkit-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
        .has-feedback .form-control {
            padding-left: 42.5px !important;
        }
        .form-horizontal .has-feedback .form-control-feedback {
            left: 5px !important;
        }
    </style>
</head>
<body class="hold-transition login-page" style="background: #16a085">
<div id="particles" style="background-image: url({$bg});">
</div>
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)" style="color:#fff"><b>CraspHB彬</b>blog</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">使用快速开发的后台管理框架</p>
        <form class="form-horizontal ajaxForm" action="{{ route('login.login') }}" method="post">
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <input type="text" class="form-control" name="email" autocomplete="false" placeholder="请输入用户名">
               {{ csrf_field() }}
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password"  autocomplete="false" placeholder="请输入密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <label>
                        <input type="checkbox" name="remember"> 记住密码
                    </label>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.particleground.min.js"></script>
<!-- iCheck -->
<script src="/admin/plugins/iCheck/icheck.min.js"></script>
<script src="/admin/js/jquery.form.js"></script>
<script src="/layui/layui.js"></script>
<script src="/admin/js/cms.js"></script>
<script>
    $(function () {
        $('#particles').particleground({
            dotColor: '#ff9800',
            lineColor: '#ff9800'
        });
    });
</script>
</body>
</html>
