@extends('layouts.app')

@section('title', Lang::get('organization.meta-title'))

@section('meta-desc', Lang::get('organization.meta-desc'))

@section('conical','/en/json-ld-organization-schema-generator')

@section('en-link')
en/json-ld-organization-schema-generator
@endsection

@section('id-link')
id/json-ld-organization-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('organization.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('organization.subtitle')</span>
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
                                        <option value="local-business">Local Business</option>
                                        <option value="video">Video</option>
                                        <option value="event">Event</option>
                                        <option value="organization" selected="selected">Organization</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Organization Generator</p>
                            <form action="" id="form-organization">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <label for="organizationType" class="font-weight-bold text-black">@lang('organization.label-type')</label>
                                                <select id="organizationType" class="form-control selectpicker custom-select-blue custom-searchbox organizationType mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                    <option value="none">@lang('organization.placeholder-type')</option>
                                                    @foreach($listOrganization as $lo)
                                                        <option value="{{ $lo['organizationType'] }}">{{ $lo['organizationType'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <label for="spesificType" class="font-weight-bold text-black">@lang('organization.label-spesificType')</label>
                                                <select id="SpesificType" class="form-control selectpicker custom-select-blue custom-searchbox spesificType mb-5" data-size="4" data-live-search="true" tabindex="null" disabled>
                                                    <option value="none">@lang('organization.placeholder-spesificType')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <label for="nameOrganization" class="font-weight-bold text-black">@lang('organization.label-nameOrganization')</label>
                                                <input type="text" id="nameOrganization" class="form-control nameOrganization" name="" placeholder="{{ Lang::get('organization.placeholder-nameOrganization') }}" value="">
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <label for="alternateNameOrganization" class="font-weight-bold text-black">@lang('organization.label-alternateNameOrganization')</label>
                                                <input type="text" id="alternateNameOrganization" class="form-control alternateNameOrganization" name="" placeholder="{{ Lang::get('organization.placeholder-alternateNameOrganization') }}" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 mb-5">
                                                <label for="url" class="font-weight-bold text-black">@lang('organization.label-url')</label>
                                                <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('organization.placeholder-url') }}" value="" data-id="0">
                                                <div class="invalid-feedback url" data-id="0">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label for="logo-url" class="font-weight-bold text-black">@lang('organization.label-logo-url')</label>
                                                <input type="text" id="logo-url" class="form-control logo-url" name="" placeholder="{{ Lang::get('organization.placeholder-logo-url') }}" value="" data-id="0">
                                                <div class="invalid-feedback logo-url" data-id="0">@lang('layout.invalid-url')</div>
                                            </div>
                                            <div class="col-sm-4 mb-5">
                                                <label class="text-black font-weight-bold" for="sosmed">@lang('organization.label-social-profiles')</label>
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
                                    </div>
                                    <div class="col-12 col-sm-12">
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
                                                <div id="form-contact">
                                                    <p class="h6 text-black mb-5">@lang('organization.title-contact')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-5 mb-5 align-self-center mt-md-2 mb-md-0">
                                                  <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="add-contact">
                                                    <i class='bx bx-plus'></i> @lang('organization.btn-add-contact')
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
                                        <p>@lang('organization.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 3 Oct, 2023</span>
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
                        <p>@lang('organization.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 3 Oct, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'JSON-LD Organization Schema Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('organization.desc-1')</h2>
            <p>@lang('organization.desc-1-1')</p>
            <p>@lang('organization.desc-1-2')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p>@lang('organization.desc-1-3')</p>
            <p>@lang('organization.desc-1-4')</p>
            <p>@lang('organization.desc-1-5')</p>
            <p>@lang('organization.desc-1-6')</p>
            <h2>@lang('organization.desc-2')</h2>
            <p>@lang('organization.desc-2-1')</p>
            <p>@lang('organization.desc-2-2')</p>
            <p>@lang('organization.desc-2-3')</p>
            <p>@lang('organization.desc-2-4')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-5')</h4>
            <p>@lang('organization.desc-2-5-1')</p>
            <p>@lang('organization.desc-2-5-2')</p>
            <p>@lang('organization.desc-2-5-3')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-6')</h4>
            <p>@lang('organization.desc-2-6-1')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-7')</h4>
            <p>@lang('organization.desc-2-7-1')</p>
            <p>@lang('organization.desc-2-7-2')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-8')</h4>
            <p>@lang('organization.desc-2-8-1')</p>
            <p>@lang('organization.desc-2-8-2')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-9')</h4>
            <p>@lang('organization.desc-2-9-1')</p>
            <p>@lang('organization.desc-2-9-2')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-10')</h4>
            <p>@lang('organization.desc-2-10-1')</p>
            <p>@lang('organization.desc-2-10-2')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-11')</h4>
            <p>@lang('organization.desc-2-11-1')</p>
            <p>@lang('organization.desc-2-11-2')</p>
            <h4 class="sub-titles">@lang('organization.desc-2-12')</h4>
            <p>@lang('organization.desc-2-12-1')</p>
            <p>@lang('organization.desc-2-12-2')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('organization.desc-3')</h2>
            <p>@lang('organization.desc-3-1')</p>
            <p>@lang('organization.desc-3-2')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                        {
                            "@context": "https://schema.org",
                            "@type": "Organization",
                            "name": "",
                            "url": "",
                            "logo": ""
                        }
                    &lt;/script&gt;
                </code>
            </pre>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('organization.howto-title')
            @lang('organization.howto1')
            <div class="expand-text">
                <img class="mb-4" src="{{asset('/media/images/organization_schema_instruction_1.webp')}}" alt="HowTo-Organization-1" width="80%">
                @lang('organization.howto2')
                <img class="mb-4" src="{{asset('/media/images/organization_schema_instruction_2.webp')}}" alt="HowTo-Organization-2" width="80%">
                @lang('organization.howto3')
                <img class="mb-4" src="{{asset('/media/images/organization_schema_instruction_3.webp')}}" alt="HowTo-Organization-3" width="80%">
                @lang('organization.howto4')
                <img class="mb-4" src="{{asset('/media/images/organization_schema_instruction_4.webp')}}" alt="HowTo-Organization-4" width="80%">
                @lang('organization.howto5')
                <img class="mb-4" src="{{asset('/media/images/organization_schema_instruction_5.webp')}}" alt="HowTo-Organization-5" width="80%">
                @lang('organization.howto6')
                <p>@lang('organization.closing-1')</p>
                <p>@lang('organization.closing-2')</p>
                <p>@lang('organization.closing-3')</p>
                <p>@lang('organization.closing-4')</p>
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
            "name": "JSON-LD Organization Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-organization-schema-generator"
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
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/organization-json.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection