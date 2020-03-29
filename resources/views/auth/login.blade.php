<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel Girişi</title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/app.bundle.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('back_assets/img/favicon-32x32.png') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/page-login.css') }}">
</head>
<body>
<div class="blankpage-form-field">
    <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
            <img src="{{ asset('back_assets\img\logo.png') }}"aria-roledescription="logo">
            <span class="page-logo-text mr-1">Admin Panel Giriş</span>
        </a>
    </div>
    <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">E-Mail</label>
                <input type="email" name="email" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Şifre</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            @if(\Session::has('status'))
            <div class="alert alert-danger" role="alert">
                <strong>UYARI!</strong> {{ \Session::get('status') }}
            </div>
            @endif
            <button type="submit" class="btn btn-default float-right">Giriş</button>
        </form>
    </div>
</div>
<video poster="" id="bgvid" playsinline="" autoplay="" muted="" loop="">
    <source src="{{ asset('back_assets/media/cc.webm') }}" type="video/webm">
    <source src="{{ asset('back_assets/media/cc.mp4') }}" type="video/mp4">
</video>
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
<script src="{{ asset('back_assets/js/vendors.bundle.js') }}"></script>
<script src="{{ asset('back_assets/js/app.bundle.js') }}"></script>
</body>
</html>
