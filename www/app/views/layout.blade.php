<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-theme.min.css')}}
    {{HTML::style('src/bootstrap/css/datepicker.css')}}
    @yield('morestyle')
</head>
<body>
    <div class="supercontainer">
        <div class=" body">
            @if(Session::has('message'))
            <div class="bg-danger text-center">{{Session::get('message')}}</div>
            @endif
            @yield('body')
        </div>
    </div>
</body>
</html>
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('src/bootstrap/js/bootstrap-datepicker.js')}}
@yield('jscript')

