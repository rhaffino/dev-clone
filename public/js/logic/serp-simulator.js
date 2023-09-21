const HTTP_HEADER_LOCAL_STORAGE_KEY = "http-header-history";

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

const HttpHeaderTemplate = (title, desc) => `
<div class="d-flex flex-column">
    <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">${title}</span>: ${desc}</p>
</div>`;

const HistoryTemplate = (index, url, date) => `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-url="${url}">
  <div class="d-flex justify-content-between">
    <div class="local-collection-title">${url}</div>
    <div class="d-flex align-items-center">
      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${created_at}${date}"></i>
      <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-index="${index}"></i>
    </div>
  </div>
</li>
`;

const EmptyHistoryTemplate = () =>
    `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
  <div class="d-flex justify-content-center text-center">
    <span>` +
    localStorageNone +
    `</span>
  </div>
</li>`;

const HistoryTemplateMobile = (index, url, date) => `
<div class="custom-card py-5 px-3 history--list" data-url="${url}">
<div class="d-flex align-items-center justify-content-between">
  <div class="local-collection-title">${url}</div>
  <div class="d-flex align-items-center">
    <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-bs-toggle="tooltip" data-bs-placement="top" data-theme="dark" title="${created_at}${date}"></i>
    <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-index="${index}"></i>
  </div>
</div>
</div>`;

const EmptyHistoryTemplateMobile = () =>
    `
<div class="custom-card py-5 px-3">
<div class="d-flex justify-content-center text-center">
  <span>` +
    localStorageNone +
    `</span>
</div>
</div>`;

function getHistories() {
    $("#local-history").empty();
    $("#local-history-mobile").empty();
    let histories = localStorage.getItem(HTTP_HEADER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    if (!histories || histories.length === 0) {
        $("#local-history").append(EmptyHistoryTemplate());
        $("#local-history-mobile").append(EmptyHistoryTemplateMobile());
        return;
    }

    let index = 0;
    for (let history of histories) {
        $("#local-history").append(
            HistoryTemplate(index, history.url, history.date)
        );
        $("#local-history-mobile").append(
            HistoryTemplateMobile(index, history.url, history.date)
        );

        index++;
    }
}

function addHistory(url, data) {
    let histories = localStorage.getItem(HTTP_HEADER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const month = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Des",
    ];
    let date = new Date();
    date.setTime(date.getTime());
    let formatDate = `${
        date.getHours() < 10 ? "0" + date.getHours() : date.getHours()
    }.${
        date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes()
    } | ${date.getDate()}, ${month[date.getMonth()]} ${date.getFullYear()}`;

    histories.push({
        url: url,
        data: data,
        date: formatDate,
    });
    localStorage.setItem(
        HTTP_HEADER_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );
    getHistories();
}

function deleteHistory(_index) {
    const histories = JSON.parse(
        localStorage.getItem(HTTP_HEADER_LOCAL_STORAGE_KEY)
    );

    histories.splice(_index, 1);
    localStorage.setItem(
        HTTP_HEADER_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );

    getHistories();
}

let clearAllHistory = function () {
    localStorage.removeItem(HTTP_HEADER_LOCAL_STORAGE_KEY);
    getHistories();
};

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
                    KTApp.block("#http-header-result-container", {
                        overlayColor: "gray",
                        opacity: 0.1,
                        state: "primary",
                    });
                },
                success: (res) => {
                    if (res.statusCode === 200) {
                        console.log(res.data);
                        // renderAllData(res.data);
                        // addHistory(_url, res.data);
                        // getHistories();
                        toastr.success(
                            "Success scan http header checker",
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
                        $("#http-header-result-list").hide();
                        $("#http-header-empty").show();
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
                    $("#http-header-result-list").hide();
                    $("#http-header-empty").show();
                },
                complete: () => {
                    KTApp.unblock("#http-header-result-container");
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
    $("#http-header-empty").hide();
    $("#http-header-result-list").empty().show();

    $.each(data, function (key, value) {
        // Menampilkan hasil perulangan di console browser
        $("#http-header-result-list").append(HttpHeaderTemplate(key, value));
    });
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

$("#local-history")
    .on("click", ".delete-history--btn", function () {
        deleteHistory($(this).data("index"));
    })
    .on("click", ".history--list", function (e) {
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(HTTP_HEADER_LOCAL_STORAGE_KEY);
        histories = histories ? JSON.parse(histories) : [];
        const history = histories.find((history) => {
            return history.url === _url;
        });

        dataResult = history.data;

        renderAllData(history.data);
    });

$("#local-history-mobile")
    .on("click", ".delete-history--btn", function () {
        deleteHistory($(this).data("index"));
    })
    .on("click", ".history--list", function (e) {
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(HTTP_HEADER_LOCAL_STORAGE_KEY);
        histories = histories ? JSON.parse(histories) : [];
        const history = histories.find((history) => {
            return history.url === _url;
        });

        dataResult = history.data;

        renderAllData(history.data);
    });

$(".clear-history--btn").click(function () {
    clearAllHistory();
});

$("#crawl-btn").click(function () {
    if ($("#input-url").val() === "" || $("#input-url").val() === null) {
        $("#http-header-result-list").hide();
        $("#http-header-empty").show();
        toastr.error("URL is empty", "Error");
        KTApp.unblock("#http-header-result-container");
    } else {
        analyze($("#input-url").val());
    }
});

$(document).ready(function () {
    getHistories();

    $(function () {
        $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    });

    $("#snippet-desktop").show();
    $("#snippet-mobile").hide();
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
});

$("#rating-serp-preview").click(function () {
    $(".snippet-rating").toggleClass("active");
});

$("#date-serp-preview").click(function () {
    $(".snippet-date").toggleClass("active");
});