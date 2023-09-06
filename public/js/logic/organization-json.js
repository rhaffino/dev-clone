// Declar Social Profile Local Business
var counterSocial = 0;
var counterContact = -1;

let invalid_url = lang === "en" ? "Invalid URL" : "URL Tidak Valid";
let invalid_phone = lang === "en" ? "Invalid Number Phone" : "Nomor Telepon Tidak Valid";
let label_type_contact = lang === "en" ? "Type Contact" : "Type Contact";
let placeholder_type_contact = lang === "en" ? "Search a type contact.." : "Search a type contact..";
let opt_type_contact_1 = lang === "en" ? "Customer Service" : "Customer Service";
let opt_type_contact_2 = lang === "en" ? "Technical Support" : "Technical Support";
let opt_type_contact_3 = lang === "en" ? "Billing Support" : "Billing Support";
let opt_type_contact_4 = lang === "en" ? "Bill Payment" : "Bill Payment";
let opt_type_contact_5 = lang === "en" ? "Sales" : "Sales";
let opt_type_contact_6 = lang === "en" ? "Reservations" : "Reservations";
let opt_type_contact_7 = lang === "en" ? "Credit Card Support" : "Credit Card Support";
let opt_type_contact_8 = lang === "en" ? "Emergency" : "Emergency";
let opt_type_contact_9 = lang === "en" ? "Baggage Tracking" : "Baggage Tracking";
let opt_type_contact_10 = lang === "en" ? "Readside Tracking" : "Readside Tracking";
let opt_type_contact_11 = lang === "en" ? "Package Tracking" : "Package Tracking";
let label_phone = lang === "en" ? "Phone" : "Phone";
let placeholder_phone = lang === "en" ? "Type your number phone here.." : "Type your number phone here..";
let label_area_served = lang === "en" ? "Area(s) Served" : "Area(s) Served";
let label_language = lang === "en" ? "Language(s)" : "Language(s)";
let label_options = lang === "en" ? "Options" : "Options";
let opt_options_1 = lang === "en" ? "Toll Free" : "Toll Free";
let opt_options_2 = lang === "en" ? "Hearing Impaired Support" : "Hearing Impaired Support";

let facebookVal = "";
let twitterVal = "";
let linkedinVal = "";
let wikipediaVal = "";
let websiteVal = "";
let pinterestVal = "";
let githubVal = "";
let tumblrVal = "";
let soundcloudVal = "";
let instagramVal = "";
let youtubeVal = "";

const labelSocial = `<label class="text-black font-weight-bold" for="sosmedName">Social profile URL</label>`;

let twitter = (id) =>
    `<div class="row mb-5" id="twitter">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-twitter bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="twitter" placeholder="` +
    placeholder_type +
    ` twitter ` +
    placeholder_url +
    `" value="${twitterVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="twitter-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let facebook = (id) =>
    `<div class="row mb-5" id="facebook">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-facebook-square bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="facebook" placeholder="` +
    placeholder_type +
    ` facebook ` +
    placeholder_url +
    `" value="${facebookVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="facebook-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let instagram = (id) =>
    `<div class="row mb-5" id="instagram">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-instagram-alt bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="instagram" placeholder="` +
    placeholder_type +
    ` instagram ` +
    placeholder_url +
    `" value="${instagramVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="instagram-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let youtube = (id) =>
    `<div class="row mb-5" id="youtube">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-youtube bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="youtube" placeholder="` +
    placeholder_type +
    ` youtube ` +
    placeholder_url +
    `" value="${youtubeVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="youtube-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let linkedin = (id) =>
    `<div class="row mb-5" id="linkedin">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-linkedin-square bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="linkedin" placeholder="` +
    placeholder_type +
    ` linkedin ` +
    placeholder_url +
    `" value="${linkedinVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="linkedin-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let pinterest = (id) =>
    `<div class="row mb-5" id="pinterest">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-pinterest bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="pinterest" placeholder="` +
    placeholder_type +
    ` pinterest ` +
    placeholder_url +
    `" value="${pinterestVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="pinterest-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let soundcloud = (id) =>
    `<div class="row mb-5" id="soundcloud">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-soundcloud bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="soundcloud" placeholder="` +
    placeholder_type +
    ` soundcloud ` +
    placeholder_url +
    `" value="${soundcloudVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="soundcloud-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let tumblr = (id) =>
    `<div class="row mb-5" id="tumblr">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-tumblr bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="tumblr" placeholder="` +
    placeholder_type +
    ` tumblr ` +
    placeholder_url +
    `" value="${tumblrVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="tumblr-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let wikipedia = (id) =>
    `<div class="row mb-5" id="wikipedia">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-wikipedia bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="wikipedia" placeholder="` +
    placeholder_type +
    ` wikipedia ` +
    placeholder_url +
    `" value="${wikipediaVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="wikipedia-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let github = (id) =>
    `<div class="row mb-5" id="github">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bxl-github bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="github" placeholder="` +
    placeholder_type +
    ` github ` +
    placeholder_url +
    `" value="${githubVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="github-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

let website = (id) =>
    `<div class="row mb-5" id="website">
    <div class="col-2 col-sm-1 my-auto">
    <div class="d-flex justify-content-center">
        <i class='bx bx-world bx-md text-black'></i>
    </div>
    </div>
    <div class="col-10 col-sm-11 pl-0">
    <input type="text" name="" class="form-control sosmedName" data-sosmed="website" placeholder="` +
    placeholder_type +
    ` website ` +
    placeholder_url +
    `" value="${websiteVal}" data-id="${id}">
    <div class="invalid-feedback" data-id="world-${id}">` +
    invalid_url +
    `</div>
    </div>
</div>`;

const socialData = {
    facebook: facebook,
    twitter: twitter,
    linkedin: linkedin,
    wikipedia: wikipedia,
    website: website,
    pinterest: pinterest,
    github: github,
    tumblr: tumblr,
    soundcloud: soundcloud,
    instagram: instagram,
    youtube: youtube,
};

