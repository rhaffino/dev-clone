// Declar Social Profile Local Business
var counterSocial = 0;
var hoursCounter = -1;
var departmentCounter = -1;

let invalid_url = lang === "en" ? "Invalid URL" : "URL Tidak Valid";
let placeholder_type = lang === "en" ? "Type your" : "Ketik URL";
let placeholder_url = lang === "en" ? "URL here.." : "Anda di sini..";
let invalid_hours = lang === "en" ? "Invalid Hours" : "Jam Tidak Valid";
let label_days_week = lang === "en" ? "Day(s) of the week" : "Hari dalam seminggu";
let label_openat = lang === "en" ? "Open at" : "Buka";
let placeholder_openat = lang === "en" ? "e.g 08:00" : "contoh 08:00";
let label_closeat = lang === "en" ? "Close at" : "Tutup";
let placeholder_closeat = lang === "en" ? "e.g 21:00" : "contoh 21:00";
let label_monday = lang === "en" ? "Monday" : "Senin";
let label_tuesday = lang === "en" ? "Tuesday" : "Selasa";
let label_wednesday = lang === "en" ? "Wednesday" : "Rabu";
let label_thursday = lang === "en" ? "Thursday" : "Kamis";
let label_friday = lang === "en" ? "Friday" : "Jumat";
let label_saturday = lang === "en" ? "Saturday" : "Sabtu";
let label_sunday = lang === "en" ? "Sunday" : "Minggu";

