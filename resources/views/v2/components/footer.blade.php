@php
    if (isset($lang)) {
        $lang_region = $lang === 'id' ? 'id-id' : 'en-id';
    } else {
        $lang_region = 'en-id';
        $lang = 'en';
    }
@endphp

<div class="footer-bottom">
    <input type="hidden" id="usd-idr-footer">
    <div class="footer-menu background-gray-30">
        <div class="cmlabs-container">
            <p class="footer-title h3-700 h3-m-700 text-dark-70 ">@lang('v2_footer.bottom_title')</p>
            <div class="row">
                <div class="col-lg-4 col-12">
                    <p class="office-location p-700 p-m-700">Jakarta, Indonesia (HQ)</p>
                    <p class="office-address b2-400 b2-m-400">
                        <span class="b2-700 b2-m-700 text-purple-70">cmlabs Jakarta HQ</span> Jl. Pluit Kencana Raya
                        No.63, Pluit, Penjaringan, Jakarta Utara, DKI Jakarta, 14450, Indonesia
                    </p>
                    <a href="tel:622166604470" class="office-phone b2-500 text-dark-100"> <span
                            class="text-dark-30">(+62) 21-</span><b>666-04470</b></a>

                    <p class="office-address b2-400 b2-m-400 mt-2">
                        <span class="b2-700 b2-m-700 text-purple-70">cmlabs Jakarta Office 2</span> Jl. Tanah Abang I
                        No.11, Petojo Selatan, Gambir, Jakarta Pusat, DKI Jakarta 10160, Indonesia
                    </p>

                    <p class="office-address b2-400 b2-m-400 mt-2">
                        <span class="b2-700 b2-m-700 text-purple-70">cmlabs Malang</span> Jl. Seruni No.9, Lowokwaru,
                        Kota Malang, Jawa Timur, 65141, Indonesia
                    </p>
                    <a href="tel:62341475665" class="office-phone b2-500 text-dark-100"> <span
                            class="text-dark-30">(+62) 341-</span><b>475-665</b></a>
                    <div class="d-flex flex-column">
                        <a href="https://cmlabs.co/{{ $lang_region }}/jakarta-office"
                            class="mktcmlgtm_footer_visit_jakarta">
                            <button
                                class="mktcmlgtm_footer_visit_jakarta btn button-purple-70 mt-3 py-1 button-outline w-100 d-flex align-items-center justify-content-center">
                                <i class="bx bxs-coffee me-2 text-purple-70"></i>
                                <span class="b2-400 b2-m-400">@lang('v2_footer.menu_visit-jakarta')</span>
                            </button>
                        </a>
                        <a href="https://cmlabs.co/{{ $lang_region }}/malang-office"
                            class="mktcmlgtm_footer_visit_malang">
                            <button
                                class="mktcmlgtm_footer_visit_malang btn button-purple-70 mt-3 py-1 button-outline w-100 d-flex align-items-center justify-content-center">
                                <i class="bx bxs-game me-2 text-purple-70"></i>
                                <span class="b2-400 b2-m-400">@lang('v2_footer.menu_visit-malang')</span>
                            </button>
                        </a>
                    </div>
                    <div
                        class="row align-items-center flex-column justify-content-center partner-badge d-none d-lg-block">
                        <div>
                            <div class="partner-badge-card">
                                <p class="m-0 text-gray-110 text-start b2-400 fst-italic">@lang('v2_footer.badge-title')</p>
                                <div class="pill w-100">
                                    <img src="{{ asset('media/logos/sequence-logo.svg') }}" height="20px"
                                        alt="Sequence logo">
                                    <div class="text-yellow-100 b1-400 b1-m-400">@lang('v2_footer.badge-name')</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-dark-50 mt-2 text-lg-start desc b2-400 mb-0">@lang('v2_footer.badge-desc')</p>
                            <p class="text-dark-50 mt-1 text-lg-start desc b2-400"><a
                                    href="https://cmlabs.co/{{ $lang_region }}/become-partner">@lang('v2_footer.badge-desc-cta')</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-1">
                    <div class="d-none d-md-flex align-items-center justify-content-center h-100">
                        <div class="footer-separator"></div>
                    </div>
                </div>
                <div class="col-lg-7 col-12 mt-lg-0 mt-3">
                    <div class="row">
                        <div class="col-md-4 col-6 px-md-4 order-1">
                            <div class="footer-submenu-container order-0">
                                {{-- solutions menu --}}
                                <span
                                    class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_service')</span>
                                <ul>
                                    <li class="my-1 my-lg-2 "><a
                                            class="mktcmlgtm_footer_seo_services text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/seo-services">@lang('v2_footer.menu_service_seo')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_seo_writing text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/content-writing">@lang('v2_footer.menu_service_writing')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_expert_writing text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/expert-writing">@lang('v2_footer.menu_service_expert_writing')
                                        </a></li>
                                    {{-- @if ($lang_region === 'en-id' || $lang_region === 'id-id') --}}
                                        <li class="my-1 my-lg-2"><a
                                                class="mktcmlgtm_footer_media_buying text-dark-70 b2-400 b2-m-400 two-rows"
                                                href="https://cmlabs.co/{{ $lang_region }}/pricing/media-buying">@lang('v2_footer.menu_service_marketing')
                                            </a></li>
                                    {{-- @endif --}}
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_political_campaign text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/political-campaign">@lang('v2_footer.menu_service_political')</a>
                                    </li>
                                    {{-- @if (
                                        $lang_region === 'en-id' ||
                                            $lang_region === 'id-id' ||
                                            $lang_region === 'en-sg' ||
                                            $lang_region === 'en-au' ||
                                            $lang_region === 'en-us' ||
                                            $lang_region === 'en-gb')
                                    @endif --}}
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_blogger_backlink text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/backlink">@lang('v2_footer.menu_service_backlink')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_advertorial text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/media-buying">@lang('v2_footer.menu_service_pr')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_only_for_you text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/{{ $lang_region }}/promo">@lang('v2_footer.menu_service_cta')
                                        </a></li>
                                </ul>
                            </div>
                            <div class="footer-submenu-container order-2 order-lg-1 mt-lg-4">
                                {{-- company menu --}}
                                <span
                                    class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_company')</span>
                                <ul>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_about_cmlabs text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/company/about">@lang('v2_footer.menu_about')</a>
                                    </li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_contact_us text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/company/contact">@lang('v2_footer.menu_contact')</a>
                                    </li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_press_release text-dark-70 b2-400 b2-m-400"
                                            href="https://career.cmlabs.co/">@lang('v2_footer.menu_career')</a>
                                    </li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_press_release text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/company/press-release">@lang('v2_footer.menu_press_release')</a>
                                    </li>
                                    <div class="dropdown">
                                        <div class="text-dark-70 b2-400 b2-m-400 dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                            @lang('v2_footer.sub_compliance')
                                        </div>
                                        <ul class="dropdown-menu rounded-3 p-3 border-0 dropdown-compliance"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li class="s-400 text-gray-90">@lang('v2_footer.explore-comp')</li>
                                            <div id="compliance-container">
                                                {{-- <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_anti_corruption_gratification text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/anti-corruption-policy">@lang('v2_footer.menu_antigratification')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_generative_AI text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/generative-ai-policy">@lang('v2_footer.menu_generative')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_image_guarantee text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/image-commercial-use-guarantee">@lang('v2_footer.menu_image')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_off_page_guideliness text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/seo-off-page-activity-guidelines">@lang('v2_footer.menu_off-page')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_eeat_content_assessment text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/eeat-content-assessment">@lang('v2_footer.menu_eeat')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_publication_and_plagiarism_policy text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/plagiarism-guarantee-policy">@lang('v2_footer.menu_plagiarism')</a>
                                                </li>
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_local_regulator_compliance_indonesia_only text-dark-70 b2-400 b2-m-400"
                                                        href="https://cmlabs.co/{{ $lang_region }}/company/local-regulatory-compliance">@lang('v2_footer.menu_local-regulator')</a>
                                                </li> --}}
                                            </div>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 order-md-2 order-3">
                            <div class="footer-submenu-container order-2 order-lg-1 mt-3 mt-lg-0">
                                {{-- resources menu --}}
                                <span
                                    class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_resource')</span>
                                <ul>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_blog  text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/blog">@lang('v2_footer.menu_blog')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_terms text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/seo-terms">@lang('v2_footer.menu_seo_terms')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_guidelines text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/seo-guidelines">@lang('v2_footer.menu_seo_guidelines')
                                        </a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_insight text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.notion.site/SEO-Guidelines-bb8fae2783df4d7b8e9604bd33c19ed7"
                                            target="_blank" rel="noopener noreferrer nofollow">@lang('v2_footer.menu_insight') </a>
                                    </li>
                                    {{-- @if ($lang === 'id') --}}
                                        <li class="my-1 my-lg-2"><a
                                                class="mktcmlgtm_footer_id_cmlabs_ebook_gratis text-dark-70 b2-400 b2-m-400"
                                                href="https://cmlabs.co/id-id/ebook">E-Book
                                                Gratis</a></li>
                                        <li class="my-1 my-lg-2"><a
                                                class="mktcmlgtm_footer_id_cmlabs_event text-dark-70 b2-400 b2-m-400"
                                                href="https://cmlabs.co/id-id/event">cmlabs
                                                Event</a></li>
                                    {{-- @endif --}}
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_news text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/news">@lang('v2_footer.menu_news')
                                        </a></li>
                                    {{-- @if ($lang === 'id') --}}
                                        <li class="my-1 my-lg-2"><a
                                                class="mktcmlgtm_footer_id_cmlabs_class text-dark-70 b2-400 b2-m-400 two-rows"
                                                href="https://cmlabs.co/id-id/notification/webinar-eksklusif-cmlabsblass">@lang('v2_footer.menu_class')
                                            </a></li>
                                    {{-- @endif --}}
                                </ul>
                            </div>
                            <div class="footer-submenu-container order-3 order-lg-4 mt-lg-4">
                                {{-- info menu --}}
                                <span
                                    class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_info')</span>
                                <ul>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_notification text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/notification">@lang('v2_footer.menu_notif')</a>
                                    </li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_testimony text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/case-studies">@lang('v2_footer.menu_testimony')</a>
                                    </li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_FAQ text-dark-70 b2-400 b2-m-400"
                                            href="https://faq.cmlabs.co/en-id">@lang('v2_footer.menu_faq')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 order-md-3 order-2">
                            <div class="footer-submenu-container order-2 order-lg-1">
                                {{-- partnership menu --}}
                                <span class=" text-dark-70 b1-700 b1-m-700 text-uppercase">@lang('v2_footer.sub_partner')</span>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <ul>
                                            <li class="my-1 my-lg-2"><a
                                                    class="mktcmlgtm_footer_become_partner text-dark-70 b2-400 b2-m-400 two-rows"
                                                    href="https://cmlabs.co/{{ $lang_region }}/become-partner">@lang('v2_footer.menu_become-partner')</a>
                                            </li>
                                            @if ($lang_region === 'en-id')
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_affiliate_program text-dark-70 b2-400 b2-m-400 two-rows"
                                                        href="https://cmlabs.co/{{ $lang_region }}/affiliate-program">@lang('v2_footer.menu_affiliate')</a>
                                                </li>
                                            @elseif ($lang_region === 'id-id')
                                                <li class="my-1 my-lg-2"><a
                                                        class="mktcmlgtm_footer_affiliate_program text-dark-70 b2-400 b2-m-400 two-rows"
                                                        href="https://cmlabs.co/id-id/program-afiliasi">@lang('v2_footer.menu_affiliate')</a>
                                                </li>
                                            @endif
                                            <li class="my-1 my-lg-2"><a
                                                    class="mktcmlgtm_footer_contributor text-dark-70 b2-400 b2-m-400 two-rows"
                                                    href="https://cmlabs.co/{{ $lang_region }}/become-contributor">@lang('v2_footer.menu_contributor')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <a href="https://cmlabs.co/{{ $lang_region }}/partnership""
                                            class="my-1 my-lg-2 class-name partnership-highlight">
                                            <div>
                                                <div class="s-700 text-purple-30">@lang('v2_footer.partnership-tag')</div>
                                                <p class="text-gray-90 s-400 m-0 mt-1">@lang('v2_footer.partnership-title')</p>
                                            </div>
                                            <ul class="d-flex gap-2 flex-column">
                                                @foreach (trans('v2_footer.partnerships') as $item)
                                                    <li class="b2-400 b2-m-400 text-white mt-2">{{ $item }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center flex-column justify-content-center partner-badge d-lg-none">
                <div>
                    <div class="partner-badge-card">
                        <p class="m-0 text-gray-110 text-center b2-400 fst-italic">@lang('v2_footer.badge-title')</p>
                        <div class="pill w-100">
                            <img src="{{ asset('media/logos/sequence-logo.svg') }}" height="20px"
                                alt="Sequence logo">
                            <div class="text-yellow-100 b1-400 b1-m-400">@lang('v2_footer.badge-name')</div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-dark-50 mt-2 text-center desc b2-400 b2-m-400 mb-0">@lang('v2_footer.badge-desc')</p>
                    <p class="text-dark-50 mt-1 text-center desc b2-400 b2-m-400"><a
                            class="text-decoration-underline text-primary-70"
                            href="https://cmlabs.co/{{ $lang_region }}/become-partner">@lang('v2_footer.badge-desc-cta')</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-credit background-gray-60">
        <div class="cmlabs-container">
            <div class="row gy-4 g-lg-0">
                <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                    <div class="find-us text-primary-70">
                        {{-- <span class="b2-400 b2-m-400">Find us on:</span> --}}
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/company/cmlabs/" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-linkedin icon '></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://medium.com/cmlabs" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-medium icon'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/cmlabsco" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-twitter icon'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://id.pinterest.com/cmlabsco/" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-pinterest icon'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCnRPcyr0HIwN2HNGx35VRvA" target="_blank"
                                    class="icon" rel="nofollow noopener noreferrer"><i
                                        class='bx bxl-youtube icon'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/cmlabsco/" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-instagram-alt icon'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@cmlabs" target="_blank" class="icon"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-tiktok icon'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 d-lg-flex align-items-center justify-content-end">
                    <div class="disclaimer-term s-400 s-m-400">
                        <ul class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                            <li><a href="https://cmlabs.co/{{ $lang_region }}/terms-and-conditions"
                                    class="text-footer s-400 s-m-400">
                                    @lang('v2_footer.menu_tnc')</a></li>
                            <li><a href="https://cmlabs.co/{{ $lang_region }}/privacy-policy"
                                    class="text-footer s-400 s-m-400">
                                    @lang('v2_footer.menu_privacy')</a></li>
                            <li><a href="https://cmlabs.co/{{ $lang_region }}/terms-of-services"
                                    class="text-footer s-400 s-m-400">
                                    @lang('v2_footer.menu_tos')</a></li>
                            {{-- <li><a href="{{ route('v2.company.disclaimer', ['lang' => $lang_region]) }}">{{
									__('v2_footer.menu_disclaimer') </a></li> --}}
                            <li class="d-none d-lg-flex text-gray-100">
                                <span class="s-700 s-m-700 d-lg-flex align-items-center">@lang('v2_footer.copyright') &copy;
                                    2019-2024 PT cmlabs Indonesia Digital</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 d-flex d-lg-none justify-content-center justify-content-lg-start text-gray-100">
                    <span class="s-700 s-m-700 d-lg-flex align-items-center text-footer">@lang('v2_footer.copyright') &copy;
                        2019-2024 PT cmlabs Indonesia Digitall</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        fetch("{{ env('CMLABSCO_API_URL') }}/{{$lang}}-id/service-compliances-lists", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                }
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(function(response) {
                const list = response.data
                const container = document.getElementById('compliance-container')

                list.forEach(item => {
                    container.innerHTML += `
                    <li class="my-1 my-lg-2"><a
                        class="mktcmlgtm_footer_local_regulator_compliance_indonesia_only text-dark-70 b2-400 b2-m-400"
                        href="https://cmlabs.co/${item.language}-${item.region}/company/${item.slug}">${item.title}</a>
                    </li>
                    `;
                });
            })
            .catch(function(error) {
                console.error("Fetch error:", error);
            });
    </script>
    <script>
        function convertAndFillUSD() {
            const USD_EXCHANGE_RATE = document.getElementById("usd-idr-footer").value;

            const priceElements = document.querySelectorAll('.update-cost');

            priceElements.forEach(priceElement => {
                const idrValue = parseFloat(priceElement.getAttribute('data-cost'));
                const usdValue = (idrValue / USD_EXCHANGE_RATE);

                const formattedUSDValue = usdValue.toFixed(2);
                const usdValueWithoutDecimal = usdValue === Math.floor(usdValue) ? Math.floor(usdValue) :
                    formattedUSDValue;

                priceElement.textContent = priceElement.getAttribute("data-id");
            });
        }

        async function fetchExchangeRate() {
            try {
                const response = await fetch('https://currency-exchange.p.rapidapi.com/exchange?from=USD&to=IDR&q=1', {
                    method: 'GET',
                    headers: {
                        'X-RapidAPI-Key': '77fe18d216mshbe7bb1d4de0b02ap1553e1jsnb8c5add91843',
                        'X-RapidAPI-Host': 'currency-exchange.p.rapidapi.com'
                    }
                });
                const result = await response.text();
                document.getElementById("usd-idr-footer").value = result

                convertAndFillUSD()
            } catch (error) {
                console.error(error);
            }
        }

        fetchExchangeRate();
    </script>
@endpush
