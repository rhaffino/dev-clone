<header id="kt_header" class="cmlabs_header bg-white" id="navbarHome">
    @include('layouts.promo_header')
    <div class="container-fluid">
        @include('layouts.header-mobile')
        <nav class="navbar navbar-expand-lg bg-white desktop-navbar">
            <a class="navbar-brand brand d-flex align-items-center gtm-header-logo" href="">
                <img src="{{ asset('media/logos/new/new-logo-default.png') }}" width="42" height="42"
                    class="logo" alt="cmlabs logo">
            </a>
            <button class="navbar-toggler cmlabs-navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class='bx bx-menu bx-md'></i>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarScroll">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn nav-link d-flex align-items-center gap-1"
                            id="keywordTrackerDropdown"><span>@lang('v2_navbar.keyword_tracker')</span> <i
                                class="bx bx-chevron-down"></i></button>
                    </li>
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link dropdown-toggle @yield('pricing-menu-active')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                @lang('layout.nav-pricing')
                                <i class="bx bxs-down-arrow text-custom-softgrey icon-sm-xs ml-1"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/serp-tracker">@lang('layout.nav-pricing-serp')</a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/seo-consultant">@lang('layout.nav-pricing-seo')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/content-writing">@lang('layout.nav-pricing-writing')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/content-marketing">@lang('layout.nav-pricing-marketing')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/backlink">@lang('layout.nav-pricing-backlink')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/pricing/backlink-media-nasional">@lang('layout.nav-pricing-backlink-media-nasional')</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/"
                            class="btn nav-link d-flex align-items-center gap-1 active">@lang('v2_navbar.free_seo') <i
                                class="bx bx-chevron-down bx-xs" style="color: white"></i></a>
                    </li>
                    <li class="nav-item">
                        <button class="btn nav-link d-flex align-items-center gap-1"
                            id="resourcesDropdown"><span>@lang('v2_navbar.resources')</span>
                            <i class="bx bx-chevron-down"></i></button>
                    </li>
                    <li class="nav-item">
                        <a href="https://career.cmlabs.co"
                            class="btn nav-link d-flex align-items-center gap-1">@lang('v2_navbar.career')</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-last d-flex align-items-center">
                <div class="dropdown me-3">
                    <button type="button" class="btn font-weight-bold button-language dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="bx bx-world"></i>@lang('layout.language')</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-language desktop">
                        <ul class="navi flex-column navi-hover">
                            <li class="navi-item border-bottom">
                                <a href="{{ url('/en/version')}}" class="navi-link">English</a>
                            </li>
                            <li class="navi-item border-bottom">
                                <a href="{{ url('/id/version')}}" class="navi-link">Bahasa</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<div id="dropdownNav">
    @include('layouts.dropdown.resource')
    @include('layouts.dropdown.seo-tools')
    @include('layouts.dropdown.services')
    @include('layouts.dropdown.keyword-tracker')
</div>
</header>
