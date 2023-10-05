// Variable General Meta Generator
const metaGenerator = class {
    constructor() {
        this.charSet = "UTF-8";
        this.title = "";
        this.siteName = "";
        this.url = "";
        this.description = "";
        this.imageUrl = "";
        this.revisit = "";
        this.author = "";
        this.robotsIndex = "index";
        this.robotsFollow = "follow";
        this.typeOpengraph = "website";
        this.typeTwitter = "summary_large_image";
        this.country = "";
        // temp
    }

    resetrender() {
        this.charSet = "UTF-8";
        this.title = "";
        this.siteName = "";
        this.url = "";
        this.description = "";
        this.imageUrl = "";
        this.revisit = "";
        this.author = "";
        this.robotsIndex = "index";
        this.robotsFollow = "follow";
        this.typeOpengraph = "website";
        this.typeTwitter = "summary_large_image";
        this.country = "";
        // temp

        const resetObj = {
        };

        resetObj.charSet = '<meta charSet="'+ this.charSet +'"/>';
        resetObj.title = "<title>" + this.title + "</title>";
        resetObj.description = '<meta name="description" content="' + this.description + '"/>';
        resetObj.robots = '<meta name="robots" content="' + this.robotsIndex + ','+ this.robotsFollow +'"/>';
        resetObj.language = '<meta name="language" content="' + this.country + '"/>';
        resetObj.revisit = '<meta name="revisit-after" content="' + this.revisit + '"/>';
        resetObj.author = '<meta name="author" content="' + this.author + '"/>';

        // Opengraph
        resetObj.url = '<meta property="og:url" content="'+ this.url +'">';
        resetObj.opengraphTitle = '<meta property="og:title" content="' + this.title + '"/>';
        resetObj.opengraphDescription = '<meta property="og:description" content="' + this.description + '"/>';
        resetObj.siteName = '<meta property="og:site_name" content="'+ this.siteName +'">';
        resetObj.type = '<meta property="og:type" content="'+ this.typeOpengraph +'">';
        resetObj.image = '<meta property="og:image" content="'+ this.imageUrl +'">';

        // Opengraph Twitter
        resetObj.opengraphTwitterCard = '<meta name="twitter:card" content="'+ this.typeTwitter +'"/>';
        resetObj.opengraphTwitterDomain = '<meta property="twitter:domain" content="/"/>';
        resetObj.opengraphTwitterUrl = '<meta property="twitter:url" content="' + this.url + '"/>';
        resetObj.opengraphTwitterTitle = '<meta name="twitter:title" content="' + this.title + '"/>';
        resetObj.opengraphTwitterDescription = '<meta name="twitter:description" content="' + this.description + '"/>';
        resetObj.opengraphTwitterImage = '<meta name="twitter:image" content="'+ this.imageUrl +'">';

        $("#json-format").val(
            "<!-- Meta Here -->" +
                "\n" +
                resetObj.charSet +
                "\n" +
                resetObj.title +
                "\n" +
                resetObj.description +
                "\n" +
                resetObj.robots +
                "\n" +
                resetObj.language +
                "\n" +
                resetObj.revisit +
                "\n" +
                resetObj.author +
                "\n" +
                "\n" +
                "<!-- Opengraph Here -->" +
                "\n" +
                resetObj.url +
                "\n" +
                resetObj.opengraphTitle +
                "\n" +
                resetObj.opengraphDescription +
                "\n" +
                resetObj.siteName +
                "\n" +
                resetObj.type +
                "\n" +
                resetObj.image +
                "\n" +
                "\n" +
                "<!-- Twitter Opengraph Here -->" +
                "\n" +
                resetObj.opengraphTwitterCard +
                "\n" +
                resetObj.opengraphTwitterDomain +
                "\n" +
                resetObj.opengraphTwitterUrl +
                "\n" +
                resetObj.opengraphTwitterTitle +
                "\n" +
                resetObj.opengraphTwitterDescription +
                "\n" +
                resetObj.opengraphTwitterImage
        );
        return resetObj;
    }

    temp() {
        const tempObj = {};
        
        return tempObj;
    }

    render() {
        const obj = {
        };
        
        obj.charSet = '<meta charSet="'+ this.charSet +'"/>';
        obj.title = "<title>" + this.title + "</title>";
        obj.description = '<meta name="description" content="' + this.description + '"/>';
        obj.robots = '<meta name="robots" content="' + this.robotsIndex + ','+ this.robotsFollow +'"/>';
        obj.language = '<meta name="language" content="' + this.country + '"/>';
        obj.revisit = '<meta name="revisit-after" content="' + this.revisit + '"/>';
        obj.author = '<meta name="author" content="' + this.author + '"/>';
        // Opengraph
        obj.url = '<meta property="og:url" content="' + this.url + '">';
        obj.opengraphTitle = '<meta property="og:title" content="' + this.title + '"/>';
        obj.opengraphDescription = '<meta property="og:description" content="' + this.description + '"/>';
        obj.siteName = '<meta property="og:site_name" content="'+ this.siteName +'">';
        obj.type = '<meta property="og:type" content="'+ this.typeOpengraph +'">';
        obj.image = '<meta property="og:image" content="'+ this.imageUrl +'">';
        // Opengraph Twitter
        obj.opengraphTwitterCard = '<meta name="twitter:card" content="'+ this.typeTwitter +'"/>';
        obj.opengraphTwitterDomain = '<meta property="twitter:domain" content="/"/>';
        obj.opengraphTwitterUrl = '<meta property="twitter:url" content="' + this.url + '"/>';
        obj.opengraphTwitterTitle = '<meta name="twitter:title" content="' + this.title + '"/>';
        obj.opengraphTwitterDescription = '<meta name="twitter:description" content="' + this.description + '"/>';
        obj.opengraphTwitterImage = '<meta name="twitter:image" content="'+ this.imageUrl +'">';

        $("#json-format").val(
            "<!-- Meta Here -->" +
                "\n" +
                obj.charSet +
                "\n" +
                obj.title +
                "\n" +
                obj.description +
                "\n" +
                obj.robots +
                "\n" +
                obj.language +
                "\n" +
                obj.revisit +
                "\n" +
                obj.author +
                "\n" +
                "\n" +
                "<!-- Opengraph Here -->" +
                "\n" +
                obj.url +
                "\n" +
                obj.opengraphTitle +
                "\n" +
                obj.opengraphDescription +
                "\n" +
                obj.siteName +
                "\n" +
                obj.type +
                "\n" +
                obj.image +
                "\n" +
                "\n" +
                "<!-- Twitter Opengraph Here -->" +
                "\n" +
                obj.opengraphTwitterCard +
                "\n" +
                obj.opengraphTwitterDomain +
                "\n" +
                obj.opengraphTwitterUrl +
                "\n" +
                obj.opengraphTwitterTitle +
                "\n" +
                obj.opengraphTwitterDescription +
                "\n" +
                obj.opengraphTwitterImage
        );
        return obj;
    }
};

