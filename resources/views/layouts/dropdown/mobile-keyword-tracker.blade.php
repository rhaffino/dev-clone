    <div class="container keyword-tracker align-items-center justify-content-center">
        <div class="serp">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="serp__group d-flex flex-column align-items-center justify-content-center w-100">
                    <p>
                        @lang('v2_navbar.pricing_for')
                    </p>
                    <div class="serp__cta-group btn-group mt-3" role="group" aria-label="Basic example">
                        <button type="button" class="serp__cta active"
                            id="packageButtonMobile">@lang('v2_navbar.business')</button>
                        <button type="button" class="serp__cta"
                            id="paygButtonMobile">@lang('v2_navbar.payg')</button>
                    </div>
                    <div class="d-flex gap-3 align-items-center my-3">
                        <a href="https://cmlabs.co/{{ $local }}-id/pricing/serp-tracker"
                            class="fz-13 txt-bold text-decoration-underline">@lang('v2_navbar.open_pricing')</a>
                    </div>                    
                </div>
            </div>
            <div class="serp__package business" id="businessPackageMobile">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="align-baseline">
                                <th scope="col">
                                    <strong class="txt-dark-90">@lang('v2_pricing_serp.table_head_1')</strong>
                                </th>
                                <th scope="col" class="text-center">
                                    <p class="serp__package-title">STANDARD</p>
                                </th>
                                <th scope="col" class="text-center">
                                    <p class="serp__package-title">PRO</p>
                                </th>
                                <th scope="col" class="text-center">
                                    <p class="serp__package-title">ADVANCED</p>
                                </th>
                                <th scope="col" class="text-center">
                                    <p class="serp__package-title text-uppercase">@lang('v2_pricing_serp.more')</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="fz-10">
                                <th scope="row">@lang('v2_pricing_serp.row_name_1')</th>
                                <td class="text-center">&#8804;100</td>
                                <td class="recommended-bg grey text-center">&#8804;3,000</td>
                                <td class="text-center">&#8804;7,000</td>
                                <td class="serp-more text-center">@lang('v2_pricing_serp.more')</td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_2')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_3')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_4')</th>
                                <td class="text-center fz-10">
                                    50
                                </td>
                                <td class="recommended-bg grey text-center fz-10">
                                    300
                                </td>
                                <td class="text-center fz-10">
                                    @lang('v2_pricing_serp.unlimited_mobile')
                                </td>
                                <td class="serp-more text-center fz-10">
                                    @lang('v2_pricing_serp.unlimited_mobile')
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_5')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_6')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_7')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_8')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_9')</th>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_10')</th>
                                <td class="text-center">
                                    <i class="bx bx-x red bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('v2_pricing_serp.row_name_11')</th>
                                <td class="text-center">
                                    <i class="bx bx-x red bx-sm"></i>
                                </td>
                                <td class="recommended-bg grey text-center">
                                    <i class="bx bx-x red bx-sm"></i>
                                </td>
                                <td class="text-center">
                                    <i class="bx bx-check green bx-sm"></i>
                                </td>
                                <td class="serp-more text-center">
                                    <i class="bx bx-check bx-sm"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="serp__package hide payg" id="paygPackageMobile">
                <div class="serp__cost d-flex mb-4">
                    <div class="cost">
                        <p class="fz-13">@lang('v2_navbar.cost_per_word')</p>
                        <p class="fz-20 txt-dark-100"><strong class="txt-primary-100">Rp. 1.800</strong> /
                            @lang('v2_navbar.keyword')
                        </p>
                        <p class="dolar-price">@lang('v2_navbar.or_about') $0,123</p>
                    </div>
                    <div class="features">
                        <p>@lang('v2_navbar.features_you_get')</p>
                        <ul>
                            <div class="row">
                                <div>
                                    @for ($i = 0; $i < 5; $i++)
                                        <li class="feature-list"><i class="cmicon feature-checklist mr-2"></i>
                                            {{ __('v2_navbar.features')[$i] }}</li>
                                    @endfor
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                {{-- @include('v2.pricing.serp.component.pay-as-you-go.calculator', [$id = '3']) --}}
            </div>
        </div>
    </div>
