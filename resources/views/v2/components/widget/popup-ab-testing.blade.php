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
                class="button-primary-130 btn">{!! __('ab-testing.kw-permutation.cta') !!} <i class="bx bx-right-arrow-alt"></i></a>
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
                class="button-primary-130 btn">{!! __('ab-testing.word-counter.cta') !!} <i class="bx bx-right-arrow-alt"></i></a>
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
                class="button-primary-130 btn">{!! __('ab-testing.robots.cta') !!} <i class="bx bx-right-arrow-alt"></i></a>
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
                class="button-primary-130 btn">{!! __('ab-testing.meta-desc.cta') !!} <i class="bx bx-right-arrow-alt"></i></a>
        </div>
    @endif
</div>
