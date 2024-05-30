@extends('layouts.app')

@section('title', Lang::get('permutation.meta-title'))

@section('meta-desc', Lang::get('permutation.meta-desc'))

@section('conical','/en/keyword-permutation')

@section('en-link')
en/keyword-permutation
@endsection

@section('id-link')
id/keyword-permutation
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('permutation.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('permutation.sub-title')</span>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Word 1</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box1">0</span> @lang('permutation.input-card-counter')</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box1" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Word 2</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box2">0</span> @lang('permutation.input-card-counter')</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box2" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Word 3</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box3">0</span> @lang('permutation.input-card-counter')</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box3" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
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
                                        <p>@lang('permutation.highlight')</p>
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
                <div class="col-md-8">
                    <div class="card card-custom mb-5">
                        <div class="card-body px-3 pt-3 pb-0">
                            <div class="row">
                                <div class="col-md-8 col-lg-8 mb-3">
                                    <select id="select-mode" class="form-control picker" name="">
                                        <option value="normal">@lang('permutation.broad-match')</option>
                                        <option value="quotes">@lang('permutation.phrase-match')</option>
                                        <option value="square">@lang('permutation.exact-match')</option>
                                        <option value="comma">@lang('permutation.comma-match')</option>
                                        <option value="custom">@lang('permutation.custom-match')</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-lg-4 mb-3">
                                    <div id="btn-container-popup" onclick="showFeedbackCard()">
                                        <button id="generator" type="button" class="btn btn-generate-permutation btn-block" name="button">@lang('permutation.permutation-btn')</button>
                                    </div>
                                </div>
                                <div class="col-12" id="custom-text-container" style="display: none">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 mb-3">
                                            <input type="text" class="form-control" id="custom-start-text" placeholder="Start Character">
                                        </div>
                                        <div class="col-md-4 col-lg-4 mb-3">
                                            <input type="text" class="form-control" id="custom-end-text" placeholder="End Character">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 text-black mr-2"><strong>@lang('permutation.permutation-result')</strong></p>
                                        <small id="copy-text" class="mb-0 mx-2 text-darkgrey text-hover-underline">@lang('permutation.copy-btn')</small>
                                        <small id="reset" class="mb-0 mx-2 text-darkgrey text-hover-underline">@lang('permutation.clear-btn')</small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0 text-primaryblue"><span id="count-keyword">0</span> @lang('permutation.input-card-counter')</p>

                                    </div>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="permutation-textarea-result" readonly data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-result-placeholder') }}" rows="25" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
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
                        <p>@lang('permutation.highlight')</p>
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
    @slot('title', 'Keyword Permutation Tool')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2 class="text-black">@lang('permutation.desc-1')</h2>
            <p class="text-black">@lang('permutation.desc-1-1')</p>
            <p class="text-black">@lang('permutation.desc-1-2')</p>
            <p class="text-black">@lang('permutation.desc-1-3')</p>
            <p class="text-black">@lang('permutation.desc-1-4')</p>
            <p class="text-black">@lang('permutation.desc-1-5')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2 class="text-black">@lang('permutation.desc-2')</h2>
            <p class="text-black">@lang('permutation.desc-2-1')</p>
            <h4 class="sub-titles">@lang('permutation.desc-2-1-1')</h4>
            <p class="text-black">@lang('permutation.desc-2-1-2')</p>
            <h4 class="sub-titles">@lang('permutation.desc-2-2-1')</h4>
            <p class="text-black">@lang('permutation.desc-2-2-2')</p>
            <h4 class="sub-titles">@lang('permutation.desc-2-3-1')</h4>
            <p class="text-black">@lang('permutation.desc-2-3-2')</p>
            <p class="text-black">@lang('permutation.desc-2-3-3')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2 class="text-black">@lang('permutation.desc-3')</h2>
            <p class="text-black">@lang('permutation.desc-3-1')</p>
            <h4 class="sub-titles">@lang('permutation.desc-3-1-1')</h4>
            <p class="text-black">@lang('permutation.desc-3-1-2')</p>
            <p class="text-black">@lang('permutation.desc-3-1-3')</p>
            <h4 class="sub-titles">@lang('permutation.desc-3-2-1')</h4>
            <p class="text-black">@lang('permutation.desc-3-2-2')</p>
            <h4 class="sub-titles">@lang('permutation.desc-3-3-1')</h4>
            <p class="text-black">@lang('permutation.desc-3-3-2')</p>
            <p class="text-black">@lang('permutation.desc-3-3-3')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('permutation.howto1')
            <div class="expand-text">
                @lang('permutation.howto2')
                <img class="mb-4" src="{{asset('/media/images/permutation_instruction_1.webp')}}" alt="HowTo-permutation-1" width="80%">
                @lang('permutation.howto3')
                <img class="mb-4" src="{{asset('/media/images/permutation_instruction_2.webp')}}" alt="HowTo-permutation-2" width="80%">
                @lang('permutation.howto4')
                <img class="mb-4" src="{{asset('/media/images/permutation_instruction_3.webp')}}" alt="HowTo-permutation-3" width="80%">
                @lang('permutation.howto5')
                <img class="mb-4" src="{{asset('/media/images/permutation_instruction_4.webp')}}" alt="HowTo-permutation-4" width="80%">
                @lang('permutation.howto6')
                <img class="mb-4" src="{{asset('/media/images/permutation_instruction_5.webp')}}" alt="HowTo-permutation-5" width="80%">
                @lang('permutation.howto7')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script src="{{asset('/js/logic/keyword-permutation.js')}}"></script>
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
            "name": "Keyword Permutation",
            "item": "{{url('/')}}/{{$local}}/keyword-permutation"
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

@section('keyword-permutation')
active
@endsection
