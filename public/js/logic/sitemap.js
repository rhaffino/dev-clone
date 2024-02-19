toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
let DATA_FINAL;
let isCanceled = false;
let rendering = {
    skip: 0,
    take: 10
}
$(document).ready(function() {
    let robot_sleep = lang === 'en' ? 'Our robot is sleeping right now. Give him a task!' : 'Robot kita sedang tidur sekarang. Beri dia tugas!';
    let robot_progress = lang === 'en' ? 'Our robot is excecuting your task..' : 'Robot kami sedang menjalankan tugas Anda ...';
    let robot_done = lang === 'en' ? 'Our robot is already finished your task.' : 'Robot kami sudah menyelesaikan tugas Anda.';
    let has_crawled = lang === 'en' ? ' Has been crawled' : ' Telah ditelusuri';

    $('#noCrawl').show()
    $('#crawlHttps').hide()
    $('#crawlHttp').hide()
    cancel(false)
    refreshLocalStorage()
    clearTable();
    let socket;
    triggerEnter('#generate', '#url');
    $('#generate').click(function() {
        socket = io(URL_API, {
            transports: ['websocket'],
            secure: true
        });
        $(this).prop('disabled', true)
        clearTable();
        rendering.skip = 0;
        let match = /^(http(s)?|ftp):\/\//;
        let url = $('#url').val().replace(match, "");
        if (url.substr(url.length - 1) === '/')
            socket.emit('crawl', "https://" + url.slice(0, -1));
        else socket.emit('crawl', "https://" + url);
        recordUserActivity("https://" + url);
        $('#info').html(robot_progress)
        cancel(true)
        $("#noCrawlResult").hide();
        $("#generateCrawlResult").show();
        buttonOn(false)
        $("#result").empty();
        isCanceled = false;

        socket.on('update queue', data => {
            if (!isCanceled) {
                $('#detail-progress').show()
                $('#detail-progress').html(data.site_length + has_crawled)
            }
        });
    
        socket.on('result', response => {
            clearTable();
            $('#length-result').html(`(${response.data.length})`)
            $('#detail-progress').empty()
            $('#info').html(robot_done)
            $('#noCrawlResult').hide();
            buttonOn(true, response.hash)
            DATA_FINAL = response.data;
            removeShowMore()
            renderData()
            cancel(false)
            $('#generate').prop('disabled', false)
            saveData(response)
            refreshLocalStorage()
            socket.disconnect()
            socket = null
        });
    
        socket.on('notfound', msg => {
            toastr.error('Error', msg)
            socket.disconnect()
            socket = null
        })

        $('#cancelOn').on('click', function() {
            socket?.emit('stop');
            cancel(false)
            $("#noCrawlResult").show();
            $("#generateCrawlResult").hide();
            $('#info').html(robot_sleep)
            $('#detail-progress').empty();
            isCanceled = true;
            updateProgressBar(0)
            toastr.error('Cancel your task')
            $('#generate').prop('disabled', false)
            socket.disconnect()
            socket = null
        });    
    });    
});

$('#url').on('input', function() {
    let check = regexHttps($(this).val());
    if (check === 'https') {
        $('#noCrawl').hide()
        $('#crawlHttps').show()
        $('#crawlHttp').hide()
    } else if (check === 'http') {
        $('#noCrawl').hide()
        $('#crawlHttps').hide()
        $('#crawlHttp').show()
    } else {
        $('#noCrawl').show()
        $('#crawlHttps').hide()
        $('#crawlHttp').hide()
    }
})

function addData(data, i) {
    $("#result").append('<div class="d-flex align-items-center mx-5 result-row">' +
        '   <span class="label label-square label-sitemap">' + i + '</span>' +
        '   <span class="mx-3 sitemap-url-result">' + data.url + '</span>' +
        '</div>' +
        '<hr>');
}

function updateProgressBar(percentage) {
    $('#progress-bar')
        .attr('aria-valuenow', percentage)
        .css('width', percentage + '%')
        .html(percentage + '%');
}

function clearTable() {
    $("#noCrawlResult").show();
    $("#generateCrawlResult").hide();
    buttonOn(false)
    $("#result").empty();
}

function regexHttps(url) {
    let httpsPattern = new RegExp("^https:\/\/")
    let httpPattern = new RegExp("^http:\/\/")
    if (httpsPattern.test(url)) {
        return 'https'
    } else if (httpPattern.test(url)) {
        return 'http'
    } else {
        return 'none'
    }
}

let renderData = function() {
    let show_more = lang === 'en' ? 'Show More' : 'Tampilkan Lebih Banyak';

    for (let i = rendering.skip; i < DATA_FINAL.length; i++) {
        addData(DATA_FINAL[i], i + 1)
        if (i === rendering.skip + rendering.take) {
            $("#result").append('<div id="show-more" onclick="showMore()" class="d-flex align-items-center justify-content-between mx-5 result-row-show-more">\n' +
                '                  <div class="">\n' +
                '                    <span class="label label-square label-sitemap">...</span>\n' +
                '                    <span class="mx-3 sitemap-url-result">' + show_more + '</span>\n' +
                '                  </div>\n' +
                '                  <div class="d-flex align-items-center">\n' +
                '                    <i class=\'bx bxs-chevron-down sitemap-show-more\'></i>\n' +
                '                  </div>\n' +
                '                </div>');
            break;
        }
    }
    rendering.skip += rendering.take + 1;
}

