<div class="popup-card position-relative" id="">
    @if (Route::currentRouteName() == 'keyword-permutation')
        <div class="illustration">
            <img src="{{ asset('media/ab-testing/Keyword Permutation.svg') }}" alt="Illustration">
        </div>
        <div class="d-flex flex-column">
            <div class="title b1-400">
                {!! __('ab-testing.kw-permutation.title') !!}
            </div>
            <a href="https://cmlabs.co/{{ $lang }}-id/pricing/seo-services"
                class="toolscmlabs_keyword_permutation_popup_wanna_rank1 button-primary-130 btn">{!! __('ab-testing.kw-permutation.cta') !!} <i class="toolscmlabs_keyword_permutation_popup_wanna_rank1 bx bx-right-arrow-alt"></i></a>
        </div>
    @endif

    @if (Route::currentRouteName() == 'word-counter')
        <div class="illustration">
            <img src="{{ asset('media/ab-testing/Word Counter.svg') }}" alt="Illustration">
        </div>
        <div class="d-flex flex-column">
            <div class="title b1-400">
                {!! __('ab-testing.word-counter.title') !!}
            </div>
            <a href="https://cmlabs.co/{{ $lang }}-id/pricing/seo-services"
                class="toolscmlabs_word_counter_popup_showme button-primary-130 btn">{!! __('ab-testing.word-counter.cta') !!} <i class="toolscmlabs_word_counter_popup_showme bx bx-right-arrow-alt"></i></a>
        </div>
    @endif

    @if (Route::currentRouteName() == 'robotstxt-generator')
        <div class="illustration">
            <img src="{{ asset('media/ab-testing/Robots txt.svg') }}" alt="Illustration">
        </div>
        <div class="d-flex flex-column">
            <div class="title b1-400">
                {!! __('ab-testing.robots.title') !!}
            </div>
            <a href="https://cmlabs.co/{{ $lang }}-id/pricing/seo-services"
                class="toolscmlabs_robottxt_popup_expert_guidance button-primary-130 btn">{!! __('ab-testing.robots.cta') !!} <i class="toolscmlabs_robottxt_popup_expert_guidance bx bx-right-arrow-alt"></i></a>
        </div>
    @endif

    @if (Route::currentRouteName() == 'metadesc-checker')
        <div class="illustration">
            <img src="{{ asset('media/ab-testing/Meta Description.svg') }}" alt="Illustration">
        </div>
        <div class="d-flex flex-column">
            <div class="title b1-400">
                {!! __('ab-testing.meta-desc.title') !!}
            </div>
            <a href="https://cmlabs.co/{{ $lang }}-id/pricing/content-writing"
                class="toolscmlabs_page_title_meta_desc_popup_showme button-primary-130 btn">{!! __('ab-testing.meta-desc.cta') !!} <i class="toolscmlabs_page_title_meta_desc_popup_showme bx bx-right-arrow-alt"></i></a>
        </div>
    @endif
</div>
