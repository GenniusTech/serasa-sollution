<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('serasa/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('serasa/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('serasa/css/style.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('serasa/img/logo.png') }}">
        <title>Grupo Sollution - Serasa</title>
    </head>
    <body>

        @yield('conteudo')

        <script src="{{ asset('serasa/js/main.js') }}"></script>
        <script src="{{ asset('serasa/js/tabs.js') }}"></script>
    </body>
</html>