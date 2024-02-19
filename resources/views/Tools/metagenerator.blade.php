@extends('layouts.app')

@section('title', Lang::get('metagenerator.meta-title'))

@section('meta-desc', Lang::get('metagenerator.meta-desc'))

@section('conical','/en/meta-generator')

@section('en-link','/en/meta-generator')

@section('id-link','/id/meta-generator')

@if ($local == 'id')
    @php
        $listData = [
            [
                'attributes' => 'content',
                'value' => 'text',
                'description' => 'Menunjukkan nilai terkait baik atribut http-equiv atau nama.',
            ],
            [
                'attributes' => 'http-equiv',
                'value' => 'content-security-policy <br> default-style <br> content-type <br> refresh',
                'description' => 'Memberikan header <a href="https://cmlabs.co/id-id/seo-terms/http-adalah">HTTP</a> untuk informasi atau nilai yang terkait dengan atribut konten.',
            ],
            [
                'attributes' => 'name',
                'value' => 'application-name <br> description <br> author <br> generator <br> keywords <br> viewport',
                'description' => 'Menunjukkan nama yang tercantum dalam metadata.',
            ],
            [
                'attributes' => 'charset',
                'value' => 'character_set',
                'description' => 'Menunjukkan kode karakter yang digunakan untuk dokumen HTML.',
            ],
        ];
    @endphp
@else
    @php
        $listData = [
            [
                'attributes' => 'content',
                'value' => 'text',
                'description' => 'Indicates the value linked to either the http-equiv or name attributes.',
            ],
            [
                'attributes' => 'http-equiv',
                'value' => 'content-security-policy <br> default-style <br> content-type <br> refresh',
                'description' => 'Supplies the HTTP header for the information or value associated with the content attribute.',
            ],
            [
                'attributes' => 'name',
                'value' => 'application-name <br> description <br> author <br> generator <br> keywords <br> viewport',
                'description' => 'Indicates the name listed in the metadata.',
            ],
            [
                'attributes' => 'charset',
                'value' => 'character_set',
                'description' => 'Indicates the character encoding used for the HTML document.',
            ],
        ];
    @endphp
