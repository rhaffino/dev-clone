@php
    $lang_reg = $lang === 'id' ? 'id-id' : 'en-id';
    $cmlabs_url = env('APP_ENV') === 'production' ? 'https://cmlabs.co' : 'https://staging.cmlabs.dev';
@endphp

<div class="background-white">
    <div class="container container-tools py-10 background-white bottom-section">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="notification-center-card">
                    <i class="bx bxs-bell bx-md text-yellow-80"></i>
                    <div class="card-content">
                        <h2 class="h6-700 h6-m-700">@lang('plagiarism.whatsnew')</h2>
                        <p class="mb-4 b2-400 b2-m-400">
                            <span class="text-dark-30">@lang('plagiarism.last_update')</span> Jul 21, 2023
                        </p>
                        <p class="m-0 b2-400 b2-m-400">@lang('plagiarism.update_desc')</p>
                        <a href="https://cmlabs.co/{{ $lang_reg }}/notification"
                            class="text-primary-70 b2-700 b2-m-700 text-underline">@lang('plagiarism.notif_center')</a>
                    </div>
                </div>

                <div class="row mt-8">
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="service-card">
                            <div class="text-primary-130">
                                <h2 class="h6-700 h6-m-700">@lang('plagiarism.seo_services')</h2>
                                <p class="b2-400 b2-m-400">@lang('plagiarism.service_desc')</p>
                            </div>
                            <a href="https://cmlabs.co/{{ $lang_reg }}/pricing/seo-services"
                                class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_now')</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="service-card opt">
                            <div class="text-primary-130">
                                <h2 class="h6-700 h6-m-700">@lang('plagiarism.media_buying')</h2>
                                <p class="b2-400 b2-m-400">@lang('plagiarism.service_desc')</p>
                            </div>
                            <a href="https://cmlabs.co/{{ $lang_reg }}/pricing/media-buying"
                                class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_now')</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mt-lg-8">
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        <div class="service-card">
                            <div class="text-primary-130">
                                <h2 class="h6-700 h6-m-700">@lang('plagiarism.content_writing')</h2>
                                <p class="b2-400 b2-m-400">@lang('plagiarism.service_desc')</p>
                            </div>
                            <a href="https://cmlabs.co/{{ $lang_reg }}/pricing/content-writing"
                                class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_now')</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        <div class="service-card opt">
                            <div class="text-primary-130">
                                <h2 class="h6-700 h6-m-700">@lang('plagiarism.political')</h2>
                                <p class="b2-400 b2-m-400">@lang('plagiarism.service_desc')</p>
                            </div>
                            <a href="https://cmlabs.co/{{ $lang_reg }}/pricing/political-campaign"
                                class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_now')</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        <div class="service-card opt">
                            <div class="text-primary-130">
                                <h2 class="h6-700 h6-m-700">@lang('plagiarism.backlink')</h2>
                                <p class="b2-400 b2-m-400">@lang('plagiarism.service_desc')</p>
                            </div>
                            <a href="https://cmlabs.co/{{ $lang_reg }}/pricing/media-buying"
                                class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_now')</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-10">
                    <div class="col-12">
                        <h2 class="h6-700">@lang('plagiarism.other_tools')</h2>
                    </div>
                    <div class="col-12 mt-6">
                        @include('Tools.plagiarism-checker.components.other-tools')
                    </div>
                </div>
                <div class="row mt-16">
                    <div class="col-12">
                        <h2 class="h6-700">@lang('plagiarism.broaden')</h2>
                    </div>
                    <div class="col-12 mt-6">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <a href="{{ $cmlabs_url . '/' . $lang_reg . '/blog' . '/' . $blogs->slug }}"
                                    class="resource-card">
                                    <div class="card-header p-0 m-0">
                                        <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                                        <img class="img-fluid w-100" src="{{ 'https://s3-cdn.cmlabs.co/' . $blogs->image }}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-purple-70 b2-700 b2-m-700">BLOGS</div>
                                        <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $blogs->title }}</h3>
                                        <p class="m-0 b2-400 b2-m-400 text-gray-90">{{ $blogs->published_at }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 mt-4 mt-lg-0">
                                <a href="{{ $cmlabs_url . '/' . $lang_reg . '/seo-terms' . '/' . $seo_terms->slug }}"
                                    class="resource-card">
                                    <div class="card-header p-0 m-0">
                                        <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                                        <img class="img-fluid w-100" src="{{ 'https://s3-cdn.cmlabs.co/' . $seo_terms->image }}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-purple-70 b2-700 b2-m-700">SEO TERMS</div>
                                        <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $seo_terms->title }}</h3>
                                        <p class="m-0 b2-400 b2-m-400 text-gray-90">{{ $seo_terms->published_at }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 mt-4 mt-lg-0">
                                <a href="{{ $cmlabs_url . '/' . $lang_reg . '/seo_guidelines' . '/' . $seo_guidelines->slug }}"
                                    class="resource-card">
                                    <div class="card-header p-0 m-0">
                                        <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                                        <img class="img-fluid w-100" src{{ 'https://s3-cdn.cmlabs.co/' . $seo_guidelines->image }}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-purple-70 b2-700 b2-m-700">SEO GUIDELINES</div>
                                        <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $seo_guidelines->title }}</h3>
                                        <p class="m-0 b2-400 b2-m-400 text-gray-90">
                                            {{ $seo_guidelines->published_at }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-10">
                    <div class="seo-booster-container">
                        <h2 class="h2-700 h2-m-700">Plagiarism Checker (by CopyScape)</h2>
                        <div class="d-flex align-items-center author">
                            <i class='bx bxs-user-circle'></i>
                            <p class="m-0 b2-400 b2-m-400">Writen by cmlabs</p>
                            <div>|</div>
                            <p class="m-0 b2-400 b2-m-400">Published at Aug 21, 2021</p>
                        </div>
                        <p class="m-0 p-400 p-m-400">The scope of business niches in Indonesia is widely known and
                            varied. There are always innovations presented every year, both in large companies and the
                            new startups in the city. It's certainly a sign that your competitors are growing and
                            potentially get the top position on the first page of Google search is getting tighter.</p>
                        <p class="m-0 p-400 p-m-400">The scope of business niches in Indonesia is widely known and
                            varied. There are always innovations presented every year, both in large companies and the
                            new startups in the city. It's certainly a sign that your competitors are growing and
                            potentially get the top position on the first page of Google search is getting tighter.</p>
                        <p class="m-0 p-400 p-m-400">The scope of business niches in Indonesia is widely known and
                            varied. There are always innovations presented every year, both in large companies and the
                            new startups in the city. It's certainly a sign that your competitors are growing and
                            potentially get the top position on the first page of Google search is getting tighter.</p>
                        <div class="b2-400 b2-m-400 text-gray-90">Edited at Aug 21, 2023</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="cmlabs-aliance-container mb-10">
                    <div class="h6-700 h6-m-700 text-center">@lang('plagiarism.cmlabs_alliance')</div>
                    <div class="b2-400 b2-m-400 text-center">@lang('plagiarism.cmlabs_alliance-desc')</div>
                    <div class="aliance-card">
                        <div class="aliance-card-body text-white">
                            <i class="bx bx-sm bxs-bulb text-white"></i>
                            <div class="h6-700 h6-m-700">@lang('plagiarism.writing_starter')</div>
                            <p class="b2-400 b2-m-400">@lang('plagiarism.writing_starter_desc')</p>
                        </div>
                        <a href="https://cmlabs.co/{{ $lang_reg }}/seo-guidelines"
                            class="btn button-primary-130 b1-400 b1-m-400">@lang('plagiarism.explore_today')</a>
                    </div>
                </div>
                <a class="mt-10 w-100" href="https://sequence.day">
                    <img src="{{ asset('media/images/sequence-card.webp') }}" class="img-fluid"
                        alt="Sequence business partner card">
                </a>
                <div class="storylabs-container mt-10">
                    <div class="storylabs-container-head">
                        <div class="s-700 s-m-700 text-dark-50">StoryLabs</div>
                        <div class="b2-700 b2-m-700 text-center">@lang('plagiarism.story_lab-desc')</div>
                    </div>
                    <div class="storylabs-container-body">
                        <a href="https://storylabs.id/{{ $lang }}/backlinks/" target="_blank"
                            rel="noopener noreferrer" class="storylabs-button green-story-labs">
                            <img src="{{ asset('media/images/storylabs-backlink.svg') }}"
                                alt="backlink icon storylabs">
                            <div class="b2-400 b2-m-400">Backlink</div>
                        </a>
                        <a href="https://storylabs.id/{{ $lang }}/advertorials/" target="_blank"
                            rel="noopener noreferrer" class="storylabs-button green-story-labs">
                            <img src="{{ asset('media/images/storylabs-advertorial.svg') }}"
                                alt="advertorial icon storylabs">
                            <div class="b2-400 b2-m-400">Advertorial</div>
                        </a>
                        <a href="https://storylabs.id/{{ $lang }}/ad-placements/" target="_blank"
                            rel="noopener noreferrer" class="storylabs-button green-story-labs">
                            <img src="{{ asset('media/images/storylabs-ad.svg') }}"
                                alt="ad placement icon storylabs">
                            <div class="b2-400 b2-m-400">Ad Placement</div>
                        </a>
                        <a href="https://storylabs.id/{{ $lang }}/partnerships/" target="_blank"
                            rel="noopener noreferrer" class="storylabs-button green-story-labs">
                            <img src="{{ asset('media/images/storylabs-partnership.svg') }}"
                                alt="partnership icon storylabs">
                            <div class="b2-400 b2-m-400">Partnership</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
