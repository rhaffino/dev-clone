<div class="row">
    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ $cmlabs_url . '/' . $lang_reg . '/blog' . '/' . $blogs->slug }}" class="resource-card">
            <div class="card-header p-0 m-0">
                <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                <img class="img-fluid w-100"
                    src="{{ $blogs->image ? 'https://s3-cdn.cmlabs.co/' . $blogs->image : asset('/media/images/default-cover.webp') }}"
                    alt="">
            </div>
            <div class="card-body">
                <div class="text-purple-70 b2-700 b2-m-700">BLOGS</div>
                <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $blogs->title }}</h3>
                <p class="m-0 b2-400 b2-m-400 text-gray-90">{{ $blogs->published_at }}</p>
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 mt-4 mt-lg-0">
        <a href="{{ $cmlabs_url . '/' . $lang_reg . '/seo-terms' . '/' . $seo_terms->slug }}" class="resource-card">
            <div class="card-header p-0 m-0">
                <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                <img class="img-fluid w-100"
                    src="{{ $seo_terms->image ? 'https://s3-cdn.cmlabs.co/' . $seo_terms->image : asset('/media/images/default-cover.webp') }}"
                    alt="">
            </div>
            <div class="card-body">
                <div class="text-purple-70 b2-700 b2-m-700">SEO TERMS</div>
                <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $seo_terms->title }}</h3>
                <p class="m-0 b2-400 b2-m-400 text-gray-90">{{ $seo_terms->published_at }}</p>
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 mt-4 mt-lg-0">
        <a href="{{ $cmlabs_url . '/' . $lang_reg . '/seo_guidelines' . '/' . $seo_guidelines->slug }}"
            class="resource-card">
            <div class="card-header p-0 m-0">
                <!-- <img class="img-fluid w-100" src="{{ asset('media/images/resources-example.png') }}" alt=""> -->
                <img class="img-fluid w-100"
                    src="{{ $seo_guidelines->image ? 'https://s3-cdn.cmlabs.co/' . $seo_guidelines->image : asset('/media/images/default-cover.webp') }}"
                    alt="">
            </div>
            <div class="card-body">
                <div class="text-purple-70 b2-700 b2-m-700">SEO GUIDELINES</div>
                <h3 class="h6-700 h-6-m-700 text-dark-70">{{ $seo_guidelines->title }}</h3>
                <p class="m-0 b2-400 b2-m-400 text-gray-90">
                    {{ $seo_guidelines->published_at }}</p>
            </div>
        </a>
    </div>
</div>
