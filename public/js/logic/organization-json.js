// Declar Social Profile Local Business
var counterSocial = 0;
var counterContact = -1;

let invalid_url = lang === "en" ? "Invalid URL" : "URL Tidak Valid";
let invalid_phone = lang === "en" ? "Invalid Number Phone" : "Nomor Telepon Tidak Valid";
let placeholder_type = lang === "en" ? "Type your" : "Ketik URL";
let placeholder_url = lang === "en" ? "URL here.." : "Anda di sini..";
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
const organizationSchema = class {
    constructor() {
        this.type = "Organization";
        this.name = "";
        this.alternateName = undefined;
        this.url = "";
        this.logo = "";
        this.contactPoint = [];
        
        // temp
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

        if (this.contactPoint) {
            if (this.contactPoint.length > 0) {
                if (this.contactPoint.length === 1) {
                    obj.contactPoint = this.contactPoint[0];
                } else {
                    obj.contactPoint = this.contactPoint;
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

        if (this.contactPoint) {
            if (this.contactPoint.length > 0) {
                if (this.contactPoint.length === 1) {
                    obj.contactPoint = this.contactPoint[0];
                } else {
                    obj.contactPoint = this.contactPoint;
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

let organizationFormat = new organizationSchema();

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

function updateJson_typeContact(id, value){
    organizationFormat.contactPoint[id].contactType = value;
    organizationFormat.render();
}

function updateJSON_phone(id, value) {
    if (value.match(regexPhone)) {
        organizationFormat.contactPoint[id].telephone = value;
        $(".phone[data-id="+ id +"]").removeClass("is-invalid");
        $(".invalid-feedback.phone[data-id=" + id + "]").hide();
    } else {
        organizationFormat.contactPoint[id].telephone = value;
        $(".phone[data-id="+ id +"]").addClass("is-invalid");
        $(".invalid-feedback.phone[data-id=" + id + "]").show();
    }

    organizationFormat.render();
}

function updateJson_areaServed(id, value){
    if(value.length > 1){
        organizationFormat.contactPoint[id].areaServed = value;
    }else if (value.length == 1) {
        organizationFormat.contactPoint[id].areaServed = "" + value + "";
    } else {
        organizationFormat.contactPoint[id].areaServed = undefined;
    }

    organizationFormat.render();
}

function updateJson_language(id, value) {
    if (value.length > 1) {
        organizationFormat.contactPoint[id].availableLanguage = value;
    } else if (value.length == 1) {
        organizationFormat.contactPoint[id].availableLanguage = "" + value + "";
    } else {
        organizationFormat.contactPoint[id].availableLanguage = undefined;
    }

    organizationFormat.render();
}

function updateJson_options(id, value){
    if (value.length > 1) {
        organizationFormat.contactPoint[id].contactOption = value;
    } else if (value.length == 1) {
        organizationFormat.contactPoint[id].contactOption = "" + value + "";
    } else {
        organizationFormat.contactPoint[id].contactOption = undefined;
    }
    
    organizationFormat.render();
}

function deleteContact(id) {
    organizationFormat.contactPoint.splice(id, 1);
    organizationFormat.render();

    for (let i = id + 1; i < organizationFormat.contactPoint.length + 1; i++) {
        $(".contact-list[data-id=" + (i - 1) + "]").val($(".contact-list[data-id=" + i + "]").val());
        $("#typeContact-" + (i - 1) + "").val($("#typeContact-" + i + "").val());
        $("#typeContact-" + (i - 1) + "").selectpicker("refresh");

        $("#area-served-" + (i - 1) + "").val($("#area-served-" + i + "").val());
        $("#area-served-" + (i - 1) + "").selectpicker("refresh");

        $("#language-" + (i - 1) + "").val($("#language-" + i + "").val());
        $("#language-" + (i - 1) + "").selectpicker("refresh");

        $("#options-" + (i - 1) + "").val($("#options-" + i + "").val());
        $("#options-" + (i - 1) + "").selectpicker("refresh");

        $(".phone[data-id=" + (i - 1) + "]").val($(".phone[data-id=" + i + "]").val());
    }

    $(".contact-list[data-id=" + organizationFormat.contactPoint.length + "]").remove();
    $("hr[data-id=" + organizationFormat.contactPoint.length + "]").remove();
    counterContact--;
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
        '<div class="row py-3 contact-list" data-id="'+ counterContact +'"><div class="col-sm-6 mb-5"><label class="text-black font-weight-bold" for="typeContact">' +
            label_type_contact +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="typeContact-' +
            counterContact +
            '" class="form-control selectpicker custom-select-blue typeContact mb-5 custom-searchbox" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            counterContact +
            '"><option value="none">' +
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
            '" value="" data-id="' +
            counterContact +
            '"><div class="invalid-feedback phone" data-id="' +
            counterContact +
            '">' +
            invalid_phone +
            '</div></div><div class="col-sm-1 mb-5 align-self-center mt-md-0 mb-md-0"><div class="d-flex justify-content-end mb-md-3"><i class="bx bxs-x-circle bx-md delete deleteContact" data-id="' +
            counterContact +
            '"></i></div></div></div><div class="row contact-list" data-id="'+ counterContact +'"><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="area-served">' +
            label_area_served +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="area-served-' +
            counterContact +
            '" class="form-control selectpicker custom-select-blue area-served mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            counterContact +
            '"></select></div></div><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="language">' +
            label_language +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="language-' +
            counterContact +
            '" class="form-control selectpicker custom-select-blue language mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            counterContact +
            '"></select></div></div><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="options">' +
            label_options +
            '</label><div class="dropdown bootstrap-select show-tick form-control"><select id="options-'+ counterContact +'" class="form-control selectpicker custom-select-blue options mb-5 custom-searchbox" multiple="multiple" data-actions-box="false" data-size="4" data-live-search="true" tabindex="null" data-id="' +
            counterContact +
            '"><option value="TollFree">' +
            opt_options_1 +
            '</option><option value="HearingImpairedSupported">' +
            opt_options_2 +
            '</option></select></div></div></div><hr data-id="'+ counterContact +'">'
    );
    
    // area served
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

    // language
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

    organizationFormat.contactPoint.push({
        "@type": "ContactPoint",
        telephone: "",
        contactType: "",
        contactOption: "",
        areaServed: "",
        availableLanguage: "",
    });
    organizationFormat.render();

    $("#typeContact-"+ counterContact +"").selectpicker("refresh");
    $("#area-served-"+ counterContact +"").selectpicker("refresh");
    $("#language-"+ counterContact +"").selectpicker("refresh");
    $("#options-" + counterContact + "").selectpicker("refresh");
});

$(document).on("change", ".typeContact", function () {
    updateJson_typeContact(
        $(this).data("id"),
        $(this).val()
    );
});

$(document).on("keyup", ".phone", function () {
    updateJSON_phone(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".area-served", function () {
    updateJson_areaServed($(this).data("id"), $(this).val());
});

$(document).on("change", ".language", function () {
    updateJson_language($(this).data("id"), $(this).val());
});

$(document).on("change", ".options", function () {
    updateJson_options($(this).data("id"), $(this).val());
});

$(document).on("click", ".deleteContact", function () {
    deleteContact(parseInt($(this).data("id")));
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
    
    
    $(".typeContact").selectpicker("val", "none");
    $(".typeContact").selectpicker("refresh");
    $(".phone").removeClass("is-invalid");
    $(".area-served").selectpicker("val", "none");
    $(".area-served").selectpicker("refresh");
    $(".language").selectpicker("val", "none");
    $(".language").selectpicker("refresh");
    $(".options").selectpicker("val", "none");
    $(".options").selectpicker("refresh");
});

$("#form-contact").hide();
