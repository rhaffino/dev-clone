// NAVBAR
const servicesDropdown = document.getElementById("servicesDropdown");
const resourcesDropdown = document.getElementById("resourcesDropdown");
const keywordTrackerDropdown = document.getElementById(
    "keywordTrackerDropdown"
);
const dropdownMenuServices = document.getElementById("dropdownMenuServices");
const dropdownMenuResources = document.getElementById("dropdownMenuResources");
const dropdownMenuKeywordTracker = document.getElementById(
    "dropdownMenuKeywordTracker"
);

const toggleDropdownmenu = (button, menu) => {
    button.classList.toggle("active");
    menu.classList.toggle("show");
    [
        [servicesDropdown, dropdownMenuServices],
        [resourcesDropdown, dropdownMenuResources],
        [keywordTrackerDropdown, dropdownMenuKeywordTracker]
    ].forEach(dropdown => {
        if (dropdown[0])
            if (
                dropdown[0].classList.contains("active") &&
                dropdown[0] !== button
            ) {
                dropdown[0].classList.toggle("active");
                dropdown[1].classList.toggle("show");
            }
    });
};

const handleDropdown = () => {
    if (servicesDropdown)
        servicesDropdown.addEventListener("click", () =>
            toggleDropdownmenu(servicesDropdown, dropdownMenuServices)
        );
    if (resourcesDropdown)
        resourcesDropdown.addEventListener("click", () =>
            toggleDropdownmenu(resourcesDropdown, dropdownMenuResources)
        );
    if (keywordTrackerDropdown)
        keywordTrackerDropdown.addEventListener("click", () =>
            toggleDropdownmenu(
                keywordTrackerDropdown,
                dropdownMenuKeywordTracker
            )
        );
    serpPackage();
};

const servicesDropdownMobile = document.getElementById(
    "servicesDropdownMobile"
);
const seoToolsDropdownMobile = document.getElementById(
    "seoToolsDropdownMobile"
);
const resourcesDropdownMobile = document.getElementById(
    "resourcesDropdownMobile"
);
const keywordTrackerDropdownMobile = document.getElementById(
    "keywordTrackerDropdownMobile"
);
const dropdownMobileServices = document.querySelector(".service-mobile");
const dropdownMobileSeoTools = document.querySelector(".seo-tools-mobile");
const dropdownMobileResources = document.querySelector(".resource-mobile");
const dropdownMobileKeywordTracker = document.querySelector(
    ".keyword-tracker-mobile"
);

const toggleDropdownMobile = (button, menu) => {
    button.classList.toggle("active");
    menu.classList.toggle("show");
    [
        [servicesDropdownMobile, dropdownMobileServices],
        [seoToolsDropdownMobile, dropdownMobileSeoTools],
        [resourcesDropdownMobile, dropdownMobileResources],
        [keywordTrackerDropdownMobile, dropdownMobileKeywordTracker]
    ].forEach(dropdown => {
        if (dropdown[0] && dropdown[1])
            if (
                dropdown[0].classList.contains("active") &&
                dropdown[0] !== button
            ) {
                dropdown[0].classList.toggle("active");
                dropdown[1].classList.toggle("show");
            }
    });
};

const handleMobileDropdown = () => {
    if (servicesDropdownMobile)
        servicesDropdownMobile.addEventListener("click", () =>
            toggleDropdownMobile(servicesDropdownMobile, dropdownMobileServices)
        );
    if (seoToolsDropdownMobile)
        seoToolsDropdownMobile.addEventListener("click", () =>
            toggleDropdownMobile(seoToolsDropdownMobile, dropdownMobileSeoTools)
        );
    if (resourcesDropdownMobile)
        resourcesDropdownMobile.addEventListener("click", () =>
            toggleDropdownMobile(
                resourcesDropdownMobile,
                dropdownMobileResources
            )
        );
    if (keywordTrackerDropdownMobile)
        keywordTrackerDropdownMobile.addEventListener("click", () =>
            toggleDropdownMobile(
                keywordTrackerDropdownMobile,
                dropdownMobileKeywordTracker
            )
        );
    serpPackageMobile();
};

const serpPackage = () => {
    const packageButton = document.getElementById("packageButton");
    const paygButton = document.getElementById("paygButton");
    const businessPackage = document.getElementById("businessPackage");
    const paygPackage = document.getElementById("paygPackage");

    const handleChangePackage = button => {
        if (!button.classList.contains("active")) {
            businessPackage.classList.toggle("hide");
            packageButton.classList.toggle("active");
            paygButton.classList.toggle("active");
            paygPackage.classList.toggle("hide");
        }
    };

    packageButton.addEventListener("click", () => {
        handleChangePackage(packageButton);
    });
    paygButton.addEventListener("click", () => {
        handleChangePackage(paygButton);
    });
};

const serpPackageMobile = () => {
    const packageButton = document.getElementById("packageButtonMobile");
    const paygButton = document.getElementById("paygButtonMobile");
    const businessPackage = document.getElementById("businessPackageMobile");
    const paygPackage = document.getElementById("paygPackageMobile");

    const handleChangePackage = button => {
        if (!button.classList.contains("active")) {
            businessPackage.classList.toggle("hide");
            packageButton.classList.toggle("active");
            paygButton.classList.toggle("active");
            paygPackage.classList.toggle("hide");
        }
    };

    packageButton.addEventListener("click", () => {
        handleChangePackage(packageButton);
    });
    paygButton.addEventListener("click", () => {
        handleChangePackage(paygButton);
    });
};

const closeActiveDropdown = () => {
    [
        [servicesDropdownMobile, dropdownMobileServices],
        [seoToolsDropdownMobile, dropdownMobileSeoTools],
        [resourcesDropdownMobile, dropdownMobileResources],
        [keywordTrackerDropdownMobile, dropdownMobileKeywordTracker]
    ].forEach(dropdown => {
        if (dropdown[0] && dropdown[1]) {
            dropdown[0].classList.remove("active");
            dropdown[1].classList.remove("show");
        }
    });
};

const shadowOnScroll = () => {
    window.addEventListener("scroll", e => {
        const nav = document.getElementById("navbarHome");
        if (nav) {
            if (window.pageYOffset > 0) {
                nav.classList.add("shadow");
            } else {
                nav.classList.remove("shadow");
            }
        }
    });
};

const handleOuterClick = () => {
    document.addEventListener(
        "click",
        function(event) {
            if (
                !event.target.closest("#dropdownNav") &&
                !event.target.closest(".cmlabs_header")
            ) {
                if (
                    dropdownMenuResources &&
                    dropdownMenuResources.classList.contains("show")
                ) {
                    dropdownMenuResources.classList.remove("show");
                    resourcesDropdown.classList.remove("active");
                }
                if (
                    dropdownMenuKeywordTracker &&
                    dropdownMenuKeywordTracker.classList.contains("show")
                ) {
                    dropdownMenuKeywordTracker.classList.remove("show");
                    keywordTrackerDropdown.classList.remove("active");
                }
                if (
                    dropdownMenuServices &&
                    dropdownMenuServices.classList.contains("show")
                ) {
                    dropdownMenuServices.classList.remove("show");
                    servicesDropdown.classList.remove("active");
                }
            }
        },
        false
    );
};

const closePromo = () => {
    const promo = document.getElementById("promoHeader");
    promo.remove();
    document.getElementById('kt_subheader').style.top = `64px`;
};

const closePromoBtn = document.getElementById("closePromo");

closePromoBtn.addEventListener("click", () => closePromo());

handleDropdown();
handleMobileDropdown();
shadowOnScroll();
handleOuterClick();