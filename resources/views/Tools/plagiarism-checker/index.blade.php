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
                                    <button class="full-screen-btn"><i class='bx bx-fullscreen'
                                            style='color:#ffffff'></i></button>
                                    <label class="font-size-container">
                                        <input type="radio" name="font-size" id="12px" checked>
                                        <span class="b2-400 text-white">12px</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input type="radio" name="font-size" id="15px">
                                        <span class="b2-400 text-white">15px</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input type="radio" name="font-size" id="18px">
                                        <span class="b2-400 text-white">18px</span>
                                    </label>
                                </div>
                                <div class="right-menu">
                                    <label class="button-container">
                                        <input type="radio" name="tools" value="calendar">
                                        <span class=""><i class='bx bxs-calendar'></i></span>
                                    </label>
                                    <label class="button-container">
                                        <input type="radio" name="tools" value="calendar">
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
                                        <input type="radio" name="type">
                                        <span class="s-400 text-white">PLAGIARISM</span>
                                    </label>
                                    <label class="font-size-container">
                                        <input type="radio" name="type">
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
                                        <div class="text-dark-70 p-700">423</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Words</div>
                                        <div class="text-dark-70 p-700">423</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Sentences</div>
                                        <div class="text-dark-70 p-700">423</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Paragraph</div>
                                        <div class="text-dark-70 p-700">423</div>
                                    </div>
                                    <div>
                                        <div class="text-dark-70 b2-400">Reading Time</div>
                                        <div class="text-dark-70 p-700">423</div>
                                    </div>
                                </div>

                                <textarea id="url-check" data-autoresize name="name" placeholder="Type / paste url here (eg. https://cmlabs.co/)"
                                    style="resize:none;" class="form-control plagiarism-checker-text__area py-6"></textarea>

                                <div class="footer-section px-4 py-2">
                                    <button>
                                        <i class='bx bxs-trash b5-500'></i>
                                    </button>
                                    <button class="run-btn b5-700">
                                        <i class='bx bx-play b5-500'></i>
                                        <span class="b5-700 font-bold">
                                            RUN
                                        </span>
                                    </button>
                                    <p class="s-400 text-dark-30 m-0">$0.03 first 200 words, $0.01 next 100 words (about
                                        $0.05 for 400-449 words)</p>
                                </div>

                                <textarea id="text-check" data-autoresize name="name" placeholder="Type / paste any text here.." style="resize:none;"
                                    class="form-control plagiarism-checker-text__area py-6"></textarea>
                            </div>

                            @include('Tools.plagiarism-checker.components.history')
                        </div>

                        {{-- right results --}}
                        <div class="col-md-4 right-results">
                            {{-- empty state --}}
                            <div class="card card-custom px-4 py-3">
                                <p class="m-0 text-gray-100 b2-400 text-center">Enter the text you want to check and run to
                                    see the result here...</p>
                            </div>

                            {{-- URL MODE --}}
                            <div class="card card-custom mt-10">
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
                                        <hr class="mt-0 mb-5">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#embedAccordion">
                                            <div class="card-body w-100">
                                                <embed class="w-100" src="https://example.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END URL MODE --}}

                            {{-- TEXT MODE --}}
                            {{-- estiamtion box --}}
                            <div class="card card-custom mt-10">
                                <div class="px-4 py-3 estimation-box background-gray-70">
                                    <div class="d-flex align-items-center text-purple-40 b2-500">
                                        <i class='bx bxs-dollar-circle text-purple-40 b2-700 mr-2'></i>
                                        <div>
                                            EST.COST
                                        </div>
                                    </div>
                                    <div>
                                        <p class="s-400 m-0">TOTAL WORDS</p>
                                        <p class="m-0 b1-700">300</p>
                                    </div>
                                    <div>
                                        <p class="s-400 m-0">COST</p>
                                        <p class="m-0 b1-700">$0.04</p>
                                    </div>
                                </div>
                                <div class="px-4 py-3 d-flex align-items-center">
                                    <button class="btn py-2 mr-2 b2-700 text-dark-50">Cancel</button>
                                    <button class="btn py-2 button-primary-70 b2-700">Run CopyScape</button>
                                </div>
                            </div>

                            {{-- words box --}}
                            <div class="card card-custom mt-10">
                                <div
                                    class="px-4 py-3 d-flex align-items-center justify-content-between b2-400 text-dark-60">
                                    <div class="text-dark-30 b2-700">
                                        WORDS
                                    </div>

                                    <div class="d-flex rounded-sm background-dark-20 overflow-hidden">
                                        <label class="radio-tab">
                                            <input type="radio" name="words" checked>
                                            <span class="b2-400 text-white">1</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-400 text-white">2</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-400 text-white">3</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-400 text-white">4</span>
                                        </label>
                                        <label class="radio-tab">
                                            <input type="radio" name="words">
                                            <span class="b2-400 text-white">5</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- words details --}}
                            <div class="card card-custom words-detail mt-10 px-4 py-3">
                                <div class="words-detail-item">
                                    <div class="d-flex align-items-center">
                                        <div class="number background-gray-110 text-white mr-3">1</div>
                                        <p class="m-0 b2-500 text-gray-110">phases</p>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="m-0 b2-700 mr-3">4</p>
                                        <p class="m-0 b2-400">11.8%</p>
                                    </div>
                                </div>
                                <div class="words-detail-item">
                                    <div class="d-flex align-items-center">
                                        <div class="number background-gray-110 text-white mr-3">2</div>
                                        <p class="m-0 b2-500 text-gray-110">phases</p>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="m-0 b2-700 mr-3">4</p>
                                        <p class="m-0 b2-400">11.8%</p>
                                    </div>
                                </div>
                                <div class="words-detail-item">
                                    <div class="d-flex align-items-center">
                                        <div class="number background-gray-110 text-white mr-3">3</div>
                                        <p class="m-0 b2-500 text-gray-110">phases</p>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="m-0 b2-700 mr-3">4</p>
                                        <p class="m-0 b2-400">11.8%</p>
                                    </div>
                                </div>

                                <div class="words-detail-item">
                                    <div class="d-flex align-items-center">
                                        <div class="number text-gray-110 background-gray-60 mr-3">4</div>
                                        <p class="m-0 b2-500 text-gray-110">phases</p>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="m-0 b2-700 mr-3">4</p>
                                        <p class="m-0 b2-400">11.8%</p>
                                    </div>
                                </div>
                            </div>

                            {{-- END TEXT MODE --}}
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
