// Global Variable

// Language Variable
if (lang == "en") {
    var created_at = "Created at ";
    var localStorageNone = "This is your first impressions, no history yet!";

    // Use en
    var snippet_website = "cmlabs.co";
    var snippet_domain = "https://tools.cmlabs.co";
    var snippet_breadcrumbs = "serp-simulator";
    var snippet_title = "This is an Example of a Title Tag";
    var snippet_date = "Sep 20, 2023";
    var snippet_desc = "Here is an example of what a snippet looks like in Google's SERPs. The content that appears here is usually taken from the Meta Description tag if relevant.";
    var snippet_rating = "Rating: 4.1/5 - 61 votes";
    
} else if (lang == "id") {
    var created_at = "Dibuat pada ";
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!";
    
    // Use id
    var snippet_website = "cmlabs.co";
    var snippet_domain = "https://tools.cmlabs.co";
    var snippet_breadcrumbs = "serp-simulator";
    var snippet_title = "This is an Example of a Title Tag";
    var snippet_date = "Sep 20, 2023";
    var snippet_desc = "Here is an example of what a snippet looks like in Google's SERPs. The content that appears here is usually taken from the Meta Description tag if relevant.";
    var snippet_rating = "Rating: 4.1/5 - 61 votes";
}

// Template

// All Function
function convertSecond(seconds) {
    let minute = (seconds / 60).toFixed(0);
    let second = seconds % 60;
    return {
        minute,
        second,
    };
}

function analyze(_url) {
    if (checkUrlStr(_url)) {
        if (checkUrl(_url)) {
            $.post({
                url: SERP_CHECK_API_URL,
                data: {
                    _token: $("meta[name=csrf-token]").attr("content"),
                    url: _url,
                },
                beforeSend: () => {
                    KTApp.block("#serp-result-container", {
                        overlayColor: "gray",
                        opacity: 0.1,
                        state: "primary",
                    });
                },
                success: (res) => {
                    if (res.statusCode === 200) {
                        console.log(res.data);
                        renderAllData(res.data);
                        toastr.success(
                            "Success Scan Website",
                            "Success"
                        );
                    } else if (err.responseJSON.statusCode === 429) {
                        let { minute, second } = convertSecond(
                            err.responseJSON.data.current_time
                        );
                        toastr.error(
                            `Please wait for ${minute} minutes and ${second} seconds`,
                            `Error ${err.responseJSON.message}`
                        );
                    } else {
                        toastr.error(res.message, "Error");
                    }
                },
                error: (err) => {
                    console.log(err);
                    if (err.responseJSON.statusCode === 429) {
                        let { minute, second } = convertSecond(
                            err.responseJSON.data.current_time
                        );
                        toastr.error(
                            `Please wait for ${minute} minutes and ${second} seconds`,
                            `Error ${err.responseJSON.message}`
                        );
                    } else {
                        toastr.error(err.responseJSON.message, "Error");
                    }
                },
                complete: () => {
                    KTApp.unblock("#serp-result-container");
                },
            });
        } else {
            toastr.error("URL is not secure", "Error");
        }
    } else {
        toastr.error("URL Format is not valid", "Error");
    }
}

function renderAllData(data) {
    // Practice SERP Simulator Input
    $(".url").val(data.url);
    $(".title").val(data.title);
    $(".desc").val(data.description);
    $(".keywords").prop("disabled", false);

    // Snippet Preview
    $(".snippet-favicon").attr("src", data.icon);
    $(".snippet-website").text(data.provider);
    $(".snippet-breadcrumbs").text(data.url);
    $(".snippet-title-preview").text(data.title);
    $(".snippet-desc-preview").text(data.description);

    // Title Character Count
    var charCount = data.title.length;
    var pixelCount = charCount * 7;
    $("#char-title").text(charCount);
    $("#px-title").text(pixelCount);

    // Desc Character Count
    var charCountDesc = data.description.length;
    var pixelCountDesc = charCountDesc * 7;
    $("#char-desc").text(charCountDesc);
    $("#px-desc").text(pixelCountDesc);
}

function formatDate(date) {
    // Format should be : DD/MM/YYYY HH:ii
    return `${date.getDate()}/${
        date.getMonth() + 1
    }/${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}`;
}

