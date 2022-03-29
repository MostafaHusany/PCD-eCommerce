<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- DATATABLE -->
    <link href="{{ asset('plugins/datatable/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous"> -->
    <!-- <link href="{{ asset('rtl/css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('rtl/css/custom.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('shop/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-custom.css')}}">

    @yield('third_party_stylesheets')

    @stack('page_css')
    

    <script src="{{ mix('js/app.js') }}" ></script>
    <!-- DATATABLE SCRIPTS -->
    <script src="{{ asset('plugins/datatable/datatables.bundle.js') }}"></script>
    <script src="{{ asset('plugins/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/buttons.print.min.js') }}"></script>
    
</head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('images/AdminLTELogo.png') }}"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset('images/AdminLTELogo.png') }}"
                                    class="img-circle elevation-2"
                                    alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.admin.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    @yield('content')
                </section>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.5
                </div>
                <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>
        </div>

        @include('layouts.admin.incs._dynamic_table_script')
        
        @yield('third_party_scripts')
        
        @stack('page_scripts')
        
    </body>
</html>