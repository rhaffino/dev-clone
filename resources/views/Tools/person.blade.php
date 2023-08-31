@extends('layouts.app')

@section('title', Lang::get('person.meta-title'))

@section('meta-desc', Lang::get('person.meta-desc'))

@section('conical','/en/json-ld-person-schema-generator')

@section('en-link')
en/json-ld-person-schema-generator
@endsection

@section('id-link')
id/json-ld-person-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('person.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('person.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person" selected="selected">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                        <option value="website">Website</option>
                                        <option value="local-business">Local Business</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Person</p>
                            <form action="" id="form-person">
                                <div class="" id="formperson">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="name">@lang('person.label-name')</label>
                                            <input type="text" name="" class="form-control name" placeholder="@lang('person.placeholder-name')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="url">URL</label>
                                            <input type="text" name="" class="form-control url" placeholder="@lang('person.placeholder-url')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="pictureUrl">@lang('person.label-pictureUrl')</label>
                                            <input type="text" name="" class="form-control pictureUrl" placeholder="@lang('person.placeholder-pictureUrl')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="sosmed">@lang('person.label-social-profiles')</label>
                                            <div class="dropdown bootstrap-select show-tick form-control">
                                                <select class="form-control selectpicker custom-select-blue social-profiles mb-5" multiple="multiple" data-actions-box="false" tabindex="null">
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
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="jobTitle">@lang('person.label-jobTitle')</label>
                                            <input type="text" name="" class="form-control jobTitle mb-5" placeholder="@lang('person.placeholder-jobTitle')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="company">@lang('person.label-company')</label>
                                            <input type="text" name="" class="form-control company mb-5" placeholder="@lang('person.placeholder-company')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <div class="sosial-profile-url">
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
                                        <p>@lang('person.highlight')</p>
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
                        <p>@lang('person.highlight')</p>
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
    @slot('title', 'JSON-LD Person Schema Generator Tool')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('person.desc-1')</h2>
            <p>@lang('person.desc-1-1')</p>
            <p>@lang('person.desc-1-2')</p>
            <p>@lang('person.desc-1-3')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2>@lang('person.desc-2')</h2>
            <p>@lang('person.desc-2-1')</p>
            <p>@lang('person.desc-2-2')</p>
            <p>@lang('person.desc-2-3')</p>
            <ul>
                <li>@lang('person.desc-2-3-1')</li>
                <li>@lang('person.desc-2-3-2')</li>
                <li>@lang('person.desc-2-3-3')</li>
            </ul>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('person.desc-3')</h2>
            <p>@lang('person.desc-3-1')</p>
            <p>@lang('person.desc-3-2')</p>
        </div>
    @endslot
    @slot('subcontent_4')
        <div class="d-none" id="description-tab-4">
            <h2>@lang('person.desc-4')</h2>
            <p>@lang('person.desc-4-1')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                        {
                            "@context": "https://schema.org/",
                            "@type": "Person",
                            "name": "Jane",
                            "url": "https://www.linkedin.com/",
                            "image": "https://images.unsplash.com",
                            "sameAs": [
                                "jane_isme"
                            ],
                            "jobTitle": "SEO specialist",
                            "worksFor": {
                                "@type": "Organization",
                                "name": "SEO organizataion"
                            }
                        }                            
                    &lt;/script&gt;
                </code>
            </pre>
            <p>@lang('person.desc-4-2')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('person.howto1')
            <div class="expand-text">
            @lang('person.howto1-1')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_1.webp')}}" alt="HowTo-person-1" width="80%">
                @lang('person.howto2')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_2.webp')}}" alt="HowTo-person-2" width="80%">
                @lang('person.howto3')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_3.webp')}}" alt="HowTo-person-3" width="80%">
                @lang('person.howto4')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_4.webp')}}" alt="HowTo-person-4" width="80%">
                @lang('person.howto5')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_5.webp')}}" alt="HowTo-person-5" width="80%">
                @lang('person.howto6')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_6.webp')}}" alt="HowTo-person-6" width="80%">
                @lang('person.howto7')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_7.webp')}}" alt="HowTo-person-7" width="80%">
                @lang('person.howto8')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_8.webp')}}" alt="HowTo-person-8" width="80%">
                @lang('person.howto9')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_9.webp')}}" alt="HowTo-person-9" width="80%">
                @lang('person.howto10')
                <img class="mb-4" src="{{asset('/media/images/person_instruction_10.webp')}}" alt="HowTo-person-10" width="80%">
                @lang('person.howto11')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">Read more</p>
    @endslot
@endcomponent
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
            "name": "JSON-LD Person Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-person-schema-generator"
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
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            description_4.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            description_4.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = 'Show less';
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            description_4.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            description_4.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = 'Read more';
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/person-json.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection
