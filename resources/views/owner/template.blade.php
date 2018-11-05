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
    <title>Owner Panel</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backendcp/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backendcp/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backendcp/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backendcp/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS-->
    <link href="{{asset('backendcp/css/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backendcp/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backendcp/css/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backendcp/css/layout.css')}}" rel="stylesheet" media="all">
    @yield('header-scripts')
</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner"><a class="logo" href="index.html"> <img src="images/icon/logo.png"
                                                                                         alt="CoolAdmin"/> </a>
                    <button class="hamburger hamburger--slider" type="button"><span class="hamburger-box"> <span
                                    class="hamburger-inner"></span> </span></button>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo"><a href="#"> <img src="{{asset('backendcp/images/ncsdashboard.png')}}" alt="Cool Admin"/> </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">

                    <li class="active">
                      <a href="{{route('owner.root')}}">
                        <i class="fa fa-home"></i>Dashboard
                      </a>
                    </li>

                    <li class="has-sub">
                      <a class="js-arrow" href="#">
                        <i class="fa fa-users"></i>Stores
                        <span class="arrow">
                          <i class="fas fa-angle-down"></i>
                        </span>
                      </a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">

                        <li>
                          <a href="{{route('owner.list.stores')}}">
                            <i class="fa fa-genderless"></i> All Stores
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.new.stores')}}">
                            <i class="fa fa-genderless"></i> Add New Stores
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.registered.stores')}}">
                            <i class="fa fa-genderless"></i> Registered Stores
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.deleted.stores')}}">
                            <i class="fa fa-genderless"></i> Deleted Stores
                          </a>
                        </li>

                        </ul>
                    </li>

                    <li class="has-sub">
                      <a class="js-arrow" href="#">
                        <i class="fa fa-user-secret"></i>Owners
                        <span class="arrow">
                          <i class="fas fa-angle-down"></i>
                        </span>
                      </a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                          <a href="{{route('owner.list.owners')}}">
                            <i class="fa fa-genderless"></i> All Owners
                          </a>
                        </li>
                        <li>
                          <a href="{{route('owner.new.owners')}}">
                            <i class="fa fa-genderless"></i> Add New Owners
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.registered.owners')}}">
                            <i class="fa fa-genderless"></i> Registered Owners
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.deleted.owners')}}">
                            <i class="fa fa-genderless"></i> Deleted Owners
                          </a>
                        </li>

                      </ul>
                    </li>




                    <li class="has-sub">
                      <a class="js-arrow" href="#">
                        <i class="fa fa-users"></i>Brought Items
                        <span class="arrow">
                          <i class="fas fa-angle-down"></i>
                        </span>
                      </a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">

                        <li>
                          <a href="{{route('brought.list.items.work_on')}}">
                            <i class="fa fa-genderless"></i> Work On
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.new.stores')}}">
                            <i class="fa fa-genderless"></i> On Hold
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.new.stores')}}">
                            <i class="fa fa-genderless"></i> Processing
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.registered.stores')}}">
                            <i class="fa fa-genderless"></i> Completed
                          </a>
                        </li>

                        <li>
                          <a href="{{route('owner.deleted.stores')}}">
                            <i class="fa fa-genderless"></i> Fraud
                          </a>
                        </li>

                        </ul>
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
                            <div class="noti-wrap">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image"><img src="{{asset('backendcp/img/avatar.png')}}" alt="Saras">
                                        </div>
                                        <div class="content"><a class="js-acc-btn" href="#">{{
                                                Auth::guard('owner')->user()->name }}</a></div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image"><a href="#"> <img
                                                                src="{{asset('backendcp/img/avatar.png')}}"
                                                                alt="author name"/> </a></div>
                                                <div class="content">
                                                    <h5 class="name"><a href="#">{{ Auth::guard('owner')->user()->name
                                                            }}</a></h5>
                                                    <span class="email">{{ Auth::guard('owner')->user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item"><a href="#" target="_blank"> <i
                                                                class="zmdi zmdi-eye"></i>View Site</a></div>
                                                <div class="account-dropdown__item"><a href="#"> <i
                                                                class="zmdi zmdi-settings"></i>Setting</a></div>
                                                <!-- <div class="account-dropdown__item"> <a href="#"> <i class="zmdi zmdi-money-box"></i>Billing</a> </div> -->
                                            </div>
                                            <div class="account-dropdown__footer"><a href="{{route('owner.logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a></div>
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
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
</div>


<script src="{{asset('backendcp/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="//unpkg.com/popper.js@1.14.4/dist/umd/popper.js"></script>
<script src="{{asset('backendcp/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backendcp/js/wow.min.js')}}"></script>
<!-- <script src="{{asset('backendcp/js/animsition.min.js')}}"></script>  -->
<script src="{{asset('backendcp/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('backendcp/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('backendcp/js/select2.min.js')}}"></script>
<script src="{{asset('backendcp/js/main.js')}}"></script>
@yield('footer-scripts')

</body>
</html>
