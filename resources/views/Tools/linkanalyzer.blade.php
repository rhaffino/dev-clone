@extends('layouts.app')

@section('title', Lang::get('analyzer.meta-title'))

@section('meta-desc', Lang::get('analyzer.meta-desc'))

@section('conical','/en/link-analyzer')

@section('en-link')
en/link-analyzer
@endsection

@section('id-link')
id/link-analyzer
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('analyzer.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('analyzer.sub-title')</p>
            @include('components.cta_form', ["message" => "Watch out, your domain giving free backlinks to other domains. Fix your issues and optimize more."])
            
            @include('components.alert_limit')

            <div class="header-blue mb-5 px-5 py-1">
                <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}" >
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none"></i>
                        <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none"></i>
                        <input type="url" class="form-control analyzer-url" name="" value="" placeholder="http://example.com" id="input-url" autocomplete="off">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                            <button id="analyze-btn" type="button" class="btn btn-crawl" name="button">@lang('analyzer.analyze-btn')</button>
                        @elseif (isset($access_limit) && $access_limit > 0)
                            <button disabled="disabled" type="button" class="btn btn-crawl" name="button">@lang('analyzer.analyze-btn')</button>
                        @else 
                            <button id="analyze-btn" class="next-button" style="display: none"></button>
                            <button id="process-button" type="button" class="btn btn-crawl check-limit-button analysist-button-guest" name="button">@lang('analyzer.analyze-btn')</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="px-2 mb-3">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.result')</span>
                        {{--
                        <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                        --}}
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-0">
                            <div class="" id="empty-container">
                                <div class="text-center">
                                    <p class="d-block">@lang('analyzer.result-none')</p>
                                    <a href="#analyzer-description" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="mt-7" id="analyzer-container" style="display: none">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 resultChart d-flex justify-content-end mb-5">
                                        <canvas id="analyzer-chart" width="150" height="150"></canvas>
                                    </div>
                                    <div class="col-lg-7 col-md-7 d-flex align-items-center resultTable mb-5">
                                        <table>
                                            <thead>
                                                <tr height="25px">
                                                    <th></th>
                                                    <th style="width:120px" class="font-weight-bolder">Total Links</th>
                                                    <th style="width:60px" class="font-weight-bolder" id="total-links-value">0</th>
                                                    <th class="font-weight-normal" id="percentage-links-value">100%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr height="25px">
                                                    <td><span class="label label-dot label-internal label-xl mr-1"></span></td>
                                                    <td class="font-weight-bolder">Internal Links</td>
                                                    <td class="font-weight-bolder" id="internal-links-value">0</td>
                                                    <td class="font-weight-normal" id="internal-links-percentage">0%</td>
                                                </tr>

                                                <tr height="25px">
                                                    <td><span class="label label-dot label-external label-xl mr-1"></span></td>
                                                    <td class="font-weight-bolder">External Links</td>
                                                    <td class="font-weight-bolder" id="external-links-value">0</td>
                                                    <td class="font-weight-normal" id="external-links-percentage">0%</td>
                                                </tr>

                                                <tr height="25px">
                                                    <td><span class="label label-dot label-nofollow label-xl mr-1"></span></td>
                                                    <td class="font-weight-bolder">No-follow</td>
                                                    <td class="font-weight-bolder" id="nofollow-links-value">0</td>
                                                    <td class="font-weight-normal" id="nofollow-links-percentage">0%</td>
                                                </tr>

                                                <tr height="25px">
                                                    <td><span class="label label-dot label-dofollow label-xl mr-1"></span></td>
                                                    <td class="font-weight-bolder">Do-follow</td>
                                                    <td class="font-weight-bolder" id="dofollow-links-value">0</td>
                                                    <td class="font-weight-normal" id="dofollow-links-percentage">0%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <nav class="mb-5">
                                    <div class="nav d-flex justify-content-center" id="nav-tab" role="tablist">
                                        <a class="btn btn-result-link active mx-2" data-toggle="tab" href="#internal-link-tab" role="tab" aria-controls="nav-home" aria-selected="true" id="internal-links-value-tab">Internal Links</a>
                                        <a class="btn btn-result-link mx-2" data-toggle="tab" href="#external-link-tab" role="tab" aria-controls="nav-profile" aria-selected="false" id="external-links-value-tab">External Links</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="internal-link-tab" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="d-flex mx-5 mb-5">
                                            <div class="number-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">No.</p>
                                            </div>
                                            <div class="url-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">URL</p>
                                            </div>
                                            <div class="link-rel-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">Link rel</p>
                                            </div>
                                            <div class="anchor-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">Anchor text</p>
                                            </div>
                                        </div>
                                        <div id="internal-link-list"></div>
                                        <div class="d-flex align-items-center justify-content-between mx-5 result-row-show-more show-more--btn" style="padding-left: 5px; padding-right: 5px;" id="show-more-internal">
                                            <div class="">
                                                <span class="label label-square label-analyzer">...</span>
                                                <span class="mx-3 analyzer-url-result">Show More</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class='bx bxs-chevron-down analyzer-show-more'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="external-link-tab" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="d-flex mx-5 mb-5">
                                            <div class="number-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">No.</p>
                                            </div>
                                            <div class="url-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">URL</p>
                                            </div>
                                            <div class="link-rel-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">Link rel</p>
                                            </div>
                                            <div class="anchor-analyzer font-weight-bolder text-black">
                                                <p class="mb-0">Anchor text</p>
                                            </div>
                                        </div>
                                        <div id="external-link-list"></div>
                                        <div class="d-flex align-items-center justify-content-between mx-5 result-row-show-more show-more--btn" style="padding-left: 5px; padding-right: 5px;" id="show-more-external">
                                            <div class="">
                                                <span class="label label-square label-analyzer">...</span>
                                                <span class="mx-3 analyzer-url-result">Show More</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class='bx bxs-chevron-down analyzer-show-more'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.progress')</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-5">
                            <div class="text-center">
                                <p class="text-black font-weight-bold mb-0" id="progress-stop-message">@lang('layout.robot-sleep')</p>
                                <p class="text-black font-weight-bold mb-0" id="progress-start-message" style="display: none">@lang('layout.robot-progress')</p>
                                <p class="text-black font-weight-bold mb-0" id="progress-finish-message" style="display: none">@lang('layout.robot-done')</p>
                                <div class="progress my-3">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progress-bar-loader"></div>
                                </div>
                                <button type="button" class="btn btn-cancel-disabled" disabled name="button" id="cancel-request-btn">@lang('layout.cancel-btn')</button>
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
                                <span class="clear-all font-15px pointer mr-3 clear-history--btn">@lang('layout.clear-all')</span>
                            </div>
                        </div>
                        <div class="local-collection-body">
                            <ul class="list-group" id="local-history">
                            </ul>
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
                                        <p>@lang('analyzer.highlight')</p>
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
            <div>
                <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5" id="local-history-mobile">

        </div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('analyzer.highlight')</p>
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
<div class="" style="background:white" id="analyzer-description">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2 class="text-black">@lang('analyzer.desc-1')</h2>
                    <p class="text-black">@lang('analyzer.desc-1-1')</p>
                    <p class="text-black">@lang('analyzer.desc-1-2')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2 class="text-black">@lang('analyzer.desc-2')</h2>
                    <p class="text-black">@lang('analyzer.desc-2-1')</p>
                    <ul>
                        <li><p class="text-black">@lang('analyzer.desc-2-1-1')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-2-1-2')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-2-1-3')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-2-1-4')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-2-1-5')</p></li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('analyzer.desc-3')</h2>
                    <p class="text-black">@lang('analyzer.desc-3-1')</p>
                    <ul>
                        <li><p class="text-black">@lang('analyzer.desc-3-1-1')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-3-1-2')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-3-1-3')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-3-1-4')</p></li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h4 class="sub-titles">@lang('analyzer.desc-4')</h4>
                    <p class="text-black">@lang('analyzer.desc-4-1-1')</p>
                    <p class="text-black">@lang('analyzer.desc-4-1-2')</p>
                    <p class="text-black">@lang('analyzer.desc-4-1-3')</p>
                    <ul>
                        <li><p class="text-black">@lang('analyzer.desc-4-1-1-1')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-4-1-1-2')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-4-1-1-3')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-4-1-1-4')</p></li>
                        <li><p class="text-black">@lang('analyzer.desc-4-1-1-5')</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('analyzer.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('analyzer.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('analyzer.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('analyzer.desc-4')</a>
                </div>
            </div>
        </div>
        @lang('analyzer.howto1')
        <div class="expand-text">
        @lang('analyzer.howto2')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_1.webp')}}" alt="HowTo-analyzer-1" width="80%">
            @lang('analyzer.howto3')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_2.webp')}}" alt="HowTo-analyzer-2" width="80%">
            @lang('analyzer.howto4')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_3.webp')}}" alt="HowTo-analyzer-3" width="80%">
            @lang('analyzer.howto5')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_4.webp')}}" alt="HowTo-analyzer-4" width="80%">
            @lang('analyzer.howto6')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_5.webp')}}" alt="HowTo-analyzer-5" width="80%">
            @lang('analyzer.howto7')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_6.webp')}}" alt="HowTo-analyzer-6" width="80%">
            @lang('analyzer.howto8')
            <img class="mb-4" src="{{asset('/media/images/analyzer_instruction_7.webp')}}" alt="HowTo-analyzer-7" width="80%">
            @lang('analyzer.howto9')
        </div>
            @if($local == 'en')
                <a class="moreless-button" href="#/">Read more</a>
                @else
                <a class="moreless-buttonid" href="#/">Baca Selengkapnya</a>
                @endif
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('analyzer.title')</p>
                <p class="text-black">@lang('analyzer.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Link Analyzer</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">@lang('analyzer.feature-sub-title')</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-1')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-2')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-3')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-4')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-5')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-6')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('analyzer.feature-7')</bdi></label>
            </div>
        </div>
        --}}
        {{--<h2 class="text-black">@lang('layout.whats-new-title') @lang('analyzer.title')</h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('analyzer.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('analyzer.whats-new-2')</span>
                </div>
            </div>
        </div>--}}
        {{--
        <p class="text-black view-all-release">@lang('layout.view-web-release')</p>
        --}}
    </div>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
<script>
    const LINK_ANALYZER_API_URL = "{{ route('api.analyze-link') }}";
    $('#toggle_button_webmaster').click();
    $('.links').click(function() {
        var offset = -80;
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top + offset
                }, 400);
                return false;
            }
        }
    });