let label_type_department = lang === "en" ? "LocalBusiness @type" : "LocalBusiness @type";
let placeholder_type_department = lang === "en" ? "LocalBusiness" : "LocalBusiness";
let label_specific_department = lang === "en" ? "More Specific @type" : "More Specific @type";
let placeholder_specific_department = lang === "en" ? "More Specific" : "More Specific";

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
        this.type = "LocalBusiness";
        this.name = "";
        this.image = "";
        this.id = "";
        this.url = "";
        this.telephone = "";
        this.priceRange = undefined;
        this.menu = undefined;
        this.servesCuisine = undefined;
        this.acceptsReservations = undefined;
        this.address = {
            "@type": "PostalAddress",
            streetAddress: "",
            addressLocality: "",
            postalCode: "",
            addressCountry: "",
        };
        this.geo = undefined;
        this.openingHoursSpecification = [];
        this.dayOfWeek = [];

        // temp
        this.tempStreetAddress = "";
        this.tempAddressLocality = "";
        this.tempAddressRegion = "";
        this.tempPostalCode = "";
        this.tempAddressCountry = "";

        this.tempLatitude = "";
        this.tempLongitude = "";

        this.tempDayOfWeek = [];
        this.tempOpenAt = [];
        this.tempCloseAt = [];

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
        hoursCounter = -1;

        this.type = "LocalBusiness";
        this.name = "";
        this.image = "";
        this.id = "";
        this.url = "";
        this.telephone = "";
        this.priceRange = undefined;
        this.menu = undefined;
        this.servesCuisine = undefined;
        this.acceptsReservations = undefined;
        this.address = {
            "@type": "PostalAddress",
            streetAddress: "",
            addressLocality: "",
            postalCode: "",
            addressCountry: "",
        };
        this.geo = undefined;
        this.openingHoursSpecification = [];
        this.dayOfWeek = [];
        
        // temp
        this.tempStreetAddress = "";
        this.tempAddressLocality = "";
        this.tempAddressRegion = "";
        this.tempPostalCode = "";
        this.tempAddressCountry = "";

        this.tempLatitude = "";
        this.tempLongitude = "";

        this.tempDayOfWeek = [];
        this.tempOpenAt = [];
        this.tempCloseAt = [];

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
            image: this.image,
            "@id": this.id,
            url: this.url,
            telephone: this.telephone,
            address: this.address,
        };

        resetObj.name = this.name;
        resetObj.image = this.image;
        resetObj["@id"] = this.id;
        resetObj.url = this.url;
        resetObj.telephone = this.telephone;

        if (this.priceRange) resetObj.priceRange = this.priceRange;
        resetObj.address = this.address;

        if (this.openingHoursSpecification) {
            if (this.openingHoursSpecification.length > 0) {
                if (this.openingHoursSpecification.length === 1) {
                    obj.openingHoursSpecification =
                        this.openingHoursSpecification[0];
                } else {
                    obj.openingHoursSpecification =
                        this.openingHoursSpecification;
                }
            }
        }

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
        tempObj.tempStreetAddress = this.tempStreetAddress;
        tempObj.tempAddressLocality = this.tempAddressLocality;
        tempObj.tempAddressRegion = this.tempAddressRegion;
        tempObj.tempPostalCode = this.tempPostalCode;
        tempObj.tempAddressCountry = this.tempAddressCountry;

        tempObj.tempLatitude = this.tempLatitude;
        tempObj.tempLongitude = this.tempLongitude;

        if (this.tempDayOfWeek.length > 0) {
            if (this.tempDayOfWeek.length === 1) {
                tempObj.tempDayOfWeek = this.tempDayOfWeek[0];
            } else {
                tempObj.tempDayOfWeek = this.tempDayOfWeek;
            }
        }

        if (this.tempOpenAt.length > 0) {
            if (this.tempOpenAt.length === 1) {
                tempObj.tempOpenAt = this.tempOpenAt[0];
            } else {
                tempObj.tempOpenAt = this.tempOpenAt;
            }
        }

        if (this.tempCloseAt.length > 0) {
            if (this.tempCloseAt.length === 1) {
                tempObj.tempCloseAt = this.tempCloseAt[0];
            } else {
                tempObj.tempCloseAt = this.tempCloseAt;
            }
        }

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
        obj.image = this.image;
        obj["@id"] = this.id;
        obj.url = this.url;
        obj.telephone = this.telephone;

        if (this.priceRange) obj.priceRange = this.priceRange;
        if (this.menu != undefined) obj.menu = this.menu;
        if (this.servesCuisine != undefined)
            obj.servesCuisine = this.servesCuisine;
        if (this.acceptsReservations != undefined)
            obj.acceptsReservations = this.acceptsReservations;
        obj.address = this.address;
        if (this.geo != undefined) obj.geo = this.geo;

        if (this.openingHoursSpecification) {
            if (this.openingHoursSpecification.length > 0) {
                if (this.openingHoursSpecification.length === 1) {
                    obj.openingHoursSpecification =
                        this.openingHoursSpecification[0];
                } else {
                    obj.openingHoursSpecification =
                        this.openingHoursSpecification;
                }
            }
        }

        if (this.sameAs.length > 0) obj.sameAs = this.sameAs;

        $("#json-format").val(
            '<script type="application/ld+json">\n' +
                JSON.stringify(obj, undefined, 4) +
                "\n</script>"
        );
        return obj;
    }
};

let localBusinessFormat = new localBusinessSchema();

localBusinessFormat.temp();
localBusinessFormat.render();

//  * Adding regex url
var expression =
    /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

//  * Adding regex phone
var expressionPhone = /^\+?\d{1,3}-?\d{3,}$/;
var regexPhone = new RegExp(expressionPhone);

//  * Adding regex geo location
var expressionGeoLocation = /-?[0-9]{1,3}[.][0-9]+/;
var regexGeoLocation = new RegExp(expressionGeoLocation);

// * Adding regex hours
var expressionHours = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
var regexHours = new RegExp(expressionHours);

// Clear Select Local Business Type
function clearSelect() {
    jQuery("#SpesificType")
        .find("option")
        .remove()
        .end()
        .append('<option value="none">More Specific</option>');
}

// Change Json Format
function updateJSON_localBusinessType(value) {
    if (value == "none") {
        localBusinessFormat.type = "LocalBusiness";
        localBusinessFormat.render();
    } else {
        localBusinessFormat.type = value;
        localBusinessFormat.render();
    }
}

function updateJSON_nameBusiness(value) {
    localBusinessFormat.name = value;
    localBusinessFormat.render();
}

