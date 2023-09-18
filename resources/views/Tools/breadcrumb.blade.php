@extends('layouts.app')

@section('title', Lang::get('breadcrumb.meta-title'))

@section('meta-desc', Lang::get('breadcrumb.meta-desc'))

@section('conical','/en/json-ld-breadcrumb-schema-generator')

@section('en-link')
en/json-ld-breadcrumb-schema-generator
@endsection

@section('id-link')
id/json-ld-breadcrumb-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('breadcrumb.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('breadcrumb.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue custom-searchbox" tabindex="null" data-size="4" data-live-search="true" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb" selected="selected">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                        <option value="website">Website</option>
                                        <option value="local-business">Local Business</option>
                                        <option value="video">Video</option>
                                        <option value="event">Event</option>
                                        <option value="organization">Organization</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Breadcrumb Generator</p>
                            <form action="" id="form-breadcrumb">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10 col-sm-11">
                                            <div class="row">
                                                <div class="col-sm-5 mb-5">
                                                    <label for="pageName" class="font-weight-bold text-black">@lang('breadcrumb.label-page') #1 @lang('breadcrumb.label-name')</label>
                                                    <input type="text" id="pageName" class="form-control pageName" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-pageName') }}" value="" data-id="0">
                                                </div>
                                                <div class="col-sm-7 mb-5">
                                                    <label for="url" class="font-weight-bold text-black">URL #1</label>
                                                    <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-url') }}" value="" data-id="0">
                                                    <div class="invalid-feedback" data-id="0">@lang('layout.invalid-url')</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled delete-bread'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 col-sm-11">
                                            <div class="row">
                                                <div class="col-sm-5 mb-5">
                                                    <label for="pageName" class="font-weight-bold text-black">@lang('breadcrumb.label-page') #2 @lang('breadcrumb.label-name')</label>
                                                    <input type="text" id="pageName" class="form-control pageName" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-pageName') }}" value="" data-id="1">
                                                </div>
                                                <div class="col-sm-7 mb-5">
                                                    <label for="url" class="font-weight-bold text-black">URL #2</label>
                                                    <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-url') }}" value="" data-id="1">
                                                    <div class="invalid-feedback" data-id="1">@lang('layout.invalid-url')</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled delete-bread'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="formbreadcrumb">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="add-breadcrumb">
                                    <i class='bx bx-plus'></i> @lang('breadcrumb.btn-add')
                                </button>
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
                    {{-- <div id="local-collection-desktop" class="local-collection">
            <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
              <div class="d-flex flex-row align-items-center">
                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                <span class="text-black font-15px">@lang('layout.local-history')</span>
              </div>
              <div onclick="clearAll()">
                <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
              </div>
            </div>
            <div class="local-collection-body">
              <ul class="list-group" id="localsavedesktop"></ul>
            </div>
          </div> --}}
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
                                        <p>@lang('breadcrumb.highlight')</p>
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
        {{--
    <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
      <div class="d-flex flex-row align-items-center">
        <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
        <span class="text-black font-15px">@lang('layout.local-history')</span>
      </div>
      <div>
        <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
      </div>
    </div>
    <div id="localsavemobile" class="local-collection-body mt-3 px-5"></div>
    --}}
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('breadcrumb.highlight')</p>
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
    @slot('title', 'JSON-LD Breadcrumb Schema Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('breadcrumb.desc-1')</h2>
            <p>@lang('breadcrumb.desc-1-1')</p>
            <p>@lang('breadcrumb.desc-1-2')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2>@lang('breadcrumb.desc-2')</h2>
            <p>@lang('breadcrumb.desc-2-1')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-2-2-1')</h4>
            <p>@lang('breadcrumb.desc-2-2-2')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-2-3-1')</h4>
            <p>@lang('breadcrumb.desc-2-3-2')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-2-4-1')</h4>
            <p>@lang('breadcrumb.desc-2-4-2')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('breadcrumb.desc-3')</h2>
            <p>@lang('breadcrumb.desc-3-1')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-3-2-1')</h4>
            <p>@lang('breadcrumb.desc-3-2-2')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-3-3-1')</h4>
            <p>@lang('breadcrumb.desc-3-3-2')</p>
            <h4 class="sub-titles">@lang('breadcrumb.desc-3-4-1')</h4>
            <p>@lang('breadcrumb.desc-3-4-2')</p>
        </div>
    @endslot
    @slot('subcontent_4')
        <div class="d-none" id="description-tab-4">
            <h2>@lang('breadcrumb.desc-4')</h2>
            <p>@lang('breadcrumb.desc-4-1')</p>
            <p>@lang('breadcrumb.desc-4-2')</p>
            <p>@lang('breadcrumb.desc-4-3')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                    {
                    "@context": "https://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "https://cmlabs.co/"
                    },{
                        "@type": "ListItem",
                        "position": 2,
                        "name": "About Us",
                        "item": "https://cmlabs.co/about-us/"
                    }]
                    }
                    &lt;/script&gt;
                </code>
            </pre>
        </div>
    @endslot
    @slot('subcontent_5')
        <div class="d-none" id="description-tab-5">
            <h2>@lang('breadcrumb.desc-5')</h2>
            <p>@lang('breadcrumb.desc-5-1')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('breadcrumb.howto1')
            <div class="expand-text">
                @lang('breadcrumb.howto1-1')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_1.webp')}}" alt="HowTo-Breadcrumb-1" width="80%">
                @lang('breadcrumb.howto2')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_2.webp')}}" alt="HowTo-Breadcrumb-2" width="80%">
                @lang('breadcrumb.howto3')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_3.webp')}}" alt="HowTo-Breadcrumb-3" width="80%">
                @lang('breadcrumb.howto4')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_4.webp')}}" alt="HowTo-Breadcrumb-4" width="80%">
                @lang('breadcrumb.howto5')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_5.webp')}}" alt="HowTo-Breadcrumb-5" width="80%">
                @lang('breadcrumb.howto6')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_6.webp')}}" alt="HowTo-Breadcrumb-6" width="80%">
                @lang('breadcrumb.howto7')
                <img class="mb-4" src="{{asset('/media/images/breadcrumb_instruction_7.webp')}}" alt="HowTo-Breadcrumb-7" width="80%">
                @lang('breadcrumb.howto8')
            </div>
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
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "JSON-LD Breadcrumb Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-breadcrumb-schema-generator"
        }]
    }
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    const description_4 = document.getElementById('description-tab-4');
    const description_5 = document.getElementById('description-tab-5');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            description_4.style.display = 'block';
            description_5.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            description_4.classList.remove("d-none");
            description_5.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            description_4.style.display = 'none';
            description_5.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            description_4.classList.add("d-none");
            description_5.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/breadcrumb-json.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush

@section('json-ld')
active
@endsection
