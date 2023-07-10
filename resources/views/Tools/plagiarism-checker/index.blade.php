@extends('layouts.app')

@section('title', Lang::get('permutation.meta-title'))

@section('meta-desc', Lang::get('permutation.meta-desc'))

@section('conical', '/en/plagiarism-checker')

@section('en-link')
    en/plagiarism-checker
@endsection

@section('id-link')
    id/plagiarism-checker
@endsection

@push('style')
    <link rel="stylesheet" href="{{ mix('/assets/css/plagiarism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagespeed.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endpush

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mt-5 mb-10">
            @include('Tools.plagiarism-checker.components.stats')
            <div class="d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    <h1 class="text-dark-70 h6-700 m-0">PLAGIARISM CHECKER</h1>
                    <p class="b2-400 text-dark-70">Plagiarism detection solution powered by
                        CopyScape</p>
                    <div class="row mb-8">
                        <div class="col-md-8">
                            <div class="card card-custom px-8 py-3 top-menu">
                                <div class="left-menu background-dark-40">
                                    <button class="full-screen-btn radio"><i class='bx bx-fullscreen'
                                            style='color:#ffffff'></i></button>
                                    <label class="font-size-container">
                                        <input type="radio" value="font-size-12px" name="font-size" id="12px"
                                            checked>
                                        <span class="b2-400 text-white">12px</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input type="radio" value="font-size-15px" name="font-size" id="15px">
                                        <span class="b2-400 text-white">15px</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input type="radio" value="font-size-18px" name="font-size" id="18px">
                                        <span class="b2-400 text-white">18px</span>
                                    </label>
                                </div>
                                <div class="right-menu">
                                    <label class="button-container">
                                        <input type="radio" name="history" value="calendar">
                                        <span class=""><i class='bx bxs-calendar'></i></span>
                                    </label>
                                    <label class="button-container">
                                        <input type="radio" name="history" value="list">
                                        <span class=""><i class='bx bxs-file-find'></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-custom px-8 py-3 top-menu">
                                <p class="m-0 text-dark-30 s-400">RESULTS</p>
                                <div class="left-menu background-dark-40">
                                    <label class="font-size-container">
                                        <input value="plagiarism" type="radio" name="results" id="plagiarismBtn" disabled>
                                        <span class="s-400 text-white">PLAGIARISM</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input value="density" type="radio" name="results" checked id="densityBtn">
                                        <span class="s-400 text-white">WORDS DENSITY</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- left results --}}
                        <div class="col-md-8">
                            <div class="card card-custom text-input">
                                <div class="px-4 py-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="text-dark-70 b2-400">Characters</div>
                                        <div class="text-dark-70 p-700" id="characterCount">0</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Words</div>
                                        <div class="text-dark-70 p-700" id="wordCount">0</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Sentences</div>
                                        <div class="text-dark-70 p-700" id="sentenceCount">0</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Paragraph</div>
                                        <div class="text-dark-70 p-700" id="paragraphCount">0</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Reading Time</div>
                                        <div class="text-dark-70 p-700" id="readingTime">0</div>
                                    </div>
                                </div>

                                <textarea id="url-check" data-autoresize name="name" placeholder="Type / paste url here (eg. https://cmlabs.co/)"
                                    style="resize:none;" class="form-control plagiarism-checker-text__area py-6"></textarea>

                                <div class="footer-section px-4 py-2">
                                    <button class="remove-btn">
                                        <i class='bx bxs-trash b5-500'></i>
                                    </button>
                                    <button class="run-btn b5-700" id="linkCheckerBtn">
                                        <i class='bx bx-play b5-500'></i>
                                        <span class="b5-700 font-bold">
                                            RUN
                                        </span>
                                    </button>
                                    <p class="s-400 text-dark-30 m-0">$0.03 first 200 words, $0.01 next 100 words (about
                                        $0.05 for 400-449 words)</p>
                                </div>

                                <textarea id="text-check" data-autoresize name="name" placeholder="Type / paste any text here.."
                                    style="resize:none;" class="form-control plagiarism-checker-text__area py-6"></textarea>
                                <div class="result-input" style="display: none"></div>
                            </div>

                            @include('Tools.plagiarism-checker.components.history')
                            @include('Tools.plagiarism-checker.components.history-calendar')
                        </div>

                        {{-- right results --}}
                        <div class="col-md-4 right-results">
                            {{-- empty state --}}
                            <div class="card card-custom px-4 py-3 mb-10" id="emptyState">
                                <p class="m-0 text-gray-100 b2-400 text-center">Enter the text you want to check and run to
                                    see the result here...</p>
                            </div>

                            {{-- estimation box --}}
                            <div class="card card-custom estimation-card" id="estimationCard">
                                <div class="px-4 py-3 estimation-box background-gray-70">
                                    <div class="d-flex align-items-center text-purple-40 b2-500">
                                        <i class='bx bxs-dollar-circle text-purple-40 b2-700 mr-2'></i>
                                        <div>
                                            EST.COST
                                        </div>
                                    </div>
                                    <div>
                                        <p class="s-400 m-0">TOTAL WORDS</p>
                                        <p class="m-0 b1-700" id="totalWordsEst">300</p>
                                    </div>
                                    <div>
                                        <p class="s-400 m-0">COST</p>
                                        <p class="m-0 b1-700">$<span id="costEst">0</span></p>
                                    </div>
                                </div>
                                <div class="px-4 py-3 d-flex align-items-center">
                                    <button class="btn py-2 mr-2 b2-700 text-dark-50 remove-btn">Cancel</button>
                                    <button id="button-checker" class="btn py-2 button-primary-70 b2-700">Run
                                        CopyScape</button>
                                </div>
                            </div>

                            {{-- URL MODE --}}
                            <div class="card card-custom url-mode-container mt-10" style="display: none">
                                <div class="accordion accordion-embed" id="embedAccordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link background-white btn-block text-left"
                                                    type="button" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="pill b2-700">URL is Valid</div>
                                                </button>
                                            </h2>                                            
                                        </div>
                                        <hr>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#embedAccordion">
                                            <div class="card-body w-100">
                                                <div class="d-flex justify-content-end w-100 url-viewer">
                                                    <div class="levels b2-400 text-primary-70 mr-3">3 levels</div>
                                                    <div class="url b2-400 text-gray-100 mr-3">https://example.com</div>
                                                </div>
                                                <hr class="mt-3 mb-3">
                                                <embed id="urlEmbedContainer" class="w-100" src="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END URL MODE --}}

                            {{-- TEXT MODE --}}

                            {{-- words box --}}
                            <div class="card card-custom mt-10 estimation-card words-density">
                                <div
                                    class="px-4 py-3 d-flex align-items-center justify-content-between b2-400 text-dark-60">
                                    <div class="text-dark-30 b2-700">
                                        WORDS
                                    </div>

                                    <div class="d-flex rounded-sm background-dark-20 overflow-hidden">
                                        <label class="radio-tab">
                                            <input value="1" type="radio" name="density" checked>
                                            <span class="b2-400 text-white">1</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input value="2" type="radio" name="density">
                                            <span class="b2-400 text-white">2</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input value="3" type="radio" name="density">
                                            <span class="b2-400 text-white">3</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input value="4" type="radio" name="density">
                                            <span class="b2-400 text-white">4</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input value="5" type="radio" name="density">
                                            <span class="b2-400 text-white">5</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- words details --}}
                            <div class="card card-custom words-detail mt-10 px-4 py-3 estimation-card words-density">
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
                            {{-- END TEXT MODE --}}

                            {{-- RESULT --}}
                            <div class="card card-custom mt-10 overview py-3 result-card plagiarism-result"
                                style="display: none">
                                <div
                                    class="px-4 py-3 d-flex align-items-center justify-content-between b2-400 text-dark-60">
                                    <div class="text-dark-70 b2-700">
                                        Overview
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div class="d-flex align-items-center flex-column gap-1 px-3">
                                        <div class="progress progress-red performance" data-percentage="90">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-performance value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <div class="b2-400 b2-m-400">Menjiplak</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-column gap-1 px-3">
                                        <div class="progress progress-red performance" data-percentage="90">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-performance value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <div class="b2-400 b2-m-400">Unik</div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-custom mt-10 result-card" style="display: none">
                                <div
                                    class="px-4 py-3 d-flex align-items-center justify-content-between b2-400 text-dark-60">
                                    <div class="d-flex radio-tab-container-2 rounded-sm overflow-hidden">
                                        <label class="radio-tab">
                                            <input type="radio" name="words" checked>
                                            <span class="b2-700">ALL</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">1</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">2</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">3</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">4</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">5</span>
                                        </label>
                                    </div>

                                    <div class="d-flex radio-tab-container-2 rounded-sm overflow-hidden">
                                        <label class="radio-tab">
                                            <input type="radio" name="words" checked>
                                            <span class="b2-700">
                                                <i class='bx bx-expand-vertical'></i>
                                            </span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-700">
                                                <i class='bx bx-collapse-vertical'></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 result-container plagiarism-result">
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
                                                    <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar,
                                                        2021</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END RESULT --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="{{ asset('/js/logic/plagiarism-checker.js') }}"></script>
    <script>
        const PLAGIARISM_CHECK_URL = "{{ route('api.plagiarism-check') }}"
        const USER_ID = "{{ $userId }}"
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
            "item": "{{url('/')}}/{{$local}}/plagiarism-checker"
        }]
    }
</script>
@endpush

@section('plagiarism-checker')
    active
@endsection