let removeShowMore = function() {
    $('#show-more').remove();
}

let showMore = function() {
    removeShowMore()
    renderData()
}

let saveData = function(data) {
    let dataFromLocal = localStorage.getItem('sitemap-generator')
    let storage = []
    if (dataFromLocal) {
        storage = JSON.parse(dataFromLocal)
    }
    storage.push(data)
    localStorage.setItem('sitemap-generator', JSON.stringify(storage))
}

const refreshLocalStorage = function() {
    let no_history = lang === 'en' ? 'This is your first impressions, no history yet!' : 'Ini adalah kesan pertama Anda, belum ada riwayat!';

    try {
        const month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DES']
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('sitemap-generator'))
        if (keys) {
            if (keys.length > 0){
                let index = 0;
                for (let key of keys) {
                    let date = new Date(key.date)
                    let formatDate = `Created at ${date.getHours() < 10 ? ('0'+date.getHours()) : date.getHours()}.${date.getMinutes() < 10 ? ('0'+date.getMinutes()) : date.getMinutes()} | ${date.getDate()}, ${month[date.getMonth()]} ${date.getFullYear()}`
                    let div = `<div class="custom-card py-5 px-3" onclick="getData(${index})">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="local-collection-title">${key.url}
                        </div>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark"
                               title="${formatDate}"></i>
                            <i class='bx bxs-x-circle bx-sm text-grey' onclick="removeLocal(${index})"></i>
                        </div>
                    </div>
                </div>`

                    let div2 = `<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(${index})">
                  <div class="d-flex justify-content-between">
                    <div class="local-collection-title">${key.url}</div>
                    <div class="d-flex align-items-center">
                      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${formatDate}"></i>
                      <i class='bx bxs-x-circle bx-sm text-grey' onclick="removeLocal(${index})"></i>
                    </div>
                  </div>`
                    index++
                    $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            }else {
                let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + no_history + `</span>
                  </div>
                </li>`
                let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + no_history + `</span>
                    </div>
                </div>`

                $('#localsavemobile').append(div)
                $('#localsavedesktop').append(div2)
            }
        } else {
            let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + no_history + `</span>
                  </div>
                </li>`
            let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + no_history + `</span>
                    </div>
                </div>`

            $('#localsavemobile').append(div)
            $('#localsavedesktop').append(div2)
        }
    } catch (e) {
        console.log(e)
    }
}

function recordUserActivity(_url) {
    $.post({
        url: USER_ACTIVITY_API_URL,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'submitted_url' : _url,
            'url': window.location.href,
            width_height: window.innerWidth + "x" + window.innerHeight,
        },
        success: (res) => {
            if (res.statusCode === 200) {
            } else {
                console.log(err)
            }
        },
        error: (err) => {
            console.log(err)
        }
    })
}

let removeLocal = function(index) {
    const keys = JSON.parse(localStorage.getItem('sitemap-generator'))
    let hash = encodeURIComponent(keys[index].hash)

    $.ajax({
        url:`${URL_API+'/api/sitemap-generator/delete/'+hash}`,
        type: 'DELETE',
        success: function (result) {
            keys.splice(index, 1)
            localStorage.setItem('sitemap-generator', JSON.stringify(keys))
            clearTable()
            refreshLocalStorage()
        },
        error: function (err) {
            if (err)
                toastr.error(err)
        }
    })
}

let clearAll = function () {
    localStorage.removeItem('sitemap-generator')
    refreshLocalStorage();
}

let getData = function(index) {
    $("#result").empty();
    $('#noCrawlResult').hide();
    let local = JSON.parse(localStorage.getItem('sitemap-generator'))
    $('#url').val(local[index].url)
    buttonOn(true, local[index].hash)
    DATA_FINAL = local[index].data
    $('#length-result').html(`(${DATA_FINAL.length})`)
    rendering.skip = 0
    renderData()
}

let buttonOn = function(param, hash = null) {
    let btn_download = lang === 'en' ? 'Download Sitemap' : 'Unduh Sitemap';

    let download = $('#download-button')
    download.empty()
    if (param) {
        hash = encodeURIComponent(hash)
        download.append(`<a href="${URL_API+'/api/sitemap-generator/download/'+hash}" id="downloadOn" type="button" class="btn btn-download-sitemap">` + btn_download + `</a>`)
    } else {
        download.append(`<button id="downloadOff" type="button" class="btn btn-download-sitemap-disabled"
                                        disabled name="button">` + btn_download + `
                                </button>`)
    }
}

let cancel = function(param) {
    let btn_cancel = lang === 'en' ? 'Cancel' : 'Batal';

    let cancel = $('#cancel-button')
    cancel.empty()
    if (param) {
        cancel.append(`<button id="cancelOn" type="button" class="btn btn-cancel" name="button">` + btn_cancel + `
                                    </button>`)
    } else {
        cancel.append(`<button id="cancelOff" type="button" class="btn btn-cancel-disabled" disabled
                                name="button">` + btn_cancel + `
                        </button>`)
    }
}