</script>
<script src="{{ asset('js/logic/link-analyzer.js') }}"></script>
<script>
    $(document).ready(function() {
        getHistories();
    });
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
            "name": "Link Analyzer",
            "item": "{{url('/')}}/{{$local}}/link-analyzer"
        }]
    }
</script>
@if (!session()->has('logged_in') || session()->get('logged_in') != 'true' && $access_limit <= 0)
    <script>
        $(function(){
            $('.check-limit-button').on('click', function(e) {
                var process_clicked = false;
                const submitbtn = document.querySelector(".analysist-button-guest");
                const alertLimit = document.getElementById('alert-limit');
                const toolsCount = document.getElementById("#count-tools");
                const countValue = document.getElementById("#count-tools").value;
                const loginModal = document.getElementById('loginModal');
                let totalClicked = parseInt(countValue) + 1;

                toolsCount.value = totalClicked;
                if(toolsCount.value <= 5){
                    e.preventDefault();
                    $.post('{{ route("api.count") }}', {
                        _token: $('meta[name=csrf-token]').attr('content'),
                    });
                    process_clicked = true; 
                    $('.next-button').trigger('click');
                    loginModal.innerHTML = `
                    <div
                        class="modal fade"
                        id="login-modal"
                        tabindex="-1"
                        role="dialog"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content" style="border-radius:16px">
                                <div class="modal-header border-0 pb-2">
                                    <h1 class="font-weight-bolder">
                                        @lang('modal.modal-login-title')
                                    </h1>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="pb-2 bx bx-x bx-md"></i>
                                    </button>
                                </div>
                                <div class="modal-body py-2">
                                    @lang('modal.modal-login-text')
                                </div>
                                <div class="p-7">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-5">
                                            <a
                                                href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google')}}"
                                                class="btn btn-primary btn-sm btn-block font-weight-bolder"
                                            >
                                                Continue
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                }else if(toolsCount.value == 6){
                    e.preventDefault();
                    $.post('{{ route("api.count") }}', {
                        _token: $('meta[name=csrf-token]').attr('content'),
                    });
                    submitbtn.disabled = true;
                    alertLimit.innerHTML = `
                    <div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">
                    <div class=" d-flex align-items-center mr-2" style="color: #C29C13;">
                        <i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i> @lang('alert.alert-limit')
                    </div>
                        <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google')}}" style="color: #C29C13; font-weight: 700;">Login</a>
                    </div>`
                    $(function(){
                        $('#login-modal').modal('show');
                    });
                }
                else{
                    if (process_clicked) {
                    process_clicked = false;
                    $('.next-button').trigger('click');
                    return;
                }
                e.preventDefault();
                $.post('{{ route("api.limit") }}', {
                    logged_target: '{{ request()->url() }}',
                    _token: $('meta[name=csrf-token]').attr('content'),
                }, function (response) {
                    if (response.statusCode === 200) {
                        if (response.data.limit == 1) {
                            var alert_html = '<div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">' + 
                                '<div class="d-flex align-items-center mr-2" style="color: #C29C13;">'+ 
                                    '<i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i>' + 
                                    response.data.message + 
                                '</div>' + 
                                '<a href="'+ response.data.logged_target +'" style="color: #C29C13; font-weight: 700;">Login</a>' +
                            '</div>';
                            $('#alert-limit').html(alert_html);
                        } else {
                            process_clicked = true; 
                            $('.check-limit-button').trigger('click');
                        }
                    }
                });}
            });
        });
    </script>
@endif
@endpush

@section('link-analyzer')
active
@endsection

@section('test-n-checker')
active
@endsection
