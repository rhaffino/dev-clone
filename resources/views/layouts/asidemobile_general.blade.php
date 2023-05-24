<div class="aside aside-left aside-fixed flex-column flex-row-auto custom-aside-mobile d-none" id="kt_aside">
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div class="container-fluid">
            <div class="row border-bottom pt-5 pb-5">
                <div class="col-12 d-flex justify-content-start align-items-center">
                    <a href="https://cmlabs.co/{{ $local }}-id" class="brand-logo d-flex align-items-center">
                        <img alt="Logo" src="{{ asset('media/logos/new/new-logo-default.png') }}" height="30px" width="30px" />
                        <span class="h4 title-logo-1 font-weight-bold ml-3 my-2 mt-2">@lang('layout.title')</span>&nbsp;&nbsp;
                        <span class="h4 title-logo-2 font-weight-light my-2 mt-2" id="asidemobile_writer_title">@lang('layout.writers')</span>
                        <span class="h4 title-logo-2 font-weight-light my-2 mt-2 d-none" id="asidemobile_webmaster_title">@lang('layout.web-master')</span>
                    </a>
                </div>
            </div>            
            <div class="row border-bottom pt-5 pb-5">
                <a class="fz-13 back-to-cmlabs text-dark-30 pl-4" href="https://cmlabs.co/{{ $local }}-id/">
                    <span class="text-dark-20">
                        {{ __('home.back_to') }}
                    </span>
                </a>
            </div>
            <div class="row border-bottom pt-5 pb-5">                
                <div class="col-12 d-flex justify-content-start align-items-center">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn font-weight-bold button-language-mobile dropdown-toggle pl-0 pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="bx bx-world"></i> English</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-language-mobile">
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
        <div id="kt_aside_menu" class="aside-menu my-4 custom-aside-menu" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav custom-menu-sidebar">
                <li class="menu-item menu-item-submenu" aria-haspopup="true">
                    <a href="" class="menu-link menu-toggle">
                        <span class="menu-text">Resources</span>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">Resources</span></span>
                            </li>
                            <li class="menu-item menu-item-children" aria-haspopup="true">
                                <a href="https://cmlabs.co/{{ $local }}-id/blog" class="menu-link"><span class="menu-text">Blog</span></a>
                            </li>
                            <li class="menu-item menu-item-children" aria-haspopup="true">
                                <a href="https://cmlabs.co/{{ $local }}-id/seo-terms" class="menu-link"><span class="menu-text">SEO Terms</span></a>
                            </li>
                            <li class="menu-item menu-item-children" aria-haspopup="true">
                                <a href="https://cmlabs.co/{{ $local }}-id/seo-guidelines" class="menu-link"><span class="menu-text">SEO Guidelines</span></a>   
                            </li>
                            @if ($local == "id")         
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/ebook" class="menu-link"><span class="menu-text">cmlabs E-Book</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a class="dropdown-item" href="https://cmlabs.co/{{ $local }}-id/event" class="menu-link"><span class="menu-text">cmlabs Event</span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true">
                    <a href="" class="menu-link menu-toggle">
                        <span class="menu-text">@lang('layout.nav-pricing')</span>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">@lang('layout.nav-pricing')</span></span>
                            </li>
                            @if ($local == "en")
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/seo-services" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-seo')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/content-writing" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-writing')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/media-buying" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-media-buying')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/political-campaign" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-media-buying')</span></a>
                                </li>
                            @else 
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/jasa-seo" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-seo')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/content-writing" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-writing')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/media-buying" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-media-buying')</span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true">
                    <a href="" class="menu-link menu-toggle">
                        <span class="menu-text">SEO Tools</span>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">SEO Tools</span></span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/{{ $local }}/json-ld-schema-generator" class="menu-link">
                                    <span class="menu-text">JSON-LD</span>
                                </a>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true">
                                <a href="" class="menu-link menu-toggle">
                                    <span class="menu-text">Generator</span>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">Generator</span>
                                            </span>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/sitemap-generator" class="menu-link">
                                                <span class="menu-text">Sitemap .XML Generator</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/robotstxt-generator" class="menu-link">
                                                <span class="menu-text">Robots .TXT Generator</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true">
                                <a href="" class="menu-link menu-toggle">
                                    <span class="menu-text">Test & Checker</span>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">Test & Checker</span>
                                            </span>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/pagespeed-test" class="menu-link">
                                                <span class="menu-text">Page Speed Test</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/mobile-friendly-test" class="menu-link">
                                                <span class="menu-text">Mobile Friendly Test</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/ssl-checker" class="menu-link">
                                                <span class="menu-text">SSL Certificate Checker</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/redirect-checker" class="menu-link">
                                                <span class="menu-text">Redirect Chain Checker</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/hreflang-checker" class="menu-link">
                                                <span class="menu-text">Hreflang Checker</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/link-analyzer" class="menu-link">
                                                <span class="menu-text">Link Analyzer</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/technology-lookup" class="menu-link">
                                                <span class="menu-text">Technology Lookup</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/{{ $local }}/keyword-permutation" class="menu-link">
                                    <span class="menu-text">Keyword Permutation</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/{{ $local }}/word-counter" class="menu-link">
                                    <span class="menu-text">Word Counter</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/{{ $local }}/page-title-meta-description-checker" class="menu-link">
                                    <span class="menu-text">Title and Meta Checker</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="https://career.cmlabs.co" class="menu-link">
                        <span class="menu-text">Career</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
