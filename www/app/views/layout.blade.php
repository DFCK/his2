<!DOCTYPE html>
<html lang="en-us" data-ng-app="smartApp">
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

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
    {{HTML::style('src/smartadmin/css/my_style.css')}}
    {{HTML::style('src/js/autocomplete.css')}}
    {{HTML::style('src/js/ngProgress.css')}}

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->

<!--    <link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">-->

    <!-- Angular Related CSS -->
    {{HTML::style('src/smartadmin/css/ng.min.css')}}

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{URL::to('src/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::to('src/smartadmin/img/favicon/favicon.ico')}}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700&subset=vietnamese">
<!--    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,100,900,700,700italic&subset=vietnamese' rel='stylesheet' type='text/css'>-->

<!-- Specifying a Webpage Icon for Web Clip
     Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
<!--    <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">-->
<!--    <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">-->
<!--    <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">-->
<!--    <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">-->

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
<!--    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">-->
<!--    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">-->
<!--    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">-->

</head>
<body class="smart-style-0 fixed-header" data-ng-controller="SmartAppController">
<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width, top-menu
     You can also add different skin classes such as "smart-skin-0", "smart-skin-1" etc...-->


@yield('body')

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

{{HTML::script('src/smartadmin/js/libs/jquery-2.0.2.min.js')}}
{{HTML::script('src/smartadmin/js/libs/jquery-ui-1.10.3.min.js')}}

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
{{HTML::script('src/smartadmin/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}

<!-- BOOTSTRAP JS -->
{{HTML::script('src/smartadmin/js/bootstrap/bootstrap.min.js')}}

{{HTML::script('src/smartadmin/js/bootstrap/bootstrap.min.js')}}

<!-- CUSTOM NOTIFICATION -->
{{HTML::script('src/smartadmin/js/notification/SmartNotification.min.js')}}

<!-- JARVIS WIDGETS -->
{{HTML::script('src/smartadmin/js/smartwidgets/jarvis.widget.min.js')}}

<!-- EASY PIE CHARTS -->
{{HTML::script('src/smartadmin/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')}}

<!-- SPARKLINES -->
{{HTML::script('src/smartadmin/js/plugin/sparkline/jquery.sparkline.min.js')}}

<!-- JQUERY VALIDATE -->
{{HTML::script('src/smartadmin/js/plugin/jquery-validate/jquery.validate.min.js')}}

<!-- JQUERY MASKED INPUT -->
{{HTML::script('src/smartadmin/js/plugin/masked-input/jquery.maskedinput.min.js')}}

<!-- JQUERY SELECT2 INPUT -->
{{HTML::script('src/smartadmin/js/plugin/select2/select2.min.js')}}

<!-- JQUERY UI + Bootstrap Slider -->
<!--{{HTML::script('src/smartadmin/js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}-->

<!-- browser msie issue fix -->
{{HTML::script('src/smartadmin/js/plugin/msie-fix/jquery.mb.browser.min.js')}}

<!-- FastClick: For mobile devices: you can disable this in app.js -->
{{HTML::script('src/smartadmin/js/plugin/fastclick/fastclick.min.js')}}

<!--[if IE 8]>
<h1>Trình duyệt đã quá cũ, vui lòng cập nhật tại www.microsoft.com/download</h1>
<![endif]-->

<!-- AngularJS -->
{{HTML::script('src/smartadmin/js/libs/angular/angular.js')}}
{{HTML::script('src/smartadmin/js/libs/angular/angular-route.js')}}
{{HTML::script('src/smartadmin/js/libs/angular/angular-animate.js')}}
{{HTML::script('src/smartadmin/js/libs/angular/ui-bootstrap-custom-tpls-0.11.0.js')}}

<!-- Demo purpose only
ANGULAR: Handled via "ribbon" directive
<script src="js/demo.js"></script>-->
<!--{{HTML::script('src/smartadmin/js/demo.js')}}-->

<!-- MAIN APP JS FILE -->
{{HTML::script('src/smartadmin/js/app.js')}}

<!-- MAIN ANGULAR JS FILE -->
{{HTML::script('src/smartadmin/js/ng/ng.app.js')}}
{{HTML::script('src/smartadmin/js/ng/ng.controllers.js')}}
{{HTML::script('src/smartadmin/js/ng/ng.directives.js')}}


<!-- PLUNKER -->
{{HTML::script('src/smartadmin/js/ng/plunker.js')}}

<!-- MORE SCRIPT -->
{{HTML::script('src/ui-utils.min.js')}}
{{HTML::script('src/js/myscript.js')}}
{{HTML::script('src/js/autocomplete.js')}}
{{HTML::script('src/js/ngProgress.min.js')}}
{{HTML::script('src/js/ngDraggable.js')}}

@yield('jscript')

<!--<!-- Your GOOGLE ANALYTICS CODE Below -->
<!--		<script type="text/javascript">-->
<!---->
<!--		  var _gaq = _gaq || [];-->
<!--          _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);-->
<!--          _gaq.push(['_trackPageview']);-->
<!---->
<!--          (function() {-->
<!--              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;-->
<!--              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';-->
<!--              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);-->
<!--          })();-->
<!---->
<!--		</script>-->

</body>

</html>

