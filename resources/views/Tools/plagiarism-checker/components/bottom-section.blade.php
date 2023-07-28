@php
    $lang_reg = $lang === 'id' ? 'id-id' : 'en-id';
    $cmlabs_url = env('APP_ENV') === 'production' ? 'https://cmlabs.co' : 'https://staging.cmlabs.dev';
@endphp

<div class="background-white">
    <div class="container container-tools py-10 background-white bottom-section">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div>
                    @component('v2.components.notification-card')
                        @slot('last_updated', 'Jul 21, 2023')
                        @slot('desc', __('plagiarism.update_desc'))
                        @slot('lang', $lang)
                    @endcomponent
                </div>

                <div>
                    @include('v2.components.cmlabs-services')
                </div>

                <div class="row mt-10">
                    <div class="col-12">
                        <h2 class="h6-700">@lang('plagiarism.other_tools')</h2>
                    </div>
                    <div class="col-12 mt-6">
                        @include('v2.components.other-tools')
                    </div>
                </div>
                <div class="row mt-16">
                    <div class="col-12">
                        <h2 class="h6-700">@lang('plagiarism.broaden')</h2>
                    </div>
                    <div class="col-12 mt-6">
                        @include('v2.components.cmlabs-resources')
                    </div>
                </div>
                <div class="row mt-10">
                    <div class="seo-booster-container">
                        <h2 class="h2-700 h2-m-700">Plagiarism Checker (by Copyscape)</h2>
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
            @include('v2.components.cmlabs-aliance')
        </div>
    </div>
</div>
