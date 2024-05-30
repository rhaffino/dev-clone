@php
    $notificationData = collect([
        collect([
            'id' => 4,
            'title_id' => 'Test',
            'url_id' => 'https://cmlabs.co',
            'image' => null,
            'start_date' => null,
            'end_date' => null,
            'created_by' => 1,
            'created_at' => '2023-07-05 10:20:58',
            'updated_at' => '2023-07-11 09:08:12',
            'gtm_class' => null,
            'gtm_id' => null,
            'title_en' => 'Test en',
            'url_en' => 'https://cmlabs.co',
        ]),
    ]);
@endphp

<div class="floating-notification-section">
    @isset($notificationData)
        <div class="cards-container-wrapper pe-1">
            <div id="notification-container"
                class="cards-container notifications card-custom card-floating-popup hide d-none notification-container">
                <div class="notif-card empty">
                    <div class="notif-card-body">
                        <p class="b1-400 b1-m-400 text-dark-40 m-0">There is currently no notification...</p>
                    </div>
                </div>
            </div>
        </div>
    @endisset

    <div class="cards-container feedback card-custom card-floating-popup hide user-satisfaction">
        @include('v2.components.widget.popup-ab-testing')
    </div>

    <div class="button-container d-flex gap-3 flex-sm-row flex-column align-items-end mt-3" style="gap: 16px">
        @isset($notificationData)
            <button
                class="order-2 order-md-1 btn btn-float-notif open align-items-center button-marketing {{ count($notificationData) > 0 && $notificationData != '' ? 'active' : '' }}">
                <i class='bx bx-sm bxs-bell' style="padding: 0"></i>
                <div class="red-dot"></div>
            </button>
            <button class="order-2 order-md-1 btn btn-float-notif align-items-center close">
                <i class='bx bx-sm bxs-bell' style="padding: 0"></i>
                <div class="red-dot"></div>
            </button>
        @endisset

        @if (in_array(Route::currentRouteName(), [
                'keyword-permutation',
                'robotstxt-generator',
                'word-counter',
                'metadesc-checker',
            ]))
            <button
                class="order-1 order-sm-2 btn btn-float-feedback btn-float-feedback-toggle align-items-center user-satisfaction active"
                style="padding: 8px">
                <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.81836 6.54834H16.559V8.41929H6.81836V6.54834ZM6.81836 10.2902H13.6368V12.1612H6.81836V10.2902Z"
                        fill="#777777" />
                    <path
                        d="M19.4814 1.87085H3.89637C2.82198 1.87085 1.94824 2.70997 1.94824 3.7418V20.5804L7.14293 16.8385H19.4814C20.5558 16.8385 21.4295 15.9993 21.4295 14.9675V3.7418C21.4295 2.70997 20.5558 1.87085 19.4814 1.87085ZM19.4814 14.9675H6.4942L3.89637 16.8385V3.7418H19.4814V14.9675Z"
                        fill="#777777" />
                </svg>
            </button>
            <button
                class="order-1 order-sm-2 btn btn-float-feedback align-items-center close user-satisfaction background-primary-70"
                style="opacity: 1">
                <i class='bx bx-sm bx-x p-0 text-white'></i>
            </button>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        const language = "{{ $lang }}"
        const notificationCard = (data, pinned = false, lang = 'en') => `
            <div class="notif-card notif" data-id="${data.id}">
                ${data.image ? 
                    `<div class="notif-card-header"> <img src="https://s3-cdn.cmlabs.co/${data.image}" alt="notif header image"> </div>` : ""
                }
                
                <div class="notif-card-body">
                    <p class="b1-400 b1-m-400 text-dark-40 m-0 ${data.image ? "pe-4" : ""}">${lang == "en" ? data.title_en : data.title_id}</p>
                    <a href="${lang == "en" ? data.url_en : data.url_id}" class="text-primary-70 b1-700 b1-m-700">{{ __('home.check') }}</a>
                </div>

                ${pinned ? `<i class='pin-icon bx bxs-pin bx-sm text-gray-100'></i>` : ''}                    
                <i data-id="${data.id}" class='close-btn close-notif-btn bx bx-x bx-sm text-gray-100' style='opacity: 1'></i>
            </div>            
            `

        const notificationContainer = document.getElementById("notification-container")

        const handleNotification = () => {
            const notifCards = document.querySelectorAll(".notif-card.notif")
            notifCards.forEach((notif) => {
                const closeBtn = notif.querySelector(".close-btn")
                const closedNotification = JSON.parse(localStorage.getItem("closedNotification")) ?? []

                if (closedNotification.includes(notif.getAttribute("data-id"))) {
                    notif.remove()
                }

                closeBtn.addEventListener("click", function() {
                    const id = this.getAttribute("data-id")
                    const closedNotification = JSON.parse(localStorage.getItem(
                        "closedNotification")) ?? []

                    closedNotification.push(id)

                    localStorage.setItem("closedNotification", JSON.stringify(closedNotification))
                    notif.remove()
                })
            })

            if (document.querySelectorAll(".notif-card.notif").length === 0) {
                document.querySelector(".btn-float-notif.open").classList.remove("active")
            } else {
                document.querySelector(".notif-card.empty").remove()
            }
        }

        fetch("{{ env('CMLABSCO_API_URL') }}/user-engagement/notification", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                }
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(function(response) {
                const notificationData = response.notificationData;
                const pinnedNotificationData = response.pinnedNotificationData;
                const notificationContainer = document.getElementById("notification-container");

                pinnedNotificationData.forEach(notif => {
                    notificationContainer.innerHTML += notificationCard(notif, true, language);
                });

                notificationData.forEach(notif => {
                    notificationContainer.innerHTML += notificationCard(notif, false, language);
                });

                handleNotification()
            })
            .catch(function(error) {
                console.error("Fetch error:", error);
            });
    </script>

    <script>
        const Notifcard = document.querySelector(".cards-container.notifications");
        const Feedbackcard = document.querySelector(".cards-container.feedback");

        const btnNotif = document.querySelector(".btn-float-notif");
        const btnNotifClose = document.querySelector(".btn-float-notif.close");

        const btnFeedback = document.querySelector(".btn-float-feedback");
        const btnFeedbackClose = document.querySelector(".btn-float-feedback.close");
        const iconFeedbackClose = document.querySelector("#closeFeedback");

        const notifContainer = document.querySelector(".cards-container-wrapper");

        const showNotifCard = () => {
            Notifcard.classList.remove("d-none");
            setTimeout(() => {
                Notifcard.classList.remove("hide");
            }, 10);
            setTimeout(() => {
                notifContainer.style.overflow = "auto"
            }, 800);
            btnNotif.style.display = "none";
            btnNotifClose.style.display = "flex";
            notifContainer.style.overflow = "hidden"
        }

        const hideNotifCard = () => {
            localStorage.setItem("isClosedNotification", "true")
            setTimeout(() => {
                Notifcard.classList.add("d-none");
            }, 500);
            Notifcard.classList.add("hide");
            btnNotifClose.style.display = "none";
            btnNotif.style.display = "flex";
            notifContainer.style.overflow = "hidden"
        }

        const showFeedbackCard = () => {
            Feedbackcard.classList.remove("d-none");
            setTimeout(() => {
                Feedbackcard.classList.remove("hide");
            }, 10);
            btnFeedback.style.display = "none";
            btnFeedbackClose.style.display = "flex";
        }

        const hideFeedbackCard = () => {
            setTimeout(() => {
                Feedbackcard.classList.add("d-none");
            }, 500);
            Feedbackcard.classList.add("hide");
            btnFeedbackClose.style.display = "none";
            btnFeedback.style.display = "flex";
        }

        btnNotif?.addEventListener("click", () => {
            if (btnFeedback) {
                Feedbackcard.classList.add("d-none");
                Feedbackcard.classList.add("hide");
                btnFeedbackClose.style.display = "none";
                btnFeedback.style.display = "flex";
            }
            showNotifCard()
        });

        btnFeedback?.addEventListener("click", () => {
            if (btnNotif) {
                Notifcard.classList.add("d-none");
                Notifcard.classList.add("hide");
                btnNotifClose.style.display = "none";
                btnNotif.style.display = "flex";
            }
            showFeedbackCard()
        });

        btnFeedbackClose?.addEventListener("click", hideFeedbackCard);
        iconFeedbackClose?.addEventListener("click", hideFeedbackCard);
        btnNotifClose?.addEventListener("click", hideNotifCard);

        const isAlreadyClose = localStorage.getItem("isClosedNotification")
        if (isAlreadyClose !== "true")
            showNotifCard();
    </script>

    <script>
        var storedData = localStorage.getItem('lastFilledUserSatisfaction');

        if (storedData) {
            var parsedData = JSON.parse(storedData);

            if (Date.now() > parsedData.expiration) {
                localStorage.removeItem('lastFilledUserSatisfaction');
            } else {
                document.querySelectorAll(".user-satisfaction").forEach((item) => {
                    item?.remove()
                })
            }
        }
    </script>

    @if (in_array(Route::currentRouteName(), ['robotstxt-generator', 'word-counter']))
        <script>
            // script for auto show the popup
            setTimeout(() => {
                showFeedbackCard()
            }, 5500);
        </script>
    @endif
    @if (in_array(Route::currentRouteName(), ['metadesc-checker']))
        <script>
            // script for auto show the popup
            setTimeout(() => {
                showFeedbackCard()
            }, 10000);
        </script>
    @endif
@endpush