@endif

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
                                        <div class="d-flex justify-content-between">
                                            <label class="text-black font-weight-bold" for="title">@lang('metagenerator.label-title')</label>
                                            <label class="text-black font-weight-bold" for="title-meta-count">
                                                <span id="char-title">0</span> @lang('serp-simulator.label-char') (<span id="px-title">0</span> / 600px)
                                            </label>
                                        </div>
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
                                        <div class="d-flex justify-content-between">
                                            <label class="text-black font-weight-bold" for="description">@lang('metagenerator.label-description')</label>
                                            <label class="text-black font-weight-bold" for="desc-meta-count">
                                                <span id="char-desc">0</span> @lang('serp-simulator.label-char') (<span id="px-desc">0</span> / 600px)
                                            </label>
                                        </div>
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
                                            @foreach($languages as $language)
                                                <option value="{{ $language['language_name'] }}">{{ $language['language_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </form>
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
                                    <textarea name="code_snippet" style="resize:none" rows="25" class="form-control" id="json-format" readonly></textarea>
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
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 13 Oct, 2023</span>
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
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 13 Oct, 2023</span>
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
            <p>@lang('metagenerator.desc-1-2')</p>
        </div>
        @endslot
        @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p>@lang('metagenerator.desc-1-3')</p>
            <p>@lang('metagenerator.desc-1-4')</p>
            <p>@lang('metagenerator.desc-1-5')</p>
            <p>@lang('metagenerator.desc-1-6')</p>
            <h2>@lang('metagenerator.desc-2')</h2>
            <p>@lang('metagenerator.desc-2-1')</p>
            <p>@lang('metagenerator.desc-2-2')</p>
            <p>@lang('metagenerator.desc-2-3')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('metagenerator.desc-3')</h2>
            <p>@lang('metagenerator.desc-3-1')</p>
            <p>@lang('metagenerator.desc-3-2')</p>
            <p>@lang('metagenerator.desc-3-3')</p>
            <h3>@lang('metagenerator.desc-3-4')</h3>
            <p>@lang('metagenerator.desc-3-4-1')</p>
            <p>@lang('metagenerator.desc-3-4-2')</p>
            <h3>@lang('metagenerator.desc-3-5')</h3>
            <p>@lang('metagenerator.desc-3-5-1')</p>
            <p>@lang('metagenerator.desc-3-5-2')</p>
            <p>@lang('metagenerator.desc-3-5-3')</p>
            <h3>@lang('metagenerator.desc-3-6')</h3>
            <p>@lang('metagenerator.desc-3-6-1')</p>
            <p>@lang('metagenerator.desc-3-6-2')</p>
            <p>@lang('metagenerator.desc-3-6-3')</p>
            <h3>@lang('metagenerator.desc-3-7')</h3>
            <p>@lang('metagenerator.desc-3-7-1')</p>
            <p>@lang('metagenerator.desc-3-7-2')</p>
            <h3>@lang('metagenerator.desc-3-8')</h3>
            <p>@lang('metagenerator.desc-3-8-1')</p>
            <p>@lang('metagenerator.desc-3-8-2')</p>
            <h3>@lang('metagenerator.desc-3-9')</h3>
            <p>@lang('metagenerator.desc-3-9-1')</p>
            <p>@lang('metagenerator.desc-3-9-2')</p>
            <h3>@lang('metagenerator.desc-3-10')</h3>
            <p>@lang('metagenerator.desc-3-10-1')</p>
            <p>@lang('metagenerator.desc-3-10-2')</p>
            
            <h2>@lang('metagenerator.desc-4')</h2>
            <p>@lang('metagenerator.desc-4-1')</p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">@lang('metagenerator.table-header-1')</th>
                            <th scope="col">@lang('metagenerator.table-header-2')</th>
                            <th scope="col">@lang('metagenerator.table-header-3')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (collect($listData)->chunk(2) as $index => $item)
                        @foreach ($item as $listTable)
                        <tr>
                            <td scope="row" width="100px">{!! $listTable['attributes'] !!}</td>
                            <td>{!! $listTable['value'] !!}</td>
                            <td>{!! $listTable['description'] !!}</td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>

            <h2>@lang('metagenerator.desc-5')</h2>
            <p>@lang('metagenerator.desc-5-1')</p>
            <p>@lang('metagenerator.desc-5-2')</p>
            <img class="mb-4" src="{{asset('/media/images/meta_generator_instruction_3.webp')}}" alt="Example-Meta-Generator" width="80%">
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('metagenerator.howto1')
            <div class="expand-text">
            @lang('metagenerator.howto2')
                <img class="mb-4" src="{{asset('/media/images/meta_generator_instruction_1.webp')}}" alt="HowTo-Meta-Generator-1" width="80%">
                @lang('metagenerator.howto3')
                <img class="mb-4" src="{{asset('/media/images/meta_generator_instruction_2.webp')}}" alt="HowTo-Meta-Generator-2" width="80%">
                @lang('metagenerator.howto4')
                <img class="mb-4" src="{{asset('/media/images/meta_generator_instruction_4.webp')}}" alt="HowTo-Meta-Generator-3" width="80%">
                @lang('metagenerator.howto5')
                <img class="mb-4" src="{{asset('/media/images/meta_generator_instruction_5.webp')}}" alt="HowTo-Meta-Generator-4" width="80%">
                @lang('metagenerator.howto6')
                <p>@lang('metagenerator.closing-1')</p>
                <p>@lang('metagenerator.closing-2')</p>
                <p>@lang('metagenerator.closing-3')</p>
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

@section('meta-generator')
active
@endsection

@section('generator')
active
@endsection