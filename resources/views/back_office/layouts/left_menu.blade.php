<ul id="js-nav-menu" class="nav-menu">
{{--    <li class="active open">--}}
{{--        <a href="#" title="Application Intel">--}}
{{--            <i class="fal fa-info-circle"></i>--}}
{{--            <span class="nav-link-text">Ana Menu</span>--}}
{{--        </a>--}}
{{--        <ul>--}}
{{--            <li class="active">--}}
{{--                <a href="{{ url('/admin') }}" title="Analytics Dashboard">--}}
{{--                    <span class="nav-link-text">Sayfalar</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
    <li class="@if(Request::segment(2) == null) active @endif">
        <a href="{{ url('/admin') }}">
            <span class="nav-link-text">Sayfalar</span>
        </a>
    </li>
    <li class="@if(Request::segment(2) == 'comments') active @endif">
        <a href="{{ url('/admin/comments') }}">
            <span class="nav-link-text">Yorumlar</span>
        </a>
    </li>
    <li class="@if(Request::segment(2) == 'contact-us') active @endif">
        <a href="{{ url('/admin/contact-us') }}">
            <span class="nav-link-text">İletişim Mesajları</span>
        </a>
    </li>
    <li class="@if(Request::segment(2) == 'subscribers') active @endif">
        <a href="{{ url('/admin/subscribers') }}">
            <span class="nav-link-text">Aboneler</span>
        </a>
    </li>
    <li class="@if(Request::segment(2) == 'tests') active @endif">
        <a href="{{ url('/admin/tests') }}">
            <span class="nav-link-text">Testler</span>
        </a>
    </li>
</ul>
