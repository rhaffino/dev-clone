@php
    $notificationData = collect([collect(['id' => 4, 'title_id' => 'Test', 'url_id' => 'https://cmlabs.co', 'image' => null, 'start_date' => null, 'end_date' => null, 'created_by' => 1, 'created_at' => '2023-07-05 10:20:58', 'updated_at' => '2023-07-11 09:08:12', 'gtm_class' => null, 'gtm_id' => null, 'title_en' => 'Test en', 'url_en' => 'https://cmlabs.co'])]);
@endphp

<div class="floating-notification-section">
    @isset($notificationData)
        <div class="cards-container-wrapper pe-1">
            <div class="cards-container notifications card-custom card-floating-popup hide d-none notification-container">
                @isset($pinnedNotificationData)
                    @if ($pinnedNotificationData->isNotEmpty())
                        @component('v2.widget.floating-notification-card')
                            @slot('title', 'en' == 'en' ? $pinnedNotificationData[0]->title_en :
                                $pinnedNotificationData[0]->title_id)
                                @slot('image', $pinnedNotificationData[0]->image)
                                @slot('url', 'en' == 'en' ? $pinnedNotificationData[0]->url_en : $pinnedNotificationData[0]->url_id)
                                @slot('isPinned', true)
                                @slot('id', $pinnedNotificationData[0]->id)
                            @endcomponent
                        @endif
                    @endisset

                    {{-- @foreach ($notificationData as $notif)
                        @component('v2.widget.floating-notification-card')
                            @slot('title', 'en' == 'en' ? $notif->title_en : $notif->title_id)
                            @slot('image', $notif->image)
                            @slot('url', 'en' == 'en' ? $notif->url_en : $notif->url_id)
                            @slot('isPinned', false)
                            @slot('id', $notif->id)
                        @endcomponent
                    @endforeach --}}

                    @foreach ($notificationData as $notif)
                        @component('v2.components.widget.floating-notification-card')
                            @slot('title', 'en' == 'en' ? $notif['title_en'] : $notif->title_id)
                            @slot('image', $notif['image'])
                            @slot('url', 'en' == 'en' ? $notif['url_en'] : $notif->url_id)
                            @slot('isPinned', false)
                            @slot('id', $notif['id'])
                        @endcomponent
                    @endforeach

                    <div class="notif-card empty">
                        <div class="notif-card-body">
                            <p class="b1-400 b1-m-400 text-dark-40 m-0">There is currently no notification...</p>
                        </div>
                    </div>
                </div>
            </div>
        @endisset

        {{-- @isset($satisfactionData)
            <div class="cards-container feedback card-custom card-floating-popup hide d-none user-satisfaction">
                @include('v2.widget.user-satisfaction-form')
            </div>
        @endisset --}}

        <div class="button-container d-flex gap-3 align-items-end mt-3">
            @isset($notificationData)
                <button
                    class="btn btn-float-notif open align-items-center button-marketing {{ count($notificationData) > 0 && $notificationData != '' ? 'active' : '' }}">
                    <i class='bx bx-sm bxs-bell'></i>
                    <div class="red-dot"></div>
                </button>
                <button class="btn btn-float-notif align-items-center close">
                    <i class='bx bx-sm bxs-bell'></i>
                    <div class="red-dot"></div>
                </button>
            @endisset

            {{-- @isset($satisfactionData)
                <button
                    class="btn btn-float-feedback btn-float-feedback-toggle align-items-center d-none user-satisfaction {{ count($satisfactionData) > 0 ? 'active' : '' }}">
                    <i class='bx bx-sm bxs-wink-smile'></i>
                    <div class="red-dot"></div>
                </button>
                <button class="btn btn-float-feedback align-items-center close user-satisfaction">
                    <i class='bx bx-sm bxs-wink-smile'></i>
                    <div class="red-dot"></div>
                </button>
            @endisset --}}
        </div>
    </div>

    @push('scripts')
        <script>
            const notifCards = document.querySelectorAll(".notif-card.notif")
            notifCards.forEach((notif) => {
                const closeBtn = notif.querySelector(".close-btn")
                const closedNotification = JSON.parse(localStorage.getItem("closedNotification")) ?? []

                if (closedNotification.includes(notif.getAttribute("data-id"))) {
                    notif.remove()
                }

                closeBtn.addEventListener("click", function() {
                    const id = this.getAttribute("data-id")
                    const closedNotification = JSON.parse(localStorage.getItem("closedNotification")) ?? []

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

            console.log(btnNotif)

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

        {{-- @isset($satisfactionData)
            <script>
                $(document).ready(function() {
                    const type = @json($satisfactionData[0]->appear_frequency);
                    const toast = document.getElementById("toast-success");
                    // Dapatkan nilai token CSRF
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $('input[name="feedbackSatisfaction"]').on('change', function() {
                        var selectedFeedback = $('input[name="feedbackSatisfaction"]:checked').attr('id');
                        var satisfactionId = $('input[name="feedbackSatisfaction"]:checked').data(
                            'satisfaction-id');

                        // Tambahkan token CSRF ke dalam data permintaan
                        var requestData = {
                            value: selectedFeedback,
                            satisfaction_id: satisfactionId,
                            _token: csrfToken
                        };

                        let duration

                        switch (type) {
                            case "1x per day":
                                duration = 24 * 60 * 60 * 1000;
                                break
                            case "1x per month":
                                duration = 30 * 24 * 60 * 60 * 1000;
                                break
                            case "1x per year":
                                duration = 365 * 24 * 60 * 60 * 1000;
                                break
                        }

                        var data = {
                            value: 'filled user satisfaction',
                            expiration: Date.now() + (duration ?? 0)
                        };

                        $.ajax({
                            url: '/page/api/satisfaction',
                            method: 'POST',
                            data: requestData,
                            success: function(response) {
                                localStorage.setItem("lastFilledUserSatisfaction", JSON.stringify(data))
                                toast.querySelector(".message").innerHTML =
                                    "{{ __('v2_homepage.feedback-sent') }}";
                                toast.style.display = "block";
                                setTimeout(function() {
                                    toast.style.display = "none";
                                }, 3000);
                                hideFeedbackCard();
                                document.querySelectorAll(".user-satisfaction").forEach((item) => {
                                    item?.remove()
                                })
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>
        @endisset --}}

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
    @endpush
