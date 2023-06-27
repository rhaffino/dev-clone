@extends('layouts.app')

@section('title', Lang::get('permutation.meta-title'))

@section('meta-desc', Lang::get('permutation.meta-desc'))

@section('conical','/en/plagiarism-checker')

@section('en-link')
en/plagiarism-checker
@endsection

@section('id-link')
id/plagiarism-checker
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
                <div class="col-md-8">
                    <div class="card card-custom mb-5">
                        <div class="card-body px-3 pt-3 pb-0">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mb-3">
                                    <button id="button-checker" type="button" class="btn btn-generate-permutation btn-block" name="button">Check</button>
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
                            <textarea id="text-check" data-autoresize name="name" placeholder="Text..." rows="25" style="resize:none;" class="form-control plagiarism-checker-text__area"></textarea>
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
@endsection

@push('script')
<script src="{{asset('/js/logic/plagiarism-checker.js')}}"></script>
<script>
    const PLAGIARISM_CHECK_URL = "{{route('api.plagiarism-check')}}"
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
