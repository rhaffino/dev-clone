@extends('layouts.app')

@section('title', Lang::get('jsonldhome.meta-title'))

@section('meta-desc', Lang::get('jsonldhome.meta-desc'))

@section('conical','/en/json-ld-schema-generator')

@section('en-link')
en/json-ld-schema-generator
@endsection

@section('id-link')
id/json-ld-schema-generator
@endsection

@section('content')
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="text-center">
                <h1 class="text-black font-weight-light">@lang('jsonldhome.title')</h1>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="text-black font-weight-light">@lang('jsonldhome.sub-title')</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-chevron-right-square bx-lg text-darkgrey'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Breadcrumb</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-breadcrumb-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-breadcrumb-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-help-circle text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">FAQ Page</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-faq-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-faq-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bx-list-check text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">How-to</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-howto-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-how-to-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-briefcase text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Job Posting</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-jobposting-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-job-posting-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-user text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Person</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-person-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-person-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-purchase-tag text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Product</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-product-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-product-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-receipt text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Recipe</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-recipe-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-recipe-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bx-globe text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Website</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-website-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-website-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-store text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Local Business</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-local-business-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-local-business-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-video text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Video</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-video-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-video-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-calendar-event text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Event</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-event-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-event-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-8">
                    <div class="card card-custom card-stretch card-home">
                        <div class="card-body p-7">
                            <div class="">
                                <i class='bx bxs-business text-darkgrey bx-lg'></i>
                                <h2 class="h6 text-darkgrey font-weight-bolder">Organization</h2>
                                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-organization-desc')</p>
                            </div>
                        </div>
                        <div class="card-footer text-right border-top-0 pt-0">
                            <a href="/{{ $local }}/json-ld-organization-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                <span class="text-darkgrey">@lang('layout.whats-new-update') 3 Oct, 2023 | @lang('layout.version') 1.0</span>
            </div>
        </div>
    </div>
</div>

@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'JSON-LD')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h3 class="h3-700 h3-m-700">@lang('jsonldhome.desc-1')</h3>
            <p>@lang('jsonldhome.desc-1-1')</p>
            <p>@lang('jsonldhome.desc-1-2')</p>
            <p>@lang('jsonldhome.desc-1-3')</p>
            <p>@lang('jsonldhome.desc-1-3-1')</p>
            <p>@lang('jsonldhome.desc-1-3-1-1')</p>
            <p>@lang('jsonldhome.desc-1-3-2')</p>
            <p>@lang('jsonldhome.desc-1-3-2-1')</p>
            <p>@lang('jsonldhome.desc-1-4')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h3 class="h3-700 h3-m-700">@lang('jsonldhome.desc-2')</h3>
            <p>@lang('jsonldhome.desc-2-1')</p>
            <p>@lang('jsonldhome.desc-2-2')</p>
            <p>@lang('jsonldhome.desc-2-3')</p>
            <p>@lang('jsonldhome.desc-2-4')</p>
            <p>@lang('jsonldhome.desc-2-5')</p>
            <p>@lang('jsonldhome.desc-2-6')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3" style="">
            <h3 class="h3-700 h3-m-700">@lang('jsonldhome.desc-3')</h3>
            <p>@lang('jsonldhome.desc-3-1')</p>
            <p>@lang('jsonldhome.desc-3-2')</p>
            <p>@lang('jsonldhome.desc-3-3')</p>
            <p>@lang('jsonldhome.desc-3-4')</p>
            <p>@lang('jsonldhome.desc-3-5')</p>
            <p>@lang('jsonldhome.desc-3-6')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                    {
                        "@context": "http://schema.org/",
                        "@type": "Product",
                        "name": "cmlabs SEO Tools",
                        "image": "https://tools.cmlabs.co/media/logos/new/new-logo-default.png",
                        "description": "Choose structured data for recipe, job posting and product schema and build the markup with JSON-LD Generator.",
                        "brand": {
                            "@type": "Thing",
                            "name": "cmlabs"
                        },
                        "offers": {
                            "@type": "Offer",
                            "priceCurrency": "USD",
                            "price": "79.00"
                        }
                    }
                    &lt;/script&gt;
                </code>
            </pre>
            <p>@lang('jsonldhome.desc-3-7')</p>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent

@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('layout.home')",
            "item": "{{url('/')}}/{{$local}}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }]
    }
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

@section('json-ld')
active
@endsection
