if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!"
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!"
}

jQuery('#crawlURL').click(function () {
    let url = jQuery('#url').val();
    $.post({
        url: META_CHECKER_URL,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            url: url
        },
        success: (res) => {
            if (res.statusCode === 200) {
                $('#resulttitle').text(ellipsis(res.data.title, 'title'));
                $('#resultdesc').text(ellipsis(res.data.description, 'description'));
                $('#resulturl').text(url.toLowerCase());
                $('#resulttitlemobile').text(ellipsis(res.data.title, 'title'));
                $('#resultdescmobile').text(ellipsis(res.data.description, 'description'));
                $('#resulturlmobile').text(url.toLowerCase());
                $('#desc').val(res.data.description)
                $('#title').val(res.data.title)
                $("#manual-mode").removeClass("d-none").addClass("d-block").slideDown();
                $('#desc').attr('disabled', 'disabled');
                $('#title').attr('disabled', 'disabled');
                var rateTitle = titleChecker(res.data.title);
                fillTitleBar(rateTitle);
                var rateDesc = descChecker(res.data.description);
                fillDescBar(rateDesc);
                save(url, res.data.title, res.data.description)
                refreshLocalStorage();
            } else {
                toastr.error(res.message)
            }
        },
        error: (err) => {
            toastr.error(err.responseJSON.message)
        }
    });
})

$('#title').on('keyup', function () {
    var rateTitle = titleChecker($(this).val());
    fillTitleBar(rateTitle)
    $('#resulttitle').text(ellipsis($(this).val(), 'title'))
    $('#resulttitlemobile').text(ellipsis($(this).val(), 'title'))
})

$('#desc').on('keyup', function () {
    var rateDesc = descChecker($(this).val());
    fillDescBar(rateDesc);
    $('#resultdesc').text(ellipsis($(this).val(), 'description'));
    $('#resultdescmobile').text(ellipsis($(this).val(), 'description'));
})

$('#url').on('keyup', function () {
    $('#resulturl').text($(this).val().toLowerCase())
    $('#resulturlmobile').text($(this).val().toLowerCase())
})

const ellipsis = function (text, type) {
    if (type === 'title') {
        if (text.length <= 55)
            return text

        return text.slice(0, 55) + '...'
    } else {
        if (text.length <= 160)
            return text

        return text.slice(0, 160) + '...'
    }
}

const save = function (url, title, description) {
    let key = new Date().getTime();
    let datum = {
        url: url,
        title: title,
        description: description
    }
    const keys = window.localStorage.getItem('keys')
    var temp = define()
    if (keys) {
        temp = JSON.parse(keys)
    }
    if (!temp.meta.includes(key)) {
        temp.meta.push(key)
    }
    localStorage.setItem('keys', JSON.stringify(temp));
    localStorage.setItem(key, JSON.stringify(datum));
}

const removeData = function (key) {
    let keys = JSON.parse(localStorage.getItem('keys'));
    for (var i in keys.meta) {
        if (keys.meta[i] === key) {
            keys.meta.splice(i, 1)
            break;
        }
    }
    localStorage.setItem('keys', JSON.stringify(keys))
    localStorage.removeItem(key)
    refreshLocalStorage();
}

const getMonth = function (index) {
    const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
        "AUG", "SEP", "OCT", "NOV", "DES"
    ]
    return month[index]
}

