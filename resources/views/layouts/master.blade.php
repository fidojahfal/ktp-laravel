<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    @include("layouts.navbar")
    @include("layouts.header")
    <div class="page-content">
        @include("layouts.sidebar")
        @yield("content");
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>