var ticketCounter = -1;

let invalid_url = lang === "en" ? "Invalid URL" : "URL Tidak Valid";
let label_ticket = lang === "en" ? "Ticket Name/Category" : "Nama/Kategori Tiket";
let placeholder_ticket = lang === "en" ? "Type your ticket name/category here.." : "Ketik nama/kategori tiket di sini..";
let label_price = lang === "en" ? "Price" : "Harga";
let placeholder_price = lang === "en" ? "Type your ticket price here.." : "Masukkan harga tiket di sini..";
let label_available = lang === "en" ? "Available From" : "Tersedia mulai";
let placeholder_available = lang === "en" ? "Pick a Date" : "Pilih tanggal";
let label_url_ticket = lang === "en" ? "Ticket URL" : "URL Tiket";
let placeholder_url_ticket = lang === "en" ? "Type your URL ticket here.." : "Masukkan URL tiket di sini..";
let label_availability = lang === "en" ? "Availability" : "Ketersediaan";
let availability_0 = lang === "en" ? "Not Specified" : "Tidak Ditentukan";
let availability_1 = lang === "en" ? "In Stock" : "Tersedia";
let availability_2 = lang === "en" ? "Sold Out" : "Terjual Habis";
let availability_3 = lang === "en" ? "Pre-order" : "Pre-order";

const eventSchema = class {
    constructor() {
        this.name = "";
        this.description = undefined;
        this.image = undefined;
        this.startDate = "";
        this.startTime = undefined;
        this.endDate = undefined;
        this.endTime = undefined;
        this.eventStatus = undefined;
        this.eventAttendanceMode = undefined;
        this.location = undefined;
        this.performer = undefined;
        this.offers = [];

        // Temp
        this.tempstartDate = "";
        this.tempendDate = "";
        this.tempAttendanceMode = "";
        this.tempStreamUrl = "";
        this.tempVanue = "";
        this.tempStreet = "";
        this.tempCity = "";
        this.tempCountry = "";
        this.tempRegion = "";
        this.tempZip = "";
        this.tempPerformerName = "";
        this.tempCurrency = "";
    }

    resetrender() {
        ticketCounter = -1;

        this.name = "";
        this.description = undefined;
        this.image = undefined;
        this.startDate = "";
        this.startTime = undefined;
        this.endDate = undefined;
        this.endTime = undefined;
        this.eventStatus = undefined;
        this.eventAttendanceMode = undefined;
        this.location = undefined;
        this.performer = undefined;
        this.offers = [];

        // Temp
        this.tempstartDate = "";
        this.tempendDate = "";
        this.tempAttendanceMode = "";
        this.tempStreamUrl = "";
        this.tempVanue = "";
        this.tempStreet = "";
        this.tempCity = "";
        this.tempCountry = "";
        this.tempRegion = "";
        this.tempZip = "";
        this.tempPerformerName = "";
        this.tempCurrency = "";

        const obj = {
            "@context": "https://schema.org",
            "@type": "Event",
            name: this.name,
            description: this.description,
            image: this.image,
            startDate: this.startDate,
        };

        obj.name = this.name;
        if (this.description) obj.description = this.description;
        if (this.image) obj.image = this.image;
        obj.startDate = this.startDate;
        if (this.endDate) obj.endDate = this.endDate;
        if (this.eventStatus) obj.eventStatus = this.eventStatus;
        if (this.eventAttendanceMode)
            obj.eventAttendanceMode = this.eventAttendanceMode;
        if (this.location) obj.location = this.location;
        if (this.performer) obj.performer = this.performer;
        if (this.offers) {
            if (this.offers.length > 0) {
                if (this.offers.length === 1) {
                    obj.offers = this.offers[0];
                } else {
                    obj.offers = this.offers;
                }
            }
        }

        $("#json-format").val(
            '<script type="application/ld+json">\n' +
                JSON.stringify(obj, undefined, 4) +
                "\n</script>"
        );

        return obj;
    }

    temp() {
        const tempObj = {};

        tempObj.tempstartDate = this.tempstartDate;
        tempObj.tempendDate = this.tempendDate;
        tempObj.tempAttendanceMode = this.tempAttendanceMode;
        tempObj.tempStreamUrl = this.tempStreamUrl;
        tempObj.tempVanue = this.tempVanue;
        tempObj.tempStreet = this.tempStreet;
        tempObj.tempCity = this.tempCity;
        tempObj.tempCountry = this.tempCountry;
        tempObj.tempRegion = this.tempRegion;
        tempObj.tempZip = this.tempZip;
        tempObj.tempPerformerName = this.tempPerformerName;
        tempObj.tempCurrency = this.tempCurrency;

        return tempObj;
    }

    render() {
        const obj = {
            "@context": "https://schema.org",
            "@type": "Event",
            name: this.name,
            description: this.description,
            image: this.image,
            startDate: this.startDate,
        };

        obj.name = this.name;
        if (this.description) obj.description = this.description;
        if (this.image) obj.image = this.image;
        obj.startDate = this.startDate;
        if (this.endDate) obj.endDate = this.endDate;
        if (this.eventStatus) obj.eventStatus = this.eventStatus;
        if (this.eventAttendanceMode)
            obj.eventAttendanceMode = this.eventAttendanceMode;
        if (this.location) obj.location = this.location;
        if (this.performer) obj.performer = this.performer;
        if (this.offers) {
            if (this.offers.length > 0) {
                if (this.offers.length === 1) {
                    obj.offers = this.offers[0];
                } else {
                    obj.offers = this.offers;
                }
            }
        }

        $("#json-format").val(
            '<script type="application/ld+json">\n' +
                JSON.stringify(obj, undefined, 4) +
                "\n</script>"
        );

        return obj;
    }
};

