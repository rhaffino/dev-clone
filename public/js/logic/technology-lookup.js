const TECH_LOOKUP_LOCAL_STORAGE_KEY = "tech-lookup-history";

if (lang == "en") {
    var created_at = "Created at ";
    var localStorageNone = "This is your first impressions, no history yet!";
} else if (lang == "id") {
    var created_at = "Dibuat pada ";
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!";
}

const TechnologyTemplate = (title, icon, category, version) => `
<div class="d-flex justify-content-between align-items-center mx-5">
  <div class="d-flex align-items-center">
    <img src="/media/technologyLookup/icons/${icon}" alt="" width="20px">
    <span class="mx-3 technology-name">${title}</span>
    ${version}
  </div>
  <div class="">
    <span>${category}</span>
  </div>
</div>
<hr>`;

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
    <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${created_at}${date}"></i>
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
    let histories = localStorage.getItem(TECH_LOOKUP_LOCAL_STORAGE_KEY);
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
    let histories = localStorage.getItem(TECH_LOOKUP_LOCAL_STORAGE_KEY);
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
        TECH_LOOKUP_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );
    getHistories();
}

function deleteHistory(_index) {
    const histories = JSON.parse(
        localStorage.getItem(TECH_LOOKUP_LOCAL_STORAGE_KEY)
    );

    histories.splice(_index, 1);
    localStorage.setItem(
        TECH_LOOKUP_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );

    getHistories();
}

let clearAllHistory = function () {
    localStorage.removeItem(TECH_LOOKUP_LOCAL_STORAGE_KEY);
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

function recordUserActivity(_url) {
    $.post({
        url: USER_ACTIVITY_API_URL,
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            submitted_url: _url,
            url: window.location.href,
            width_height: window.innerWidth + "x" + window.innerHeight,
            email: userObject.email,
        },
        success: (res) => {
            if (res.statusCode === 200) {
            } else {
                console.log(err);
            }
        },
        error: (err) => {
            console.log(err);
        },
    });
}

function analyzeUrl(_url) {
    if (checkUrl(_url)) {
        $("#technology-lookup-result-total").text("");
        $.post({
            url: LOOKUP_API_URL,
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                url: _url,
            },
            beforeSend: () => {
                KTApp.block("#technology-lookup-result-container", {
                    overlayColor: "gray",
                    opacity: 0.1,
                    state: "primary",
                });
            },
            success: (res) => {
                if (res.statusCode === 200) {
                    recordUserActivity(_url);
                    renderAllData(res.data);
                    addHistory(_url, res.data);
                    getHistories();
                    toastr.success(
                        "Success scan your technology lookup",
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
                    $("#technology-lookup-result-list").hide();
                    $("#technology-lookup-result-empty").show();
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
                $("#technology-lookup-result-list").hide();
                $("#technology-lookup-result-empty").show();
            },
            complete: () => {
                KTApp.unblock("#technology-lookup-result-container");
            },
        });
    } else {
        $("#technology-lookup-result-list").hide();
        $("#technology-lookup-result-empty").show();
        toastr.error("URL Format is not valid", "Error");
        KTApp.unblock("#technology-lookup-result-container");
    }
}

function renderAllData(data) {
    $("#technology-lookup-result-empty").hide();
    $("#technology-lookup-result-list").empty().show();
    $("#technology-lookup-result-total").text(`(${data.technologies.length})`);
    for (let technology of data.technologies) {
        let _versionLabel =
            technology.version != null
                ? `<span class="label label-primary-version label-inline font-weight-normal px-2">${technology.version}</span>`
                : "";
        $("#technology-lookup-result-list").append(
            TechnologyTemplate(
                technology.name,
                technology.icon,
                technology.categories[0].name,
                _versionLabel
            )
        );
    }
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

function getProtocol(url) {
    try {
        let _url = new URL(url);
        return _url.protocol;
    } catch (e) {
        return false;
    }
}

function checkAutoRun() {
    // get query params, if url and auto run exist, run the analyze function
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });

    let url = params.url;
    let autoRun = params.auto;

    if (url && autoRun) {
        $("#input-url").val(url);
        analyzeUrl(url);
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

        let histories = localStorage.getItem(TECH_LOOKUP_LOCAL_STORAGE_KEY);
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
        // analyze($(this).data('url'));
        const _url = $(this).data("url");

        let histories = localStorage.getItem(TECH_LOOKUP_LOCAL_STORAGE_KEY);
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
    analyzeUrl($("#input-url").val());
});

$(document).ready(function () {
    checkAutoRun();
});
