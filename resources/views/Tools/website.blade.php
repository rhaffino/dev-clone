@extends('layouts.app')

@section('title', Lang::get('website.meta-title'))

@section('meta-desc', Lang::get('website.meta-desc'))

@section('conical','/en/json-ld-website-schema-generator')

@section('en-link')
en/json-ld-website-schema-generator
@endsection

@section('id-link')
id/json-ld-website-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('website.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('website.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue custom-searchbox" tabindex="null" data-size="4" data-live-search="true" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                        <option value="website" selected="selected">Website</option>
                                        <option value="local-business">Local Business</option>
                                        <option value="video">Video</option>
                                        <option value="event">Event</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Website Generator</p>
                            <form action="" id="form-breadcrumb">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <label for="websiteName" class="font-weight-bold text-black">@lang('website.label-name-website')</label>
                                                <input type="text" id="webisteName" class="form-control websiteName" name="" placeholder="{{ Lang::get('website.placeholder-websiteName') }}" value="">
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <label for="url" class="font-weight-bold text-black">URL</label>
                                                <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-url') }}" value="">
                                                <div class="invalid-feedback url">@lang('layout.invalid-url')</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 mb-5">
                                                <label for="queryUrl" class="font-weight-bold text-black">@lang('website.label-internal-site-search')</label>
                                                <input type="text" id="queryUrl" class="form-control queryUrl" name="" placeholder="{{ Lang::get('website.placeholder-internalSiteSearch') }}" value="">
                                                <div class="invalid-feedback queryUrl">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-12 mb-5">
                                                <label for="queryKeywords" class="font-weight-bold text-black">@lang('website.label-query-keywords')</label>
                                                <input type="text" id="queryKeywords" class="form-control queryKeywords" name="" placeholder="{{ Lang::get('website.placeholder-queryKeywords') }}" value="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" style="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
                                    <div class="row mb-2">
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="copy" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-copy'></i> <span>@lang('layout.btn-copy')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="submit" id="test" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-check-circle'></i> <span>@lang('layout.btn-check')</span></button>
                                        </div>
                                        <div id="reset" class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" class="btn font-weight-bold reset" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" data-key="{{time()}}" readonly></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('website.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
    <div class="local-collection-mobile bg-white py-5">
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('website.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'JSON-LD Website Schema Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('website.desc-1')</h2>
            <p>@lang('website.desc-1-1')</p>
            <p>@lang('website.desc-1-2')</p>
        </div>
        @endslot
        @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p>@lang('website.desc-1-3')</p>
            <p>@lang('website.desc-1-4')</p>
            <p>@lang('website.desc-1-5')</p>
            <p>@lang('website.desc-1-6')</p>
            <h2>@lang('website.desc-2')</h2>
            <p>@lang('website.desc-2-1')</p>
            <p>@lang('website.desc-2-2')</p>
            <p>@lang('website.desc-2-3')</p>
            <p>@lang('website.desc-2-4')</p>
            <h4 class="sub-titles">@lang('website.desc-2-2-1')</h4>
            <p>@lang('website.desc-2-2-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-3-1')</h4>
            <p>@lang('website.desc-2-3-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-4-1')</h4>
            <p>@lang('website.desc-2-4-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-5-1')</h4>
            <p>@lang('website.desc-2-5-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-6-1')</h4>
            <p>@lang('website.desc-2-6-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-7-1')</h4>
            <p>@lang('website.desc-2-7-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-8-1')</h4>
            <p>@lang('website.desc-2-8-2')</p>
            <p>@lang('website.desc-2-8-3')</p>
            <h4 class="sub-titles">@lang('website.desc-2-9-1')</h4>
            <p>@lang('website.desc-2-9-2')</p>
            <h4 class="sub-titles">@lang('website.desc-2-10-1')</h4>
            <p>@lang('website.desc-2-10-2')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('website.desc-3')</h2>
            <p>@lang('website.desc-3-1')</p>
            <p>@lang('website.desc-3-2')</p>
            <p>@lang('website.desc-3-3')</p>
            <p>@lang('website.desc-3-4')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                    {
                        "@context": "https://schema.org/",
                        "@type": "WebSite",
                        "name": "",
                        "url": "",
                        "potentialAction": {
                            "@type": "SearchAction",
                            "target": "{search_term_string}",
                            "query-input": "required name=search_term_string"
                        }
                    }
                    &lt;/script&gt;
                </code>
            </pre>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('website.howto1')
            <div class="expand-text">
                <img class="mb-4" src="{{asset('/media/images/website_schema_instruction_1.webp')}}" alt="HowTo-Website-Schema-1" width="80%">
                @lang('website.howto1-1')
                @lang('website.howto2')
                <img class="mb-4" src="{{asset('/media/images/website_schema_instruction_2.webp')}}" alt="HowTo-Website-Schema-2" width="80%">
                @lang('website.howto3')
                <img class="mb-4" src="{{asset('/media/images/website_schema_instruction_3.webp')}}" alt="HowTo-Website-Schema-3" width="80%">
                @lang('website.howto4')
                <img class="mb-4" src="{{asset('/media/images/website_schema_instruction_4.webp')}}" alt="HowTo-Website-Schema-4" width="80%">
                @lang('website.howto5')
                <img class="mb-4" src="{{asset('/media/images/website_schema_instruction_5.webp')}}" alt="HowTo-Website-Schema-5" width="80%">
                @lang('website.howto6')
                <p>@lang('website.closing-1')</p>
                <p>@lang('website.closing-2')</p>
            </div>
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
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "JSON-LD Website Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-website-schema-generator"
        }]
    }
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = 'Show less';
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = 'Read more';
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/website-json.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush

@section('json-ld')
active
@endsection