const refreshLocalStorage = function () {
    try {
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('keys'))
        if (keys){
            if (keys.meta.length > 0) {
                for (let key of keys.meta) {
                    let temp = JSON.parse(localStorage.getItem(key)).url
                    let date = new Date(key)
                    let div = '<div class="custom-card py-5 px-3" onclick="getData(' + key + ')">' +
                        '<div class="d-flex align-items-center justify-content-between">' +
                        '<div class="local-collection-title">' + temp + '</div>' +
                        '<div class="d-flex align-items-center">' +
                        '<span class="mr-2 text-grey date-created">' + created_at + ((date.getHours() < 10) ? ('0' + date.getHours()) : date.getHours()) + '.' + ((date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
                        '<i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
                        '</div>' +
                        '</div>' +
                        '</div>'

                    let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(' + key + ')">' +
                        '<div class="d-flex justify-content-between">' +
                        '  <div class="local-collection-title">' + temp + '</div>' +
                        '  <div class="d-flex align-items-center">' +
                        '    <span class="mr-2 text-grey date-created">' + created_at + (date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()) + '.' + (date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
                        '    <i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
                        '  </div>' +
                        '</div>' +
                        '</li>'

                    $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            } else {
                let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
                let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

                $('#localsavemobile').append(div)
                $('#localsavedesktop').append(div2)
            }
        }else {
            let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
            let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

            $('#localsavemobile').append(div)
            $('#localsavedesktop').append(div2)
        }
    } catch (e) {
    }
}

const getData = function (key) {
    if (localStorage.getItem(key)) {
        var res = JSON.parse(localStorage.getItem(key));
        $('#resulttitle').text(res.title);
        $('#resultdesc').text(res.description);
        $('#resulturl').text(res.url);
        $('#resulttitlemobile').text(res.title);
        $('#resultdescmobile').text(res.description);
        $('#resulturlmobile').text(res.url);
        $('#desc').val(res.description)
        $('#title').val(res.title)
        $("#manual-mode").show();
        $('#desc').attr('disabled', 'disabled');
        $('#title').attr('disabled', 'disabled');
        var rateTitle = titleChecker(res.title);
        fillTitleBar(rateTitle);
        var rateDesc = descChecker(res.description);
        fillDescBar(rateDesc);
    }
}

const clearAll = function () {
    var res = JSON.parse(localStorage.getItem('keys'));
    for (let i of res.meta) {
        localStorage.removeItem(i);
    }
    res.meta = [];
    localStorage.setItem('keys', JSON.stringify(res))
    refreshLocalStorage()
}

const titleChecker = function (title) {
    var titlesizer = $('#titlesizer');
    var rate = 0;
    var l = title.length;
    if (l > 30 && l < 55) {
        rate++;
    }
    titlesizer.css("display: inline-block; text-decoration: none; color: #1e0fbe; font-size: 18px !important; line-height: 18px !important;white-space:nowrap;visibility:hidden; font-family: Arial,Arial, Tahoma, Sans Serif")
    titlesizer.append(title);
    var pixel = titlesizer.innerWidth();
    if (pixel >= 250 && pixel <= 470) {
        rate += 2;
    }
    titlesizer.empty();
    return rate;
}

const descChecker = function (desc) {
    var descsizer = $('#descsizer');
    var rate = 0;
    var l = desc.length;
    if (l > 65 && l < 160) {
        rate++;
    }
    descsizer.css("display: inline-block; font-family: arial, sans-serif; font-size: 13px;color: #545454;line-height: 1.4;white-space: pre-wrap;word-wrap: break-word;filter: none!important;white-space:nowrap;visibility:hidden;");
    descsizer.append(desc)
    var pixel = descsizer.innerWidth();
    if (pixel >= 400 && pixel <= 750) {
        rate += 2;
    }
    descsizer.empty()

    let word = 0
    if (desc.length > 0)
        word = desc.split(' ').length

    return {
        rate : rate,
        word : word,
        pixel : pixel,
        char : l,
        badChar : badChar,
        badPixel : badPixel
    };

}

const fillTitleBar = function (param) {
    for (let i = 1; i < param + 1; i++) {
        $('#titlebar' + i).removeClass("blank")
        $('#titlebar' + i).addClass("active")
    }
    for (let i = param + 1; i < 4; i++) {
        $('#titlebar' + i).removeClass("active")
        $('#titlebar' + i).addClass("blank")
    }
}

const fillDescBar = function (param) {
    for (let i = 1; i < param + 1; i++) {
        $('#descbar' + i).removeClass("blank")
        $('#descbar' + i).addClass("active")
    }
    for (let i = param + 1; i < 4; i++) {
        $('#descbar' + i).removeClass("active")
        $('#descbar' + i).addClass("blank")
    }
}

$(document).ready(function () {
    $('#manualModeOff').click(function () {
        $('#manualModeOn').removeClass("d-none").addClass("d-block");
        $('#botModeOff').removeClass("d-none").addClass("d-block");
        $('#manual-mode').removeClass("d-none").addClass("d-block").slideDown();
        $('#manualModeOff').removeClass("d-block").addClass("d-none");
        $('#botModeOn').removeClass("d-block").addClass("d-none");
        $("#crawlURL").attr("disabled", true);
        $('#title').attr('disabled', false);
        $('#desc').attr('disabled', false);
    });

    $('#botModeOff').click(function () {
        $('#botModeOn').removeClass("d-none").addClass("d-block");
        $('#manualModeOff').removeClass("d-none").addClass("d-block");
        $('#manual-mode').slideUp().removeClass("d-block");
        $('#botModeOff').removeClass("d-block").addClass("d-none");
        $('#manualModeOn').removeClass("d-block").addClass("d-none");
        $("#crawlURL").attr("disabled", false);
        $('#title').attr('disabled', true);
        $('#desc').attr('disabled', true);
    });

    refreshLocalStorage();
});
jQuery.each(jQuery('textarea[data-autoresize]'), function () {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function (el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function () {
        resizeTextarea(this);
    }).removeAttr('data-autoresize');
});
