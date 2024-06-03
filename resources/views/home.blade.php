@extends('layouts.app')

@section('title', Lang::get('home.meta-title'))

@section('meta-desc', Lang::get('home.meta-desc'))

@section('conical','/en')

@section('en-link')
en
@endsection

@section('id-link')
id
@endsection

@php
    $tools = [
    [
        'icon' => 'bx bx-calculator',
        'title' => 'Word Counter',
        'description' => __('home.word-counter-desc'),
        'link' => "/{{ $local }}/word-counter"
    ],
    [
        'icon' => 'bx bx-text',
        'title' => 'Title & Lengths Checker',
        'description' => __('home.meta-checker-desc'),
        'link' => "/{{ $local }}/page-title-meta-description-checker",
        'ext' => 'https://chromewebstore.google.com/detail/title-meta-description-ch/bhncaplgjfhllfadbkeigmfnpilkmbgh',
    ],
    [
        'icon' => 'bx bx-code-curly',
        'title' => 'JSON-LD Generator',
        'description' => __('home.json-ld-desc'),
        'link' => "/{{ $local }}/json-ld-schema-generator",
    ],
    [
        'icon' => 'bx bx-timer',
        'title' => 'Page Speed Test',
        'description' => __('home.pagespeed-desc'),
        'link' => "/{{ $local }}/pagespeed-test",
        'ext' => 'https://chromewebstore.google.com/detail/pagespeed-test-cmlabs-seo/nobbcbccegiignfcapabdeegmaehhifo',
    ],
    [
        'icon' => 'bx bx-code-block',
        'title' => 'Sitemap Generator',
        'description' => __('home.sitemap-desc'),
        'link' => "/{{ $local }}/sitemap-generator",        
    ],
    [
        'icon' => 'bx bx-mobile-alt',
        'title' => 'Mobile Friendly Test',
        'description' => __('home.mobile-friendly-desc'),
        'link' => "/{{ $local }}/mobile-friendly-test",        
    ],
    [
        'icon' => 'bx bx-check-shield',
        'title' => 'SSL Checker',
        'description' => __('home.ssl-checker-desc'),
        'link' => "/{{ $local }}/ssl-checker",
        'ext' => 'https://chromewebstore.google.com/detail/ssl-checker-cmlabs-seo-to/cadoggliajpmopeepmlamhefgkobljfl',
    ],
    [
        'icon' => 'bx bx-mask',
        'title' => 'Robots.txt Generator',
        'description' => __('home.robot-txt-desc'),
        'link' => "/{{ $local }}/robotstxt-generator",        
    ],
    [
        'icon' => 'bx bx-link',
        'title' => 'Redirect Chain Checker',
        'description' => __('home.redirect-checker-desc'),
        'link' => "/{{ $local }}/redirect-checker",
        'ext' => 'https://chromewebstore.google.com/detail/robotstxt-checker-cmlabs/boiflndbjkenhmlbgbdnfebpooigmnkc',
    ],
    [
        'icon' => 'bx bx-bot',
        'title' => 'Technology Lookup',
        'description' => __('home.technology-lookup-desc'),
        'link' => "/{{ $local }}/technology-lookup",
        'ext' => 'https://chromewebstore.google.com/detail/technology-lookup-cmlabs/hhknkhcgnkdkkafiaicdfpiplbigodmj',
    ],
    [
        'icon' => 'bx bx-globe',
        'title' => 'Link Analyzer',
        'description' => __('home.link-analyzer-desc'),
        'link' => "/{{ $local }}/link-analyzer",
        'ext' => 'https://chromewebstore.google.com/detail/link-analyzer-cmlabs-seo/fllajeihhfpfpebnbkplefdofjpdkoim',
    ],
    [
        'icon' => 'bx bx-file-find',
        'title' => 'Hreflang Checker',
        'description' => __('home.hreflang-checker-desc'),
        'link' => "/{{ $local }}/hreflang-checker",
        'ext' => 'https://chromewebstore.google.com/detail/hreflang-checker-cmlabs-s/bbiejobgmmjcjbnbabamojimombaoiij',
    ],
    [
        'icon' => 'bx bx-shape-circle',
        'title' => 'Keyword Permutation',
        'description' => __('home.keyword-permutation-desc'),
        'link' => "/{{ $local }}/keyword-permutation",        
    ],
    [
        'icon' => 'bx bx-terminal',
        'title' => 'Ping Tool',
        'description' => __('home.ping-tool-desc'),
        'link' => "/{{ $local }}/ping-tool",
        'ext' => 'https://chromewebstore.google.com/detail/ping-checker-cmlabs-seo-t/lepccdjicogieagnblakpemnhcghhlob',
    ],
    [
        'icon' => 'bx bx-code',
        'title' => 'HTTP Header Checker',
        'description' => __('home.http-header-checker-desc'),
        'link' => "/{{ $local }}/http-header-checker",
        'ext' => 'https://chromewebstore.google.com/detail/http-header-checker-cmlab/anheghnibajoikjegiciidlmnnffecha',
    ],
    [
        'icon' => 'bx bx-list-check',
        'title' => 'Robots.txt Checker',
        'description' => __('home.robotstxt-checker-desc'),
        'link' => "/{{ $local }}/robotstxt-checker",
        'ext' => 'https://chromewebstore.google.com/detail/robotstxt-checker-cmlabs/boiflndbjkenhmlbgbdnfebpooigmnkc',
    ],
    [
        'icon' => 'bxl-google',
        'title' => 'SERP Simulator',
        'description' => __('home.serp-simulator-desc'),
        'link' => "/{{ $local }}/serp-simulator",        
    ],
    [
        'icon' => 'bx bx-purchase-tag-alt',
        'title' => 'Meta Generator',
        'description' => __('home.meta-generator-desc'),
        'link' => "/{{ $local }}/meta-generator",        
    ],
];
@endphp

