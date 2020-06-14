<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img alt="Porto" width="130" height="90" data-sticky-width="82" data-sticky-height="40" data-sticky-top="25" src="{{ asset('img/logo-1.jpeg') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row pt-3">
                        <nav class="header-nav-top">
                            <ul class="nav nav-pills">
{{--                                <li class="nav-item nav-item-anim-icon d-none d-md-block">--}}
{{--                                    <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> Hakkımızda</a>--}}
{{--                                </li>--}}
                                <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                    <a class="nav-link" href="{{ url('/iletisim') }}"><i class="fas fa-angle-right"></i> İletişim</a>
                                </li>
{{--                                <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">--}}
{{--                                    <span class="ws-nowrap"><i class="fas fa-mail-bulk"></i> info@ingilizcedilbilgisi.com</span>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                    <div class="header-row">
                        <div class="header-nav pt-1">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="">
                                            <a class="top__menu @if(Request::segment(1) == null) active @endif" href="{{ url('/') }}">
                                                Ana Sayfa
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle @if(Request::segment(1) == 'gramer') active @endif" href="javascript:void(0);">
                                                GRAMER
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/gramer/baslangic-seviye-gramer') }}">
                                                        Başlangıç Seviye Gramer
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/gramer/orta-seviye-gramer') }}">
                                                        Orta Seviye Gramer
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/gramer/ileri-seviye-gramer') }}">
                                                        İleri Seviye Gramer
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle @if(Request::segment(1) == 'kelime') active @endif" href="javascript:void(0);">
                                                KELİME
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/kelime/yakin-anlamli-kelimeler') }}">
                                                        Yakın Anlamlı Kelimeler
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/kelime/baglaclar') }}">
                                                        Bağlaçlar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/kelime/onemli-fiiler') }}">
                                                        Önemli Fiiler
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/kelime/edatlar') }}">
                                                        Edatlar
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="">
                                            <a class="top__menu @if(Request::segment(1) == 'hikaye') active @endif" href="{{ url('/hikaye') }}">
                                                HİKAYE
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="top__menu @if(Request::segment(1) == 'blog') active @endif" href="{{ url('/blog') }}">
                                                BLOG
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <ul class="header-social-icons social-icons d-none d-sm-block">
                                <li class="social-icons-facebook"><a href="javascript:void(0);" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="javascript:void(0);" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="javascript:void(0);" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
