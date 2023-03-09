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

        <style>
            @media print {
                .myDivToPrint {
                    background-color: white;
                    height: 100%;
                    width: 100%;
                    position: fixed;
                    top: 0;
                    left: 0;
                    margin: 0;
                    padding: 15px;
                    font-size: 14px;
                    line-height: 18px;
                    z-index: 9999 !important;
                }
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('serasa/js/jquery.js') }}"></script>

    </head>
    <body>

        <header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="assets/img/logosolution.png" alt="">
                </a>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li>
                            <a href="/painel">Dashboard</a>
                        </li>
                        <!--<li>
                            <a href="consulta.html">Consultas</a>
                        </li>-->
                        <!--<li>
                            <a href="credito.html">Crédito</a>
                        </li>-->
                        @if ($tipo === 1)
                        <li>
                            <a href="{{ route('usuarios') }}">Usuários</a>
                        </li>

                        @endif
                        <li class="dropdown">

                            <a href="#">
                                <span>Minha conta</span>
                                <i class="bi bi-chevron-down dropdown-indicator"></i>
                            </a>
                            <ul>
                                <!--<li>
                                    <a href="perfil.html">Meu Perfil</a>
                                </li>
                                <li>
                                    <a href="#">Configurações</a>
                                </li>-->
                                <li>
                                    <a href="{{ route('logout') }}">Sair</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            </div>
        </header>

        <section>
            @yield('conteudo')
        </section>

        <script src="{{ asset('serasa/js/main.js') }}"></script>
        <script src="{{ asset('serasa/js/tabs.js') }}"></script>
    </body>
</html>
