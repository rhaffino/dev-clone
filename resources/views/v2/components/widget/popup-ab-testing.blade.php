<div class="popup-card position-relative" id="">
    @if (Route::currentRouteName() == 'keyword-permutation')
    <div class="illustration">
        <img src="{{asset('media/ab-testing/Keyword Permutation.svg')}}" alt="Illustration">
    </div>
    <div class="d-flex flex-column">
        <div class="title b1-400">
            Sure, those keywords are fine... <strong>if you're aiming for average.</strong>
        </div>
        <a href="" class="button-primary-130 btn">I want to rank #1! <i class="bx bx-right-arrow-alt"></i></a>
    </div>
    @endif

    @if (Route::currentRouteName() == 'word-counter')
    <div class="illustration">
        <img src="{{asset('media/ab-testing/Word Counter.svg')}}" alt="Illustration">
    </div>
    <div class="d-flex flex-column">
        <div class="title b1-400">
            Sure, this tool is enough… <strong>if your brand isn't that serious about SEO.</strong>
        </div>
        <a href="" class="button-primary-130 btn">I need expert guidance! <i class="bx bx-right-arrow-alt"></i></a>
    </div>
    @endif

    @if (Route::currentRouteName() == 'robotstxt-checker')
    <div class="illustration">
        <img src="{{asset('media/ab-testing/Robots txt.svg')}}" alt="Illustration">
    </div>
    <div class="d-flex flex-column">
        <div class="title b1-400">
            To rank higher in SERP, there's more besides counting words. </strong>Just saying.</strong>
        </div>
        <a href="" class="button-primary-130 btn">Show me! <i class="bx bx-right-arrow-alt"></i></a>
    </div>
    @endif
</div>
