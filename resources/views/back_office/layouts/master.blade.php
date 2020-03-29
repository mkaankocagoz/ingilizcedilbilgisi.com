<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        ingilizcedilbilgisi.com Admin Paneli
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Analytics Dashboard">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/app.bundle.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('back_assets/img/favicon-32x32.png') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/reactions.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/fullcalendar.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/jqvmap.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/summernote.min.css') }}">
    @yield('css')
</head>
<body class="mod-bg-1 ">
<div class="page-wrapper">
    <div class="page-inner">
        <aside class="page-sidebar">
            <div class="page-logo">
                <a href="{{ url('/admin') }}" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
                    <img src="{{ asset('back_assets/img/logo.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
                    <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                </a>
            </div>
            <nav id="js-primary-nav" class="primary-nav" role="navigation">
                <div class="info-card">
                    <div class="info-card-text">
                         <span class="text-truncate text-white text-truncate-xl d-inline-block">
                             {{ Auth::user()->name }}
                         </span>
                    </div>
                    <img src="{{ asset('back_assets/img/cover-2-lg.png') }}" class="cover" alt="cover">
                </div>

                @include('back_office.layouts.left_menu')

                <div class="filter-message js-filter-message bg-success-600"></div>
            </nav>
        </aside>
        <div class="page-content-wrapper">
            <header class="page-header" role="banner">
                <div class="page-logo">
                    <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                        <img src="{{ asset('back_assets/img/logo.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>
                <div class="hidden-md-down dropdown-icon-menu position-relative">
                    <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                        <i class="ni ni-menu"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                <i class="ni ni-minify-nav"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                <i class="ni ni-lock-nav"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="hidden-lg-up">
                    <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                        <i class="ni ni-menu"></i>
                    </a>
                </div>
            </header>
            <main id="js-page-content" role="main" class="page-content">

                @yield('content')

            </main>
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
            <footer class="page-footer" role="contentinfo">
                <div class="d-flex align-items-center flex-1 text-muted">
                    <span class="hidden-md-down fw-700">2020 © Mustafa Kaan KOCAGÖZ - Mehmet SAYAR Beyler yaptı bunu :D</span>
                </div>
            </footer>
            <p id="js-color-profile" class="d-none">
                <span class="color-primary-50"></span>
                <span class="color-primary-100"></span>
                <span class="color-primary-200"></span>
                <span class="color-primary-300"></span>
                <span class="color-primary-400"></span>
                <span class="color-primary-500"></span>
                <span class="color-primary-600"></span>
                <span class="color-primary-700"></span>
                <span class="color-primary-800"></span>
                <span class="color-primary-900"></span>
                <span class="color-info-50"></span>
                <span class="color-info-100"></span>
                <span class="color-info-200"></span>
                <span class="color-info-300"></span>
                <span class="color-info-400"></span>
                <span class="color-info-500"></span>
                <span class="color-info-600"></span>
                <span class="color-info-700"></span>
                <span class="color-info-800"></span>
                <span class="color-info-900"></span>
                <span class="color-danger-50"></span>
                <span class="color-danger-100"></span>
                <span class="color-danger-200"></span>
                <span class="color-danger-300"></span>
                <span class="color-danger-400"></span>
                <span class="color-danger-500"></span>
                <span class="color-danger-600"></span>
                <span class="color-danger-700"></span>
                <span class="color-danger-800"></span>
                <span class="color-danger-900"></span>
                <span class="color-warning-50"></span>
                <span class="color-warning-100"></span>
                <span class="color-warning-200"></span>
                <span class="color-warning-300"></span>
                <span class="color-warning-400"></span>
                <span class="color-warning-500"></span>
                <span class="color-warning-600"></span>
                <span class="color-warning-700"></span>
                <span class="color-warning-800"></span>
                <span class="color-warning-900"></span>
                <span class="color-success-50"></span>
                <span class="color-success-100"></span>
                <span class="color-success-200"></span>
                <span class="color-success-300"></span>
                <span class="color-success-400"></span>
                <span class="color-success-500"></span>
                <span class="color-success-600"></span>
                <span class="color-success-700"></span>
                <span class="color-success-800"></span>
                <span class="color-success-900"></span>
                <span class="color-fusion-50"></span>
                <span class="color-fusion-100"></span>
                <span class="color-fusion-200"></span>
                <span class="color-fusion-300"></span>
                <span class="color-fusion-400"></span>
                <span class="color-fusion-500"></span>
                <span class="color-fusion-600"></span>
                <span class="color-fusion-700"></span>
                <span class="color-fusion-800"></span>
                <span class="color-fusion-900"></span>
            </p>
            <!-- END Color profile -->
        </div>
    </div>
</div>
<nav class="shortcut-menu d-none d-sm-block">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open">
    <label for="menu_open" class="menu-open-button ">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
        <i class="fal fa-arrow-up"></i>
    </a>
    <a href="page_login_alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
        <i class="fal fa-sign-out"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
        <i class="fal fa-expand"></i>
    </a>
</nav>
<!-- END Quick Menu -->

<!-- BEGIN Page Settings -->
<script src="{{ asset('back_assets/js/vendors.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/app.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/moment.js') }}"></script>
<script src="{{ asset('back_assets/js/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/sparkline.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/easypiechart.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/flot.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/jqvmap.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/summernote.min.js') }}"></script>
@yield('js')
</body>
</html>
