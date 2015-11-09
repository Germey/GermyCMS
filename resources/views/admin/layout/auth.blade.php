<!DOCTYPE html>
<html>
    <head>
        <title>GermyCMS Auth</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/matrix-login.css') }}"/>
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/matrix.login.js') }}"></script>
    </body>

</html>
