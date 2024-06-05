/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/plagiarism-checker-calendar.js":
/*!*****************************************************!*\
  !*** ./resources/js/plagiarism-checker-calendar.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
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

/***/ }),

/***/ 2:
/*!***********************************************************!*\
  !*** multi ./resources/js/plagiarism-checker-calendar.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\D\1. cmlabs\cmlabs Tools\tools\resources\js\plagiarism-checker-calendar.js */"./resources/js/plagiarism-checker-calendar.js");


/***/ })

/******/ });