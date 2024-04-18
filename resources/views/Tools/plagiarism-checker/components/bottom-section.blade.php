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
                        @slot('last_updated', 'Aug 2, 2023')
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
                        @if($lang === 'en')
                            @include('Tools.plagiarism-checker.components.seo-booster-en')
                        @else
                            @include('Tools.plagiarism-checker.components.seo-booster-id')
                        @endif
                    </div>
                </div>
            </div>
            @include('v2.components.cmlabs-aliance')
        </div>
    </div>
</div>
