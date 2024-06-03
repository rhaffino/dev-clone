<div class="chrome-extension-card mb-2 mb-lg-5 background-primary-70 {{$variant ?? 'variant-1'}}">
    <div>
        <h2 class="h5-700 h5-m-700 text-white text-center">
            @lang('home.ext-title')
        </h2>
        <p class="mt-2 b2-400 text-white text-center">@lang('home.ext-desc')</p>
    </div>
    <a class="btn button-dark-70 d-none d-lg-flex" target="_blank" href="https://chromewebstore.google.com/search/cmlabs%20seo%20tools" rel="noopener noreferrer nofollow">
        <span class="d-block">@lang('home.ext-cta-1')</span>
    </a>
    <a class="btn button-dark-70 d-lg-none" href="https://cmlabs.co/{{$lang}}-id/company/press-release/{{ $lang === 'id' ? 'cmlabs-merilis-chrome-extensions-tools' : 'cmlabs-released-chrome-extensions-tools' }}">
        <span class="d-block">@lang('home.ext-cta-2')</span>
    </a>

    <img class="extension-pattern left d-none d-md-block" src="{{asset('media/extension/extension-left.svg')}}" alt="cmlabs chrome extension pattern">
    <img class="extension-pattern right d-none d-md-block" src="{{asset('media/extension/extension-right.svg')}}" alt="cmlabs chrome extension pattern">
</div>