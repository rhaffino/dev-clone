<section>
    <div class="authentication_cover">
        <div class="cmlabs-container">
            <div class="auth_wrapper text-center">
                <div class="auth_title p-400 p-m-400 text-dark-70">@lang('v2_auth.desc')</div>
                <a href="{{ route('auth.login.google', ['lang' => 'en']) }}" class="button-gray-20 btn-google-logins text-dark-70 p-700 p-m-700 d-flex justify-content-center align-items-center">
                    <span class="icon-container">
                        <img width="24" height="24" src="{{ asset('assets/images/logo/google.png')}} " alt="sign in with google logo">
                    </span>
                    <h1 class="p-700 p-m-700 text-dark-70 mb-0">@lang('v2_auth.btn-google')</h1>
                </a>
            </div>
        </div>
    </div>
</section>