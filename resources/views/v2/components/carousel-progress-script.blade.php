<script>
    function initializeCarousel(carouselId, duration = 500) {
        const carousel = document.getElementById(carouselId);
        const carouselIndicators = carousel.querySelectorAll(".carousel-indicators li span");
        let intervalID;

        const reviewCarousel = new bootstrap.Carousel(carousel);

        window.addEventListener("load", function() {
            fillCarouselIndicator(0);
        });

        carousel.addEventListener("slide.bs.carousel", function(e) {
            let index = e.to;
            fillCarouselIndicator(index);
        });

        function fillCarouselIndicator(index) {
            let i = 0;
            for (const carouselIndicator of carouselIndicators) {
                if (carouselIndicator)
                    carouselIndicator.classList.remove("active");
            }
            clearInterval(intervalID);
            reviewCarousel.pause();

            intervalID = setInterval(function() {
                i++;

                const activeIndicator = carouselIndicators[index];
                const spanLoader = activeIndicator.querySelector("span");
                if (spanLoader)
                    spanLoader.style.width = i + "%";

                if (i >= 100)
                    reviewCarousel.next();

            }, duration);
        }
    }
</script>