@section('content')
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="text-center">
                <h1 class="text-black font-weight-bold display-4">@lang('home.title')</h1>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="text-black">@lang('home.sub-title')</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 row">
                @foreach($tools as $tool)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home p-7">
                        <div class="card-body p-0">
                            <div class="text-left">
                                <i class='text-darkgrey {{ $tool['icon'] }} bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">{{ $tool['title'] }}</h2>
                                <p class="text-darkgrey mb-0">{{ $tool['description'] }}</p>
                            </div>
                        </div>
                        <div class="card-footer text-left border-top-0 p-0 mt-5 d-flex">
                            <a href="{{ $tool['link'] }}" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                            @isset($tool['ext'])
                                <a href="{{ $tool['ext'] }}" type="button" class="btn btn-install" name="button">
                                    <div class="install-cta">Install now</div>
                                    <div class="install-cta-desc">Browser Extension, Chromium-based</div>
                                </a>
                            @endisset
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            {{-- <div class="d-flex align-items-center">
                <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                <span class="text-darkgrey">@lang('home.last-update') 13 Oct, 2023 | @lang('layout.version') 2.0</span>
            </div> --}}
            <div class="mt-3">
                @include('v2.components.chrome-extension')
            </div>
        </div>
    </div>
</div>
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'Free SEO Tools by CMLABS')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('home.desc-1')</h2>
            <ul>
                <li>@lang('home.desc-1-1')</li>
                <li>@lang('home.desc-1-2')</li>
                <li>@lang('home.desc-1-3')</li>
                <li>@lang('home.desc-1-4')</li>
                <li>@lang('home.desc-1-5')</li>
            </ul>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2>@lang('home.desc-2')</h2>
            <h3>@lang('home.desc-2-1')</h3>
            <ol>
                <li>@lang('home.desc-2-1-1')</li>
                <li>@lang('home.desc-2-1-2')</li>
                <li>@lang('home.desc-2-1-3')</li>
                <li>@lang('home.desc-2-1-4')</li>
            </ol>
            <h3>@lang('home.desc-2-2')</h3>
            <ol>
                <li>@lang('home.desc-2-2-1')</li>
                <li>@lang('home.desc-2-2-2')</li>
                <li>@lang('home.desc-2-2-3')</li>
                <li>@lang('home.desc-2-2-4')</li>
            </ol>
            <h3>@lang('home.desc-2-3')</h3>
            <h4>@lang('home.desc-2-3-1')</h4>
            <ol>
                <li>@lang('home.desc-2-3-1-1')</li>
                <li>@lang('home.desc-2-3-1-2')</li>
                <li>@lang('home.desc-2-3-1-3')</li>
                <li>@lang('home.desc-2-3-1-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-2')</h4>
            <ol>
                <li>@lang('home.desc-2-3-2-1')</li>
                <li>@lang('home.desc-2-3-2-2')</li>
                <li>@lang('home.desc-2-3-2-3')</li>
                <li>@lang('home.desc-2-3-2-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-3')</h4>
            <ol>
                <li>@lang('home.desc-2-3-3-1')</li>
                <li>@lang('home.desc-2-3-3-2')</li>
                <li>@lang('home.desc-2-3-3-3')</li>
                <li>@lang('home.desc-2-3-3-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-4')</h4>
            <ol>
                <li>@lang('home.desc-2-3-4-1')</li>
                <li>@lang('home.desc-2-3-4-2')</li>
                <li>@lang('home.desc-2-3-4-3')</li>
                <li>@lang('home.desc-2-3-4-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-5')</h4>
            <ol>
                <li>@lang('home.desc-2-3-5-1')</li>
                <li>@lang('home.desc-2-3-5-2')</li>
                <li>@lang('home.desc-2-3-5-3')</li>
                <li>@lang('home.desc-2-3-5-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-6')</h4>
            <ol>
                <li>@lang('home.desc-2-3-6-1')</li>
                <li>@lang('home.desc-2-3-6-2')</li>
                <li>@lang('home.desc-2-3-6-3')</li>
                <li>@lang('home.desc-2-3-6-4')</li>
            </ol>
            <h4>@lang('home.desc-2-3-7')</h4>
            <ol>
                <li>@lang('home.desc-2-3-7-1')</li>
                <li>@lang('home.desc-2-3-7-2')</li>
                <li>@lang('home.desc-2-3-7-3')</li>
                <li>@lang('home.desc-2-3-7-4')</li>
            </ol>
            <h3>@lang('home.desc-2-4')</h3>
            <ol>
                <li>@lang('home.desc-2-4-1')</li>
                <li>@lang('home.desc-2-4-2')</li>
                <li>@lang('home.desc-2-4-3')</li>
                <li>@lang('home.desc-2-4-4')</li>
            </ol>
            <h3>@lang('home.desc-2-5')</h3>
            <ol>
                <li>@lang('home.desc-2-5-1')</li>
                <li>@lang('home.desc-2-5-2')</li>
                <li>@lang('home.desc-2-5-3')</li>
                <li>@lang('home.desc-2-5-4')</li>
            </ol>
            <h3>@lang('home.desc-2-6')</h3>
            <ol>
                <li>@lang('home.desc-2-6-1')</li>
                <li>@lang('home.desc-2-6-2')</li>
                <li>@lang('home.desc-2-6-3')</li>
                <li>@lang('home.desc-2-6-4')</li>
            </ol>
            <h3>@lang('home.desc-2-7')</h3>
            <ol>
                <li>@lang('home.desc-2-7-1')</li>
                <li>@lang('home.desc-2-7-2')</li>
                <li>@lang('home.desc-2-7-3')</li>
            </ol>
            <h3>@lang('home.desc-2-8')</h3>
            <ol>
                <li>@lang('home.desc-2-8-1')</li>
                <li>@lang('home.desc-2-8-2')</li>
                <li>@lang('home.desc-2-8-3')</li>
                <li>@lang('home.desc-2-8-4')</li>
                <li>@lang('home.desc-2-8-5')</li>
                <li>@lang('home.desc-2-8-6')</li>
                <li>@lang('home.desc-2-8-7')</li>
            </ol>
            <h3>@lang('home.desc-2-9')</h3>
            <ol>
                <li>@lang('home.desc-2-9-1')</li>
                <li>@lang('home.desc-2-9-2')</li>
                <li>@lang('home.desc-2-9-3')</li>
                <li>@lang('home.desc-2-9-4')</li>
            </ol>
            <h3>@lang('home.desc-2-10')</h3>
            <ol>
                <li>@lang('home.desc-2-10-1')</li>
                <li>@lang('home.desc-2-10-2')</li>
                <li>@lang('home.desc-2-10-3')</li>
                <li>@lang('home.desc-2-10-4')</li>
            </ol>
            <h3>@lang('home.desc-2-11')</h3>
            <ol>
                <li>@lang('home.desc-2-11-1')</li>
                <li>@lang('home.desc-2-11-2')</li>
                <li>@lang('home.desc-2-11-3')</li>
                <li>@lang('home.desc-2-11-4')</li>
            </ol>
            <h3>@lang('home.desc-2-12')</h3>
            <ol>
                <li>@lang('home.desc-2-12-1')</li>
                <li>@lang('home.desc-2-12-2')</li>
                <li>@lang('home.desc-2-12-3')</li>
                <li>@lang('home.desc-2-12-4')</li>
            </ol>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('home.desc-3')</h2>
            <h3>@lang('home.desc-3-1')</h3>
            <p>@lang('home.desc-3-1-1')</p>
            <p>@lang('home.desc-3-1-2')</p>
            <p>@lang('home.desc-3-1-3')</p>
            <h3>@lang('home.desc-3-2')</h3>
            <p>@lang('home.desc-3-2-1')</p>
            <p>@lang('home.desc-3-2-2')</p>
            <p>@lang('home.desc-3-2-3')</p>
            <p>@lang('home.desc-3-2-4')</p>
            <p>@lang('home.desc-3-2-5')</p>
            <p>@lang('home.desc-3-2-6')</p>
            <p>@lang('home.desc-3-2-7')</p>
            <p>@lang('home.desc-3-2-8')</p>
            <h3>@lang('home.desc-3-3')</h3>
            <ol>
                <li>@lang('home.desc-3-3-1')</li>
                <li>@lang('home.desc-3-3-2')</li>
                <li>@lang('home.desc-3-3-3')</li>
            </ol>
            <h3>@lang('home.desc-3-4')</h3>
            <p>@lang('home.desc-3-4-1')</p>
            <p>@lang('home.desc-3-4-2')</p>
            <p>@lang('home.desc-3-4-3')</p>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('layout.home')",
            "item": "{{url('/')}}/{{$local}}"
        }]
    }
</script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush

@section('home')
active
@endsection
