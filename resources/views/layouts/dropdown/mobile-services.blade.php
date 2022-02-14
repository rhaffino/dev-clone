    <div class="container flex-column services p-0 py-4">
        <div class="service-card-container d-flex flex-column justify-content-center">
            <div class="service-card">
                <div class="d-flex">
                    <div class="icon mr-3">
                        <img class="lozad" src="{{ asset('assets/images/header/seo-consultan-icon-black.svg') }}" alt="SEO consultan icon">
                    </div>
                    <div class="service-card__title mb-2">
                        <a href="https://cmlabs.co/en-id/pricing/seo-consultant" class="txt-bold txt-dark-100">@lang('v2_navbar.seo_consultant')</a>
                        <p class="txt-light-100">Starting from USD 698 /month</p>
                    </div>
                </div>
                <div class="service-card__body">
                    <div class="list-container d-flex">
                        <ul class="w-100">
                            @for ($i = 0; $i < 3; $i++)
                                <li class="tool-list fz-13">{{ __('v2_navbar.seo_consultant_packages')[$i] }}
                                    <strong>{{ __('v2_navbar.packages')[$i] }}</strong>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>

            <div class="service-card">
                <div class="d-flex">
                    <div class="icon mr-3">
                        <img class="lozad" src="{{ asset('assets/images/header/content-writing-icon-black.svg') }}" alt="Content writing icon">
                    </div>
                    <div class="service-card__title mb-2">
                        <a href="https://cmlabs.co/en-id/pricing/content-writing" class="txt-dark-100 txt-bold">@lang('v2_navbar.content_writing')</a>
                        <p class="txt-light-100">Starting from USD 471 /month</p>
                    </div>
                </div>
                <div class="service-card__body">
                    <div class="list-container d-flex">
                        <ul class="w-100">
                            @for ($i = 0; $i < 3; $i++)
                                <li class="tool-list fz-13">{{ __('v2_navbar.content_writing_packages')[$i] }}
                                    <strong>{{ __('v2_navbar.packages')[$i] }}</strong>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            <div class="service-card">
                <div class="d-flex">
                    <div class="icon mr-3">
                        <img class="lozad" src="{{ asset('assets/images/header/content-marketing-icon-black.svg') }}" alt="Content marketing icon">
                    </div>
                    <div class="service-card__title mb-2">
                        <a href="https://cmlabs.co/en-id/pricing/content-marketing" class="txt-dark-100 txt-bold">@lang('v2_navbar.content_marketing')</a>
                        <p class="txt-light-100">@lang('v2_navbar.content_marketing_start')</p>
                    </div>
                </div>
                <div class="service-card__body">
                    <div class="list-container d-flex">
                        <ul class="w-100">
                            @for ($i = 0; $i < 3; $i++)
                                <li class="tool-list fz-13">{{ __('v2_navbar.content_marketing_packages')[$i] }}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <p class="service__desc fz-12 mt-4 mx-auto txt-light-100">@lang('v2_navbar.service_desc')</p>
    </div>
