@extends('layouts.app')

@section('title', Lang::get('mobiletest.meta-title'))

@section('meta-desc', Lang::get('mobiletest.meta-desc'))

@section('conical','/en/mobile-test')

@section('en-link')
en/mobile-test
@endsection

@section('id-link')
id/mobile-test
@endsection

@section('content')
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('mobiletest.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('mobiletest.sub-title')</span>
            <div class="header-blue mt-10 mb-5 px-5 py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="noCrawl" class='bx bxs-shield text-white bx-md mr-3 d-none'></i>
                        <i id="crawlHttps" class='bx bxs-check-shield text-white bx-md mr-3 d-none'></i>
                        <i id="crawlHttp" class='bx bxs-shield-x text-white bx-md mr-3 d-none'></i>
                        <input type="url" class="form-control sitemap-url" name="" value="" placeholder="{{ Lang::get('layout.input-hint') }}" id="tested_url">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        <button id="generateButton" type="button" class="btn btn-crawl" name="button">@lang('mobiletest.btn-check')</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="px-2 mb-3">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.result')</span>
                        <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-0">
                            <div class="" id="noCrawlResult">
                                <div class="text-center">
                                    <p class="d-block text-black">@lang('mobiletest.no-test-result')</p>
                                    <a href="#" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div id="crawlResult" class="d-none justify-content-between align-items-center px-5 mb-5">
                                <div class="">
                                    <p class="text-darkgrey" id="result-date"></p>
                                    <p class="h3 text-black" id="result-title"></p>
                                    <p class="mb-0 text-darkgrey" id="result-subtitle"></p>
                                </div>
                                <div class="">
                                    <img id="mobileFriendlyIcon" class="d-none" src="{{asset('/media/images/bx_bx-mobile.png')}}" alt="Mobile Friendly Icon">
                                    <img id="notMobileFriendlyIcon" class="d-none" src="{{asset('/media/images/bx_bx-mobilered.png')}}" alt="Not Mobile Friendly Icon">
                                </div>
                            </div>
                            <div id="pageIssues" class="d-none px-5">
                                <p class="font-weight-boldest text-black">@lang('mobiletest.page-issues')</p>
                                <div id="page-issues-content"></div>
                            </div>
                            <div id="mobileIssues" class="d-none px-5">
                                <p class="font-weight-boldest text-black">@lang('mobiletest.mobile-issues')</p>
                                <div id="mobile-issues-content"></div>
                            </div>
                        </div>
                    </div>
                    <div id="local-collection-desktop" class="local-collection">
                        <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                                <span class="text-black font-15px">@lang('layout.local-history')</span>
                            </div>
                            <div>
                                <span class="clear-all font-15px pointer mr-3">@lang('layout.clear-all')</span>
                            </div>
                        </div>
                        <div class="local-collection-body">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-center text-center">
                                        <span>@lang('layout.local-history-none')</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-between">
                                        <div class="local-collection-title">Hari ini saya akan menulis tentang bagaimana Hari ini saya akan menulis tentang bagaimana Hari ini saya akan menulis tentang bagaimana</div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2 text-grey date-created">Created at 11.40 | 8, JAN 2021</span>
                                            <i class='bx bxs-x-circle text-grey'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-between">
                                        <div class="local-collection-title">Sudah sembilan puluh hari, perusahaan kami m..</div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2 text-grey date-created">Created at 09.17 | 8, JAN 2021</span>
                                            <i class='bx bxs-x-circle text-grey'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-between">
                                        <div class="local-collection-title">Dalam banyak kasus, virus paling mematikan di..</div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2 text-grey date-created">Created at 08.05 | 7, JAN 2021</span>
                                            <i class='bx bxs-x-circle text-grey'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-between">
                                        <div class="local-collection-title">SEO merupakan pekerjaan marketing dengan ef..</div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2 text-grey date-created">Created at 11.21 | 5, JAN 2021</span>
                                            <i class='bx bxs-x-circle text-grey'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                                    <div class="d-flex justify-content-between">
                                        <div class="local-collection-title">Pekerjaan ini menuntut setiap penulis harus pek..</div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2 text-grey date-created">Created at 16.56 | 3, JAN 2021</span>
                                            <i class='bx bxs-x-circle text-grey'></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 2.3
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse show" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('mobiletest.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 8 Jan, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.progress')</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-5">
                            <div class="text-center">
                                <p class="text-black font-weight-bold mb-0" id="task-sleeping">@lang('layout.robot-sleep')</p>
                                <p class="d-none text-black font-weight-bold mb-0" id="task-progress">@lang('layout.robot-progress')</p>
                                <p class="d-none text-black font-weight-bold mb-0" id="task-done">@lang('layout.robot-done')</p>
                                <div class="progress my-3">
                                    <div class="progress-bar" role="progressbar" id="progress-bar-loader" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <button type="button" class="btn btn-cancel-disabled" disabled name="button" id="cancel-request-btn">@lang('layout.cancel-btn')</button>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('mobiletest.label-mobile-preview')</span>
                    </div>
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="" id="noCrawlResultPreview">
                                <div class="text-center">
                                    <p class="d-block">@lang('mobiletest.no-test-result')</p>
                                    <a href="#" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="d-none" id="CrawlResultPreview">
                                <img src="" id="mobile-image-preview" alt="Mobile Test Preview" width="100%">
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
            <div>
                <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5">
            <div class="custom-card py-5 px-3">
                <div class="d-flex justify-content-center text-center">
                    <span>@lang('layout.local-history-none')</span>
                </div>
            </div>
            <div class="custom-card py-5 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="local-collection-title">https://v2-analytics.cmlabs.co/member/domain-management</div>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at 09.17 | 8, JAN 2021"></i>
                        <i class='bx bxs-x-circle bx-sm text-grey'></i>
                    </div>
                </div>
            </div>
            <div class="custom-card py-5 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="local-collection-title">https://v2-analytics.cmlabs.co/member/domain-management</div>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at 09.17 | 8, JAN 2021"></i>
                        <i class='bx bxs-x-circle bx-sm text-grey'></i>
                    </div>
                </div>
            </div>
            <div class="custom-card py-5 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="local-collection-title">https://v2-analytics.cmlabs.co/member/domain-management</div>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at 09.17 | 8, JAN 2021"></i>
                        <i class='bx bxs-x-circle bx-sm text-grey'></i>
                    </div>
                </div>
            </div>
            <div class="custom-card py-5 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="local-collection-title">https://v2-analytics.cmlabs.co/member/domain-management</div>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at 09.17 | 8, JAN 2021"></i>
                        <i class='bx bxs-x-circle bx-sm text-grey'></i>
                    </div>
                </div>
            </div>
            <div class="custom-card py-5 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="local-collection-title">https://v2-analytics.cmlabs.co/member/domain-management</div>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at 09.17 | 8, JAN 2021"></i>
                        <i class='bx bxs-x-circle bx-sm text-grey'></i>
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.3
                    </div>
                </div>
                <div id="collapseOne2" class="collapse show" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('mobiletest.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 8 Jan, 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="" style="background:white">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2>@lang('mobiletest.desc-1')</h2>
                    <p>@lang('mobiletest.desc-1-1')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('mobiletest.desc-2')</h2>
                    <p>@lang('mobiletest.desc-2-1')</p>
                    <p>@lang('mobiletest.desc-2-2')</p>
                    <h3>@lang('mobiletest.desc-2-3')</h3>
                    <p>@lang('mobiletest.desc-2-3-1')</p>
                    <p>@lang('mobiletest.desc-2-3-2')</p>
                    <h3>@lang('mobiletest.desc-2-4')</h3>
                    <p>@lang('mobiletest.desc-2-4-1')</p>
                    <ul>
                        <li>@lang('mobiletest.desc-2-4-1-1')</li>
                        <li>@lang('mobiletest.desc-2-4-1-2')</li>
                        <li>@lang('mobiletest.desc-2-4-1-3')</li>
                        <li>@lang('mobiletest.desc-2-4-1-4')</li>
                    </ul>
                    <h3>@lang('mobiletest.desc-2-5')</h3>
                    <p>@lang('mobiletest.desc-2-5-1')</p>
                    <h3>@lang('mobiletest.desc-2-6')</h3>
                    <p>@lang('mobiletest.desc-2-6-1')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('mobiletest.desc-3')</h2>
                    <p>@lang('mobiletest.desc-3-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-1')</h3>
                    <p>@lang('mobiletest.desc-3-1-1-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-2')</h3>
                    <p>@lang('mobiletest.desc-3-1-2-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-3')</h3>
                    <p>@lang('mobiletest.desc-3-1-3-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-4')</h3>
                    <p>@lang('mobiletest.desc-3-1-4-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-5')</h3>
                    <p>@lang('mobiletest.desc-3-1-5-1')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-3')</a>
                </div>
            </div>
        </div>
        <div class="my-10" style="background:var(--darkgrey); border-radius:20px">
            <div class="row">
                <div class="col-md-6 py-5">
                    <div class="robo-container">
                        <img src="{{asset('/media/images/robo-footer.png')}}" alt="" class="robo-img">
                    </div>
                </div>
                <div class="col-md-6 py-10 pr-10">
                    <div class="robo-text-container">
                        <h2 class="text-white">@lang('layout.banner-robo-title')</h2>
                        <p class="text-white">@lang('layout.banner-robo-desc')</p>
                        <button type="button" class="btn btn-explore " name="button">@lang('layout.banner-robo-btn')</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') <span>@lang('mobiletest.title')</span></p>
                <p class="text-black">@lang('layout.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Mobile Friendly Test</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">CMLABS Analytics opens many possible ways to access, organize, and visualize your SERRPs data to suit your business needs.</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 1.0</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>Exact and average Google Search Volume. Version
                        1.3</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
            </div>
        </div>
        <h2 class="text-black">@lang('layout.whats-new-title') <span>@lang('mobiletest.title')</span></h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Dec 2, 2020</span>
                    </div>
                    <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div>
                    <span class="alert-features-text">@lang('mobiletest.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Dec 2, 2020</span>
                    </div>
                    <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div>
                    <span class="alert-features-text">@lang('mobiletest.whats-new-2')</span>
                </div>
            </div>
        </div>
        <p class="text-black view-all-release">@lang('layout.view-web-release')</p>
    </div>
</div>

{{--
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">@lang('home.homepage')</a></li>
<li class="breadcrumb-item active" style="color:#2F80ED"><b>Mobile Friendly Test</b></li>
</ol>
</nav>
<div class="card card-custom mb-5">
    <div class="card-header">
        <div class="card-title">
            <h1 class="card-label">@lang('mobiletest.title') </h1>
            <small>@lang('mobiletest.subtitle')</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 mb-5">
                        <div id="spinner">
                            <input type="text" name="" class="form-control" value="" id="url" placeholder="@lang('mobiletest.question')">
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-xxl-2 mb-5">
                        <button type="button" class="btn btn-primary form-control" name="button" id="btn-check">
                            <i class="flaticon2-heart-rate-monitor"></i> @lang('mobiletest.btn-add')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="result-section" style="display: block">
    <div class="row">
        <div class="col-lg-7 mb-5">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label">@lang('mobiletest.result-title')</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-custom mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-8 col-md-10 col-lg-8">
                                    <p class="mb-3 text-secondary" id="date-now">@lang('mobiletest.example-resultdate')</p>
                                    <span class="h1" id="result-title">@lang('mobiletest.example-resulttitle')</span>
                                    <p class="mt-3 text-black" id="result-subtitle">@lang('mobiletest.example-resultdesc')</p>
                                </div>
                                <div class="col-12 col-sm-4 col-md-2 col-lg-4" id="icon">
                                    <div class="success-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" width="100%">
                                            <g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <circle cx="150.001" cy="226.085" r="11.718" data-original="#000000" class="active-path" data-old_color="#000000" fill="#36D153" />
                                                            <path
                                                                d="M182.691,68.248h-65.382c-3.665,0-6.647,2.843-6.647,6.331v123.592c0,3.491,2.98,6.331,6.647,6.331h65.382     c3.665,0,6.647-2.843,6.647-6.331V74.579C189.336,71.088,186.356,68.248,182.691,68.248z"
                                                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#36D153" />
                                                            <path
                                                                d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003     S232.835,0,149.996,0z M208.354,224.021c0,11.458-9.29,20.749-20.749,20.749h-75.214c-11.458,0-20.749-9.29-20.749-20.749V75.323     c0-11.458,9.29-20.749,20.749-20.749h75.214c11.458,0,20.749,9.29,20.749,20.749V224.021z"
                                                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#36D153" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="error-icon" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 510 510" viewBox="0 0 510 510" width="100%">
                                            <g>
                                                <g>
                                                    <path d="m326.671 315h3.329v-135h-137.737z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#E82525" />
                                                    <path d="m317.763 120h-125.525c-6.748 0-12.238 5.49-12.238 12.238v17.762h150v-17.762c0-6.748-5.489-12.238-12.237-12.238z" data-original="#000000" class="active-path" data-old_color="#000000"
                                                        fill="#E82525" />
                                                    <path
                                                        d="m150 137.551v-5.313c0-23.29 18.948-42.238 42.238-42.238h125.525c23.29 0 42.237 18.948 42.237 42.238v216.238l80.802 81.158c44.678-47.462 69.198-109.161 69.198-174.634 0-68.113-26.524-132.149-74.688-180.312-48.163-48.164-112.199-74.688-180.312-74.688-65.098 0-126.461 24.244-173.813 68.435z"
                                                        data-original="#000000" class="active-path" data-old_color="#000000" fill="#E82525" />
                                                    <path d="m284.337 315-104.337-104.796v104.796z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#E82525" />
                                                    <path
                                                        d="m358.369 389.357c-5.053 17.668-21.338 30.643-40.606 30.643h-125.525c-23.29 0-42.238-18.948-42.238-42.238v-197.69l-89.541-89.936c-39.123 46.013-60.459 103.795-60.459 164.864 0 68.113 26.524 132.149 74.688 180.312 48.163 48.164 112.199 74.688 180.312 74.688 60.691 0 118.135-21.075 164.007-59.737z"
                                                        data-original="#000000" class="active-path" data-old_color="#000000" fill="#E82525" />
                                                    <path d="m192.238 390h125.525c6.748 0 12.237-5.49 12.237-12.238v-16.898l-15.794-15.864h-134.206v32.762c0 6.748 5.49 12.238 12.238 12.238z" data-original="#000000" class="active-path"
                                                        data-old_color="#000000" fill="#E82525" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="mobile-issues"></div>
                    <div id="resource-issues"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label">@lang('mobiletest.result-screenshot')</h2>
                    </div>
                </div>
                <div class="card-body">
                    <img id="result-image" src="{{asset('media/images/ss.jpg')}}" width="100%" height="auto" alt="mobile preview small">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" data-sticky-container>
    <div class="col-lg-8">
        <div class="card card-custom mb-4 mb-5">
            <div class="card-header">
                <div class="card-title">
                    <h2 class="card-label">@lang('mobiletest.title-2')</h2>
                </div>
            </div>
            <div class="card-body">
                <p>@lang('mobiletest.desc-2-1')</p>
            </div>
            <div class="card-header">
                <div class="card-title">
                    <h2 class="card-label">@lang('mobiletest.title-3')</h2>
                </div>
            </div>
            <div class="card-body">
                <p>@lang('mobiletest.desc-3-1')</p>
                <p>@lang('mobiletest.desc-3-2')</p>
                <h3 class="py-5">@lang('mobiletest.sub-title-3-1')</h3>
                <p>@lang('mobiletest.desc-3-3')</p>
                <p>@lang('mobiletest.desc-3-4')</p>
                <h3 class="py-5">@lang('mobiletest.sub-title-3-2')</h3>
                <p>@lang('mobiletest.desc-3-5')</p>
                <ul>
                    <li>@lang('mobiletest.desc-3-6')</li>
                    <li>@lang('mobiletest.desc-3-7')</li>
                    <li>@lang('mobiletest.desc-3-8')</li>
                    <li>@lang('mobiletest.desc-3-9')</li>
                </ul>
                <h3 class="py-5">@lang('mobiletest.sub-title-3-3')</h3>
                <p>@lang('mobiletest.desc-3-10')</p>
                <h3 class="py-5">@lang('mobiletest.sub-title-3-4')</h3>
                <p>@lang('mobiletest.desc-3-11')</p>
            </div>
            <div class="card-header">
                <div class="card-title">
                    <h2 class="card-label">@lang('mobiletest.title-4')</h2>
                </div>
            </div>
            <div class="card-body">
                <p>@lang('mobiletest.desc-4-1')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-1')</h3>
                <p>@lang('mobiletest.desc-4-2')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-2')</h3>
                <p>@lang('mobiletest.desc-4-3')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-3')</h3>
                <p>@lang('mobiletest.desc-4-4')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-4')</h3>
                <p>@lang('mobiletest.desc-4-5')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-5')</h3>
                <p>@lang('mobiletest.desc-4-6')</p>
                <h3 class="py-5"><i class="fa fa-times-circle text-danger"></i> @lang('mobiletest.sub-title-4-6')</h3>
                <p>@lang('mobiletest.desc-4-7')</p>
            </div>
        </div>
    </div>
    @include('layouts/stickybar')
</div>
</div>
</div>
--}}
@endsection
@push('script')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('home.homepage')",
            "item": "{{url('/')}}/{{$local}}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "Mobile Friendly Test"
        }]
    }
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/trigerEnterButton.js')}}"></script>
<script src="{{asset('js/logic/mobiletest.js')}}"></script>
@endpush
@section('mobile-test')
active
@endsection

@section('test-n-checker')
active
@endsection