let eventFormat = new eventSchema();
eventFormat.render();

/*
 * Adding regex url
 * */
var expression =
    /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

// * Adding regex hours
var expressionHours = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
var regexHours = new RegExp(expressionHours);

// All Function
function updateJSON_name(value) {
    eventFormat.name = value;
    eventFormat.render();
}

function updateJSON_descriptionVideo(value) {
    if (value) {
        eventFormat.description = value;
        eventFormat.render();
    } else {
        eventFormat.description = undefined;
        eventFormat.render();
    }
}

function updateJSON_imageUrl(id, value) {
    if (value) {
        if (value.match(regex)) {
            $(".imageUrl[data-id=" + id + "]").removeClass("is-invalid");
            $(".invalid-feedback.imageUrl[data-id=" + id + "]").hide();
        } else {
            $(".imageUrl[data-id=" + id + "]").addClass("is-invalid");
            $(".invalid-feedback.imageUrl[data-id=" + id + "]").show();
        }

        eventFormat.image = value;
        eventFormat.render();
    } else {
        eventFormat.image = undefined;
        eventFormat.render();
    }
}

function updateJSON_startDate(value) {
    var dateAr = value.split("/");
    var newDate = dateAr[2] + "-" + dateAr[1] + "-" + dateAr[0];

    eventFormat.startDate = newDate;
    eventFormat.tempstartDate = newDate;

    eventFormat.temp();
    eventFormat.render();

    if (eventFormat.tempstartDate) {
        $(".startTime").removeAttr("disabled");
    }
}

function updateJSON_startTime(id, value) {
    if (eventFormat.tempstartDate && value) {
        var dateAr = eventFormat.tempstartDate;
        var newDate = dateAr + "T" + value;

        if (value.match(regexHours)) {
            $(".startTime[data-id=" + id + "]").removeClass("is-invalid");
            $(".invalid-feedback.startTime[data-id=" + id + "]").hide();
        } else {
            $(".startTime[data-id=" + id + "]").addClass("is-invalid");
            $(".invalid-feedback.startTime[data-id=" + id + "]").show();
        }

        eventFormat.startDate = newDate;
        eventFormat.render();
    } else {
        eventFormat.startDate = eventFormat.tempstartDate;
        eventFormat.render();
    }
}

function updateJSON_endDate(value) {
    var dateAr = value.split("/");
    var newDate = dateAr[2] + "-" + dateAr[1] + "-" + dateAr[0];

    eventFormat.endDate = newDate;
    eventFormat.tempendDate = newDate;

    eventFormat.temp();
    eventFormat.render();

    if (eventFormat.tempendDate) {
        $(".endTime").removeAttr("disabled");
    }
}

function updateJSON_endTime(id, value) {
    if (eventFormat.tempendDate && value) {
        var dateAr = eventFormat.tempendDate;
        var newDate = dateAr + "T" + value;

        if (value.match(regexHours)) {
            $(".endTime[data-id=" + id + "]").removeClass("is-invalid");
            $(".invalid-feedback.endTime[data-id=" + id + "]").hide();
        } else {
            $(".endTime[data-id=" + id + "]").addClass("is-invalid");
            $(".invalid-feedback.endTime[data-id=" + id + "]").show();
        }

        eventFormat.endDate = newDate;
        eventFormat.render();
    } else {
        eventFormat.endDate = eventFormat.tempendDate;
        eventFormat.render();
    }
}

