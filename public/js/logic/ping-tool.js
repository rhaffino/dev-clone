const PING_TOOL_LOCAL_STORAGE_KEY = "ping-tool-history";

if (lang == "en") {
    var created_at = "Created at ";
    var localStorageNone = "This is your first impressions, no history yet!";
} else if (lang == "id") {
    var created_at = "Dibuat pada ";
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!";
}

const PingTemplate = (host, numericHost, output, time) => `
<div class="d-flex flex-column mx-5">
  <div class="font-weight-bold ping-header p-4">
    <p class="text-darkgrey">Domain: <span class="text-black">${host}</span></p>
    <p class="text-darkgrey">IP Address: <span class="text-black">${numericHost}</span></p>
    <p class="text-darkgrey m-0">Time: ${time}</p>
  </div>
  <div class="d-flex flex-column data-ping" id="detail-ping">
    <p class="h5 mb-0 text-darkgrey">Details</p>
    ${output}
  </div>
</div>`;

const HistoryTemplate = (url, date) => `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-url="${url}">
  <div class="d-flex justify-content-between">
    <div class="local-collection-title">${url}</div>
    <div class="d-flex align-items-center">
      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${created_at}${date}"></i>
      <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
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

const HistoryTemplateMobile = (url, date) => `
<div class="custom-card py-5 px-3 history--list" data-url="${url}">
<div class="d-flex align-items-center justify-content-between">
  <div class="local-collection-title">${url}</div>
  <div class="d-flex align-items-center">
    <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-bs-toggle="tooltip" data-bs-placement="top" data-theme="dark" title="${date}"></i>
    <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
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
    let histories = localStorage.getItem(PING_TOOL_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    if (!histories || histories.length === 0) {
        $("#local-history").append(EmptyHistoryTemplate());
        $("#local-history-mobile").append(EmptyHistoryTemplateMobile());
        return;
    }
    for (let history of histories.reverse()) {
        $("#local-history").append(HistoryTemplate(history.url, history.date));
        $("#local-history-mobile").append(
            HistoryTemplateMobile(history.url, history.date)
        );
    }
}