let metaGeneratorFormat = new metaGenerator();

metaGeneratorFormat.temp();
metaGeneratorFormat.render();

//  * Adding regex url
var expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

// All Function
function updateJSON_title(value) {
    metaGeneratorFormat.title = value;
    metaGeneratorFormat.render();
}

function updateJSON_siteName(value) {
    metaGeneratorFormat.siteName = value;
    metaGeneratorFormat.render();
}

function updateJSON_url(value) {
    if (value.match(regex)) {
        metaGeneratorFormat.url = value;
        $(`.url`).removeClass("is-invalid");
        $(".invalid-feedback.url").hide();
    } else {
        metaGeneratorFormat.url = value;
        $(`.url`).addClass("is-invalid");
        $(".invalid-feedback.url").show();
    }

    metaGeneratorFormat.render();
}

function updateJSON_description(value) {
    metaGeneratorFormat.description = value;
    metaGeneratorFormat.render();
}

function updateJSON_imageUrl(value) {
    if (value.match(regex)) {
        metaGeneratorFormat.imageUrl = value;
        $(`.imageUrl`).removeClass("is-invalid");
        $(".invalid-feedback.imageUrl").hide();
    } else {
        metaGeneratorFormat.imageUrl = value;
        $(`.imageUrl`).addClass("is-invalid");
        $(".invalid-feedback.imageUrl").show();
    }

    metaGeneratorFormat.render();
}

