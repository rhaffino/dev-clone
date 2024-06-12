@extends('layouts.app')

@section('title', Lang::get('lookup.meta-title'))

@section('meta-desc', Lang::get('lookup.meta-desc'))

@section('conical', '/en/technology-lookup')

@section('en-link')
    en/technology-lookup
@endsection

@section('id-link')
    id/technology-lookup
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
                            <h1 class="text-darkgrey font-weight-normal">@lang('lookup.title')</h1>
                            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('lookup.sub-title')</span>
                        </div>
                        <div class="d-lg-block d-none">
                            <a href="https://chromewebstore.google.com/detail/technology-lookup-cmlabs/hhknkhcgnkdkkafiaicdfpiplbigodmj"
                                target="_blank" rel="noopener noreferrer noindex"
                                class="btn button-outline button-primary-70 b1-400">
                                <i class="bx text-primary-70 bx-extension"></i>
                                @lang('home.get-extension')
                            </a>
                        </div>
                    </div>

                    @include('components.alert_limit')

                    <div class="header-blue mt-10 mb-5 px-5 py-1">
                        <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9 d-flex align-items-center py-1">
                                <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                                <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3'
                                    style="display: none"></i>
                                <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3'
                                    style="display: none"></i>
                                <input type="url" class="form-control lookup-url" name="" value=""
                                    placeholder="http://example.com" id="input-url" autocomplete="off">
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 d-flex justify-content-end py-1">
                                @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                                    <button id="crawl-btn" type="button" class="btn btn-crawl" name="button"
                                        data-theme="dark">@lang('lookup.lookup-btn')</button>
                                @elseif (isset($access_limit) && $access_limit > 0)
                                    <button disabled="disabled" type="button" class="btn btn-crawl" name="button"
                                        data-toggle="tooltip" data-theme="dark"
                                        title="@lang('lookup.lookup-btn-tooltip')">@lang('lookup.lookup-btn')</button>
                                @else
                                    <button id="crawl-btn" class="next-button" style="display: none"></button>
                                    <button id="process-button" type="button"
                                        class="btn btn-crawl check-limit-button analysist-button-guest" name="button"
                                        data-toggle="tooltip" data-theme="dark"
                                        title="@lang('lookup.lookup-btn-tooltip')">@lang('lookup.lookup-btn')</button>
                                @endif
                                {{-- <button id="crawlButtonDisabled" type="button" class="btn btn-crawl-disabled" name="button" data-toggle="tooltip" data-theme="dark" title="Currently your are reached the limit!">PLEASE WAIT 59:12</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="px-2 mb-3">
                                <span class="text-black font-15px font-weight-bolder">@lang('lookup.technologies')</span>
                                <span class="font-15px font-weight-bolder" style="color:#9A99A2"
                                    id="technology-lookup-result-total"></span>
                                {{--
                        <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                        --}}
                            </div>
                            <div class="card card-custom" id="technology-lookup-result-container">
                                <div class="card-body py-4 px-0">
                                    <div class="" id="technology-lookup-result-empty">
                                        <div class="text-center">
                                            <p class="d-block">@lang('lookup.result-none')</p>
                                            <a href="#seo-booster" class="links">@lang('layout.learn-how-to-use')</a>
                                        </div>
                                    </div>
                                    <div class="" id="technology-lookup-result-list" style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="local-collection-desktop" class="local-collection">
                                <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                                        <span class="text-black font-15px">@lang('layout.local-history')</span>
                                    </div>
                                    <div>
                                        <span
                                            class="clear-all font-15px pointer mr-3 clear-history--btn">@lang('layout.clear-all')</span>
                                    </div>
                                </div>
                                <div class="local-collection-body">
                                    <ul class="list-group flex-column-reverse" id="local-history">
                                    </ul>
                                </div>
                            </div>
                            <div class="desktop-version">
                                <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                                    id="accordionExample2">
                                    <div class="card bg-transparent" style="">
                                        <div class="card-header" id="headingOne2">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                data-target="#collapseOne2">
                                                @lang('layout.version') 1.0
                                            </div>
                                        </div>
                                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                            <div class="card-body">
                                                <p>@lang('lookup.highlight')</p>
                                                <div class="d-flex align-items-center">
                                                    <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                                    <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar,
                                                        2021</span>
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
                <div class="local-collection-body mt-3 px-5 d-flex flex-wrap-reverse" id="local-history-mobile"></div>
                <div id="mobile-version"
                    class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                    id="accordionExample2">
                    <div class="card bg-transparent" style="">
                        <div class="card-header" id="headingOne2">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                @lang('layout.version') 1.0
                            </div>
                        </div>
                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                            <div class="card-body">
                                <p>@lang('lookup.highlight')</p>
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
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'Technology Lookup')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2 class="text-black">@lang('lookup.desc-1')</h2>
            <p class="text-black">@lang('lookup.desc-1-1')</p>
            <p class="text-black">@lang('lookup.desc-1-2')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <h2 class="text-black">@lang('lookup.desc-2')</h2>
            <p class="text-black">@lang('lookup.desc-2-1')</p>
            <ul>
                <li><p class="text-black">@lang('lookup.desc-2-1-1')</p></li>
                <li><p class="text-black">@lang('lookup.desc-2-1-2')</p></li>
                <li><p class="text-black">@lang('lookup.desc-2-1-3')</p></li>
                <li><p class="text-black">@lang('lookup.desc-2-1-4')</p></li>
            </ul>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2 class="text-black">@lang('lookup.desc-3')</h2>
            <p class="text-black">@lang('lookup.desc-3-1')</p>
            <h3 class="sub-titles">@lang('lookup.desc-3-1-1')</h3>
            <p class="text-black">@lang('lookup.desc-3-1-2')</p>
            <p class="text-black">@lang('lookup.desc-3-1-3')</p>
            <h3 class="sub-titles">@lang('lookup.desc-3-2-1')</h3>
            <p class="text-black">@lang('lookup.desc-3-2-2')</p>
            <p class="text-black">@lang('lookup.desc-3-2-3')</p>
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('lookup.howto1')
            <div class="expand-text">
                @lang('lookup.howto2')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_1.webp')}}" alt="HowTo-lookup-1" width="80%">
                @lang('lookup.howto3')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_2.webp')}}" alt="HowTo-lookup-2" width="80%">
                @lang('lookup.howto4')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_3.webp')}}" alt="HowTo-lookup-3" width="80%">
                @lang('lookup.howto5')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_4.webp')}}" alt="HowTo-lookup-4" width="80%">
                @lang('lookup.howto6')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_5.webp')}}" alt="HowTo-lookup-5" width="80%">
                @lang('lookup.howto7')
                <img class="mb-4" src="{{asset('/media/images/lookup_instruction_6.webp')}}" alt="HowTo-lookup-6" width="80%">
                @lang('lookup.howto8')
            </div>
        @endslot
        @slot('subcontent_2')
            <div class="d-none" id="description-tab-2">
                <h2 class="text-black">@lang('lookup.desc-2')</h2>
                <p class="text-black">@lang('lookup.desc-2-1')</p>
                <ul>
                    <li>
                        <p class="text-black">@lang('lookup.desc-2-1-1')</p>
                    </li>
                    <li>
                        <p class="text-black">@lang('lookup.desc-2-1-2')</p>
                    </li>
                    <li>
                        <p class="text-black">@lang('lookup.desc-2-1-3')</p>
                    </li>
                    <li>
                        <p class="text-black">@lang('lookup.desc-2-1-4')</p>
                    </li>
                </ul>
            </div>
        @endslot
        @slot('subcontent_3')
            <div class="d-none" id="description-tab-3">
                <h2 class="text-black">@lang('lookup.desc-3')</h2>
                <p class="text-black">@lang('lookup.desc-3-1')</p>
                <h4 class="sub-titles">@lang('lookup.desc-3-1-1')</h4>
                <p class="text-black">@lang('lookup.desc-3-1-2')</p>
                <p class="text-black">@lang('lookup.desc-3-1-3')</p>
                <h4 class="sub-titles">@lang('lookup.desc-3-2-1')</h4>
                <p class="text-black">@lang('lookup.desc-3-2-2')</p>
                <p class="text-black">@lang('lookup.desc-3-2-3')</p>
            </div>
        @endslot
        @slot('how_to_content')
            <div class="d-none" id="how-to">
                @lang('lookup.howto1')
                <div class="expand-text">
                    @lang('lookup.howto2')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_1.webp') }}" alt="HowTo-lookup-1"
                        width="80%">
                    @lang('lookup.howto3')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_2.webp') }}" alt="HowTo-lookup-2"
                        width="80%">
                    @lang('lookup.howto4')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_3.webp') }}" alt="HowTo-lookup-3"
                        width="80%">
                    @lang('lookup.howto5')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_4.webp') }}" alt="HowTo-lookup-4"
                        width="80%">
                    @lang('lookup.howto6')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_5.webp') }}" alt="HowTo-lookup-5"
                        width="80%">
                    @lang('lookup.howto7')
                    <img class="mb-4" src="{{ asset('/media/images/lookup_instruction_6.webp') }}" alt="HowTo-lookup-6"
                        width="80%">
                    @lang('lookup.howto8')
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
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname ==
                this.hostname) {
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
        const LOOKUP_API_URL = "{{ route('api.analyze-technology') }}";
    </script>
    <script src="{{ asset('js/logic/technology-lookup.js') }}"></script>

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
            "name": "Technology Lookup",
            "item": "{{url('/')}}/{{$local}}/technology-lookup"
        }]
    }
