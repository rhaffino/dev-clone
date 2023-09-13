// Variable
const ROBOT_LOCAL_STORAGE_KEY = "robot-check-history";

if (lang == "en") {
    var created_at = "Created at ";
    var localStorageNone = "This is your first impressions, no history yet!";
    var label_allowed = "Allowed";
    var label_btn_readmore = "Read More";
    var label_url_website = "URL website";
    var label_host = "Host";
    var label_sitemap = "Sitemap";
    var label_robotstxt = "File Robots.txt";
    var label_tb_resource = "Resource URL";
    var label_tb_status = "Status";
    var label_tb_result = "Result";
} else if (lang == "id") {
    var created_at = "Dibuat pada ";
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!";
    var label_allowed = "Allowed";
    var label_btn_readmore = "Tampilkan Semua";
    var label_url_website = "URL website";
    var label_host = "Host";
    var label_sitemap = "Sitemap";
    var label_robotstxt = "File Robots.txt";
    var label_tb_resource = "Resource URL";
    var label_tb_status = "Status";
    var label_tb_result = "Result";
}

// All Template
const RobotTemplate = (robots, sitemap, _resource) => {
    const minRows = 10;
    const totalRows = Math.max(minRows, sitemap.length);
    const tableRows = sitemap
        .map(
            (value, index) =>
                `
            <tr class="${index >= minRows ? "collapse collapse-resource" : ""}">
            <td>${value}</td>
            <td>200 OK</td>
            <td><span class="text-green">` +
                label_allowed +
                `</span></td>
        </tr>
        `
        )
        .join("");

    const expandButton =
        sitemap.length > minRows
            ? `<button type="button" class="btn btn-primary" id="expandButton" data-toggle="collapse" data-target=".collapse-resource">${label_btn_readmore}</button>`
            : "";

    const scriptEn = `
        <script>
        $(document).ready(function () {
            const expandButtonClick = document.getElementById('expandButton');
            if (expandButtonClick) {
                expandButtonClick.addEventListener('click', function () {
                    if (this.textContent === 'Read More') {
                        this.textContent = 'Show Less';
                    } else {
                        this.textContent = 'Read More';
                    }
                });
            }
        });
        </script>
    `;

    const scriptId = `
        <script>
        $(document).ready(function () {
            const expandButtonClick = document.getElementById('expandButton');
            if (expandButtonClick) {
                expandButtonClick.addEventListener('click', function () {
                    if (this.textContent === 'Tampilkan Semua') {
                        this.textContent = 'Tampilkan lebih sedikit';
                    } else {
                        this.textContent = 'Tampilkan Semua';
                    }
                });
            }
        });
        </script>
    `;

    const scriptScroll = `
        <script>
           $(document).ready(function(){
                var clickBtnCollapse = 0;

                $('#expandButton').on('click', function () {
                    clickBtnCollapse++;
                    
                    if (clickBtnCollapse % 2 === 0) {
                        $('html, body').animate({
                            scrollTop: $('#resultResourceTable').offset().top
                        }, 1000);
                    }
                });
            });
        </script>
    `;

    return `
        <div class="d-flex flex-column px-5">
            <div class="box-result-list my-3">
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">${label_url_website}</span>: ${robots.url}</p>
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">${label_host}</span>: ${robots.parser.host}</p>
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">${label_sitemap}</span>: ${robots.parser.sitemaps}</p>
            </div>
            <span class="text-black font-15px font-weight-bolder mr-2">${label_robotstxt}</span>
            <textarea name="code_snippet" style="resize:none" rows="16" class="form-control my-3" readonly>${robots.rawRobots}</textarea>
            <div class="row mt-3 ${_resource ? "d-block" : "d-none"}">
                <div class="col-12 result-collapse">
                    <table id="resultResourceTable" class="table table-striped">
                        <tr>
                            <th>${label_tb_resource}</th>
                            <th>${label_tb_status}</th>
                            <th>${label_tb_result}</th>
                        </tr>
                        ${tableRows}
                    </table>
                    ${expandButton}
                    ${lang === 'en' ? scriptEn : scriptId}
                    ${scriptScroll}
                </div>
            </div>
        </div>`;
};

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

