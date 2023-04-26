<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

    @yield('style')
</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav" style="position: relative">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <a href="#" class="logo">
                        <span class="logo-large"></i>Hudson Cratz</span>
                    </a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="{{ route('person.index') }}"><i class="fi-head"></i>Pessoas</a>
                        </li>
                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->


    </header>
    <!-- End Navigation Bar-->

    @component('componentes.alertas')
    @endcomponent
    @yield('content')


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    CRUD Pessoas
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    @yield('script')
    </body>

    </html>
