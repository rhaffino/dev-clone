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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/plagiarism-checker.js":
/*!********************************************!*\
  !*** ./resources/js/plagiarism-checker.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
var WORDS_LENGTH = 0;
var TOP_DENSITY = 0;
var results, querywords, allviewurl;
if (lang && lang == "en") {
  var seeDetailText = "See details";
  var seeOther = "See other results";
  var textMatched = "Text matched";
} else {
  var seeDetailText = "Lihat detail";
  var seeOther = "Lihat hasil lainnya";
  var textMatched = "Teks sesuai";
}
function checkUrl(url) {
  try {
    var _url = new URL(url);
    return _url.protocol === 'https:' || _url.protocol === 'http:';
  } catch (e) {
    // console.log(e)
    return false;
  }
}
function checkUrlLevel(url) {
  var urlWithoutProtocol = url.replace(/^(https?:\/\/)?/, '');
  urlWithoutProtocol = urlWithoutProtocol.replace(/\/+$/, '');
  var segments = urlWithoutProtocol.split('/');
  segments = segments.filter(function (segment) {
    return segment !== '';
  });
  var level = segments.length;
  return level;
}

// WORD CHECKER
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var input = document.querySelector('#text-check'),
  inputLink = document.querySelector('#url-check'),
  characterCount = document.querySelector('#characterCount'),
  wordCount = document.querySelector('#wordCount'),
  totalWordsEst = document.querySelector('#totalWordsEst'),
  sentenceCount = document.querySelector('#sentenceCount'),
  paragraphCount = document.querySelector('#paragraphCount'),
  costEst = document.querySelector('#costEst'),
  linkCheckerBtn = document.querySelector('#linkCheckerBtn'),
  readingTime = document.querySelector('#readingTime'),
  topKeywordsMobile = document.querySelector('#topKeywordsMobile'),
  topKeywords2Mobile = document.querySelector('#top2Mobile'),
  topKeywords3Mobile = document.querySelector('#top3Mobile');
characterCount.innerHTML = 0;
wordCount.innerHTML = 0;
totalWordsEst.innerHTML = 0;
sentenceCount.innerHTML = 0;
paragraphCount.innerHTML = 0;
readingTime.innerHTML = 0;
$(".estimation-card").hide();
$(".result-card").hide();
var topKeyword = [];
for (var i = 1; i < 6; i++) {
  topKeyword.push(document.querySelector('#top' + i));
}
var radioButtons = document.querySelectorAll('input[type="radio"][name="density"]');
var fontSizeButtons = document.querySelectorAll('input[type="radio"][name="font-size"]');
var resultTypeButtons = document.querySelectorAll('input[type="radio"][name="results"]');
var historyTypeButtons = document.querySelectorAll('input[type="radio"][name="history"]');
var resultSizeButtons = document.querySelectorAll('input[type="radio"][name="result-size"]');
$("#top1").show();
$("#top2").hide();
$("#top3").hide();
$("#top4").hide();
$("#top5").hide();
var calculateCost = function calculateCost(words) {
  var cost = 0.03;
  var wordPerCost = words > 200 ? Math.ceil((words - 200) / 100) : 0;
  return cost + wordPerCost * 0.01;
};
var historyCard = function historyCard(content, cost, wordCount, date) {
  var createdAt = new Date(date);
  var formattedDate = "".concat(createdAt.getFullYear(), "-").concat((createdAt.getMonth() + 1).toString().padStart(2, "0"), "-").concat(createdAt.getDate().toString().padStart(2, "0"));
  var formattedTime = "".concat(createdAt.getHours().toString().padStart(2, "0"), ":").concat(createdAt.getMinutes().toString().padStart(2, "0"));
  createdAt.setHours(createdAt.getHours() + 7);
  return "\n        <div class=\"card card-custom mb-5 mt-4\">\n            <div class=\"card-body px-3 py-3 row align-items-center\">\n                <div class=\"col-4 b2-400 text-dark-60\">\n                    ".concat(content.substring(0, 58), "...\n                </div>\n                <div class=\"col-2 b2-700 text-purple-70\">\n                    $").concat(cost, "\n                </div>\n                <div class=\"col-2 b2-700 text-primary-70\">\n                    ").concat(wordCount, " words\n                </div>\n                <div class=\"col-2 b2-400 text-dark-60\">\n                    ").concat(formattedDate, "\n                </div >\n                <div class=\"col-2 b2-400 text-dark-60\">\n                    ").concat(formattedTime, "\n                </div>\n            </div >\n        </div > ");
};
var updateStats = function updateStats(data) {
  var _data = _slicedToArray(data, 7),
    userReq = _data[0],
    userWord = _data[1],
    userCost = _data[2],
    teamReq = _data[3],
    teamTotal = _data[4],
    teamWord = _data[5],
    teamCost = _data[6];
  $("#userReq").html(userReq);
  $("#userWord").html(userWord);
  $("#userCost").html(userCost);
  $("#teamReq").html(teamReq);
  $("#teamTotal").html(teamTotal);
  $("#teamWord").html(teamWord);
  $("#teamCost").html(teamCost);
};
var updateUserHistory = function updateUserHistory(data) {
  $("#my-account").html("");
  $.each(data, function (index, value) {
    $("#my-account").append(historyCard(value.content, value.cost, value.word_count, value.created_at));
  });
};
var updateTeamHistory = function updateTeamHistory(data) {
  $("#all-account").html("");
  $.each(data, function (index, value) {
    $("#all-account").append(historyCard(value.content, value.cost, value.word_count, value.created_at));
  });
};
var fetchLogAndUpdate = function fetchLogAndUpdate() {
  $.get({
    url: PLAGIARISM_LOGS_API_URL,
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function success(res) {
      if (res.statusCode === 200) {
        var data = res.data;
        updateStats([data.userSummaryLogs.user_requests, data.userSummaryLogs.total_words, data.userSummaryLogs.total_cost, data.cummulativeSummaryLogs.team_requests, data.cummulativeSummaryLogs.total_users, data.cummulativeSummaryLogs.total_words, data.cummulativeSummaryLogs.total_cost]);
        updateUserHistory(data.cummulativeLogs);
        updateTeamHistory(data.userLogs);
      } else {
        toastr.error(res.message);
      }
    },
    error: function error(err) {
      toastr.error(err.responseJSON.message);
    }
  });
};

// listen for words density
radioButtons.forEach(function (radioButton) {
  radioButton.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    switch (selectedValue) {
      case "1":
        $("#top1").show();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        break;
      case "2":
        $("#top1").hide();
        $("#top2").show();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        break;
      case "3":
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").show();
        $("#top4").hide();
        $("#top5").hide();
        break;
      case "4":
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").show();
        $("#top5").hide();
        break;
      case "5":
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").show();
        break;
      default:
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        break;
    }
  });
});

// function for change font size
fontSizeButtons.forEach(function (fontSizeBtn) {
  fontSizeBtn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    $("textarea").removeClass("font-size-12px");
    $("textarea").removeClass("font-size-15px");
    $("textarea").removeClass("font-size-18px");
    $("textarea").addClass(selectedValue);
  });
});
var showDensity = function showDensity() {
  $(".words-density").show();
  $(".plagiarism-result").hide();
};
var showPlagiarism = function showPlagiarism() {
  $(".words-density").hide();
  $(".plagiarism-result").show();
};

// function for change result mode
resultTypeButtons.forEach(function (resultBtn) {
  resultBtn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    if (selectedValue === "density") {
      showDensity();
    } else {
      showPlagiarism();
    }
  });
});

// function for change history type
historyTypeButtons.forEach(function (btn) {
  btn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    if (selectedValue === "calendar") {
      $("#history-calendar").show();
      $("#history-list").hide();
    } else {
      $("#history-list").show();
      $("#history-calendar").hide();
    }
  });
});

// function for change size of result
resultSizeButtons.forEach(function (btn) {
  btn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    var count = 0;
    $(".result-container").html("");
    results.forEach(function (result, index) {
      if (count < parseInt(selectedValue)) {
        $(".result-container").append(resultCards(index, querywords, result));
      }
      count++;
    });
    $(".result-container").append("\n            <a href=\"".concat(allviewurl, "\" id=\"fullUrl\" target=\"_blank\" rel=\"noopener noreferrer noindex\" class=\"btn button-gray-20 b2-700 full-url-btn\"> <u>See detail result</u></a>\n            "));
  });
});

// function for change collapse behavior of result
document.querySelectorAll('input[type="radio"][name="result-collapse"]').forEach(function (btn) {
  btn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;
    if (selectedValue == "expand") {
      $(".result-container").slideDown();
    } else {
      $(".result-container").slideUp();
    }
  });
});

// function for remove content on text input
$(".remove-btn").on("click", function () {
  $(".result-input").html("");
  $(".result-container").html("");
  $("textarea").val("");
  $(".url-mode-container").hide();
  $(".result-input").hide();
  $("#text-check").show();
  $(".plagiarism-result").hide();
  $("#text-check").removeClass("h-400");
  wordCounter();
});

// linkChecker
$("#linkCheckerBtn").on("click", function () {
  if (checkUrl(inputLink.value)) {
    $("#urlEmbedContainer").attr("src", inputLink.value);
    $("#emptyState").hide();
    $(".estimation-box").hide();
    $(".plagiarism-result").hide();
    $(".words-density").hide();
    $(".url-mode-container").show();
    $(".estimation-card").show();
    $(".url-viewer .levels").html("".concat(checkUrlLevel(inputLink.value), " levels"));
    $(".url-viewer .url").html(inputLink.value);
    $(".result-input").html("");
    $(".result-container").html("");
  } else {
    toastr.error('URL Format is not valid', 'Error');
  }
});
function wordCounter() {
  characterCount.innerHTML = numberWithCommas(input.value.length);
  var words = input.value.replace(/['";:,.?\xbf\-!\xa1]+/g, "").match(/\S+/g);
  if (input.value != "") {
    $("#emptyState").hide();
    $(".estimation-card").show();
    $(".estimation-box").show();
    $(".words-density").show();
  } else {
    $("#emptyState").show();
    $(".estimation-card").hide();
  }
  if (words) {
    wordCount.innerHTML = words.length;
    totalWordsEst.innerHTML = words.length;
    WORDS_LENGTH = words.length;
    costEst.innerHTML = calculateCost(words.length);
  } else {
    wordCount.innerHTML = 0;
    WORDS_LENGTH = 0;
  }
  if (words) {
    var sentences = input.value.match(/\w([^.?!;\u2026]+[.?!;\u2026]+)/g);
    if (!sentences) {
      sentenceCount.innerHTML = 0;
    } else {
      sentenceCount.innerHTML = sentences.length;
    }
  } else {
    sentenceCount.innerHTML = 0;
  }
  if (words) {
    var paragraphs = input.value.replace(/\n$/gm, '').split(/\n/);
    paragraphCount.innerHTML = paragraphs.length;
  } else {
    paragraphCount.innerHTML = 0;
  }
  if (words) {
    var seconds = Math.floor(words.length * 60 / 275);
    if (seconds > 59) {
      var minutes = Math.floor(seconds / 60);
      seconds = seconds - minutes * 60;
      readingTime.innerHTML = minutes + "m " + seconds + "s";
    } else {
      readingTime.innerHTML = seconds + "s";
    }
  } else {
    readingTime.innerHTML = "0s";
  }
  if (words) {
    var nonStopWords = [];
    var stopWords = ["+", "a", "able", "about", "above", "abst", "accordance", "according", "accordingly", "across", "actually", "adj", "after", "afterwards", "again", "against", "ah", "all", "almost", "alone", "along", "already", "also", "although", "always", "am", "among", "amongst", "an", "and", "another", "any", "anybody", "anyhow", "anymore", "anyone", "anything", "anyway", "anyways", "anywhere", "apparently", "approximately", "are", "aren", "arent", "around", "as", "aside", "at", "auth", "available", "away", "awfully", "b", "back", "be", "because", "before", "beforehand", "behind", "below", "beside", "besides", "between", "beyond", "biol", "both", "brief", "briefly", "but", "by", "c", "ca", "certain", "certainly", "co", "com", "contain", "couldnt", "d", "downwards", "due", "e", "ed", "edu", "eg", "eight", "either", "else", "elsewhere", "et", "et-al", "etc", "even", "ever", "ex", "f", "ff", "fifth", "first", "five", "fix", "followed", "following", "follows", "for", "former", "formerly", "forth", "found", "four", "from", "further", "furthermore", "g", "gave", "get", "gets", "getting", "give", "given", "gives", "giving", "go", "goes", "gone", "got", "gotten", "h", "had", "happens", "hardly", "has", "hasn't", "have", "haven't", "having", "he", "hed", "hence", "her", "here", "hereafter", "hereby", "herein", "heres", "hereupon", "hers", "herself", "hes", "hi", "hid", "him", "himself", "his", "hither", "home", "how", "howbeit", "however", "hundred", "i", "id", "ie", "if", "i'll", "im", "immediate", "immediately", "importance", "important", "in", "inc", "indeed", "index", "information", "instead", "into", "invention", "inward", "is", "isn't", "it", "itd", "it'll", "its", "itself", "i've", "j", "just", "k", "keep", "keeps", "kept", "kg", "km", "know", "known", "knows", "l", "largely", "last", "lately", "later", "latter", "latterly", "least", "less", "lest", "let", "lets", "like", "liked", "likely", "line", "little", "'ll", "look", "looking", "looks", "ltd", "m", "made", "mainly", "make", "makes", "many", "may", "maybe", "me", "mean", "means", "meantime", "meanwhile", "merely", "mg", "might", "million", "miss", "ml", "more", "moreover", "most", "mostly", "mr", "mrs", "much", "mug", "must", "my", "myself", "n", "na", "name", "namely", "nay", "nd", "near", "nearly", "necessarily", "necessary", "need", "needs", "neither", "never", "nevertheless", "new", "next", "nine", "ninety", "no", "nobody", "non", "none", "nonetheless", "noone", "nor", "normally", "nos", "not", "noted", "nothing", "now", "nowhere", "o", "obtain", "obtained", "obviously", "of", "off", "often", "oh", "ok", "okay", "old", "omitted", "on", "once", "one", "ones", "only", "onto", "or", "ord", "other", "others", "otherwise", "ought", "our", "ours", "ourselves", "out", "outside", "over", "overall", "owing", "own", "p", "page", "pages", "part", "particular", "particularly", "per", "perhaps", "placed", "please", "plus", "poorly", "possible", "possibly", "potentially", "pp", "predominantly", "previously", "primarily", "probably", "promptly", "proud", "provides", "put", "q", "que", "quickly", "quite", "qv", "r", "ran", "rather", "rd", "re", "readily", "really", "recent", "recently", "ref", "refs", "regarding", "regardless", "regards", "related", "relatively", "research", "respectively", "resulted", "resulting", "results", "right", "run", "s", "said", "same", "saw", "say", "saying", "says", "sec", "section", "see", "seeing", "seem", "seemed", "seeming", "seems", "seen", "self", "selves", "sent", "seven", "several", "shall", "she", "shed", "she'll", "shes", "should", "shouldn't", "show", "showed", "shown", "showns", "shows", "significant", "significantly", "similar", "similarly", "since", "six", "slightly", "so", "some", "somebody", "somehow", "someone", "somethan", "something", "sometime", "sometimes", "somewhat", "somewhere", "soon", "sorry", "specifically", "specified", "specify", "specifying", "still", "stop", "strongly", "sub", "substantially", "successfully", "such", "sufficiently", "sup", "sure", "t", "take", "taken", "taking", "tell", "tends", "th", "than", "thanx", "that", "that'll", "thats", "that've", "the", "their", "theirs", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "thered", "therefore", "therein", "there'll", "thereof", "therere", "theres", "thereto", "thereupon", "there've", "these", "they", "theyd", "they'll", "theyre", "they've", "think", "this", "those", "thou", "though", "thoughh", "thousand", "throug", "through", "throughout", "thru", "thus", "til", "tip", "to", "together", "too", "took", "toward", "towards", "tried", "tries", "truly", "try", "trying", "ts", "twice", "two", "u", "un", "under", "unfortunately", "unless", "unlike", "unlikely", "until", "unto", "up", "upon", "ups", "us", "use", "used", "useful", "usefully", "usefulness", "uses", "using", "usually", "v", "value", "various", "'ve", "very", "via", "viz", "vol", "vols", "vs", "w", "want", "wants", "was", "wasn't", "way", "we", "wed", "welcome", "we'll", "went", "were", "weren't", "we've", "what", "whatever", "what'll", "whats", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "wheres", "whereupon", "wherever", "whether", "which", "while", "whim", "whither", "who", "whod", "whoever", "whole", "who'll", "whom", "whomever", "whos", "whose", "why", "widely", "willing", "wish", "with", "within", "without", "won't", "words", "world", "would", "wouldn't", "www", "x", "y", "yes", "yet", "you", "youd", "you'll", "your", "youre", "yours", "yourself", "yourselves", "you've", "z", "zero", "(", ")"];
    for (var i = 0; i < words.length; i++) {
      if (stopWords.indexOf(words[i].toLowerCase()) === -1) {
        nonStopWords.push(words[i].toLowerCase());
      }
    }
    for (var j = 1; j < 6; j++) {
      var keywords = {};
      for (var i = 0; i < nonStopWords.length - (j - 1); i++) {
        var key = '';
        for (var k = i; k < i + j; k++) {
          key += nonStopWords[k] + ' ';
        }
        key = key.trim();
        if (key in keywords) {
          keywords[key] += 1;
        } else {
          keywords[key] = 1;
        }
      }
      var sortedKeywords = [];
      var weights = 0;
      for (var keyword in keywords) {
        sortedKeywords.push([keyword, keywords[keyword]]);
        weights += keywords[keyword];
      }
      sortedKeywords.sort(function (a, b) {
        return b[1] - a[1];
      });
      var density = 0;
      if (j === 2 || j === 3) {
        if (sortedKeywords[0]) {
          density = sortedKeywords[0];
        }
        if (density > TOP_DENSITY) TOP_DENSITY = density;
      }
      topKeyword[j - 1].innerHTML = "";
      for (var i = 0; i < sortedKeywords.length && i < 10; i++) {
        var div = document.createElement('div');
        if (i == 9) {
          div.innerHTML = "<div class='row'>" + "<div class='col-8'>" + "<div class='d-flex justify-content-start align-items-center'>" + "<div class='container-label-top-keywords mr-3'>" + "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" + "</div>" + sortedKeywords[i][0] + "</div>" + "</div>" + "<div class='col-4 d-flex justify-content-end align-items-center'>" + "<div class='d-flex justify-content-end align-items-center'>" + "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" + "<span class='mt-1'>" + (sortedKeywords[i][1] / nonStopWords.length * 100).toFixed(1) + "%</span>" + "</div>" + "</div>" + "</div>";
        } else if (i > 2) {
          div.innerHTML = "<div class='row'>" + "<div class='col-8'>" + "<div class='d-flex justify-content-start align-items-center'>" + "<div class='container-label-top-keywords mr-3'>" + "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" + "</div>" + sortedKeywords[i][0] + "</div>" + "</div>" + "<div class='col-4 d-flex justify-content-end align-items-center'>" + "<div class='d-flex justify-content-end align-items-center'>" + "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" + "<span class='mt-1'>" + (sortedKeywords[i][1] / nonStopWords.length * 100).toFixed(1) + "%</span>" + "</div>" + "</div>" + "</div>" + "<hr class='my-2'>";
        } else {
          div.innerHTML = "<div class='row'>" + "<div class='col-8'>" + "<div class='d-flex justify-content-start align-items-center'>" + "<div class='container-label-top-keywords mr-3'>" + "<span class='label label-lg label-top-3'>" + (i + 1) + "</span>" + "</div>" + sortedKeywords[i][0] + "</div>" + "</div>" + "<div class='col-4 d-flex justify-content-end align-items-center'>" + "<div class='d-flex justify-content-end align-items-center'>" + "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" + "<span class='mt-1'>" + (sortedKeywords[i][1] / nonStopWords.length * 100).toFixed(1) + "%</span>" + "</div>" + "</div>" + "</div>" + "<hr class='my-2'>";
        }
        topKeyword[j - 1].appendChild(div);
      }
    }
  }
}
input.addEventListener("input", function () {
  wordCounter();
});
var resultCards = function resultCards(index, totalWords, data) {
  var percentage = Math.round(data.minwordsmatched / totalWords * 100);
  var levelUrl = checkUrlLevel(data.url);
  var titlesizer = $("#titlesizer");
  titlesizer.attr("style", "font-family: arial, sans-serif !important; font-size: 13px !important; position: absolute !important; visibility: hidden !important; white-space: nowrap !important;");
  titlesizer.text(data.title);
  var pixel = Math.floor(titlesizer.innerWidth());
  return "\n<div class=\"accordion accordion-light accordion-toggle-arrow custom-features-accordion\" id = \"accordionResult".concat(data.index, "\">\n    <div class=\"card bg-white px-3\" style=\"\">\n        <div class=\"card-header\" id=\"headingOne2\">\n            <div class=\"card-title collapsed pr-4 justify-content-between\" data-toggle=\"collapse\"\n                data-target=\"#accordion").concat(index + 1, "One\">\n                <div class=\"index-pill s-400\">").concat(data.index, "</div>\n                <div class=\"d-flex align-items-center\">\n                    ").concat(data.percentmatched != undefined ? "\n                    <p class=\"m-0 s-400 text-primary-70 mr-3\">".concat(data.percentmatched, "%</p>\n                    <p class=\"m-0 s-400\">").concat(textMatched, "</p>") : "<p class=\"m-0 s-400\">".concat(seeDetailText, "</p>"), "\n                </div>\n            </div>\n        </div>\n        <div id=\"accordion").concat(data.index, "One\" class=\"collapse\" data-parent=\"#accordionResult").concat(data.index, "\">\n            <div class=\"card-body py-2\">\n                <div class=\"d-flex align-items-center flex-column\">\n                    <hr class='my-2 w-100'>\n                        <div class=\"row w-100\">\n                            <div class=\"col-7 s-400 text-ellipsis\"><a href=\"").concat(data.url, "\" target=\"_blank\" rel=\"noopener noreferrer noindex\">").concat(data.url, "</a></div>\n                            <div class=\"col-3 s-400 flex-shrink-0 text-primary-70\">").concat(levelUrl, " levels</div>\n                            <div class=\"col-2 s-400 flex-shrink-0 text-gray-100 text-right\">URL</div>\n                        </div>\n                        <hr class='my-2 w-100'>\n                            <div class=\"row w-100\">\n                                <div class=\"col-7 s-400 text-ellipsis\">").concat(data.title, "</div>\n                                <div class=\"col-3 s-400 flex-shrink-0 text-primary-70\">").concat(pixel, " pixels</div>\n                                <div class=\"col-2 s-400 flex-shrink-0 text-gray-100 text-right\">Title</div>\n                            </div>\n                            <hr class='my-2 w-100'>\n                                <div class=\"d-flex w-100 justify-content-end pr-3\">\n                                    <p class=\"m-0 mx-3 s-400 text-gray-100\">(").concat(data.minwordsmatched, " of ").concat(totalWords, ")</p>\n                                </div>\n                                <div class=\"my-3 w-100 py-2 px-3 background-gray-20 b2-400\">\n                                    ").concat(data.textsnippet, "\n                                </div>\n\n                                <div class=\"my-2 d-flex align-items-start justify-content-start w-100\">\n                                    <a href=\"").concat(data.url, "\" target=\"_blank\" rel=\"noopener noreferrer noindex\" class=\"btn button-gray-20 b2-700\"> <u>View \"index\" on Copyscape</u></a>\n                                </div>\n\n                                <hr class='my-2 w-100'>\n                                    <div class=\"d-flex w-100 justify-content-end mb-3 pr-3\">\n                                        <p class=\"m-0 mx-3 s-400 text-gray-100\">(").concat(data.minwordsmatched, " of ").concat(totalWords, ")</p>\n                                        <p class=\"m-0 mx-3 s-400 text-primary-70\">").concat(percentage, "%</p>\n                                        <p class=\"m-0 ml-3 s-400 text-gray-100\">Minimum words matched limit</p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                </div>\n            </div>");
};

// function to highlight the matched text
// function styleMatchedText(originalText, resultText) {
//     const splitted = resultText.split("... ").filter(item => item.trim() !== "");
//     console.log(splitted)
//     for (var i = 0; i < splitted.length; i++) {
//         var match = splitted[i];
//         var regex = new RegExp(match, 'g');
//         originalText = originalText.replace(regex, '<span class="highlight-red">' + match + '</span>');
//     }

//     return originalText;
// }

function styleMatchedText(originalText, resultText) {
  var escapedResultText = resultText.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // Escape special regex characters
  var regex = new RegExp(escapedResultText, 'g');
  originalText = originalText.replace(regex, '<span class="highlight-red">$&</span>');
  return originalText;
}
function animateValue(id, start, end, duration) {
  var obj = jQuery('.' + id),
    range,
    current,
    increment,
    stepTime,
    timer;
  if (start == end) {
    range = 0;
    current = start;
    increment = 0;
    stepTime = 0;
    timer = 0;
    obj.html(current + '%');
  } else {
    range = end - start;
    current = start;
    increment = end > start ? 1 : -1;
    stepTime = Math.abs(Math.floor(duration / range));
    timer = setInterval(function () {
      current += increment;
      obj.html(current + '%');
      if (current == end) {
        clearInterval(timer);
      }
    }, stepTime);
  }
}
function strokeValue(score, category, isReverse) {
  var card = jQuery('.' + category);
  var value = jQuery('.value-' + category);
  value.removeClass('value-green');
  value.removeClass('value-orange');
  value.removeClass('value-red');
  card.removeClass('progress-green');
  card.removeClass('progress-red');
  card.removeClass('progress-orange');
  if (isReverse && score < 50 || !isReverse && score >= 90) {
    card.addClass('progress-red');
    value.addClass('value-red');
  } else if (isReverse && score < 90 || !isReverse && score >= 50) {
    card.addClass('progress-orange');
    value.addClass('value-orange');
  } else {
    card.addClass('progress-green');
    value.addClass('value-green');
  }
  card.attr('data-percentage', score);
  animateValue('value-' + category, 0, score, 3000);
}
$("#text-check").on("change", function () {
  if ($("#text-check").val() !== "") {
    $("#text-check").addClass("h-400");
  } else {
    $("#text-check").removeClass("h-400");
  }
});

// PLAGIARISM CHECKER
$("#button-checker").on("click", function () {
  var text;
  Swal.fire({
    text: 'Do you really want to run the Copyscape check?',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
    showCancelButton: true,
    reverseButtons: true
  }).then(function (result) {
    if (result.isConfirmed) {
      if ($(".url-mode-container").css("display") === "none") {
        text = $('#text-check').val();
      } else {
        text = $('#url-check').val();
      }
      $.post({
        url: PLAGIARISM_CHECK_URL,
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          text: text,
          user_id: USER_ID
        },
        beforeSend: function beforeSend() {
          $("#button-checker").prop("disabled", true);
        },
        success: function success(res) {
          if (res.statusCode === 200) {
            var _console;
            /* eslint-disable */(_console = console).log.apply(_console, _toConsumableArray(oo_oo("198151989_674_24_674_45_4", res.data)));
            var _text = res.data.text;
            res.data = res.data.response;
            $("#plagiarismBtn").prop("disabled", false);
            $("#plagiarismBtn").prop("checked", true);
            $("#densityBtn").prop("checked", false);
            $("#estimationCard").hide();
            $("#fullUrl").prop("href", res.data.allviewurl);
            showPlagiarism();
            strokeValue(res.data.allpercentmatched, "duplicate", false);
            strokeValue(100 - res.data.allpercentmatched, "unique", true);
            $("#button-checker").prop("disabled", false);

            // var textareaContent = styleMatchedText(text, res.data.alltextmatched)
            var textareaContent = _text;
            $('.result-input').append(textareaContent);
            $('.result-input').show();
            $('.url-mode-container').hide();
            $('#text-check').hide();
            results = res.data.result;
            querywords = res.data.querywords;
            allviewurl = res.data.allviewurl;
            results.forEach(function (result, index) {
              $(".result-container").append(resultCards(index, querywords, result));
            });
            if (results.length > 0 && res.data.allpercentmatched != 100) {
              $(".result-option").show();
              $(".result-container").append("\n                                <a href=\"".concat(res.data.allviewurl, "\" id=\"fullUrl\" target=\"_blank\" rel=\"noopener noreferrer noindex\" class=\"btn button-gray-20 b2-700 full-url-btn\"> <u>").concat(seeOther, "</u></a>\n                                "));
            } else {
              $(".result-option").hide();
              $(".result-container").hide();
            }
            fetchLogAndUpdate();
          } else {
            toastr.error(res.message);
            $("#button-checker").prop("disabled", false);
          }
        },
        error: function error(err) {
          toastr.error(err.responseJSON.message);
          $("#button-checker").prop("disabled", false);
        }
      });
    }
  });
});
/* istanbul ignore next */ /* c8 ignore start */ /* eslint-disable */
;
function oo_cm() {
  try {
    return (0, eval)("globalThis._console_ninja") || (0, eval)("/* https://github.com/wallabyjs/console-ninja#how-does-it-work */'use strict';var _0x2a0c0b=_0x8b30;(function(_0x234d42,_0x2b5a9a){var _0x41da7a=_0x8b30,_0x4b8914=_0x234d42();while(!![]){try{var _0x2bee01=parseInt(_0x41da7a(0x13b))/0x1+parseInt(_0x41da7a(0x148))/0x2*(parseInt(_0x41da7a(0x13f))/0x3)+parseInt(_0x41da7a(0x18e))/0x4*(parseInt(_0x41da7a(0x143))/0x5)+parseInt(_0x41da7a(0x140))/0x6*(parseInt(_0x41da7a(0x1e0))/0x7)+-parseInt(_0x41da7a(0x1fc))/0x8*(parseInt(_0x41da7a(0x17e))/0x9)+parseInt(_0x41da7a(0x1d6))/0xa*(-parseInt(_0x41da7a(0x1f4))/0xb)+-parseInt(_0x41da7a(0x17b))/0xc;if(_0x2bee01===_0x2b5a9a)break;else _0x4b8914['push'](_0x4b8914['shift']());}catch(_0x126864){_0x4b8914['push'](_0x4b8914['shift']());}}}(_0x248d,0xa5bcb));function _0x248d(){var _0x52d0f7=['_ws','set','slice','_setNodeExpandableState','versions','autoExpandMaxDepth','hrtime','level','5248460dAMRvC','remix','_capIfString','location','unshift','enumerable','send','ws://','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host,\\x20see\\x20','totalStrLength','5640628QlyhwN','time','_keyStrRegExp','Symbol','_Symbol','_console_ninja','push','bind','props','_inNextEdge','webpack','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20refreshing\\x20the\\x20page\\x20may\\x20help;\\x20also\\x20see\\x20','_addProperty','disabledLog','_connecting','Boolean','_isUndefined','_additionalMetadata','log','call','11wAyZuS','autoExpand','String','count','allStrLength','replace','negativeZero','global','18832xQHHFq','hits','root_exp_id','_getOwnPropertySymbols','_isArray','','_p_','_setNodeLabel','cappedProps','POSITIVE_INFINITY','map','[object\\x20Date]','_propertyName','getPrototypeOf','_getOwnPropertyNames','next.js','url','HTMLAllCollection','NEGATIVE_INFINITY','ws/index.js','_type','_WebSocketClass','length','rootExpression','defineProperty','setter','port','forEach','_addLoadNode','logger\\x20websocket\\x20error','parse','Map','stringify','constructor','unknown','catch','_cleanNode','index','parent','create','null','56478lPQxyC','disabledTrace','noFunctions','elapsed','3892071IbBNyG','6omZDLQ','_blacklistedProperty','1710909906749','45oJyZwv','_hasSymbolPropertyOnItsPath','split','_setNodeQueryPath','env','2hcHzUf','perf_hooks','__es'+'Module','error','_connected','_objectToString','warn','_p_name','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20restarting\\x20the\\x20process\\x20may\\x20help;\\x20also\\x20see\\x20','path','serialize','_attemptToReconnectShortly','_WebSocket','_setNodeId','toLowerCase','reduceLimits','_sendErrorMessage','trace','_getOwnPropertyDescriptor','_addObjectProperty','getOwnPropertyDescriptor','join','NEXT_RUNTIME','_treeNodePropertiesAfterFullValue','Number','timeEnd','cappedElements',\"c:\\\\Users\\\\Dell 7300\\\\.vscode\\\\extensions\\\\wallabyjs.console-ninja-1.0.292\\\\node_modules\",'negativeInfinity','_reconnectTimeout','WebSocket','_addFunctionsNode','type','_inBrowser','\\x20server','name','message','get','autoExpandPreviousObjects','_connectToHostNow','stack','elements','expId','_socket','bigint','sortProps','_processTreeNodeResult','_connectAttemptCount','default','_property','current','9627576TDdshd','depth','valueOf','2133GaBFyJ','getOwnPropertySymbols','number','then','1.0.0','dockerizedApp','_treeNodePropertiesBeforeFullValue','reload','now','failed\\x20to\\x20connect\\x20to\\x20host:\\x20','prototype','_isSet','_quotedRegExp','function','_webSocketErrorDocsLink','angular','179672TMamNG','onclose','process','127.0.0.1','','Set','getOwnPropertyNames','_allowedToSend','expressionsToEvaluate','_allowedToConnectOnSend','positiveInfinity','capped','symbol','astro','method','timeStamp','nodeModules','autoExpandLimit','isExpressionToEvaluate','strLength','hostname','_undefined','substr','53184','_isMap','[object\\x20Set]','gateway.docker.internal','_isPrimitiveType','array','undefined','_isPrimitiveWrapperType','concat','edge','onerror','_console_ninja_session','string','_sortProps','unref','onopen','_isNegativeZero','failed\\x20to\\x20find\\x20and\\x20load\\x20WebSocket','value','_consoleNinjaAllowedToStart','...','toString','match','host','object','autoExpandPropertyCount','resolveGetters','_hasMapOnItsPath','readyState','_regExpToString','data','date','getWebSocketClass','sort','_maxConnectAttemptCount','_setNodeExpressionPath','[object\\x20Map]','console',[\"localhost\",\"127.0.0.1\",\"example.cypress.io\",\"DESKTOP-HVPKK78\",\"192.168.43.193\"],'node','Buffer'];_0x248d=function(){return _0x52d0f7;};return _0x248d();}var j=Object[_0x2a0c0b(0x139)],H=Object[_0x2a0c0b(0x12a)],G=Object[_0x2a0c0b(0x15c)],ee=Object[_0x2a0c0b(0x194)],te=Object[_0x2a0c0b(0x11f)],ne=Object[_0x2a0c0b(0x188)]['hasOwnProperty'],re=(_0x349042,_0x3af774,_0x2e1a9c,_0x2b30ea)=>{var _0x2ffed5=_0x2a0c0b;if(_0x3af774&&typeof _0x3af774==_0x2ffed5(0x1bd)||typeof _0x3af774==_0x2ffed5(0x18b)){for(let _0x51328f of ee(_0x3af774))!ne['call'](_0x349042,_0x51328f)&&_0x51328f!==_0x2e1a9c&&H(_0x349042,_0x51328f,{'get':()=>_0x3af774[_0x51328f],'enumerable':!(_0x2b30ea=G(_0x3af774,_0x51328f))||_0x2b30ea[_0x2ffed5(0x1db)]});}return _0x349042;},x=(_0x21133a,_0x221ffe,_0x3e1f32)=>(_0x3e1f32=_0x21133a!=null?j(te(_0x21133a)):{},re(_0x221ffe||!_0x21133a||!_0x21133a[_0x2a0c0b(0x14a)]?H(_0x3e1f32,_0x2a0c0b(0x178),{'value':_0x21133a,'enumerable':!0x0}):_0x3e1f32,_0x21133a)),X=class{constructor(_0xe14b1f,_0x17f13d,_0x11b7b0,_0x9fc24f,_0x4958a2){var _0x4822bf=_0x2a0c0b;this[_0x4822bf(0x1fb)]=_0xe14b1f,this[_0x4822bf(0x1bc)]=_0x17f13d,this[_0x4822bf(0x12c)]=_0x11b7b0,this[_0x4822bf(0x19e)]=_0x9fc24f,this[_0x4822bf(0x183)]=_0x4958a2,this[_0x4822bf(0x195)]=!0x0,this['_allowedToConnectOnSend']=!0x0,this[_0x4822bf(0x14c)]=!0x1,this['_connecting']=!0x1,this[_0x4822bf(0x1e9)]=_0xe14b1f['process']?.[_0x4822bf(0x147)]?.[_0x4822bf(0x15e)]===_0x4822bf(0x1ae),this[_0x4822bf(0x169)]=!this[_0x4822bf(0x1fb)][_0x4822bf(0x190)]?.[_0x4822bf(0x1d2)]?.['node']&&!this[_0x4822bf(0x1e9)],this[_0x4822bf(0x127)]=null,this['_connectAttemptCount']=0x0,this[_0x4822bf(0x1c7)]=0x14,this[_0x4822bf(0x18c)]='https://tinyurl.com/37x8b79t',this[_0x4822bf(0x158)]=(this[_0x4822bf(0x169)]?_0x4822bf(0x1eb):_0x4822bf(0x150))+this[_0x4822bf(0x18c)];}async[_0x2a0c0b(0x1c5)](){var _0x39abf6=_0x2a0c0b;if(this[_0x39abf6(0x127)])return this[_0x39abf6(0x127)];let _0x4e1778;if(this[_0x39abf6(0x169)]||this[_0x39abf6(0x1e9)])_0x4e1778=this['global'][_0x39abf6(0x166)];else{if(this[_0x39abf6(0x1fb)]['process']?.[_0x39abf6(0x154)])_0x4e1778=this['global'][_0x39abf6(0x190)]?.[_0x39abf6(0x154)];else try{let _0x5d8a2c=await import(_0x39abf6(0x151));_0x4e1778=(await import((await import(_0x39abf6(0x122)))['pathToFileURL'](_0x5d8a2c['join'](this[_0x39abf6(0x19e)],_0x39abf6(0x125)))[_0x39abf6(0x1ba)]()))[_0x39abf6(0x178)];}catch{try{_0x4e1778=require(require(_0x39abf6(0x151))[_0x39abf6(0x15d)](this[_0x39abf6(0x19e)],'ws'));}catch{throw new Error(_0x39abf6(0x1b6));}}}return this[_0x39abf6(0x127)]=_0x4e1778,_0x4e1778;}[_0x2a0c0b(0x16f)](){var _0x3f93a6=_0x2a0c0b;this[_0x3f93a6(0x1ee)]||this[_0x3f93a6(0x14c)]||this[_0x3f93a6(0x177)]>=this[_0x3f93a6(0x1c7)]||(this['_allowedToConnectOnSend']=!0x1,this[_0x3f93a6(0x1ee)]=!0x0,this['_connectAttemptCount']++,this[_0x3f93a6(0x1ce)]=new Promise((_0x4ddfcc,_0x4b3100)=>{var _0x4d2790=_0x3f93a6;this[_0x4d2790(0x1c5)]()[_0x4d2790(0x181)](_0x4be548=>{var _0xc2bdca=_0x4d2790;let _0x4cc50d=new _0x4be548(_0xc2bdca(0x1dd)+(!this[_0xc2bdca(0x169)]&&this[_0xc2bdca(0x183)]?_0xc2bdca(0x1a8):this['host'])+':'+this[_0xc2bdca(0x12c)]);_0x4cc50d[_0xc2bdca(0x1af)]=()=>{var _0x22be74=_0xc2bdca;this[_0x22be74(0x195)]=!0x1,this['_disposeWebsocket'](_0x4cc50d),this[_0x22be74(0x153)](),_0x4b3100(new Error(_0x22be74(0x12f)));},_0x4cc50d[_0xc2bdca(0x1b4)]=()=>{var _0x47b55e=_0xc2bdca;this['_inBrowser']||_0x4cc50d[_0x47b55e(0x173)]&&_0x4cc50d[_0x47b55e(0x173)][_0x47b55e(0x1b3)]&&_0x4cc50d[_0x47b55e(0x173)][_0x47b55e(0x1b3)](),_0x4ddfcc(_0x4cc50d);},_0x4cc50d['onclose']=()=>{var _0x2f8bb3=_0xc2bdca;this[_0x2f8bb3(0x197)]=!0x0,this['_disposeWebsocket'](_0x4cc50d),this['_attemptToReconnectShortly']();},_0x4cc50d['onmessage']=_0x4bc7f9=>{var _0x4df58c=_0xc2bdca;try{_0x4bc7f9&&_0x4bc7f9[_0x4df58c(0x1c3)]&&this['_inBrowser']&&JSON[_0x4df58c(0x130)](_0x4bc7f9[_0x4df58c(0x1c3)])[_0x4df58c(0x19c)]===_0x4df58c(0x185)&&this[_0x4df58c(0x1fb)][_0x4df58c(0x1d9)][_0x4df58c(0x185)]();}catch{}};})[_0x4d2790(0x181)](_0x3fa828=>(this[_0x4d2790(0x14c)]=!0x0,this[_0x4d2790(0x1ee)]=!0x1,this[_0x4d2790(0x197)]=!0x1,this[_0x4d2790(0x195)]=!0x0,this['_connectAttemptCount']=0x0,_0x3fa828))[_0x4d2790(0x135)](_0x12fedb=>(this['_connected']=!0x1,this[_0x4d2790(0x1ee)]=!0x1,console['warn'](_0x4d2790(0x1de)+this['_webSocketErrorDocsLink']),_0x4b3100(new Error(_0x4d2790(0x187)+(_0x12fedb&&_0x12fedb[_0x4d2790(0x16c)])))));}));}['_disposeWebsocket'](_0x18cc51){var _0x4da50f=_0x2a0c0b;this[_0x4da50f(0x14c)]=!0x1,this[_0x4da50f(0x1ee)]=!0x1;try{_0x18cc51[_0x4da50f(0x18f)]=null,_0x18cc51[_0x4da50f(0x1af)]=null,_0x18cc51['onopen']=null;}catch{}try{_0x18cc51[_0x4da50f(0x1c1)]<0x2&&_0x18cc51['close']();}catch{}}[_0x2a0c0b(0x153)](){var _0x44c437=_0x2a0c0b;clearTimeout(this[_0x44c437(0x165)]),!(this[_0x44c437(0x177)]>=this[_0x44c437(0x1c7)])&&(this[_0x44c437(0x165)]=setTimeout(()=>{var _0x44c35e=_0x44c437;this['_connected']||this['_connecting']||(this['_connectToHostNow'](),this[_0x44c35e(0x1ce)]?.[_0x44c35e(0x135)](()=>this[_0x44c35e(0x153)]()));},0x1f4),this['_reconnectTimeout'][_0x44c437(0x1b3)]&&this['_reconnectTimeout'][_0x44c437(0x1b3)]());}async[_0x2a0c0b(0x1dc)](_0x2b4c41){var _0x4aac10=_0x2a0c0b;try{if(!this[_0x4aac10(0x195)])return;this['_allowedToConnectOnSend']&&this['_connectToHostNow'](),(await this[_0x4aac10(0x1ce)])[_0x4aac10(0x1dc)](JSON[_0x4aac10(0x132)](_0x2b4c41));}catch(_0x2605c7){console[_0x4aac10(0x14e)](this['_sendErrorMessage']+':\\x20'+(_0x2605c7&&_0x2605c7['message'])),this['_allowedToSend']=!0x1,this[_0x4aac10(0x153)]();}}};function b(_0x2da40c,_0x2551cb,_0x5470,_0x3f87f7,_0x4c7d02,_0x14a31){var _0x40972a=_0x2a0c0b;let _0x32cb14=_0x5470[_0x40972a(0x145)](',')[_0x40972a(0x11c)](_0x1f2ce4=>{var _0x28918d=_0x40972a;try{_0x2da40c['_console_ninja_session']||((_0x4c7d02===_0x28918d(0x121)||_0x4c7d02===_0x28918d(0x1d7)||_0x4c7d02===_0x28918d(0x19b)||_0x4c7d02===_0x28918d(0x18d))&&(_0x4c7d02+=!_0x2da40c[_0x28918d(0x190)]?.[_0x28918d(0x1d2)]?.[_0x28918d(0x1cc)]&&_0x2da40c['process']?.[_0x28918d(0x147)]?.[_0x28918d(0x15e)]!=='edge'?'\\x20browser':_0x28918d(0x16a)),_0x2da40c[_0x28918d(0x1b0)]={'id':+new Date(),'tool':_0x4c7d02});let _0x18aaeb=new X(_0x2da40c,_0x2551cb,_0x1f2ce4,_0x3f87f7,_0x14a31);return _0x18aaeb[_0x28918d(0x1dc)][_0x28918d(0x1e7)](_0x18aaeb);}catch(_0x16aeb6){return console[_0x28918d(0x14e)]('logger\\x20failed\\x20to\\x20connect\\x20to\\x20host',_0x16aeb6&&_0x16aeb6[_0x28918d(0x16c)]),()=>{};}});return _0x144fe1=>_0x32cb14[_0x40972a(0x12d)](_0x3076b4=>_0x3076b4(_0x144fe1));}function _0x8b30(_0x3917e4,_0x5d5a61){var _0x248db6=_0x248d();return _0x8b30=function(_0x8b30c5,_0xec56c){_0x8b30c5=_0x8b30c5-0x114;var _0x363205=_0x248db6[_0x8b30c5];return _0x363205;},_0x8b30(_0x3917e4,_0x5d5a61);}function W(_0x3b0e3e){var _0x4a4d00=_0x2a0c0b;let _0xb7917e=function(_0x309858,_0x5b4589){return _0x5b4589-_0x309858;},_0x12a7f8;if(_0x3b0e3e['performance'])_0x12a7f8=function(){var _0xb5479f=_0x8b30;return _0x3b0e3e['performance'][_0xb5479f(0x186)]();};else{if(_0x3b0e3e[_0x4a4d00(0x190)]&&_0x3b0e3e['process'][_0x4a4d00(0x1d4)]&&_0x3b0e3e[_0x4a4d00(0x190)]?.[_0x4a4d00(0x147)]?.['NEXT_RUNTIME']!=='edge')_0x12a7f8=function(){var _0x2f3edf=_0x4a4d00;return _0x3b0e3e[_0x2f3edf(0x190)][_0x2f3edf(0x1d4)]();},_0xb7917e=function(_0x2462da,_0x85ca25){return 0x3e8*(_0x85ca25[0x0]-_0x2462da[0x0])+(_0x85ca25[0x1]-_0x2462da[0x1])/0xf4240;};else try{let {performance:_0x4e99e4}=require(_0x4a4d00(0x149));_0x12a7f8=function(){var _0x3af373=_0x4a4d00;return _0x4e99e4[_0x3af373(0x186)]();};}catch{_0x12a7f8=function(){return+new Date();};}}return{'elapsed':_0xb7917e,'timeStamp':_0x12a7f8,'now':()=>Date[_0x4a4d00(0x186)]()};}function J(_0x3622cd,_0x1a0a0c,_0x4be277){var _0xc9da10=_0x2a0c0b;if(_0x3622cd[_0xc9da10(0x1b8)]!==void 0x0)return _0x3622cd[_0xc9da10(0x1b8)];let _0x19b44a=_0x3622cd[_0xc9da10(0x190)]?.['versions']?.[_0xc9da10(0x1cc)]||_0x3622cd[_0xc9da10(0x190)]?.[_0xc9da10(0x147)]?.[_0xc9da10(0x15e)]==='edge';return _0x19b44a&&_0x4be277==='nuxt'?_0x3622cd[_0xc9da10(0x1b8)]=!0x1:_0x3622cd[_0xc9da10(0x1b8)]=_0x19b44a||!_0x1a0a0c||_0x3622cd[_0xc9da10(0x1d9)]?.[_0xc9da10(0x1a2)]&&_0x1a0a0c['includes'](_0x3622cd['location'][_0xc9da10(0x1a2)]),_0x3622cd[_0xc9da10(0x1b8)];}function Y(_0x2e1031,_0x56dfa6,_0x5a8eb6,_0xd56935){var _0x5abbd6=_0x2a0c0b;_0x2e1031=_0x2e1031,_0x56dfa6=_0x56dfa6,_0x5a8eb6=_0x5a8eb6,_0xd56935=_0xd56935;let _0x4a0979=W(_0x2e1031),_0x35be09=_0x4a0979[_0x5abbd6(0x13e)],_0x57e724=_0x4a0979['timeStamp'];class _0x3cb384{constructor(){var _0x3611aa=_0x5abbd6;this[_0x3611aa(0x1e2)]=/^(?!(?:do|if|in|for|let|new|try|var|case|else|enum|eval|false|null|this|true|void|with|break|catch|class|const|super|throw|while|yield|delete|export|import|public|return|static|switch|typeof|default|extends|finally|package|private|continue|debugger|function|arguments|interface|protected|implements|instanceof)$)[_$a-zA-Z\\xA0-\\uFFFF][_$a-zA-Z0-9\\xA0-\\uFFFF]*$/,this['_numberRegExp']=/^(0|[1-9][0-9]*)$/,this[_0x3611aa(0x18a)]=/'([^\\\\']|\\\\')*'/,this[_0x3611aa(0x1a3)]=_0x2e1031[_0x3611aa(0x1ab)],this['_HTMLAllCollection']=_0x2e1031[_0x3611aa(0x123)],this[_0x3611aa(0x15a)]=Object['getOwnPropertyDescriptor'],this[_0x3611aa(0x120)]=Object[_0x3611aa(0x194)],this[_0x3611aa(0x1e4)]=_0x2e1031[_0x3611aa(0x1e3)],this[_0x3611aa(0x1c2)]=RegExp[_0x3611aa(0x188)]['toString'],this['_dateToString']=Date[_0x3611aa(0x188)][_0x3611aa(0x1ba)];}[_0x5abbd6(0x152)](_0x47f7bd,_0x41631e,_0x161d5a,_0x36dad2){var _0x53888c=_0x5abbd6,_0x1f4a79=this,_0x2a97ee=_0x161d5a[_0x53888c(0x1f5)];function _0x5a2896(_0x8fe980,_0x5589a1,_0x315b05){var _0x58284c=_0x53888c;_0x5589a1['type']=_0x58284c(0x134),_0x5589a1[_0x58284c(0x14b)]=_0x8fe980[_0x58284c(0x16c)],_0x32dcce=_0x315b05[_0x58284c(0x1cc)]['current'],_0x315b05[_0x58284c(0x1cc)][_0x58284c(0x17a)]=_0x5589a1,_0x1f4a79[_0x58284c(0x184)](_0x5589a1,_0x315b05);}try{_0x161d5a[_0x53888c(0x1d5)]++,_0x161d5a[_0x53888c(0x1f5)]&&_0x161d5a[_0x53888c(0x16e)][_0x53888c(0x1e6)](_0x41631e);var _0x20ce3c,_0x28688c,_0x1c1043,_0x277789,_0x2c78db=[],_0x1a27f7=[],_0x22d5e1,_0x14d4f5=this[_0x53888c(0x126)](_0x41631e),_0x35a8c9=_0x14d4f5==='array',_0x22d16b=!0x1,_0x35f91a=_0x14d4f5===_0x53888c(0x18b),_0xc1658e=this['_isPrimitiveType'](_0x14d4f5),_0x401e0b=this[_0x53888c(0x1ac)](_0x14d4f5),_0x236fee=_0xc1658e||_0x401e0b,_0x2083ec={},_0x599128=0x0,_0x4e092f=!0x1,_0x32dcce,_0x17c35f=/^(([1-9]{1}[0-9]*)|0)$/;if(_0x161d5a[_0x53888c(0x17c)]){if(_0x35a8c9){if(_0x28688c=_0x41631e['length'],_0x28688c>_0x161d5a['elements']){for(_0x1c1043=0x0,_0x277789=_0x161d5a[_0x53888c(0x171)],_0x20ce3c=_0x1c1043;_0x20ce3c<_0x277789;_0x20ce3c++)_0x1a27f7[_0x53888c(0x1e6)](_0x1f4a79['_addProperty'](_0x2c78db,_0x41631e,_0x14d4f5,_0x20ce3c,_0x161d5a));_0x47f7bd[_0x53888c(0x162)]=!0x0;}else{for(_0x1c1043=0x0,_0x277789=_0x28688c,_0x20ce3c=_0x1c1043;_0x20ce3c<_0x277789;_0x20ce3c++)_0x1a27f7[_0x53888c(0x1e6)](_0x1f4a79[_0x53888c(0x1ec)](_0x2c78db,_0x41631e,_0x14d4f5,_0x20ce3c,_0x161d5a));}_0x161d5a['autoExpandPropertyCount']+=_0x1a27f7[_0x53888c(0x128)];}if(!(_0x14d4f5==='null'||_0x14d4f5==='undefined')&&!_0xc1658e&&_0x14d4f5!==_0x53888c(0x1f6)&&_0x14d4f5!==_0x53888c(0x1cd)&&_0x14d4f5!=='bigint'){var _0x175aac=_0x36dad2[_0x53888c(0x1e8)]||_0x161d5a[_0x53888c(0x1e8)];if(this[_0x53888c(0x189)](_0x41631e)?(_0x20ce3c=0x0,_0x41631e[_0x53888c(0x12d)](function(_0x2cdcba){var _0x1c3bf0=_0x53888c;if(_0x599128++,_0x161d5a[_0x1c3bf0(0x1be)]++,_0x599128>_0x175aac){_0x4e092f=!0x0;return;}if(!_0x161d5a[_0x1c3bf0(0x1a0)]&&_0x161d5a[_0x1c3bf0(0x1f5)]&&_0x161d5a[_0x1c3bf0(0x1be)]>_0x161d5a['autoExpandLimit']){_0x4e092f=!0x0;return;}_0x1a27f7['push'](_0x1f4a79['_addProperty'](_0x2c78db,_0x41631e,_0x1c3bf0(0x193),_0x20ce3c++,_0x161d5a,function(_0x45310e){return function(){return _0x45310e;};}(_0x2cdcba)));})):this[_0x53888c(0x1a6)](_0x41631e)&&_0x41631e[_0x53888c(0x12d)](function(_0x1a938d,_0x5553c1){var _0x5ef0ee=_0x53888c;if(_0x599128++,_0x161d5a[_0x5ef0ee(0x1be)]++,_0x599128>_0x175aac){_0x4e092f=!0x0;return;}if(!_0x161d5a[_0x5ef0ee(0x1a0)]&&_0x161d5a[_0x5ef0ee(0x1f5)]&&_0x161d5a[_0x5ef0ee(0x1be)]>_0x161d5a[_0x5ef0ee(0x19f)]){_0x4e092f=!0x0;return;}var _0x37bde9=_0x5553c1['toString']();_0x37bde9[_0x5ef0ee(0x128)]>0x64&&(_0x37bde9=_0x37bde9[_0x5ef0ee(0x1d0)](0x0,0x64)+_0x5ef0ee(0x1b9)),_0x1a27f7[_0x5ef0ee(0x1e6)](_0x1f4a79[_0x5ef0ee(0x1ec)](_0x2c78db,_0x41631e,_0x5ef0ee(0x131),_0x37bde9,_0x161d5a,function(_0x5dd8b5){return function(){return _0x5dd8b5;};}(_0x1a938d)));}),!_0x22d16b){try{for(_0x22d5e1 in _0x41631e)if(!(_0x35a8c9&&_0x17c35f['test'](_0x22d5e1))&&!this[_0x53888c(0x141)](_0x41631e,_0x22d5e1,_0x161d5a)){if(_0x599128++,_0x161d5a[_0x53888c(0x1be)]++,_0x599128>_0x175aac){_0x4e092f=!0x0;break;}if(!_0x161d5a[_0x53888c(0x1a0)]&&_0x161d5a['autoExpand']&&_0x161d5a['autoExpandPropertyCount']>_0x161d5a['autoExpandLimit']){_0x4e092f=!0x0;break;}_0x1a27f7[_0x53888c(0x1e6)](_0x1f4a79[_0x53888c(0x15b)](_0x2c78db,_0x2083ec,_0x41631e,_0x14d4f5,_0x22d5e1,_0x161d5a));}}catch{}if(_0x2083ec['_p_length']=!0x0,_0x35f91a&&(_0x2083ec[_0x53888c(0x14f)]=!0x0),!_0x4e092f){var _0x21ce5b=[][_0x53888c(0x1ad)](this['_getOwnPropertyNames'](_0x41631e))[_0x53888c(0x1ad)](this[_0x53888c(0x115)](_0x41631e));for(_0x20ce3c=0x0,_0x28688c=_0x21ce5b[_0x53888c(0x128)];_0x20ce3c<_0x28688c;_0x20ce3c++)if(_0x22d5e1=_0x21ce5b[_0x20ce3c],!(_0x35a8c9&&_0x17c35f['test'](_0x22d5e1[_0x53888c(0x1ba)]()))&&!this['_blacklistedProperty'](_0x41631e,_0x22d5e1,_0x161d5a)&&!_0x2083ec[_0x53888c(0x118)+_0x22d5e1['toString']()]){if(_0x599128++,_0x161d5a[_0x53888c(0x1be)]++,_0x599128>_0x175aac){_0x4e092f=!0x0;break;}if(!_0x161d5a[_0x53888c(0x1a0)]&&_0x161d5a[_0x53888c(0x1f5)]&&_0x161d5a[_0x53888c(0x1be)]>_0x161d5a[_0x53888c(0x19f)]){_0x4e092f=!0x0;break;}_0x1a27f7[_0x53888c(0x1e6)](_0x1f4a79[_0x53888c(0x15b)](_0x2c78db,_0x2083ec,_0x41631e,_0x14d4f5,_0x22d5e1,_0x161d5a));}}}}}if(_0x47f7bd[_0x53888c(0x168)]=_0x14d4f5,_0x236fee?(_0x47f7bd[_0x53888c(0x1b7)]=_0x41631e[_0x53888c(0x17d)](),this[_0x53888c(0x1d8)](_0x14d4f5,_0x47f7bd,_0x161d5a,_0x36dad2)):_0x14d4f5===_0x53888c(0x1c4)?_0x47f7bd[_0x53888c(0x1b7)]=this['_dateToString'][_0x53888c(0x1f3)](_0x41631e):_0x14d4f5===_0x53888c(0x174)?_0x47f7bd[_0x53888c(0x1b7)]=_0x41631e[_0x53888c(0x1ba)]():_0x14d4f5==='RegExp'?_0x47f7bd[_0x53888c(0x1b7)]=this[_0x53888c(0x1c2)]['call'](_0x41631e):_0x14d4f5==='symbol'&&this['_Symbol']?_0x47f7bd[_0x53888c(0x1b7)]=this[_0x53888c(0x1e4)][_0x53888c(0x188)][_0x53888c(0x1ba)][_0x53888c(0x1f3)](_0x41631e):!_0x161d5a[_0x53888c(0x17c)]&&!(_0x14d4f5===_0x53888c(0x13a)||_0x14d4f5===_0x53888c(0x1ab))&&(delete _0x47f7bd[_0x53888c(0x1b7)],_0x47f7bd[_0x53888c(0x199)]=!0x0),_0x4e092f&&(_0x47f7bd[_0x53888c(0x11a)]=!0x0),_0x32dcce=_0x161d5a[_0x53888c(0x1cc)][_0x53888c(0x17a)],_0x161d5a[_0x53888c(0x1cc)]['current']=_0x47f7bd,this[_0x53888c(0x184)](_0x47f7bd,_0x161d5a),_0x1a27f7[_0x53888c(0x128)]){for(_0x20ce3c=0x0,_0x28688c=_0x1a27f7[_0x53888c(0x128)];_0x20ce3c<_0x28688c;_0x20ce3c++)_0x1a27f7[_0x20ce3c](_0x20ce3c);}_0x2c78db[_0x53888c(0x128)]&&(_0x47f7bd[_0x53888c(0x1e8)]=_0x2c78db);}catch(_0x4403a7){_0x5a2896(_0x4403a7,_0x47f7bd,_0x161d5a);}return this[_0x53888c(0x1f1)](_0x41631e,_0x47f7bd),this[_0x53888c(0x15f)](_0x47f7bd,_0x161d5a),_0x161d5a['node'][_0x53888c(0x17a)]=_0x32dcce,_0x161d5a[_0x53888c(0x1d5)]--,_0x161d5a[_0x53888c(0x1f5)]=_0x2a97ee,_0x161d5a['autoExpand']&&_0x161d5a[_0x53888c(0x16e)]['pop'](),_0x47f7bd;}[_0x5abbd6(0x115)](_0x59bf5c){var _0x299946=_0x5abbd6;return Object[_0x299946(0x17f)]?Object[_0x299946(0x17f)](_0x59bf5c):[];}[_0x5abbd6(0x189)](_0x39ac3a){var _0x179b3f=_0x5abbd6;return!!(_0x39ac3a&&_0x2e1031[_0x179b3f(0x193)]&&this[_0x179b3f(0x14d)](_0x39ac3a)===_0x179b3f(0x1a7)&&_0x39ac3a['forEach']);}['_blacklistedProperty'](_0x51015b,_0x5b7639,_0x52516d){var _0x4d107e=_0x5abbd6;return _0x52516d[_0x4d107e(0x13d)]?typeof _0x51015b[_0x5b7639]==_0x4d107e(0x18b):!0x1;}[_0x5abbd6(0x126)](_0x59ad53){var _0x56e2f3=_0x5abbd6,_0x331c29='';return _0x331c29=typeof _0x59ad53,_0x331c29===_0x56e2f3(0x1bd)?this[_0x56e2f3(0x14d)](_0x59ad53)==='[object\\x20Array]'?_0x331c29=_0x56e2f3(0x1aa):this[_0x56e2f3(0x14d)](_0x59ad53)===_0x56e2f3(0x11d)?_0x331c29='date':this[_0x56e2f3(0x14d)](_0x59ad53)==='[object\\x20BigInt]'?_0x331c29='bigint':_0x59ad53===null?_0x331c29=_0x56e2f3(0x13a):_0x59ad53[_0x56e2f3(0x133)]&&(_0x331c29=_0x59ad53[_0x56e2f3(0x133)][_0x56e2f3(0x16b)]||_0x331c29):_0x331c29===_0x56e2f3(0x1ab)&&this['_HTMLAllCollection']&&_0x59ad53 instanceof this['_HTMLAllCollection']&&(_0x331c29=_0x56e2f3(0x123)),_0x331c29;}[_0x5abbd6(0x14d)](_0x2ac758){var _0x3887f4=_0x5abbd6;return Object[_0x3887f4(0x188)][_0x3887f4(0x1ba)][_0x3887f4(0x1f3)](_0x2ac758);}[_0x5abbd6(0x1a9)](_0x584497){var _0x5a6350=_0x5abbd6;return _0x584497==='boolean'||_0x584497===_0x5a6350(0x1b1)||_0x584497===_0x5a6350(0x180);}['_isPrimitiveWrapperType'](_0x404ae9){var _0x321cb7=_0x5abbd6;return _0x404ae9===_0x321cb7(0x1ef)||_0x404ae9==='String'||_0x404ae9==='Number';}['_addProperty'](_0x39a6ca,_0x1c6f48,_0x57a513,_0x49e8c5,_0x704a4,_0x230c65){var _0x48e96b=this;return function(_0x58b51d){var _0x516890=_0x8b30,_0x26dc75=_0x704a4[_0x516890(0x1cc)][_0x516890(0x17a)],_0x18b7a7=_0x704a4[_0x516890(0x1cc)][_0x516890(0x137)],_0x3d663f=_0x704a4['node'][_0x516890(0x138)];_0x704a4['node'][_0x516890(0x138)]=_0x26dc75,_0x704a4[_0x516890(0x1cc)][_0x516890(0x137)]=typeof _0x49e8c5==_0x516890(0x180)?_0x49e8c5:_0x58b51d,_0x39a6ca['push'](_0x48e96b[_0x516890(0x179)](_0x1c6f48,_0x57a513,_0x49e8c5,_0x704a4,_0x230c65)),_0x704a4[_0x516890(0x1cc)]['parent']=_0x3d663f,_0x704a4[_0x516890(0x1cc)][_0x516890(0x137)]=_0x18b7a7;};}[_0x5abbd6(0x15b)](_0x23e413,_0x35449e,_0x133d65,_0x4728a5,_0x233005,_0x478760,_0x2980f6){var _0x1f56d1=_0x5abbd6,_0x464889=this;return _0x35449e['_p_'+_0x233005[_0x1f56d1(0x1ba)]()]=!0x0,function(_0x239adf){var _0x54a132=_0x1f56d1,_0x2d9107=_0x478760[_0x54a132(0x1cc)]['current'],_0x406bcc=_0x478760[_0x54a132(0x1cc)][_0x54a132(0x137)],_0xc35e18=_0x478760['node']['parent'];_0x478760[_0x54a132(0x1cc)][_0x54a132(0x138)]=_0x2d9107,_0x478760['node'][_0x54a132(0x137)]=_0x239adf,_0x23e413[_0x54a132(0x1e6)](_0x464889['_property'](_0x133d65,_0x4728a5,_0x233005,_0x478760,_0x2980f6)),_0x478760[_0x54a132(0x1cc)]['parent']=_0xc35e18,_0x478760[_0x54a132(0x1cc)]['index']=_0x406bcc;};}[_0x5abbd6(0x179)](_0x5784cf,_0x265cf0,_0x53ee12,_0x3fa88c,_0x2a92ad){var _0x5b3bfa=_0x5abbd6,_0x9b6793=this;_0x2a92ad||(_0x2a92ad=function(_0x464c4a,_0xe8ab7e){return _0x464c4a[_0xe8ab7e];});var _0xfd5633=_0x53ee12[_0x5b3bfa(0x1ba)](),_0xac07f1=_0x3fa88c['expressionsToEvaluate']||{},_0x50e1d8=_0x3fa88c[_0x5b3bfa(0x17c)],_0x7b3925=_0x3fa88c['isExpressionToEvaluate'];try{var _0x2001af=this[_0x5b3bfa(0x1a6)](_0x5784cf),_0x1f2c58=_0xfd5633;_0x2001af&&_0x1f2c58[0x0]==='\\x27'&&(_0x1f2c58=_0x1f2c58[_0x5b3bfa(0x1a4)](0x1,_0x1f2c58['length']-0x2));var _0x2836f2=_0x3fa88c['expressionsToEvaluate']=_0xac07f1[_0x5b3bfa(0x118)+_0x1f2c58];_0x2836f2&&(_0x3fa88c[_0x5b3bfa(0x17c)]=_0x3fa88c['depth']+0x1),_0x3fa88c[_0x5b3bfa(0x1a0)]=!!_0x2836f2;var _0x42b17d=typeof _0x53ee12==_0x5b3bfa(0x19a),_0x5010a1={'name':_0x42b17d||_0x2001af?_0xfd5633:this[_0x5b3bfa(0x11e)](_0xfd5633)};if(_0x42b17d&&(_0x5010a1['symbol']=!0x0),!(_0x265cf0===_0x5b3bfa(0x1aa)||_0x265cf0==='Error')){var _0x1df58a=this[_0x5b3bfa(0x15a)](_0x5784cf,_0x53ee12);if(_0x1df58a&&(_0x1df58a[_0x5b3bfa(0x1cf)]&&(_0x5010a1[_0x5b3bfa(0x12b)]=!0x0),_0x1df58a[_0x5b3bfa(0x16d)]&&!_0x2836f2&&!_0x3fa88c[_0x5b3bfa(0x1bf)]))return _0x5010a1['getter']=!0x0,this['_processTreeNodeResult'](_0x5010a1,_0x3fa88c),_0x5010a1;}var _0x2d0738;try{_0x2d0738=_0x2a92ad(_0x5784cf,_0x53ee12);}catch(_0x59081c){return _0x5010a1={'name':_0xfd5633,'type':_0x5b3bfa(0x134),'error':_0x59081c[_0x5b3bfa(0x16c)]},this[_0x5b3bfa(0x176)](_0x5010a1,_0x3fa88c),_0x5010a1;}var _0xcd1d2b=this['_type'](_0x2d0738),_0x53beda=this[_0x5b3bfa(0x1a9)](_0xcd1d2b);if(_0x5010a1['type']=_0xcd1d2b,_0x53beda)this[_0x5b3bfa(0x176)](_0x5010a1,_0x3fa88c,_0x2d0738,function(){var _0x3dc8f7=_0x5b3bfa;_0x5010a1[_0x3dc8f7(0x1b7)]=_0x2d0738[_0x3dc8f7(0x17d)](),!_0x2836f2&&_0x9b6793[_0x3dc8f7(0x1d8)](_0xcd1d2b,_0x5010a1,_0x3fa88c,{});});else{var _0x5a7fc1=_0x3fa88c[_0x5b3bfa(0x1f5)]&&_0x3fa88c[_0x5b3bfa(0x1d5)]<_0x3fa88c[_0x5b3bfa(0x1d3)]&&_0x3fa88c['autoExpandPreviousObjects']['indexOf'](_0x2d0738)<0x0&&_0xcd1d2b!==_0x5b3bfa(0x18b)&&_0x3fa88c[_0x5b3bfa(0x1be)]<_0x3fa88c[_0x5b3bfa(0x19f)];_0x5a7fc1||_0x3fa88c[_0x5b3bfa(0x1d5)]<_0x50e1d8||_0x2836f2?(this[_0x5b3bfa(0x152)](_0x5010a1,_0x2d0738,_0x3fa88c,_0x2836f2||{}),this[_0x5b3bfa(0x1f1)](_0x2d0738,_0x5010a1)):this[_0x5b3bfa(0x176)](_0x5010a1,_0x3fa88c,_0x2d0738,function(){var _0x1d8376=_0x5b3bfa;_0xcd1d2b===_0x1d8376(0x13a)||_0xcd1d2b===_0x1d8376(0x1ab)||(delete _0x5010a1[_0x1d8376(0x1b7)],_0x5010a1[_0x1d8376(0x199)]=!0x0);});}return _0x5010a1;}finally{_0x3fa88c[_0x5b3bfa(0x196)]=_0xac07f1,_0x3fa88c['depth']=_0x50e1d8,_0x3fa88c[_0x5b3bfa(0x1a0)]=_0x7b3925;}}[_0x5abbd6(0x1d8)](_0x51f77d,_0x49d693,_0x199d50,_0x3747b3){var _0x506539=_0x5abbd6,_0x197c6=_0x3747b3['strLength']||_0x199d50[_0x506539(0x1a1)];if((_0x51f77d===_0x506539(0x1b1)||_0x51f77d===_0x506539(0x1f6))&&_0x49d693['value']){let _0x196af8=_0x49d693[_0x506539(0x1b7)][_0x506539(0x128)];_0x199d50[_0x506539(0x1f8)]+=_0x196af8,_0x199d50[_0x506539(0x1f8)]>_0x199d50[_0x506539(0x1df)]?(_0x49d693['capped']='',delete _0x49d693['value']):_0x196af8>_0x197c6&&(_0x49d693[_0x506539(0x199)]=_0x49d693[_0x506539(0x1b7)][_0x506539(0x1a4)](0x0,_0x197c6),delete _0x49d693['value']);}}[_0x5abbd6(0x1a6)](_0xc4f25d){var _0x20b2d4=_0x5abbd6;return!!(_0xc4f25d&&_0x2e1031['Map']&&this[_0x20b2d4(0x14d)](_0xc4f25d)===_0x20b2d4(0x1c9)&&_0xc4f25d['forEach']);}[_0x5abbd6(0x11e)](_0x130dec){var _0x3522ba=_0x5abbd6;if(_0x130dec[_0x3522ba(0x1bb)](/^\\d+$/))return _0x130dec;var _0x41ac7e;try{_0x41ac7e=JSON[_0x3522ba(0x132)](''+_0x130dec);}catch{_0x41ac7e='\\x22'+this[_0x3522ba(0x14d)](_0x130dec)+'\\x22';}return _0x41ac7e[_0x3522ba(0x1bb)](/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)?_0x41ac7e=_0x41ac7e[_0x3522ba(0x1a4)](0x1,_0x41ac7e[_0x3522ba(0x128)]-0x2):_0x41ac7e=_0x41ac7e[_0x3522ba(0x1f9)](/'/g,'\\x5c\\x27')[_0x3522ba(0x1f9)](/\\\\\"/g,'\\x22')['replace'](/(^\"|\"$)/g,'\\x27'),_0x41ac7e;}[_0x5abbd6(0x176)](_0xfb5dfb,_0x3efdbd,_0x341ed5,_0x2acafa){var _0x34b16a=_0x5abbd6;this[_0x34b16a(0x184)](_0xfb5dfb,_0x3efdbd),_0x2acafa&&_0x2acafa(),this[_0x34b16a(0x1f1)](_0x341ed5,_0xfb5dfb),this[_0x34b16a(0x15f)](_0xfb5dfb,_0x3efdbd);}[_0x5abbd6(0x184)](_0x310b36,_0xd6f7c9){var _0x95d52a=_0x5abbd6;this['_setNodeId'](_0x310b36,_0xd6f7c9),this[_0x95d52a(0x146)](_0x310b36,_0xd6f7c9),this[_0x95d52a(0x1c8)](_0x310b36,_0xd6f7c9),this['_setNodePermissions'](_0x310b36,_0xd6f7c9);}[_0x5abbd6(0x155)](_0x302ec4,_0x2ac3ca){}[_0x5abbd6(0x146)](_0x91431c,_0x312a8e){}[_0x5abbd6(0x119)](_0xa12674,_0x1fc23c){}[_0x5abbd6(0x1f0)](_0x32693e){var _0x2f98e1=_0x5abbd6;return _0x32693e===this[_0x2f98e1(0x1a3)];}[_0x5abbd6(0x15f)](_0x1a07f9,_0x1a1985){var _0x426cbf=_0x5abbd6;this[_0x426cbf(0x119)](_0x1a07f9,_0x1a1985),this[_0x426cbf(0x1d1)](_0x1a07f9),_0x1a1985[_0x426cbf(0x175)]&&this[_0x426cbf(0x1b2)](_0x1a07f9),this[_0x426cbf(0x167)](_0x1a07f9,_0x1a1985),this[_0x426cbf(0x12e)](_0x1a07f9,_0x1a1985),this['_cleanNode'](_0x1a07f9);}['_additionalMetadata'](_0x4d4269,_0x401a68){var _0x58101a=_0x5abbd6;let _0x49c194;try{_0x2e1031[_0x58101a(0x1ca)]&&(_0x49c194=_0x2e1031[_0x58101a(0x1ca)]['error'],_0x2e1031[_0x58101a(0x1ca)][_0x58101a(0x14b)]=function(){}),_0x4d4269&&typeof _0x4d4269[_0x58101a(0x128)]==_0x58101a(0x180)&&(_0x401a68[_0x58101a(0x128)]=_0x4d4269[_0x58101a(0x128)]);}catch{}finally{_0x49c194&&(_0x2e1031[_0x58101a(0x1ca)][_0x58101a(0x14b)]=_0x49c194);}if(_0x401a68[_0x58101a(0x168)]===_0x58101a(0x180)||_0x401a68[_0x58101a(0x168)]===_0x58101a(0x160)){if(isNaN(_0x401a68['value']))_0x401a68['nan']=!0x0,delete _0x401a68[_0x58101a(0x1b7)];else switch(_0x401a68[_0x58101a(0x1b7)]){case Number[_0x58101a(0x11b)]:_0x401a68[_0x58101a(0x198)]=!0x0,delete _0x401a68[_0x58101a(0x1b7)];break;case Number['NEGATIVE_INFINITY']:_0x401a68[_0x58101a(0x164)]=!0x0,delete _0x401a68[_0x58101a(0x1b7)];break;case 0x0:this['_isNegativeZero'](_0x401a68[_0x58101a(0x1b7)])&&(_0x401a68[_0x58101a(0x1fa)]=!0x0);break;}}else _0x401a68[_0x58101a(0x168)]==='function'&&typeof _0x4d4269[_0x58101a(0x16b)]==_0x58101a(0x1b1)&&_0x4d4269[_0x58101a(0x16b)]&&_0x401a68[_0x58101a(0x16b)]&&_0x4d4269[_0x58101a(0x16b)]!==_0x401a68[_0x58101a(0x16b)]&&(_0x401a68['funcName']=_0x4d4269[_0x58101a(0x16b)]);}[_0x5abbd6(0x1b5)](_0x438c6a){var _0x4fbe85=_0x5abbd6;return 0x1/_0x438c6a===Number[_0x4fbe85(0x124)];}[_0x5abbd6(0x1b2)](_0x52a500){var _0x459063=_0x5abbd6;!_0x52a500['props']||!_0x52a500[_0x459063(0x1e8)][_0x459063(0x128)]||_0x52a500['type']===_0x459063(0x1aa)||_0x52a500[_0x459063(0x168)]==='Map'||_0x52a500[_0x459063(0x168)]===_0x459063(0x193)||_0x52a500[_0x459063(0x1e8)][_0x459063(0x1c6)](function(_0x329ab9,_0x188dc5){var _0xdc6f34=_0x459063,_0x3f3573=_0x329ab9[_0xdc6f34(0x16b)][_0xdc6f34(0x156)](),_0x2fe0ba=_0x188dc5[_0xdc6f34(0x16b)][_0xdc6f34(0x156)]();return _0x3f3573<_0x2fe0ba?-0x1:_0x3f3573>_0x2fe0ba?0x1:0x0;});}[_0x5abbd6(0x167)](_0x114707,_0x58fa8){var _0x405ee3=_0x5abbd6;if(!(_0x58fa8[_0x405ee3(0x13d)]||!_0x114707[_0x405ee3(0x1e8)]||!_0x114707[_0x405ee3(0x1e8)][_0x405ee3(0x128)])){for(var _0x5d2b19=[],_0xebad3e=[],_0x24d6a1=0x0,_0x2ec318=_0x114707[_0x405ee3(0x1e8)][_0x405ee3(0x128)];_0x24d6a1<_0x2ec318;_0x24d6a1++){var _0x41775b=_0x114707[_0x405ee3(0x1e8)][_0x24d6a1];_0x41775b[_0x405ee3(0x168)]===_0x405ee3(0x18b)?_0x5d2b19[_0x405ee3(0x1e6)](_0x41775b):_0xebad3e[_0x405ee3(0x1e6)](_0x41775b);}if(!(!_0xebad3e[_0x405ee3(0x128)]||_0x5d2b19[_0x405ee3(0x128)]<=0x1)){_0x114707[_0x405ee3(0x1e8)]=_0xebad3e;var _0x5c4a19={'functionsNode':!0x0,'props':_0x5d2b19};this[_0x405ee3(0x155)](_0x5c4a19,_0x58fa8),this[_0x405ee3(0x119)](_0x5c4a19,_0x58fa8),this[_0x405ee3(0x1d1)](_0x5c4a19),this['_setNodePermissions'](_0x5c4a19,_0x58fa8),_0x5c4a19['id']+='\\x20f',_0x114707[_0x405ee3(0x1e8)][_0x405ee3(0x1da)](_0x5c4a19);}}}[_0x5abbd6(0x12e)](_0x448a34,_0x35ce0a){}[_0x5abbd6(0x1d1)](_0x581134){}[_0x5abbd6(0x116)](_0x209d9b){var _0x953bf1=_0x5abbd6;return Array['isArray'](_0x209d9b)||typeof _0x209d9b=='object'&&this[_0x953bf1(0x14d)](_0x209d9b)==='[object\\x20Array]';}['_setNodePermissions'](_0x58e709,_0x402fb7){}[_0x5abbd6(0x136)](_0x16c098){var _0x30c4f4=_0x5abbd6;delete _0x16c098[_0x30c4f4(0x144)],delete _0x16c098['_hasSetOnItsPath'],delete _0x16c098[_0x30c4f4(0x1c0)];}[_0x5abbd6(0x1c8)](_0x4730a9,_0x7f30fa){}}let _0x45105d=new _0x3cb384(),_0x818d6b={'props':0x64,'elements':0x64,'strLength':0x400*0x32,'totalStrLength':0x400*0x32,'autoExpandLimit':0x1388,'autoExpandMaxDepth':0xa},_0x202a09={'props':0x5,'elements':0x5,'strLength':0x100,'totalStrLength':0x100*0x3,'autoExpandLimit':0x1e,'autoExpandMaxDepth':0x2};function _0x1e07cc(_0x1c3569,_0x5be667,_0x5853f6,_0x3dff21,_0x44d7b6,_0x140be2){var _0x4e4a9b=_0x5abbd6;let _0x219114,_0x3e828d;try{_0x3e828d=_0x57e724(),_0x219114=_0x5a8eb6[_0x5be667],!_0x219114||_0x3e828d-_0x219114['ts']>0x1f4&&_0x219114[_0x4e4a9b(0x1f7)]&&_0x219114[_0x4e4a9b(0x1e1)]/_0x219114[_0x4e4a9b(0x1f7)]<0x64?(_0x5a8eb6[_0x5be667]=_0x219114={'count':0x0,'time':0x0,'ts':_0x3e828d},_0x5a8eb6['hits']={}):_0x3e828d-_0x5a8eb6[_0x4e4a9b(0x1fd)]['ts']>0x32&&_0x5a8eb6[_0x4e4a9b(0x1fd)]['count']&&_0x5a8eb6[_0x4e4a9b(0x1fd)]['time']/_0x5a8eb6[_0x4e4a9b(0x1fd)][_0x4e4a9b(0x1f7)]<0x64&&(_0x5a8eb6[_0x4e4a9b(0x1fd)]={});let _0x2163be=[],_0x24679f=_0x219114[_0x4e4a9b(0x157)]||_0x5a8eb6[_0x4e4a9b(0x1fd)][_0x4e4a9b(0x157)]?_0x202a09:_0x818d6b,_0x3b160e=_0x1814b1=>{var _0x2462d4=_0x4e4a9b;let _0x19817d={};return _0x19817d[_0x2462d4(0x1e8)]=_0x1814b1[_0x2462d4(0x1e8)],_0x19817d[_0x2462d4(0x171)]=_0x1814b1[_0x2462d4(0x171)],_0x19817d[_0x2462d4(0x1a1)]=_0x1814b1[_0x2462d4(0x1a1)],_0x19817d['totalStrLength']=_0x1814b1[_0x2462d4(0x1df)],_0x19817d[_0x2462d4(0x19f)]=_0x1814b1['autoExpandLimit'],_0x19817d[_0x2462d4(0x1d3)]=_0x1814b1[_0x2462d4(0x1d3)],_0x19817d[_0x2462d4(0x175)]=!0x1,_0x19817d[_0x2462d4(0x13d)]=!_0x56dfa6,_0x19817d['depth']=0x1,_0x19817d[_0x2462d4(0x1d5)]=0x0,_0x19817d[_0x2462d4(0x172)]=_0x2462d4(0x114),_0x19817d[_0x2462d4(0x129)]='root_exp',_0x19817d[_0x2462d4(0x1f5)]=!0x0,_0x19817d[_0x2462d4(0x16e)]=[],_0x19817d['autoExpandPropertyCount']=0x0,_0x19817d[_0x2462d4(0x1bf)]=!0x0,_0x19817d['allStrLength']=0x0,_0x19817d[_0x2462d4(0x1cc)]={'current':void 0x0,'parent':void 0x0,'index':0x0},_0x19817d;};for(var _0x384e62=0x0;_0x384e62<_0x44d7b6[_0x4e4a9b(0x128)];_0x384e62++)_0x2163be['push'](_0x45105d['serialize']({'timeNode':_0x1c3569==='time'||void 0x0},_0x44d7b6[_0x384e62],_0x3b160e(_0x24679f),{}));if(_0x1c3569===_0x4e4a9b(0x159)){let _0x693710=Error['stackTraceLimit'];try{Error['stackTraceLimit']=0x1/0x0,_0x2163be[_0x4e4a9b(0x1e6)](_0x45105d['serialize']({'stackNode':!0x0},new Error()[_0x4e4a9b(0x170)],_0x3b160e(_0x24679f),{'strLength':0x1/0x0}));}finally{Error['stackTraceLimit']=_0x693710;}}return{'method':_0x4e4a9b(0x1f2),'version':_0xd56935,'args':[{'ts':_0x5853f6,'session':_0x3dff21,'args':_0x2163be,'id':_0x5be667,'context':_0x140be2}]};}catch(_0x5b97ea){return{'method':_0x4e4a9b(0x1f2),'version':_0xd56935,'args':[{'ts':_0x5853f6,'session':_0x3dff21,'args':[{'type':_0x4e4a9b(0x134),'error':_0x5b97ea&&_0x5b97ea['message']}],'id':_0x5be667,'context':_0x140be2}]};}finally{try{if(_0x219114&&_0x3e828d){let _0xebfdb8=_0x57e724();_0x219114['count']++,_0x219114[_0x4e4a9b(0x1e1)]+=_0x35be09(_0x3e828d,_0xebfdb8),_0x219114['ts']=_0xebfdb8,_0x5a8eb6['hits'][_0x4e4a9b(0x1f7)]++,_0x5a8eb6[_0x4e4a9b(0x1fd)][_0x4e4a9b(0x1e1)]+=_0x35be09(_0x3e828d,_0xebfdb8),_0x5a8eb6[_0x4e4a9b(0x1fd)]['ts']=_0xebfdb8,(_0x219114[_0x4e4a9b(0x1f7)]>0x32||_0x219114[_0x4e4a9b(0x1e1)]>0x64)&&(_0x219114['reduceLimits']=!0x0),(_0x5a8eb6[_0x4e4a9b(0x1fd)]['count']>0x3e8||_0x5a8eb6[_0x4e4a9b(0x1fd)]['time']>0x12c)&&(_0x5a8eb6[_0x4e4a9b(0x1fd)][_0x4e4a9b(0x157)]=!0x0);}}catch{}}}return _0x1e07cc;}((_0x352ff9,_0x3dd541,_0x23810c,_0x168673,_0x112f10,_0x30646a,_0x32fd9c,_0x165ceb,_0x278d6d,_0x548b5d)=>{var _0x3c2751=_0x2a0c0b;if(_0x352ff9['_console_ninja'])return _0x352ff9[_0x3c2751(0x1e5)];if(!J(_0x352ff9,_0x165ceb,_0x112f10))return _0x352ff9[_0x3c2751(0x1e5)]={'consoleLog':()=>{},'consoleTrace':()=>{},'consoleTime':()=>{},'consoleTimeEnd':()=>{},'autoLog':()=>{},'autoLogMany':()=>{},'autoTraceMany':()=>{},'coverage':()=>{},'autoTrace':()=>{},'autoTime':()=>{},'autoTimeEnd':()=>{}},_0x352ff9[_0x3c2751(0x1e5)];let _0x37d3b2=W(_0x352ff9),_0x285892=_0x37d3b2['elapsed'],_0x38f153=_0x37d3b2[_0x3c2751(0x19d)],_0x3cbfa8=_0x37d3b2[_0x3c2751(0x186)],_0xd766d8={'hits':{},'ts':{}},_0x58fe12=Y(_0x352ff9,_0x278d6d,_0xd766d8,_0x30646a),_0x15533b=_0x29cdb6=>{_0xd766d8['ts'][_0x29cdb6]=_0x38f153();},_0x88a67=(_0x346ea5,_0x9f5fa9)=>{let _0x1b5bbd=_0xd766d8['ts'][_0x9f5fa9];if(delete _0xd766d8['ts'][_0x9f5fa9],_0x1b5bbd){let _0xfedaef=_0x285892(_0x1b5bbd,_0x38f153());_0x312f4c(_0x58fe12('time',_0x346ea5,_0x3cbfa8(),_0x28c98f,[_0xfedaef],_0x9f5fa9));}},_0x17eac8=_0x396570=>_0x773a61=>{var _0x55e1f7=_0x3c2751;try{_0x15533b(_0x773a61),_0x396570(_0x773a61);}finally{_0x352ff9[_0x55e1f7(0x1ca)][_0x55e1f7(0x1e1)]=_0x396570;}},_0xe33597=_0x19d82c=>_0x333115=>{var _0x3baeea=_0x3c2751;try{let [_0x32f2f3,_0x16ccff]=_0x333115[_0x3baeea(0x145)](':logPointId:');_0x88a67(_0x16ccff,_0x32f2f3),_0x19d82c(_0x32f2f3);}finally{_0x352ff9[_0x3baeea(0x1ca)][_0x3baeea(0x161)]=_0x19d82c;}};_0x352ff9[_0x3c2751(0x1e5)]={'consoleLog':(_0x19f013,_0x350b28)=>{var _0x31c62a=_0x3c2751;_0x352ff9[_0x31c62a(0x1ca)][_0x31c62a(0x1f2)][_0x31c62a(0x16b)]!==_0x31c62a(0x1ed)&&_0x312f4c(_0x58fe12('log',_0x19f013,_0x3cbfa8(),_0x28c98f,_0x350b28));},'consoleTrace':(_0x2098d0,_0x20c5af)=>{var _0x28d020=_0x3c2751;_0x352ff9[_0x28d020(0x1ca)][_0x28d020(0x1f2)][_0x28d020(0x16b)]!==_0x28d020(0x13c)&&_0x312f4c(_0x58fe12(_0x28d020(0x159),_0x2098d0,_0x3cbfa8(),_0x28c98f,_0x20c5af));},'consoleTime':()=>{var _0x12416a=_0x3c2751;_0x352ff9[_0x12416a(0x1ca)]['time']=_0x17eac8(_0x352ff9[_0x12416a(0x1ca)][_0x12416a(0x1e1)]);},'consoleTimeEnd':()=>{var _0x2c64ac=_0x3c2751;_0x352ff9[_0x2c64ac(0x1ca)][_0x2c64ac(0x161)]=_0xe33597(_0x352ff9[_0x2c64ac(0x1ca)][_0x2c64ac(0x161)]);},'autoLog':(_0xbaa5eb,_0x59580f)=>{var _0xd01711=_0x3c2751;_0x312f4c(_0x58fe12(_0xd01711(0x1f2),_0x59580f,_0x3cbfa8(),_0x28c98f,[_0xbaa5eb]));},'autoLogMany':(_0x3083b2,_0x260fbf)=>{var _0xb52b41=_0x3c2751;_0x312f4c(_0x58fe12(_0xb52b41(0x1f2),_0x3083b2,_0x3cbfa8(),_0x28c98f,_0x260fbf));},'autoTrace':(_0x309738,_0x10f085)=>{var _0x46d44e=_0x3c2751;_0x312f4c(_0x58fe12(_0x46d44e(0x159),_0x10f085,_0x3cbfa8(),_0x28c98f,[_0x309738]));},'autoTraceMany':(_0x16808e,_0x5d7c97)=>{var _0x18eefb=_0x3c2751;_0x312f4c(_0x58fe12(_0x18eefb(0x159),_0x16808e,_0x3cbfa8(),_0x28c98f,_0x5d7c97));},'autoTime':(_0x513098,_0x5b120f,_0x26e988)=>{_0x15533b(_0x26e988);},'autoTimeEnd':(_0x4304b0,_0x43e622,_0x4db3f1)=>{_0x88a67(_0x43e622,_0x4db3f1);},'coverage':_0x1f2b1c=>{_0x312f4c({'method':'coverage','version':_0x30646a,'args':[{'id':_0x1f2b1c}]});}};let _0x312f4c=b(_0x352ff9,_0x3dd541,_0x23810c,_0x168673,_0x112f10,_0x548b5d),_0x28c98f=_0x352ff9[_0x3c2751(0x1b0)];return _0x352ff9[_0x3c2751(0x1e5)];})(globalThis,_0x2a0c0b(0x191),_0x2a0c0b(0x1a5),_0x2a0c0b(0x163),_0x2a0c0b(0x1ea),_0x2a0c0b(0x182),_0x2a0c0b(0x142),_0x2a0c0b(0x1cb),_0x2a0c0b(0x117),_0x2a0c0b(0x192));");
  } catch (e) {}
}
; /* istanbul ignore next */
function oo_oo(i) {
  for (var _len = arguments.length, v = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    v[_key - 1] = arguments[_key];
  }
  try {
    oo_cm().consoleLog(i, v);
  } catch (e) {}
  return v;
}
; /* istanbul ignore next */
function oo_tr(i) {
  for (var _len2 = arguments.length, v = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
    v[_key2 - 1] = arguments[_key2];
  }
  try {
    oo_cm().consoleTrace(i, v);
  } catch (e) {}
  return v;
}
; /* istanbul ignore next */
function oo_ts() {
  try {
    oo_cm().consoleTime();
  } catch (e) {}
}
; /* istanbul ignore next */
function oo_te() {
  try {
    oo_cm().consoleTimeEnd();
  } catch (e) {}
}
; /*eslint unicorn/no-abusive-eslint-disable:,eslint-comments/disable-enable-pair:,eslint-comments/no-unlimited-disable:,eslint-comments/no-aggregating-enable:,eslint-comments/no-duplicate-disable:,eslint-comments/no-unused-disable:,eslint-comments/no-unused-enable:,*/

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/plagiarism-checker.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\WebProjects\cmlabs-projects\php\tools\resources\js\plagiarism-checker.js */"./resources/js/plagiarism-checker.js");


/***/ })

/******/ });