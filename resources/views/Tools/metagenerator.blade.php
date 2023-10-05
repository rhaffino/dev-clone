@extends('layouts.app')

@section('title', Lang::get('metagenerator.meta-title'))

@section('meta-desc', Lang::get('metagenerator.meta-desc'))

@section('conical','/en/meta-generator')

@section('en-link','/en/meta-generator')

@section('id-link','/id/meta-generator')

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('metagenerator.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('metagenerator.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <form class="" id="form">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label class="text-black font-weight-bold" for="title">@lang('metagenerator.label-title')</label>
                                        <input type="text" name="" class="form-control title mb-5" placeholder="@lang('metagenerator.placeholder-title')" value="">
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <label class="text-black font-weight-bold" for="siteName">@lang('metagenerator.label-name')</label>
                                                <input type="text" name="" class="form-control siteName" placeholder="@lang('metagenerator.placeholder-name')" value="">
                                            </div>
                                            <div class="col-12 mb-5">
                                                <label class="text-black font-weight-bold" for="url">@lang('metagenerator.label-url')</label>
                                                <input type="text" name="" class="form-control url" placeholder="@lang('metagenerator.placeholder-url')" value="">
                                                <div class="invalid-feedback url">@lang('layout.invalid-url')</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-8 mb-lg-5">
                                        <label class="text-black font-weight-bold" for="description">@lang('metagenerator.label-description')</label>
                                        <textarea name="" class="form-control custom-textarea-89 description" placeholder="@lang('metagenerator.placeholder-description')"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <label for="imageUrl" class="font-weight-bold text-black">@lang('metagenerator.label-images')</label>
                                        <input type="text" name="" class="form-control imageUrl" placeholder="@lang('metagenerator.placeholder-images')" value="">
                                        <div class="invalid-feedback imageUrl">@lang('layout.invalid-url')</div>
                                    </div>
                                    <div class="col-6">
                                        <label class="text-black font-weight-bold" for="attendanceMode">@lang('metagenerator.label-type-content')</label>
                                        <select id="chatSet" class="form-control selectpicker custom-select-blue">
                                            <option value="UTF-8">UTF-8</option>
                                            <option value="UTF-16">UTF-16</option>
                                            <option value="ISO-8859-1">ISO-8859-1</option>
                                            <option value="WINDOWS-1252">WINDOWS-1252</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <label class="text-black font-weight-bold" for="imageUrl">@lang('metagenerator.label-revisit')</label>
                                        <select id="revisit" class="form-control selectpicker custom-select-blue custom-searchbox" data-size="4" data-live-search="true" tabindex="null">
                                            <option value="none">@lang('metagenerator.placeholder-revisit')</option>
                                            <option value="1 day">@lang('metagenerator.revisit-opt-1')</option>
                                            <option value="2 days">@lang('metagenerator.revisit-opt-2')</option>
                                            <option value="3 days">@lang('metagenerator.revisit-opt-3')</option>
                                            <option value="4 days">@lang('metagenerator.revisit-opt-4')</option>
                                            <option value="5 days">@lang('metagenerator.revisit-opt-5')</option>
                                            <option value="6 days">@lang('metagenerator.revisit-opt-6')</option>
                                            <option value="7 days">@lang('metagenerator.revisit-opt-7')</option>
                                            <option value="8 days">@lang('metagenerator.revisit-opt-8')</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="author" class="font-weight-bold text-black">@lang('metagenerator.label-author')</label>
                                        <input type="text" name="" class="form-control author" placeholder="@lang('metagenerator.placeholder-author')" value="">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <label class="text-black font-weight-bold" for="attendanceMode">@lang('metagenerator.label-robots-index')</label>
                                        <select id="robotsIndex" class="form-control selectpicker custom-select-blue">
                                            <option value="index">@lang('metagenerator.robots-index-opt-1')</option>
                                            <option value="noindex">@lang('metagenerator.robots-index-opt-2')</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="text-black font-weight-bold" for="attendanceMode">@lang('metagenerator.label-robots-follow')</label>
                                        <select id="robotsFollow" class="form-control selectpicker custom-select-blue">
                                            <option value="follow">@lang('metagenerator.robots-follow-opt-1')</option>
                                            <option value="nofollow">@lang('metagenerator.robots-follow-opt-2')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-4">
                                        <label class="text-black font-weight-bold" for="imageUrl">@lang('metagenerator.label-type')</label>
                                        <select id="typeOpengraph" class="form-control selectpicker custom-select-blue custom-searchbox" data-size="4" data-live-search="true" tabindex="null">
                                            <option value="website">@lang('metagenerator.type-opt-1')</option>
                                            <option value="article">@lang('metagenerator.type-opt-2')</option>
                                            <option value="book">@lang('metagenerator.type-opt-3')</option>
                                            <option value="books.author">@lang('metagenerator.type-opt-4')</option>
                                            <option value="books.genre">@lang('metagenerator.type-opt-5')</option>
                                            <option value="business.business">@lang('metagenerator.type-opt-6')</option>
                                            <option value="fitness.course">@lang('metagenerator.type-opt-7')</option>
                                            <option value="music.album">@lang('metagenerator.type-opt-8')</option>
                                            <option value="music.musician">@lang('metagenerator.type-opt-9')</option>
                                            <option value="music.playlist">@lang('metagenerator.type-opt-10')</option>
                                            <option value="music.radio_station">@lang('metagenerator.type-opt-11')</option>
                                            <option value="music.song">@lang('metagenerator.type-opt-12')</option>
                                            <option value="object">@lang('metagenerator.type-opt-13')</option>
                                            <option value="place">@lang('metagenerator.type-opt-14')</option>
                                            <option value="product">@lang('metagenerator.type-opt-15')</option>
                                            <option value="product.group">@lang('metagenerator.type-opt-16')</option>
                                            <option value="product.item">@lang('metagenerator.type-opt-17')</option>
                                            <option value="profile">@lang('metagenerator.type-opt-18')</option>
                                            <option value="quick_election.election">@lang('metagenerator.type-opt-19')</option>
                                            <option value="restaurant">@lang('metagenerator.type-opt-20')</option>
                                            <option value="restaurant.menu">@lang('metagenerator.type-opt-21')</option>
                                            <option value="restaurant.menu_item">@lang('metagenerator.type-opt-22')</option>
                                            <option value="restaurant.menu_section">@lang('metagenerator.type-opt-23')</option>
                                            <option value="video.episode">@lang('metagenerator.type-opt-24')</option>
                                            <option value="video.movie">@lang('metagenerator.type-opt-25')</option>
                                            <option value="video.tv_show">@lang('metagenerator.type-opt-26')</option>
                                            <option value="video.other">@lang('metagenerator.type-opt-27')</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="text-black font-weight-bold" for="imageUrl">@lang('metagenerator.label-type-twitter')</label>
                                        <select id="typeTwitter" class="form-control selectpicker custom-select-blue">
                                            <option value="summary_large_image">@lang('metagenerator.type-twitter-opt-1')</option>
                                            <option value="summary">@lang('metagenerator.type-twitter-opt-2')</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="country" class="font-weight-bold text-black">@lang('metagenerator.label-country')</label>
                                        <select id="country" class="form-control selectpicker custom-select-blue custom-searchbox mb-5" data-size="4" data-live-search="true" tabindex="null">
                                            <option value="none">@lang('metagenerator.placeholder-country')</option>
                                            @foreach($country as $c)
                                                <option value="{{ $c['name'] }}">{{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </form>

                            <!-- <button type="button" class="btn btn-add-question d-flex align-items-center justify-content-center" name="button" id="add">
                                <i class='bx bx-plus'></i>
                                <span id="add-directive">@lang('metagenerator.btn-add')</span>
                                <span class="d-none" id="add-more-directive">@lang('metagenerator.btn-add')</span>
                            </button> -->
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" style="" target="_blank" rel="nofollow noopener noreferrer" action="" method="post">
                                    <div class="row mb-2">
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="copy" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-copy'></i> <span>@lang('layout.btn-copy')</span></button>
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
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed pt-0" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('metagenerator.highlight')</p>
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
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('metagenerator.highlight')</p>
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
    @slot('title', 'Meta Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('metagenerator.desc-1')</h2>
            <p>@lang('metagenerator.desc-1-1')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
                    <h2>@lang('metagenerator.desc-2')</h2>
                    <p>@lang('metagenerator.desc-2-1')</p>
                </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
                    <h2>@lang('metagenerator.desc-3')</h2>
                    <p>@lang('metagenerator.desc-3-1')</p>
                    <ul>
                        <li>@lang('metagenerator.desc-3-1-1')</li>
                        <li>@lang('metagenerator.desc-3-1-2')</li>
                        <li>@lang('metagenerator.desc-3-1-3')</li>
                    </ul>
                </div>
    @endslot
    @slot('subcontent_4')
        <div class="d-none" id="description-tab-4">
                    <h2>@lang('metagenerator.desc-4')</h2>
                    <p>@lang('metagenerator.desc-4-1')</p>
                    <p>@lang('metagenerator.desc-4-2')</p>
                </div>
    @endslot
    @slot('subcontent_5')
        <div class="d-none" id="description-tab-5">
                    <h2>@lang('metagenerator.desc-5')</h2>
                    <p>@lang('metagenerator.desc-5-1')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-5-1-1')</h4>
                    <p>@lang('metagenerator.desc-5-1-2')</p>
                    <p>@lang('metagenerator.desc-5-1-3')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-5-2-1')</h4>
                    <p>@lang('metagenerator.desc-5-2-2')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-5-3-1')</h4>
                    <p>@lang('metagenerator.desc-5-3-2')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-5-4-1')</h4>
                    <p>@lang('metagenerator.desc-5-4-2')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-5-5-1')</h4>
                    <p>@lang('metagenerator.desc-5-5-2')</p>
                </div>
    @endslot
    @slot('subcontent_6')
        <div class="d-none" id="description-tab-6">
                    <h2>@lang('metagenerator.desc-6')</h2>
                    <p>@lang('metagenerator.desc-6-1')</p>
                    <pre class="language-html mb-4">
                        <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                        User-agent: *
                         Allow: /

                         Sitemap: https://example.com/sitemap.xml

                         User-agent: Googlebot
                         Disallow: /nogooglebot

                        </code>
                      </pre>
                    <p>@lang('metagenerator.desc-6-2')</p>
                    <p>@lang('metagenerator.desc-6-3')</p>
                </div>
    @endslot
    @slot('subcontent_7')
        <div class="d-none" id="description-tab-7">
                    <h2>@lang('metagenerator.desc-7')</h2>
                    <p>@lang('metagenerator.desc-7-1')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-7-1-1')</h4>
                    <p>@lang('metagenerator.desc-7-1-2')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-7-2-1')</h4>
                    <p>@lang('metagenerator.desc-7-2-2')</p>
                    <h4 class="sub-titles">@lang('metagenerator.desc-7-3-1')</h4>
                    <p>@lang('metagenerator.desc-7-3-2')</p>
                    <p>@lang('metagenerator.desc-7-3-3')</p>
                </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('metagenerator.howto1')
            <div class="expand-text">
            @lang('metagenerator.howto2')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_1.webp')}}" alt="HowTo-robot-1" width="80%">
                @lang('metagenerator.howto3')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_2.webp')}}" alt="HowTo-robot-2" width="80%">
                @lang('metagenerator.howto4')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_3.webp')}}" alt="HowTo-robot-3" width="80%">
                @lang('metagenerator.howto5')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_4.webp')}}" alt="HowTo-robot-4" width="80%">
                @lang('metagenerator.howto6')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_5.webp')}}" alt="HowTo-robot-5" width="80%">
                @lang('metagenerator.howto7')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_6.webp')}}" alt="HowTo-robot-6" width="80%">
                @lang('metagenerator.howto8')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_7.webp')}}" alt="HowTo-robot-7" width="80%">
                @lang('metagenerator.howto9')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_8.webp')}}" alt="HowTo-robot-8" width="80%">
                @lang('metagenerator.howto10')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_9.webp')}}" alt="HowTo-robot-9" width="80%">
                @lang('metagenerator.howto11')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_10.webp')}}" alt="HowTo-robot-10" width="80%">
                @lang('metagenerator.howto12')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_11.webp')}}" alt="HowTo-robot-11" width="80%">
                @lang('metagenerator.howto13')
                <img class="mb-4" src="{{asset('/media/images/robot_instruction_12.webp')}}" alt="HowTo-robot-12" width="80%">
                @lang('metagenerator.howto14')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script src="{{asset('js/logic/metagenerator.js')}}"></script>
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
            "name": "Meta Generator",
            "item": "{{url('/')}}/{{$local}}/meta-generator"
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

@section('meta-generator')
active
@endsection

@section('generator')
active
@endsection