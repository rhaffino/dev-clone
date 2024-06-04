@extends('layouts.app')

@section('title', Lang::get('metachecker.meta-title'))

@section('meta-desc', Lang::get('metachecker.meta-desc'))

@section('conical','/en/page-title-meta-description-checker')

@section('en-link')
    en/page-title-meta-description-checker
@endsection

@section('id-link')
    id/page-title-meta-description-checker
@endsection

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mb-10">
            <div class="d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1 class="text-darkgrey font-weight-normal">@lang('metachecker.title')</h1>
                            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('metachecker.sub-title')</p>
                        </div>
                        <div class="d-lg-block d-none">
                            <a href="https://chromewebstore.google.com/detail/title-meta-description-ch/bhncaplgjfhllfadbkeigmfnpilkmbgh" target="_blank" rel="noopener noreferrer noindex" class="btn button-outline button-primary-70 b1-400">
                                <i class="bx text-primary-70 bx-extension"></i>
                                Get Extension
                            </a>
                        </div>
                    </div>

                    <div class="mb-5" id="cta-warning" style="display: none">
                        <div class="cta-yellow px-5 py-1 cta-border-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                                    <i class='bx bxs-error bx-md mr-3 text-black'></i>
                                    <p class="mb-0 text-black">Your meta title or description is not SEO-Friendly. Visit our website and optimize your website better!</p>
                                </div>
                                <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                                    <a href="https://cmlabs.co/en-id/pricing/content-writing" target="_blank" rel="noreferrer nofollow external" type="button" class="btn btn-cta" name="button">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('components.alert_limit')

                    <div class="header-blue py-3 mb-5 px-4">
                        <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}" >
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2 text-left pl-0 col-mobile">
                                <div class="d-flex align-items-center metachecker-option">
                                    <div
                                        class="metachecker-background-text-size-left-edge d-flex justify-content-center align-items-center p-2 ml-5">
                                        <i class='bx bxs-cog text-white'></i>
                                    </div>
                                    <div id="manualModeOff"
                                         class="d-none metachecker-background-text-size text-white font-weight-bolder justify-content-center align-items-center p-2"
                                         data-toggle="tooltip" data-theme="dark"
                                         title="{{ Lang::get('metachecker.tooltip-manual-off') }}">
                                        MANUAL
                                    </div>
                                    <div id="manualModeOn"
                                         class="d-block metachecker-background-text-size active text-white font-weight-bolder justify-content-center align-items-center p-2"
                                         data-toggle="tooltip" data-theme="dark"
                                         title="{{ Lang::get('metachecker.tooltip-manual-on') }}">
                                        MANUAL
                                    </div>
                                    <div id="botModeOff"
                                         class="d-block metachecker-background-text-size metachecker-background-text-size-right-edge text-white font-weight-bolder justify-content-center align-items-center p-2"
                                         data-toggle="tooltip" data-theme="dark"
                                         title="{{ Lang::get('metachecker.tooltip-bot-off') }}">
                                        BOT
                                    </div>
                                    <div id="botModeOn"
                                         class="d-none metachecker-background-text-size active metachecker-background-text-size-right-edge text-white font-weight-bolder justify-content-center align-items-center p-2"
                                         data-toggle="tooltip" data-theme="dark"
                                         title="{{ Lang::get('metachecker.tooltip-bot-on') }}">
                                        BOT
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-mobile">
                                <input id="url" type="text" class="input-url input-url-meta-checker text-center w-100"
                                       placeholder="https://example.com" value="" autocomplete="off">
                            </div>
                            <div class="col-md-3 text-right col-mobile">
                                @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                                    <button id="crawlURL" class="btn btn-crawl px-10">@lang('metachecker.btn-crawl')</button>
                                @elseif (isset($access_limit) && $access_limit > 0)
                                    <button disabled="disabled" class="btn btn-crawl px-10">@lang('metachecker.btn-crawl')</button>
                                @else 
                                    <button id="crawlURL" class="next-button" style="display: none"></button>
                                    <button id="process-button" class="btn btn-crawl px-10 check-limit-button analysist-button-guest">@lang('metachecker.btn-crawl')</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="manual-mode" class="mb-5 d-block">
                        <div class="bg-info bg-primaryblue border-radius-5px mb-5 px-9 py-5">
                            <div class="row d-flex flex-column ">
                                <div class="d-flex align-items-center justify-content-between flex-row">
                                    <div class="">
                                        <span class="meta-title mr-5">PAGE TITLE</span>
                                        <div class="progress-bar_wrap">
                                            <div id="titlebar1"
                                                 class="progress-bar_item progress-bar_item-1 blank"></div>
                                            <div id="titlebar2"
                                                 class="progress-bar_item progress-bar_item-2 blank"></div>
                                            <div id="titlebar3"
                                                 class="progress-bar_item progress-bar_item-3 blank"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Character : <strong id="title-char">0</strong>
                                            </p>
                                        </div>
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Pixel : <strong id="title-pixel">0px</strong></p>
                                        </div>
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Word : <strong id="title-word">0</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <input id="title" type="text"
                                       class="form-control bg-primaryblue text-white px-0 input-meta-title mb-2"
                                       autocomplete="off"
                                       placeholder="{{ Lang::get('metachecker.input-hint-manual') }}">
                                <div class="align-items-center d-none" id="title-bad-char">
                                    <i class='bx bx-error text-white mr-2'></i>
                                    <p class="mb-0 text-white" id="title-bad-char-point">Character More Than 12</p>
                                </div>
                                <div class="align-items-center d-none" id="title-bad-pixel">
                                    <i class='bx bx-error text-white mr-2'></i>
                                    <p class="mb-0 text-white" id="title-bad-pixel-point">Pixel More Than 12px</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-info py-5 px-9 bg-primaryblue border-radius-5px">
                            <div class="row d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between flex-row">
                                    <div class="">
                                        <span class="meta-desc mr-5">META DESCRIPTION</span>
                                        <div class="progress-bar_wrap">
                                            <div id="descbar1"
                                                 class="progress-bar_item progress-bar_item-1 blank"></div>
                                            <div id="descbar2"
                                                 class="progress-bar_item progress-bar_item-2 blank"></div>
                                            <div id="descbar3"
                                                 class="progress-bar_item progress-bar_item-3 blank"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Character : <strong id="desc-char">0</strong></p>
                                        </div>
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Pixel : <strong id="desc-pixel">0px</strong></p>
                                        </div>
                                        <div class="text-center mx-2">
                                            <p class="mb-0 text-white">Word : <strong id="desc-word">0</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <textarea id="desc" data-autoresize rows="1"
                                          class="mb-2 form-control bg-primaryblue text-white px-0 input-meta-description"
                                          autocomplete="off"
                                          placeholder="{{ Lang::get('metachecker.input-hint-manual') }}"
                                          style="resize:none; overflow:hidden"></textarea>
                                <div class="align-items-center d-none" id="desc-bad-char">
                                    <i class='bx bx-error text-white mr-2'></i>
                                    <p class="mb-0 text-white" id="desc-bad-char-point">Character More Than 12</p>
                                </div>
                                <div class="align-items-center d-none" id="desc-bad-pixel">
                                    <i class='bx bx-error text-white mr-2'></i>
                                    <p class="mb-0 text-white" id="desc-bad-pixel-point">Pixel More Than 12px</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div id="DesktopResult" class="col-md-7">
                            <div class="card card-custom mb-5">
                                <div class="card-body px-0">
                                    <div class="d-flex flex-column px-10 py-3">
                                        <div class="link-meta d-flex flex-row align-items-center mb-2">
                                            <span>career.cmlabs.co<i class='bx bx-caret-down ml-1'
                                                                     style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div class="title-meta mb-2">
                                            Career at cmlabs - Lets Join us and be a part of Imagineers!
                                        </div>
                                        <div class="desc-meta">
                                            cmlabs opens opportunities for those of you who want to join our team. Find
                                            information about job vacancies, internal programs, and other collaborations
                                            at career cmlabs.
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column px-10 py-3 bg-color-lightyellow">
                                        <div class="link-meta d-flex flex-row align-items-center mb-2">
                                            <span><span id="resulturl">cmlabs.co</span><i class='bx bx-caret-down ml-1'
                                                                                          style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div id="resulttitle" class="title-meta mb-2 color-green">
                                            Incorporating quality practices in SEO fields - cmlabs
                                        </div>
                                        <div id="resultdesc" class="desc-meta">
                                            PT CMLABS INDONESIA DIGITAL is a company that focuses on SEO, Marketing ...
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column px-10 py-3">
                                        <div class="link-meta d-flex flex-row align-items-center mb-2">
                                            <span>tools.cmlabs.co › home<i class='bx bx-caret-down ml-1'
                                                                           style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div class="title-meta mb-2">
                                            19 SEO Tools (Free) English Version \ cmlabs
                                        </div>
                                        <div class="desc-meta">
                                            The cmlabs tool is an online tool developed to help content writers, SEO
                                            specialists and developers improve the quality of their work. All of these
                                            tools are free and accessible for all users without limits.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="local-collection metachecker-local">
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
                        <div id="MobileResult" class="col-md-5">
                            <div class="card card-custom mb-5">
                                <div class="card-body px-0">
                                    <div class="d-flex flex-column px-10 py-3">
                                        <div class="link-meta d-flex align-items-center mb-2">
                                            <span>career.cmlabs.co<i class='bx bx-caret-down ml-1'
                                                                     style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div class="title-meta mb-2">
                                            Career at cmlabs - Lets Join us and be a part of Imagineers!
                                        </div>
                                        <div class="desc-meta">
                                            cmlabs opens opportunities for those of you who want to join our team. Find
                                            information about job vacancies, internal programs, and other collaborations
                                            at career cmlabs.
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column px-10 py-3 bg-color-lightyellow">
                                        <div class="link-meta d-flex flex-row align-items-center mb-2">
                                            <span><span id="resulturlmobile">cmlabs.co</span><i
                                                    class='bx bx-caret-down ml-1'
                                                    style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div id="resulttitlemobile" class="title-meta mb-2 color-green">
                                            Incorporating quality practices in SEO fields - cmlabs
                                        </div>
                                        <div id="resultdescmobile" class="desc-meta">
                                            PT CMLABS INDONESIA DIGITAL is a company that focuses on SEO, Marketing ...
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column px-10 py-3">
                                        <div class="link-meta d-flex flex-row align-items-center mb-2">
                                            <span>tools.cmlabs.co › home<i class='bx bx-caret-down ml-1'
                                                                           style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                        </div>
                                        <div class="title-meta mb-2">
                                            19 SEO Tools (Free) English Version \ cmlabs
                                        </div>
                                        <div class="desc-meta">
                                            The cmlabs tool is an online tool developed to help content writers, SEO
                                            specialists and developers improve the quality of their work. All of these
                                            tools are free and accessible for all users without limits.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="desktop-version">
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
                                                <p>@lang('metachecker.highlight')</p>
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
                <div class="local-collection-body mt-3 px-5" id="localsavemobile"></div>
                <div id="mobile-version"
                     class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                     id="accordionExample2">
                    <div class="card bg-transparent" style="">
                        <div class="card-header" id="headingOne2">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                @lang('layout.version') 2.0
                            </div>
                        </div>
                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                            <div class="card-body">
                                <p>@lang('metachecker.highlight')</p>
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
        @slot('title', 'Title and Meta Checker')
        @slot('subcontent_1')
            <div class="" id="description-tab-1">
                <h2>@lang('metachecker.desc-1')</h2>
                <p>@lang('metachecker.desc-1-1')</p>
                <p>@lang('metachecker.desc-1-2')</p>
                <p>@lang('metachecker.desc-1-3')</p>
                <p>@lang('metachecker.desc-1-4')</p>
                <ul>
                    <li>@lang('metachecker.desc-1-1-1')</li>
                    <li>@lang('metachecker.desc-1-1-2')</li>
                    <li>@lang('metachecker.desc-1-1-3')</li>
                    <li>@lang('metachecker.desc-1-1-4')</li>
                </ul>
            </div>
        @endslot
        @slot('subcontent_2')
            <div class="d-none" id="description-tab-2">
                <h2>@lang('metachecker.desc-2')</h2>
                <p>@lang('metachecker.desc-2-1')</p>
                <p>@lang('metachecker.desc-2-2')</p>
                <p>@lang('metachecker.desc-2-3')</p>
                <h4 class="sub-titles">@lang('metachecker.desc-2-1-1')</h4>
                <p>@lang('metachecker.desc-2-1-2')</p>
                <p>@lang('metachecker.desc-2-1-3')</p>
                <h4 class="sub-titles">@lang('metachecker.desc-2-2-1')</h4>
                <p>@lang('metachecker.desc-2-2-2')</p>
            </div>
        @endslot
        @slot('subcontent_3')
            <div class="d-none" id="description-tab-3">
                <h2>@lang('metachecker.desc-3')</h2>
                <p>@lang('metachecker.desc-3-1')</p>
                <p>@lang('metachecker.desc-3-2')</p>
                <ul>
                    <li>@lang('metachecker.desc-3-1-1')</li>
                    <li>@lang('metachecker.desc-3-1-2')</li>
                </ul>
                <p>@lang('metachecker.desc-3-3')</p>
                <ul>
                    <li>@lang('metachecker.desc-3-1-3')</li>
                    <li>@lang('metachecker.desc-3-1-4')</li>
                    <li>@lang('metachecker.desc-3-1-5')</li>
                    <li>@lang('metachecker.desc-3-1-6')</li>
                </ul>
                <p>@lang('metachecker.desc-3-4')</p>
            </div>
        @endslot
        @slot('how_to_content')
            <div class="d-none" id="how-to">
                @lang('metachecker.howto1')
                <div class="expand-text">
                    @lang('metachecker.howto2')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_1.webp')}}" alt="HowTo-metachecker-1" width="80%">
                    @lang('metachecker.howto3')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_2.webp')}}" alt="HowTo-metachecker-2" width="80%">
                    @lang('metachecker.howto4')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_3.webp')}}" alt="HowTo-metachecker-3" width="80%">
                    @lang('metachecker.howto5')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_4.webp')}}" alt="HowTo-metachecker-4" width="80%">
                    @lang('metachecker.howto6')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_5.webp')}}" alt="HowTo-metachecker-5" width="80%">
                    @lang('metachecker.howto7')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_6.webp')}}" alt="HowTo-metachecker-6" width="80%">
                    @lang('metachecker.howto8')
                    <img class="mb-4" src="{{asset('/media/images/metachecker_instruction_7.webp')}}" alt="HowTo-metachecker-7" width="80%">
                    @lang('metachecker.howto9')
                </div>
            </div>
        @endslot
        @slot('read_more')
            <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
        @endslot
    @endcomponent
    <span id="titlesizer"></span>
    <span id="descsizer"></span>
@endsection

@push('script')
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
        "name": "Title & Meta Description Checker",
        "item": "{{url('/')}}/{{$local}}/page-title-meta-description-checker"
    }]
}
</script>
<script>
    const META_CHECKER_URL = "{{route('api.analyze-meta')}}"
</script>
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/metachecker.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_writer').click();
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
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush

@section('title-checker')
    active
@endsection
