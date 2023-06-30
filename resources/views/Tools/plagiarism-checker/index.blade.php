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

                            <a href="/en/download-plagiarism-check-logs" target="_blank" rel="noopener noreferrer">Download (*csv) File</a>
                            <div class="mt-4">
                                <h5>MY ACCOUNT</h5>
                                @foreach ($userLogs as $log)
                                    <div class="card card-custom mb-5 mt-4">
                                        <div class="card-body px-3 pt-3 pb-0 row">
                                            <div class="col-4">
                                                {{ substr($log->content, 0, 58) }}...
                                            </div>
                                            <div class="col-2">
                                                ${{ $log->cost }}
                                            </div>
                                            <div class="col-2">
                                                {{ $log->word_count }} words
                                            </div>
                                            <div class="col-2">
                                                {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'l, d F Y') }}
                                            </div>
                                            <div class="col-2">
                                                {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <h5>ALL ACCOUNTS</h5>
                                @foreach ($cummulativeLogs as $log)
                                    <div class="card card-custom mb-5 mt-4">
                                        <div class="card-body px-3 pt-3 pb-0 row">
                                            <div class="col-4">
                                                {{ substr($log->content, 0, 58) }}...
                                            </div>
                                            <div class="col-2">
                                                ${{ $log->cost }}
                                            </div>
                                            <div class="col-2">
                                                {{ $log->word_count }} words
                                            </div>
                                            <div class="col-2">
                                                {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'l, d F Y') }}
                                            </div>
                                            <div class="col-2">
                                                {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- right results --}}
                        <div class="col-md-4"></div>
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
