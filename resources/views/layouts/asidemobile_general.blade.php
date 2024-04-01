<div class="aside aside-left aside-fixed flex-column flex-row-auto custom-aside-mobile d-none" id="kt_aside">
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div class="container-fluid">
            <div class="row border-bottom pt-5 pb-5">
                <div class="col-12 d-flex justify-content-start align-items-center">
                    <a href="https://cmlabs.co/{{ $local }}-id" class="brand-logo d-flex align-items-center">
                        <img alt="Logo" src="{{ asset('media/logos/new/new-logo-default.png') }}" height="30px" width="30px" />
                        <span class="h4 title-logo-1 font-weight-bold ml-3 my-2 mt-2">cmlabs</span>&nbsp;&nbsp;
                        <span class="h4 title-logo-2 font-weight-light my-2 mt-2" id="asidemobile_writer_title">SEO Tools</span>
                        {{--<span class="h4 title-logo-2 font-weight-light my-2 mt-2 d-none" id="asidemobile_webmaster_title">@lang('layout.web-master')</span>--}}
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
                    <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
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
                    <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
                        <span class="menu-text">@lang('layout.nav-pricing')</span>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">@lang('layout.nav-pricing')</span></span>
                            </li>
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
                                    <a href="https://cmlabs.co/{{ $local }}-id/pricing/political-campaign" class="menu-link"><span class="menu-text">@lang('layout.nav-pricing-political')</span></a>
                                </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true">
                    <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
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
                                <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
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
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/meta-generator" class="menu-link">
                                                <span class="menu-text">Meta Generator</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true">
                                <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
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
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/ping-tool" class="menu-link">
                                                <span class="menu-text">Ping Tool</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/http-header-checker" class="menu-link">
                                                <span class="menu-text">HTTP Header Checker</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/robotstxt-checker" class="menu-link">
                                                <span class="menu-text">Robots.TXT Checker</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-children" aria-haspopup="true">
                                            <a href="/{{ $local }}/serp-simulator" class="menu-link">
                                                <span class="menu-text">SERP Simulator</span>
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
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/{{ $local }}/plagiarism-checker" class="menu-link">
                                    <span class="menu-text">Plagiarism Checker</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true">
                    <a href="" class="menu-link menu-toggle btn dropdown-toggle align-items-center">
                        <span class="menu-text">@lang('layout.nav-tools-sequence')</span>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">@lang('layout.nav-pricing')</span></span>
                            </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://www.sequence.day/keyword-research" target="_blank" class="menu-link"><span class="menu-text">@lang('layout.nav-tools-sequence-1')</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://www.sequence.day/most-popular-indonesia-online-publisher" target="_blank" class="menu-link"><span class="menu-text">Most Popular Indonesia Online Publisher</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://www.sequence.day/people-and-brand-mention" target="_blank" class="menu-link"><span class="menu-text">Person and Brand Mention on Online Publisher</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://www.sequence.day/indonesia-online-publisher-sentiments" target="_blank" class="menu-link"><span class="menu-text">Sentiment Analysis</span></a>
                                </li>
                                <li class="menu-item menu-item-children" aria-haspopup="true">
                                    <a href="https://www.sequence.day/site-explorer" target="_blank" class="menu-link"><span class="menu-text">Site Explorer</span></a>
                                </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="https://cmlabs.co/en-id/cmlabs-surge" target="_blank" class="menu-link">
                        <span class="menu-text">cmlabs Surge</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://cmlabs.co/en-id/traffic-calculator" target="_blank" class="menu-link">
                        <span class="menu-text">Traffic Projection Calculator</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://app.sequence.day/auth/login" target="_blank" class="menu-link">
                        <span class="menu-text">@lang('layout.nav-stats-sequence')</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://career.cmlabs.co" target="_blank" class="menu-link">
                        <span class="menu-text">Career</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="aside-footer d-flex flex-column flex-column-auto">
            <div class="container-fluid">
                <div class="row border-top p-5">
                    <div class="col-12 text-center">
                        <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google')}}" class="btn btn-block btn-cmlabs-login mr-3">@lang('layout.button-login')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
