@php
    if (isset($lang)) {
        $lang_region = $lang === 'id' ? 'id-id' : 'en-id';
    } else {
        $lang_region = 'en-id';
        $lang = 'en';
    }
@endphp

<div class="footer-bottom">
    <div class="footer-menu background-gray-30">
        <div class="cmlabs-container">
            <p class="footer-title h3-700 h3-m-700 text-dark-70 ">@lang('v2_footer.bottom_title')</p>
            <div class="row">
                <div class="col-12 col-lg-3">
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
                </div>
                <div class="col-12 col-lg-9 ms-auto menu-container">
                    <div class="row ms-lg-4 px-3">
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
                                @if ($lang_region === 'en-id' || $lang_region === 'id-id')
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_media_buying text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/media-buying">@lang('v2_footer.menu_service_marketing')
                                        </a></li>
                                @endif
                                @if (
                                    $lang_region === 'en-id' ||
                                        $lang_region === 'id-id' ||
                                        $lang_region === 'en-sg' ||
                                        $lang_region === 'en-au' ||
                                        $lang_region === 'en-us' ||
                                        $lang_region === 'en-gb')
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_political_campaign text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/{{ $lang_region }}/pricing/political-campaign">@lang('v2_footer.menu_service_political')</a>
                                    </li>
                                @endif
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
                        <div class="footer-submenu-container order-2 order-lg-1">
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
                                {{-- @if ($region == 'id')
								<li class="my-1 my-lg-2"><a class="text-dark-70 b2-400 b2-m-400"
										href="https://career.cmlabs.co">@lang('v2_footer.menu_career') </a></li>
								@endif --}}
                                <li class="my-1 my-lg-2"><a
                                        class="mktcmlgtm_footer_press_release text-dark-70 b2-400 b2-m-400"
                                        href="https://cmlabs.co/{{ $lang_region }}/company/press-release">@lang('v2_footer.menu_press_release')</a>
                                </li>
                            </ul>
                            {{-- partnership menu --}}
                            <span
                                class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_partner')</span>
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
                        <div class="footer-submenu-container order-1 order-lg-2">
                            {{-- complience menu --}}
                            <span
                                class=" text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_compliance')</span>
                            <ul>
                                <li class="my-1 my-lg-2"><a
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
                                </li>
                            </ul>
                        </div>
                        <div class="footer-submenu-container order-lg-3 order-4">
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
                                @if ($lang === 'id')
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_id_cmlabs_ebook_gratis text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/id-id/ebook">E-Book
                                            Gratis</a></li>
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_id_cmlabs_event text-dark-70 b2-400 b2-m-400"
                                            href="https://cmlabs.co/id-id/event">cmlabs
                                            Event</a></li>
                                @endif
                                <li class="my-1 my-lg-2"><a class="mktcmlgtm_footer_news text-dark-70 b2-400 b2-m-400"
                                        href="https://cmlabs.co/{{ $lang_region }}/news">@lang('v2_footer.menu_news')
                                    </a></li>
                                @if ($lang === 'id')
                                    <li class="my-1 my-lg-2"><a
                                            class="mktcmlgtm_footer_id_cmlabs_class text-dark-70 b2-400 b2-m-400 two-rows"
                                            href="https://cmlabs.co/id-id/notification/webinar-eksklusif-cmlabsblass">@lang('v2_footer.menu_class')
                                        </a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="footer-submenu-container order-3 order-lg-4">
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
                                <li class="my-1 my-lg-2"><a class="mktcmlgtm_footer_FAQ text-dark-70 b2-400 b2-m-400"
                                        href="https://faq.cmlabs.co/en-id">@lang('v2_footer.menu_faq')</a>
                                </li>
                            </ul>
                            {{-- join us menu --}}
                            <span
                                class="text-dark-70 b1-700 b1-m-700 text-decoration-underline">@lang('v2_footer.sub_join')</span>
                            <ul>
                                <li class="my-1 my-lg-2"><a
                                        class="mktcmlgtm_footer_career text-dark-70 b2-400 b2-m-400"
                                        href="https://career.cmlabs.co">@lang('v2_footer.menu_career')</a></li>
                                <li class="my-1 my-lg-2"><a
                                        class="mktcmlgtm_footer_employee_benefit text-dark-70 b2-400 b2-m-400"
                                        href="https://cmlabs.co/{{ $lang_region }}/benefit">@lang('v2_footer.menu_benefit')</a>
                                </li>
                                <li class="my-1 my-lg-2"><a
                                        class="mktcmlgtm_footer_internship text-dark-70 b2-400 b2-m-400"
                                        href="https://career.cmlabs.co">@lang('v2_footer.menu_intern')</a></li>
                                <li class="my-1 my-lg-2"><a
                                        class="mktcmlgtm_footer_fulltime_position text-dark-70 b2-400 b2-m-400"
                                        href="https://career.cmlabs.co">@lang('v2_footer.menu_fulltime')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-3 align-items-center flex-column justify-content-center partner-badge">
                <div class="partner-badge-card">
                    <p class="m-0 text-gray-110 text-center b2-400 fst-italic">@lang('v2_footer.badge-title')</p>
                    <div class="pill">
                        <img src="{{ asset('media/logos/sequence-logo.svg') }}" height="20px" alt="Sequence logo">
                        <div class="text-yellow-100 b1-400 b1-m-400">@lang('v2_footer.badge-name')</div>
                    </div>
                </div>
                <p class="text-dark-50 mt-2 text-center desc xs-400">@lang('v2_footer.badge-desc') <a
                        href="https://cmlabs.co/{{ $lang_region }}/become-partner">@lang('v2_footer.badge-desc-cta')</a></p>
            </div>
        </div>
    </div>
    <div class="footer-credit background-gray-60">
        <div class="cmlabs-container">
            <div class="row gy-4 g-lg-0">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="find-us text-primary-70">
                        {{-- <span class="b2-400 b2-m-400">Find us on:</span> --}}
                        <ul>
                            <li><a href="https://www.instagram.com/cmlabsco/" target="_blank"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-instagram-alt icon'></i></a>
                            </li>
                            <li><a href="https://medium.com/cmlabs" target="_blank"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-medium icon'></i></a></li>
                            <li><a href="https://twitter.com/cmlabsco" target="_blank"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-twitter icon'></i></a></li>
                            <li><a href="https://www.linkedin.com/company/cmlabs/" target="_blank"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-linkedin icon '></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCnRPcyr0HIwN2HNGx35VRvA" target="_blank"
                                    rel="nofollow noopener noreferrer"><i class='bx bxl-youtube icon'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 d-lg-flex align-items-center justify-content-end mt-3 mt-lg-0">
                    <div class="disclaimer-term s-400 s-m-400">
                        <ul class="d-flex flex-wrap">
                            <li><a
                                    href="https://cmlabs.co/{{ $lang_region }}/terms-and-conditions"class="text-footer">
                                    @lang('v2_footer.menu_tnc')</a></li>
                            <li><a href="https://cmlabs.co/{{ $lang_region }}/privacy-policy"class="text-footer">
                                    @lang('v2_footer.menu_privacy')</a></li>
                            <li><a href="https://cmlabs.co/{{ $lang_region }}/terms-of-services"class="text-footer">
                                    @lang('v2_footer.menu_tos')</a></li>
                            {{-- <li><a href="{{ route('v2.company.disclaimer', ['lang' => $lang_region]) }}">{{
									__('v2_footer.menu_disclaimer') </a></li> --}}
                            <li class="d-none d-lg-flex text-primary-70">
                                <span class="s-400 s-m-400 d-lg-flex align-items-center">@lang('v2_footer.copyright') &copy;
                                    2019-2023 PT CMLABS INDONESIA DIGITAL</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-3 mt-lg-0 col-lg-5 d-flex d-lg-none justify-content-start text-primary-70">
                    <span class="s-700 s-m-700 d-lg-flex align-items-center text-footer">@lang('v2_footer.copyright') &copy;
                        2019-2023 PT CMLABS INDONESIA DIGITAL</span>
                </div>
            </div>
        </div>
    </div>
</div>
