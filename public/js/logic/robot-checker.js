// All Template
const RobotTemplate = (robots, sitemap) => {
    // Membuat daftar baris tabel untuk setiap nilai sitemap dalam array
    const tableRows = sitemap
        .map(
            (value) => `
        <tr>
            <td>${value}</td>
            <td>200 OK</td>
            <td><span class="text-green">Allowed</span></td>
        </tr>
    `
        )
        .join("");

    return `
        <div class="d-flex flex-column px-5">
            <div class="box-result-list my-3">
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">URL Website</span>: ${robots.url}</p>
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">Host</span>: ${robots.parser.host}</p>
                <p class="font-weight-bold headercheck-content text-darkgrey"><span class="text-black">Sitemap</span>: ${robots.parser.sitemaps}</p>
            </div>
            <textarea name="code_snippet" style="resize:none" rows="16" class="form-control my-3" readonly>${robots.rawRobots}</textarea>
            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-striped">
                        <tr>
                            <th>Resource URL</th>
                            <th>Status</th>
                            <th>Result</th>
                        </tr>
                        ${tableRows} <!-- Menambahkan baris-baris tabel yang sudah dibuat -->
                    </table>
                </div>
            </div>
        </div>`;
};

// All Function
function analyze(_url) {
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
                        // console.log(res.data);
                        renderAllData(res.data);
                        // addHistory(_url, res.data);
                        // getHistories();
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

function renderAllData(data) {
    $("#result-empty").hide();
    $("#result-list").empty().show();

    $.each(data, function (key, value) {
        console.log(value.sitemap);
        // Menampilkan hasil perulangan di console browser
        $("#result-list").append(RobotTemplate(value.robots, value.sitemap));
    });
}

// Interaction
$("#crawl-btn").click(function () {
    if ($("#input-url").val() === "" || $("#input-url").val() === null) {
        // $("#result-status").html("");
        $("#result-list").hide();
        $("#result-empty").show();
        toastr.error("URL is empty", "Error");
        KTApp.unblock("#result-container");
    } else {
        analyze(
            $("#input-url").val(),
            $("#checkResource").val(),
            $("#user-agent").val()
        );
    }
});

$(document).ready(function () {
    // getHistories();

    $(function () {
        $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    });
});
