<div class="dropdown-menu bg-white w-100 border-0" id="dropdownMenuServices">
    <div class="container flex-column services col-11">
        <div class="service-card-container d-flex justify-content-between">
            <div class="service-card">
                <div class="icon mr-4">
                    <img class="lozad" src="{{ asset('assets/images/header/seo-consultan-icon-black.svg') }}" alt="SEO consultant icon">
                </div>
                <div class="service-card__body">
                    <div class="service-card__title mb-4">
                        <a href="https://cmlabs.co/{{ $local }}-id/pricing/seo-consultant" class="txt-bold">@lang('v2_navbar.seo_consultant')</a>
                        <p class="txt-light-100">Starting from USD 698 /month</p>
                    </div>
                    <div class="list-container d-flex">
                        <ul>
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
                <div class="icon mr-4">
                    <img class="lozad" src="{{ asset('assets/images/header/content-writing-icon-black.svg') }}" alt="Content writing icon">
                </div>
                <div class="service-card__body">
                    <div class="service-card__title mb-4">
                        <a href="https://cmlabs.co/{{ $local }}-id/pricing/content-writing" class="txt-bold">@lang('v2_navbar.content_writing')</a>
                        <p class="txt-light-100">Starting from USD 471 /month</p>
                    </div>
                    <div class="list-container d-flex">
                        <ul>
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
                <div class="icon mr-4">
                    <img class="lozad" src="{{ asset('assets/images/header/content-marketing-icon-black.svg') }}" alt="Content marketing icon">
                </div>
                <div class="service-card__body">
                    <div class="service-card__title mb-4">
                        <a href="https://cmlabs.co/{{ $local }}-id/pricing/content-marketing" class="txt-bold">@lang('v2_navbar.content_marketing')</a>
                        <p class="txt-light-100">@lang('v2_navbar.content_marketing_start')</p>
                    </div>
                    <div class="list-container d-flex">
                        <ul>
                            @for ($i = 0; $i < 3; $i++)
                                <li class="tool-list fz-13">{{ __('v2_navbar.content_marketing_packages')[$i] }}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <p class="service__desc fz-12 mt-4 mx-auto">
            @lang('v2_navbar.service_desc')
        </p>

        {{-- <p class="get-quote fz-13 px-3 py-2 mx-auto">
            @lang('v2_navbar.service_promo')
            <a href="#" class="text-decoration-underline txt-bold">T&C applied!</a>
        </p> --}}
    </div>
</div>
