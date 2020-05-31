<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="İngilizce Dersleri">
    <meta name="description" content="İngilizce Dersleri">
    <meta name="author" content="Mustafa Kaan KOCAGÖZ">

    <link rel="shortcut icon" href="{{ asset('img/logo-1.jpeg') }}" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/magnific-popup.min.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/theme-shop.css') }}">
    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/component.css') }}">
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/default.css') }}">
    <script src="{{ asset('front_assets/js/style.switcher.localstorage.js') }}"></script>
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/custom.css') }}">
    <!-- Head Libs -->
    <script src="{{ asset('front_assets/js/modernizr.min.js') }}"></script>

    <style>
        .hide{
            display: none;
        }
    </style>

</head>
<body class="loading-overlay-showing" data-plugin-page-transition="" data-loading-overlay="" data-plugin-options="{'hideDelay': 500}">
<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="body">

    @include('front_office.layouts.topmenu')

    <div role="main" class="main">
        @yield('content')
    </div>


    <footer id="footer">
        <div class="container">
            <div class="footer-ribbon">
                <span>Get in Touch</span>
            </div>
            <div class="row py-5 my-4">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-3 mb-3">NEWSLETTER</h5>
                    <p class="pr-1">Sürekli güncellenen içeriklerimizden haberdar olabilmek için e posta adresinizi yazıp bize abone olabilirsiniz..</p>
                    <div class="alert alert-success d-none" id="newsletterSuccess">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>
                    <div class="alert alert-danger d-none" id="newsletterError"></div>
                    <form id="newsletterForm" action="javascript:void(0);" method="POST" class="mr-4 mb-3 mb-md-0">
                        <div class="input-group input-group-rounded">
                            <input class="form-control form-control-sm bg-light" placeholder="Email Adresi" name="newsletterEmail" id="newsletterEmail" type="email" required>
                            <span class="input-group-append">
                                <button class="btn btn-light text-color-dark" type="submit"><strong>KAYDOL!</strong></button>
                            </span>
                        </div>
                        <p id="success" class="text-success hide">Kayıt işlemi başarıyla gerçekleşti.</p>
                        <p id="error" class="text-danger hide">Kayıt sırasında bir hata gerçekleşti.</p>
                        <p id="error2" class="text-warning hide">Email formatını yanlış yazdınız.</p>
                        <p id="registered" class="text-warning hide">Bu email adresi daha önce kaydedilmiş.</p>
                    </form>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h5 class="text-3 mb-3">son Konular</h5>
                    <div id="tweet" class="twitter" data-plugin-tweets="" data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                        @foreach($recent as $item)
                            @php
                                $page_id = $item->page_info->sub_page_id;
                                if($page_id == 0){
                                    $kategoriAdi = $item->page_info->page_name_slug;
                                }
                                else{
                                    $page_infos = \App\Models\Page::find($page_id);
                                    $kategoriAdi = $page_infos->page_name_slug;
                                }

                                if($kategoriAdi == 'blog' || $kategoriAdi == 'hikaye')
                                    $item->page_info->page_name_slug = "";
                                else
                                    $item->page_info->page_name_slug = $item->page_info->page_name_slug."/";
                            @endphp
                            <p><a href="{{ url('/'.$kategoriAdi.'/'.$item->page_info->page_name_slug.$item->site_url) }}">{{ $item->title }}</a></p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="contact-details">
                        <h5 class="text-3 mb-3">İLETİŞİM</h5>
                        <ul class="list list-icons list-icons-lg">
                            <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0"><a href="{{ url('/iletisim') }}">Bize Ulaş</a></p></li>
                            <li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:info@ingilizcedilbilgisi.com">info@ingilizcedilbilgisi.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <h5 class="text-3 mb-3">TAKİP ET</h5>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="javascript:void(0);" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="javascript:void(0);" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="javascript:void(0);" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                        <a href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
                            <img alt="Porto Website Template" src="{{ asset('img/logo-1.jpeg') }}" class="opacity-5" height="33">
                        </a>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <p>© Copyright 2020. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <nav id="sub-menu">
                            <ul>
                                <li><i class="fas fa-angle-right"></i><a href="javascript:void(0);" class="ml-1 text-decoration-none"> Sitemap</a></li>
                                <li><i class="fas fa-angle-right"></i><a href="{{ url('/iletisim') }}" class="ml-1 text-decoration-none"> İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->
<script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/common.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.vide.min.js') }}"></script>
<script src="{{ asset('front_assets/js/vivus.min.js') }}"></script>
<!-- Theme Base, Components and Settings -->
<script src="{{ asset('front_assets/js/theme.js') }}"></script>
<!-- Current Page Vendor and Views -->
<script src="{{ asset('front_assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.flipshow.min.js') }}"></script>
<script src="{{ asset('front_assets/js/view.home.js') }}"></script>
<!-- Theme Custom -->
<script src="{{ asset('front_assets/js/custom.js') }}"></script>
<!-- Theme Initialization Files -->
<script src="{{ asset('front_assets/js/theme.init.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#newsletterForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = '/process/subscribers';
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                if(data.status == 0){
                    var element = document.getElementById("error");
                    element.classList.remove("hide");
                }
                else if(data.status == 1){
                    var element = document.getElementById("success");
                    element.classList.remove("hide");
                }else if(data.status == 3){
                    var element = document.getElementById("error2");
                    element.classList.remove("hide");
                }else{
                    var element = document.getElementById("registered");
                    element.classList.remove("hide");
                }
            }
        });


    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133679849-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133679849-2');
</script>

</body>
</html>