// All Function
function analyze(_url, _resource) {
    if (checkUrlStr(_url)) {
        if (checkUrl(_url)) {
            $.post({
                url: ROBOT_API_URL,
                data: {
                    _token: $("meta[name=csrf-token]").attr("content"),
                    url: _url,
                },
                beforeSend: () => {
                    KTApp.block("#result-container", {
                        overlayColor: "gray",
                        opacity: 0.1,
                        state: "primary",
                    });
                },
                success: (res) => {
                    if (res.statusCode === 200) {
                        $("#result-status").css('display', 'flex');
                        renderAllData(res.data, _resource);
                        addHistory(_url, res.data);
                        getHistories();
                        toastr.success(
                            "Success scan robot.txt checker",
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
                        $("#result-list").hide();
                        $("#result-empty").show();
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
                    $("#result-list").hide();
                    $("#result-empty").show();
                },
                complete: () => {
                    KTApp.unblock("#result-container");
                },
            });
        } else {
            toastr.error("URL is not secure", "Error");
        }
    } else {
        toastr.error("URL Format is not valid", "Error");
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

function checkUrl(url) {
    try {
        let _url = new URL(url);
        return _url.protocol === "https:" || _url.protocol === "http:";
    } catch (e) {
        return false;
    }
}

function renderAllData(data, _resource) {
    $("#result-empty").hide();
    $("#result-list").empty().show();

    $.each(data, function (key, value) {
        // Menampilkan hasil perulangan di console browser
        $("#result-list").append(
            RobotTemplate(value.robots, value.sitemap, _resource)
        );
    });
}

function getHistories() {
    $("#local-history").empty();
    $("#local-history-mobile").empty();
    let histories = localStorage.getItem(ROBOT_LOCAL_STORAGE_KEY);
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
    let histories = localStorage.getItem(ROBOT_LOCAL_STORAGE_KEY);
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
    localStorage.setItem(ROBOT_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function deleteHistory(_index) {
    const histories = JSON.parse(
        localStorage.getItem(ROBOT_LOCAL_STORAGE_KEY)
    );

    histories.splice(_index, 1);
    localStorage.setItem(
        ROBOT_LOCAL_STORAGE_KEY,
        JSON.stringify(histories)
    );

    getHistories();
}

let clearAllHistory = function () {
    localStorage.removeItem(ROBOT_LOCAL_STORAGE_KEY);
    getHistories();

    $("#result-status").hide();
    $("#input-url").val('');
    $("#result-list").html('');
    $("#result-list").hide();
    $("#result-empty").show();
};

function convertSecond(seconds) {
    let minute = (seconds / 60).toFixed(0);
    let second = seconds % 60;
    return {
        minute,
        second,
    };
}

function getProtocol(url) {
    try {
        let _url = new URL(url);
        return _url.protocol;
    } catch (e) {
        return false;
    }
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

$("#local-history")
    .on("click", ".delete-history--btn", function () {
        deleteHistory($(this).data("index"));
    })
    .on("click", ".history--list", function (e) {
        $("#result-status").css('display', 'flex');
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(ROBOT_LOCAL_STORAGE_KEY);
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
        $("#result-status").css('display', 'flex');
        if (e.target.classList.contains("delete-history--btn")) return;
        const _url = $(this).data("url");

        let histories = localStorage.getItem(ROBOT_LOCAL_STORAGE_KEY);
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
        $("#result-status").hide();
        $("#result-list").hide();
        $("#result-empty").show();
        toastr.error("URL is empty", "Error");
        KTApp.unblock("#result-container");
    } else {
        analyze(
            $("#input-url").val(),
            $("#checkResource").is(":checked"),
            $("#user-agent").val(),
        );
    }
});

$(document).ready(function () {
    getHistories();

    $(function () {
        $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    });
});