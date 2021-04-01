<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Management System</title>
        <link href="{{ asset('css/bootstarp.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script
        src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

    </head>
    <body>
        <div class="container">
        @yield('main')
        @yield('script')
        </div>
    </body>
</html>