function checkUrl(url) {
    try {
        let _url = new URL(url);
        return _url.protocol === "https:" || _url.protocol === "http:";
    } catch (e) {
        return false;
    }
}

function checkUrlStr(url) {
    try {
        const regex = new RegExp(
            "^(?:(?!://)(?:d{1,3}.d{1,3}.d{1,3}.d{1,3}))|^(?!://)(?=.{1,255}$)((.{1,63}.){1,127}(?![0-9]*$)[a-z0-9-]+.?)$|(.+)(?<!/)$"
        );
        return regex.test(url);
    } catch (e) {
        return false;
    }
}

function getProtocol(url) {
    try {
        let _url = new URL(url);
        return _url.protocol;
    } catch (e) {
        return false;
    }
}

function updateSnippet_url(val){
    if(val){
        $(".snippet-breadcrumbs").text(val);
    }else{
        $(".snippet-breadcrumbs").text(snippet_domain);
    }
}

function updateSnippet_title(val){
    if(val){
        $(".snippet-title-preview").text(val);

        // Title Character Count
        var charCount = val.length;
        var pixelCount = charCount * 7;
        $("#char-title").text(charCount);
        $("#px-title").text(pixelCount);
    }else{
        $(".snippet-title-preview").text(snippet_title);
        $("#char-title").text(0);
        $("#px-title").text(0);
    }
}

function updateSnippet_desc(val){
    if(val){
        $(".snippet-desc-preview").text(val);

        // Desc Character Count
        var charCountDesc = val.length;
        var pixelCountDesc = charCountDesc * 7;
        $("#char-desc").text(charCountDesc);
        $("#px-desc").text(pixelCountDesc);
    }else{
        $(".snippet-desc-preview").text(snippet_desc);
        $("#char-desc").text(0);
        $("#px-desc").text(0);
    }
}

function updateSnippet_keywords(val) {
    var inputKeywords = val.toLowerCase();
    var keywordsArray = inputKeywords.split(/[ ,]+/);
    var paragraf_desktop = $("#snippet-desc-preview-desktop").text();
    var paragraf_mobile = $("#snippet-desc-preview-mobile").text();

    // Function to perform formatting on matching words
    function formatKata(match) {
        return "<strong>" + match + "</strong>";
    }

    // Loop through each separated keyword
    for (var i = 0; i < keywordsArray.length; i++) {
        var keyword = keywordsArray[i].trim(); // Remove extra spaces from keywords
        if (keyword !== "") {
            // Create a regular expression to search for words that match the keyword
            var regex = new RegExp("\\b" + keyword + "\\b", "gi");

            paragraf_desktop = paragraf_desktop.replace(regex, formatKata);
            paragraf_mobile = paragraf_mobile.replace(regex, formatKata);
        }
    }

    // Update paragraphs with formatted text
    $("#snippet-desc-preview-desktop").html(paragraf_desktop);
    $("#snippet-desc-preview-mobile").html(paragraf_mobile);

    // Clear format if keyword input is left blank
    if (inputKeywords === "") {
        $("#snippet-desc-preview-desktop").html(paragraf_desktop); 
        $("#snippet-desc-preview-mobile").html(paragraf_mobile);
    }
}

function serp_noDownload(){
     $("#serp-result-container").css("overflow", "auto");
     $(".snippet-header").css("border", "0px");
     $(".snippet-results").css("border-top", "1px solid #e1e8ed");
     $(".serp-simulator-result").css({
         overflow: "auto",
         "max-height": "600px",
     });
     $("#snippet-desktop").css("height", "700px");
     $("#snippet-mobile").css("height", "fit-content");

    $(".svg-search").hide();
    $(".svg-dots").hide();
    $(".svg-favicon").hide();
    $(".svg-star-active").hide();
    $(".svg-star").hide();
    $(".snippet-favicon").show();
    $("#serp-result-container i").show();
}

function serp_Download(){
    $("#serp-result-container").css("overflow", "initial");
    $(".snippet-header").css("border", "0px");
    $(".snippet-results").css("border-top", "1px solid #e1e8ed");
    $(".serp-simulator-result").css({
        overflow: "initial",
        "max-height": "fit-content",
    });
    $("#snippet-desktop").css("height", "fit-content");
    $("#snippet-mobile").css("height", "fit-content");

    $(".svg-search").show();
    $(".svg-dots").show();
    $(".svg-favicon").show();
    $(".svg-star-active").show();
    $(".svg-star").show();
    $(".snippet-favicon").hide();
    $("#serp-result-container i").hide();
}

