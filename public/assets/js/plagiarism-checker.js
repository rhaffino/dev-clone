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

/* istanbul ignore next */

/* c8 ignore start */

/* eslint-disable */

;
function oo_cm() {
  try {

    return (0, eval)("globalThis._console_ninja") || (0, eval)("/* https://github.com/wallabyjs/console-ninja#how-does-it-work */'use strict';var _0x29ef0d=_0x5d6a;(function(_0x10f794,_0x49a3ea){var _0x218ce9=_0x5d6a,_0x2f55bd=_0x10f794();while(!![]){try{var _0x6abda6=parseInt(_0x218ce9(0x1f5))/0x1*(-parseInt(_0x218ce9(0x1d4))/0x2)+parseInt(_0x218ce9(0x159))/0x3+parseInt(_0x218ce9(0x228))/0x4+-parseInt(_0x218ce9(0x1ca))/0x5+parseInt(_0x218ce9(0x1ff))/0x6+-parseInt(_0x218ce9(0x16f))/0x7+parseInt(_0x218ce9(0x1f6))/0x8;if(_0x6abda6===_0x49a3ea)break;else _0x2f55bd['push'](_0x2f55bd['shift']());}catch(_0x172c1f){_0x2f55bd['push'](_0x2f55bd['shift']());}}}(_0x3855,0x63dbe));function _0x3855(){var _0xd50df=['toUpperCase','bigint','toString','date','Error','root_exp_id','autoExpandPropertyCount','function','catch','coverage','_allowedToConnectOnSend','timeStamp','Number','match','__es'+'Module','_property','args','map','constructor','_dateToString','_allowedToSend','data','send','includes','Map','_getOwnPropertyDescriptor','_treeNodePropertiesBeforeFullValue','_isUndefined','level','nan','getOwnPropertyNames','_propertyName','port','1','valueOf','unref','_isPrimitiveWrapperType','enumerable','current','autoExpandMaxDepth','%c\\x20Console\\x20Ninja\\x20extension\\x20is\\x20connected\\x20to\\x20','onerror','_getOwnPropertySymbols','_addFunctionsNode','_getOwnPropertyNames','log','POSITIVE_INFINITY','_console_ninja','method','expressionsToEvaluate','sortProps','console','type','array','hostname','host','_addProperty','isExpressionToEvaluate','length','Buffer','_maxConnectAttemptCount','_inBrowser','slice','elements','_isMap','_setNodeExpressionPath','error','nodeModules','[object\\x20Map]','test','then','performance','hrtime','_connected','onclose','remix','substr','_additionalMetadata','RegExp','2231255sLunUT','_addObjectProperty','_ws','concat','Boolean','unknown','count','hasOwnProperty','setter','[object\\x20Set]','1170196xThkCf','reload','_hasMapOnItsPath','charAt','index','getter','gateway.docker.internal','edge','_isSet','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host,\\x20see\\x20','_WebSocketClass','127.0.0.1','close','allStrLength','getWebSocketClass','autoExpandLimit','astro','_setNodeLabel','forEach','noFunctions','null','replace','[object\\x20Date]','getPrototypeOf','','angular','toLowerCase','_processTreeNodeResult','pathToFileURL','join','_sortProps','number','set','1Jlgvzj','7779168yewWTL','funcName','_isNegativeZero','props','isArray','_setNodePermissions','_console_ninja_session','','see\\x20https://tinyurl.com/2vt8jxzw\\x20for\\x20more\\x20info.','1063122MzCGSE','_WebSocket','negativeZero','_setNodeQueryPath','_inNextEdge','strLength','symbol','autoExpand','disabledLog','_disposeWebsocket','trace','stackTraceLimit','_capIfString','_quotedRegExp','_setNodeId','message','autoExpandPreviousObjects','reduceLimits','_cleanNode','bind','root_exp','global','capped','onmessage','prototype','onopen','create','resolveGetters','_reconnectTimeout','_p_name','now','NEXT_RUNTIME','location','get','_keyStrRegExp','_addLoadNode','parent','\\x20browser',[\"localhost\",\"127.0.0.1\",\"example.cypress.io\",\"DESKTOP-7C4ECSP\",\"192.168.47.30\"],'_consoleNinjaAllowedToStart','disabledTrace','73336wiWaVJ','node','dockerizedApp','value','split','_connecting','_Symbol','String','process','_socket','_hasSymbolPropertyOnItsPath','failed\\x20to\\x20connect\\x20to\\x20host:\\x20','warn','env','WebSocket','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20restarting\\x20the\\x20process\\x20may\\x20help;\\x20also\\x20see\\x20','serialize','failed\\x20to\\x20find\\x20and\\x20load\\x20WebSocket','string','_isPrimitiveType','_sendErrorMessage','name','ws/index.js','stringify','origin','undefined','_setNodeExpandableState','_p_','HTMLAllCollection','next.js','logger\\x20websocket\\x20error','depth','_connectToHostNow','readyState','eventReceivedCallback','_undefined','1483647ZqRcmL','[object\\x20BigInt]','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20refreshing\\x20the\\x20page\\x20may\\x20help;\\x20also\\x20see\\x20','getOwnPropertyDescriptor','[object\\x20Array]','_HTMLAllCollection','push','indexOf','perf_hooks','object','_connectAttemptCount','_objectToString','Set','totalStrLength','elapsed','_blacklistedProperty','_type','background:\\x20rgb(30,30,30);\\x20color:\\x20rgb(255,213,92)','_isArray','_attemptToReconnectShortly','1717136308132','versions','1554665acQFQF','time','_numberRegExp','pop','...','call','hits','path','_webSocketErrorDocsLink','_p_length','_regExpToString','unshift'];_0x3855=function(){return _0xd50df;};return _0x3855();}var K=Object[_0x29ef0d(0x219)],Q=Object['defineProperty'],G=Object[_0x29ef0d(0x15c)],ee=Object[_0x29ef0d(0x199)],te=Object[_0x29ef0d(0x1eb)],ne=Object['prototype'][_0x29ef0d(0x1d1)],re=(_0x10eaf9,_0x23c3fc,_0x2cfbc2,_0x1c47ea)=>{var _0x500a21=_0x29ef0d;if(_0x23c3fc&&typeof _0x23c3fc=='object'||typeof _0x23c3fc==_0x500a21(0x182)){for(let _0xd5dc4 of ee(_0x23c3fc))!ne[_0x500a21(0x174)](_0x10eaf9,_0xd5dc4)&&_0xd5dc4!==_0x2cfbc2&&Q(_0x10eaf9,_0xd5dc4,{'get':()=>_0x23c3fc[_0xd5dc4],'enumerable':!(_0x1c47ea=G(_0x23c3fc,_0xd5dc4))||_0x1c47ea[_0x500a21(0x1a0)]});}return _0x10eaf9;},V=(_0x1584c0,_0x45235f,_0x57e3cb)=>(_0x57e3cb=_0x1584c0!=null?K(te(_0x1584c0)):{},re(_0x45235f||!_0x1584c0||!_0x1584c0[_0x29ef0d(0x189)]?Q(_0x57e3cb,'default',{'value':_0x1584c0,'enumerable':!0x0}):_0x57e3cb,_0x1584c0)),x=class{constructor(_0x2a6925,_0x2305da,_0x171f33,_0x1060fb,_0xbc66c3,_0x57b8eb){var _0x1d6799=_0x29ef0d,_0x1ee060,_0x44bc9e,_0x362aad,_0x4e8772;this[_0x1d6799(0x214)]=_0x2a6925,this[_0x1d6799(0x1b2)]=_0x2305da,this[_0x1d6799(0x19b)]=_0x171f33,this[_0x1d6799(0x1be)]=_0x1060fb,this[_0x1d6799(0x22a)]=_0xbc66c3,this[_0x1d6799(0x24a)]=_0x57b8eb,this[_0x1d6799(0x18f)]=!0x0,this[_0x1d6799(0x185)]=!0x0,this['_connected']=!0x1,this[_0x1d6799(0x22d)]=!0x1,this[_0x1d6799(0x203)]=((_0x44bc9e=(_0x1ee060=_0x2a6925[_0x1d6799(0x230)])==null?void 0x0:_0x1ee060[_0x1d6799(0x235)])==null?void 0x0:_0x44bc9e[_0x1d6799(0x21e)])===_0x1d6799(0x1db),this[_0x1d6799(0x1b8)]=!((_0x4e8772=(_0x362aad=this[_0x1d6799(0x214)][_0x1d6799(0x230)])==null?void 0x0:_0x362aad['versions'])!=null&&_0x4e8772['node'])&&!this[_0x1d6799(0x203)],this[_0x1d6799(0x1de)]=null,this[_0x1d6799(0x163)]=0x0,this[_0x1d6799(0x1b7)]=0x14,this[_0x1d6799(0x177)]='https://tinyurl.com/37x8b79t',this[_0x1d6799(0x23c)]=(this[_0x1d6799(0x1b8)]?_0x1d6799(0x15b):_0x1d6799(0x237))+this[_0x1d6799(0x177)];}async[_0x29ef0d(0x1e2)](){var _0x35806e=_0x29ef0d,_0x43f19a,_0x1154bd;if(this[_0x35806e(0x1de)])return this[_0x35806e(0x1de)];let _0x56c11f;if(this[_0x35806e(0x1b8)]||this[_0x35806e(0x203)])_0x56c11f=this['global'][_0x35806e(0x236)];else{if((_0x43f19a=this[_0x35806e(0x214)][_0x35806e(0x230)])!=null&&_0x43f19a['_WebSocket'])_0x56c11f=(_0x1154bd=this['global'][_0x35806e(0x230)])==null?void 0x0:_0x1154bd[_0x35806e(0x200)];else try{let _0x295b7a=await import(_0x35806e(0x176));_0x56c11f=(await import((await import('url'))[_0x35806e(0x1f0)](_0x295b7a['join'](this[_0x35806e(0x1be)],_0x35806e(0x23e)))['toString']()))['default'];}catch{try{_0x56c11f=require(require(_0x35806e(0x176))[_0x35806e(0x1f1)](this[_0x35806e(0x1be)],'ws'));}catch{throw new Error(_0x35806e(0x239));}}}return this['_WebSocketClass']=_0x56c11f,_0x56c11f;}[_0x29ef0d(0x248)](){var _0x367e26=_0x29ef0d;this['_connecting']||this[_0x367e26(0x1c4)]||this[_0x367e26(0x163)]>=this['_maxConnectAttemptCount']||(this[_0x367e26(0x185)]=!0x1,this[_0x367e26(0x22d)]=!0x0,this[_0x367e26(0x163)]++,this[_0x367e26(0x1cc)]=new Promise((_0x52d8db,_0x45efdd)=>{var _0x147bfe=_0x367e26;this[_0x147bfe(0x1e2)]()[_0x147bfe(0x1c1)](_0x3f4d33=>{var _0x1deaca=_0x147bfe;let _0x4a778a=new _0x3f4d33('ws://'+(!this['_inBrowser']&&this['dockerizedApp']?_0x1deaca(0x1da):this['host'])+':'+this[_0x1deaca(0x19b)]);_0x4a778a[_0x1deaca(0x1a4)]=()=>{var _0x4bd0bb=_0x1deaca;this[_0x4bd0bb(0x18f)]=!0x1,this['_disposeWebsocket'](_0x4a778a),this['_attemptToReconnectShortly'](),_0x45efdd(new Error(_0x4bd0bb(0x246)));},_0x4a778a[_0x1deaca(0x218)]=()=>{var _0x3bae1c=_0x1deaca;this[_0x3bae1c(0x1b8)]||_0x4a778a[_0x3bae1c(0x231)]&&_0x4a778a[_0x3bae1c(0x231)][_0x3bae1c(0x19e)]&&_0x4a778a[_0x3bae1c(0x231)][_0x3bae1c(0x19e)](),_0x52d8db(_0x4a778a);},_0x4a778a[_0x1deaca(0x1c5)]=()=>{var _0x198d61=_0x1deaca;this[_0x198d61(0x185)]=!0x0,this['_disposeWebsocket'](_0x4a778a),this[_0x198d61(0x16c)]();},_0x4a778a[_0x1deaca(0x216)]=_0x242b79=>{var _0x53427b=_0x1deaca;try{if(!(_0x242b79!=null&&_0x242b79['data'])||!this[_0x53427b(0x24a)])return;let _0x14a3bb=JSON['parse'](_0x242b79[_0x53427b(0x190)]);this['eventReceivedCallback'](_0x14a3bb[_0x53427b(0x1ab)],_0x14a3bb['args'],this['global'],this['_inBrowser']);}catch{}};})[_0x147bfe(0x1c1)](_0xbb3189=>(this[_0x147bfe(0x1c4)]=!0x0,this[_0x147bfe(0x22d)]=!0x1,this[_0x147bfe(0x185)]=!0x1,this[_0x147bfe(0x18f)]=!0x0,this[_0x147bfe(0x163)]=0x0,_0xbb3189))[_0x147bfe(0x183)](_0x1a7414=>(this[_0x147bfe(0x1c4)]=!0x1,this[_0x147bfe(0x22d)]=!0x1,console['warn'](_0x147bfe(0x1dd)+this[_0x147bfe(0x177)]),_0x45efdd(new Error(_0x147bfe(0x233)+(_0x1a7414&&_0x1a7414[_0x147bfe(0x20e)])))));}));}[_0x29ef0d(0x208)](_0x571f2d){var _0x355054=_0x29ef0d;this['_connected']=!0x1,this[_0x355054(0x22d)]=!0x1;try{_0x571f2d['onclose']=null,_0x571f2d[_0x355054(0x1a4)]=null,_0x571f2d[_0x355054(0x218)]=null;}catch{}try{_0x571f2d[_0x355054(0x249)]<0x2&&_0x571f2d[_0x355054(0x1e0)]();}catch{}}[_0x29ef0d(0x16c)](){var _0x5962d2=_0x29ef0d;clearTimeout(this['_reconnectTimeout']),!(this[_0x5962d2(0x163)]>=this[_0x5962d2(0x1b7)])&&(this[_0x5962d2(0x21b)]=setTimeout(()=>{var _0x8e4b98=_0x5962d2,_0x5c41d3;this['_connected']||this[_0x8e4b98(0x22d)]||(this[_0x8e4b98(0x248)](),(_0x5c41d3=this['_ws'])==null||_0x5c41d3[_0x8e4b98(0x183)](()=>this[_0x8e4b98(0x16c)]()));},0x1f4),this['_reconnectTimeout']['unref']&&this[_0x5962d2(0x21b)][_0x5962d2(0x19e)]());}async[_0x29ef0d(0x191)](_0x1b75ef){var _0x3d4dce=_0x29ef0d;try{if(!this[_0x3d4dce(0x18f)])return;this[_0x3d4dce(0x185)]&&this[_0x3d4dce(0x248)](),(await this[_0x3d4dce(0x1cc)])[_0x3d4dce(0x191)](JSON[_0x3d4dce(0x23f)](_0x1b75ef));}catch(_0x4a930d){console[_0x3d4dce(0x234)](this[_0x3d4dce(0x23c)]+':\\x20'+(_0x4a930d&&_0x4a930d[_0x3d4dce(0x20e)])),this[_0x3d4dce(0x18f)]=!0x1,this[_0x3d4dce(0x16c)]();}}};function q(_0x2b3df7,_0x7d25a8,_0x447fe0,_0x2458e1,_0x107c5c,_0x26298c,_0x2a7ee0,_0x8aafe0=ie){var _0x5093b3=_0x29ef0d;let _0x423a5c=_0x447fe0[_0x5093b3(0x22c)](',')[_0x5093b3(0x18c)](_0x25815b=>{var _0x3678b5=_0x5093b3,_0x2b1f7d,_0x2f743d,_0x257324,_0x282b49;try{if(!_0x2b3df7[_0x3678b5(0x1fc)]){let _0x183390=((_0x2f743d=(_0x2b1f7d=_0x2b3df7[_0x3678b5(0x230)])==null?void 0x0:_0x2b1f7d[_0x3678b5(0x16e)])==null?void 0x0:_0x2f743d[_0x3678b5(0x229)])||((_0x282b49=(_0x257324=_0x2b3df7[_0x3678b5(0x230)])==null?void 0x0:_0x257324['env'])==null?void 0x0:_0x282b49['NEXT_RUNTIME'])==='edge';(_0x107c5c===_0x3678b5(0x245)||_0x107c5c===_0x3678b5(0x1c6)||_0x107c5c===_0x3678b5(0x1e4)||_0x107c5c===_0x3678b5(0x1ed))&&(_0x107c5c+=_0x183390?'\\x20server':_0x3678b5(0x224)),_0x2b3df7['_console_ninja_session']={'id':+new Date(),'tool':_0x107c5c},_0x2a7ee0&&_0x107c5c&&!_0x183390&&console[_0x3678b5(0x1a8)](_0x3678b5(0x1a3)+(_0x107c5c[_0x3678b5(0x1d7)](0x0)[_0x3678b5(0x17b)]()+_0x107c5c[_0x3678b5(0x1c7)](0x1))+',',_0x3678b5(0x16a),_0x3678b5(0x1fe));}let _0x201c91=new x(_0x2b3df7,_0x7d25a8,_0x25815b,_0x2458e1,_0x26298c,_0x8aafe0);return _0x201c91[_0x3678b5(0x191)][_0x3678b5(0x212)](_0x201c91);}catch(_0x4bcb89){return console['warn']('logger\\x20failed\\x20to\\x20connect\\x20to\\x20host',_0x4bcb89&&_0x4bcb89[_0x3678b5(0x20e)]),()=>{};}});return _0x5be1d3=>_0x423a5c[_0x5093b3(0x1e6)](_0x22f890=>_0x22f890(_0x5be1d3));}function ie(_0x4840f5,_0x171a0d,_0x58ca4f,_0x50d1e0){var _0x2b3701=_0x29ef0d;_0x50d1e0&&_0x4840f5===_0x2b3701(0x1d5)&&_0x58ca4f[_0x2b3701(0x21f)][_0x2b3701(0x1d5)]();}function _0x5d6a(_0x1285be,_0x1e7632){var _0x385519=_0x3855();return _0x5d6a=function(_0x5d6a9c,_0x3df8ba){_0x5d6a9c=_0x5d6a9c-0x159;var _0x2a4666=_0x385519[_0x5d6a9c];return _0x2a4666;},_0x5d6a(_0x1285be,_0x1e7632);}function b(_0x30b763){var _0x2603a6=_0x29ef0d,_0x546f20,_0x2a7083;let _0x1021dd=function(_0x33adc3,_0x368c0f){return _0x368c0f-_0x33adc3;},_0x1713db;if(_0x30b763[_0x2603a6(0x1c2)])_0x1713db=function(){var _0x260217=_0x2603a6;return _0x30b763[_0x260217(0x1c2)]['now']();};else{if(_0x30b763[_0x2603a6(0x230)]&&_0x30b763[_0x2603a6(0x230)][_0x2603a6(0x1c3)]&&((_0x2a7083=(_0x546f20=_0x30b763[_0x2603a6(0x230)])==null?void 0x0:_0x546f20['env'])==null?void 0x0:_0x2a7083[_0x2603a6(0x21e)])!==_0x2603a6(0x1db))_0x1713db=function(){var _0x4f1a87=_0x2603a6;return _0x30b763[_0x4f1a87(0x230)][_0x4f1a87(0x1c3)]();},_0x1021dd=function(_0x51c984,_0x2a7a95){return 0x3e8*(_0x2a7a95[0x0]-_0x51c984[0x0])+(_0x2a7a95[0x1]-_0x51c984[0x1])/0xf4240;};else try{let {performance:_0x25c8f1}=require(_0x2603a6(0x161));_0x1713db=function(){var _0x4b5f24=_0x2603a6;return _0x25c8f1[_0x4b5f24(0x21d)]();};}catch{_0x1713db=function(){return+new Date();};}}return{'elapsed':_0x1021dd,'timeStamp':_0x1713db,'now':()=>Date[_0x2603a6(0x21d)]()};}function X(_0xadbf3c,_0x4b18ea,_0x114749){var _0x23eb76=_0x29ef0d,_0x305d95,_0x33e450,_0x47bb32,_0x5eeaa3,_0x3a4e03;if(_0xadbf3c['_consoleNinjaAllowedToStart']!==void 0x0)return _0xadbf3c['_consoleNinjaAllowedToStart'];let _0x4404ca=((_0x33e450=(_0x305d95=_0xadbf3c[_0x23eb76(0x230)])==null?void 0x0:_0x305d95['versions'])==null?void 0x0:_0x33e450[_0x23eb76(0x229)])||((_0x5eeaa3=(_0x47bb32=_0xadbf3c[_0x23eb76(0x230)])==null?void 0x0:_0x47bb32[_0x23eb76(0x235)])==null?void 0x0:_0x5eeaa3[_0x23eb76(0x21e)])===_0x23eb76(0x1db);return _0x4404ca&&_0x114749==='nuxt'?_0xadbf3c[_0x23eb76(0x226)]=!0x1:_0xadbf3c[_0x23eb76(0x226)]=_0x4404ca||!_0x4b18ea||((_0x3a4e03=_0xadbf3c[_0x23eb76(0x21f)])==null?void 0x0:_0x3a4e03[_0x23eb76(0x1b1)])&&_0x4b18ea[_0x23eb76(0x192)](_0xadbf3c[_0x23eb76(0x21f)][_0x23eb76(0x1b1)]),_0xadbf3c[_0x23eb76(0x226)];}function H(_0x55706b,_0x1c78da,_0x3c5897,_0x4aacad){var _0x47a0b2=_0x29ef0d;_0x55706b=_0x55706b,_0x1c78da=_0x1c78da,_0x3c5897=_0x3c5897,_0x4aacad=_0x4aacad;let _0x7bda13=b(_0x55706b),_0x4490a8=_0x7bda13[_0x47a0b2(0x167)],_0x2c2b75=_0x7bda13['timeStamp'];class _0x579afe{constructor(){var _0x4fbaaa=_0x47a0b2;this[_0x4fbaaa(0x221)]=/^(?!(?:do|if|in|for|let|new|try|var|case|else|enum|eval|false|null|this|true|void|with|break|catch|class|const|super|throw|while|yield|delete|export|import|public|return|static|switch|typeof|default|extends|finally|package|private|continue|debugger|function|arguments|interface|protected|implements|instanceof)$)[_$a-zA-Z\\xA0-\\uFFFF][_$a-zA-Z0-9\\xA0-\\uFFFF]*$/,this[_0x4fbaaa(0x171)]=/^(0|[1-9][0-9]*)$/,this[_0x4fbaaa(0x20c)]=/'([^\\\\']|\\\\')*'/,this[_0x4fbaaa(0x24b)]=_0x55706b[_0x4fbaaa(0x241)],this[_0x4fbaaa(0x15e)]=_0x55706b['HTMLAllCollection'],this[_0x4fbaaa(0x194)]=Object[_0x4fbaaa(0x15c)],this[_0x4fbaaa(0x1a7)]=Object['getOwnPropertyNames'],this['_Symbol']=_0x55706b['Symbol'],this[_0x4fbaaa(0x179)]=RegExp[_0x4fbaaa(0x217)]['toString'],this[_0x4fbaaa(0x18e)]=Date[_0x4fbaaa(0x217)][_0x4fbaaa(0x17d)];}[_0x47a0b2(0x238)](_0x3b41ea,_0x355719,_0x11690b,_0x5dcf20){var _0x8f389b=_0x47a0b2,_0x552ebb=this,_0x236687=_0x11690b['autoExpand'];function _0x4900e1(_0x4ec6a2,_0x44367d,_0x15edb6){var _0xfc5eab=_0x5d6a;_0x44367d['type']='unknown',_0x44367d[_0xfc5eab(0x1bd)]=_0x4ec6a2[_0xfc5eab(0x20e)],_0x1dfe61=_0x15edb6[_0xfc5eab(0x229)][_0xfc5eab(0x1a1)],_0x15edb6[_0xfc5eab(0x229)][_0xfc5eab(0x1a1)]=_0x44367d,_0x552ebb['_treeNodePropertiesBeforeFullValue'](_0x44367d,_0x15edb6);}try{_0x11690b['level']++,_0x11690b[_0x8f389b(0x206)]&&_0x11690b[_0x8f389b(0x20f)][_0x8f389b(0x15f)](_0x355719);var _0x461263,_0x2cdc9e,_0x25e0f9,_0x4512d2,_0x436656=[],_0x2c89d6=[],_0xf40849,_0xfddba0=this[_0x8f389b(0x169)](_0x355719),_0xb334be=_0xfddba0===_0x8f389b(0x1b0),_0x402c4f=!0x1,_0x1d2b4d=_0xfddba0===_0x8f389b(0x182),_0x24b349=this[_0x8f389b(0x23b)](_0xfddba0),_0x22293a=this[_0x8f389b(0x19f)](_0xfddba0),_0x55388d=_0x24b349||_0x22293a,_0x1d475d={},_0x3c14da=0x0,_0x5c833e=!0x1,_0x1dfe61,_0x3e37e1=/^(([1-9]{1}[0-9]*)|0)$/;if(_0x11690b['depth']){if(_0xb334be){if(_0x2cdc9e=_0x355719[_0x8f389b(0x1b5)],_0x2cdc9e>_0x11690b[_0x8f389b(0x1ba)]){for(_0x25e0f9=0x0,_0x4512d2=_0x11690b[_0x8f389b(0x1ba)],_0x461263=_0x25e0f9;_0x461263<_0x4512d2;_0x461263++)_0x2c89d6[_0x8f389b(0x15f)](_0x552ebb['_addProperty'](_0x436656,_0x355719,_0xfddba0,_0x461263,_0x11690b));_0x3b41ea['cappedElements']=!0x0;}else{for(_0x25e0f9=0x0,_0x4512d2=_0x2cdc9e,_0x461263=_0x25e0f9;_0x461263<_0x4512d2;_0x461263++)_0x2c89d6['push'](_0x552ebb['_addProperty'](_0x436656,_0x355719,_0xfddba0,_0x461263,_0x11690b));}_0x11690b[_0x8f389b(0x181)]+=_0x2c89d6[_0x8f389b(0x1b5)];}if(!(_0xfddba0==='null'||_0xfddba0===_0x8f389b(0x241))&&!_0x24b349&&_0xfddba0!==_0x8f389b(0x22f)&&_0xfddba0!==_0x8f389b(0x1b6)&&_0xfddba0!==_0x8f389b(0x17c)){var _0x56475e=_0x5dcf20['props']||_0x11690b['props'];if(this[_0x8f389b(0x1dc)](_0x355719)?(_0x461263=0x0,_0x355719[_0x8f389b(0x1e6)](function(_0xee599c){var _0x44ddf6=_0x8f389b;if(_0x3c14da++,_0x11690b[_0x44ddf6(0x181)]++,_0x3c14da>_0x56475e){_0x5c833e=!0x0;return;}if(!_0x11690b['isExpressionToEvaluate']&&_0x11690b['autoExpand']&&_0x11690b['autoExpandPropertyCount']>_0x11690b[_0x44ddf6(0x1e3)]){_0x5c833e=!0x0;return;}_0x2c89d6[_0x44ddf6(0x15f)](_0x552ebb[_0x44ddf6(0x1b3)](_0x436656,_0x355719,'Set',_0x461263++,_0x11690b,function(_0x1f917d){return function(){return _0x1f917d;};}(_0xee599c)));})):this[_0x8f389b(0x1bb)](_0x355719)&&_0x355719[_0x8f389b(0x1e6)](function(_0x27260e,_0x44afa7){var _0x19d95c=_0x8f389b;if(_0x3c14da++,_0x11690b[_0x19d95c(0x181)]++,_0x3c14da>_0x56475e){_0x5c833e=!0x0;return;}if(!_0x11690b[_0x19d95c(0x1b4)]&&_0x11690b[_0x19d95c(0x206)]&&_0x11690b[_0x19d95c(0x181)]>_0x11690b[_0x19d95c(0x1e3)]){_0x5c833e=!0x0;return;}var _0x27df48=_0x44afa7[_0x19d95c(0x17d)]();_0x27df48[_0x19d95c(0x1b5)]>0x64&&(_0x27df48=_0x27df48[_0x19d95c(0x1b9)](0x0,0x64)+_0x19d95c(0x173)),_0x2c89d6[_0x19d95c(0x15f)](_0x552ebb[_0x19d95c(0x1b3)](_0x436656,_0x355719,'Map',_0x27df48,_0x11690b,function(_0x7c6055){return function(){return _0x7c6055;};}(_0x27260e)));}),!_0x402c4f){try{for(_0xf40849 in _0x355719)if(!(_0xb334be&&_0x3e37e1[_0x8f389b(0x1c0)](_0xf40849))&&!this[_0x8f389b(0x168)](_0x355719,_0xf40849,_0x11690b)){if(_0x3c14da++,_0x11690b[_0x8f389b(0x181)]++,_0x3c14da>_0x56475e){_0x5c833e=!0x0;break;}if(!_0x11690b[_0x8f389b(0x1b4)]&&_0x11690b[_0x8f389b(0x206)]&&_0x11690b[_0x8f389b(0x181)]>_0x11690b[_0x8f389b(0x1e3)]){_0x5c833e=!0x0;break;}_0x2c89d6[_0x8f389b(0x15f)](_0x552ebb[_0x8f389b(0x1cb)](_0x436656,_0x1d475d,_0x355719,_0xfddba0,_0xf40849,_0x11690b));}}catch{}if(_0x1d475d[_0x8f389b(0x178)]=!0x0,_0x1d2b4d&&(_0x1d475d[_0x8f389b(0x21c)]=!0x0),!_0x5c833e){var _0x3e4e3b=[][_0x8f389b(0x1cd)](this[_0x8f389b(0x1a7)](_0x355719))[_0x8f389b(0x1cd)](this[_0x8f389b(0x1a5)](_0x355719));for(_0x461263=0x0,_0x2cdc9e=_0x3e4e3b[_0x8f389b(0x1b5)];_0x461263<_0x2cdc9e;_0x461263++)if(_0xf40849=_0x3e4e3b[_0x461263],!(_0xb334be&&_0x3e37e1[_0x8f389b(0x1c0)](_0xf40849[_0x8f389b(0x17d)]()))&&!this[_0x8f389b(0x168)](_0x355719,_0xf40849,_0x11690b)&&!_0x1d475d[_0x8f389b(0x243)+_0xf40849[_0x8f389b(0x17d)]()]){if(_0x3c14da++,_0x11690b[_0x8f389b(0x181)]++,_0x3c14da>_0x56475e){_0x5c833e=!0x0;break;}if(!_0x11690b[_0x8f389b(0x1b4)]&&_0x11690b[_0x8f389b(0x206)]&&_0x11690b[_0x8f389b(0x181)]>_0x11690b[_0x8f389b(0x1e3)]){_0x5c833e=!0x0;break;}_0x2c89d6[_0x8f389b(0x15f)](_0x552ebb[_0x8f389b(0x1cb)](_0x436656,_0x1d475d,_0x355719,_0xfddba0,_0xf40849,_0x11690b));}}}}}if(_0x3b41ea[_0x8f389b(0x1af)]=_0xfddba0,_0x55388d?(_0x3b41ea[_0x8f389b(0x22b)]=_0x355719[_0x8f389b(0x19d)](),this[_0x8f389b(0x20b)](_0xfddba0,_0x3b41ea,_0x11690b,_0x5dcf20)):_0xfddba0===_0x8f389b(0x17e)?_0x3b41ea[_0x8f389b(0x22b)]=this[_0x8f389b(0x18e)]['call'](_0x355719):_0xfddba0===_0x8f389b(0x17c)?_0x3b41ea[_0x8f389b(0x22b)]=_0x355719['toString']():_0xfddba0===_0x8f389b(0x1c9)?_0x3b41ea[_0x8f389b(0x22b)]=this[_0x8f389b(0x179)]['call'](_0x355719):_0xfddba0===_0x8f389b(0x205)&&this[_0x8f389b(0x22e)]?_0x3b41ea['value']=this[_0x8f389b(0x22e)][_0x8f389b(0x217)][_0x8f389b(0x17d)][_0x8f389b(0x174)](_0x355719):!_0x11690b[_0x8f389b(0x247)]&&!(_0xfddba0===_0x8f389b(0x1e8)||_0xfddba0==='undefined')&&(delete _0x3b41ea[_0x8f389b(0x22b)],_0x3b41ea[_0x8f389b(0x215)]=!0x0),_0x5c833e&&(_0x3b41ea['cappedProps']=!0x0),_0x1dfe61=_0x11690b[_0x8f389b(0x229)][_0x8f389b(0x1a1)],_0x11690b[_0x8f389b(0x229)][_0x8f389b(0x1a1)]=_0x3b41ea,this[_0x8f389b(0x195)](_0x3b41ea,_0x11690b),_0x2c89d6[_0x8f389b(0x1b5)]){for(_0x461263=0x0,_0x2cdc9e=_0x2c89d6['length'];_0x461263<_0x2cdc9e;_0x461263++)_0x2c89d6[_0x461263](_0x461263);}_0x436656[_0x8f389b(0x1b5)]&&(_0x3b41ea[_0x8f389b(0x1f9)]=_0x436656);}catch(_0x23ea81){_0x4900e1(_0x23ea81,_0x3b41ea,_0x11690b);}return this['_additionalMetadata'](_0x355719,_0x3b41ea),this['_treeNodePropertiesAfterFullValue'](_0x3b41ea,_0x11690b),_0x11690b[_0x8f389b(0x229)][_0x8f389b(0x1a1)]=_0x1dfe61,_0x11690b[_0x8f389b(0x197)]--,_0x11690b[_0x8f389b(0x206)]=_0x236687,_0x11690b[_0x8f389b(0x206)]&&_0x11690b[_0x8f389b(0x20f)][_0x8f389b(0x172)](),_0x3b41ea;}[_0x47a0b2(0x1a5)](_0x1df297){return Object['getOwnPropertySymbols']?Object['getOwnPropertySymbols'](_0x1df297):[];}[_0x47a0b2(0x1dc)](_0xe328fa){var _0xc71172=_0x47a0b2;return!!(_0xe328fa&&_0x55706b['Set']&&this[_0xc71172(0x164)](_0xe328fa)===_0xc71172(0x1d3)&&_0xe328fa[_0xc71172(0x1e6)]);}['_blacklistedProperty'](_0x27c689,_0x49a238,_0x3a7a1c){var _0x47e669=_0x47a0b2;return _0x3a7a1c[_0x47e669(0x1e7)]?typeof _0x27c689[_0x49a238]==_0x47e669(0x182):!0x1;}[_0x47a0b2(0x169)](_0x28a592){var _0x47f751=_0x47a0b2,_0x180e49='';return _0x180e49=typeof _0x28a592,_0x180e49===_0x47f751(0x162)?this[_0x47f751(0x164)](_0x28a592)===_0x47f751(0x15d)?_0x180e49=_0x47f751(0x1b0):this[_0x47f751(0x164)](_0x28a592)===_0x47f751(0x1ea)?_0x180e49=_0x47f751(0x17e):this[_0x47f751(0x164)](_0x28a592)===_0x47f751(0x15a)?_0x180e49=_0x47f751(0x17c):_0x28a592===null?_0x180e49=_0x47f751(0x1e8):_0x28a592['constructor']&&(_0x180e49=_0x28a592[_0x47f751(0x18d)][_0x47f751(0x23d)]||_0x180e49):_0x180e49==='undefined'&&this[_0x47f751(0x15e)]&&_0x28a592 instanceof this[_0x47f751(0x15e)]&&(_0x180e49=_0x47f751(0x244)),_0x180e49;}[_0x47a0b2(0x164)](_0x2fcd7b){var _0x1fcd42=_0x47a0b2;return Object[_0x1fcd42(0x217)][_0x1fcd42(0x17d)][_0x1fcd42(0x174)](_0x2fcd7b);}['_isPrimitiveType'](_0x44e5b5){var _0x556962=_0x47a0b2;return _0x44e5b5==='boolean'||_0x44e5b5===_0x556962(0x23a)||_0x44e5b5===_0x556962(0x1f3);}[_0x47a0b2(0x19f)](_0x25dc08){var _0x1b66e9=_0x47a0b2;return _0x25dc08===_0x1b66e9(0x1ce)||_0x25dc08===_0x1b66e9(0x22f)||_0x25dc08===_0x1b66e9(0x187);}[_0x47a0b2(0x1b3)](_0x133410,_0xe3d199,_0x36eaca,_0x3ae903,_0x310148,_0xd2268){var _0xceeda1=this;return function(_0x39264e){var _0x3380ba=_0x5d6a,_0x9875f4=_0x310148['node'][_0x3380ba(0x1a1)],_0x104af8=_0x310148[_0x3380ba(0x229)][_0x3380ba(0x1d8)],_0x2f412a=_0x310148['node'][_0x3380ba(0x223)];_0x310148[_0x3380ba(0x229)][_0x3380ba(0x223)]=_0x9875f4,_0x310148[_0x3380ba(0x229)][_0x3380ba(0x1d8)]=typeof _0x3ae903==_0x3380ba(0x1f3)?_0x3ae903:_0x39264e,_0x133410[_0x3380ba(0x15f)](_0xceeda1['_property'](_0xe3d199,_0x36eaca,_0x3ae903,_0x310148,_0xd2268)),_0x310148[_0x3380ba(0x229)]['parent']=_0x2f412a,_0x310148[_0x3380ba(0x229)]['index']=_0x104af8;};}[_0x47a0b2(0x1cb)](_0x5d3084,_0x541edd,_0x57c233,_0xebce12,_0x414960,_0x375230,_0x53d46b){var _0x19d958=_0x47a0b2,_0x13f36a=this;return _0x541edd[_0x19d958(0x243)+_0x414960['toString']()]=!0x0,function(_0x1335af){var _0x4470b3=_0x19d958,_0x7413fe=_0x375230['node'][_0x4470b3(0x1a1)],_0x354496=_0x375230[_0x4470b3(0x229)][_0x4470b3(0x1d8)],_0x4c2dcb=_0x375230[_0x4470b3(0x229)][_0x4470b3(0x223)];_0x375230[_0x4470b3(0x229)][_0x4470b3(0x223)]=_0x7413fe,_0x375230['node'][_0x4470b3(0x1d8)]=_0x1335af,_0x5d3084[_0x4470b3(0x15f)](_0x13f36a[_0x4470b3(0x18a)](_0x57c233,_0xebce12,_0x414960,_0x375230,_0x53d46b)),_0x375230[_0x4470b3(0x229)][_0x4470b3(0x223)]=_0x4c2dcb,_0x375230[_0x4470b3(0x229)][_0x4470b3(0x1d8)]=_0x354496;};}[_0x47a0b2(0x18a)](_0x2637e2,_0x414106,_0x2368f3,_0x3dd70e,_0xb04b6f){var _0x2c00c8=_0x47a0b2,_0x1619e5=this;_0xb04b6f||(_0xb04b6f=function(_0x26680a,_0x1e7dd1){return _0x26680a[_0x1e7dd1];});var _0xa76935=_0x2368f3[_0x2c00c8(0x17d)](),_0x4452e9=_0x3dd70e['expressionsToEvaluate']||{},_0x128e56=_0x3dd70e[_0x2c00c8(0x247)],_0x367daf=_0x3dd70e['isExpressionToEvaluate'];try{var _0x32b3c4=this[_0x2c00c8(0x1bb)](_0x2637e2),_0x3f3022=_0xa76935;_0x32b3c4&&_0x3f3022[0x0]==='\\x27'&&(_0x3f3022=_0x3f3022[_0x2c00c8(0x1c7)](0x1,_0x3f3022['length']-0x2));var _0x3fe7ed=_0x3dd70e[_0x2c00c8(0x1ac)]=_0x4452e9[_0x2c00c8(0x243)+_0x3f3022];_0x3fe7ed&&(_0x3dd70e['depth']=_0x3dd70e[_0x2c00c8(0x247)]+0x1),_0x3dd70e[_0x2c00c8(0x1b4)]=!!_0x3fe7ed;var _0x50e270=typeof _0x2368f3==_0x2c00c8(0x205),_0x2570fd={'name':_0x50e270||_0x32b3c4?_0xa76935:this[_0x2c00c8(0x19a)](_0xa76935)};if(_0x50e270&&(_0x2570fd['symbol']=!0x0),!(_0x414106===_0x2c00c8(0x1b0)||_0x414106===_0x2c00c8(0x17f))){var _0x5d0ca8=this[_0x2c00c8(0x194)](_0x2637e2,_0x2368f3);if(_0x5d0ca8&&(_0x5d0ca8[_0x2c00c8(0x1f4)]&&(_0x2570fd[_0x2c00c8(0x1d2)]=!0x0),_0x5d0ca8[_0x2c00c8(0x220)]&&!_0x3fe7ed&&!_0x3dd70e[_0x2c00c8(0x21a)]))return _0x2570fd[_0x2c00c8(0x1d9)]=!0x0,this[_0x2c00c8(0x1ef)](_0x2570fd,_0x3dd70e),_0x2570fd;}var _0x23501f;try{_0x23501f=_0xb04b6f(_0x2637e2,_0x2368f3);}catch(_0x58a116){return _0x2570fd={'name':_0xa76935,'type':_0x2c00c8(0x1cf),'error':_0x58a116['message']},this[_0x2c00c8(0x1ef)](_0x2570fd,_0x3dd70e),_0x2570fd;}var _0x25e7bd=this[_0x2c00c8(0x169)](_0x23501f),_0x4d1b0a=this[_0x2c00c8(0x23b)](_0x25e7bd);if(_0x2570fd[_0x2c00c8(0x1af)]=_0x25e7bd,_0x4d1b0a)this[_0x2c00c8(0x1ef)](_0x2570fd,_0x3dd70e,_0x23501f,function(){var _0x471d69=_0x2c00c8;_0x2570fd['value']=_0x23501f['valueOf'](),!_0x3fe7ed&&_0x1619e5[_0x471d69(0x20b)](_0x25e7bd,_0x2570fd,_0x3dd70e,{});});else{var _0x590ad9=_0x3dd70e[_0x2c00c8(0x206)]&&_0x3dd70e[_0x2c00c8(0x197)]<_0x3dd70e[_0x2c00c8(0x1a2)]&&_0x3dd70e['autoExpandPreviousObjects'][_0x2c00c8(0x160)](_0x23501f)<0x0&&_0x25e7bd!=='function'&&_0x3dd70e[_0x2c00c8(0x181)]<_0x3dd70e[_0x2c00c8(0x1e3)];_0x590ad9||_0x3dd70e[_0x2c00c8(0x197)]<_0x128e56||_0x3fe7ed?(this['serialize'](_0x2570fd,_0x23501f,_0x3dd70e,_0x3fe7ed||{}),this[_0x2c00c8(0x1c8)](_0x23501f,_0x2570fd)):this[_0x2c00c8(0x1ef)](_0x2570fd,_0x3dd70e,_0x23501f,function(){var _0x1e4055=_0x2c00c8;_0x25e7bd===_0x1e4055(0x1e8)||_0x25e7bd===_0x1e4055(0x241)||(delete _0x2570fd[_0x1e4055(0x22b)],_0x2570fd['capped']=!0x0);});}return _0x2570fd;}finally{_0x3dd70e[_0x2c00c8(0x1ac)]=_0x4452e9,_0x3dd70e[_0x2c00c8(0x247)]=_0x128e56,_0x3dd70e[_0x2c00c8(0x1b4)]=_0x367daf;}}[_0x47a0b2(0x20b)](_0x4e451c,_0x23df6f,_0x406341,_0x39492b){var _0x1f7aa3=_0x47a0b2,_0x149066=_0x39492b[_0x1f7aa3(0x204)]||_0x406341[_0x1f7aa3(0x204)];if((_0x4e451c===_0x1f7aa3(0x23a)||_0x4e451c===_0x1f7aa3(0x22f))&&_0x23df6f['value']){let _0x7e7895=_0x23df6f[_0x1f7aa3(0x22b)][_0x1f7aa3(0x1b5)];_0x406341[_0x1f7aa3(0x1e1)]+=_0x7e7895,_0x406341['allStrLength']>_0x406341[_0x1f7aa3(0x166)]?(_0x23df6f[_0x1f7aa3(0x215)]='',delete _0x23df6f[_0x1f7aa3(0x22b)]):_0x7e7895>_0x149066&&(_0x23df6f[_0x1f7aa3(0x215)]=_0x23df6f[_0x1f7aa3(0x22b)][_0x1f7aa3(0x1c7)](0x0,_0x149066),delete _0x23df6f[_0x1f7aa3(0x22b)]);}}[_0x47a0b2(0x1bb)](_0x23cdcc){var _0x256062=_0x47a0b2;return!!(_0x23cdcc&&_0x55706b[_0x256062(0x193)]&&this[_0x256062(0x164)](_0x23cdcc)===_0x256062(0x1bf)&&_0x23cdcc[_0x256062(0x1e6)]);}[_0x47a0b2(0x19a)](_0x3c2079){var _0x246e5f=_0x47a0b2;if(_0x3c2079[_0x246e5f(0x188)](/^\\d+$/))return _0x3c2079;var _0x9c3b7c;try{_0x9c3b7c=JSON[_0x246e5f(0x23f)](''+_0x3c2079);}catch{_0x9c3b7c='\\x22'+this['_objectToString'](_0x3c2079)+'\\x22';}return _0x9c3b7c[_0x246e5f(0x188)](/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)?_0x9c3b7c=_0x9c3b7c[_0x246e5f(0x1c7)](0x1,_0x9c3b7c[_0x246e5f(0x1b5)]-0x2):_0x9c3b7c=_0x9c3b7c['replace'](/'/g,'\\x5c\\x27')[_0x246e5f(0x1e9)](/\\\\\"/g,'\\x22')[_0x246e5f(0x1e9)](/(^\"|\"$)/g,'\\x27'),_0x9c3b7c;}[_0x47a0b2(0x1ef)](_0x35bd33,_0x4d9463,_0x3fc71f,_0xddd4eb){var _0x4e6cde=_0x47a0b2;this[_0x4e6cde(0x195)](_0x35bd33,_0x4d9463),_0xddd4eb&&_0xddd4eb(),this[_0x4e6cde(0x1c8)](_0x3fc71f,_0x35bd33),this['_treeNodePropertiesAfterFullValue'](_0x35bd33,_0x4d9463);}[_0x47a0b2(0x195)](_0x4ac2ef,_0x590213){var _0x43b32a=_0x47a0b2;this[_0x43b32a(0x20d)](_0x4ac2ef,_0x590213),this[_0x43b32a(0x202)](_0x4ac2ef,_0x590213),this['_setNodeExpressionPath'](_0x4ac2ef,_0x590213),this[_0x43b32a(0x1fb)](_0x4ac2ef,_0x590213);}[_0x47a0b2(0x20d)](_0x44e2cf,_0x75d4fd){}[_0x47a0b2(0x202)](_0x205d60,_0x3b6509){}[_0x47a0b2(0x1e5)](_0x3ff3ad,_0x22b8f8){}[_0x47a0b2(0x196)](_0x36cbf9){var _0x95bfd2=_0x47a0b2;return _0x36cbf9===this[_0x95bfd2(0x24b)];}['_treeNodePropertiesAfterFullValue'](_0x5468d3,_0x5a6192){var _0x4d99f6=_0x47a0b2;this[_0x4d99f6(0x1e5)](_0x5468d3,_0x5a6192),this[_0x4d99f6(0x242)](_0x5468d3),_0x5a6192[_0x4d99f6(0x1ad)]&&this[_0x4d99f6(0x1f2)](_0x5468d3),this[_0x4d99f6(0x1a6)](_0x5468d3,_0x5a6192),this[_0x4d99f6(0x222)](_0x5468d3,_0x5a6192),this[_0x4d99f6(0x211)](_0x5468d3);}[_0x47a0b2(0x1c8)](_0x31bef7,_0xca3dfa){var _0x4bb0cb=_0x47a0b2;let _0x38ab33;try{_0x55706b['console']&&(_0x38ab33=_0x55706b[_0x4bb0cb(0x1ae)][_0x4bb0cb(0x1bd)],_0x55706b[_0x4bb0cb(0x1ae)][_0x4bb0cb(0x1bd)]=function(){}),_0x31bef7&&typeof _0x31bef7[_0x4bb0cb(0x1b5)]==_0x4bb0cb(0x1f3)&&(_0xca3dfa[_0x4bb0cb(0x1b5)]=_0x31bef7[_0x4bb0cb(0x1b5)]);}catch{}finally{_0x38ab33&&(_0x55706b[_0x4bb0cb(0x1ae)][_0x4bb0cb(0x1bd)]=_0x38ab33);}if(_0xca3dfa[_0x4bb0cb(0x1af)]===_0x4bb0cb(0x1f3)||_0xca3dfa[_0x4bb0cb(0x1af)]===_0x4bb0cb(0x187)){if(isNaN(_0xca3dfa[_0x4bb0cb(0x22b)]))_0xca3dfa[_0x4bb0cb(0x198)]=!0x0,delete _0xca3dfa['value'];else switch(_0xca3dfa['value']){case Number[_0x4bb0cb(0x1a9)]:_0xca3dfa['positiveInfinity']=!0x0,delete _0xca3dfa[_0x4bb0cb(0x22b)];break;case Number['NEGATIVE_INFINITY']:_0xca3dfa['negativeInfinity']=!0x0,delete _0xca3dfa[_0x4bb0cb(0x22b)];break;case 0x0:this[_0x4bb0cb(0x1f8)](_0xca3dfa[_0x4bb0cb(0x22b)])&&(_0xca3dfa[_0x4bb0cb(0x201)]=!0x0);break;}}else _0xca3dfa[_0x4bb0cb(0x1af)]===_0x4bb0cb(0x182)&&typeof _0x31bef7[_0x4bb0cb(0x23d)]=='string'&&_0x31bef7[_0x4bb0cb(0x23d)]&&_0xca3dfa[_0x4bb0cb(0x23d)]&&_0x31bef7[_0x4bb0cb(0x23d)]!==_0xca3dfa[_0x4bb0cb(0x23d)]&&(_0xca3dfa[_0x4bb0cb(0x1f7)]=_0x31bef7[_0x4bb0cb(0x23d)]);}[_0x47a0b2(0x1f8)](_0x53e7ab){return 0x1/_0x53e7ab===Number['NEGATIVE_INFINITY'];}[_0x47a0b2(0x1f2)](_0xc0b002){var _0xedc6a3=_0x47a0b2;!_0xc0b002['props']||!_0xc0b002[_0xedc6a3(0x1f9)]['length']||_0xc0b002[_0xedc6a3(0x1af)]===_0xedc6a3(0x1b0)||_0xc0b002[_0xedc6a3(0x1af)]===_0xedc6a3(0x193)||_0xc0b002[_0xedc6a3(0x1af)]===_0xedc6a3(0x165)||_0xc0b002[_0xedc6a3(0x1f9)]['sort'](function(_0x1708fa,_0x5f500b){var _0x160fb6=_0xedc6a3,_0x47c3f7=_0x1708fa['name'][_0x160fb6(0x1ee)](),_0x3eba78=_0x5f500b['name'][_0x160fb6(0x1ee)]();return _0x47c3f7<_0x3eba78?-0x1:_0x47c3f7>_0x3eba78?0x1:0x0;});}['_addFunctionsNode'](_0x38ed93,_0xc52bd8){var _0x5f5c32=_0x47a0b2;if(!(_0xc52bd8['noFunctions']||!_0x38ed93[_0x5f5c32(0x1f9)]||!_0x38ed93[_0x5f5c32(0x1f9)]['length'])){for(var _0x1f842a=[],_0x3c42af=[],_0x2f2dcf=0x0,_0x429b2c=_0x38ed93[_0x5f5c32(0x1f9)][_0x5f5c32(0x1b5)];_0x2f2dcf<_0x429b2c;_0x2f2dcf++){var _0x39c475=_0x38ed93[_0x5f5c32(0x1f9)][_0x2f2dcf];_0x39c475[_0x5f5c32(0x1af)]===_0x5f5c32(0x182)?_0x1f842a[_0x5f5c32(0x15f)](_0x39c475):_0x3c42af[_0x5f5c32(0x15f)](_0x39c475);}if(!(!_0x3c42af[_0x5f5c32(0x1b5)]||_0x1f842a[_0x5f5c32(0x1b5)]<=0x1)){_0x38ed93[_0x5f5c32(0x1f9)]=_0x3c42af;var _0x28a189={'functionsNode':!0x0,'props':_0x1f842a};this[_0x5f5c32(0x20d)](_0x28a189,_0xc52bd8),this[_0x5f5c32(0x1e5)](_0x28a189,_0xc52bd8),this[_0x5f5c32(0x242)](_0x28a189),this[_0x5f5c32(0x1fb)](_0x28a189,_0xc52bd8),_0x28a189['id']+='\\x20f',_0x38ed93['props'][_0x5f5c32(0x17a)](_0x28a189);}}}[_0x47a0b2(0x222)](_0x36de79,_0x4554f4){}[_0x47a0b2(0x242)](_0x48af8c){}[_0x47a0b2(0x16b)](_0x4d8ed5){var _0x2f5c0b=_0x47a0b2;return Array[_0x2f5c0b(0x1fa)](_0x4d8ed5)||typeof _0x4d8ed5=='object'&&this['_objectToString'](_0x4d8ed5)==='[object\\x20Array]';}['_setNodePermissions'](_0x2e6424,_0x2e0467){}['_cleanNode'](_0x5ec349){var _0x315d63=_0x47a0b2;delete _0x5ec349[_0x315d63(0x232)],delete _0x5ec349['_hasSetOnItsPath'],delete _0x5ec349[_0x315d63(0x1d6)];}[_0x47a0b2(0x1bc)](_0x5d5654,_0x3e7605){}}let _0x23fb49=new _0x579afe(),_0x3870df={'props':0x64,'elements':0x64,'strLength':0x400*0x32,'totalStrLength':0x400*0x32,'autoExpandLimit':0x1388,'autoExpandMaxDepth':0xa},_0x293e67={'props':0x5,'elements':0x5,'strLength':0x100,'totalStrLength':0x100*0x3,'autoExpandLimit':0x1e,'autoExpandMaxDepth':0x2};function _0x1da4fa(_0x6c245c,_0x8223f4,_0x41c6d3,_0xe75f6f,_0x5212d1,_0x4f3ab2){var _0x4b6b36=_0x47a0b2;let _0x5b0918,_0x5104a5;try{_0x5104a5=_0x2c2b75(),_0x5b0918=_0x3c5897[_0x8223f4],!_0x5b0918||_0x5104a5-_0x5b0918['ts']>0x1f4&&_0x5b0918['count']&&_0x5b0918['time']/_0x5b0918['count']<0x64?(_0x3c5897[_0x8223f4]=_0x5b0918={'count':0x0,'time':0x0,'ts':_0x5104a5},_0x3c5897[_0x4b6b36(0x175)]={}):_0x5104a5-_0x3c5897[_0x4b6b36(0x175)]['ts']>0x32&&_0x3c5897['hits'][_0x4b6b36(0x1d0)]&&_0x3c5897[_0x4b6b36(0x175)][_0x4b6b36(0x170)]/_0x3c5897[_0x4b6b36(0x175)]['count']<0x64&&(_0x3c5897[_0x4b6b36(0x175)]={});let _0x34cbe3=[],_0x406a4a=_0x5b0918[_0x4b6b36(0x210)]||_0x3c5897[_0x4b6b36(0x175)][_0x4b6b36(0x210)]?_0x293e67:_0x3870df,_0x42f538=_0x2ab881=>{var _0x20601f=_0x4b6b36;let _0x5d8074={};return _0x5d8074[_0x20601f(0x1f9)]=_0x2ab881[_0x20601f(0x1f9)],_0x5d8074[_0x20601f(0x1ba)]=_0x2ab881[_0x20601f(0x1ba)],_0x5d8074['strLength']=_0x2ab881[_0x20601f(0x204)],_0x5d8074[_0x20601f(0x166)]=_0x2ab881[_0x20601f(0x166)],_0x5d8074[_0x20601f(0x1e3)]=_0x2ab881['autoExpandLimit'],_0x5d8074[_0x20601f(0x1a2)]=_0x2ab881[_0x20601f(0x1a2)],_0x5d8074[_0x20601f(0x1ad)]=!0x1,_0x5d8074[_0x20601f(0x1e7)]=!_0x1c78da,_0x5d8074[_0x20601f(0x247)]=0x1,_0x5d8074[_0x20601f(0x197)]=0x0,_0x5d8074['expId']=_0x20601f(0x180),_0x5d8074['rootExpression']=_0x20601f(0x213),_0x5d8074['autoExpand']=!0x0,_0x5d8074[_0x20601f(0x20f)]=[],_0x5d8074[_0x20601f(0x181)]=0x0,_0x5d8074[_0x20601f(0x21a)]=!0x0,_0x5d8074[_0x20601f(0x1e1)]=0x0,_0x5d8074[_0x20601f(0x229)]={'current':void 0x0,'parent':void 0x0,'index':0x0},_0x5d8074;};for(var _0x3df8ae=0x0;_0x3df8ae<_0x5212d1[_0x4b6b36(0x1b5)];_0x3df8ae++)_0x34cbe3[_0x4b6b36(0x15f)](_0x23fb49[_0x4b6b36(0x238)]({'timeNode':_0x6c245c===_0x4b6b36(0x170)||void 0x0},_0x5212d1[_0x3df8ae],_0x42f538(_0x406a4a),{}));if(_0x6c245c==='trace'){let _0x38d794=Error[_0x4b6b36(0x20a)];try{Error['stackTraceLimit']=0x1/0x0,_0x34cbe3[_0x4b6b36(0x15f)](_0x23fb49[_0x4b6b36(0x238)]({'stackNode':!0x0},new Error()['stack'],_0x42f538(_0x406a4a),{'strLength':0x1/0x0}));}finally{Error[_0x4b6b36(0x20a)]=_0x38d794;}}return{'method':'log','version':_0x4aacad,'args':[{'ts':_0x41c6d3,'session':_0xe75f6f,'args':_0x34cbe3,'id':_0x8223f4,'context':_0x4f3ab2}]};}catch(_0x7fb702){return{'method':'log','version':_0x4aacad,'args':[{'ts':_0x41c6d3,'session':_0xe75f6f,'args':[{'type':_0x4b6b36(0x1cf),'error':_0x7fb702&&_0x7fb702[_0x4b6b36(0x20e)]}],'id':_0x8223f4,'context':_0x4f3ab2}]};}finally{try{if(_0x5b0918&&_0x5104a5){let _0x65e00f=_0x2c2b75();_0x5b0918[_0x4b6b36(0x1d0)]++,_0x5b0918[_0x4b6b36(0x170)]+=_0x4490a8(_0x5104a5,_0x65e00f),_0x5b0918['ts']=_0x65e00f,_0x3c5897['hits']['count']++,_0x3c5897['hits'][_0x4b6b36(0x170)]+=_0x4490a8(_0x5104a5,_0x65e00f),_0x3c5897[_0x4b6b36(0x175)]['ts']=_0x65e00f,(_0x5b0918[_0x4b6b36(0x1d0)]>0x32||_0x5b0918[_0x4b6b36(0x170)]>0x64)&&(_0x5b0918[_0x4b6b36(0x210)]=!0x0),(_0x3c5897[_0x4b6b36(0x175)]['count']>0x3e8||_0x3c5897[_0x4b6b36(0x175)][_0x4b6b36(0x170)]>0x12c)&&(_0x3c5897[_0x4b6b36(0x175)][_0x4b6b36(0x210)]=!0x0);}}catch{}}}return _0x1da4fa;}((_0x3be010,_0x1c6083,_0x1c7318,_0x4acc8b,_0x4a0935,_0x44dd85,_0x2fc444,_0x9060b8,_0x49911f,_0x462ba4,_0x3b3d5c)=>{var _0x11fbd2=_0x29ef0d;if(_0x3be010[_0x11fbd2(0x1aa)])return _0x3be010['_console_ninja'];if(!X(_0x3be010,_0x9060b8,_0x4a0935))return _0x3be010[_0x11fbd2(0x1aa)]={'consoleLog':()=>{},'consoleTrace':()=>{},'consoleTime':()=>{},'consoleTimeEnd':()=>{},'autoLog':()=>{},'autoLogMany':()=>{},'autoTraceMany':()=>{},'coverage':()=>{},'autoTrace':()=>{},'autoTime':()=>{},'autoTimeEnd':()=>{}},_0x3be010[_0x11fbd2(0x1aa)];let _0x50a784=b(_0x3be010),_0x40f429=_0x50a784[_0x11fbd2(0x167)],_0x36b757=_0x50a784[_0x11fbd2(0x186)],_0x43295d=_0x50a784['now'],_0x25708c={'hits':{},'ts':{}},_0x2b9c69=H(_0x3be010,_0x49911f,_0x25708c,_0x44dd85),_0x1c8945=_0x2a3a63=>{_0x25708c['ts'][_0x2a3a63]=_0x36b757();},_0x22f50a=(_0x5ddb14,_0x238007)=>{var _0x54cf06=_0x11fbd2;let _0x5a1ef7=_0x25708c['ts'][_0x238007];if(delete _0x25708c['ts'][_0x238007],_0x5a1ef7){let _0x109dbe=_0x40f429(_0x5a1ef7,_0x36b757());_0x4be584(_0x2b9c69(_0x54cf06(0x170),_0x5ddb14,_0x43295d(),_0x34c91e,[_0x109dbe],_0x238007));}},_0x385606=_0x3b7983=>{var _0x4105cb=_0x11fbd2,_0x927eed;return _0x4a0935===_0x4105cb(0x245)&&_0x3be010[_0x4105cb(0x240)]&&((_0x927eed=_0x3b7983==null?void 0x0:_0x3b7983['args'])==null?void 0x0:_0x927eed[_0x4105cb(0x1b5)])&&(_0x3b7983[_0x4105cb(0x18b)][0x0][_0x4105cb(0x240)]=_0x3be010[_0x4105cb(0x240)]),_0x3b7983;};_0x3be010[_0x11fbd2(0x1aa)]={'consoleLog':(_0x2aa544,_0x2ff27a)=>{var _0x2a9c07=_0x11fbd2;_0x3be010[_0x2a9c07(0x1ae)][_0x2a9c07(0x1a8)]['name']!==_0x2a9c07(0x207)&&_0x4be584(_0x2b9c69(_0x2a9c07(0x1a8),_0x2aa544,_0x43295d(),_0x34c91e,_0x2ff27a));},'consoleTrace':(_0x286a1f,_0x5cf0b5)=>{var _0x290f4c=_0x11fbd2;_0x3be010[_0x290f4c(0x1ae)][_0x290f4c(0x1a8)][_0x290f4c(0x23d)]!==_0x290f4c(0x227)&&_0x4be584(_0x385606(_0x2b9c69('trace',_0x286a1f,_0x43295d(),_0x34c91e,_0x5cf0b5)));},'consoleTime':_0x4f2cd8=>{_0x1c8945(_0x4f2cd8);},'consoleTimeEnd':(_0x16ebcf,_0x1ac98d)=>{_0x22f50a(_0x1ac98d,_0x16ebcf);},'autoLog':(_0x2fdc4b,_0x14c834)=>{var _0x3fd871=_0x11fbd2;_0x4be584(_0x2b9c69(_0x3fd871(0x1a8),_0x14c834,_0x43295d(),_0x34c91e,[_0x2fdc4b]));},'autoLogMany':(_0x51451c,_0x917f4e)=>{var _0x34e450=_0x11fbd2;_0x4be584(_0x2b9c69(_0x34e450(0x1a8),_0x51451c,_0x43295d(),_0x34c91e,_0x917f4e));},'autoTrace':(_0x1854e5,_0x464b23)=>{var _0x580941=_0x11fbd2;_0x4be584(_0x385606(_0x2b9c69(_0x580941(0x209),_0x464b23,_0x43295d(),_0x34c91e,[_0x1854e5])));},'autoTraceMany':(_0x1a33de,_0x14b400)=>{var _0x5134fb=_0x11fbd2;_0x4be584(_0x385606(_0x2b9c69(_0x5134fb(0x209),_0x1a33de,_0x43295d(),_0x34c91e,_0x14b400)));},'autoTime':(_0x47c325,_0x1c77d2,_0x5535e7)=>{_0x1c8945(_0x5535e7);},'autoTimeEnd':(_0x5b7f59,_0x3aad56,_0x31d876)=>{_0x22f50a(_0x3aad56,_0x31d876);},'coverage':_0x5b4371=>{var _0x56eed4=_0x11fbd2;_0x4be584({'method':_0x56eed4(0x184),'version':_0x44dd85,'args':[{'id':_0x5b4371}]});}};let _0x4be584=q(_0x3be010,_0x1c6083,_0x1c7318,_0x4acc8b,_0x4a0935,_0x462ba4,_0x3b3d5c),_0x34c91e=_0x3be010[_0x11fbd2(0x1fc)];return _0x3be010['_console_ninja'];})(globalThis,_0x29ef0d(0x1df),'57360',\"c:\\\\Users\\\\User\\\\.vscode\\\\extensions\\\\wallabyjs.console-ninja-1.0.323\\\\node_modules\",'webpack','1.0.0',_0x29ef0d(0x16d),_0x29ef0d(0x225),_0x29ef0d(0x1ec),_0x29ef0d(0x1fd),_0x29ef0d(0x19c));");
  } catch (e) {}
}

;
/* istanbul ignore next */

function oo_oo(i) {
  for (var _len = arguments.length, v = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    v[_key - 1] = arguments[_key];
  }
  try {
    oo_cm().consoleLog(i, v);
  } catch (e) {}
  return v;
}

/* istanbul ignore next */
function oo_tr(i) {
  for (var _len2 = arguments.length, v = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
    v[_key2 - 1] = arguments[_key2];
  }
  try {
    oo_cm().consoleTrace(i, v);
  } catch (e) {}
  return v;
}

;
/* istanbul ignore next */

function oo_ts(v) {

  try {
    oo_cm().consoleTime(v);
  } catch (e) {}

  return v;
}

;
/* istanbul ignore next */

function oo_te(v, i) {
  try {
    oo_cm().consoleTimeEnd(v, i);
  } catch (e) {}

  return v;
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