@extends('layouts.app')

@section('title', Lang::get('wordcounter.meta-title'))

@section('meta-desc', Lang::get('wordcounter.meta-desc'))

@section('conical','/en/word-counter')

@section('en-link')
    en/word-counter
@endsection

@section('id-link')
    id/word-counter
@endsection

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mb-10">
            <div class="d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    <h1 class="text-darkgrey font-weight-normal">@lang('wordcounter.title')</h1>
                    <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('wordcounter.subtitle')</p>
                    <div class="mb-5" id="cta-warning" style="display: none">
                        <div class="cta-yellow px-5 py-1 cta-border-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                                    <i class='bx bxs-file-find bx-md mr-3 text-black'></i>
                                    <p class="mb-0 text-black">Do you wanna make your articles to be more SEO Friendly? Discuss with us and upgrade your article's performance.</p>
                                </div>
                                <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                                    <a href="https://cmlabs.co/en-id/pricing/content-writing" target="_blank" rel="noreferrer nofollow external" type="button" class="btn btn-cta" name="button">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-custom mb-5">
                                <div class="card-body py-3 px-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i id="copy-text"
                                               class='bx bxs-copy-alt bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-copy') }}"></i>
                                            <i id="reset" class='bx bxs-trash bx-sm mx-2 text-darkgrey text-hover-red'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-clear') }}"></i>
                                            <div
                                                class="wordcounter-background-text-size-left-edge d-flex justify-content-center align-items-center p-2 ml-5">
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24"
                                                 style="fill:rgba(0, 0, 0, 1);">
												<path
                                                    d="M5 12L3 12 3 21 12 21 12 19 5 19zM12 5L19 5 19 12 21 12 21 3 12 3z"
                                                    style="fill:white"></path>
											</svg>
										</span>
                                            </div>
                                            <div id="set-font-size-12px"
                                                 class="wordcounter-background-text-size active text-white font-weight-bolder d-flex justify-content-center align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 12px">
                                                12px
                                            </div>
                                            <div id="set-font-size-15px"
                                                 class="wordcounter-background-text-size text-white d-flex justify-content-center font-weight-bolder align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 15px">
                                                15px
                                            </div>
                                            <div id="set-font-size-18px"
                                                 class="wordcounter-background-text-size wordcounter-background-text-size-right-edge text-white font-weight-bolder d-flex justify-content-center align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 18px">
                                                18px
                                            </div>
                                        </div>
                                        <div id="autosaveParam" data-autosave="on" class="">
                                            <i id="new-text"
                                               class='bx bxs-collection bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-new-local-history') }}"></i>
                                            <i id="autoSaveOff"
                                               class='bx bxs-server bx-sm mx-2 text-darkgrey text-hover-primaryblue auto-save-off'
                                               data-html="true" data-placement="top"
                                               title="{{ Lang::get('wordcounter.autosave-off') }}"></i>
                                            <i id="autoSaveOn"
                                               class='bx bxs-server bx-sm mx-2 text-primaryblue text-hover-primaryblue auto-save-on'
                                               data-html="true" data-placement="top"
                                               title="{{ Lang::get('wordcounter.autosave-on') }}"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-custom mb-5">
                                <div class="card-header pb-0 px-4">
                                    <div class="container px-0 pt-3">
                                        <div class="row">
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.character')</p>
                                                <span class="h4 mb-0" id="characterCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.word')</p>
                                                <span class="h4 mb-0" id="wordCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.sentence')</p>
                                                <span class="h4 mb-0" id="sentenceCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.paragraph')</p>
                                                <span class="h4 mb-0" id="paragraphCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.reading-time')</p>
                                                <span class="h4 mb-0" id="readingTime">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <textarea data-key="{{time()}}" data-autoresize name="name"
                                              placeholder="{{ Lang::get('wordcounter.textarea-placeholder') }}"
                                              rows="15" style="resize:none; overflow:hidden"
                                              class="form-control word-counter-text-area font-size-12px"
                                              id="textarea" onpaste="pasteListener()"></textarea>
                                </div>
                            </div>
                            <div id="local-collection-desktop" class="local-collection word__counter-local">
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
                                    <ul class="list-group" id="localsavedesktop">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 word-counter-result-card-desktop">
                            <div class="card card-custom mb-5">
                                <div class="card-body py-3 px-4">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div
                                            class="wordcounter-background-density wordcounter-background-density-left-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            @lang('wordcounter.keyword-density')
                                        </div>
                                        <div id="showWords1Desktop"
                                             class="wordcounter-background-density active font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            1
                                        </div>
                                        <div id="showWords2Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            2
                                        </div>
                                        <div id="showWords3Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            3
                                        </div>
                                        <div id="showWords4Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            4
                                        </div>
                                        <div id="showWords5Desktop"
                                             class="wordcounter-background-density wordcounter-background-density-right-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            5
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-custom mb-5">
                                <div class="card-body p-5">
                                    <div class="" id="top1">
                                    </div>
                                    <div class="" id="top2">
                                    </div>
                                    <div class="" id="top3">
                                    </div>
                                    <div class="" id="top4">
                                    </div>
                                    <div class="" id="top5">
                                    </div>
                                </div>
                            </div>
                            <div class="word-counter-version-desktop">
                                <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                                     id="accordionExample2">
                                    <div class="card bg-transparent" style="">
                                        <div class="card-header" id="headingOne2">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                 data-target="#collapseOne2">
                                                @lang('layout.version') 2.0
                                            </div>
                                        </div>
                                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                            <div class="card-body">
                                                <p>@lang('wordcounter.highlight')</p>
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
                <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
                    <div class="d-flex flex-row align-items-center">
                        <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                        <span class="text-black font-15px">@lang('layout.local-history')</span>
                    </div>
                    <div onclick="clearAll()">
                        <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
                    </div>
                </div>
                <div class="local-collection-body mt-3 px-5" id="localsavemobile">
                </div>
            </div>
            <div class="bg-white p-5 word-counter-result-card-mobile">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <div
                        class="wordcounter-background-density wordcounter-background-density-left-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        @lang('wordcounter.keyword-density')
                    </div>
                    <div id="showWords1Mobile"
                         class="wordcounter-background-density active font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        1
                    </div>
                    <div id="showWords2Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        2
                    </div>
                    <div id="showWords3Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        3
                    </div>
                    <div id="showWords4Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        4
                    </div>
                    <div id="showWords5Mobile"
                         class="wordcounter-background-density wordcounter-background-density-right-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        5
                    </div>
                </div>
                <div class="" id="top1Mobile">
                </div>
                <div class="" id="top2Mobile">
                </div>
                <div class="mb-5" id="top3Mobile">
                </div>
                <div class="mb-5" id="top4Mobile">
                </div>
                <div class="mb-5" id="top5Mobile">
                </div>
                <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                     id="accordionExample2">
                    <div class="card bg-transparent" style="">
                        <div class="card-header" id="headingOne2">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                @lang('layout.version') 2.0
                            </div>
                        </div>
                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                            <div class="card-body">
                                <p>@lang('wordcounter.highlight')</p>
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
        @slot('title', 'Word Counter')
        @slot('subcontent_1')
            <div class="" id="description-tab-1">
                <h2>@lang('wordcounter.desc-1')</h2>
                <p>@lang('wordcounter.desc-1-1')</p>
                <p>@lang('wordcounter.desc-1-2')</p>
            </div>
        @endslot
        @slot('subcontent_2')
            <div class="d-none" id="description-tab-2">
                <h2>@lang('wordcounter.desc-2')</h2>
                <p>@lang('wordcounter.desc-2-1')</p>
                <ul>
                    <li>@lang('wordcounter.desc-2-1-1')</li>
                    <li>@lang('wordcounter.desc-2-1-2')</li>
                    <li>@lang('wordcounter.desc-2-1-3')</li>
                    <li>@lang('wordcounter.desc-2-1-4')</li>
                    <li>@lang('wordcounter.desc-2-1-5')</li>
                    <li>@lang('wordcounter.desc-2-1-6')</li>
                    <li>@lang('wordcounter.desc-2-1-7')</li>
                </ul>
            </div>
        @endslot
        @slot('subcontent_3')
            <div class="d-none" id="description-tab-3">
                <h2>@lang('wordcounter.desc-3')</h2>
                <p>@lang('wordcounter.desc-3-1')</p>
                <h4 class="sub-titles">@lang('wordcounter.desc-3-1-1')</h4>
                <p>@lang('wordcounter.desc-3-1-2')</p>
                <p>@lang('wordcounter.desc-3-1-3')</p>
                <p>@lang('wordcounter.desc-3-1-4')</p>
                <h4 class="sub-titles">@lang('wordcounter.desc-3-2-1')</h4>
                <p>@lang('wordcounter.desc-3-2-2')</p>
                <h4 class="sub-titles">@lang('wordcounter.desc-3-3-1')</h4>
                <p>@lang('wordcounter.desc-3-3-2')</p>
            </div>
        @endslot
        @slot('subcontent_4')
            <div class="d-none" id="description-tab-4">
                <h2>@lang('wordcounter.desc-4')</h2>
                <p>@lang('wordcounter.desc-4-1')</p>
                <ul>
                    <li><p>@lang('wordcounter.desc-4-1-1')</p></li>
                    <li><p>@lang('wordcounter.desc-4-1-2')</p></li>
                    <li><p>@lang('wordcounter.desc-4-1-3')</p></li>
                    <li><p>@lang('wordcounter.desc-4-1-4')</p></li>
                    <li><p>@lang('wordcounter.desc-4-1-5')</p></li>
                </ul>
            </div>
        @endslot
        @slot('subcontent_5')
            <div class="d-none" id="description-tab-5">
                <h2>@lang('wordcounter.desc-5')</h2>
                <p>@lang('wordcounter.desc-5-1')</p>
                <p>@lang('wordcounter.desc-5-2')</p>
                <p>@lang('wordcounter.desc-5-3')</p>
                <ul>
                    <li><p>@lang('wordcounter.desc-5-1-1')</p></li>
                    <li><p>@lang('wordcounter.desc-5-1-2')</p></li>
                    <li><p>@lang('wordcounter.desc-5-1-3')</p></li>
                </ul>
                <p>@lang('wordcounter.desc-5-4')</p>
                <p>@lang('wordcounter.desc-5-5')</p>
            </div>
        @endslot
        @slot('how_to_content')
            <div class="d-none" id="how-to">
                @lang('wordcounter.howto1')
                <div class="expand-text">
                    @lang('wordcounter.howto2')
                    <img class="mb-4" src="{{asset('/media/images/wordcounter_instruction_1.webp')}}" alt="HowTo-wordcounter-1" width="80%">
                    @lang('wordcounter.howto3')
                    <img class="mb-4" src="{{asset('/media/images/wordcounter_instruction_2.webp')}}" alt="HowTo-wordcounter-2" width="80%">
                    @lang('wordcounter.howto4')
                    <img class="mb-4" src="{{asset('/media/images/wordcounter_instruction_3.webp')}}" alt="HowTo-wordcounter-3" width="80%">
                    @lang('wordcounter.howto5')
                    <img class="mb-4" src="{{asset('/media/images/wordcounter_instruction_4.webp')}}" alt="HowTo-wordcounter-4" width="80%">
                    @lang('wordcounter.howto6')
                    <img class="mb-4" src="{{asset('/media/images/wordcounter_instruction_5.webp')}}" alt="HowTo-wordcounter-5" width="80%">
                    @lang('wordcounter.howto7')
                </div>
            </div>
        @endslot
        @slot('read_more')
            <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
        @endslot
    @endcomponent
@endsection

@push('script')
    <script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
    <script src="{{asset('js/logic/State.js')}}"></script>
    <script src="{{asset('js/logic/word-counter.js')}}"></script>
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
			"name": "Word Counter",
			"item": "{{url('/')}}/{{$local}}/word-counter"
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

@section('word-counter')
    active
@endsection
