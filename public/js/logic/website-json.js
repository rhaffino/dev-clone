// declare first two json-ld website component
var main = {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    name: "",
    url: "",
    potentialAction: {
        "@type": "SearchAction",
        target: "{search_term_string}",
        "query-input": "required name=search_term_string",
    },
};

function jsonFormat() {
    $("#json-format").val(
        '<script type="application/ld+json">\n' +
            JSON.stringify(main, undefined, 4) +
            "\n</script>"
    );
}

// call JsonFormat for showing json-ld script
jsonFormat();

function updateJSON_name(value) {
    main.name = value;
    jsonFormat();
}

/*
 * Adding regex url
 * */
var expression =
    /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

function updateJSON_url(url) {
    if (url.match(regex)) {
        main.url = url;
        $(`.url`).removeClass("is-invalid");
        $(".invalid-feedback.url").hide();
    } else {
        main.url = url;
        $(`.url`).addClass("is-invalid");
        $(".invalid-feedback.url").show();
    }

    jsonFormat();
}

function updateJSON_queryUrl(url, value) {
    if (url.match(regex)) {
        main.potentialAction.target = url + "{search_term_string}" + value;
        $(`.queryUrl`).removeClass("is-invalid");
        $(".invalid-feedback.queryUrl").hide();
        $(".queryKeywords").removeAttr("disabled");
    } else {
        main.potentialAction.target = url + "{search_term_string}" + value;
        $(`.queryUrl`).addClass("is-invalid");
        $(".invalid-feedback.queryUrl").show();
        $(".queryKeywords").Attr("disabled");
    }

    jsonFormat();
}

$(document).on("keyup", ".websiteName", function () {
    updateJSON_name($(this).val());
});

$(document).on("keyup", ".url", function () {
    updateJSON_url($(this).val());
});

$(document).on("keyup", ".queryUrl", function () {
    updateJSON_queryUrl($(this).val(), null);

    $(document).on("keyup", ".queryKeywords", function () {
        updateJSON_queryUrl($(".queryUrl").val(), $(this).val());
    });
});


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
    $(".invalid-feedback").hide();
    $(`.url`).removeClass("is-invalid");
    $(`.queryUrl`).removeClass("is-invalid");
    $("#form-breadcrumb").trigger("reset");
    counter = 2;
    main = {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        name: "",
        url: "",
        potentialAction: {
            "@type": "SearchAction",
            target: "{search_term_string}",
            "query-input": "required name=search_term_string",
        },
    };
    jsonFormat();
});
