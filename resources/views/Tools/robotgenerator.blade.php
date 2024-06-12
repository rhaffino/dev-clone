@extends('layouts.app')

@section('title', Lang::get('robot.meta-title'))

@section('meta-desc', Lang::get('robot.meta-desc'))

@section('conical','/en/robotstxt-generator')

@section('en-link','/en/robotstxt-generator')

@section('id-link','/id/robotstxt-generator')

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('robot.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('robot.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="" id="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="robotAccess" class="text-black font-weight-bold">@lang('robot.label-robot-access')</label>
                                            <select class="form-control" name="" id="robotAccess">
                                                <option value="" disabled selected>@lang('robot.placeholder-robot-access')</option>
                                                <option value="Allow">@lang('robot.robot-access-opt-1')</option>
                                                <option value="Disallow">@lang('robot.robot-access-opt-2')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="crawlDelay" class="text-black font-weight-bold">@lang('robot.label-crawl-delay')</label>
                                            <select class="form-control" name="" id="crawlDelay">
                                                <option value="" disabled selected>@lang('robot.placeholder-crawl-delay')</option>
                                                <option value="">@lang('robot.crawl-delay-opt-1')</option>
                                                <option value="5">@lang('robot.crawl-delay-opt-2')</option>
                                                <option value="10">@lang('robot.crawl-delay-opt-3')</option>
                                                <option value="20">@lang('robot.crawl-delay-opt-4')</option>
                                                <option value="60">@lang('robot.crawl-delay-opt-5')</option>
                                                <option value="120">@lang('robot.crawl-delay-opt-6')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sitemap" class="text-black font-weight-bold">@lang('robot.label-sitemap')</label>
                                            <span class="text-darkgrey">@lang('robot.label-sitemap-helper')</span>
                                            <input type="text" id="sitemap" class="form-control" name="" value="" placeholder="https://example.com/sitemap.xml">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="d-none text-black font-weight-bold" for="" id="directive-title">@lang('robot.label-directive')</label>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-add-question d-flex align-items-center justify-content-center" name="button" id="add">
                                <i class='bx bx-plus'></i>
                                <span id="add-directive">@lang('robot.btn-add')</span>
                                <span class="d-none" id="add-more-directive">@lang('robot.btn-add')</span>
                            </button>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" style="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
                                    <div class="row mb-2">
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="copy" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-copy'></i> <span>@lang('layout.btn-copy')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="export" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-download'></i> <span>@lang('layout.btn-export')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="reset" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" readonly></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{--<div id="local-collection-desktop" class="local-collection">--}}
                        {{--<div class="local-collection-header d-flex justify-content-between px-2 mb-3">--}}
                            {{--<div class="d-flex flex-row align-items-center">--}}
                                {{--<i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>--}}
                                {{--<span class="text-black font-15px">@lang('layout.local-history')</span>--}}
                            {{--</div>--}}
                            {{-- <div> --}}
                                {{-- <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="local-collection-body"> --}}
                            {{-- <ul class="list-group" id="local-history"> --}}
                            {{-- </ul> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed pt-0" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 2.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('robot.highlight')</p>
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
        {{-- <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5"> --}}
            {{-- <div class="d-flex flex-row align-items-center"> --}}
                {{-- <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i> --}}
                {{-- <span class="text-black font-15px">@lang('layout.local-history')</span> --}}
            {{-- </div> --}}
            {{-- <div> --}}
                {{-- <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span> --}}
            {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="local-collection-body mt-3 px-5" id="local-history-mobile"></div> --}}
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('robot.highlight')</p>
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
    @slot('title', 'Robots.txt Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('robot.desc-1')</h2>
            <p>@lang('robot.desc-1-1')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
                    <h2>@lang('robot.desc-2')</h2>
                    <p>@lang('robot.desc-2-1')</p>
                </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
                    <h2>@lang('robot.desc-3')</h2>
                    <p>@lang('robot.desc-3-1')</p>
                    <ul>
                        <li>@lang('robot.desc-3-1-1')</li>
                        <li>@lang('robot.desc-3-1-2')</li>
                        <li>@lang('robot.desc-3-1-3')</li>
                    </ul>
                </div>
    @endslot
    @slot('subcontent_4')
        <div class="d-none" id="description-tab-4">
                    <h2>@lang('robot.desc-4')</h2>
                    <p>@lang('robot.desc-4-1')</p>
                    <p>@lang('robot.desc-4-2')</p>
                </div>
    @endslot
    @slot('subcontent_5')
        <div class="d-none" id="description-tab-5">
                    <h2>@lang('robot.desc-5')</h2>
                    <p>@lang('robot.desc-5-1')</p>
                    <h3 class="sub-titles">@lang('robot.desc-5-1-1')</h3>
                    <p>@lang('robot.desc-5-1-2')</p>
                    <p>@lang('robot.desc-5-1-3')</p>
                    <h3 class="sub-titles">@lang('robot.desc-5-2-1')</h3>
                    <p>@lang('robot.desc-5-2-2')</p>
                    <h3 class="sub-titles">@lang('robot.desc-5-3-1')</h3>
                    <p>@lang('robot.desc-5-3-2')</p>
                    <h3 class="sub-titles">@lang('robot.desc-5-4-1')</h3>
                    <p>@lang('robot.desc-5-4-2')</p>
                    <h3 class="sub-titles">@lang('robot.desc-5-5-1')</h3>
                    <p>@lang('robot.desc-5-5-2')</p>
                </div>
    @endslot
    @slot('subcontent_6')
        <div class="d-none" id="description-tab-6">
                    <h2>@lang('robot.desc-6')</h2>
                    <p>@lang('robot.desc-6-1')</p>
                    <pre class="language-html mb-4">
                        <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                        User-agent: *
                         Allow: /

                         Sitemap: https://example.com/sitemap.xml

                         User-agent: Googlebot
                         Disallow: /nogooglebot

                        </code>
                      </pre>
                    <p>@lang('robot.desc-6-2')</p>
                    <p>@lang('robot.desc-6-3')</p>
                </div>
    @endslot
    @slot('subcontent_7')
        <div class="d-none" id="description-tab-7">
                    <h2>@lang('robot.desc-7')</h2>
                    <p>@lang('robot.desc-7-1')</p>
                    <h3 class="sub-titles">@lang('robot.desc-7-1-1')</h3>
                    <p>@lang('robot.desc-7-1-2')</p>
                    <h3 class="sub-titles">@lang('robot.desc-7-2-1')</h3>
                    <p>@lang('robot.desc-7-2-2')</p>
                    <h3 class="sub-titles">@lang('robot.desc-7-3-1')</h3>
                    <p>@lang('robot.desc-7-3-2')</p>
                    <p>@lang('robot.desc-7-3-3')</p>
                </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('robot.howto1')
            <div class="expand-text">
            @lang('robot.howto2')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_1.webp')}}" alt="HowTo-robot-1" width="80%">
                @lang('robot.howto3')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_2.webp')}}" alt="HowTo-robot-2" width="80%">
                @lang('robot.howto4')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_3.webp')}}" alt="HowTo-robot-3" width="80%">
                @lang('robot.howto5')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_4.webp')}}" alt="HowTo-robot-4" width="80%">
                @lang('robot.howto6')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_5.webp')}}" alt="HowTo-robot-5" width="80%">
                @lang('robot.howto7')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_6.webp')}}" alt="HowTo-robot-6" width="80%">
                @lang('robot.howto8')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_7.webp')}}" alt="HowTo-robot-7" width="80%">
                @lang('robot.howto9')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_8.webp')}}" alt="HowTo-robot-8" width="80%">
                @lang('robot.howto10')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_9.webp')}}" alt="HowTo-robot-9" width="80%">
                @lang('robot.howto11')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_10.webp')}}" alt="HowTo-robot-10" width="80%">
                @lang('robot.howto12')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_11.webp')}}" alt="HowTo-robot-11" width="80%">
                @lang('robot.howto13')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_12.webp')}}" alt="HowTo-robot-12" width="80%">
                @lang('robot.howto14')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script src="{{asset('js/logic/robotgenerator.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
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
            "name": "Robots.txt Generator",
            "item": "{{url('/')}}/{{$local}}/robotstxt-generator"
        }]
    }
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    const description_4 = document.getElementById('description-tab-4');
    const description_5 = document.getElementById('description-tab-5');
    const description_6 = document.getElementById('description-tab-6');
    const description_7 = document.getElementById('description-tab-7');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            description_4.style.display = 'block';
            description_5.style.display = 'block';
            description_6.style.display = 'block';
            description_7.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            description_4.classList.remove("d-none");
            description_5.classList.remove("d-none");
            description_6.classList.remove("d-none");
            description_7.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            description_4.style.display = 'none';
            description_5.style.display = 'none';
            description_6.style.display = 'none';
            description_7.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            description_4.classList.add("d-none");
            description_5.classList.add("d-none");
            description_6.classList.add("d-none");
            description_7.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush

@section('robotstxt-generator')
active
@endsection

@section('generator')
active
@endsection
