@php
    $tools = [
        [
            'title' => 'Word Counter',
            'desc' => __('home.word-counter-desc'),
            'icon' => "<i class='text-purple-70 bx bx-calculator bx-sm'></i>",
            'link' => 'word-counter',
        ],
        [
            'title' => 'Title & Lengths Checker',
            'desc' => __('home.meta-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-text bx-sm'></i>",
            'link' => 'page-title-meta-description-checker',
        ],
        [
            'title' => 'JSON-LD Generator',
            'desc' => __('home.json-ld-desc'),
            'icon' => "<i class='text-purple-70 bx bx-code-curly bx-sm'></i>",
            'link' => 'json-ld-schema-generator',
        ],
        [
            'title' => 'Page Speed Test',
            'desc' => __('home.pagespeed-desc'),
            'icon' => "<i class='text-purple-70 bx bx-timer bx-sm'></i>",
            'link' => 'pagespeed-test',
        ],
        [
            'title' => 'Sitemap Generator',
            'desc' => __('home.sitemap-desc'),
            'icon' => "<i class='text-purple-70 bx bx-code-block bx-sm'></i>",
            'link' => 'sitemap-generator',
        ],
        [
            'title' => 'Mobile Friendly Test',
            'desc' => __('home.mobile-friendly-desc'),
            'icon' => "<i class='text-purple-70 bx bx-mobile-alt bx-sm'></i>",
            'link' => 'mobile-friendly-test',
        ],
        [
            'title' => 'SSL Checker',
            'desc' => __('home.ssl-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-check-shield bx-sm'></i>",
            'link' => 'ssl-checker',
        ],
        [
            'title' => 'Robot.txt Generator',
            'desc' => __('home.robot-txt-desc'),
            'icon' => "<i class='text-purple-70 bx bx-mask bx-sm'></i>",
            'link' => 'robotstxt-generator',
        ],
        [
            'title' => 'Redirect Chain Checker',
            'desc' => __('home.redirect-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-link bx-sm'></i>",
            'link' => 'redirect-checker',
        ],
        [
            'title' => 'Technology Lookup',
            'desc' => __('home.technology-lookup-desc'),
            'icon' => "<i class='text-purple-70 bx bx-bot bx-sm'></i>",
            'link' => 'technology-lookup',
        ],
        [
            'title' => 'Link Analyzer',
            'desc' => __('home.link-analyzer-desc'),
            'icon' => "<i class='text-purple-70 bx bx-sm bx-globe'></i>",
            'link' => 'link-analyzer',
        ],
        [
            'title' => 'Hreflang Checker',
            'desc' => __('home.hreflang-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-file-find bx-sm'></i>",
            'link' => 'hreflang-checker',
        ],
        [
            'title' => 'Keyword Permutation',
            'desc' => __('home.keyword-permutation-desc'),
            'icon' => "<i class='text-purple-70 bx bx-shape-circle bx-sm'></i>",
            'link' => 'keyword-permutation',
        ],
        [
            'title' => 'Ping Tool',
            'desc' => __('home.ping-tool-desc'),
            'icon' => "<i class='text-purple-70 bx bx-terminal bx-sm'></i>",
            'link' => 'ping-tool',
        ],
        [
            'title' => 'HTTP Header Checker',
            'desc' => __('home.http-header-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-code bx-sm'></i>",
            'link' => 'http-header-checker',
        ],
        [
            'title' => 'Robots.txt Checker',
            'desc' => __('home.robotstxt-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-list-check bx-sm'></i>",
            'link' => 'robotstxt-checker',
        ],
        [
            'title' => 'SERP Simulator',
            'desc' => __('home.serp-simulator-desc'),
            'icon' => "<i class='text-purple-70 bx bxl-google bx-sm'></i>",
            'link' => 'serp-simulator',
        ],
        [
            'title' => 'Meta Generator',
            'desc' => __('home.meta-generator-desc'),
            'icon' => "<i class='text-purple-70 bx bx-purchase-tag-alt bx-sm'></i>",
            'link' => 'meta-generator',
        ],
        [
            'title' => 'Plagiarism Checker',
            'desc' => __('home.plagiarism-checker-desc'),
            'icon' => "<i class='text-purple-70 bx bx-shape-circle bx-sm'></i>",
            'link' => 'plagiarism-checker',
        ],
    ];
@endphp

<div id="carouselToolsDesktop" class="carousel slide d-none d-lg-block" data-ride="carousel">
    <ol class="carousel-indicators survey">
        @foreach (collect($tools)->chunk(3) as $index => $item)
            @if ($index === 6)
                @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false))
                    <li data-target="#carouselToolsDesktop" data-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}">
                        <span></span>
                    </li>
                @endif
            @else
                <li data-target="#carouselToolsDesktop" data-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}">
                    <span></span>
                </li>
            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach (collect($tools)->chunk(3) as $index => $item)
            @if ($index === 6)
                @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false))
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($item as $tool)
                                <div class="col-4">
                                    <div class="tools-card">
                                        <div class="icon-container">
                                            {!! $tool['icon'] !!}
                                        </div>
                                        <div class="tools-card-body">
                                            <h3 class="b1-500 b1-m-500 m-0">{{ $tool['title'] }}</h3>
                                            <p class="s-400 text-dark-40">{{ $tool['desc'] }}</p>
                                            <a href="/{{ $local }}/{{ $tool['link'] }}"
                                                class="mt-8 b2-700 b2-m-700 text-dark-70 d-flex align-items-center"><u>@lang('plagiarism.launch')</u>
                                                <i class='bx bx-right-arrow-alt'></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($item as $tool)
                            <div class="col-4">
                                <div class="tools-card">
                                    <div class="icon-container">
                                        {!! $tool['icon'] !!}
                                    </div>
                                    <div class="tools-card-body">
                                        <h3 class="b1-500 b1-m-500 m-0">{{ $tool['title'] }}</h3>
                                        <p class="s-400 text-dark-40">{{ $tool['desc'] }}</p>
                                        <a href="/{{ $local }}/{{ $tool['link'] }}"
                                            class="mt-8 b2-700 b2-m-700 text-dark-70 d-flex align-items-center"><u>@lang('plagiarism.launch')</u>
                                            <i class='bx bx-right-arrow-alt'></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div id="carouselToolsMobile" class="carousel slide d-lg-none" data-ride="carousel">
    <ol class="carousel-indicators survey">
        @foreach (collect($tools)->chunk(2) as $index => $item)
            @if ($index === 9)
                @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false))
                    <li data-target="#carouselToolsMobile" data-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}">
                        <span></span>
                    </li>
                @endif
            @else
                <li data-target="#carouselToolsMobile" data-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}">
                    <span></span>
                </li>
            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach (collect($tools)->chunk(2) as $index => $item)
            @if ($index === 9)
                @if (auth()->check() && (auth()->check() ? auth()->user()->user_role_id == 3 : false))
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
                                                <h3 class="b1-500 b1-m-500 m-0">{{ $tool['title'] }}</h3>
                                                <p class="s-400 text-dark-40 mt-1">{{ $tool['desc'] }}</p>
                                            </div>
                                            <a href="/{{ $local }}/{{ $tool['link'] }}"
                                                class="mt-8 b2-700 b2-m-700 text-dark-70 d-flex align-items-center"><u>LAUNCH</u>
                                                <i class='bx bx-right-arrow-alt'></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
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
                                            <h3 class="b1-500 b1-m-500 m-0">{{ $tool['title'] }}</h3>
                                            <p class="s-400 text-dark-40 mt-1">{{ $tool['desc'] }}</p>
                                        </div>
                                        <a href="/{{ $local }}/{{ $tool['link'] }}"
                                            class="mt-8 b2-700 b2-m-700 text-dark-70 d-flex align-items-center"><u>LAUNCH</u>
                                            <i class='bx bx-right-arrow-alt'></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

{{-- @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            initializeCarousel("carouselToolsDesktop")
            initializeCarousel("carouselToolsMobile")
        });
    </script>
@endpush --}}
