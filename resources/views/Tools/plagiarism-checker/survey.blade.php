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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
@endpush

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mt-5 mb-10 py-4">
            <div class="row survey-container background-gray-10">
                <div class="col-lg-3 col-12 px-0 form-element">
                    <div class="nav" id="nav-tab" role="tablist">
                        <button class="flex-1 nav-link active" id="nav-intro-tab" data-toggle="tab" data-target="#nav-intro"
                            type="button" role="tab" aria-controls="nav-intro" aria-selected="true"><i
                                class="bx bx-sm bxs-megaphone"></i> @lang('plagiarism.tab-intro')</button>
                        <button class="flex-1 nav-link" id="nav-hiw-tab" data-toggle="tab" data-target="#nav-hiw"
                            type="button" role="tab" aria-controls="nav-hiw" aria-selected="false"><i
                                class="bx bx-sm bx-images"></i> @lang('plagiarism.tab-hiw')</button>
                        <button class="flex-1 nav-link" id="nav-survey-tab" data-toggle="tab" data-target="#nav-survey"
                            type="button" role="tab" aria-controls="nav-survey" aria-selected="false"><i
                                class="bx bx-sm bx-spreadsheet"></i> @lang('plagiarism.tab-survey')</button>
                    </div>
                </div>
                <div class="col-lg-9 col-12 background-white survey-content form-element">
                    <div class="tab-content survey-tabs" id="nav-tabContent">
                        <div class="tab-pane intro-tab fade show active" id="nav-intro" role="tabpanel"
                            aria-labelledby="nav-intro-tab">
                            @include('Tools.plagiarism-checker.components.survey-intro')
                        </div>
                        <div class="tab-pane hiw-tab fade" id="nav-hiw" role="tabpanel" aria-labelledby="nav-hiw-tab">
                            @include('Tools.plagiarism-checker.components.survey-hiw')
                        </div>
                        <div class="tab-pane survey-tab fade" id="nav-survey" role="tabpanel"
                            aria-labelledby="nav-survey-tab">
                            @include('Tools.plagiarism-checker.components.survey-form')
                        </div>
                    </div>
                </div>

                <div class="survey-success-container" style="display: none">
                    @include('Tools.plagiarism-checker.components.survey-success')
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="{{ asset('js/logic/plagiarism-survey.js') }}"></script>
    <script>
        const isFilledPlagiarism = localStorage.getItem('isFilledPlagiarism');
        if (isFilledPlagiarism) {
            $(".form-element").hide()
            $(".survey-success-container").show()
        }
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