</script>
    @if (!session()->has('logged_in') || (session()->get('logged_in') != 'true' && $access_limit <= 0))
        <script>
            $(function() {
                $('.check-limit-button').on('click', function(e) {
                    var process_clicked = false;
                    const submitbtn = document.querySelector(".analysist-button-guest");
                    const alertLimit = document.getElementById('alert-limit');
                    const toolsCount = document.getElementById("#count-tools");
                    const countValue = document.getElementById("#count-tools").value;
                    const loginModal = document.getElementById('loginModal');
                    let totalClicked = parseInt(countValue) + 1;

                    toolsCount.value = totalClicked;
                    if (toolsCount.value <= 5) {
                        e.preventDefault();
                        $.post('{{ route('api.count') }}', {
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
                                                href="{{ url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google') }}"
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
                    } else if (toolsCount.value == 6) {
                        e.preventDefault();
                        $.post('{{ route('api.count') }}', {
                            _token: $('meta[name=csrf-token]').attr('content'),
                        });
                        submitbtn.disabled = true;
                        alertLimit.innerHTML = `
                    <div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">
                    <div class=" d-flex align-items-center mr-2" style="color: #C29C13;">
                        <i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i> @lang('alert.alert-limit')
                    </div>
                        <a href="{{ url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login/google') }}" style="color: #C29C13; font-weight: 700;">Login</a>
                    </div>`
                        $(function() {
                            $('#login-modal').modal('show');
                        });
                    } else {
                        if (process_clicked) {
                            process_clicked = false;
                            $('.next-button').trigger('click');
                            return;
                        }
                        e.preventDefault();
                        $.post('{{ route('api.limit') }}', {
                            logged_target: '{{ request()->url() }}',
                            _token: $('meta[name=csrf-token]').attr('content'),
                        }, function(response) {
                            if (response.statusCode === 200) {
                                if (response.data.limit == 1) {
                                    var alert_html =
                                        '<div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">' +
                                        '<div class="d-flex align-items-center mr-2" style="color: #C29C13;">' +
                                        '<i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i>' +
                                        response.data.message +
                                        '</div>' +
                                        '<a href="' + response.data.logged_target +
                                        '" style="color: #C29C13; font-weight: 700;">Login</a>' +
                                        '</div>';
                                    $('#alert-limit').html(alert_html);
                                } else {
                                    process_clicked = true;
                                    $('.check-limit-button').trigger('click');
                                }
                            }
                        });
                    }
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
            if (!read) {
                description_1.style.display = 'block';
                description_2.style.display = 'block';
                description_3.style.display = 'block';
                how_to.style.display = 'block';
                description_1.classList.remove("d-none");
                description_2.classList.remove("d-none");
                description_3.classList.remove("d-none");
                how_to.classList.remove("d-none");
                read_more_button.innerHTML = @json(__('layout.show-less'));
                read = true;
            } else {
                description_2.style.display = 'none';
                description_3.style.display = 'none';
                how_to.style.display = 'none';
                description_2.classList.add("d-none");
                description_3.classList.add("d-none");
                how_to.classList.add("d-none");
                read_more_button.innerHTML = @json(__('layout.read-more'));
                read = false;
            }
        });
    </script>
@endpush

@section('technology-lookup')
    active
@endsection

@section('test-n-checker')
    active
@endsection
