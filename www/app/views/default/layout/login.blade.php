<!DOCTYPE html>
<html lang="en-us" data-ng-app="smartApp" id="extr-page">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <title> MIS - Medical Infomation System - DFCK - Hệ thống thông tin y tế DFCK </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    {{HTML::style('src/smartadmin/css/bootstrap.min.css')}}
    {{HTML::style('src/smartadmin/css/font-awesome.min.css')}}

    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    {{HTML::style('src/smartadmin/css/smartadmin-production.min.css')}}
    {{HTML::style('src/smartadmin/css/smartadmin-skins.min.css')}}

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{URL::to('src/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::to('src/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700&subset=vietnamese">
    <!--    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,100,900,700,700italic&subset=vietnamese' rel='stylesheet' type='text/css'>-->

    <!-- Startup image for web apps -->
    <!--    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">-->
    <!--    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">-->
    <!--    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">-->

</head>
<body class="animated fadeInDown" data-ng-controller="SmartAppController">
<header id="header">
    <div id="logo-group">
        <span id="logo"> <img src="{{URL::to('src/smartadmin/img/logo.png')}}" alt="SmartAdmin"> </span>
    </div>
    <span id="extr-page-header-space"> <span class="hidden-mobile">Chưa có tài khoản? Liên hệ Phòng IT 090 9999 999</span> </span>
</header>
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">DFCK MIS - HỆ THỐNG THÔNG TIN Y TẾ</h1>
                <div class="hero" style="background: none;position: relative">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">Hệ thống quản lý bệnh viện toàn diện</h4>
                        <div class="login-app-icons">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">Tìm hiểu về IAMI DFCK</a>
                        </div>
                    </div>
                    <img src="{{URL::to('public/logindoctor.png')}}" class="pull-right display-image" alt="" style="width:400px;position: absolute;right:0;top:65px;">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">DFCK là gì?</h5>
                        <p>
                            DFCK - Phòng Công nghệ Tính Toán và Công Nghệ Tri Thức.<br> Viện Cơ Học và Tin học ứng dụng.<br> Viện Hàn Lâm Khoa học Công Nghệ Việt Nam
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">DFCK MIS &copy DFCK {{date("Y")}}</h5>
                        <p>

                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    <form action="login" method="post" id="login-form" class="smart-form client-form">
                        <input type="hidden" name="_token" value="{{Session::get('_token')}}">
                        <header>
                            Đăng nhập hệ thống
                        </header>

                        <fieldset>
                            @if(Session::has('message'))
                            <p class="alert alert-danger">{{Session::get('message')}}</p>
                            @endif
                            <section>
                                <label class="label">Tài khoản</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="text" name="username">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Nhập tên đăng nhập</b></label>
                            </section>

                            <section>
                                <label class="label">Mật khẩu</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Nhập mật khẩu</b> </label>
                                <div class="note">
                                    <a href="#">Quên mật khẩu? Liên hệ IT 090 999 9999</a>
                                </div>
                            </section>

<!--                            <section>-->
<!--                                <label class="checkbox">-->
<!--                                    <input type="checkbox" name="remember" checked="">-->
<!--                                    <i></i>Lưu đăng nhập</label>-->
<!--                            </section>-->
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Đăng nhập
                            </button>
                        </footer>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

{{HTML::script('src/smartadmin/js/libs/jquery-2.0.2.min.js')}}
{{HTML::script('src/smartadmin/js/libs/jquery-ui-1.10.3.min.js')}}

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
{{HTML::script('src/smartadmin/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}

<!-- BOOTSTRAP JS -->
{{HTML::script('src/smartadmin/js/bootstrap/bootstrap.min.js')}}

<!-- JQUERY VALIDATE -->
{{HTML::script('src/smartadmin/js/plugin/jquery-validate/jquery.validate.min.js')}}

<!-- browser msie issue fix -->
{{HTML::script('src/smartadmin/js/plugin/msie-fix/jquery.mb.browser.min.js')}}

<!--[if IE 8]>
<h1>Trình duyệt đã quá cũ, vui lòng cập nhật tại www.microsoft.com/download</h1>
<![endif]-->


<script type="text/javascript">


    $(function() {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules : {
                username : {
                    required : true
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                }
            },

            // Messages for form validation
            messages : {
                username : {
                    required : 'Chưa nhập tên đăng nhập'
                },
                password : {
                    required : 'Chưa nhập mật khẩu'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>


</body>

</html>

