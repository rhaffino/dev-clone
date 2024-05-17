const card = document.querySelector(".card-floating-popup.desktop");
const btnContact = document.querySelector(".btn-float-marketing");
const btnClose = document.querySelector(".btn-float-marketing.close");
const btnDismiss = document.querySelector("#dismiss-btn");
const currentUrl = window.location.href.split("/");
const windowWidth = window.innerWidth;
const cities = [
    "jakarta",
    "bandung",
    "bali",
    "medan",
    "surabaya",
    "semarang",
    "tangerang",
    "kediri",
    "pontianak",
    "batam",
    "bogor",
];
const isMatchedUrl1 =
    currentUrl.length === 4 ||
    currentUrl.includes("company") ||
    currentUrl.includes("pricing") ||
    currentUrl.includes("case-studies") ||
    currentUrl[4].split("-").includes("testimony");
const isMatchedUrl2 = cities.some((city) =>
    currentUrl[4]?.split("-").includes(city)
);

const Notifcard = document.querySelector(".cards-container.notifications");
const Feedbackcard = document.querySelector(".cards-container.feedback");

const btnNotif = document.querySelector(".btn-float-notif");
const btnNotifClose = document.querySelector(".btn-float-notif.close");

const btnFeedback = document.querySelector(".btn-float-feedback");
const btnFeedbackClose = document.querySelector(".btn-float-feedback.close");
const iconFeedbackClose = document.querySelector("#closeFeedback");

const showCard = () => {
    card.classList.remove("d-none");
    setTimeout(() => {
        card.classList.remove("hide");
    }, 10);
    btnContact.style.display = "none";
    btnClose.style.display = "flex";

    if (windowWidth <= 768) {
        if (Notifcard) {
            Notifcard?.classList.add("d-none");
            Notifcard?.classList.add("hide");
            btnNotifClose.style.display = "none";
            btnNotif.style.display = "flex";
        }

        if (Feedbackcard) {
            Feedbackcard?.classList.add("d-none");
            Feedbackcard?.classList.add("hide");
            btnFeedbackClose.style.display = "none";
            btnFeedback.style.display = "flex";
        }
    }
};

const hideCard = () => {
    setTimeout(() => {
        card.classList.add("d-none");
    }, 500);
    card.classList.add("hide");
    btnClose.style.display = "none";
    btnContact.style.display = "flex";
};

btnContact.addEventListener("click", showCard);
btnClose.addEventListener("click", hideCard);
btnDismiss.addEventListener("click", hideCard);

// Close popup for notification and feedback for first time
const hideNotifAndFeedback = () => {
    if (Notifcard) {
        Notifcard?.classList.add("d-none");
        Notifcard?.classList.add("hide");
        btnNotifClose.style.display = "none";
        btnNotif.style.display = "flex";
    }

    if (Feedbackcard) {
        Feedbackcard?.classList.add("d-none");
        Feedbackcard?.classList.add("hide");
        btnFeedbackClose.style.display = "none";
        btnFeedback.style.display = "flex";
    }
};

// auto open in landing page, company, pricing, seo geo id, and case studies
// if ((isMatchedUrl1 || isMatchedUrl2) && windowWidth > 768) {
//     showCard();
// }
