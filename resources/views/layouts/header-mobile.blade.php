<nav id="kt_header_mobile" class="navbar navbar-expand-xl bg-white mobile-navbar">
    <a class="navbar-brand brand d-flex align-items-center gtm-header-logo" href="">
        <img src="{{ asset('media/logos/new/new-logo-default.png') }}" width="42" height="42" class="logo"
            alt="cmlabs logo">
    </a>
    <button class="navbar-toggler cmlabs-navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarScrollMobile" aria-controls="navbarScrollMobile" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class='bx bx-menu bx-md'></i>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarScrollMobile">        
        <ul class="navbar-nav w-100">
            <div class="dropdown w-100 language">
                <button class="btn py-4 btn-language d-flex align-items-center justify-content-between p-0 w-100 gtm-header-language"
                    type="button" id="dropdownMenuLanguage" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <div class="d-flex align-items-center">
                        <i class="cmicon language me-3"></i>
                        <span class="me-4">@lang('layout.language')</strong></span>
                    </div>
                    <i class="bx bx-chevron-down"></i>
                </button>
                <ul class="dropdown-menu dropdown-language fz-13 p-0 w-100" aria-labelledby="dropdownMenuLanguage">
                    <li class="w-100"><a class="dropdown-item dropdown-language__item" href="{{ url('/en/version')}}">English</a></li> 
                    <li class="w-100"><a class="dropdown-item dropdown-language__item" href="{{ url('/id/version')}}">Bahasa</a></li> 
                </ul>
            </div>
            <li class="nav-item dropdown">
                <button class="btn nav-link" id="keywordTrackerDropdownMobile" type="button"
                    aria-expanded="false"><span>@lang('v2_navbar.keyword_tracker')</span> <i
                        class="bx bx-chevron-down"></i></button>
                <div class="dropdown-menu keyword-tracker-mobile fz-13 p-0"
                    aria-labelledby="keywordTrackerDropdownMobile">
                    @include('layouts.dropdown.mobile-keyword-tracker')
                </div>
            </li>
            <li class="nav-item dropdown">
                <button class="btn nav-link" id="servicesDropdownMobile" type="button"
                    aria-expanded="false"><span>@lang('v2_navbar.services')</span> <i
                        class="bx bx-chevron-down"></i></button>
                <div class="dropdown-menu service-mobile fz-13 p-0" aria-labelledby="servicesDropdownMobile">
                    @include('layouts.dropdown.mobile-services')
                </div>
            </li>
            <li class="nav-item dropdown active">
                <button class="btn nav-link active" id="seoToolsDropdownMobile" type="button"
                    aria-expanded="false"><span>@lang('v2_navbar.free_seo')</span> <i
                        class="bx bx-chevron-down"></i></button>
                <div class="dropdown-menu seo-tools-mobile fz-13 p-0 show" aria-labelledby="seoToolsDropdownMobile">
                    @include('layouts.dropdown.mobile-seo-tools')
                </div>
            </li>
            <li class="nav-item dropdown">
                <button class="btn nav-link" id="resourcesDropdownMobile" type="button"
                    aria-expanded="false"><span>@lang('v2_navbar.resources')</span> <i
                        class="bx bx-chevron-down"></i></button>
                <div class="dropdown-menu resource-mobile fz-13 p-0" aria-labelledby="resourcesDropdownMobile">
                    @include('layouts.dropdown.mobile-resource')
                </div>
            </li>
            <li class="nav-item">
                <a href="https://career.cmlabs.co"
                    class="btn nav-link d-flex align-items-center gap-1">Career</a>
            </li>
        </ul>
        <div class="navbar-last d-flex align-items-center gap-3">
            <a href="{{ env('ANALYTICS_URL', 'https://analytics.cmlabs.co') . '/register' }}" class="btn btn-custom-credit font-weight-bold w-100">@lang('layout.button-register')</a>
            <a href="{{ env('ANALYTICS_URL', 'https://analytics.cmlabs.co') . '/login' }}" class="btn btn-custom-login w-100"><b>@lang('layout.button-signin-1')</b> @lang('layout.button-signin-2')</a>
        </div>
    </div>
</nav>
