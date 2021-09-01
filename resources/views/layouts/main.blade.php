<!DOCTYPE html>

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Backstrap - Open Source Bootstrap 4 Admin Template on top of CoreUI">
    <meta name="author" content="Cristian Tabacitu">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard,CoreUI">
    <title>BackStrap - Free Bootstrap 4 Admin Template</title>
    <!-- Icons-->
    <link href="{{ mix('css/app.min.css') }}" rel="stylesheet"/>
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <!-- Main styles for this application-->

    @yield('stylesheets')
</head>
<body class="app aside-menu-fixed sidebar-lg-show">
    @include(('partials.header'))

    <div class="app-body">
        @include('partials.sidebar')

        @yield('content')

{{--        @include('partials.aside')--}}
    </div>
<!-- CoreUI and necessary plugins-->
<script src="{{ mix('js/app.js') }}"></script>


@yield('scripts')
</body>
</html>
