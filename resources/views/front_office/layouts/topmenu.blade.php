<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="25" src="{{ asset('img/logo.png') }}">
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
                                    <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> İletişim</a>
                                </li>
                                <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
                                    <span class="ws-nowrap"><i class="fas fa-mail-bulk"></i> info@ingilizcedilbilgisi.com</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-row">
                        <div class="header-nav pt-1">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="">
                                            <a class="top__menu active" href="{{ url('/') }}">
                                                Ana Sayfa
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="index.html">
                                                GRAMER
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/gramer').'/'.\Str::slug('Başlangıç Seviye Gramer') }}">
                                                        Başlangıç Seviye Gramer
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        Orta Seviye Gramer
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        İleri Seviye Gramer
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="index.html">
                                                KELİME
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        Yakın Anlamlı Kelimeler
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        Bağlaçlar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        Önemli Fiiler
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.html">
                                                        Edatlar
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="">
                                            <a class="top__menu" href="#">
                                                HİKAYE
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="top__menu" href="#">
                                                BLOG
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <ul class="header-social-icons social-icons d-none d-sm-block">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
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
