@extends('layouts.app')

@section('title', Lang::get('localBusiness.meta-title'))

@section('meta-desc', Lang::get('localBusiness.meta-desc'))

@section('conical','/en/json-ld-localBusiness-schema-generator')

@section('en-link')
en/json-ld-localBusiness-schema-generator
@endsection

@section('id-link')
id/json-ld-localBusiness-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('localBusiness.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('localBusiness.subtitle')</span>
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
                                        <option value="website">Website</option>
                                        <option value="local-business" selected="selected">Local Business</option>
                                        <option value="video">Video</option>
                                        <option value="event">Event</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Local Business Generator</p>
                            <form action="" id="form-localBusiness">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <label for="localBusinessType" class="font-weight-bold text-black">@lang('localBusiness.label-type')</label>
                                                <select id="localBusinessType" class="form-control selectpicker custom-select-blue custom-searchbox localBusinessType mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                    <option value="none">@lang('localBusiness.placeholder-type')</option>
                                                    @foreach($listLocalBusiness as $lb)
                                                        <option value="{{ $lb['localBusinessType'] }}">{{ $lb['localBusinessType'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <label for="spesificType" class="font-weight-bold text-black">@lang('localBusiness.label-spesificType')</label>
                                                <select id="SpesificType" class="form-control selectpicker custom-select-blue custom-searchbox spesificType mb-5" data-size="4" data-live-search="true" tabindex="null" disabled>
                                                    <option value="none">@lang('localBusiness.placeholder-spesificType')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label for="nameBusiness" class="font-weight-bold text-black">@lang('localBusiness.label-nameBusiness')</label>
                                                <input type="text" id="nameBusiness" class="form-control nameBusiness" name="" placeholder="{{ Lang::get('localBusiness.placeholder-nameBusiness') }}" value="">
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="imageBusiness" class="font-weight-bold text-black">@lang('localBusiness.label-imageBusiness')</label>
                                                <input type="text" id="imageBusiness" class="form-control imageBusiness" name="" placeholder="{{ Lang::get('localBusiness.placeholder-imageBusiness') }}" value="">
                                                <div class="invalid-feedback" data-id="0">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="idUrl" class="font-weight-bold text-black">@lang('localBusiness.label-id-url')</label>
                                                <input type="text" id="idUrl" class="form-control idUrl" name="" placeholder="{{ Lang::get('localBusiness.placeholder-id-url') }}" value="">
                                                <div class="invalid-feedback" data-id="1">@lang('layout.invalid-url')</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label for="url" class="font-weight-bold text-black">@lang('localBusiness.label-url')</label>
                                                <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('localBusiness.placeholder-url') }}" value="">
                                                <div class="invalid-feedback" data-id="2">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="phone" class="font-weight-bold text-black">@lang('localBusiness.label-phone')</label>
                                                <input type="text" id="phone" class="form-control phone" name="" placeholder="{{ Lang::get('localBusiness.placeholder-phone') }}" value="">
                                                <div class="invalid-feedback" data-id="3">@lang('layout.invalid-phone')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="priceRange" class="font-weight-bold text-black">@lang('localBusiness.label-priceRange')</label>
                                                <input type="text" id="priceRange" class="form-control priceRange" name="" placeholder="{{ Lang::get('localBusiness.placeholder-priceRange') }}" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="foodEstablishment" class="col-12 col-sm-12 d-none">
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label for="menu-url" class="font-weight-bold text-black">@lang('localBusiness.label-menu-url')</label>
                                                <input type="text" id="menu-url" class="form-control menu-url" name="" placeholder="{{ Lang::get('localBusiness.placeholder-menu-url') }}" value="">
                                                <div class="invalid-feedback" data-id="4">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="cuisine" class="font-weight-bold text-black">@lang('localBusiness.label-cuisine')</label>
                                                <input type="text" id="cuisine" class="form-control cuisine" name="" placeholder="{{ Lang::get('localBusiness.placeholder-cuisine') }}" value="">
                                            </div>
                                            <div class="col-sm-4 mb-5 align-self-center mt-md-2 mb-md-0">
                                                <div class="checkbox-list">
                                                    <label class="checkbox text-black font-weight-bold">
                                                        <input type="checkbox" id="accepts-reservation" name="" />
                                                        <span></span>@lang('localBusiness.label-accepts-reservation')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label for="street" class="font-weight-bold text-black">@lang('localBusiness.label-street')</label>
                                                <input type="text" id="street" class="form-control street" name="" placeholder="{{ Lang::get('localBusiness.placeholder-street') }}" value="">
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="city" class="font-weight-bold text-black">@lang('localBusiness.label-city')</label>
                                                <input type="text" id="city" class="form-control city" name="" placeholder="{{ Lang::get('localBusiness.placeholder-city') }}" value="">
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="zip" class="font-weight-bold text-black">@lang('localBusiness.label-zip')</label>
                                                <input type="text" id="zip" class="form-control zip" name="" placeholder="{{ Lang::get('localBusiness.placeholder-zip') }}" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <label for="country" class="font-weight-bold text-black">@lang('localBusiness.label-country')</label>
                                                <select id="country" class="form-control selectpicker custom-select-blue custom-searchbox country mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                    <option value="none">@lang('localBusiness.placeholder-country')</option>
                                                    @foreach($country as $c)
                                                        <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <label for="region" class="font-weight-bold text-black">@lang('localBusiness.label-region')</label>
                                                <select id="region" class="form-control selectpicker custom-select-blue custom-searchbox region mb-5" data-size="4" data-live-search="true" tabindex="null" disabled>
                                                    <option value="none">@lang('localBusiness.placeholder-region')</option>
                                                    @foreach($province as $p)
                                                        <option value="{{ $p['code'] }}">{{ $p['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-4 mb-5">
                                                <label for="latitude" class="font-weight-bold text-black">@lang('localBusiness.label-latitude')</label>
                                                <input type="text" id="latitude" class="form-control latitude" name="" placeholder="{{ Lang::get('localBusiness.placeholder-latitude') }}" value="">
                                                <div class="invalid-feedback" data-id="5">@lang('layout.invalid-latitude')</div>
                                            </div>
                                            <div class="col-md-3 col-lg-4 mb-5">
                                                <label for="longitude" class="font-weight-bold text-black">@lang('localBusiness.label-longitude')</label>
                                                <input type="text" id="longitude" class="form-control longitude" name="" placeholder="{{ Lang::get('localBusiness.placeholder-longitude') }}" value="">
                                                <div class="invalid-feedback" data-id="6">@lang('layout.invalid-longitude')</div>
                                            </div>
                                            <div class="col-md-5 col-lg-4 mb-5 align-self-center mt-md-2 mb-md-0">
                                                 <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="fecthed-geo-coordinates">
                                                    <i class='bx bx-target-lock'></i> @lang('localBusiness.btn-geo-coordinates')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                             <div class="col-md-5 mb-5 align-self-center mt-md-2 mb-md-0">
                                                <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="add-hours">
                                                    <i class='bx bx-plus'></i> @lang('localBusiness.btn-add-hours')
                                                </button>
                                            </div>
                                            <div class="col-sm-4 mb-5  align-self-center mt-md-2 mb-md-0">
                                                <div class="checkbox-list">
                                                    <label class="checkbox text-black font-weight-bold">
                                                        <input type="checkbox" id="open-fullday" name="" />
                                                        <span></span>@lang('localBusiness.label-open-fullday')</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <div id="form-hours"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label class="text-black font-weight-bold" for="sosmed">@lang('localBusiness.label-social-profiles')</label>
                                                <div class="dropdown bootstrap-select show-tick form-control">
                                                    <select class="form-control selectpicker custom-select-blue social-profiles mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null">
                                                        <option value="twitter">Twitter</option>
                                                        <option value="facebook">Facebook</option>
                                                        <option value="instagram">Instagram</option>
                                                        <option value="youtube">Youtube</option>
                                                        <option value="linkedin">Linkedin</option>
                                                        <option value="pinterest">Pinterest</option>
                                                        <option value="soundcloud">Soundcloud</option>
                                                        <option value="tumblr">Tumblr</option>
                                                        <option value="wikipedia">Wikipedia</option>
                                                        <option value="github">Github</option>
                                                        <option value="website">Website</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <div class="sosial-profile-url">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <div id="form-department">
                                                    <p class="h6 text-black mb-5">@lang('localBusiness.label-title-department')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-5 mb-5 align-self-center mt-md-2 mb-md-0">
                                                  <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="add-department">
                                                    <i class='bx bx-plus'></i> @lang('localBusiness.btn-add-department')
                                                </button>
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
                                        <p>@lang('localBusiness.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 5 Sep, 2023</span>
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
                        <p>@lang('localBusiness.highlight')</p>
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
    @slot('title', 'JSON-LD localBusiness Schema Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('localBusiness.desc-1')</h2>
            <p>@lang('localBusiness.desc-1-1')</p>
            <p>@lang('localBusiness.desc-1-2')</p>
        </div>
        @endslot
        @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p>@lang('localBusiness.desc-1-3')</p>
            <p>@lang('localBusiness.desc-1-4')</p>
            <p>@lang('localBusiness.desc-1-5')</p>
            <h2>@lang('localBusiness.desc-2')</h2>
            <p>@lang('localBusiness.desc-2-1')</p>
            <p>@lang('localBusiness.desc-2-2')</p>
            <p>@lang('localBusiness.desc-2-3')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-2-1')</h4>
            <p>@lang('localBusiness.desc-2-2-2')</p>
            <p>@lang('localBusiness.desc-2-2-3')</p>
            <p>@lang('localBusiness.desc-2-2-4')</p>
            <p>@lang('localBusiness.desc-2-2-5')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-3-1')</h4>
            <p>@lang('localBusiness.desc-2-3-2')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-4-1')</h4>
            <p>@lang('localBusiness.desc-2-4-2')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-5-1')</h4>
            <p>@lang('localBusiness.desc-2-5-2')</p>
            <p>@lang('localBusiness.desc-2-5-3')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-6-1')</h4>
            <p>@lang('localBusiness.desc-2-6-2')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-7-1')</h4>
            <p>@lang('localBusiness.desc-2-7-2')</p>
            <p>@lang('localBusiness.desc-2-7-3')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-8-1')</h4>
            <p>@lang('localBusiness.desc-2-8-2')</p>
            <p>@lang('localBusiness.desc-2-8-3')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-9-1')</h4>
            <p>@lang('localBusiness.desc-2-9-2')</p>
            <h4 class="sub-titles">@lang('localBusiness.desc-2-10-1')</h4>
            <p>@lang('localBusiness.desc-2-10-2')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('localBusiness.howto1')
            <div class="expand-text">
                <img class="mb-4" src="{{asset('/media/images/local_business_schema_instruction_1.webp')}}" alt="HowTo-Local-Business-1" width="80%">
                @lang('localBusiness.howto2')
                <img class="mb-4" src="{{asset('/media/images/local_business_schema_instruction_2.webp')}}" alt="HowTo-Local-Business-2" width="80%">
                @lang('localBusiness.howto3')
                <img class="mb-4" src="{{asset('/media/images/local_business_schema_instruction_3.webp')}}" alt="HowTo-Local-Business-3" width="80%">
                @lang('localBusiness.howto4')
                <img class="mb-4" src="{{asset('/media/images/local_business_schema_instruction_4.webp')}}" alt="HowTo-Local-Business-4" width="80%">
                @lang('localBusiness.howto5')
                <img class="mb-4" src="{{asset('/media/images/local_business_schema_instruction_5.webp')}}" alt="HowTo-Local-Business-5" width="80%">
                @lang('localBusiness.howto6')
                @lang('localBusiness.close')
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
            "name": "JSON-LD localBusiness Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-localBusiness-schema-generator"
        }]
    }
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = 'Show less';
            read = true;
        } else {
            description_2.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = 'Read more';
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/localBusiness-json.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush

@section('json-ld')
active
@endsection