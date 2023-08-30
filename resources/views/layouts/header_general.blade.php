<div id="kt_header" class="header header-fixed custom-header header-general">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!-- Header Menu Wrapper -->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!-- Header Menu -->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <div class="brand brand-header d-flex flex-column align-items-start flex-column-auto justify-content-center pl-0 pr-0"
                    id="kt_brand">
                    <a class="fz-13 back-to-cmlabs text-dark-30 d-none d-lg-block" href="https://cmlabs.co/{{ $local }}-id/">
                        <span class="text-dark-20">
                            {{ __('home.back_to') }}
                        </span>
                    </a>
                    <a href="/"
                        class="brand-logo d-flex justify-content-center align-items-center">
                        <img alt="Logo"
                            src="https://cmlabs-co.s3.ap-southeast-1.amazonaws.com/logos/cmlabs-logo-new.webp"
                            class="max-h-35px" />
                        <span class="h2 title-logo-name ml-2 mt-3">SEO Tools</span>
                    </a>
                </div>
                <ul class="nav custom-nav nav-header">
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                Resources
                                <i class='bx bx-chevron-down ml-1'></i>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/blog">Blog</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/seo-terms">SEO
                                Terms</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/seo-guidelines">SEO
                                Guidelines</a>
                            @if ($local == 'id')
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/ebook">cmlabs
                                    E-Book</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/event">cmlabs
                                    Event</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link dropdown-toggle @yield('pricing-menu-active')" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                @lang('layout.nav-pricing')
                                <i class='bx bx-chevron-down ml-1'></i>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="https://cmlabs.co/{{ $local }}-id/pricing/seo-services">@lang('layout.nav-pricing-seo')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="https://cmlabs.co/{{ $local }}-id/pricing/content-writing">@lang('layout.nav-pricing-writing')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="https://cmlabs.co/{{ $local }}-id/pricing/expert-writing">Expert Writing</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="https://cmlabs.co/{{ $local }}-id/pricing/media-buying">@lang('layout.nav-pricing-media-buying')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="https://cmlabs.co/{{ $local }}-id/pricing/political-campaign">@lang('layout.nav-pricing-political')</a>
                        </div>
                    </li>
                    {{--<li class="nav-item dropdown ml-9">
                        <a class="nav-link active" href="/{{ $local }}">SEO Tools</a>
                    </li>--}}
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link" href="https://career.cmlabs.co/">Career</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-item mt-3">
                <div class="dropdown dropdown-inline ml-7">
                    <button type="button" class="btn font-weight-bold button-language dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="bx bx-world"></i>@lang('layout.language')</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-language">
                        <ul class="navi flex-column navi-hover">
                            <li class="navi-item border-bottom">
                                <a href="{{ url('/en/version') }}" class="navi-link">English</a>
                            </li>
                            <li class="navi-item border-bottom">
                                <a href="{{ url('/id/version') }}" class="navi-link">Bahasa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- 
                    @if (session('logged_in') == 'false' || session('logged_in') === null)
                        <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google')}}" class="btn btn-cmlabs-login mr-3">@lang('layout.button-login')</a>
                    @endif
                --}}
                @auth
                    <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/logout')}}" class="btn btn-cmlabs-login mr-3">@lang('layout.button-logout')</a>
                @endauth
                @guest
                    <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google')}}" class="btn btn-cmlabs-login mr-3">@lang('layout.button-login')</a>
                @endguest
                <a href="https://cmlabs.co/{{$local}}-id/company/contact" class="btn btn-cmlabs-consult">@lang('layout.button-consult')</a>
            </div>
        </div>
    </div>
</div>
