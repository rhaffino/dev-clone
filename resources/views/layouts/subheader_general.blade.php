<div class="subheader py-2 py-lg-2 subheader-solid custom-subheader custom-subheader-desktop" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <ul class="nav custom-nav" id="menu_tools_webmaster">
                    <li class="nav-item">
                        <a class="nav-link @yield('json-ld')" href="/{{ $local }}/json-ld-schema-generator">JSON-LD</a>
                    </li>
                    <li class="nav-item dropdown ml-7">
                        <a class="nav-link dropdown-toggle @yield('generator')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Generator</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item @yield('sitemap')" href="/{{ $local }}/sitemap-generator">Sitemap .XML Generator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item @yield('robotstxt-generator')" href="/{{ $local }}/robotstxt-generator">Robots .TXT Generator</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ml-7">
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
                            <a class="dropdown-item @yield('robotstxt-checker')" href="/{{ $local }}/robotstxt-checker">Robot.TXT Checker</a>
                        </div>
                    </li>
                    <li class="nav-item ml-7">
                        <a class="nav-link @yield('keyword-permutation')" href="/{{ $local }}/keyword-permutation">Keyword Permutation</a>
                    </li>
                    <li class="nav-item ml-7">
                        <a class="nav-link @yield('word-counter')" href="/{{ $local }}/word-counter">Word Counter</a>
                    </li>
                    <li class="nav-item ml-7">
                        <a class="nav-link @yield('title-checker')" href="/{{ $local }}/page-title-meta-description-checker">Title and Meta Checker</a>
                    </li>
                    @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false))
                        <li class="nav-item ml-7">
                            <a class="nav-link plagiarism @yield('plagiarism-checker')" href="/{{ $local }}/plagiarism-checker">Plagiarism Checker <span class="font-weight-light ml-1">by Copyscape</span></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center">
            {{-- <a href="{{ env('ANALYTICS_URL', 'https://app.cmlabs.co') }}" class="btn btn-custom-credit font-weight-bold mr-1">@lang('layout.button-register')</a> --}}
            {{-- <a href="{{ env('ANALYTICS_URL', 'https://app.cmlabs.co') }}" class="btn btn-custom-login ml-3"><b>@lang('layout.button-signin-1')</b> @lang('layout.button-signin-2')</a> --}}
        </div>
    </div>
</div>
