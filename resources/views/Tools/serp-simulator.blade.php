@extends('layouts.app')

@section('title', Lang::get('serp-simulator.meta-title'))

@section('meta-desc', Lang::get('serp-simulator.meta-desc'))

@section('conical','/en/serp-simulator')

@section('en-link')
en/serp-simulator
@endsection

@section('id-link')
id/serp-simulator
@endsection

@section('content')
@if ($is_maintenance)
    @include('components.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('serp-simulator.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('serp-simulator.sub-title')</p>

            @include('components.alert_limit')

            <div class="header-blue mt-10 mb-5 px-5 py-1">
                <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}" >
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none"></i>
                        <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none"></i>
                        <input type="url" class="form-control lookup-url" name="" value="" placeholder="@lang('serp-simulator.serp-placeholder')" id="input-url" autocomplete="off">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                            <button id="crawl-btn" type="button" class="btn btn-crawl" name="button" data-toggle="tooltip" data-theme="dark" title="@lang('serp-simulator.serp-btn-tooltip')">@lang('serp-simulator.serp-btn')</button>
                        @elseif (isset($access_limit) && $access_limit > 0)
                            <button disabled="disabled" type="button" class="btn btn-crawl" name="button" data-toggle="tooltip" data-theme="dark" title="@lang('serp-simulator.serp-btn-tooltip')">@lang('serp-simulator.serp-btn')</button>
                        @else
                            <button id="crawl-btn" class="next-button" style="display: none"></button>
                            <button id="process-button" type="button" class="btn btn-crawl check-limit-button analysist-button-guest" name="button" data-toggle="tooltip" data-theme="dark" title="@lang('serp-simulator.serp-btn-tooltip')">@lang('serp-simulator.serp-btn')</button>
                        @endif
                        {{-- <button id="crawlButtonDisabled" type="button" class="btn btn-crawl-disabled" name="button" data-toggle="tooltip" data-theme="dark" title="Currently your are reached the limit!">PLEASE WAIT 59:12</button>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-custom mb-5">
                        <div class="card-body py-3 px-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div id="desktop-serp" class="active wordcounter-background-text-size wordcounter-background-text-size-left-edge font-weight-bolder d-flex justify-content-center align-items-center p-2" data-toggle="tooltip" data-theme="dark" title="" data-original-title="@lang('serp-simulator.serp-desktop')">
                                        <i class='bx bx-laptop bx-sm text-white'></i>
                                    </div>
                                    <div id="mobile-serp" class="wordcounter-background-text-size wordcounter-background-text-size-right-edge font-weight-bolder d-flex justify-content-center align-items-center p-2" data-toggle="tooltip" data-theme="dark" title="" data-original-title="@lang('serp-simulator.serp-mobile')">
                                        <i class='bx bx-mobile-alt bx-sm text-white'></i>
                                    </div>

                                    <div class="action-preview">
                                        <i id="ads-serp-preview"
                                            class='bx bx-money bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                            data-toggle="tooltip" data-theme="dark"
                                            title="@lang('serp-simulator.serp-ads')"></i>
                                        <i id="date-serp-preview"
                                            class='bx bxs-calendar bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                            data-toggle="tooltip" data-theme="dark"
                                            title="@lang('serp-simulator.serp-date')"></i>
                                        <i id="rating-serp-preview"
                                            class='bx bxs-star bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                            data-toggle="tooltip" data-theme="dark"
                                            title="@lang('serp-simulator.serp-rating')"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i id="reset-serp-preview"
                                        class='bx bx-reset bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                        data-toggle="tooltip" data-theme="dark"
                                        title="@lang('serp-simulator.serp-reset')"></i>
                                    <i id="download-serp-preview"
                                        class='bx bxs-download bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                        data-toggle="tooltip" data-theme="dark"
                                        title="@lang('serp-simulator.serp-download')"></i>
                                    <i id="pdf-serp-preview"
                                        class='bx bxs-file-pdf bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                        data-toggle="tooltip" data-theme="dark"
                                        title="@lang('serp-simulator.serp-pdf')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom serp-simulator-result" id="serp-result-container">
                        <div class="card-body py-5 px-0">
                        <!-- Snippet Desktop -->
                            <div id="snippet-desktop">
                                <div class="snippet-header d-flex">
                                    <div class="snippet-logo">
                                        <img alt="Google logo" width="92" src="{{ asset('media/serp-snippet/google-logo-serp-simulator.webp') }}">
                                    </div>
                                    <div>
                                        <form action="#" class="snippet-form-tag position-relative">
                                            <strong class="snippet-label text-small">
                                                <svg class="svg-search" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(66, 133, 244, 1);"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
                                                <i class='bx bx-search bx-sm'></i>
                                            </strong>
                                            <input class="snippet-input" placeholder="@lang('serp-simulator.snippet-input')" type="text">
                                        </form>

                                        <div class="snippet-menu d-flex">
                                            <div class="snippet-search-cat menu-active">@lang('serp-simulator.snippet-cat-1')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-2')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-3')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-4')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-5')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-6')</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="snippet-results">
                                    <div class="snippet-count">@lang('serp-simulator.snippet-count')</div>

                                    <!-- Ads Google -->
                                    <div class="snippet-result snippet-ads">
                                        <div class="snippet-url  snippet-truncate d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="ad-label">@lang('serp-simulator.ad-label')</span>
                                                        <span>@lang('serp-simulator.ad-domain-1')</span> › @lang('serp-simulator.ad-breadcrumbs-1')  
                                                    </div>
                                                    
                                                    <svg class="svg-dots" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="snippet-title">@lang('serp-simulator.ad-snippet-title-1')</div>
                                        <div class="snippet-desc snippet-truncate">@lang('serp-simulator.ad-snippet-desc-1')</div>
                                    </div>
                                    <div class="snippet-result snippet-ads">
                                        <div class="snippet-url snippet-truncate d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="ad-label">@lang('serp-simulator.ad-label')</span>
                                                        <span>@lang('serp-simulator.ad-domain-2')</span> › @lang('serp-simulator.ad-breadcrumbs-2')  
                                                    </div>
                                                    
                                                    <svg class="svg-dots" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="snippet-title">@lang('serp-simulator.ad-snippet-title-2')</div>
                                        <div class="snippet-desc">@lang('serp-simulator.ad-snippet-desc-2')</div>
                                    </div>

                                    <div class="snippet-result snippet-preview" id="desktop-preview-result">
                                        <div class="snippet-url snippet-truncate d-flex align-items-center">
                                            <div class="favicon__container">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(77, 81, 86, 1);margin-left: 0.8px;" class="svg-favicon d-flex-item-none"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>
                                                <img src="https://www.google.com/s2/favicons?domain=default" class="d-flex-item-none snippet-favicon">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="snippet-website">cmlabs.co</div>
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="snippet-breadcrumbs">https://tools.cmlabs.co</span>  
                                                    </div>
                                                    <svg class="svg-dots" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="snippet-title snippet-title-preview">@lang('serp-simulator.snippet_title')</div>
                                        <div class="snippet-desc"><span class="snippet-date">Sep 20, 2023 - </span><span class="snippet-desc-preview" id="snippet-desc-preview-desktop">@lang('serp-simulator.snippet_desc')</span></div>
                                        <div class="snippet-rating align-items-center">
                                            <div class="snippet-rating-vote">
                                                <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                <svg class="svg-star" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star"></i>
                                            </div>
                                            @lang('serp-simulator.snippet_rating')
                                        </div>
                                    </div>

                                    <div class="snippet-result is-placeholder">
                                        <div><span class="snippet-url d-block"></span></div>
                                        <div><span class="snippet-title"></span></div>
                                        <div class="snippet-desc"></div>
                                    </div>

                                    <div class="snippet-result is-placeholder">
                                        <div><span class="snippet-url d-block"></span></div>
                                        <div><span class="snippet-title"></span></div>
                                        <div class="snippet-desc"></div>
                                    </div>

                                    <div class="snippet-result is-placeholder">
                                        <div><span class="snippet-url d-block"></span></div>
                                        <div><span class="snippet-title"></span></div>
                                        <div class="snippet-desc"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="snippet-mobile">
                                <div class="snippet-header">
                                    <div class="snippet-logo text-center">
                                        <img alt="Logo" width="92" src="{{ asset('media/serp-snippet/google-logo-serp-simulator.webp') }}">
                                    </div>

                                    <div>

                                        <form action="#" class="snippet-form-tag position-relative">
                                            <strong class="snippet-label text-small">
                                                <svg class="svg-search" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(66, 133, 244, 1);"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
                                                <i class='bx bx-search bx-sm'></i>
                                            </strong>
                                            <input class="snippet-input" placeholder="@lang('serp-simulator.snippet-input')" type="text">
                                        </form>

                                        <div class="snippet-menu d-flex">
                                            <div class="snippet-search-cat menu-active">@lang('serp-simulator.snippet-cat-1')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-2')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-3')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-4')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-5')</div>
                                            <div class="snippet-search-cat">@lang('serp-simulator.snippet-cat-6')</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="snippet-results">
                                    <div class="snippet-result snippet-ads">
                                        <div class="snippet-url snippet-truncate d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="ad-label">@lang('serp-simulator.ad-label')</span>
                                                        <span>@lang('serp-simulator.ad-domain-1')</span> › @lang('serp-simulator.ad-breadcrumbs-1')  
                                                    </div>
                                                </div>
                                            </div>
                                            <svg class="svg-dots ms-auto" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                            <i class='bx bx-dots-vertical-rounded ms-auto'></i>
                                        </div>
                                        <div class="snippet-title">@lang('serp-simulator.ad-snippet-title-1')</div>
                                        <div class="snippet-desc">@lang('serp-simulator.ad-snippet-desc-1')</div>
                                    </div>
                                    <div class="snippet-result snippet-ads">
                                        <div class="snippet-url snippet-truncate d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="ad-label">@lang('serp-simulator.ad-label')</span>
                                                        <span>@lang('serp-simulator.ad-domain-2')</span> › @lang('serp-simulator.ad-breadcrumbs-2')  
                                                    </div>
                                                </div>
                                            </div>
                                            <svg class="svg-dots ms-auto" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                            <i class='bx bx-dots-vertical-rounded ms-auto'></i>
                                        </div>
                                        <div class="snippet-title">@lang('serp-simulator.ad-snippet-title-2')</div>
                                        <div class="snippet-desc">@lang('serp-simulator.ad-snippet-desc-2')</div>
                                    </div>

                                    <div class="snippet-result snippet-preview">
                                        <div class="snippet-url d-flex align-items-center">
                                            <div class="favicon__container">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(77, 81, 86, 1);margin-left: 0.8px;" class="svg-favicon d-flex-item-none"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>
                                                <img src="https://www.google.com/s2/favicons?domain=default" class="snippet-favicon">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="snippet-website">cmlabs.co</div>
                                                <div class="snippet-domain d-flex align-items-center">
                                                    <div>
                                                        <span class="snippet-breadcrumbs">https://tools.cmlabs.co</span>  
                                                    </div>
                                                </div>
                                            </div>
                                            <svg class="svg-dots ms-auto" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                            <i class='bx bx-dots-vertical-rounded ms-auto'></i>
                                        </div>
                                        <div class="snippet-title snippet-title-preview">This is an Example of a Title Tag</div>
                                        <div class="snippet-desc">
                                            <span class="snippet-date">Sep 20, 2023 - </span><span class="snippet-desc-preview" id="snippet-desc-preview-mobile">Here is an example of what a snippet looks like in Google's SERPs. The content that appears here is usually taken from the Meta Description tag if relevant.</span>
                                        </div>
                                        <div class="snippet-rating">
                                            <div class="d-flex align-items-center">
                                                4,1 
                                                <div class="snippet-rating-vote">
                                                    <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                    <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                    <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                    <svg class="svg-star-active" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: rgba(251, 188, 4, 1);"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                    <svg class="svg-star" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #B5B5C3;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>
                                                    <i class="bx bxs-star active"></i>
                                                    <i class="bx bxs-star active"></i>
                                                    <i class="bx bxs-star active"></i>
                                                    <i class="bx bxs-star active"></i>
                                                    <i class="bx bxs-star"></i>
                                                </div>
                                                (61)
                                            </div>
                                        </div>
                                        <!-- <canvas id="canvas2" width="720" height="180" style="margin: -20px -60px; opacity:0.75;" class="uk-position-top-left"></canvas> -->
                                    </div>

                                    <div class="snippet-result is-placeholder">
                                        <div class="snippet-url d-flex align-items-center">
                                            <div class="favicon__container">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(77, 81, 86, 1);margin-left: 0.8px;" class="svg-favicon d-flex-item-none"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>
                                                <img src="https://www.google.com/s2/favicons?domain=default" class="snippet-favicon">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="snippet-url-mobile"></div>
                                            </div>
                                        </div>
                                        <div class="snippet-title"></div>
                                        <div class="snippet-desc"></div>
                                    </div>
                                    <div class="snippet-result is-placeholder">
                                        <div class="snippet-url d-flex align-items-center">
                                            <div class="favicon__container">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(77, 81, 86, 1);margin-left: 0.8px;" class="svg-favicon d-flex-item-none"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>
                                                <img src="https://www.google.com/s2/favicons?domain=default" class="snippet-favicon">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="snippet-url-mobile"></div>
                                            </div>
                                        </div>
                                        <div class="snippet-title"></div>
                                        <div class="snippet-desc"></div>
                                    </div>
                                    <div class="snippet-result is-placeholder">
                                        <div class="snippet-url d-flex align-items-center">
                                            <div class="favicon__container">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(77, 81, 86, 1);margin-left: 0.8px;" class="svg-favicon d-flex-item-none"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>
                                                <img src="https://www.google.com/s2/favicons?domain=default" class="snippet-favicon">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="snippet-url-mobile"></div>
                                            </div>
                                        </div>
                                        <div class="snippet-title"></div>
                                        <div class="snippet-desc"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom mb-5 p-5 practice-serp-simulator" id="practice-serp-simulator">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <p class="h6 text-black font-weight-bolder mb-5">@lang('serp-simulator.practice-title')</p>
                                <label for="URL" class="font-weight-bold text-black">@lang('serp-simulator.label-url')</label>
                                <div class="position-relative">
                                    <input id="url" type="text" class="form-control url" name="" placeholder="@lang('serp-simulator.placeholder-url')" value="">
                                    <label class="label-btn-fetch" id="btn-fetch">
                                        @lang('serp-simulator.label-btn-fetch')
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="d-flex justify-content-between">
                                    <label class="text-black font-weight-bold" for="title-meta">@lang('serp-simulator.label-title-meta')</label>
                                    <label class="text-black font-weight-bold" for="title-meta-count">
                                        <span id="char-title">0</span> @lang('serp-simulator.label-char') (<span id="px-title">0</span> / 600px)
                                    </label>
                                </div>
                                <textarea name="" class="form-control custom-textarea-82 title mb-5" placeholder="@lang('serp-simulator.placeholder-title-meta')"></textarea>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="d-flex justify-content-between">
                                    <label class="text-black font-weight-bold" for="desc-meta">@lang('serp-simulator.label-desc-meta')</label>
                                    <label class="text-black font-weight-bold" for="desc-meta-count">
                                        <span id="char-desc">0</span> @lang('serp-simulator.label-char') (<span id="px-desc">0</span> / 600px)
                                    </label>
                                </div>
                                <textarea name="" class="form-control custom-textarea-82 desc mb-5" placeholder="@lang('serp-simulator.placeholder-desc-meta')"></textarea>
                            </div>
                            <div class="col-12 mb-5">
                                <label for="keywords" class="font-weight-bold text-black">@lang('serp-simulator.label-keyword')</label>
                                <input type="text" class="form-control keywords" name="" placeholder="@lang('serp-simulator.placeholder-keyword')" value="" disabled>
                            </div>
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
                                        <p>@lang('serp-simulator.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 21 Aug, 2023</span>
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
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('serp-simulator.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 21 Aug, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'SERP Simulator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2 class="text-black">@lang('serp-simulator.desc-1')</h2>
            <p class="text-black">@lang('serp-simulator.desc-1-1')</p>
            <p class="text-black">@lang('serp-simulator.desc-1-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-1-3')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p class="text-black">@lang('serp-simulator.desc-1-4')</p>
            <p class="text-black">@lang('serp-simulator.desc-1-5')</p>
            <p class="text-black">@lang('serp-simulator.desc-1-6')</p>
            <p class="text-black">@lang('serp-simulator.desc-1-7')</p>
            <h2 class="text-black">@lang('serp-simulator.desc-2')</h2>
            <p class="text-black">@lang('serp-simulator.desc-2-1')</p>
            @lang('serp-simulator.desc-2-1-1')
            <p class="text-black">@lang('serp-simulator.desc-2-1-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-1-3')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-1-4')</p>
            @lang('serp-simulator.desc-2-2-1')
            <p class="text-black">@lang('serp-simulator.desc-2-2-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-2-3')</p>
            @lang('serp-simulator.desc-2-3-1')
            <p class="text-black">@lang('serp-simulator.desc-2-3-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-3-3')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-3-4')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-3-5')</p>
            @lang('serp-simulator.desc-2-4-1')
            <p class="text-black">@lang('serp-simulator.desc-2-4-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-4-3')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-4-4')</p>
            @lang('serp-simulator.desc-2-5-1')
            <p class="text-black">@lang('serp-simulator.desc-2-5-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-5-3')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-5-4')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-5-5')</p>
            @lang('serp-simulator.desc-2-6-1')
            <p class="text-black">@lang('serp-simulator.desc-2-6-2')</p>
            <p class="text-black">@lang('serp-simulator.desc-2-6-3')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('serp-simulator.howto-title')
            <div class="expand-text">
                @lang('serp-simulator.howto1')
                <img class="mb-4" src="{{asset('/media/images/SERP_simulator_instruction_1.webp')}}" alt="HowTo-SERP-Simulator-1" width="80%">
                @lang('serp-simulator.howto2')
                <img class="mb-4" src="{{asset('/media/images/SERP_simulator_instruction_2.webp')}}" alt="HowTo-SERP-Simulator-2" width="80%">
                @lang('serp-simulator.howto3')
                <img class="mb-4" src="{{asset('/media/images/SERP_simulator_instruction_3.webp')}}" alt="HowTo-SERP-Simulator-3" width="80%">
                @lang('serp-simulator.howto4')
                <img class="mb-4" src="{{asset('/media/images/SERP_simulator_instruction_4.webp')}}" alt="HowTo-SERP-Simulator-4" width="80%">
                @lang('serp-simulator.howto5')
                @lang('serp-simulator.closing-1')
                @lang('serp-simulator.closing-2')
                @lang('serp-simulator.closing-3')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
    $('a[href*="#"]:not([href="#"])').click(function() {
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
<script>
    const SERP_CHECK_API_URL = "{{ route('api.metadata-scraper') }}";
</script>
<script src="{{asset('js/logic/html2canvas.js')}}"></script>
<script src="{{asset('js/logic/dom-image.js')}}"></script>
<script src="{{asset('js/logic/serp-simulator.js')}}"></script>
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
            "name": "SERP simulator",
            "item": "{{url('/')}}/{{$local}}/serp-simulator"
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
                                                href="{{ env('MAIN_URL', 'https://cmlabs.co') }}/{{ App::isLocale('id') ? 'id-id' : 'en' }}/login/?logged_target={{ request()->url() }}"
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
                        <a href="{{ env('MAIN_URL', 'https://cmlabs.co') }}/{{ App::isLocale('id') ? 'id-id' : 'en' }}/login/?logged_target={{ request()->url() }}" style="color: #C29C13; font-weight: 700;">Login</a>
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
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush

@push('style')
<link rel="stylesheet" href="{{asset('css/serp-simulator.css')}}">
@endpush

@section('serp-simulator')
active
@endsection

@section('test-n-checker')
active
@endsection