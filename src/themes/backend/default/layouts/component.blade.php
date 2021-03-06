<!DOCTYPE html>
<html>
<head>
    @include('system.meta')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    {{ Asset::css() }}
    <link rel="stylesheet" href="{{asset('themes/admin-lte/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/admin-lte/css/skins/skin-'.config('site.admin_theme').'.css')}}">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/datatables.css')}}" rel="stylesheet">
    @stack('styles')
    <style>
        body {
            margin-top: 20px;
            background: #ecf0f5;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue @yield('body')">
    <div class="container">
        @yield('content')
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        type="text/javascript"></script>
{{ Asset::js() }}
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('js/dt-filter-placeholder.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}" type="text/javascript"></script>
<script src="{{asset('themes/admin-lte/js/app.min.js')}}"></script>
@stack('js-plugins')
@stack('scripts')
@include('system.sweetalert')
</body>
</html>