function updateJSON_chatSet(value) {
    if (value == "none") {
        metaGeneratorFormat.charSet = "utf-8";
        metaGeneratorFormat.render();
    } else {
        metaGeneratorFormat.charSet = value;
        metaGeneratorFormat.render();
    }
}

function updateJSON_revisit(value) {
    if (value == "none") {
        metaGeneratorFormat.revisit = "";
        metaGeneratorFormat.render();
    } else {
        metaGeneratorFormat.revisit = value;
        metaGeneratorFormat.render();
    }
}

function updateJSON_author(value) {
    metaGeneratorFormat.author = value;
    metaGeneratorFormat.render();
}

function updateJSON_robotsIndex(value) {
    metaGeneratorFormat.robotsIndex = value;
    metaGeneratorFormat.render();
}

function updateJSON_robotsFollow(value) {
    metaGeneratorFormat.robotsFollow = value;
    metaGeneratorFormat.render();
}

function updateJSON_typeOpengraph(value) {
    metaGeneratorFormat.typeOpengraph = value;
    metaGeneratorFormat.render();
}

function updateJSON_typeTwitter(value) {
    metaGeneratorFormat.typeTwitter = value;
    metaGeneratorFormat.render();
}

function updateJSON_country(value) {
    if (value == "none") {
        metaGeneratorFormat.country = "";
        metaGeneratorFormat.render();
    } else {
        metaGeneratorFormat.country = value;
        metaGeneratorFormat.render();
    }
}

// Interaction
$(document).on("keyup", ".title", function () {
    updateJSON_title($(this).val());
});

$(document).on("keyup", ".siteName", function () {
    updateJSON_siteName($(this).val());
});

$(document).on("keyup", ".url", function () {
    updateJSON_url($(this).val());
});

$(document).on("keyup", ".description", function () {
    updateJSON_description($(this).val());
});

$(document).on("keyup", ".imageUrl", function () {
    updateJSON_imageUrl($(this).val());
});

$(document).on("change", "#chatSet", function () {
    updateJSON_chatSet($(this).val());
});

$(document).on("change", "#revisit", function () {
    updateJSON_revisit($(this).val());
});

$(document).on("keyup", ".author", function () {
    updateJSON_author($(this).val());
});

$(document).on("change", "#robotsIndex", function () {
    updateJSON_robotsIndex($(this).val());
});

$(document).on("change", "#robotsFollow", function () {
    updateJSON_robotsFollow($(this).val());
});

$(document).on("change", "#typeOpengraph", function () {
    updateJSON_typeOpengraph($(this).val());
});

$(document).on("change", "#typeTwitter", function () {
    updateJSON_typeTwitter($(this).val());
});

$(document).on("change", "#typeTwitter", function () {
    updateJSON_typeTwitter($(this).val());
});

$(document).on("change", "#country", function () {
    updateJSON_country($(this).val());
});

// Layout Action
jQuery("#copy").click(function () {
    const textarea = jQuery("#json-format");
    textarea.select();
    document.execCommand("copy");
    recordUserActivity("-");

    toastr.success("Copied to Clipboard", "Information");
});

jQuery("#reset").click(function () {
    $(".url").removeClass("is-invalid");  
    $(".imageUrl").removeClass("is-invalid");  
    $("#chatSet").selectpicker("val", "UTF-8");
    $("#chatSet").selectpicker("refresh");
    $("#revisit").selectpicker("val", "none");
    $("#revisit").selectpicker("refresh");
    $("#robotsIndex").selectpicker("val", "index");
    $("#robotsIndex").selectpicker("refresh");
    $("#robotsFollow").selectpicker("val", "follow");
    $("#robotsFollow").selectpicker("refresh");
    $("#typeOpengraph").selectpicker("val", "website");
    $("#typeOpengraph").selectpicker("refresh");
    $("#typeTwitter").selectpicker("val", "summary_large_image");
    $("#typeTwitter").selectpicker("refresh");
    $("#country").selectpicker("val", "none");
    $("#country").selectpicker("refresh");
    
    $(".invalid-feedback").hide();
    $("#form").trigger("reset");
    metaGeneratorFormat.resetrender();
});