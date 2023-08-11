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
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-calculator bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Word Counter</h2>
                                <p class="text-darkgrey mb-0">@lang('home.word-counter-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/word-counter" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-text bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Title & Lengths Checker</h2>
                                <p class="text-darkgrey mb-0">@lang('home.meta-checker-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/page-title-meta-description-checker" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-code-curly bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">JSON-LD Generator</h2>
                                <p class="text-darkgrey mb-0">@lang('home.json-ld-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-timer bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Page Speed Test</h2>
                                <p class="text-darkgrey mb-0">@lang('home.pagespeed-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/pagespeed-test" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">

                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-code-block bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Sitemap Generator</h2>
                                <p class="text-darkgrey mb-0">@lang('home.sitemap-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/sitemap-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-mobile-alt bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Mobile Friendly Test</h2>
                                <p class="text-darkgrey mb-0">@lang('home.mobile-friendly-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/mobile-friendly-test" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-check-shield bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">SSL Checker</h2>
                                <p class="text-darkgrey mb-0">@lang('home.ssl-checker-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/ssl-checker" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-mask bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Robot.txt Generator</h2>
                                <p class="text-darkgrey mb-0">@lang('home.robot-txt-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/robotstxt-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-link bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Redirect Chain Checker</h2>
                                <p class="text-darkgrey mb-0">@lang('home.redirect-checker-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/redirect-checker" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-bot bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Technology Lookup</h2>
                                <p class="text-darkgrey mb-0">@lang('home.technology-lookup-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/technology-lookup" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-lg bx-globe'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Link Analyzer</h2>
                                <p class="text-darkgrey mb-0">@lang('home.link-analyzer-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/link-analyzer" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-file-find bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Hreflang Checker</h2>
                                <p class="text-darkgrey mb-0">@lang('home.hreflang-checker-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/hreflang-checker" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                    {{--

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-test-tube bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Keyword Research</h2>
                                <p class="text-darkgrey">JSON-LD Generator adalah sebuah tools yang dibuat oleh cmlabs untuk memudahkan user.</p>
                                <a href="/{{ $local }}/keyword-research" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                            </div>
                        </div>
                    </div>
                </div>
                --}}
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="text-center">
                                <i class='text-darkgrey bx bx-shape-circle bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Keyword Permutation</h2>
                                <p class="text-darkgrey mb-0">@lang('home.keyword-permutation-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top-0 pt-0">
                            <a href="/{{ $local }}/keyword-permutation" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                <span class="text-darkgrey">@lang('home.last-update') 15 Mar, 2021 | @lang('layout.version') 1.0</span>
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
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">Read more</p>
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
            read_more_button.innerHTML = 'Show less';
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            read_more_button.innerHTML = 'Read more';
            read = false;
        }
    });
</script>
@endpush

@section('home')
active
@endsection