function addHistory(url, data) {
    let histories = localStorage.getItem(PING_TOOL_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    histories.push({
        url: url,
        data: data,
        date: new Date().toLocaleDateString("en-GB"),
    });
    localStorage.setItem(
        PING_TOOL_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );
    getHistories();
}

function deleteHistory(_url = null) {
    let histories = [];
    if (_url) {
        histories = localStorage.getItem(PING_TOOL_LOCAL_STORAGE_KEY) || [];
        if (typeof histories === "string" || histories instanceof String)
            histories = JSON.parse(histories);
        histories = histories.filter((history) => {
            return history.url !== _url;
        });
    }

    localStorage.setItem(
        PING_TOOL_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );
    getHistories();
}

function convertSecond(seconds) {
    let minute = (seconds / 60).toFixed(0);
    let second = seconds % 60;
    return {
        minute,
        second,
    };
}

function CheckAnalyze(type, value) {
    switch (type) {
        case "url":
            try {
                if (checkUrl(value)) {
                    analyzeUrl(type, value);
                } else {
                    $("#ping-result-status").html("");
                    $("#ping-result-list").hide();
                    $("#ping-result-empty").show();
                    toastr.error("URL Format is not valid", "Error");
                    KTApp.unblock("#ping-result-container");
                }
            } catch (e) {
                console.log(e);
            }
            break;
        case "ip":
            try {
                if (ValidateIPaddress(value)) {
                    analyzeUrl(type, value);
                } else {
                    $("#ping-result-status").html("");
                    $("#ping-result-list").hide();
                    $("#ping-result-empty").show();
                    toastr.error("IP Address Format is not valid", "Error");
                    KTApp.unblock("#ping-result-container");
                }
            } catch (e) {
                console.log(e);
            }
            break;
        default:
            break;
    }
}

function analyzeUrl(_type, _url) {
    console.log(_type)
    $("#ping-result-status").text("");
    $.post({
        url: PING_API_URL,
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            type: _type,
            url: _url,
        },
        beforeSend: () => {
            KTApp.block("#ping-result-container", {
                overlayColor: "gray",
                opacity: 0.1,
                state: "primary",
            });
        },
        success: (res) => {
            if (res.statusCode === 200) {
                renderAllData(res.data);
                addHistory(_url, res.data);
                getHistories();
            } else if (err.responseJSON.statusCode === 429) {
                let { minute, second } = convertSecond(
                    err.responseJSON.data.current_time
                );
                toastr.error(
                    `Please wait for ${minute} minutes and ${second} seconds`,
                    `Error ${err.responseJSON.message}`
                );
            } else {
                $("#ping-result-list").hide();
                $("#ping-result-empty").show();
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
            $("#ping-result-list").hide();
            $("#ping-result-empty").show();
        },
        complete: () => {
            KTApp.unblock("#ping-result-container");
        },
    });
}

function renderAllData(data) {
    $("#ping-result-empty").hide();
    $("#ping-result-list").empty().show();
    let _timeLabel =
        data.time != null
            ? `<span class="time-ping"><span class="label label-primary-version label-inline font-weight-normal px-2">${data.time}</span></span> ms`
            : "";

    let _outputShow = data.output.replace("data:", "data:<br/>");
    _outputShow = _outputShow.replace(
        "Ping statistics for",
        "<br/><div class='custom-line'></div>Ping statistics for"
    );
    _outputShow = _outputShow.replace("Packets:", "<br/>Packets:");
    _outputShow = _outputShow.replace(
        "Approximate",
        "<br/><div class='custom-line'></div>Approximate"
    );
    _outputShow = _outputShow.replace("milli-seconds:", "milli-seconds:<br/>");

    if (data.alive) {
        $("#ping-result-status").html(
            "Online <i class='bx bxs-check-circle bx-sm ml-1 text-green'></i>"
        );
        $("#ping-result-status").addClass("text-green");
        $("#ping-result-status").removeClass("text-red");

        $("#ping-result-list").append(
            PingTemplate(data.host, data.numeric_host, _outputShow, _timeLabel)
        );
    } else {
        $("#ping-result-status").html(
            "Offline <i class='bx bxs-x-circle bx-sm ml-1 text-red'></i>"
        );
        $("#ping-result-status").addClass("text-red");
        $("#ping-result-status").removeClass("text-green");

        $("#ping-result-list").append(
            PingTemplate("-", "-", _outputShow, "-")
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

function ValidateIPaddress(ipaddress) {
    var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    
    if(ipaddress.match(ipformat)){
        return (true)
    }
    return (false)
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
        deleteHistory($(this).data("url"));
    })
    .on("click", ".history--list", function (e) {
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(PING_TOOL_LOCAL_STORAGE_KEY);
        histories = histories ? JSON.parse(histories) : [];
        const history = histories.find((history) => {
            return history.url === _url;
        });

        dataResult = history.data;

        renderAllData(history.data);
    });

$("#local-history-mobile")
    .on("click", ".delete-history--btn", function () {
        deleteHistory($(this).data("url"));
    })
    .on("click", ".history--list", function (e) {
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(PING_TOOL_LOCAL_STORAGE_KEY);
        histories = histories ? JSON.parse(histories) : [];
        const history = histories.find((history) => {
            return history.url === _url;
        });

        dataResult = history.data;

        renderAllData(history.data);
    });

$(".clear-history--btn").click(function () {
    deleteHistory();
});

$("#crawl-btn").click(function () {
    if ($("#ping-select").val() === null){
        $("#ping-result-list").hide();
        $("#ping-result-empty").show();
        toastr.error("Choice value type", "Error");
        KTApp.unblock("#ping-result-container");
    }else{
        CheckAnalyze($("#ping-select").val(), $("#input-url").val());
        
    }
});

$(document).ready(function () {
    getHistories();

    $(function () {
        $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    });
});
