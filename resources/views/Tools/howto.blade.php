@extends('layouts.app')

@section('title', Lang::get('howto.meta-title'))

@section('meta-desc', Lang::get('howto.meta-desc'))

@section('conical','/en/json-ld-how-to-schema-generator')

@section('en-link')
en/json-ld-how-to-schema-generator
@endsection

@section('id-link')
id/json-ld-how-to-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('howto.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('howto.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="text-black font-weight-bold h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to" selected="selected">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">How-to</p>
                            <div class="howto-form">

                                <div id="formhowto">
                                    <div class="row">
                                        <div class="col-12 col-xl-7 col-xxl-6">
                                            <label class="text-black font-weight-bold" for="name">@lang('howto.label-name')</label>
                                            <input type="text" name="" class="form-control name mb-5" placeholder="@lang('howto.placeholder-name')" value="" data-id="0">
                                            <div class="row">
                                                <div class="col-12 col-md-4 mb-5">
                                                    <label class="text-black font-weight-bold" for="totalTime">@lang('howto.label-totalTime')</label>
                                                    <input type="number" name="" class="form-control totalTime" placeholder="@lang('howto.placeholder-totalTime')" value="" min="0" data-id="0">
                                                    <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <label class="text-black font-weight-bold" for="estimated">@lang('howto.label-estimated')</label>
                                                    <input type="number" name="" class="form-control estimated mb-5" placeholder="@lang('howto.placeholder-estimated')" value="" data-id="0">
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <label for="currency" class="text-black font-weight-bold">@lang('howto.label-currency')</label>
                                                    <select class="form-control selectpicker custom-select-blue custom-searchbox currency mb-5" data-size="4" data-live-search="true">
                                                        <option value="none">Choose Currency</option>
                                                        @foreach($currencies as $c)
                                                            <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-5 col-xxl-6 mb-5">
                                            <label class="text-black font-weight-bold" for="description">@lang('howto.label-description')</label>
                                            <textarea name="" class="form-control custom-textarea-82 description" placeholder="@lang('howto.placeholder-description')" data-id="0"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <label class="text-black font-weight-bold mt-3 mt-xl-0" for="imageUrl">@lang('howto.label-imageUrl')</label>
                                            <input type="text" name="" class="form-control imageUrl" placeholder="@lang('howto.placeholder-imageUrl')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div id="howto-supply"></div>
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-howto-supply">
                                                <i class='bx bx-plus'></i> @lang('howto.btn-add-supply')
                                            </button>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div id="howto-tool"></div>
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-howto-tool">
                                                <i class='bx bx-plus'></i> @lang('howto.btn-add-tool')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-10 col-sm-11">
                                            <label class="text-black font-weight-bold" for="instructions">@lang('howto.label-step') #1: @lang('howto.label-instructions')</label>
                                            <input type="text" name="" class="form-control instructions mb-5" placeholder="@lang('howto.placeholder-instructions')" value="" data-id="0">
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-5">
                                            <label class="text-black font-weight-bold" for="imageStep">@lang('howto.label-imageStep')</label>
                                            <input type="text" name="" class="form-control imageStep" placeholder="@lang('howto.placeholder-imageStep')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-5">
                                            <label class="text-black font-weight-bold" for="nameStep">@lang('howto.label-nameStep')</label>
                                            <input type="text" name="" class="form-control nameStep" placeholder="@lang('howto.placeholder-nameStep')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-4 mb-5">
                                            <label class="text-black font-weight-bold" for="url">URL</label>
                                            <input type="text" name="" class="form-control url" placeholder="@lang('howto.placeholder-urlStep')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="howto-step"></div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-howto-step">
                                                <i class='bx bx-plus'></i> @lang('howto.btn-add-step')
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
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
                                        <p>@lang('howto.highlight')</p>
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
                        <p>@lang('howto.highlight')</p>
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
<div class="" style="background:white">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2>@lang('howto.desc-1')</h2>
                    <p>@lang('howto.desc-1-1')</p>
                    <p>@lang('howto.desc-1-2')</p>
                    <p>@lang('howto.desc-1-3')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('howto.desc-2')</h2>
                    <p>@lang('howto.desc-2-1')</p>
                    <h4 class="sub-titles">@lang('howto.desc-2-2-1')</h4>
                    <p>@lang('howto.desc-2-2-2')</p>
                    <h4 class="sub-titles">@lang('howto.desc-2-3-1')</h4>
                    <p>@lang('howto.desc-2-3-2')</p>
                    <h4 class="sub-titles">@lang('howto.desc-2-4-1')</h4>
                    <p>@lang('howto.desc-2-4-2')</p>
                    <h4 class="sub-titles">@lang('howto.desc-2-5-1')</h4>
                    <p>@lang('howto.desc-2-5-2')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('howto.desc-3')</h2>
                    <p>@lang('howto.desc-3-1')</p>
                    <p>@lang('howto.desc-3-2')</p>
                    <p>@lang('howto.desc-3-3')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('howto.desc-4')</h2>
                        <p>@lang('howto.desc-4-1')</p>
                        <img class="mb-4" src="{{asset('/media/images/howto-1.jpg')}}" alt="howto-1" width="60%">
                        <p>@lang('howto.desc-4-2')</p>
                        <p>@lang('howto.desc-4-3')</p>
                        <pre class="language-html mb-4">
                            <code class="language-html">
                              &lt;script type="application/ld+json"&gt;
                                {
                                "description": "Berikut adalah cara memasak nasi dengan mudah menggunakan rice cooker",
                                "totalTime": "PT30M",
                                "supply": [
                                    {
                                        "@type": "HowToSupply",
                                        "name": "Beras"
                                    },
                                    {
                                        "@type": "HowToSupply",
                                        "name": "air"
                                    }
                                ],
                                "tools": {
                                    "@type": "HowToTool",
                                    "name": "rice cooker"
                                },
                                "estimateCost": {
                                    "@type": "MonetaryAmount",
                                    "currency": "IDR",
                                    "value": "12000"
                                },
                                "step": [
                                    {
                                        "@type": "HowToStep",
                                        "text": "Siapkan beras untuk dicuci"
                                    },
                                    {
                                        "@type": "HowToStep",
                                        "text": "Cuci beras, namun jangan terlalu bersih agar nutrisi tetap ada."
                                    },
                                    {
                                        "@type": "HowToStep",
                                        "text": "Tambahkan air sebanyak 2x takaran beras."
                                    },
                                    {
                                        "@type": "HowToStep",
                                        "text": "Masukkan dalam rice cooker"
                                    },
                                    {
                                        "@type": "HowToStep",
                                        "text": "Nyalakan tombol cook"
                                    },
                                    {
                                        "@type": "HowToStep",
                                        "text": "Tunggu hingga status atau tombol berubah menjadi warm"
                                    }
                                    ]
                                }                          
                              &lt;/script&gt;
                            </code>
                          </pre>
                        <p>@lang('howto.desc-4-4')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('howto.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('howto.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('howto.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('howto.desc-4')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{-- <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">Available features</h2>
        <p class="text-black" style="font-size:1.5rem">Explore the full features of cmlabs WORD COUNTER</p>
        <p class="text-black">CMLABS will enhance your writing capabilities and incorporate strategical thinking to provide technical advice from the our data.</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs Words Counter</span>
          <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
          <small class="text-grey">Updated 25 Dec, 2020</small>
        </div>
        <p class="font-weight-bold mt-3">CMLABS Analytics opens many possible ways to access, organize, and visualize your SERRPs data to suit your business needs.</p>
        <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 1.0</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>Exact and average Google Search Volume. Version
            1.3</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
      </div>
    </div> --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('howto.title')</h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('howto.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('howto.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{-- <p class="text-black view-all-release">View all web-release?</p> --}}
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush
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
            "name": "JSON-LD How To Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-how-to-schema-generator"
        }]
    }
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/howto-json.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection
