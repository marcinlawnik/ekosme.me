<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @yield('head')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @include('analytics')
    </body>
</html>