// declare first two json-ld website component
const localBusinessSchema = class {
    constructor() {
        this.type = "Organization";
        this.name = "";
        this.alternateName = undefined;
        this.url = "";
        this.logo = "";
        this.contactPoint = [];

        // temp
        // this.tempStreetAddress = "";

        this.sameAs = [];
        this.tempSocial = [];
        this.facebookVal = "https://facebook.com/";
        this.twitterVal = "https://twitter.com/";
        this.linkedinVal = "https://www.linkedin.com/";
        this.wikipediaVal = "";
        this.websiteVal = "";
        this.pinterestVal = "";
        this.githubVal = "https://github.com/";
        this.tumblrVal = "";
        this.soundcloudVal = "";
        this.instagramVal = "https://instagram.com/";
        this.youtubeVal = "https://www.youtube.com/";
    }

    resetrender() {
        counterSocial = 0;
        counterContact = -1;

        this.type = "Organization";
        this.name = "";
        this.alternateName = undefined;
        this.url = "";
        this.logo = "";
        this.contactPoint = [];

        // temp
        // this.tempStreetAddress = "";

        this.sameAs = [];
        this.tempSocial = [];
        this.facebookVal = "https://facebook.com/";
        this.twitterVal = "https://twitter.com/";
        this.linkedinVal = "https://www.linkedin.com/";
        this.wikipediaVal = "";
        this.websiteVal = "";
        this.pinterestVal = "";
        this.githubVal = "https://github.com/";
        this.tumblrVal = "";
        this.soundcloudVal = "";
        this.instagramVal = "https://instagram.com/";
        this.youtubeVal = "https://www.youtube.com/";

        const resetObj = {
            "@context": "https://schema.org",
            "@type": this.type,
            name: this.name,
            url: this.url,
            logo: this.logo,
        };

        resetObj.name = this.name;
        resetObj.url = this.url;
        resetObj.logo = this.logo;

        // if (this.priceRange) resetObj.priceRange = this.priceRange;
        // resetObj.address = this.address;

        // if (this.openingHoursSpecification) {
        //     if (this.openingHoursSpecification.length > 0) {
        //         if (this.openingHoursSpecification.length === 1) {
        //             obj.openingHoursSpecification =
        //                 this.openingHoursSpecification[0];
        //         } else {
        //             obj.openingHoursSpecification =
        //                 this.openingHoursSpecification;
        //         }
        //     }
        // }

        if (this.sameAs.length > 0) obj.sameAs = this.sameAs;

        $("#json-format").val(
            '<script type="application/ld+json">\n' +
                JSON.stringify(resetObj, undefined, 4) +
                "\n</script>"
        );

        return resetObj;
    }

    temp() {
        const tempObj = {};

        // temp
        // tempObj.tempStreetAddress = this.tempStreetAddress;

        tempObj.facebookVal = this.facebookVal;
        facebookVal = this.facebookVal;
        tempObj.twitterVal = this.twitterVal;
        twitterVal = this.twitterVal;
        tempObj.linkedinVal = this.linkedinVal;
        linkedinVal = this.linkedinVal;
        tempObj.wikipediaVal = this.wikipediaVal;
        wikipediaVal = this.wikipediaVal;
        tempObj.websiteVal = this.websiteVal;
        websiteVal = this.websiteVal;
        tempObj.pinterestVal = this.pinterestVal;
        pinterestVal = this.pinterestVal;
        tempObj.githubVal = this.githubVal;
        githubVal = this.githubVal;
        tempObj.tumblrVal = this.tumblrVal;
        tumblrVal = this.tumblrVal;
        tempObj.soundcloudVal = this.soundcloudVal;
        soundcloudVal = this.soundcloudVal;
        tempObj.instagramVal = this.instagramVal;
        instagramVal = this.instagramVal;
        tempObj.youtubeVal = this.youtubeVal;
        youtubeVal = this.youtubeVal;

        return tempObj;
    }

    render() {
        const obj = {
            "@context": "https://schema.org",
        };

        obj["@type"] = this.type;
        obj.name = this.name;
        if (this.alternateName) obj.alternateName = this.alternateName;
        obj.url = this.url;
        obj.logo = this.logo;

        // if (this.menu != undefined) obj.menu = this.menu;

        // if (this.openingHoursSpecification) {
        //     if (this.openingHoursSpecification.length > 0) {
        //         if (this.openingHoursSpecification.length === 1) {
        //             obj.openingHoursSpecification =
        //                 this.openingHoursSpecification[0];
        //         } else {
        //             obj.openingHoursSpecification =
        //                 this.openingHoursSpecification;
        //         }
        //     }
        // }

        if (this.sameAs.length > 0) obj.sameAs = this.sameAs;

        // if (this.department) {
        //     if (this.department.length > 0) {
        //         if (this.department.length === 1) {
        //             obj.department = this.department[0];
        //         } else {
        //             obj.department = this.department;
        //         }
        //     }
        // }

        $("#json-format").val(
            '<script type="application/ld+json">\n' +
                JSON.stringify(obj, undefined, 4) +
                "\n</script>"
        );
        return obj;
    }
};

let organizationFormat = new localBusinessSchema();

organizationFormat.temp();
organizationFormat.render();

//  * Adding regex url
var expression =
    /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

//  * Adding regex phone
var expressionPhone = /^\+?\d{1,3}-?\d{3,}$/;
var regexPhone = new RegExp(expressionPhone);

// Clear Select Specific Type
function clearSelect() {
    jQuery("#SpesificType")
        .find("option")
        .remove()
        .end()
        .append('<option value="none">More Specific</option>');
}

// All Function
function updateJSON_organizationType(value) {
    if (value == "none") {
        organizationFormat.type = "Organization";
        organizationFormat.render();
    } else {
        organizationFormat.type = value;
        organizationFormat.render();
    }
}

function updateJSON_nameOrganization(value) {
    organizationFormat.name = value;
    organizationFormat.render();
}

function updateJSON_alternateNameOrganization(value){
    organizationFormat.alternateName = value;
    organizationFormat.render();
}

