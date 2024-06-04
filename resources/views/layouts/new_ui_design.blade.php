@php
    if (isset($lang)) {
        $lang_reg = $lang === 'id' ? 'id-id' : 'en-id';
    } else {
        $lang_reg = 'en-id';
        $lang = 'en';
    }
    $cmlabs_url = env('APP_ENV') === 'production' ? 'https://cmlabs.co' : 'https://staging.cmlabs.dev';
@endphp

<div class="background-white">
    <div class="container container-tools py-10 background-white bottom-section">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div>
                    @component('v2.components.notification-card')
                        @slot('last_updated', 'Oct 13, 2023')
                        @slot('desc', __('home.desc-new-tools-13-Oct-2023'))
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
                <div class="mt-8">
                    @include('v2.components.chrome-extension')
                </div>
                <div class="row mt-10">
                    @component('layouts.new_booster_card')
                        @slot('title', $title)
                        @if (isset($subcontent_1))
                            @slot('subcontent_1', $subcontent_1)
                        @endif
                        @if (isset($subcontent_2))
                            @slot('subcontent_2', $subcontent_2)
                        @endif
                        @if (isset($subcontent_3))
                            @slot('subcontent_3', $subcontent_3)
                        @endif
                        @if (isset($subcontent_4))
                            @slot('subcontent_4', $subcontent_4)
                        @endif
                        @if (isset($subcontent_5))
                            @slot('subcontent_5', $subcontent_5)
                        @endif
                        @if (isset($subcontent_6))
                            @slot('subcontent_6', $subcontent_6)
                        @endif
                        @if (isset($subcontent_7))
                            @slot('subcontent_7', $subcontent_7)
                        @endif
                        @if (isset($how_to_content))
                            @slot('how_to_content', $how_to_content)
                        @endif
                        @slot('read_more', $read_more)
                        @slot('lang', $lang)
                        @slot('local', $local)
                    @endcomponent
                </div>
            </div>
            @include('v2.components.cmlabs-aliance')
        </div>
    </div>
</div>