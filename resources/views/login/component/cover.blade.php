<section>
    <div class="register__cover">
        <div class="register__cover-image">
            <div class="cmlabs-container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-4 text-center">
                        <h1 class="fz-16 fw-400 txt-dark-100 mb-4">
                            @lang('v2_auth.desc')
                        </h1>
                        <a href="{{ route('auth.login.google') }}" class="btn btn-google-login h3 d-flex justify-content-center align-items-center mx-auto">
                            <span class="icon-container">
                                <img width="24" height="24" src="{{ asset('assets/images/logo/google.png')}} " alt="sign in with google logo">
                            </span>
                            @lang('v2_auth.btn-google')
                        </a>
                    </div>
                </div>
                <div class="register__track">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-11">
                            <div class="card border-0 bg-dark-10 mx-auto d-sm-block d-lg-none">
                                <div class="card-body">
                                    <img class="img-fluid" src="/assets/images/register-map.png" alt="map illustration">
                                    <h2 class="h4 fz-15 card-title txt-primary-100 txt-bold">{{ __('v2_homepage.track_title') }}</h2>
                                    <p class="card-text fz-13 fw-400">{{ __('v2_homepage.track_desc') }}</p>
                                    {{-- <a class="btn btn-darkblue-100" href="{{ route('v2.pricing.serp', ['lang' => $lang_region]) }}">{{ __('v2.learn_more') }}</a> --}}
                                </div>
                            </div>
                            <div class="register__card card border-0 bg-dark-10 mx-auto d-none d-lg-block px-5 py-5">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <img class="img-fluid img-top" src="/assets/images/geolocation.png" alt="track your keywords locally image"/>
                                        <img class="img-fluid" src="/assets/images/world.png" alt="track your keywords locally image"/>
                                        <img class="img-fluid img-bottom" src="/assets/images/language.png" alt="track your keywords locally image"/>
                                    </div>
                                    <div class="col align-self-center">
                                        <div>
                                            <h2 class="h3 txt-primary-100 txt-bold">{{ __('v2_homepage.track_title') }}</h2>
                                            <p class="txt-subtitle my-4">{{ __('v2_homepage.track_desc') }}</p>
                                            {{-- <a class="btn btn-darkblue-100" href="{{ route('v2.pricing.serp', ['lang' => $lang_region]) }}">{{ __('v2.learn_more') }}</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