function updateJSON_url(id, value) {
    if (value.match(regex)) {
        organizationFormat.url = value;
        $(`.url`).removeClass("is-invalid");
        $(".invalid-feedback.url[data-id=" + id + "]").hide();
    } else {
        organizationFormat.url = value;
        $(`.url`).addClass("is-invalid");
        $(".invalid-feedback.url[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function updateJSON_logoUrl(id, value) {
    if (value.match(regex)) {
        organizationFormat.logo = value;
        $(`.logo-url`).removeClass("is-invalid");
        $(".invalid-feedback.logo-url[data-id=" + id + "]").hide();
    } else {
        organizationFormat.logo = value;
        $(`.logo-url`).addClass("is-invalid");
        $(".invalid-feedback.logo-url[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function validateSosmed(value, data, id) {
    if (value.match(regex)) {
        $(".sosmedName[data-sosmed=" + data + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + data + "-" + id + "]").hide();
    } else {
        $(".sosmedName[data-sosmed=" + data + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=" + data + "-" + id + "]").show();
    }
}

// To be continue..

function updateJSON_imageBusiness(id, value) {
    if (value.match(regex)) {
        organizationFormat.image = value;
        $(`.imageBusiness`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        organizationFormat.image = value;
        $(`.imageBusiness`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function updateJSON_phone(id, value) {
    if (value.match(regexPhone)) {
        organizationFormat.telephone = value;
        $(`.phone`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        organizationFormat.telephone = value;
        $(`.phone`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function updateJSON_priceRange(value) {
    organizationFormat.priceRange = value;
    organizationFormat.render();
}

function updateJSON_menuURL(id, value) {
    if (value.match(regex)) {
        organizationFormat.menu = value;
        $(`.menu-url`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        organizationFormat.menu = value;
        $(`.menu-url`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function updateJSON_cuisine(value) {
    organizationFormat.servesCuisine = value;
    organizationFormat.render();
}

function updateJSON_acceptsReservation(value) {
    if (value) {
        organizationFormat.acceptsReservations = "true";
        organizationFormat.render();
    } else {
        organizationFormat.acceptsReservations = "false";
        organizationFormat.render();
    }
}

function updateJson_foodEstablishment() {
    organizationFormat.menu = "";
    organizationFormat.servesCuisine = "";
    organizationFormat.acceptsReservations = "false";
    organizationFormat.render();
}

function updateJson_foodEstablishmentUndefined() {
    organizationFormat.menu = undefined;
    organizationFormat.servesCuisine = undefined;
    organizationFormat.acceptsReservations = undefined;
    organizationFormat.render();
}

function updateJSON_street(value) {
    organizationFormat.tempStreetAddress = value;
    organizationFormat.address = {
        "@type": "PostalAddress",
        streetAddress: value,
        addressLocality: organizationFormat.tempAddressLocality,
        addressRegion: organizationFormat.tempAddressRegion,
        postalCode: organizationFormat.tempPostalCode,
        addressCountry: organizationFormat.tempAddressCountry,
    };

    organizationFormat.temp();
    organizationFormat.render();
}

function updateJSON_city(value) {
    organizationFormat.tempAddressLocality = value;
    organizationFormat.address = {
        "@type": "PostalAddress",
        streetAddress: organizationFormat.tempStreetAddress,
        addressLocality: value,
        addressRegion: organizationFormat.tempAddressRegion,
        postalCode: organizationFormat.tempPostalCode,
        addressCountry: organizationFormat.tempAddressCountry,
    };

    organizationFormat.temp();
    organizationFormat.render();
}

function updateJSON_zip(value) {
    organizationFormat.tempPostalCode = value;
    organizationFormat.address = {
        "@type": "PostalAddress",
        streetAddress: organizationFormat.tempStreetAddress,
        addressLocality: organizationFormat.tempAddressLocality,
        addressRegion: organizationFormat.tempAddressRegion,
        postalCode: value,
        addressCountry: organizationFormat.tempAddressCountry,
    };

    organizationFormat.temp();
    organizationFormat.render();
}

function updateJSON_country(value) {
    organizationFormat.tempAddressCountry = value;
    if (value == "none") {
        organizationFormat.address = {
            "@type": "PostalAddress",
            streetAddress: organizationFormat.tempStreetAddress,
            addressLocality: organizationFormat.tempAddressLocality,
            postalCode: organizationFormat.tempPostalCode,
            addressCountry: "",
        };
    } else {
        organizationFormat.address = {
            "@type": "PostalAddress",
            streetAddress: organizationFormat.tempStreetAddress,
            addressLocality: organizationFormat.tempAddressLocality,
            postalCode: organizationFormat.tempPostalCode,
            addressCountry: value,
        };
    }

    organizationFormat.temp();
    organizationFormat.render();
}

function updateJSON_region(value) {
    organizationFormat.tempAddressRegion = value;
    organizationFormat.address = {
        "@type": "PostalAddress",
        streetAddress: organizationFormat.tempStreetAddress,
        addressLocality: organizationFormat.tempAddressLocality,
        addressRegion: value,
        postalCode: organizationFormat.tempPostalCode,
        addressCountry: organizationFormat.tempAddressCountry,
    };

    organizationFormat.temp();
    organizationFormat.render();
}

function updateJSON_latitude(value, id) {
    organizationFormat.tempLatitude = value;
    organizationFormat.geo = {
        "@type": "GeoCoordinates",
        latitude: value,
        longitude: organizationFormat.tempLongitude,
    };

    organizationFormat.temp();
    organizationFormat.render();

    if (value.match(regexGeoLocation)) {
        $(`.latitude`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        $(`.latitude`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }
}

function updateJSON_longitude(value, id) {
    organizationFormat.tempLongitude = value;
    organizationFormat.geo = {
        "@type": "GeoCoordinates",
        latitude: organizationFormat.tempLatitude,
        longitude: value,
    };

    organizationFormat.temp();
    organizationFormat.render();

    if (value.match(regexGeoLocation)) {
        $(`.longitude`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        $(`.longitude`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }
}

function showLatitude(position) {
    $(".latitude").val(position.coords.latitude);
    updateJSON_latitude("" + position.coords.latitude + "");
}

function showLongitude(position) {
    $(".longitude").val(position.coords.longitude);
    updateJSON_longitude("" + position.coords.longitude + "");
}

function showCountryRegion(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;

    if (lat && lng) {
        $.ajax({
            // Website API GeoCode: https://opencagedata.com/ or https://opencagedata.com/dashboard
            url: `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lng}&key=46eb96937e4f48379d3012c67c6aa854`,
            method: "GET",
            success: function (data) {
                if (data.results.length > 0) {
                    var countryCode = data.results[0].components.country_code;
                    var region = data.results[0].components.state_code;
                    var road = data.results[0].components.road;
                    var village = data.results[0].components.village;
                    var county = data.results[0].components.county;
                    var postCode = data.results[0].components.postcode;

                    console.log(data);

                    // Street update
                    $(".street").val("" + road + ", " + village + "");
                    updateJSON_street("" + road + ", " + village + "");

                    // City update
                    $(".city").val("" + county + "");
                    updateJSON_city("" + county + "");

                    // Zip code
                    $(".zip").val("" + postCode + "");
                    updateJSON_zip("" + postCode + "");

                    // Country update
                    $(".country").val(countryCode.toUpperCase());
                    $(".country").selectpicker("refresh");
                    updateJSON_country(countryCode.toUpperCase());

                    // Region update
                    if (countryCode.toUpperCase() == "ID") {
                        $(".region").val(region);
                        updateJSON_region(region);
                        $(".region").removeAttr("disabled");
                        $(".region").selectpicker("refresh");
                    }
                } else {
                    console.log(
                        "Location information not found for the provided latitude and longitude."
                    );
                }
            },
            error: function () {
                console.log(
                    "An error occurred while fetching location information."
                );
            },
        });
    } else {
        console.log("Please enter both latitude and longitude.");
    }
}

function updateJson_dayOfWeek(value, id) {
    for (let i = 0; i < 8; i++) {
        if ($.inArray(value[i], organizationFormat.tempDayOfWeek) == -1) {
            organizationFormat.openingHoursSpecification[id].dayOfWeek = value;
        } else {
            organizationFormat.openingHoursSpecification[id].dayOfWeek = "";
        }
    }

    organizationFormat.render();
}

function updateJSON_openAt(value, id) {
    organizationFormat.openingHoursSpecification[id].opens = value;
    organizationFormat.render();

    if (value.match(regexHours)) {
        $(".openAt[data-id=" + id + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=openAt-" + id + "]").hide();
    } else {
        $(".openAt[data-id=" + id + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=openAt-" + id + "]").show();
    }
}

function updateJSON_closeAt(value, id) {
    organizationFormat.openingHoursSpecification[id].closes = value;
    organizationFormat.render();

    if (value.match(regexHours)) {
        $(".closeAt[data-id=" + id + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=closeAt-" + id + "]").hide();
    } else {
        $(".closeAt[data-id=" + id + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=closeAt-" + id + "]").show();
    }
}

function deleteHours(id) {
    organizationFormat.openingHoursSpecification.splice(id, 1);
    organizationFormat.render();

    for (
        let i = id + 1;
        i < organizationFormat.openingHoursSpecification.length + 1;
        i++
    ) {
        $(".hours-data[data-id=" + (i - 1) + "]").val(
            $(".hours-data[data-id=" + i + "]").val()
        );
        $(".openAt[data-id=" + (i - 1) + "]").val(
            $(".openAt[data-id=" + i + "]").val()
        );
        $(".closeAt[data-id=" + (i - 1) + "]").val(
            $(".closeAt[data-id=" + i + "]").val()
        );
    }

    $(
        ".hours-data[data-id=" +
            organizationFormat.openingHoursSpecification.length +
            "]"
    ).remove();
    hoursCounter--;
}

function changeLocalBusinessType(id) {
    if ($("#localBusinessType-" + id + "").val() == "none") {
        $(".spesificType-" + id + "").attr("disabled", true);
        $(".spesificType-" + id + "").selectpicker("refresh");

        organizationFormat.department[id]["@type"] = "LocalBusiness";
        organizationFormat.render();
    } else {
        $(".spesificType-" + id + "").removeAttr("disabled");
        $(".spesificType-" + id + "").selectpicker("refresh");

        organizationFormat.department[id]["@type"] = $(
            "#localBusinessType-" + id + ""
        ).val();
        organizationFormat.render();

        jQuery.ajax({
            url: "/json/local-business.json",
            type: "GET",
            dataType: "json",
            success: function (data) {
                jQuery.each(data, function (key, value) {
                    if (
                        value.localBusinessType ==
                            $("#localBusinessType-" + id + "").val() &&
                        value.specificType
                    ) {
                        value.specificType.forEach((specificTypeList) => {
                            jQuery("#SpesificType-" + id + "").append(
                                '<option value="' +
                                    specificTypeList +
                                    '">' +
                                    specificTypeList +
                                    "</option>"
                            );
                        });

                        $(".spesificType-" + id + "").selectpicker("refresh");
                    } else if (
                        value.localBusinessType ==
                            $("#localBusinessType-" + id + "").val() &&
                        value.specificType == null
                    ) {
                        jQuery("#SpesificType-" + id + "")
                            .find("option")
                            .remove()
                            .end()
                            .append(
                                '<option value="none">More Specific</option>'
                            );

                        $(".spesificType-" + id + "").attr("disabled", true);
                        $(".spesificType-" + id + "").selectpicker("refresh");
                    }
                });
            },
        });
    }
}

function changeLocalBusinessSpesificType(id) {
    if ($("#SpesificType-" + id + "").val() == "none") {
        organizationFormat.department[id]["@type"] = $(
            "#localBusinessType-" + id + ""
        ).val();
        organizationFormat.render();
    } else {
        organizationFormat.department[id]["@type"] = $(
            "#SpesificType-" + id + ""
        ).val();
        organizationFormat.render();
    }
}

function deleteDepartment(id) {
    organizationFormat.department.splice(id, 1);
    organizationFormat.render();

    for (let i = id + 1; i < organizationFormat.department.length + 1; i++) {
        $(".department-list[data-id=" + (i - 1) + "]").val(
            $(".department-list[data-id=" + i + "]").val()
        );
        $("#localBusinessType-" + (i - 1) + "").val(
            $("#localBusinessType-" + i + "").val()
        );
        $("#localBusinessType-" + (i - 1) + "").selectpicker("refresh");

        jQuery.ajax({
            url: "/json/local-business.json",
            type: "GET",
            dataType: "json",
            success: function (data) {
                jQuery.each(data, function (key, value) {
                    if (
                        value.localBusinessType ==
                            $("#localBusinessType-" + (i - 1) + "").val() &&
                        value.specificType
                    ) {
                        value.specificType?.forEach((specificTypeList) => {
                            jQuery("#SpesificType-" + (i - 1) + "").append(
                                '<option value="' +
                                    specificTypeList +
                                    '">' +
                                    specificTypeList +
                                    "</option>"
                            );
                        });

                        $("#SpesificType-" + (i - 1) + "").val(
                            organizationFormat.department[i - 1]["@type"]
                        );
                        $(".spesificType-" + (i - 1) + "").removeAttr(
                            "disabled"
                        );
                        $(".spesificType-" + (i - 1) + "").selectpicker(
                            "refresh"
                        );
                    }
                });
            },
        });

        $("#nameBusiness-" + (i - 1) + "").val(
            $("#nameBusiness-" + i + "").val()
        );
        $("#imageBusiness-" + (i - 1) + "").val(
            $("#imageBusiness-" + i + "").val()
        );
        $("#phoneBusiness-" + (i - 1) + "").val(
            $("#phoneBusiness-" + i + "").val()
        );
    }

    $(
        ".department-list[data-id=" +
            organizationFormat.department.length +
            "]"
    ).remove();
    $("hr[data-id=" + organizationFormat.department.length + "]").remove();
    departmentCounter--;
}

function nameDepartmentKeyup(id) {
    organizationFormat.department[id].name = $(
        "#nameBusiness-" + id + ""
    ).val();
    organizationFormat.render();
}

function imageDepartmentKeyup(id) {
    if (
        $("#imageBusiness-" + id + "")
            .val()
            .match(regex)
    ) {
        $("#imageBusiness-" + id + "").removeClass("is-invalid");
        $(".invalid-feedback.url-department[data-id=" + id + "]").hide();
    } else {
        $("#imageBusiness-" + id + "").addClass("is-invalid");
        $(".invalid-feedback.url-department[data-id=" + id + "]").show();
    }

    organizationFormat.department[id].image = $(
        "#imageBusiness-" + id + ""
    ).val();
    organizationFormat.render();
}

function phoneDepartmentKeyup(id) {
    if (
        $("#phoneBusiness-" + id + "")
            .val()
            .match(regexPhone)
    ) {
        $("#phoneBusiness-" + id + "").removeClass("is-invalid");
        $(".invalid-feedback.phone-department[data-id=" + id + "]").hide();
    } else {
        $("#phoneBusiness-" + id + "").addClass("is-invalid");
        $(".invalid-feedback.phone-department[data-id=" + id + "]").show();
    }

    organizationFormat.department[id].telephone = $(
        "#phoneBusiness-" + id + ""
    ).val();
    organizationFormat.render();
}

function updateJson_dayOfWeekDepartment(value, id, select) {
    for (let i = 0; i < 8; i++) {
        if (
            $.inArray(value[i], organizationFormat.tempDayOfWeekDepartment) ==
            -1
        ) {
            organizationFormat.department[id].openingHoursSpecification[
                select
            ].dayOfWeek = value;
        } else {
            organizationFormat.department[id].openingHoursSpecification[
                select
            ].dayOfWeek = "";
        }
    }

    organizationFormat.render();
}

function openAtDepartment(value, id, input) {
    organizationFormat.department[id].openingHoursSpecification[input].opens =
        value;
    organizationFormat.render();

    if (value.match(regexHours)) {
        $(
            ".openAtDepartment[data-id=" + id + "][data-id-input=" + input + "]"
        ).removeClass("is-invalid");
        $(
            ".invalid-feedback[data-id=openAt-" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).hide();
    } else {
        $(
            ".openAtDepartment[data-id=" + id + "][data-id-input=" + input + "]"
        ).addClass("is-invalid");
        $(
            ".invalid-feedback[data-id=openAt-" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).show();
    }
}

function closeAtDepartment(value, id, input) {
    organizationFormat.department[id].openingHoursSpecification[input].closes =
        value;
    organizationFormat.render();

    if (value.match(regexHours)) {
        $(
            ".closeAtDepartment[data-id=" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).removeClass("is-invalid");
        $(
            ".invalid-feedback[data-id=closeAt-" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).hide();
    } else {
        $(
            ".closeAtDepartment[data-id=" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).addClass("is-invalid");
        $(
            ".invalid-feedback[data-id=closeAt-" +
                id +
                "][data-id-input=" +
                input +
                "]"
        ).show();
    }
}

function deleteHoursDepartment(id, idDelete) {
    organizationFormat.department[id].openingHoursSpecification.splice(
        idDelete,
        1
    );
    organizationFormat.render();

    for (
        let i = id + 1;
        i <
        organizationFormat.department[id].openingHoursSpecification.length + 1;
        i++
    ) {
        $(
            ".hours-data-department[data-id=" +
                (id - 1) +
                "][data-id-department=" +
                (idDelete - 1) +
                "]"
        ).val(
            $(
                ".hours-data-department[data-id=" +
                    id +
                    "][data-id-department=" +
                    idDelete +
                    "]"
            ).val()
        );
        $(
            ".openAtDepartment[data-id=" +
                (id - 1) +
                "][data-id-input=" +
                (idDelete - 1) +
                "]"
        ).val(
            $(
                ".openAtDepartment[data-id=" +
                    id +
                    "][data-id-input=" +
                    idDelete +
                    "]"
            ).val()
        );
        $(
            ".closeAtDepartment[data-id=" +
                (id - 1) +
                "][data-id-input=" +
                (idDelete - 1) +
                "]"
        ).val(
            $(
                ".closeAtDepartment[data-id=" +
                    id +
                    "][data-id-input=" +
                    idDelete +
                    "]"
            ).val()
        );
        $(
            ".deleteHoursDepartment[data-id=" +
                (id - 1) +
                "][data-id-delete=" +
                (idDelete - 1) +
                "]"
        ).val(
            $(
                ".deleteHoursDepartment[data-id=" +
                    id +
                    "][data-id-delete=" +
                    idDelete +
                    "]"
            ).val()
        );
    }

    $(
        ".hours-data-department[data-id=" +
            id +
            "][data-id-department=" +
            idDelete +
            "]"
    ).remove();
    hoursDepartmentCounter--;
}

// Interaction
$(document).on("change", "#organizationType", function () {
    updateJSON_organizationType($(this).val());
});

$(".organizationType").change(function (e) {
    clearSelect();
    const organizationType = $(this).val();

    if (organizationType == "none") {
        $(".spesificType").attr("disabled", true);
        $(".spesificType").selectpicker("refresh");
    } else {
        $(".spesificType").removeAttr("disabled");
        $(".spesificType").selectpicker("refresh");

        jQuery.ajax({
            url: "/json/organization.json",
            type: "GET",
            dataType: "json",
            success: function (data) {
                jQuery.each(data, function (key, value) {
                    if (
                        value.organizationType == organizationType &&
                        value.specificType
                    ) {
                        clearSelect();
                        value.specificType.forEach((specificTypeList) => {
                            jQuery("#SpesificType").append(
                                '<option value="' +
                                    specificTypeList +
                                    '">' +
                                    specificTypeList +
                                    "</option>"
                            );
                        });
                        $(".spesificType").selectpicker("refresh");
                    } else if (
                        value.organizationType == organizationType &&
                        value.specificType == null
                    ) {
                        $(".spesificType").attr("disabled", true);
                        $(".spesificType").selectpicker("refresh");
                    }
                });
            },
        });
    }
});

$(document).on("change", "#SpesificType", function () {
    updateJSON_organizationType($(this).val());
});

$(document).on("keyup", ".nameOrganization", function () {
    updateJSON_nameOrganization($(this).val());
});

$(document).on("keyup", ".alternateNameOrganization", function () {
    updateJSON_alternateNameOrganization($(this).val());
});

$(document).on("keyup", ".url", function () {
    updateJSON_url(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".logo-url", function () {
    updateJSON_logoUrl(parseInt($(this).data("id")), $(this).val());
});

$(".social-profiles").change(function (e) {
    if (organizationFormat.tempSocial.length > $(this).val().length) {
        for (let i = 0; i < organizationFormat.tempSocial.length; i++) {
            if (
                $.inArray(organizationFormat.tempSocial[i], $(this).val()) == -1
            ) {
                $("#" + organizationFormat.tempSocial[i] + "").remove();
                organizationFormat.tempSocial.splice(i, 1);
                organizationFormat.sameAs.splice(i, 1);
                // counterSocial--;
            }
        }
    }

    for (let i = 0; i < $(this).val().length; i++) {
        if ($.inArray($(this).val()[i], organizationFormat.tempSocial) == -1) {
            // counterSocial++;
            $(".sosial-profile-url").append(
                eval("socialData." + $(this).val()[i] + "(" + i + ")")
            );
            organizationFormat.tempSocial.push($(this).val()[i]);

            if (
                eval("organizationFormat." + $(this).val()[i] + "Val" + "") !=
                ""
            ) {
                organizationFormat.sameAs.push(
                    eval("organizationFormat." + $(this).val()[i] + "Val")
                );
            } else {
                organizationFormat.sameAs.push("");
            }
        }
    }

    organizationFormat.render();
});

$(document).on("keyup", ".sosmedName", function () {
    let index = parseInt($(this).data("id"));
    let sosmedData = $(this).attr("data-sosmed");
    let sosmedId = $(this).attr("data-id");

    if (sosmedData == "facebook") {
        organizationFormat.facebookVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "twitter") {
        organizationFormat.twitterVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "linkedin") {
        organizationFormat.linkedinVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "wikipedia") {
        organizationFormat.wikipediaVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "website") {
        organizationFormat.websiteVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "pinterest") {
        organizationFormat.pinterestVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "github") {
        organizationFormat.githubVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "tumblr") {
        organizationFormat.tumblrVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "soundcloud") {
        organizationFormat.soundcloudVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "instagram") {
        organizationFormat.instagramVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "youtube") {
        organizationFormat.youtubeVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    }

    // console.log(index)
    organizationFormat.sameAs[index] = $(this).val();
    organizationFormat.temp();
    organizationFormat.render();
});

$(document).on("click", "#add-contact", function () {
    $("#form-contact").show();
    counterContact++;

    $("#form-contact").append(
        '<div class="row py-3"><div class="col-sm-6 mb-5"><label class="text-black font-weight-bold" for="typeContact">' +
            label_type_contact +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select class="form-control selectpicker custom-select-blue typeContact mb-5 custom-searchbox" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null"><option value="none">' +
            placeholder_type_contact +
            '</option><option value="customer service">' +
            opt_type_contact_1 +
            '</option><option value="technical support">' +
            opt_type_contact_2 +
            '</option><option value="billing support">' +
            opt_type_contact_3 +
            '</option><option value="bill payment">' +
            opt_type_contact_4 +
            '</option><option value="sales">' +
            opt_type_contact_5 +
            '</option><option value="reservations">' +
            opt_type_contact_6 +
            '</option><option value="credit card support">' +
            opt_type_contact_7 +
            '</option><option value="emergency">' +
            opt_type_contact_8 +
            '</option><option value="baggage tracking">' +
            opt_type_contact_9 +
            '</option><option value="roadside assistance">' +
            opt_type_contact_10 +
            '</option><option value="package tracking">' +
            opt_type_contact_11 +
            '</option></select></div></div><div class="col-sm-5 mb-5"><label for="phone" class="font-weight-bold text-black">' +
            label_phone +
            '</label><input type="text" id="phone" class="form-control phone" name="" placeholder="' +
            placeholder_phone +
            '" value=""><div class="invalid-feedback phone" data-id="' +
            counterContact +
            '">' +
            invalid_phone +
            '</div></div><div class="col-sm-1 mb-5 align-self-center mt-md-0 mb-md-0"><div class="d-flex justify-content-end mb-md-3"><i class="bx bxs-x-circle bx-md delete deleteContact" data-id="' +
            counterContact +
            '"></i></div></div></div><div class="row"><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="area-served">' +
            label_area_served +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="area-served-' +
            counterContact +
            '" class="form-control selectpicker custom-select-blue area-served mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null"></select></div></div><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="language">' +
            label_language +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="language-' +
            counterContact +
            '" class="form-control selectpicker custom-select-blue language mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null"></select></div></div><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="options">' +
            label_options +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select class="form-control selectpicker custom-select-blue options mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null"><option value="TollFree">' +
            opt_options_1 +
            '</option><option value="HearingImpairedSupported">' +
            opt_options_2 +
            "</option></select></div></div></div><hr>"
    );

    jQuery.ajax({
        url: "/json/regions.json",
        type: "GET",
        dataType: "json",
        success: function (data) {
            jQuery.each(data, function (key, value) {
                clearSelect();
                jQuery("#area-served-" + counterContact + "").append(
                    '<option value="' +
                        value.code +
                        '">' +
                        value.name +
                        "</option>"
                );
                $("#area-served-" + counterContact + "").selectpicker(
                    "refresh"
                );
            });
        },
    });

    jQuery.ajax({
        url: "/json/languages.json",
        type: "GET",
        dataType: "json",
        success: function (data) {
            jQuery.each(data, function (key, value) {
                clearSelect();
                jQuery("#language-" + counterContact + "").append(
                    '<option value="' +
                        value.language_code +
                        '">' +
                        value.language_name +
                        "</option>"
                );
                $("#language-" + counterContact + "").selectpicker("refresh");
            });
        },
    });

    // organizationFormat.department.push({
    //     "@type": "LocalBusiness",
    //     name: "",
    //     image: "",
    //     telephone: "",
    // });
    // organizationFormat.render();

    $(".typeContact").selectpicker("refresh");
    $("#area-served-"+ counterContact +"").selectpicker("refresh");
    $("#language-"+ counterContact +"").selectpicker("refresh");
    $(".language").selectpicker("refresh");
    $(".options").selectpicker("refresh");
    // $(".spesificType-" + departmentCounter + "").selectpicker("refresh");
});

// To be continue..

$(".country").change(function (e) {
    const country = $(this).val();

    if (country !== "none" && country == "ID") {
        $(".region").removeAttr("disabled");
        $(".region").selectpicker("refresh");
    } else {
        $(".region").val("none");
        $(".region").attr("disabled", true);
        $(".region").selectpicker("refresh");
    }
});

$("#fecthed-geo-coordinates").click(function (e) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLatitude);
        navigator.geolocation.getCurrentPosition(showLongitude);
        navigator.geolocation.getCurrentPosition(showCountryRegion);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
});

$(document).on("click", "#add-hours", function () {
    $("#form-hours").show();
    hoursCounter++;

    $("#form-hours").append(
        '<div class="row mb-5 hours-data" data-id="' +
            hoursCounter +
            '"><div class="col-sm-5 mb-5 align-self-center mt-md-2 mb-md-0"><label class="text-black font-weight-bold" for="dayWeek">' +
            label_days_week +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select class="form-control selectpicker custom-select-blue dayWeek custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            hoursCounter +
            '"><option value="Monday">' +
            label_monday +
            '</option><option value="Tuesday">' +
            label_tuesday +
            '</option><option value="Wednesday">' +
            label_wednesday +
            '</option><option value="Thursday">' +
            label_thursday +
            '</option><option value="Friday">' +
            label_friday +
            '</option><option value="Saturday">' +
            label_saturday +
            '</option><option value="Sunday">' +
            label_sunday +
            '</option></select></div></div><div class="col-sm-3 mb-5 align-self-center mt-md-2 mb-md-0"><label for="openAt" class="font-weight-bold text-black">' +
            label_openat +
            '</label><input type="text" id="openAt" class="form-control openAt" name="" placeholder="' +
            placeholder_openat +
            '" value="" data-id="' +
            hoursCounter +
            '"><div class="invalid-feedback" data-id="openAt-' +
            hoursCounter +
            '">' +
            invalid_hours +
            '</div></div><div class="col-sm-3 mb-5 align-self-center mt-md-2 mb-md-0"><label for="closeAt" class="font-weight-bold text-black">' +
            label_closeat +
            '</label><input type="text" id="closeAt" class="form-control closeAt" name="" placeholder="' +
            placeholder_closeat +
            '" value="" data-id="' +
            hoursCounter +
            '"><div class="invalid-feedback" data-id="closeAt-' +
            hoursCounter +
            '">' +
            invalid_hours +
            '</div></div><div class="col-sm-1 mb-5 align-self-center mt-md-2 mb-md-0"><div class="d-flex justify-content-center mt-7"><i class="bx bxs-x-circle bx-md delete deleteHours" data-id="' +
            hoursCounter +
            '"></i></div></div></div>'
    );

    $(".dayWeek").selectpicker("refresh");
    organizationFormat.openingHoursSpecification.push({
        "@type": "OpeningHoursSpecification",
        dayOfWeek: "",
        opens: "",
        closes: "",
    });
    organizationFormat.render();
});

$(document).on("click", ".deleteHours", function () {
    deleteHours(parseInt($(this).data("id")));
});

$("#open-fullday").change(function () {
    if (this.checked) {
        // format hours everyday open
        organizationFormat.openingHoursSpecification = [
            {
                "@type": "OpeningHoursSpecification",
                dayOfWeek: [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday",
                ],
                opens: "00:00",
                closes: "23:59",
            },
        ];

        $("#add-hours").prop("disabled", true);
        $("#form-hours").hide();
    } else {
        // render hours
        organizationFormat.openingHoursSpecification.splice(0, 1);
        var hoursDataCount = $(".hours-data").length;
        for (let i = 0; i < hoursDataCount; i++) {
            organizationFormat.openingHoursSpecification.push({
                "@type": "OpeningHoursSpecification",
                dayOfWeek: $(".dayWeek[data-id=" + i + "]").val(),
                opens: $(".openAt[data-id=" + i + "]").val(),
                closes: $(".closeAt[data-id=" + i + "]").val(),
            });
        }

        $("#add-hours").prop("disabled", false);
        $("#form-hours").show();
    }
    organizationFormat.render();
});

$(document).on("click", ".add-hours-department", function () {
    var idHoursDepartment = parseInt($(this).attr("data-id"));
    $("#form-hours-department-" + idHoursDepartment + "").show();
    hoursDepartmentCounter++;

    $("#form-hours-department-" + idHoursDepartment + "").append(
        '<div class="row mb-5 hours-data-department" data-id="' +
            idHoursDepartment +
            '" data-id-department="' +
            hoursDepartmentCounter +
            '"><div class="col-sm-5 mb-5 align-self-center mt-md-2 mb-md-0"><label class="text-black font-weight-bold" for="dayWeek">' +
            label_days_week +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select class="form-control selectpicker custom-select-blue dayWeekDepartment custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            idHoursDepartment +
            '" data-id-select="' +
            hoursDepartmentCounter +
            '"><option value="Monday">' +
            label_monday +
            '</option><option value="Tuesday">' +
            label_tuesday +
            '</option><option value="Wednesday">' +
            label_wednesday +
            '</option><option value="Thursday">' +
            label_thursday +
            '</option><option value="Friday">' +
            label_friday +
            '</option><option value="Saturday">' +
            label_saturday +
            '</option><option value="Sunday">' +
            label_sunday +
            '</option></select></div></div><div class="col-sm-3 mb-5 align-self-center mt-md-2 mb-md-0"><label for="openAt" class="font-weight-bold text-black">' +
            label_openat +
            '</label><input type="text" class="form-control openAtDepartment" name="" placeholder="' +
            placeholder_openat +
            '" value="" data-id="' +
            idHoursDepartment +
            '" data-id-input="' +
            hoursDepartmentCounter +
            '"><div class="invalid-feedback" data-id="openAt-' +
            idHoursDepartment +
            '" data-id-input="' +
            hoursDepartmentCounter +
            '">' +
            invalid_hours +
            '</div></div><div class="col-sm-3 mb-5 align-self-center mt-md-2 mb-md-0"><label for="closeAt" class="font-weight-bold text-black">' +
            label_closeat +
            '</label><input type="text" class="form-control closeAtDepartment" name="" placeholder="' +
            placeholder_closeat +
            '" value="" data-id="' +
            idHoursDepartment +
            '" data-id-input="' +
            hoursDepartmentCounter +
            '"><div class="invalid-feedback" data-id="closeAt-' +
            idHoursDepartment +
            '" data-id-input="' +
            hoursDepartmentCounter +
            '">' +
            invalid_hours +
            '</div></div><div class="col-sm-1 mb-5 align-self-center mt-md-2 mb-md-0"><div class="d-flex justify-content-center mt-7"><i class="bx bxs-x-circle bx-md delete deleteHoursDepartment" data-id="' +
            idHoursDepartment +
            '" data-id-delete="' +
            hoursDepartmentCounter +
            '"></i></div></div></div>'
    );

    $(".dayWeekDepartment").selectpicker("refresh");

    if (
        organizationFormat.department[idHoursDepartment]
            .openingHoursSpecification
    ) {
        organizationFormat.department[
            idHoursDepartment
        ].openingHoursSpecification.push({
            "@type": "OpeningHoursSpecification",
            dayOfWeek: "",
            opens: "",
            closes: "",
        });
    } else {
        organizationFormat.department[
            idHoursDepartment
        ].openingHoursSpecification = [];
        organizationFormat.department[
            idHoursDepartment
        ].openingHoursSpecification.push({
            "@type": "OpeningHoursSpecification",
            dayOfWeek: "",
            opens: "",
            closes: "",
        });
    }

    organizationFormat.render();
});

$(document).on("change", ".open-fullday-department", function () {
    var id = parseInt($(this).attr("data-id"));
    if (this.checked) {
        // format hours everyday open
        organizationFormat.department[id].openingHoursSpecification = [
            {
                "@type": "OpeningHoursSpecification",
                dayOfWeek: [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday",
                ],
                opens: "00:00",
                closes: "23:59",
            },
        ];

        $(".add-hours-department[data-id=" + id + "]").prop("disabled", true);
        $("#form-hours-department-" + id + "").hide();
    } else {
        // render hours
        organizationFormat.department[id].openingHoursSpecification.splice(
            0,
            1
        );
        var departmentList = $(".department-list").length;
        for (let i = 1; i < departmentList + 1; i++) {
            console.log(departmentList);
            organizationFormat.department[id].openingHoursSpecification.push({
                "@type": "OpeningHoursSpecification",
                dayOfWeek: $(
                    ".dayWeekDepartment[data-id=" +
                        id +
                        "][data-id-select=" +
                        (i - 1) +
                        "]"
                ).val(),
                opens: $(
                    ".openAtDepartment[data-id=" +
                        id +
                        "][data-id-input=" +
                        (i - 1) +
                        "]"
                ).val(),
                closes: $(
                    ".closeAtDepartment[data-id=" +
                        id +
                        "][data-id-input=" +
                        (i - 1) +
                        "]"
                ).val(),
            });
        }

        $(".add-hours-department[data-id=" + id + "]").prop("disabled", false);
        $("#form-hours-department-" + id + "").show();
    }
    organizationFormat.render();
});

$(document).on("click", ".deleteDepartment", function () {
    deleteDepartment(parseInt($(this).data("id")));
});

$(document).on("change", ".dayWeekDepartment", function () {
    updateJson_dayOfWeekDepartment(
        $(this).val(),
        $(this).data("id"),
        $(this).data("id-select")
    );
});

$(document).on("keyup", ".openAtDepartment", function () {
    openAtDepartment(
        $(this).val(),
        $(this).data("id"),
        $(this).data("id-input")
    );
});

$(document).on("keyup", ".closeAtDepartment", function () {
    closeAtDepartment(
        $(this).val(),
        $(this).data("id"),
        $(this).data("id-input")
    );
});

$(document).on("click", ".deleteHoursDepartment", function () {
    deleteHoursDepartment(
        parseInt($(this).data("id")),
        parseInt($(this).data("id-delete"))
    );
});

$(document).on("keyup", ".imageBusiness", function () {
    updateJSON_imageBusiness(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".phone", function () {
    updateJSON_phone(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".priceRange", function () {
    updateJSON_priceRange($(this).val());
});

$(document).on("keyup", ".menu-url", function () {
    updateJSON_menuURL(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".cuisine", function () {
    updateJSON_cuisine($(this).val());
});

$(document).on("change", "#accepts-reservation", function () {
    updateJSON_acceptsReservation(this.checked);
});

$(document).on("keyup", ".street", function () {
    updateJSON_street($(this).val());
});

$(document).on("keyup", ".city", function () {
    updateJSON_city($(this).val());
});

$(document).on("keyup", ".zip", function () {
    updateJSON_zip($(this).val());
});

$(document).on("change", "#country", function () {
    updateJSON_country($(this).val());
});

$(document).on("change", "#region", function () {
    updateJSON_region($(this).val());
});

$(document).on("keyup", ".latitude", function () {
    updateJSON_latitude($(this).val(), parseInt($(this).data("id")));
});

$(document).on("keyup", ".longitude", function () {
    updateJSON_longitude($(this).val(), parseInt($(this).data("id")));
});

$(document).on("keyup", ".openAt", function () {
    updateJSON_openAt($(this).val(), $(this).data("id"));
});

$(document).on("keyup", ".closeAt", function () {
    updateJSON_closeAt($(this).val(), $(this).data("id"));
});

$(document).on("change", ".dayWeek", function () {
    updateJson_dayOfWeek($(this).val(), $(this).data("id"));
});

// Layout Action
$(document).on("change", "#schema-json-ld", function () {
    if ($(this).val() !== "home") {
        window.location = "json-ld-" + $(this).val() + "-schema-generator";
    } else {
        window.location = "json-ld-schema-generator";
    }
});

$("#copy").click(function () {
    var copyText = jQuery("#json-format");
    copyText.select();
    document.execCommand("copy");
    toastr.success("Copied to Clipboard", "Information");
});

$(".reset").click(function (e) {
    clearSelect();
    $(".organizationType").selectpicker("val", "none");
    $(".organizationType").selectpicker("refresh");
    $(".spesificType").attr("disabled", true);
    $(".spesificType").selectpicker("refresh");
    $(".url").removeClass("is-invalid");
    $(".logo-url").removeClass("is-invalid");
    $(".social-profiles").val(1);
    $(".sosial-profile-url").html("");
    $(".social-profiles").change();
    $(".invalid-feedback").hide();
    $("#form-contact").html("");
    $("#form-contact").hide();
    $("#form-organization").trigger("reset");
    organizationFormat.resetrender();
    
    
    $(".phone").removeClass("is-invalid");
});

$("#form-contact").hide();
