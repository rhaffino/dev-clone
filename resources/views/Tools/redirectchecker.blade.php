@extends('layouts.app')

@section('title', Lang::get('redirectchecker.meta-title'))

@section('meta-desc', Lang::get('redirectchecker.meta-desc'))

@section('conical','/en/redirect-checker')

@section('en-link')
en/redirect-checker
@endsection

@section('id-link')
id/redirect-checker
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('redirectchecker.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('redirectchecker.sub-title')</p>
            @include('components.cta_form', ["message" => "Oops, we can’t see your targeted URL. Fix your targeted URL here."])

            @include('components.alert_limit')

            <div class="header-blue mb-5 px-5 py-1">
                <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}" >
                <div class="row d-flex align-items-center">
                    <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7 d-flex align-items-center py-1">
                        <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none"></i>
                        <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none"></i>
                        <input type="url" class="form-control redirect-url" name="" value="" placeholder="http://example.com" id="input-url" autocomplete="off">
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-5 d-flex align-items-center py-1">
                        <select class="form-control selectpicker user-agent mx-2" id="user-agent-select">
                            <option value="" disabled selected>@lang('redirectchecker.user-agent')</option>
                            <option value="*">All</option>
                            <option value="NinjaBot">NinjaBot</option>
                            <option value="Googlebot">Googlebot</option>
                            <option value="Googlebot-Mobile">Googlebot-Mobile</option>
                            <option value="Googlebot-Image">Googlebot-Image</option>
                            <option value="Mediapartners-Google">Mediapartners-Google</option>
                            <option value="Adsbot-Google">Adsbot-Google</option>
                            <option value="Bingbot">Bingbot</option>
                            <option value="Slurp">Slurp</option>
                            <option value="msnbot">msnbot</option>
                            <option value="msnbot-media">msnbot-media</option>
                            <option value="Teoma">Teoma</option>
                            <option value="twiceler">twiceler</option>
                            <option value="Gigabot">Gigabot</option>
                            <option value="Scrubby">Scrubby</option>
                            <option value="Robozilla">Robozilla</option>
                            <option value="ia_archiver">ia_archiver</option>
                            <option value="baiduspider">baiduspider</option>
                            <option value="naverbot">naverbot</option>
                            <option value="yeti">yeti</option>
                            <option value="yahoo-mmcrawler">yahoo-mmcrawler</option>
                            <option value="psbot">psbot</option>
                            <option value="asterias">asterias</option>
                            <option value="yahoo-blogs">yahoo-blogs</option>
                            <option value="Yandex">Yandex</option>
                            <option value="Specify">Specify</option>
                        </select>

                        @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                            <button id="analyze-btn" type="button" class="btn btn-crawl" name="button">@lang('redirectchecker.check-btn')</button>
                        @elseif (isset($access_limit) && $access_limit > 0)
                            <button disabled="disabled" type="button" class="btn btn-crawl" name="button">@lang('redirectchecker.check-btn')</button>
                        @else 
                            <button id="analyze-btn" class="next-button" style="display: none"></button>
                            <button id="process-button" type="button" class="btn btn-crawl check-limit-button analysist-button-guest" name="button">@lang('redirectchecker.check-btn')</button>
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
                    <div class="card card-custom">
                        <div class="card-body py-4 px-0">
                            <div class="" id="redirect-result-empty">
                                <div class="text-center">
                                    <p class="d-block">@lang('redirectchecker.result-none')</p>
                                    <a href="#seo-booster-container" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="" id="redirect-result-container" style="display: none;">
                                <div class="row px-5 mb-5">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <p class="font-weight-bolder text-black h6">URL</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="font-weight-bolder text-black h6">@lang('redirectchecker.status-codes')</p>
                                            <p class="font-weight-bolder text-black h6">@lang('redirectchecker.date')</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="redirect-result">

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
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progress-bar-loader">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-cancel-disabled" disabled name="button" id="cancel-request-btn">@lang('layout.cancel-btn')
                                </button>
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
                            <ul class="list-group flex-column-reverse" id="local-history">

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
                                        <p>@lang('redirectchecker.highlight')</p>
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
        <div class="local-collection-body mt-3 px-5 d-flex flex-wrap-reverse" id="local-history-mobile">

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
                        <p>@lang('redirectchecker.highlight')</p>
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
    @slot('title', 'Redirect Chain Checker')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2 class="text-black">@lang('redirectchecker.desc-1')</h2>
            <p class="text-black">@lang('redirectchecker.desc-1-1')</p>
            <p class="text-black">@lang('redirectchecker.desc-1-2')</p>
            <p class="text-black">@lang('redirectchecker.desc-1-3')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2 class="text-black">@lang('redirectchecker.desc-2')</h2>
            <p class="text-black">@lang('redirectchecker.desc-2-1')</p>
            <h4 class="sub-titles">@lang('redirectchecker.desc-2-1-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-2-1-2')</p>
            <ul>
                <li class="text-black">@lang('redirectchecker.desc-2-1-3')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-1')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-2')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-3')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-4')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-5')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-6')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-7')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-8')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-9')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-10')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-11')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-12')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-13')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-14')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-1-1-15')</li>
            </ul>
            <h4 class="sub-titles">@lang('redirectchecker.desc-2-2-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-2-2-2')</p>
            <p class="text-black">@lang('redirectchecker.desc-2-2-3')</p>
            <h4 class="sub-titles">@lang('redirectchecker.desc-2-3-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-2-3-2')</p>
            <ul>
                <li class="text-black">@lang('redirectchecker.desc-2-3-1-1')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-3-1-2')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-3-1-3')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-3-1-4')</li>
                <li class="text-black">@lang('redirectchecker.desc-2-3-1-5')</li>
            </ul>
            <h4 class="sub-titles">@lang('redirectchecker.desc-2-4-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-2-4-2')</p>
            <p class="text-black">@lang('redirectchecker.desc-2-4-3')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2 class="text-black">@lang('redirectchecker.desc-3')</h2>
            <p class="text-black">@lang('redirectchecker.desc-3-1')</p>
            <h4 class="sub-titles">@lang('redirectchecker.desc-3-1-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-3-1-2')</p>
            <h4 class="sub-titles">@lang('redirectchecker.desc-3-2-1')</h4>
            <p class="text-black">@lang('redirectchecker.desc-3-2-2')</p>
            <p class="text-black">@lang('redirectchecker.desc-3-2-3')</p>
            <p class="text-black">@lang('redirectchecker.desc-3-2-4')</p>
            <p class="text-black">@lang('redirectchecker.desc-3-2-5')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('redirectchecker.howto1')
            <div class="expand-text">
            @lang('redirectchecker.howto2')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_1.webp')}}" alt="HowTo-redirectchecker-1" width="80%">
                @lang('redirectchecker.howto3')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_2.webp')}}" alt="HowTo-redirectchecker-2" width="80%">
                @lang('redirectchecker.howto4')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_3.webp')}}" alt="HowTo-redirectchecker-3" width="80%">
                @lang('redirectchecker.howto5')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_4.webp')}}" alt="HowTo-redirectchecker-4" width="80%">
                @lang('redirectchecker.howto6')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_5.webp')}}" alt="HowTo-redirectchecker-5" width="80%">
                @lang('redirectchecker.howto7')
                <img class="mb-4" src="{{asset('/media/images/redirectchecker_instruction_6.webp')}}" alt="HowTo-redirectchecker-6" width="80%">
                @lang('redirectchecker.howto8')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection
@push('script')
<script>
    const REDIRECT_CHAIN_CHECKER_API_URL = "{{ route('api.analyze-redirect-chain') }}";
    $('#toggle_button_webmaster').click();

    $('a[href*="#seo-booster-container"]:not([href="#"])').click(function() {
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

    function myFunction(x) {
        if (x.matches) { // If media query matches
            $('.desktopDate').hide();
            $('.mobileDate').show();
        } else {
            $('.desktopDate').show();
            $('.mobileDate').hide();
        }
    }

    var x = window.matchMedia("(max-width: 767px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script>
<script src="{{ asset('js/logic/redirect-chain-checker.js') }}"></script>
<script>
    $(document).ready(function() {
        getHistories();
    })
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
            "name": "Redirect Checker",
            "item": "{{url('/')}}/{{$local}}/redirect-checker"
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

@section('redirect-checker')
active
@endsection

@section('test-n-checker')
active
@endsection
