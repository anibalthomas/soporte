<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="/material2/img/apple-icon.png" /> --}}
    {{-- <link rel="icon" type="image/png" href="/material2/img/favicon.png" /> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HELPDESK</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/material2/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/material2/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/material2/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="/material2/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    HelpDesk
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
                        <a href="{{ route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="{{ request()->is('solicitud/create') ? 'active' : '' }}">
                        <a href="{{ route('solicitud')}}">
                            <i class="material-icons">create</i>
                            <p>Crear Solicitud</p>
                        </a>
                    </li>
                  @if (auth()->user()->role === 'admin' or auth()->user()->role === 'secretario')
                    <li class="{{ request()->is('solicitud') ? 'active' : '' }}">
                        <a href="{{ route('lista')}}">
                            <i class="material-icons">content_paste</i>
                            <p>Lista de Actividades</p>
                        </a>
                    </li>
                  @endif
                  <li class="{{ request()->is('solicitud/turno') ? 'active' : '' }}">
                    <a href="{{ route('turno')}}">
                      <i class="material-icons">watch_later</i>
                      <p>Turno</p>
                    </a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        @yield('header')


                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                              @if (auth()->user()->role === 'admin')
                                @if ($noti >= 1)

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">{{$noti}}</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                              @endif
                              @endif

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('lista')}}">Hay {{$noti}} solicitudes pendientes</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="#">{{ Auth::user()->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
                {{-- INICIO --}}
      <div class="content" >
        <div class="container-fluid" >
            @yield('content')
        </div>
      </div>

{{-- FINAL --}}

            <footer class="footer">
                <div class="container-fluid">

                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
  @stack('scripts')
{{-- <script src="/material2/js/jquery-3.2.1.min.js" type="text/javascript"></script> --}}
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> --}}
<script src="/material2/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/material2/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
{{-- <script src="/material2/js/chartist.min.js"></script> --}}
<!--  Dynamic Elements plugin -->
<script src="/material2/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="/material2/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/material2/js/bootstrap-notify.js"></script>
<script src="/material2/js/material-dashboard.js?v=1.2.0"></script>
</html>
