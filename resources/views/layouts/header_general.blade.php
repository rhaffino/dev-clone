<div id="kt_header" class="header header-fixed custom-header header-general">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!-- Header Menu Wrapper -->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!-- Header Menu -->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <div class="brand brand-header flex-column-auto justify-content-center pl-0 pr-0" id="kt_brand">
                    <a href="https://cmlabs.co/{{ $local }}-id/" class="brand-logo d-flex justify-content-start align-items-center">
                        <img alt="Logo" src="{{ asset('media/logos/new/new-logo-default.png') }}" class="max-h-45px"/>
                        <span class="h2 title-logo-1 font-weight-bolder ml-3 my-2">cmlabs</span>
                    </a>
                </div>
                <ul class="nav custom-nav nav-header">
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                Resources
                                <i class="bx bxs-down-arrow text-custom-softgrey icon-sm-xs ml-1"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/blog">Blog</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/seo-terms">SEO Terms</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/seo-guidelines">SEO Guidelines</a>                            
                        </div>
                    </li>
                    <li class="nav-item ml-9">
                        <a class="nav-link" href="https://cmlabs.co/{{ $local }}-id/pricing">Pricing</a>
                    </li>
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link active" href="/{{ $local }}">SEO Tools</a>
                    </li>
                    <li class="nav-item dropdown ml-9">
                        <a class="nav-link" href="https://career.cmlabs.co/">Career</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-item">
                <div class="dropdown dropdown-inline ml-7">
                    <button type="button" class="btn font-weight-bold button-language dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="bx bx-world"></i>@lang('layout.language')</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-language">
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
    </div>
</div>
