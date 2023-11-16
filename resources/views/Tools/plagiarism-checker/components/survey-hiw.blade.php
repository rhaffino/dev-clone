<div class="tab-pane-inner">
    <div class="upper class-name d-flex flex-column gap-5">
        <h1 class="h4-700 h4-m-700">See How It Works</h1>
        <div>
            <div class="f-carousel" id="myCarousel">
                <div class="fullscreen-indicator">
                    <i class="bx bx-fullscreen"></i>
                    Click image to see fullscreen
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-1.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt=""
                        data-lazy-src="{{asset('media/images/plagiarism/step-1.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-2.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt=""
                        data-lazy-src="{{asset('media/images/plagiarism/step-2.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-3.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt=""
                        data-lazy-src="{{asset('media/images/plagiarism/step-3.webp')}}" />
                </div>
                <div class="f-carousel__slide" data-thumb-src="{{asset('media/images/plagiarism/thumbs/step-4.webp')}}">
                    <img width="640" class="image-gallery"  data-fancybox="gallery" alt=""
                        data-lazy-src="{{asset('media/images/plagiarism/step-4.webp')}}" />
                </div>                
            </div>
        </div>
    </div>
    <div class="buttons d-flex align-items-center justify-content-end gap-3">
        <button class="btn button-gray-10" onclick="$('#nav-intro-tab').trigger('click')">
            Back
        </button>
        <button class="btn button-primary-70" onclick="$('#nav-survey-tab').trigger('click')">
            Fill Survey
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

    {{-- <script>
        var splide = new Splide("#main-slider", {
            width: 600,
            height: 300,
            pagination: false,
            cover: true
        });

        var thumbnails = document.getElementsByClassName("thumbnail");
        var current;

        for (var i = 0; i < thumbnails.length; i++) {
            initThumbnail(thumbnails[i], i);
        }

        function initThumbnail(thumbnail, index) {
            thumbnail.addEventListener("click", function() {
                splide.go(index);
            });
        }

        splide.on("mounted move", function() {
            var thumbnail = thumbnails[splide.index];

            if (thumbnail) {
                if (current) {
                    current.classList.remove("is-active");
                }

                thumbnail.classList.add("is-active");
                current = thumbnail;
            }
        });

        splide.mount();
    </script> --}}
@endpush
