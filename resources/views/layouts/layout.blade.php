<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <title>TEST</title>
{{--    <embed src="/music/music.mp3?t=44444" hidden="false" autostart="true" loop="infinite">--}}
{{--    <link rel="stylesheet" href="/js/bootstrap/css/bootstrap.css">--}}

    @yield('css')
</head>
<body>
@yield('content')
</body>
</html>
<script src="/js/vendor/jquery.min.js"></script>
{{--<script src="/js/bootstrap/js/bootstrap.js"></script>--}}

{{--<script src="/js/bootstrap/js/bootstrap.min.js"></script>--}}

@yield('script')
