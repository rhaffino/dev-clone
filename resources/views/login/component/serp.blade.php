<section class="homepage__serps">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-10">
                <div class="homepage__serp-track">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <h2 class="h3 homepage__serps-title txt-dark">{{ __('v2_homepage.serp_title') }}</h2>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="homepage__serps-subtitle fw-light">{{ __('v2_homepage.serp_desc') }}</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            @if ($lang == 'id')
                                @include('v2.home.component.serp_id')
                            @elseif ($lang == 'en')
                                @include('v2.home.component.serp_en')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