function updateJSON_eventStatus(value) {
    if (value) {
        var eStatus = "https://schema.org/" + value;

        eventFormat.eventStatus = eStatus;

        if (value == "none") {
            eventFormat.eventStatus = undefined;
        }
    }

    eventFormat.render();
}

function updateJSON_attendanceMode(value) {
    if (value) {
        var eAttedanceMode = "https://schema.org/" + value;
        eventFormat.eventAttendanceMode = eAttedanceMode;
        eventFormat.tempAttendanceMode = value;

        if (value == "OnlineEventAttendanceMode") {
            $("#onlineAttendance").show();
            $("#offlineAttendance").hide();

            // Location Online
            eventFormat.location = {
                "@type": "VirtualLocation",
                url: eventFormat.tempStreamUrl,
            };
        } else if (value == "OfflineEventAttendanceMode") {
            $("#onlineAttendance").hide();
            $("#offlineAttendance").show();

            // Location Offline
            if (eventFormat.tempRegion) {
                eventFormat.location = {
                    "@type": "Place",
                    name: eventFormat.tempVanue,
                    address: {
                        "@type": "PostalAddress",
                        streetAddress: eventFormat.tempStreet,
                        addressLocality: eventFormat.tempCity,
                        addressRegion: eventFormat.tempRegion,
                        postalCode: eventFormat.tempZip,
                        addressCountry: eventFormat.tempCountry,
                    },
                };
            } else {
                eventFormat.location = {
                    "@type": "Place",
                    name: eventFormat.tempVanue,
                    address: {
                        "@type": "PostalAddress",
                        streetAddress: eventFormat.tempStreet,
                        addressLocality: eventFormat.tempCity,
                        postalCode: eventFormat.tempZip,
                        addressCountry: eventFormat.tempCountry,
                    },
                };
            }
        } else if (value == "MixedEventAttendanceMode") {
            $("#onlineAttendance").show();
            $("#offlineAttendance").show();

            // Location Mixed
            if (eventFormat.tempRegion) {
                eventFormat.location = [
                    {
                        "@type": "VirtualLocation",
                        url: eventFormat.tempStreamUrl,
                    },
                    {
                        "@type": "Place",
                        name: eventFormat.tempVanue,
                        address: {
                            "@type": "PostalAddress",
                            streetAddress: eventFormat.tempStreet,
                            addressLocality: eventFormat.tempCity,
                            addressRegion: eventFormat.tempRegion,
                            postalCode: eventFormat.tempZip,
                            addressCountry: eventFormat.tempCountry,
                        },
                    },
                ];
            } else {
                eventFormat.location = [
                    {
                        "@type": "VirtualLocation",
                        url: eventFormat.tempStreamUrl,
                    },
                    {
                        "@type": "Place",
                        name: eventFormat.tempVanue,
                        address: {
                            "@type": "PostalAddress",
                            streetAddress: eventFormat.tempStreet,
                            addressLocality: eventFormat.tempCity,
                            postalCode: eventFormat.tempZip,
                            addressCountry: eventFormat.tempCountry,
                        },
                    },
                ];
            }
        } else if (value == "none") {
            $("#onlineAttendance").hide();
            $("#offlineAttendance").hide();

            eventFormat.eventAttendanceMode = undefined;
            eventFormat.location = undefined;
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_streamUrl(id, value) {
    if (value) {
        if (value.match(regex)) {
            $(".streamUrl[data-id=" + id + "]").removeClass("is-invalid");
            $(".invalid-feedback.streamUrl[data-id=" + id + "]").hide();
        } else {
            $(".streamUrl[data-id=" + id + "]").addClass("is-invalid");
            $(".invalid-feedback.streamUrl[data-id=" + id + "]").show();
        }

        eventFormat.tempStreamUrl = value;

        if (eventFormat.tempAttendanceMode == "OnlineEventAttendanceMode") {
            eventFormat.location.url = eventFormat.tempStreamUrl;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[0].url = eventFormat.tempStreamUrl;
        }
    } else {
        eventFormat.tempStreamUrl = "";

        if (eventFormat.tempAttendanceMode == "OnlineEventAttendanceMode") {
            eventFormat.location.url = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[0].url = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_vanue(value) {
    if (value) {
        eventFormat.tempVanue = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.name = eventFormat.tempVanue;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].name = eventFormat.tempVanue;
        }
    } else {
        eventFormat.tempVanue = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.name = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].name = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_street(value) {
    if (value) {
        eventFormat.tempStreet = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.streetAddress = eventFormat.tempStreet;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.streetAddress =
                eventFormat.tempStreet;
        }
    } else {
        eventFormat.tempStreet = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.streetAddress = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.streetAddress = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_city(value) {
    if (value) {
        eventFormat.tempCity = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressLocality = eventFormat.tempCity;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressLocality =
                eventFormat.tempCity;
        }
    } else {
        eventFormat.tempCity = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressLocality = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressLocality = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_country(value) {
    if (value) {
        eventFormat.tempCountry = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressCountry =
                eventFormat.tempCountry;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressCountry =
                eventFormat.tempCountry;
        }

        if (value == "ID") {
            $(".region").removeAttr("disabled");
            $(".region").selectpicker("refresh");
        } else {
            $(".region").val("none");
            $(".region").attr("disabled", true);
            $(".region").selectpicker("refresh");

            eventFormat.tempRegion = "";
            if (
                eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode"
            ) {
                eventFormat.location.address.addressRegion = undefined;
            } else if (
                eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
            ) {
                eventFormat.location[1].address.addressRegion = undefined;
            }
        }

        if (eventFormat.tempCountry == "none") {
            eventFormat.tempCountry = "";
            if (
                eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode"
            ) {
                eventFormat.location.address.addressCountry = "";
            } else if (
                eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
            ) {
                eventFormat.location[1].address.addressCountry = "";
            }
        }
    } else {
        eventFormat.tempCountry = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressCountry = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressCountry = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_region(value) {
    if (value) {
        eventFormat.tempRegion = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressRegion = eventFormat.tempRegion;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressRegion =
                eventFormat.tempRegion;
        }
    } else {
        eventFormat.tempRegion = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.addressRegion = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.addressRegion = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_zip(value) {
    if (value) {
        eventFormat.tempZip = value;

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.postalCode = eventFormat.tempZip;
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.postalCode = eventFormat.tempZip;
        }
    } else {
        eventFormat.tempZip = "";

        if (eventFormat.tempAttendanceMode == "OfflineEventAttendanceMode") {
            eventFormat.location.address.postalCode = "";
        } else if (
            eventFormat.tempAttendanceMode == "MixedEventAttendanceMode"
        ) {
            eventFormat.location[1].address.postalCode = "";
        }
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_performerType(value) {
    if (value) {
        eventFormat.performer = {
            "@type": value,
            name: eventFormat.tempPerformerName,
        };
        $(".performerName").removeAttr("disabled");

        if (value == "none") {
            eventFormat.tempPerformerName = "";
            eventFormat.performer = undefined;
            $(".performerName").attr("disabled", true);
            $(".performerName").val("");
        }
    }

    eventFormat.render();
}

function updateJSON_performerName(value) {
    if (value) {
        eventFormat.tempPerformerName = value;
        eventFormat.performer.name = eventFormat.tempPerformerName;
    } else {
        eventFormat.tempPerformerName = "";
        eventFormat.performer.name = "";
    }

    eventFormat.temp();
    eventFormat.render();
}

function updateJSON_currency(value){
    if (value == "none"){
        $("#add-ticket").attr("disabled", true);
        eventFormat.tempCurrency = "";
    }else{
        $("#add-ticket").removeAttr("disabled");
        eventFormat.tempCurrency = value;
    }

    eventFormat.temp();

    // Change currency belom
    for (let i = 0; i < eventFormat.offers.length; i++) {
        eventFormat.offers[i].priceCurrency = eventFormat.tempCurrency;
    }
    eventFormat.render();
}

// Ticket
function deleteTicket(id){
    eventFormat.offers.splice(id, 1);
    eventFormat.render();

    // Loop
    for (let i = id + 1; i < eventFormat.offers.length + 1; i++) {
        $(".ticket-list[data-id=" + (i - 1) + "]").val($(".ticket-list[data-id=" + i + "]").val());
        $(".nameTicket[data-id=" + (i - 1) + "]").val($(".nameTicket[data-id=" + i + "]").val());
        $(".priceTicket[data-id=" + (i - 1) + "]").val($(".priceTicket[data-id=" + i + "]").val());
        $(".ticketUrl[data-id=" + (i - 1) + "]").val($(".ticketUrl[data-id=" + i + "]").val());
        $(".invalid-feedback.ticketUrl[data-id=" + (i - 1) + "]").val($(".invalid-feedback.ticketUrl[data-id=" + i + "]").val());
        $(".availableTicket[data-id=" + (i - 1) + "]").val($(".availableTicket[data-id=" + i + "]").val());
        $(".availableTicket[data-id=" + (i - 1) + "]").datepicker();
        $(".availability[data-id=" + (i - 1) + "]").val($(".availability[data-id=" + i + "]").val());
        $(".availability[data-id=" + (i - 1) + "]").selectpicker("refresh");
    }
    
    $(".ticket-list[data-id=" + eventFormat.offers.length + "]").remove();
    $(".space-hr[data-id=" + eventFormat.offers.length + "]").remove();
    ticketCounter--;
}

function updateJSON_nameTicket(id, value){
    eventFormat.offers[id].name = value;
    eventFormat.render();
}

function updateJSON_priceTicket(id, value) {
    eventFormat.offers[id].price = value;
    eventFormat.render();
}

function updateJSON_availableTicket(id, value) {
    var dateAr = value.split("/");
    var newDate = dateAr[2] + "-" + dateAr[1] + "-" + dateAr[0];

    eventFormat.offers[id].validFrom = newDate;
    eventFormat.render();
}

function updateJSON_ticketUrl(id, value){
    if (value) {
        if (value.match(regex)) {
            $(".ticketUrl[data-id=" + id + "]").removeClass("is-invalid");
            $(".invalid-feedback.ticketUrl[data-id=" + id + "]").hide();
        } else {
            $(".ticketUrl[data-id=" + id + "]").addClass("is-invalid");
            $(".invalid-feedback.ticketUrl[data-id=" + id + "]").show();
        }
    }

    eventFormat.offers[id].url = value;
    eventFormat.render();
}

function updateJSON_availability(id, value){
    if (value) {
        var eAvailability = "https://schema.org/" + value;
        eventFormat.offers[id].availability = eAvailability;

        if(value == "none"){
            eventFormat.offers[id].availability = "";
        }
    }

    eventFormat.render();
}

// Interaction
$(document).on("keyup", ".nameEvent", function () {
    updateJSON_name($(this).val());
});

$(document).on("keyup", ".descriptionVideo", function () {
    updateJSON_descriptionVideo($(this).val());
});

$(document).on("keyup", ".imageUrl", function () {
    updateJSON_imageUrl(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".startDate", function () {
    updateJSON_startDate($(this).val());
});

$(document).on("keyup", ".startTime", function () {
    updateJSON_startTime(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".endDate", function () {
    updateJSON_endDate($(this).val());
});

$(document).on("keyup", ".endTime", function () {
    updateJSON_endTime(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".eventStatus", function () {
    updateJSON_eventStatus($(this).val());
});

$(document).on("change", ".attendanceMode", function () {
    updateJSON_attendanceMode($(this).val());
});

$(document).on("keyup", ".streamUrl", function () {
    updateJSON_streamUrl(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".vanue", function () {
    updateJSON_vanue($(this).val());
});

$(document).on("keyup", ".street", function () {
    updateJSON_street($(this).val());
});

$(document).on("keyup", ".city", function () {
    updateJSON_city($(this).val());
});

$(document).on("change", "#country", function () {
    updateJSON_country($(this).val());
});

$(document).on("change", "#region", function () {
    updateJSON_region($(this).val());
});

$(document).on("keyup", ".zip", function () {
    updateJSON_zip($(this).val());
});

$(document).on("change", ".performerType", function () {
    updateJSON_performerType($(this).val());
});

$(document).on("keyup", ".performerName", function () {
    updateJSON_performerName($(this).val());
});

$(document).on("change", "#currency", function () {
    updateJSON_currency($(this).val());
});

// Ticket
$(document).on("click", "#add-ticket", function () {
    $("#ticket-offers").show();
    ticketCounter++;

    $("#ticket-offers").append(
        '<div class="row ticket-list" data-id="' +
            ticketCounter +
            '"><div class="col-12 col-sm-12 py-3"><div class="row"><div class="col-sm-6 mb-5"><label class="text-black font-weight-bold" for="nameTicket">' +
            label_ticket +
            '</label><input type="text" name="" class="form-control nameTicket mb-5" placeholder="' +
            placeholder_ticket +
            '" value="" data-id="'+ ticketCounter +'"></div><div class="col-sm-5 mb-5"><label class="text-black font-weight-bold" for="priceTicket">' +
            label_price +
            '</label><input type="text" name="" class="form-control priceTicket mb-5" placeholder="' +
            placeholder_price +
            '" value="" data-id="'+ ticketCounter +'"></div><div class="col-sm-1 mb-5 align-self-center mt-md-0 mb-md-0"><div class="d-flex justify-content-end mb-md-3"><i class="bx bxs-x-circle bx-md delete deleteTicket" data-id="' +
            ticketCounter +
            '"></i></div></div></div></div><div class="col-12 col-sm-12"><div class="row"><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="availableTicket">' +
            label_available +
            '</label><div class="input-group date"><div class="input-group-append"><span class="input-group-text"><i class="bx bx-calendar text-darkgrey"></i></span></div><input type="text" id="kt_datepicker_2" name="" class="form-control custom-date availableTicket" readonly placeholder="' +
            placeholder_available +
            '" value="" / data-id="'+ ticketCounter +'"></div></div><div class="col-sm-4 mb-5"><label for="ticketUrl" class="font-weight-bold text-black">' +
            label_url_ticket +
            '</label><input type="text" class="form-control ticketUrl" name="" placeholder="' +
            placeholder_url_ticket +
            '" value="" data-id="' +
            ticketCounter +
            '"><div class="invalid-feedback url-ticket" data-id="' +
            ticketCounter +
            '">' +
            invalid_url +
            '</div></div><div class="col-sm-4 mb-5"><label class="text-black font-weight-bold" for="availability">' +
            label_availability +
            '</label><select class="form-control selectpicker custom-select-blue availability" data-id="'+ ticketCounter +'"><option value="InStock">' +
            availability_1 +
            '</option><option value="SoldOut">' +
            availability_2 +
            '</option><option value="PreOrder">' +
            availability_3 +
            '</option><option selected="selected" value="none">' +
            availability_0 +
            '</option></select></div></div><hr class="space-hr" data-id="' +
            ticketCounter +
            '"></div></div>'
    );

    eventFormat.offers.push({
        "@type": "Offer",
        name: "",
        price: "",
        priceCurrency: eventFormat.tempCurrency,
        validFrom: "",
        url: "",
        availability: "",
    });
    eventFormat.render();

    $(".availability").selectpicker("refresh");
    $(".availableTicket").datepicker();
});

$(document).on("click", ".deleteTicket", function () {
    deleteTicket(parseInt($(this).data("id")));
});

$(document).on("keyup", ".nameTicket", function () {
    updateJSON_nameTicket(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".priceTicket", function () {
    updateJSON_priceTicket(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".availableTicket", function () {
    updateJSON_availableTicket(parseInt($(this).data("id")), $(this).val());
});

$(document).on("keyup", ".ticketUrl", function () {
    updateJSON_ticketUrl(parseInt($(this).data("id")), $(this).val());
});

$(document).on("change", ".availability", function () {
    updateJSON_availability(parseInt($(this).data("id")), $(this).val());
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
    $(".imageUrl").removeClass("is-invalid");
    $(".startDate").datepicker("setDate", null);
    $(".startTime").removeClass("is-invalid");
    $(".endDate").datepicker("setDate", null);
    $(".endTime").removeClass("is-invalid");
    $(".eventStatus").selectpicker("val", "none");
    $(".eventStatus").selectpicker("refresh");
    $(".attendanceMode").selectpicker("val", "none");
    $(".attendanceMode").selectpicker("refresh");
    // online
    $(".streamUrl").removeClass("is-invalid");
    $(".timeZone").selectpicker("val", "none");
    $(".timeZone").selectpicker("refresh");
    // offline
    $(".country").selectpicker("val", "none");
    $(".country").selectpicker("refresh");
    $(".region").attr("disabled", true);
    $(".region").selectpicker("val", "none");
    $(".region").selectpicker("refresh");
    // Mix
    $("#onlineAttendance").hide();
    $("#offlineAttendance").hide();

    $(".performerType").selectpicker("val", "none");
    $(".performerType").selectpicker("refresh");
    $(".performerName").attr("disabled", true);
    // Ticket
    $("#add-ticket").attr("disabled", true);
    $("#currency").selectpicker("val", "none");
    $("#currency").selectpicker("refresh");
    $(".availableTicket").datepicker("setDate", null);
    $(".streamUrl").removeClass("is-invalid");
    $(".availability").selectpicker("val", "none");
    $(".availability").selectpicker("refresh");
    $("#ticket-offers").html("");
    $("#ticket-offers").hide();

    $(".invalid-feedback").hide();
    $("#form-event").trigger("reset");
    eventFormat.resetrender();
});
