<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('dashapp/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('dashapp/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

     <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Vendor CSS-->
    <link href="{{url('dashapp/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('dashapp/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('dashapp/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ URL::route('admin.index') }}">
                            <img src="{{url('frontapp/images/logo/carsvlogo.png')}}" alt="CoolAdmin">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ URL::route('admin.index') }}">
                                <i class="fas fa-table"></i>tableau de bord</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.cars') }}">
                                <i class="fas fa-table"></i>les tables</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.add') }}">
                                <i class="fa-solid fa-cart-plus"></i>Ajouter une voiture</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.deletedcars') }}">
                                <i class="fa-solid fa-trash-can"></i>Voitures supprimées</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.acount.users.admins') }}">
                                <i class="fa-solid fa-users"></i>admins and users</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.acount.myaccount') }}">
                                <i class="fa-solid fa-user"></i>mon compte</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ URL::route('admin.index') }}">
                    <img src="{{url('frontapp/images/logo/carsvlogo.png')}}" alt="CoolAdmin">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ URL::route('admin.index') }}">
                                <i class="fas fa-table"></i>tableau de bord</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.cars') }}">
                                <i class="fas fa-table"></i>les tables</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.add') }}">
                                <i class="fa-solid fa-cart-plus"></i>Ajouter une voiture</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.deletedcars') }}">
                                <i class="fa-solid fa-trash-can"></i>Voitures supprimées</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.acount.users.admins') }}">
                                <i class="fa-solid fa-users"></i>admins and users</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('admin.acount.myaccount') }}">
                                <i class="fa-solid fa-user"></i>mon compte</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->



        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">

                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{url('dataimg/')}}/@php echo Auth::user()->img ? 'adminimg/'.Auth::user()->img : 'noimage/no-image.png'; @endphp" alt="{{Auth::user()->name}}" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="{{ URL::route('admin.acount.myaccount') }}">

                                                        <img src="{{url('dataimg/')}}/@php echo Auth::user()->img ? 'adminimg/'.Auth::user()->img : 'noimage/no-image.png'; @endphp" alt="{{Auth::user()->name}}" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="{{ URL::route('admin.acount.myaccount') }}">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ URL::route('admin.acount.myaccount') }}">
                                                        <i class="zmdi zmdi-account"></i>mon compte</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-responsive-nav-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        <i class="zmdi zmdi-power"></i>Se déconnecter
                                                    </x-responsive-nav-link>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
                        <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">


                                 @yield('ContentDashboard')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © 2022 . Tous les droits sont réservés. Développeur Par <a href="https://www.zahirdaoui.com" target="_blank"> EZZAHIR DAOUI</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

<!-- Jquery JS-->
<script src="{{url('dashapp/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{url('dashapp/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{url('dashapp/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{url('dashapp/vendor/slick/slick.min.js')}}">
</script>
<script src="{{url('dashapp/vendor/wow/wow.min.js')}}"></script>
<script src={{url('dashapp/vendor/animsition/animsition.min.js')}}></script>
<script src="{{url('dashapp/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{url('dashapp/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{url('dashapp/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{url('dashapp/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{url('dashapp/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{url('dashapp/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{url('dashapp/vendor/select2/select2.min.js')}}">
</script>

<!-- Main JS-->
<script src="{{url('dashapp/js/main.js')}}"></script>
{{-- valid dash --}}
<script src="{{url('frontapp/js/valid-dash.js')}}"></script>

</body>

</html>
<!-- end document-->
