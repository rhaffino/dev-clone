/******/ (() => { // webpackBootstrap
/*!*****************************************************!*\
  !*** ./resources/js/plagiarism-checker-calendar.js ***!
  \*****************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var initDate = new Date().toISOString().slice(0, 10);
var bookedDate = [];
var currentDate = new Date();
var currentMonth = currentDate.getMonth();
function getFormattedMonthYear(dateString) {
  var date = new Date(dateString);
  var month = date.toLocaleString('en-US', {
    month: 'long'
  });
  var year = date.getFullYear();
  return month + ' ' + year;
}
$(document).ready(function () {
  getCalendar({}).then(function (result) {
    if (result.data.dates === '') {
      nextDate();
    }
  });
});
$(document).ready(function () {
  $('input[name="calendar"]').change(function () {
    getCalendar();
  });
});
$(document).ready(function () {
  $('input[name="calendar-type"]').change(function () {
    getCalendar();
  });
});
function prevDate() {
  return getCalendar({
    order: 'prev'
  });
}
function nextDate() {
  return getCalendar({
    order: 'next'
  });
}
function getCalendar(data) {
  $('.calendar-btn').prop('disabled', true);
  var dateSplited = initDate.split('-');
  var type = $('input[name="calendar"]:checked').val();
  var urlType = $('input[name="calendar-type"]:checked').val();
  var url = urlType === "all" ? PLAGIARISM_CALENDAR_API_URL : "".concat(PLAGIARISM_CALENDAR_API_URL, "?user_id=").concat(USER_ID);
  return $.ajax({
    type: 'GET',
    url: url,
    data: _objectSpread({
      year: dateSplited[0],
      month: dateSplited[1],
      day: 1
    }, data),
    success: function success(res) {
      $(".calendar").html("");
      var nowDateRes = res.data.calendar;
      var nowDate = [];
      for (var key in nowDateRes) {
        if (nowDateRes.hasOwnProperty(key)) {
          var obj = nowDateRes[key];
          obj.dateKey = key; // Add the date key to the object
          nowDate.push(obj);
        }
      }
      nowDate.sort(function (a, b) {
        return a.dateKey > b.dateKey ? 1 : -1;
      });
      var today;
      for (var i = 0; i < nowDate.length; i++) {
        if (!nowDate[i].prevMonth) {
          today = nowDate[i].dateKey;
          break;
        }
      }
      initDate = today;
      $("#month").html(getFormattedMonthYear(today));
      var givenMonth = new Date(today).getMonth();
      nowDate.forEach(function (date) {
        $('.calendar').append($("<div class=\"date-item ".concat(date.weekend && "weekend", " ").concat((date.prevMonth || date.nextMonth) && "other", "\">\n                        <div class=\"date\">").concat(date.date, "</div>\n                            <div class=\"value\">").concat(type === "cost" ? "$" + parseFloat(date.cost).toFixed(2) : date.request, "</div>\n                    </div>")));
      });
      $('.calendar-btn').prop('disabled', false);
      if (givenMonth === currentMonth) {
        $(".calendar-btn.next").prop('disabled', true);
      }
    },
    error: function error(e) {
      console.log('error', e);
      $('.calendar-btn').prop('disabled', false);
    },
    failed: function failed() {
      console.log('failed');
      $('.calendar-btn').prop('disabled', false);
    }
  });
}
document.getElementById("prevMonthBtn").addEventListener("click", function () {
  prevDate();
});
document.getElementById("nextMonthBtn").addEventListener("click", function () {
  nextDate();
});
/******/ })()
;