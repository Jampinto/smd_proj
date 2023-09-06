<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de utente</title>
    @include('userbar')
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">
    <script src="{{asset('assets/bootstrap/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
</head>
<body>

    @yield('content')
    <script src="{{asset('assets/bootstrap/js_bootstrap.bundle.min.js')}}"></script>
    
</body>
</html>