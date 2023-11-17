<div class="tab-pane-inner">
    <div class="upper class-name d-flex flex-column gap-5">
        <h1 class="h4-700 h4-m-700 mb-4">@lang('plagiarism.hiw-title')</h1>
        <div>
            <div class="f-carousel" id="myCarousel">
                <div class="fullscreen-indicator">
                    <i class="bx bx-fullscreen"></i>
                    @lang('plagiarism.see-fullscreen')
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-1.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt="how plagiarism checker cmlabs work step 1"
                        data-lazy-src="{{asset('media/images/plagiarism/step-1.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-2.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt="how plagiarism checker cmlabs work step 2"
                        data-lazy-src="{{asset('media/images/plagiarism/step-2.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-3.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt="how plagiarism checker cmlabs work step 3"
                        data-lazy-src="{{asset('media/images/plagiarism/step-3.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-4.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt="how plagiarism checker cmlabs work step 4"
                        data-lazy-src="{{asset('media/images/plagiarism/step-4.webp')}}" />
                </div>                
            </div>
        </div>
    </div>
    <div class="buttons d-flex align-items-center justify-content-end gap-3">
        <button class="btn button-gray-10" onclick="$('#nav-intro-tab').trigger('click')">
            @lang('plagiarism.nav-back')
        </button>
        <button class="btn button-primary-70" onclick="$('#nav-survey-tab').trigger('click')">
            @lang('plagiarism.nav-survey')
        </button>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.umd.js"></script>

    <script>
        const container = document.getElementById("myCarousel");
        const options = {
            Dots: false,
            Thumbs: {
                type: "classic",
            },
        };

        new Carousel(container, options, {
            Thumbs
        });

        Fancybox.bind("[data-fancybox]", {});
    </script>
@endpush
