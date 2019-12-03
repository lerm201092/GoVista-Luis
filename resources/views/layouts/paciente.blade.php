<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GoVista</title>
  <!-- Styles - Bootstrap 4 -->
  <meta name="viewport" content="width=device-width, initial-scale=1"         />
  <link rel="stylesheet" href="{{ asset('/vendor/fontawesome/css/all.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/vendor/src/css/adminlte.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/vendor/src/css/fonts.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/dist/css/bootstrap.min.css') }}" />
  <!-- Scripts - jquery 3.4.1-->
  <script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/vendor/src/js/adminlte.min.js') }}"></script>
    <style>
        .row{
            margin-right: 0;
            margin-left: 0;
        }

        .a-exit{
            color:gray
            width:100%;
        }
        .a-exit:hover{
            color:white!important;
        }


        .td-menu-user{
            width:100%;
            height:40px;
            vertical-align:middle;
            padding-left:10px;
        }
        .td-menu-user:hover{
            border-radius:5px;
            background:#9c27b0;
            color:white!important;
            cursor:pointer;
        }


        .nav-item p{
            padding:3px 10px;
        }

        .nav-link:hover{
            background:#e4e4e4!important;
        }

        li.active .nav-link:hover{
            background:#9c27b0!important;
        }

        li.active{
            background : #9c27b0;
            -webkit-box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);
            -moz-box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);
            box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);
            border-radius: 3px;
        }

        li.active span{
            color: white;
        }
        li.active p{
            color: white;
            font-weight: 500;
        }

        

        #sub-menu-user-right{position:absolute; top:60px; background: white; color: gray; padding: 5px 5px; -webkit-box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);
-moz-box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);
box-shadow: 1px 0px 5px 3px rgba(0,0,0,0.3);width:250px;right:30px;display:none;}

.txt{
            border:none;
            border-bottom: 1px solid gray;
            width: 200px;
            height:38px;
            line-height:32px;
        }

        /* textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {   
            border-color: transparent;
            box-shadow: 0 1px 1px transparent inset, 0 0 8px transparent;
            outline: 0 none;
            border-bottom: 2px solid #9c27b0;
        } */

    </style>
  <!-- Estilos propios del contenedor -->
  @yield('head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Lienzo de la pagina -->
  <div class="wrapper">

    <!-- Navbar --> 
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #9c27b0;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars text-light"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link text-light font-weight-bold">{{ Session::get('id_empresa_nombre') }}</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto  mr-3">
            <li class="nav-item d-none d-sm-inline-block" onclick="submenu();";>
                <a href="#" class="nav-link text-light font-weight-bold">
                    <span class="fa fa-user mr-3"></span>
                    {{ Auth::user()->nombres }}
                    <span class="fas fa-caret-down ml-3 mr-3"></span>
                </a>
            </li>
            <div id="sub-menu-user-right">
                <table style="width:100%;">
                    <tr class="tr-menu-user" ><td class="td-menu-user"><span class="fa fa-user mr-3"></span>Mi Perfil</td></tr>
                    <tr class="tr-menu-user" ><td class="td-menu-user"><span class="fas fa-key mr-3"></span>Cambiar Contraseña</td></tr>
                    <tr class="tr-menu-user" ><td class="td-menu-user"><span class="fas fa-shopping-cart mr-3"></span>Comprar</td></tr>
                    <tr class="tr-menu-user" ><td class="td-menu-user"><span class="far fa-credit-card mr-3"></span>Detalles De Pagos</td></tr>
                    <tr class="tr-menu-user" style="border-top:1px solid #d2d2d2">
                        <td class="td-menu-user" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fas fa-power-off mr-3"></span> Cerrar Sesión
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </ul>
    </nav>
    
    <!-- Menu -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
        <div class="image">
            <img src="/img/logo-200-53.png" class="p-1 mt-3" style="width:80%; margin-left:10%;">
        </div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel pb-3 mb-3 d-flex">
            <div class="info col-12 text-center">
                <a href="#" class="d-block"><b>Paciente</b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->         
            <li class="nav-item" id="li-resumen">
                <a href="{{ route('summary') }}" class="nav-link">
                <span class="nav-icon far fa-calendar-alt"></span>
                <p>
                    Resumen
                </p>
                </a>
            </li>
            <li class="nav-item" id="li-citas">
            <a href="{{ route('modulos.citas.listado') }}" class="nav-link">
                <span class="nav-icon fas fa-users"></span>
                <p>
                    Citas
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <span class="nav-icon 	fa fa-gamepad"></span>
                <p>
                    Ejercicios
                </p>
                </a>
            </li>
            <!-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    Extras
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login</p>
                    </a>
                </li>
                </ul>
            </li>   -->
         
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Contenedor principal -->
    <div class="content-wrapper">

        <!-- Header del contenido -->
        <!-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->

      <!-- Contenido de la pagina -->
      <section class="content" style="padding-top: 20px;">
            @yield('content')
      </section>
      <!-- /.Contenido de la pagina -->

    </div>
    <!-- /.Contenedor principal -->

      <!-- Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="http://www.facebook.com/luisramos92">GoVista </a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
    <!-- /.Footer -->    
  </div>
  <!-- /.Lienzo de la pagina -->

    @yield('script')

    <script>
        console.log("{{ Auth::user()->nombres }}");
        function submenu(){
            $("#sub-menu-user-right").slideToggle(0);
        }
    </script>

</body>
</html>
