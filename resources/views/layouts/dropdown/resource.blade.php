<div class="dropdown-menu bg-white w-100 border-0" id="dropdownMenuResources">
    <div class="container justify-content-between">
        <div class="d-flex resource-card">
            <div class="icon mr-4">
                <img class="lozad" src="{{ asset('assets/images/header/blog-icon.svg') }}" alt="blog icon">
            </div>
            <div class="content p-0">
                <a href="https://cmlabs.co/{{ $local }}-id/blog" class="content__title txt-bold txt-dark-100 gtm-navbar-blog">@lang('v2_navbar.blog')</a>
                <p class="content__body txt-regular-second">@lang('v2_navbar.blog_desc') <a href="https://cmlabs.co/{{ $local }}-id/become-contributor" class="text-decoration-underline">@lang('v2_navbar.apply')</a></p>
            </div>
        </div>
        <div class="d-flex resource-card">
            <div class="icon mr-4">
                <img class="lozad" src="{{ asset('assets/images/header/terms-icon.svg') }}" alt="terms icon">
            </div>
            <div class="content p-0">
                <a href="https://cmlabs.co/{{ $local }}-id/seo-terms" class="content__title txt-bold txt-dark-100 gtm-navbar-seoterms">@lang('v2_navbar.seo_terms')</a>
                <p class="content__body txt-regular-second">@lang('v2_navbar.seo_terms_desc')</p>
            </div>
        </div>
        <div class="d-flex resource-card">
            <div class="icon mr-4">
                <img class="lozad" src="{{ asset('assets/images/header/guidelines-icon.svg') }}" alt="guidelines icon">
            </div>
            <div class="content p-0">
                <a href="https://cmlabs.co/{{ $local }}-id/seo-guidelines" class="content__title txt-bold txt-dark-100 gtm-navbar-seoguideline">@lang('v2_navbar.seo_guidelines')</a>
                <p class="content__body txt-regular-second">@lang('v2_navbar.seo_guidelines_desc')</p>
            </div>
        </div>
    </div>
</div>
