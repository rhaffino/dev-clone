<div class="subheader py-2 py-lg-2 subheader-solid custom-subheader custom-subheader-desktop" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5 max__content">
                <ul class="nav custom-nav" id="menu_tools_webmaster">
                    <li class="nav-item">
                        <a class="nav-link @yield('json-ld')" href="/{{ $local }}/json-ld-schema-generator">JSON-LD</a>
                    </li>
                    <li class="nav-item dropdown ml-7 medium__nav">
                        <a class="nav-link dropdown-toggle @yield('generator')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Generator</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item @yield('sitemap')" href="/{{ $local }}/sitemap-generator">Sitemap .XML Generator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('robotstxt-generator')" href="/{{ $local }}/robotstxt-generator">Robots .TXT Generator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('meta-generator')" href="/{{ $local }}/meta-generator">Meta Generator</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ml-7 medium__nav">
                        <a class="nav-link dropdown-toggle @yield('test-n-checker')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Test & Checker</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item @yield('page-speed')" href="/{{ $local }}/pagespeed-test">Page Speed Test</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('mobile-test')" href="/{{ $local }}/mobile-friendly-test">Mobile Friendly Test</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('ssl-checker')" href="/{{ $local }}/ssl-checker">SSL Certificate Checker</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('redirect-checker')" href="/{{ $local }}/redirect-checker">Redirect Chain Checker</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('hreflang-checker')" href="/{{ $local }}/hreflang-checker">Hreflang Checker</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('link-analyzer')" href="/{{ $local }}/link-analyzer">Link Analyzer</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('technology-lookup')" href="/{{ $local }}/technology-lookup">Technology Lookup</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('ping-tool')" href="/{{ $local }}/ping-tool">Ping Tool</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('header-checker')" href="/{{ $local }}/http-header-checker">HTTP Header Checker</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('robotstxt-checker')" href="/{{ $local }}/robotstxt-checker">Robots.TXT Checker</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('serp-simulator')" href="/{{ $local }}/serp-simulator">SERP Simulator</a>
                        </div>
                    </li>
                    <li class="nav-item ml-7">
                        <a class="nav-link @yield('keyword-permutation')" href="/{{ $local }}/keyword-permutation">Keyword Permutation</a>
                    </li>
                    <li class="nav-item dropdown ml-7 medium__nav">
                        <a class="nav-link dropdown-toggle @yield('writer-tools')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">@lang('layout.title-writer-tools')</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item @yield('word-counter')" href="/{{ $local }}/word-counter">Word Counter</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('title-checker')" href="/{{ $local }}/page-title-meta-description-checker">Title and Meta Checker</a>
                            {{-- @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false)) --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('plagiarism-checker')" href="/{{ $local }}/plagiarism-checker">Plagiarism Checker</a>
                            {{-- @endif --}}
                        </div>
                    </li>
                    <li class="nav-item ml-7 medium__nav">
                        <a class="nav-link relative" href="https://cmlabs.co/{{ $local }}-id/cmlabs-surge" target="_blank">cmlabs Surge <span class="new-indicator new__indicator-subheader"></span></a>
                    </li>
                    <li class="nav-item ml-7 medium__nav">
                        <a class="nav-link relative" href="https://cmlabs.co/{{ $local }}-id/traffic-calculator" target="_blank">Traffic Projection Calculator <span class="new-indicator new__indicator-subheader"></span></a>
                    </li>
                    <li class="nav-item ml-7 medium__nav">
                        <a class="nav-link relative" href="https://app.sequence.day/auth/login" target="_blank">@lang('layout.nav-stats-sequence') <span class="new-indicator new__indicator-subheader"></span></a>
                    </li>
                    <li class="nav-item dropdown ml-7 medium__nav">
                        <a class="nav-link dropdown-toggle relative @yield('sequence')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">@lang('layout.nav-tools-sequence') <span class="new-indicator new__indicator-subheader"></span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="https://www.sequence.day/keyword-research" target="_blank">Keyword Research</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.sequence.day/most-popular-indonesia-online-publisher" target="_blank">Most Popular Indonesia Online Publisher</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.sequence.day/people-and-brand-mention" target="_blank">Person and Brand Mention on Online Publisher</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.sequence.day/indonesia-online-publisher-sentiments" target="_blank">Sentiment Analysis</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.sequence.day/site-explorer" target="_blank">Site Explorer</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ml-7 medium__nav-more">
                        <a id="mega-menu-more" class="nav-link dropdown-toggle relative @yield('see-more')" href="#" role="button">@lang('layout.see-more') <span class="new-indicator new__indicator-subheader"></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center">
            {{-- <a href="{{ env('ANALYTICS_URL', 'https://app.cmlabs.co') }}" class="btn btn-custom-credit font-weight-bold mr-1">@lang('layout.button-register')</a> --}}
            {{-- <a href="{{ env('ANALYTICS_URL', 'https://app.cmlabs.co') }}" class="btn btn-custom-login ml-3"><b>@lang('layout.button-signin-1')</b> @lang('layout.button-signin-2')</a> --}}
        </div>
        
        <div class="collapse container__mega-menu" id="collapse-mega-menu-more">
            <div class="card card-body p-5">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <ul class="list-inline">
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://app.sequence.day/auth/login" target="_blank">@lang('layout.nav-stats-sequence') <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://cmlabs.co/{{ $local }}-id/cmlabs-surge" target="_blank">cmlabs Surge <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://cmlabs.co/{{ $local }}-id/traffic-calculator" target="_blank">Traffic Projection Calculator <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm">
                            <p class="title__mega-menu h3">Generator</p>
                            <ul class="list-inline">
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('sitemap')" href="/{{ $local }}/sitemap-generator">Sitemap .XML Generator</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('robotstxt-generator')" href="/{{ $local }}/robotstxt-generator">Robots .TXT Generator</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('meta-generator')" href="/{{ $local }}/meta-generator">Meta Generator</a>
                                </li>
                            </ul>

                            <p class="title__mega-menu h3">@lang('layout.title-writer-tools')</p>
                            <ul class="list-inline">
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('word-counter')" href="/{{ $local }}/word-counter">Word Counter</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('title-checker')" href="/{{ $local }}/page-title-meta-description-checker">Title and Meta Checker</a>
                                </li>
                                {{-- @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false)) --}}
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('plagiarism-checker')" href="/{{ $local }}}/plagiarism-checker">Plagiarism Checker</a>
                                </li>
                                {{-- @endif --}}
                            </ul>
                        </div>
                        <div class="col-sm">
                            <p class="title__mega-menu h3">Test & Checker</p>
                            <ul class="list-inline">
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('page-speed')" href="/{{ $local }}/pagespeed-test">Page Speed Test</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('mobile-test')" href="/{{ $local }}/mobile-friendly-test">Mobile Friendly Test</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('ssl-checker')" href="/{{ $local }}/ssl-checker">SSL Certificate Checker</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('redirect-checker')" href="/{{ $local }}/redirect-checker">Redirect Chain Checker</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('hreflang-checker')" href="/{{ $local }}/hreflang-checker">Hreflang Checker</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('link-analyzer')" href="/{{ $local }}/link-analyzer">Link Analyzer</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('technology-lookup')" href="/{{ $local }}/technology-lookup">Technology Lookup</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('ping-tool')" href="/{{ $local }}/ping-tool">Ping Tool</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('header-checker')" href="/{{ $local }}/http-header-checker">HTTP Header Checker</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('robotstxt-checker')" href="/{{ $local }}/robotstxt-checker">Robots.TXT Checker</a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu @yield('serp-simulator')" href="/{{ $local }}/serp-simulator">SERP Simulator</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm">
                            <p class="title__mega-menu h3">@lang('layout.nav-tools-sequence')</p>
                            <ul class="list-inline">
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://www.sequence.day/keyword-research" target="_blank">@lang('layout.nav-tools-sequence-1') <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://www.sequence.day/most-popular-indonesia-online-publisher" target="_blank">Most Popular Indonesia Online Publisher <span class="new-indicator new__indicator-megamenu new__indicator-megamenu-popular"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://www.sequence.day/people-and-brand-mention" target="_blank">Person and Brand Mention on Online Publisher <span class="new-indicator new__indicator-megamenu new__indicator-megamenu-brand"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://www.sequence.day/indonesia-online-publisher-sentiments" target="_blank">Sentiment Analysis <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                                <li>
                                    <a class="list-inline-item list__mega-menu relative" href="https://www.sequence.day/site-explorer" target="_blank">Site Explorer <span class="new-indicator new__indicator-megamenu"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>