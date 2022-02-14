<div class="dropdown-menu bg-white w-100 border-0" id="dropdownMenuKeywordTracker">
    <div class="container keyword-tracker">
        <div class="row justify-content-between w-100">
            <div class="col-3 reason-container">
                <p class="fz-13 mb-4 mt-2 txt-bold">@lang('v2_navbar.ranktrack_reason_title')</p>
                <ul>
                    @foreach (__('v2_navbar.ranktrack_reasons') as $item)
                        <li class="fz-13 txt-primary-100 d-flex align-items-center list-of-why"> <i
                                class="cmicon blue-check mr-2"></i> {{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-8 serp">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="serp__group">
                        <p>
                            @lang('v2_navbar.pricing_for')
                        </p>
                        <div class="serp__cta-group btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="serp__cta active"
                                id="packageButton">@lang('v2_navbar.business')</button>
                            <button type="button" class="serp__cta"
                                id="paygButton">@lang('v2_navbar.payg')</button>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <a href="https://cmlabs.co/{{ $local }}-id/pricing/serp-tracker"
                            class="btn text-decoration-underline txt-primary-100 txt-bold px-2 py-1 rouned-md h-auto lh-base">@lang('v2_navbar.open_pricing')</a>
                        <a href="{{ env('ANALYTICS_URL', 'https://analytics.cmlabs.co') . '/login' }}" class="btn btn-dashboard outline txt-bold px-2 py-1 rounded-md h-auto lh-base d-flex align-items-center txt-primary-100 gap-2">@lang('v2_navbar.analytics') <i class='bx bx-link-external txt-primary-100 fz-16'></i> </a>                            
                    </div>
                </div>
                <div class="serp__package business" id="businessPackage">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="align-baseline">
                                    <th scope="col">
                                        <strong class="fz-30 txt-dark-90">@lang('v2_pricing_serp.table_head_1')
                                        </strong>
                                        <p class="txt-regular-second txt-dark-90 m-0">
                                            @lang('v2_pricing_serp.table_head_sub_1')</p>
                                    </th>
                                    <th scope="col" class="text-center">
                                        <small class="serp__suitable margin-bottom">
                                            @lang('v2_pricing_serp.package_desc_1')
                                        </small>
                                        <p class="serp__package-title">@lang('v2_pricing_serp.package_name_1')</p>
                                        <small class="serp__suitable">@lang('v2_pricing_serp.start_from')</small>
                                        <p class="h3 serp__price text-center">Rp180k</p>
                                    </th>
                                    <th scope="col" class="recommended-bg grey text-center">
                                        <small class="serp__suitable margin-bottom">
                                            @lang('v2_pricing_serp.package_desc_2')
                                        </small>
                                        <p class="serp__package-title">@lang('v2_pricing_serp.package_name_2')</p>
                                        <small class="serp__suitable">@lang('v2_pricing_serp.start_from')</small>
                                        <p class="h3 serp__price text-center">Rp9m</p>
                                        <span class="serp__extra-credit">@lang('v2_pricing_serp.package_small_2')</span>
                                    </th>
                                    <th scope="col" class="text-center">
                                        <small class="serp__suitable margin-bottom">
                                            @lang('v2_pricing_serp.package_desc_3')
                                        </small>
                                        <p class="serp__package-title">@lang('v2_pricing_serp.package_name_3')</p>
                                        <small class="serp__suitable">@lang('v2_pricing_serp.start_from')</small>
                                        <p class="h3 serp__price text-center">Rp18m</p>
                                    </th>
                                    <th scope="col" class="text-center">
                                        <small class="serp__suitable margin-bottom">
                                            @lang('v2_pricing_serp.package_desc_4')
                                        </small>
                                        <p class="serp__package-title">@lang('v2_pricing_serp.package_name_4')</p>
                                        <small class="serp__suitable">@lang('v2_pricing_serp.start_from')</small>
                                        <p class="h3 serp__price text-center">@lang('v2_pricing_serp.call_us')</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_1')</th>
                                    <td class="text-center">&#8804;100</td>
                                    <td class="recommended-bg grey text-center">&#8804;3,000</td>
                                    <td class="text-center">&#8804;7,000</td>
                                    <td class="serp-more text-center">@lang('v2_pricing_serp.more')</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_2')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_3')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_4')</th>
                                    <td class="text-center">
                                        50
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        300
                                    </td>
                                    <td class="text-center">
                                        @lang('v2_pricing_serp.unlimited')
                                    </td>
                                    <td class="serp-more text-center">
                                        @lang('v2_pricing_serp.unlimited')
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_5')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_6')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_7')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_8')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_9')</th>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_10')</th>
                                    <td class="text-center">
                                        <i class='bx bx-x red bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('v2_pricing_serp.row_name_11')</th>
                                    <td class="text-center">
                                        <i class='bx bx-x red bx-sm'></i>
                                    </td>
                                    <td class="recommended-bg grey text-center">
                                        <i class='bx bx-x red bx-sm'></i>
                                    </td>
                                    <td class="text-center">
                                        <i class='bx bx-check green bx-sm'></i>
                                    </td>
                                    <td class="serp-more text-center">
                                        <i class='bx bx-check bx-sm'></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id="alertTitleAddToList" value="@lang('v2_your-list.modal_confirm-title')">
                        <input type="hidden" id="alertMessageAddToList" value="@lang('v2_your-list.modal_confirm-desc')">
                        <input type="hidden" id="cancelBtnAddToList" value="@lang('v2_your-list.modal_confirm-cancelbtn')">
                        <input type="hidden" id="addBtnAddToList" value="@lang('v2_your-list.modal_confirm-addbtn')">
                    </div>
                </div>
                <div class="serp__package hide payg" id="paygPackage">
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
                                    <div class="col-6">
                                        @for ($i = 0; $i < 3; $i++)
                                            <li class="feature-list"><i
                                                    class="cmicon-24 feature-checklist mr-2"></i>
                                                {{ __('v2_navbar.features')[$i] }}</li>
                                        @endfor
                                    </div>
                                    <div class="col-6">
                                        @for ($i = 3; $i < 5; $i++)
                                            <li class="feature-list"><i
                                                    class="cmicon-24 feature-checklist mr-2"></i>
                                                {{ __('v2_navbar.features')[$i] }}</li>
                                        @endfor
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    {{-- @include('v2.pricing.serp.component.pay-as-you-go.calculator', [$id = '2']) --}}
                </div>
            </div>
        </div>
    </div>
</div>