function updateJSON_imageBusiness(id, value) {
    if (value.match(regex)) {
        localBusinessFormat.image = value;
        $(`.imageBusiness`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        localBusinessFormat.image = value;
        $(`.imageBusiness`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    localBusinessFormat.render();
}

function updateJSON_idUrl(id, value) {
    if (value.match(regex)) {
        localBusinessFormat.id = value;
        $(`.idUrl`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        localBusinessFormat.id = value;
        $(`.idUrl`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    localBusinessFormat.render();
}

function updateJSON_url(id, value) {
    if (value.match(regex)) {
        localBusinessFormat.url = value;
        $(`.url`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        localBusinessFormat.url = value;
        $(`.url`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    localBusinessFormat.render();
}

function updateJSON_phone(id, value) {
    if (value.match(regexPhone)) {
        localBusinessFormat.telephone = value;
        $(`.phone`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        localBusinessFormat.telephone = value;
        $(`.phone`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    localBusinessFormat.render();
}

function updateJSON_priceRange(value) {
    localBusinessFormat.priceRange = value;
    localBusinessFormat.render();
}

function updateJSON_menuURL(id, value) {
    if (value.match(regex)) {
        localBusinessFormat.menu = value;
        $(`.menu-url`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        localBusinessFormat.menu = value;
        $(`.menu-url`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }

    localBusinessFormat.render();
}

function updateJSON_cuisine(value) {
    localBusinessFormat.servesCuisine = value;
    localBusinessFormat.render();
}

function updateJSON_acceptsReservation(value) {
    if (value) {
        localBusinessFormat.acceptsReservations = "true";
        localBusinessFormat.render();
    } else {
        localBusinessFormat.acceptsReservations = "false";
        localBusinessFormat.render();
    }
}

function updateJson_foodEstablishment() {
    localBusinessFormat.menu = "";
    localBusinessFormat.servesCuisine = "";
    localBusinessFormat.acceptsReservations = "false";
    localBusinessFormat.render();
}

function updateJson_foodEstablishmentUndefined() {
    localBusinessFormat.menu = undefined;
    localBusinessFormat.servesCuisine = undefined;
    localBusinessFormat.acceptsReservations = undefined;
    localBusinessFormat.render();
}

function updateJSON_street(value) {
    localBusinessFormat.tempStreetAddress = value;
    localBusinessFormat.address = {
        "@type": "PostalAddress",
        streetAddress: value,
        addressLocality: localBusinessFormat.tempAddressLocality,
        addressRegion: localBusinessFormat.tempAddressRegion,
        postalCode: localBusinessFormat.tempPostalCode,
        addressCountry: localBusinessFormat.tempAddressCountry,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();
}

function updateJSON_city(value) {
    localBusinessFormat.tempAddressLocality = value;
    localBusinessFormat.address = {
        "@type": "PostalAddress",
        streetAddress: localBusinessFormat.tempStreetAddress,
        addressLocality: value,
        addressRegion: localBusinessFormat.tempAddressRegion,
        postalCode: localBusinessFormat.tempPostalCode,
        addressCountry: localBusinessFormat.tempAddressCountry,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();
}

function updateJSON_zip(value) {
    localBusinessFormat.tempPostalCode = value;
    localBusinessFormat.address = {
        "@type": "PostalAddress",
        streetAddress: localBusinessFormat.tempStreetAddress,
        addressLocality: localBusinessFormat.tempAddressLocality,
        addressRegion: localBusinessFormat.tempAddressRegion,
        postalCode: value,
        addressCountry: localBusinessFormat.tempAddressCountry,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();
}

function updateJSON_country(value) {
    localBusinessFormat.tempAddressCountry = value;
    if (value == "none") {
        localBusinessFormat.address = {
            "@type": "PostalAddress",
            streetAddress: localBusinessFormat.tempStreetAddress,
            addressLocality: localBusinessFormat.tempAddressLocality,
            postalCode: localBusinessFormat.tempPostalCode,
            addressCountry: "",
        };
    } else {
        localBusinessFormat.address = {
            "@type": "PostalAddress",
            streetAddress: localBusinessFormat.tempStreetAddress,
            addressLocality: localBusinessFormat.tempAddressLocality,
            postalCode: localBusinessFormat.tempPostalCode,
            addressCountry: value,
        };
    }

    localBusinessFormat.temp();
    localBusinessFormat.render();
}

function updateJSON_region(value) {
    localBusinessFormat.tempAddressRegion = value;
    localBusinessFormat.address = {
        "@type": "PostalAddress",
        streetAddress: localBusinessFormat.tempStreetAddress,
        addressLocality: localBusinessFormat.tempAddressLocality,
        addressRegion: value,
        postalCode: localBusinessFormat.tempPostalCode,
        addressCountry: localBusinessFormat.tempAddressCountry,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();
}

function updateJSON_latitude(value, id) {
    localBusinessFormat.tempLatitude = value;
    localBusinessFormat.geo = {
        "@type": "GeoCoordinates",
        latitude: value,
        longitude: localBusinessFormat.tempLongitude,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();

    if (value.match(regexGeoLocation)) {
        $(`.latitude`).removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").hide();
    } else {
        $(`.latitude`).addClass("is-invalid");
        $(".invalid-feedback[data-id=" + id + "]").show();
    }
}

function updateJSON_longitude(value, id) {
    localBusinessFormat.tempLongitude = value;
    localBusinessFormat.geo = {
        "@type": "GeoCoordinates",
        latitude: localBusinessFormat.tempLatitude,
        longitude: value,
    };

    localBusinessFormat.temp();
    localBusinessFormat.render();

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

function validateSosmed(value, data, id) {
    if (value.match(regex)) {
        $(".sosmedName[data-sosmed=" + data + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=" + data + "-" + id + "]").hide();
    } else {
        $(".sosmedName[data-sosmed=" + data + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=" + data + "-" + id + "]").show();
    }
}

function updateJson_dayOfWeek(value, id){
    for (let i = 0; i < 8; i++) {
        if (
            $.inArray(
                value[i], localBusinessFormat.tempDayOfWeek) == -1)
        {
            localBusinessFormat.openingHoursSpecification[id].dayOfWeek = value;
        } else {
            localBusinessFormat.openingHoursSpecification[id].dayOfWeek = "";
        }
    }

    localBusinessFormat.render();
}

function updateJSON_openAt(value, id) {
    localBusinessFormat.openingHoursSpecification[id].opens = value;
    localBusinessFormat.render();

    if (value.match(regexHours)) {
        $(".openAt[data-id=" + id + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=openAt-" + id + "]").hide();
    } else {
        $(".openAt[data-id=" + id + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=openAt-" + id + "]").show();
    }
}

function updateJSON_closeAt(value, id) {
    localBusinessFormat.openingHoursSpecification[id].closes = value;
    localBusinessFormat.render();

    if (value.match(regexHours)) {
        $(".closeAt[data-id=" + id + "]").removeClass("is-invalid");
        $(".invalid-feedback[data-id=closeAt-" + id + "]").hide();
    } else {
        $(".closeAt[data-id=" + id + "]").addClass("is-invalid");
        $(".invalid-feedback[data-id=closeAt-" + id + "]").show();
    }
}

function deleteHours(id) {
    localBusinessFormat.openingHoursSpecification.splice(id, 1);
    localBusinessFormat.render();

    for (
        let i = id + 1;
        i < localBusinessFormat.openingHoursSpecification.length + 1;
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
            localBusinessFormat.openingHoursSpecification.length +
            "]"
    ).remove();
    hoursCounter--;
}

// Change Business Type
$(".localBusinessType").change(function (e) {
    clearSelect();
    const localBusinessType = $(this).val();

    if (localBusinessType == "none") {
        $(".spesificType").attr("disabled", true);
        $(".spesificType").selectpicker("refresh");
    } else {
        $(".spesificType").removeAttr("disabled");
        $(".spesificType").selectpicker("refresh");

        jQuery.ajax({
            url: "/json/local-business.json",
            type: "GET",
            dataType: "json",
            success: function (data) {
                jQuery.each(data, function (key, value) {
                    if (
                        value.localBusinessType == localBusinessType &&
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
                        value.localBusinessType == localBusinessType &&
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

// Change Country Type
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

// Fecth Geo Location User
$("#fecthed-geo-coordinates").click(function (e) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLatitude);
        navigator.geolocation.getCurrentPosition(showLongitude);
        navigator.geolocation.getCurrentPosition(showCountryRegion);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
});

// Add Hours Work
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
    localBusinessFormat.openingHoursSpecification.push({
        "@type": "OpeningHoursSpecification",
        dayOfWeek: "",
        opens: "",
        closes: "",
    });
    localBusinessFormat.render();
});

$(document).on("click", ".deleteHours", function () {
    deleteHours(parseInt($(this).data("id")));
});

// Change Fullday
$("#open-fullday").change(function () {
    if (this.checked) {
        // format hours everyday open
        localBusinessFormat.openingHoursSpecification = [{
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
        }];

        $("#add-hours").prop("disabled", true);
        $("#form-hours").hide();
    }else{
        // render hours
        localBusinessFormat.openingHoursSpecification.splice(0, 1);
        var hoursDataCount = $(".hours-data").length;
        for (let i = 0; i < hoursDataCount; i++) {
            localBusinessFormat.openingHoursSpecification.push({
                "@type": "OpeningHoursSpecification",
                dayOfWeek: $(".dayWeek[data-id=" + i + "]").val(),
                opens: $(".openAt[data-id=" + i + "]").val(),
                closes: $(".closeAt[data-id=" + i + "]").val(),
            });
        }
        
        $("#add-hours").prop("disabled", false);
        $("#form-hours").show();
    }
    localBusinessFormat.render();
});

$(document).on("click", "#add-department", function(){
    console.log('add-department')
    departmentCounter++;

    $("#form-department").append(
        '<hr><div class="row py-3"><div class="col-12 col-sm-12"><div class="row"><div class="col-sm-5 mb-5"><label for="localBusinessType" class="font-weight-bold text-black">#'+ departmentCounter +' '+ label_type_department +'</label><select id="localBusinessType" class="form-control selectpicker custom-select-blue custom-searchbox localBusinessType mb-5" data-size="4" data-live-search="true" tabindex="null"><option value="none">'+ placeholder_type_department +'</option></select></div><div class="col-sm-5 mb-5"><label for="spesificType" class="font-weight-bold text-black">'+ label_specific_department +'</label><select id="SpesificType" class="form-control selectpicker custom-select-blue custom-searchbox spesificType mb-5" data-size="4" data-live-search="true" tabindex="null" disabled><option value="none">'+ placeholder_specific_department +'</option></select></div><div class="col-sm-2 mb-5 align-self-center mt-md-0 mb-md-0"><div class="d-flex justify-content-end mt-md-0"><i class="bx bxs-x-circle bx-md delete deleteHours" data-id="0"></i></div></div></div></div><div class="col-12 col-sm-12"><div class="row"><div class="col-sm-4 mb-5"><label for="nameBusiness" class="font-weight-bold text-black">Name</label><input type="text" id="nameBusiness" class="form-control nameBusiness" name="" placeholder="Type your name business here.." value=""></div><div class="col-sm-4 mb-5"><label for="imageBusiness" class="font-weight-bold text-black">Image URL</label><input type="text" id="imageBusiness" class="form-control imageBusiness" name="" placeholder="Type your URL Image here.." value=""><div class="invalid-feedback url-department" data-id="0">URL invalid</div></div><div class="col-sm-4 mb-5"><label for="phone" class="font-weight-bold text-black">Phone</label><input type="text" id="phone" class="form-control phone" name="" placeholder="Type your phone here.." value=""><div class="invalid-feedback phone-department" data-id="0">Invalid Phone</div></div></div></div></div>'
    );
    
    $(".localBusinessType").selectpicker("refresh");
    $(".spesificType").selectpicker("refresh");
});

// Form Action
$(document).on("change", "#localBusinessType", function () {
    updateJSON_localBusinessType($(this).val());

    // #foodEstablishment
    if ($(this).val() == "FoodEstablishment") {
        $("#foodEstablishment").removeClass("d-none");
        updateJson_foodEstablishment();
    } else {
        $("#foodEstablishment").addClass("d-none");
        updateJson_foodEstablishmentUndefined();
    }
});

$(document).on("change", "#SpesificType", function () {
    updateJSON_localBusinessType($(this).val());
});

$(document).on("keyup", ".nameBusiness", function () {
    updateJSON_nameBusiness($(this).val());
});

$(document).on("keyup", ".imageBusiness", function () {
    updateJSON_imageBusiness(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".idUrl", function () {
    updateJSON_idUrl(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".url", function () {
    updateJSON_url(parseInt($(this).data("id")), $(this).val());
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

$(".social-profiles").change(function (e) {
    if (localBusinessFormat.tempSocial.length > $(this).val().length) {
        for (let i = 0; i < localBusinessFormat.tempSocial.length; i++) {
            if (
                $.inArray(localBusinessFormat.tempSocial[i], $(this).val()) ==
                -1
            ) {
                $("#" + localBusinessFormat.tempSocial[i] + "").remove();
                localBusinessFormat.tempSocial.splice(i, 1);
                localBusinessFormat.sameAs.splice(i, 1);
                // counterSocial--;
            }
        }
    }

    for (let i = 0; i < $(this).val().length; i++) {
        if ($.inArray($(this).val()[i], localBusinessFormat.tempSocial) == -1) {
            // counterSocial++;
            $(".sosial-profile-url").append(
                eval("socialData." + $(this).val()[i] + "(" + i + ")")
            );
            localBusinessFormat.tempSocial.push($(this).val()[i]);

            if (
                eval("localBusinessFormat." + $(this).val()[i] + "Val" + "") !=
                ""
            ) {
                localBusinessFormat.sameAs.push(
                    eval("localBusinessFormat." + $(this).val()[i] + "Val")
                );
            } else {
                localBusinessFormat.sameAs.push("");
            }
        }
    }

    localBusinessFormat.render();
});

$(document).on("keyup", ".sosmedName", function () {
    let index = parseInt($(this).data("id"));
    let sosmedData = $(this).attr("data-sosmed");
    let sosmedId = $(this).attr("data-id");

    if (sosmedData == "facebook") {
        localBusinessFormat.facebookVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "twitter") {
        localBusinessFormat.twitterVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "linkedin") {
        localBusinessFormat.linkedinVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "wikipedia") {
        localBusinessFormat.wikipediaVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "website") {
        localBusinessFormat.websiteVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "pinterest") {
        localBusinessFormat.pinterestVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "github") {
        localBusinessFormat.githubVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "tumblr") {
        localBusinessFormat.tumblrVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "soundcloud") {
        localBusinessFormat.soundcloudVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "instagram") {
        localBusinessFormat.instagramVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    } else if (sosmedData == "youtube") {
        localBusinessFormat.youtubeVal = $(this).val();
        validateSosmed($(this).val(), sosmedData, sosmedId);
    }

    // console.log(index)
    localBusinessFormat.sameAs[index] = $(this).val();
    localBusinessFormat.temp();
    localBusinessFormat.render();
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
    $(".localBusinessType").selectpicker("val", "none");
    $(".localBusinessType").selectpicker("refresh");
    $(".spesificType").attr("disabled", true);
    $(".spesificType").selectpicker("refresh");
    $(".imageBusiness").removeClass("is-invalid");
    $(".idUrl").removeClass("is-invalid");
    $(".url").removeClass("is-invalid");
    $(".phone").removeClass("is-invalid");
    $(".menu-url").removeClass("is-invalid");
    $(".country").selectpicker("val", "none");
    $(".country").selectpicker("refresh");
    $(".region").attr("disabled", true);
    $(".region").selectpicker("val", "none");
    $(".region").selectpicker("refresh");
    $(".dayWeek").selectpicker("val", "none");
    $(".dayWeek").selectpicker("refresh");
    $("#form-hours").hide();

    $(".social-profiles").val(1);
    $(".social-profiles").change();
    $(".sosial-profile-url").html("");
    
    $(".invalid-feedback").hide();
    $("#foodEstablishment").addClass("d-none");
    $("#form-localBusiness").trigger("reset");
    localBusinessFormat.resetrender();
});
