let initDate = new Date().toISOString().slice(0, 10);
let bookedDate = [];
const currentDate = new Date();
const currentMonth = currentDate.getMonth();

function getFormattedMonthYear(dateString) {
    var date = new Date(dateString);
    var month = date.toLocaleString('en-US', { month: 'long' });
    var year = date.getFullYear();

    return month + ' ' + year;
}

$(document).ready(() => {
    getCalendar({}).then((result) => {
        if (result.data.dates === '') {
            nextDate();
        }
        adjustDateNameInViewport()
    });
});

$(document).ready(function () {
    $('input[name="calendar"]').change(function () {
        getCalendar()
    });
});

$(document).ready(function () {
    $('input[name="calendar-type"]').change(function () {
        getCalendar()
    });
});

function prevDate() {
    return getCalendar({ order: 'prev', });
}

function nextDate() {
    return getCalendar({ order: 'next', });
}

function getCalendar(data) {
    $('.calendar-btn').prop('disabled', true);
    const dateSplited = initDate.split('-');
    let type = $('input[name="calendar"]:checked').val();
    let urlType = $('input[name="calendar-type"]:checked').val();

    let url = urlType === "all" ? PLAGIARISM_CALENDAR_API_URL : `${PLAGIARISM_CALENDAR_API_URL}?user_id=${USER_ID}`

    return $.ajax({
        type: 'GET',
        url: url,
        data: { year: dateSplited[0], month: dateSplited[1], day: 1, ...data, },
        success: (res) => {
            $(".calendar").html("")
            const nowDateRes = res.data.calendar;
            var nowDate = [];

            for (var key in nowDateRes) {
                if (nowDateRes.hasOwnProperty(key)) {
                    var obj = nowDateRes[key];
                    obj.dateKey = key;  // Add the date key to the object
                    nowDate.push(obj);
                }
            }
            nowDate.sort((a, b) => (a.dateKey > b.dateKey) ? 1 : -1);
            let today
            for (let i = 0; i < nowDate.length; i++) {
                if (!nowDate[i].prevMonth) {
                    today = nowDate[i].dateKey
                    break;
                }
            }
            initDate = today
            $("#month").html(getFormattedMonthYear(today))

            const givenMonth = new Date(today).getMonth();

            nowDate.forEach((date) => {
                $('.calendar').append($(
                    `<div class="date-item ${date.weekend && "weekend"} ${(date.prevMonth || date.nextMonth) && "other"}">
                        <div class="date">${date.date}</div>
                            <div class="value">${type === "cost" ? "$" + date.cost : date.request}</div>
                    </div>`)
                )
            })
            $('.calendar-btn').prop('disabled', false);

            if (givenMonth === currentMonth) {
                $(".calendar-btn.next").prop('disabled', true);
            }
        },
        error: (e) => {
            console.log('error', e);
            $('.calendar-btn').prop('disabled', false);
        },
        failed: () => {
            console.log('failed');
            $('.calendar-btn').prop('disabled', false);
        }
    });
}

document.getElementById("prevMonthBtn").addEventListener("click", () => {
    prevDate()
})
document.getElementById("nextMonthBtn").addEventListener("click", () => {
    nextDate()
})