// Interaction
$("#input-url").keyup(function () {
    const _url = $(this).val();
    if (checkUrl(_url)) {
        $("#empty-url").hide();
        const _protocol = getProtocol(_url);
        if (_protocol === "https:") {
            $("#unsecure-url").hide();
            $("#secure-url").show();
        } else {
            $("#secure-url").hide();
            $("#unsecure-url").show();
        }
    } else {
        $("#empty-url").show();
        $("#secure-url").hide();
        $("#unsecure-url").hide();
    }
});

$("#crawl-btn").click(function () {
    if ($("#input-url").val() === "" || $("#input-url").val() === null) {
        toastr.error("URL is empty", "Error");
        KTApp.unblock("#serp-result-container");
    } else {
        analyze($("#input-url").val());
    }
});

$("#btn-fetch").click(function () {
    if ($("#url").val() === "" || $("#url").val() === null) {
        toastr.error("URL is empty", "Error");
        KTApp.unblock("#serp-result-container");
    } else {
        analyze($("#url").val());
    }
});

$(document).on("keyup", ".url", function () {
    updateSnippet_url($(this).val());
});

$(document).on("keyup", ".title", function () {
    updateSnippet_title($(this).val());
});

$(document).on("keyup", ".desc", function () {
    updateSnippet_desc($(this).val());
});

$(document).on("input", ".keywords", function () {
    updateSnippet_keywords($(this).val());
});

// Layout Action
$(document).ready(function () {
    $(function () {
        $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    });

    $("#snippet-desktop").show();
    $("#snippet-mobile").hide();

    serp_noDownload();
});

// Function Snippet
$("#desktop-serp").click(function () {
    $("#snippet-desktop").show();
    $("#snippet-mobile").hide();
    $("#desktop-serp").addClass("active");
    $("#mobile-serp").removeClass("active");
});

$("#mobile-serp").click(function () {
    $("#snippet-desktop").hide();
    $("#snippet-mobile").show();
    $("#desktop-serp").removeClass("active");
    $("#mobile-serp").addClass("active");
});

$("#ads-serp-preview").click(function () {
    $(".snippet-ads").toggle();
    $("#ads-serp-preview").toggleClass("active");
});

$("#rating-serp-preview").click(function () {
    $(".snippet-rating").toggleClass("active");
    $("#rating-serp-preview").toggleClass("active");
});

$("#date-serp-preview").click(function () {
    $(".snippet-date").toggleClass("active");
    $("#date-serp-preview").toggleClass("active");
});

$("#reset-serp-preview").click(function () {
    $(".snippet-ads").hide();
    $(".snippet-rating").removeClass("active");
    $(".snippet-date").removeClass("active");

     $(".url").val("");
     $(".title").val("");
     $(".desc").val("");
     $(".keywords").val("");
     $(".keywords").prop("disabled", true);
     $("#char-title").text(0);
     $("#px-title").text(0);
     $("#char-desc").text(0);
     $("#px-desc").text(0);
     
    $(".snippet-favicon").attr("src", "https://www.google.com/s2/favicons?domain=default");
    $(".snippet-website").text(snippet_website);
    $(".snippet-breadcrumbs").text(snippet_domain);
    $(".snippet-title-preview").text(snippet_title);
    $(".snippet-desc-preview").text(snippet_desc);
});

$("#download-serp-preview").click(function () {
    var container = document.getElementById("serp-result-container");
    serp_Download();

    domtoimage
        .toPng(container)
        .then(function (dataUrl) {
            // var img = new Image();
            // img.src = dataUrl;
            // document.body.appendChild(img);
            // console.log(dataUrl);
            var link = document.createElement("a");
            link.download = "full-preview-serp.png";
            link.href = dataUrl;
            link.click();
            serp_noDownload();
        })
        .catch(function (error) {
            console.error("oops, something went wrong!", error);
            serp_noDownload();
        });
});

$("#pdf-serp-preview").click(function () {
    serp_Download();
    window.print();
    serp_noDownload();
});