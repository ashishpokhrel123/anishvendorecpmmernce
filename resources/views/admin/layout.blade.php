<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
   <!-- Fontfaces CSS-->
   <link href="{{asset('admin-assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin-assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin-assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin-assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin-assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body>
<div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
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
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="category">
                                <i class="fas fa-tachometer-alt"></i>Category</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin-assets/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="banner">
                                <i class="fas fa-tachometer-alt"></i>Banner</a>
                        </li>
                        <li>
                            <a href="vendor">
                                <i class="fas fa-tachometer-alt"></i>Vendor</a>
                        </li>
                        <li>
                        <a href="category">
                        Category
                        </a>
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
                            <form class="form-header" action="" method="POST">
                              
                            </form>
                            <div class="account-dropdown js-dropdown">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        
                                           
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @section('container')
                        @show
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>


    <script src="{{asset('admin-assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/slick/slick.min.js')}}">
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/counter-up/jquery.counterup.min.js')}}">
     <script src="{{asset('admin-assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/main.js')}}"></script>
</body>
</html>