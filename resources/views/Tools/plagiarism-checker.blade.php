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
    <link href="{{ asset('css/color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plagiarism_checker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/typography.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mb-10">
            <div class="card card-custom mb-5">
                <div class="card-body p-0 d-flex">
                    <div class="col-6 px-5 pt-4 pb-4 background-white">
                        <div class="d-flex gap-4 text-dark-50">
                            <i class='bx bxs-user'></i>
                            <h3 class="b2-700 ml-2">ACCOUNT USAGE</h3>
                        </div>
                        <div class="row mt-2 text-dark-70">
                            <div class="col-4">
                                <p class="s-400 m-0">
                                    YOUR REQUEST
                                </p>
                                <p class="b1-700">
                                    {{ $userSummaryLogs->user_requests }} times
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="s-400 m-0">
                                    WORDS CHECKED
                                </p>
                                <p class="b1-700">
                                    {{ $userSummaryLogs->total_words }} WORDS
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="s-400 m-0">
                                    COST
                                </p>
                                <p class="b1-700">
                                    ${{ $userSummaryLogs->total_cost }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 background-dark-70 text-white px-5 pt-4 pb-4">
                        <div class="d-flex gap-4">
                            <i class='bx bxs-group'></i>
                            <h3 class="b2-700 ml-2">CUMMULATIVE USSAGE</h3>
                        </div>
                        <div class="mt-2 d-flex justify-content-between">
                            <div class="">
                                <p class="s-400 m-0">
                                    TEAM REQUEST </p>
                                <p class="b1-700"> {{ $cummulativeSummaryLogs->team_requests }} times
                                </p>
                            </div>
                            <div class="">
                                <p class="s-400 m-0">
                                    USERS </p>
                                <p class="b1-700"> {{ $cummulativeSummaryLogs->total_users }}
                                </p>
                            </div>
                            <div class="col-3 flex-shrink-0">
                                <p class="s-400 m-0">
                                    TOTAL WORDS </p>
                                <p class="b1-700"> {{ $cummulativeSummaryLogs->total_words }} WORDS
                                </p>
                            </div>
                            <div class="">
                                <p class="s-400 m-0">
                                    COST </p>
                                <p class="b1-700"> ${{ $cummulativeSummaryLogs->total_cost }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    <h1 class="text-darkgrey font-weight-normal">PLAGIARISM CHECKER</h1>
                    <span class="text-darkgrey h4 font-weight-normal mb-10">Plagiarism detection solution powered by
                        CopyScape</span>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-custom mb-5">
                                <div class="card-body px-3 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 mb-3">
                                            <button id="button-checker" type="button"
                                                class="btn btn-generate-permutation btn-block" name="button">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-custom">
                                <div class="card-body p-0">
                                    <div class="container px-4 pt-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="mb-0 text-black mr-2"><strong>Text</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0">
                                    <textarea id="text-check" data-autoresize name="name" placeholder="Text..." rows="25" style="resize:none;"
                                        class="form-control plagiarism-checker-text__area"></textarea>
                                </div>
                            </div>
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
