@php
    $tools = [
        [
            'title' => 'Word Counter',
            'desc' => __('home.word-counter-desc'),
            'icon' => "<i class='text-purple-70 bx bx-calculator bx-md'></i>",
            'link' => 'word-counter',
        ],
        [
            'title' => 'Title & Lengths Checker',
            'desc' => __('home.meta-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-text bx-md'></i>",
            'link' => 'page-title-meta-description-checker',
        ],
        [
            'title' => 'JSON-LD Generator',
            'desc' => __('home.json-ld-desc'),
            'icon' => "<i class='text-purple-70 bx bx-code-curly bx-md'></i>",
            'link' => 'json-ld-schema-generator',
        ],
        [
            'title' => 'Page Speed Test',
            'desc' => __('home.pagespeed-desc'),
            'icon' => "<i class='text-purple-70 bx bx-timer bx-md'></i>",
            'link' => 'pagespeed-test',
        ],
        [
            'title' => 'Sitemap Generator',
            'desc' => __('home.sitemap-desc'),
            'icon' => "<i class='text-purple-70 bx bx-code-block bx-md'></i>",
            'link' => 'sitemap-generator',
        ],
        [
            'title' => 'Mobile Friendly Test',
            'desc' => __('home.mobile-friendly-desc'),
            'icon' => "<i class='text-purple-70 bx bx-mobile-alt bx-md'></i>",
            'link' => 'mobile-friendly-test',
        ],
        [
            'title' => 'SSL Checker',
            'desc' => __('home.ssl-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-check-shield bx-md'></i>",
            'link' => 'ssl-checker',
        ],
        [
            'title' => 'Robot.txt Generator',
            'desc' => __('home.robot-txt-desc'),
            'icon' => "<i class='text-purple-70 bx bx-mask bx-md'></i>",
            'link' => 'robotstxt-generator',
        ],
        [
            'title' => 'Redirect Chain Checker',
            'desc' => __('home.redirect-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-link bx-md'></i>",
            'link' => 'redirect-checker',
        ],
        [
            'title' => 'Technology Lookup',
            'desc' => __('home.technology-lookup-desc'),
            'icon' => "<i class='text-purple-70 bx bx-bot bx-md'></i>",
            'link' => 'technology-lookup',
        ],
        [
            'title' => 'Link Analyzer',
            'desc' => __('home.link-analyzer-desc'),
            'icon' => "<i class='text-purple-70 bx bx-md bx-globe'></i>",
            'link' => 'link-analyzer',
        ],
        [
            'title' => 'Hreflang Checker',
            'desc' => __('home.hreflang-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-file-find bx-md'></i>",
            'link' => 'hreflang-checker',
        ],
        [
            'title' => 'Keyword Permutation',
            'desc' => __('home.keyword-permutation-desc'),
            'icon' => "<i class='text-purple-70 bx bx-shape-circle bx-md'></i>",
            'link' => 'keyword-permutation',
        ],
    ];
@endphp

<div id="carouselToolsDesktop" class="carousel slide d-none d-lg-block" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach (collect($tools)->chunk(3) as $index => $item)
            <li data-target="#carouselToolsDesktop" data-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach (collect($tools)->chunk(3) as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row">
                    @foreach ($item as $tool)
                        <div class="col-4">
                            <div class="tools-card">
                                <div class="icon-container">
                                    {!! $tool['icon'] !!}
                                </div>
                                <div class="tools-card-body">
                                    <h3 class="h6-700 h6-m-700">{{ $tool['title'] }}</h3>
                                    <p class="s-400 text-dark-40">{{ $tool['desc'] }}</p>
                                    <a href="/{{ $local }}/{{ $tool['link'] }}"
                                        class="mt-8 b2-700 b2-m-700 text-dark-70"><u>@lang('plagiarism.launch')</u> <i
                                            class='bx bx-right-arrow-alt'></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<div id="carouselToolsMobile" class="carousel slide d-lg-none" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach (collect($tools)->chunk(2) as $index => $item)
            <li data-target="#carouselToolsMobile" data-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach (collect($tools)->chunk(2) as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row">
                    @foreach ($item as $tool)
                        <div class="col-6">
                            <div class="tools-card">
                                <div class="icon-container">
                                    {!! $tool['icon'] !!}
                                </div>
                                <div class="tools-card-body">
                                    <div class="d-flex flex-column">
                                        <h3 class="h6-700 h6-m-700">{{ $tool['title'] }}</h3>
                                        <p class="s-400 text-dark-40 mt-3">{{ $tool['desc'] }}</p>
                                    </div>
                                    <a href="/{{ $local }}/{{ $tool['link'] }}"
                                        class="mt-8 b2-700 b2-m-700 text-dark-70"><u>LAUNCH</u> <i
                                            class='bx bx-right-arrow-alt'></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
