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

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

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
} // WORD CHECKER


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
}; // listen for words density


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
}); // function for change font size

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
}; // function for change result mode


resultTypeButtons.forEach(function (resultBtn) {
  resultBtn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;

    if (selectedValue === "density") {
      showDensity();
    } else {
      showPlagiarism();
    }
  });
}); // function for change history type

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
}); // function for change size of result

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
}); // function for change collapse behavior of result

document.querySelectorAll('input[type="radio"][name="result-collapse"]').forEach(function (btn) {
  btn.addEventListener('change', function (event) {
    var selectedValue = event.target.value;

    if (selectedValue == "expand") {
      $(".result-container").slideDown();
    } else {
      $(".result-container").slideUp();
    }
  });
}); // function for remove content on text input

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
}); // linkChecker

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
}; // function to highlight the matched text
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
}); // PLAGIARISM CHECKER

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

            /* eslint-disable */
            (_console = console).log.apply(_console, _toConsumableArray(oo_oo("198151989_674_24_674_45_4", res.data)));

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
            $("#button-checker").prop("disabled", false); // var textareaContent = styleMatchedText(text, res.data.alltextmatched)

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
/* eslint-disable */

;

function oo_cm() {
  try {
    return (0, eval)("globalThis._console_ninja") || (0, eval)("/* https://github.com/wallabyjs/console-ninja#how-does-it-work */'use strict';var _0x1f6eda=_0x588c;(function(_0x37a523,_0x1ec541){var _0x2e4439=_0x588c,_0x5bd9ff=_0x37a523();while(!![]){try{var _0x3228c3=parseInt(_0x2e4439(0x20d))/0x1+-parseInt(_0x2e4439(0x240))/0x2+-parseInt(_0x2e4439(0x17a))/0x3*(parseInt(_0x2e4439(0x18a))/0x4)+parseInt(_0x2e4439(0x242))/0x5*(parseInt(_0x2e4439(0x1e7))/0x6)+-parseInt(_0x2e4439(0x186))/0x7+-parseInt(_0x2e4439(0x20c))/0x8*(parseInt(_0x2e4439(0x204))/0x9)+parseInt(_0x2e4439(0x23c))/0xa;if(_0x3228c3===_0x1ec541)break;else _0x5bd9ff['push'](_0x5bd9ff['shift']());}catch(_0x38b408){_0x5bd9ff['push'](_0x5bd9ff['shift']());}}}(_0x5b93,0xc12dc));function _0x588c(_0x1a6400,_0x29cabc){var _0x5b9352=_0x5b93();return _0x588c=function(_0x588cb7,_0x142cab){_0x588cb7=_0x588cb7-0x171;var _0x5749c9=_0x5b9352[_0x588cb7];return _0x5749c9;},_0x588c(_0x1a6400,_0x29cabc);}function _0x5b93(){var _0x443392=['_addObjectProperty','setter','HTMLAllCollection','_treeNodePropertiesBeforeFullValue','_isPrimitiveWrapperType','_WebSocket','call',':logPointId:','host','type','getOwnPropertyNames','time','Number','_socket',[\"localhost\",\"127.0.0.1\",\"example.cypress.io\",\"LAPTOP-M1GJOSB2\",\"192.168.43.3\"],'_Symbol','expressionsToEvaluate','elapsed','1700184326614','https://tinyurl.com/37x8b79t','_disposeWebsocket','create',\"c:\\\\Users\\\\user\\\\.vscode\\\\extensions\\\\wallabyjs.console-ninja-1.0.256\\\\node_modules\",'replace','_treeNodePropertiesAfterFullValue','bigint','_console_ninja','positiveInfinity','logger\\x20websocket\\x20error','stackTraceLimit','__es'+'Module','perf_hooks','autoExpandPreviousObjects','reduceLimits','975666xOMyos','disabledLog','prototype','bind','autoExpandPropertyCount','constructor','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host','parent','Map','autoExpand','_consoleNinjaAllowedToStart','pop','onopen','getOwnPropertySymbols','set','_addLoadNode','[object\\x20Array]','onmessage','port','_connected','_setNodeExpandableState','enumerable','unref','_isNegativeZero','_property','_sendErrorMessage','Error','process','50475','9FnKqFd','then','nodeModules','isArray','String','node','noFunctions','ws://','8418904GbYuiv','751229xZJsbg','push','split','toString','elements','\\x20browser','_setNodeLabel','_getOwnPropertyNames','[object\\x20Map]','stringify','string','warn','_blacklistedProperty','console','pathToFileURL','_cleanNode','capped','Boolean','failed\\x20to\\x20find\\x20and\\x20load\\x20WebSocket','webpack','negativeInfinity','hrtime','forEach','current','_additionalMetadata','count','serialize','rootExpression','_ws','_regExpToString','_console_ninja_session','_objectToString','Set','isExpressionToEvaluate','symbol','onclose','_addFunctionsNode','_setNodeExpressionPath','strLength','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20restarting\\x20the\\x20process\\x20may\\x20help;\\x20also\\x20see\\x20','_isPrimitiveType','defineProperty','unknown','undefined','next.js','parse','_setNodeId','29408320hmjBHj','name','_keyStrRegExp','slice','451992ZOQeyL','127.0.0.1','5vKCxwl','_hasSetOnItsPath','timeStamp','totalStrLength','cappedProps','remix','includes','allStrLength','nuxt','send','getWebSocketClass','_type','edge','reload','indexOf','length','function','_maxConnectAttemptCount','data','_p_','astro','props','hostname','expId','autoExpandMaxDepth','value','_webSocketErrorDocsLink','sortProps','null','','gateway.docker.internal','_allowedToSend','_setNodeQueryPath','_reconnectTimeout','_addProperty','3955839iBWfwP','_isMap','_inBrowser','','depth','_connectToHostNow','_connectAttemptCount','_isArray','global','toLowerCase','_sortProps','_allowedToConnectOnSend','3265080gxbNfd','location','index','getOwnPropertyDescriptor','4NfwFZq','message','versions','_undefined','path','map','root_exp','NEGATIVE_INFINITY','timeEnd','_processTreeNodeResult','_hasSymbolPropertyOnItsPath','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20refreshing\\x20the\\x20page\\x20may\\x20help;\\x20also\\x20see\\x20','_WebSocketClass','[object\\x20BigInt]','error','default','_HTMLAllCollection','valueOf','onerror','trace','_setNodePermissions','_getOwnPropertyDescriptor','level','cappedElements','test','1.0.0','_getOwnPropertySymbols','coverage','join','now','hits','close','object','Symbol','env','match','_attemptToReconnectShortly','_capIfString','number','negativeZero','_connecting','concat','array','autoExpandLimit','substr','disabledTrace','dockerizedApp','date','_dateToString','_p_length','Buffer','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host,\\x20see\\x20','[object\\x20Date]','_p_name','resolveGetters','[object\\x20Set]','get','NEXT_RUNTIME','log'];_0x5b93=function(){return _0x443392;};return _0x5b93();}var j=Object[_0x1f6eda(0x1da)],H=Object[_0x1f6eda(0x236)],G=Object['getOwnPropertyDescriptor'],ee=Object[_0x1f6eda(0x1cf)],te=Object['getPrototypeOf'],ne=Object['prototype']['hasOwnProperty'],re=(_0x585d5d,_0x75099f,_0x5c8084,_0x53d420)=>{var _0x397ce2=_0x1f6eda;if(_0x75099f&&typeof _0x75099f==_0x397ce2(0x1aa)||typeof _0x75099f=='function'){for(let _0x571ef2 of ee(_0x75099f))!ne['call'](_0x585d5d,_0x571ef2)&&_0x571ef2!==_0x5c8084&&H(_0x585d5d,_0x571ef2,{'get':()=>_0x75099f[_0x571ef2],'enumerable':!(_0x53d420=G(_0x75099f,_0x571ef2))||_0x53d420[_0x397ce2(0x1fc)]});}return _0x585d5d;},x=(_0x8fd57d,_0x3cda95,_0x54720e)=>(_0x54720e=_0x8fd57d!=null?j(te(_0x8fd57d)):{},re(_0x3cda95||!_0x8fd57d||!_0x8fd57d[_0x1f6eda(0x1e3)]?H(_0x54720e,_0x1f6eda(0x199),{'value':_0x8fd57d,'enumerable':!0x0}):_0x54720e,_0x8fd57d)),X=class{constructor(_0x373ca4,_0x59881a,_0x5eb5d5,_0x50b857,_0x3207c8){var _0x114f07=_0x1f6eda;this['global']=_0x373ca4,this[_0x114f07(0x1cd)]=_0x59881a,this[_0x114f07(0x1f9)]=_0x5eb5d5,this[_0x114f07(0x206)]=_0x50b857,this[_0x114f07(0x1b8)]=_0x3207c8,this[_0x114f07(0x176)]=!0x0,this[_0x114f07(0x185)]=!0x0,this['_connected']=!0x1,this[_0x114f07(0x1b2)]=!0x1,this['_inNextEdge']=_0x373ca4[_0x114f07(0x202)]?.[_0x114f07(0x1ac)]?.[_0x114f07(0x1c3)]===_0x114f07(0x24e),this['_inBrowser']=!this[_0x114f07(0x182)][_0x114f07(0x202)]?.[_0x114f07(0x18c)]?.['node']&&!this['_inNextEdge'],this[_0x114f07(0x196)]=null,this[_0x114f07(0x180)]=0x0,this['_maxConnectAttemptCount']=0x14,this[_0x114f07(0x171)]=_0x114f07(0x1d8),this[_0x114f07(0x200)]=(this[_0x114f07(0x17c)]?_0x114f07(0x195):_0x114f07(0x234))+this[_0x114f07(0x171)];}async[_0x1f6eda(0x24c)](){var _0x18e551=_0x1f6eda;if(this[_0x18e551(0x196)])return this[_0x18e551(0x196)];let _0x23280b;if(this['_inBrowser']||this['_inNextEdge'])_0x23280b=this[_0x18e551(0x182)]['WebSocket'];else{if(this[_0x18e551(0x182)][_0x18e551(0x202)]?.[_0x18e551(0x1ca)])_0x23280b=this[_0x18e551(0x182)][_0x18e551(0x202)]?.['_WebSocket'];else try{let _0x51a217=await import(_0x18e551(0x18e));_0x23280b=(await import((await import('url'))[_0x18e551(0x21b)](_0x51a217[_0x18e551(0x1a6)](this['nodeModules'],'ws/index.js'))[_0x18e551(0x210)]()))[_0x18e551(0x199)];}catch{try{_0x23280b=require(require('path')['join'](this[_0x18e551(0x206)],'ws'));}catch{throw new Error(_0x18e551(0x21f));}}}return this['_WebSocketClass']=_0x23280b,_0x23280b;}[_0x1f6eda(0x17f)](){var _0x237708=_0x1f6eda;this[_0x237708(0x1b2)]||this[_0x237708(0x1fa)]||this[_0x237708(0x180)]>=this[_0x237708(0x253)]||(this[_0x237708(0x185)]=!0x1,this['_connecting']=!0x0,this[_0x237708(0x180)]++,this[_0x237708(0x229)]=new Promise((_0x184041,_0xb85205)=>{var _0x1c20d6=_0x237708;this[_0x1c20d6(0x24c)]()[_0x1c20d6(0x205)](_0x17df23=>{var _0x293cc6=_0x1c20d6;let _0x37859e=new _0x17df23(_0x293cc6(0x20b)+(!this[_0x293cc6(0x17c)]&&this[_0x293cc6(0x1b8)]?_0x293cc6(0x175):this[_0x293cc6(0x1cd)])+':'+this[_0x293cc6(0x1f9)]);_0x37859e['onerror']=()=>{var _0x373ac4=_0x293cc6;this[_0x373ac4(0x176)]=!0x1,this[_0x373ac4(0x1d9)](_0x37859e),this[_0x373ac4(0x1ae)](),_0xb85205(new Error(_0x373ac4(0x1e1)));},_0x37859e[_0x293cc6(0x1f3)]=()=>{var _0x4b9df7=_0x293cc6;this[_0x4b9df7(0x17c)]||_0x37859e['_socket']&&_0x37859e[_0x4b9df7(0x1d2)]['unref']&&_0x37859e['_socket'][_0x4b9df7(0x1fd)](),_0x184041(_0x37859e);},_0x37859e[_0x293cc6(0x230)]=()=>{var _0x82fbcd=_0x293cc6;this[_0x82fbcd(0x185)]=!0x0,this[_0x82fbcd(0x1d9)](_0x37859e),this['_attemptToReconnectShortly']();},_0x37859e[_0x293cc6(0x1f8)]=_0xae0a16=>{var _0x2de513=_0x293cc6;try{_0xae0a16&&_0xae0a16[_0x2de513(0x254)]&&this[_0x2de513(0x17c)]&&JSON[_0x2de513(0x23a)](_0xae0a16[_0x2de513(0x254)])['method']===_0x2de513(0x24f)&&this[_0x2de513(0x182)][_0x2de513(0x187)][_0x2de513(0x24f)]();}catch{}};})[_0x1c20d6(0x205)](_0x3d56b5=>(this[_0x1c20d6(0x1fa)]=!0x0,this[_0x1c20d6(0x1b2)]=!0x1,this['_allowedToConnectOnSend']=!0x1,this[_0x1c20d6(0x176)]=!0x0,this[_0x1c20d6(0x180)]=0x0,_0x3d56b5))['catch'](_0x93f6f=>(this[_0x1c20d6(0x1fa)]=!0x1,this[_0x1c20d6(0x1b2)]=!0x1,console[_0x1c20d6(0x218)](_0x1c20d6(0x1bd)+this[_0x1c20d6(0x171)]),_0xb85205(new Error('failed\\x20to\\x20connect\\x20to\\x20host:\\x20'+(_0x93f6f&&_0x93f6f[_0x1c20d6(0x18b)])))));}));}[_0x1f6eda(0x1d9)](_0x49d409){var _0x5207d7=_0x1f6eda;this[_0x5207d7(0x1fa)]=!0x1,this[_0x5207d7(0x1b2)]=!0x1;try{_0x49d409[_0x5207d7(0x230)]=null,_0x49d409[_0x5207d7(0x19c)]=null,_0x49d409[_0x5207d7(0x1f3)]=null;}catch{}try{_0x49d409['readyState']<0x2&&_0x49d409[_0x5207d7(0x1a9)]();}catch{}}[_0x1f6eda(0x1ae)](){var _0x4f1af9=_0x1f6eda;clearTimeout(this['_reconnectTimeout']),!(this['_connectAttemptCount']>=this[_0x4f1af9(0x253)])&&(this[_0x4f1af9(0x178)]=setTimeout(()=>{var _0x1ee48c=_0x4f1af9;this['_connected']||this[_0x1ee48c(0x1b2)]||(this[_0x1ee48c(0x17f)](),this[_0x1ee48c(0x229)]?.['catch'](()=>this[_0x1ee48c(0x1ae)]()));},0x1f4),this['_reconnectTimeout']['unref']&&this[_0x4f1af9(0x178)][_0x4f1af9(0x1fd)]());}async[_0x1f6eda(0x24b)](_0x4a53f7){var _0x3f22eb=_0x1f6eda;try{if(!this['_allowedToSend'])return;this['_allowedToConnectOnSend']&&this[_0x3f22eb(0x17f)](),(await this[_0x3f22eb(0x229)])[_0x3f22eb(0x24b)](JSON[_0x3f22eb(0x216)](_0x4a53f7));}catch(_0x1902c2){console['warn'](this[_0x3f22eb(0x200)]+':\\x20'+(_0x1902c2&&_0x1902c2[_0x3f22eb(0x18b)])),this[_0x3f22eb(0x176)]=!0x1,this['_attemptToReconnectShortly']();}}};function b(_0x551fad,_0x5cf2ef,_0x5e3589,_0xa6781b,_0x4d49e6,_0x21701e){var _0x1d45e6=_0x1f6eda;let _0x4bbfae=_0x5e3589['split'](',')[_0x1d45e6(0x18f)](_0x5e7061=>{var _0x4f3a2a=_0x1d45e6;try{_0x551fad['_console_ninja_session']||((_0x4d49e6===_0x4f3a2a(0x239)||_0x4d49e6===_0x4f3a2a(0x247)||_0x4d49e6===_0x4f3a2a(0x256))&&(_0x4d49e6+=!_0x551fad['process']?.[_0x4f3a2a(0x18c)]?.[_0x4f3a2a(0x209)]&&_0x551fad['process']?.[_0x4f3a2a(0x1ac)]?.[_0x4f3a2a(0x1c3)]!==_0x4f3a2a(0x24e)?_0x4f3a2a(0x212):'\\x20server'),_0x551fad[_0x4f3a2a(0x22b)]={'id':+new Date(),'tool':_0x4d49e6});let _0x290a2b=new X(_0x551fad,_0x5cf2ef,_0x5e7061,_0xa6781b,_0x21701e);return _0x290a2b['send'][_0x4f3a2a(0x1ea)](_0x290a2b);}catch(_0x34d384){return console[_0x4f3a2a(0x218)](_0x4f3a2a(0x1ed),_0x34d384&&_0x34d384[_0x4f3a2a(0x18b)]),()=>{};}});return _0x148843=>_0x4bbfae[_0x1d45e6(0x223)](_0x1e9b1b=>_0x1e9b1b(_0x148843));}function W(_0xcd8910){var _0x19fd65=_0x1f6eda;let _0xe1c7c0=function(_0x257a64,_0x5beefe){return _0x5beefe-_0x257a64;},_0x56f3aa;if(_0xcd8910['performance'])_0x56f3aa=function(){var _0xbc2fa=_0x588c;return _0xcd8910['performance'][_0xbc2fa(0x1a7)]();};else{if(_0xcd8910[_0x19fd65(0x202)]&&_0xcd8910[_0x19fd65(0x202)]['hrtime']&&_0xcd8910['process']?.[_0x19fd65(0x1ac)]?.['NEXT_RUNTIME']!==_0x19fd65(0x24e))_0x56f3aa=function(){var _0x2fa4e4=_0x19fd65;return _0xcd8910[_0x2fa4e4(0x202)][_0x2fa4e4(0x222)]();},_0xe1c7c0=function(_0x7c4c29,_0x284711){return 0x3e8*(_0x284711[0x0]-_0x7c4c29[0x0])+(_0x284711[0x1]-_0x7c4c29[0x1])/0xf4240;};else try{let {performance:_0x49a79d}=require(_0x19fd65(0x1e4));_0x56f3aa=function(){var _0x455ecb=_0x19fd65;return _0x49a79d[_0x455ecb(0x1a7)]();};}catch{_0x56f3aa=function(){return+new Date();};}}return{'elapsed':_0xe1c7c0,'timeStamp':_0x56f3aa,'now':()=>Date[_0x19fd65(0x1a7)]()};}function J(_0x3bb7f1,_0x52cea5,_0x3f625b){var _0x3bc793=_0x1f6eda;if(_0x3bb7f1[_0x3bc793(0x1f1)]!==void 0x0)return _0x3bb7f1[_0x3bc793(0x1f1)];let _0x3471bb=_0x3bb7f1[_0x3bc793(0x202)]?.[_0x3bc793(0x18c)]?.['node']||_0x3bb7f1[_0x3bc793(0x202)]?.[_0x3bc793(0x1ac)]?.[_0x3bc793(0x1c3)]===_0x3bc793(0x24e);return _0x3471bb&&_0x3f625b===_0x3bc793(0x24a)?_0x3bb7f1[_0x3bc793(0x1f1)]=!0x1:_0x3bb7f1['_consoleNinjaAllowedToStart']=_0x3471bb||!_0x52cea5||_0x3bb7f1['location']?.[_0x3bc793(0x258)]&&_0x52cea5[_0x3bc793(0x248)](_0x3bb7f1['location']['hostname']),_0x3bb7f1['_consoleNinjaAllowedToStart'];}function Y(_0xbd4ca0,_0x3f5da3,_0xde2948,_0x59bc57){var _0x545369=_0x1f6eda;_0xbd4ca0=_0xbd4ca0,_0x3f5da3=_0x3f5da3,_0xde2948=_0xde2948,_0x59bc57=_0x59bc57;let _0x246e53=W(_0xbd4ca0),_0x40efbf=_0x246e53[_0x545369(0x1d6)],_0x2ba42f=_0x246e53['timeStamp'];class _0x2f58d4{constructor(){var _0x5983b5=_0x545369;this[_0x5983b5(0x23e)]=/^(?!(?:do|if|in|for|let|new|try|var|case|else|enum|eval|false|null|this|true|void|with|break|catch|class|const|super|throw|while|yield|delete|export|import|public|return|static|switch|typeof|default|extends|finally|package|private|continue|debugger|function|arguments|interface|protected|implements|instanceof)$)[_$a-zA-Z\\xA0-\\uFFFF][_$a-zA-Z0-9\\xA0-\\uFFFF]*$/,this['_numberRegExp']=/^(0|[1-9][0-9]*)$/,this['_quotedRegExp']=/'([^\\\\']|\\\\')*'/,this[_0x5983b5(0x18d)]=_0xbd4ca0[_0x5983b5(0x238)],this[_0x5983b5(0x19a)]=_0xbd4ca0['HTMLAllCollection'],this[_0x5983b5(0x19f)]=Object[_0x5983b5(0x189)],this[_0x5983b5(0x214)]=Object['getOwnPropertyNames'],this[_0x5983b5(0x1d4)]=_0xbd4ca0[_0x5983b5(0x1ab)],this[_0x5983b5(0x22a)]=RegExp[_0x5983b5(0x1e9)][_0x5983b5(0x210)],this[_0x5983b5(0x1ba)]=Date['prototype'][_0x5983b5(0x210)];}[_0x545369(0x227)](_0x5e297c,_0x534ac6,_0x110f7e,_0x56be4c){var _0x37e86d=_0x545369,_0x3853b6=this,_0x4dfdfe=_0x110f7e[_0x37e86d(0x1f0)];function _0x19beb5(_0x1d59dc,_0x30c1f4,_0x40552c){var _0x30bb18=_0x37e86d;_0x30c1f4[_0x30bb18(0x1ce)]=_0x30bb18(0x237),_0x30c1f4['error']=_0x1d59dc[_0x30bb18(0x18b)],_0x46f576=_0x40552c[_0x30bb18(0x209)][_0x30bb18(0x224)],_0x40552c[_0x30bb18(0x209)][_0x30bb18(0x224)]=_0x30c1f4,_0x3853b6[_0x30bb18(0x1c8)](_0x30c1f4,_0x40552c);}try{_0x110f7e[_0x37e86d(0x1a0)]++,_0x110f7e[_0x37e86d(0x1f0)]&&_0x110f7e['autoExpandPreviousObjects'][_0x37e86d(0x20e)](_0x534ac6);var _0x48122b,_0x45f5ba,_0x1ec5c0,_0x41abfc,_0x318cb2=[],_0x38edcf=[],_0x1d822a,_0x18f27a=this[_0x37e86d(0x24d)](_0x534ac6),_0x335016=_0x18f27a===_0x37e86d(0x1b4),_0x2a2862=!0x1,_0x4aaa87=_0x18f27a===_0x37e86d(0x252),_0x45bac4=this[_0x37e86d(0x235)](_0x18f27a),_0x3ebca2=this[_0x37e86d(0x1c9)](_0x18f27a),_0x114dc1=_0x45bac4||_0x3ebca2,_0x3b1846={},_0x41592e=0x0,_0x1d539f=!0x1,_0x46f576,_0x2c41d2=/^(([1-9]{1}[0-9]*)|0)$/;if(_0x110f7e[_0x37e86d(0x17e)]){if(_0x335016){if(_0x45f5ba=_0x534ac6[_0x37e86d(0x251)],_0x45f5ba>_0x110f7e[_0x37e86d(0x211)]){for(_0x1ec5c0=0x0,_0x41abfc=_0x110f7e[_0x37e86d(0x211)],_0x48122b=_0x1ec5c0;_0x48122b<_0x41abfc;_0x48122b++)_0x38edcf[_0x37e86d(0x20e)](_0x3853b6[_0x37e86d(0x179)](_0x318cb2,_0x534ac6,_0x18f27a,_0x48122b,_0x110f7e));_0x5e297c[_0x37e86d(0x1a1)]=!0x0;}else{for(_0x1ec5c0=0x0,_0x41abfc=_0x45f5ba,_0x48122b=_0x1ec5c0;_0x48122b<_0x41abfc;_0x48122b++)_0x38edcf[_0x37e86d(0x20e)](_0x3853b6['_addProperty'](_0x318cb2,_0x534ac6,_0x18f27a,_0x48122b,_0x110f7e));}_0x110f7e[_0x37e86d(0x1eb)]+=_0x38edcf['length'];}if(!(_0x18f27a===_0x37e86d(0x173)||_0x18f27a==='undefined')&&!_0x45bac4&&_0x18f27a!=='String'&&_0x18f27a!==_0x37e86d(0x1bc)&&_0x18f27a!==_0x37e86d(0x1de)){var _0x6563a5=_0x56be4c[_0x37e86d(0x257)]||_0x110f7e['props'];if(this['_isSet'](_0x534ac6)?(_0x48122b=0x0,_0x534ac6['forEach'](function(_0x129dbd){var _0x3c202b=_0x37e86d;if(_0x41592e++,_0x110f7e[_0x3c202b(0x1eb)]++,_0x41592e>_0x6563a5){_0x1d539f=!0x0;return;}if(!_0x110f7e[_0x3c202b(0x22e)]&&_0x110f7e['autoExpand']&&_0x110f7e[_0x3c202b(0x1eb)]>_0x110f7e['autoExpandLimit']){_0x1d539f=!0x0;return;}_0x38edcf[_0x3c202b(0x20e)](_0x3853b6[_0x3c202b(0x179)](_0x318cb2,_0x534ac6,_0x3c202b(0x22d),_0x48122b++,_0x110f7e,function(_0x398743){return function(){return _0x398743;};}(_0x129dbd)));})):this[_0x37e86d(0x17b)](_0x534ac6)&&_0x534ac6[_0x37e86d(0x223)](function(_0x3495ef,_0x292181){var _0x3c30e0=_0x37e86d;if(_0x41592e++,_0x110f7e[_0x3c30e0(0x1eb)]++,_0x41592e>_0x6563a5){_0x1d539f=!0x0;return;}if(!_0x110f7e[_0x3c30e0(0x22e)]&&_0x110f7e['autoExpand']&&_0x110f7e[_0x3c30e0(0x1eb)]>_0x110f7e['autoExpandLimit']){_0x1d539f=!0x0;return;}var _0x18a4fc=_0x292181['toString']();_0x18a4fc[_0x3c30e0(0x251)]>0x64&&(_0x18a4fc=_0x18a4fc[_0x3c30e0(0x23f)](0x0,0x64)+'...'),_0x38edcf[_0x3c30e0(0x20e)](_0x3853b6[_0x3c30e0(0x179)](_0x318cb2,_0x534ac6,_0x3c30e0(0x1ef),_0x18a4fc,_0x110f7e,function(_0xf138f5){return function(){return _0xf138f5;};}(_0x3495ef)));}),!_0x2a2862){try{for(_0x1d822a in _0x534ac6)if(!(_0x335016&&_0x2c41d2[_0x37e86d(0x1a2)](_0x1d822a))&&!this[_0x37e86d(0x219)](_0x534ac6,_0x1d822a,_0x110f7e)){if(_0x41592e++,_0x110f7e[_0x37e86d(0x1eb)]++,_0x41592e>_0x6563a5){_0x1d539f=!0x0;break;}if(!_0x110f7e[_0x37e86d(0x22e)]&&_0x110f7e[_0x37e86d(0x1f0)]&&_0x110f7e[_0x37e86d(0x1eb)]>_0x110f7e[_0x37e86d(0x1b5)]){_0x1d539f=!0x0;break;}_0x38edcf[_0x37e86d(0x20e)](_0x3853b6[_0x37e86d(0x1c5)](_0x318cb2,_0x3b1846,_0x534ac6,_0x18f27a,_0x1d822a,_0x110f7e));}}catch{}if(_0x3b1846[_0x37e86d(0x1bb)]=!0x0,_0x4aaa87&&(_0x3b1846[_0x37e86d(0x1bf)]=!0x0),!_0x1d539f){var _0x29046c=[]['concat'](this[_0x37e86d(0x214)](_0x534ac6))[_0x37e86d(0x1b3)](this[_0x37e86d(0x1a4)](_0x534ac6));for(_0x48122b=0x0,_0x45f5ba=_0x29046c['length'];_0x48122b<_0x45f5ba;_0x48122b++)if(_0x1d822a=_0x29046c[_0x48122b],!(_0x335016&&_0x2c41d2[_0x37e86d(0x1a2)](_0x1d822a[_0x37e86d(0x210)]()))&&!this[_0x37e86d(0x219)](_0x534ac6,_0x1d822a,_0x110f7e)&&!_0x3b1846[_0x37e86d(0x255)+_0x1d822a[_0x37e86d(0x210)]()]){if(_0x41592e++,_0x110f7e[_0x37e86d(0x1eb)]++,_0x41592e>_0x6563a5){_0x1d539f=!0x0;break;}if(!_0x110f7e[_0x37e86d(0x22e)]&&_0x110f7e[_0x37e86d(0x1f0)]&&_0x110f7e[_0x37e86d(0x1eb)]>_0x110f7e[_0x37e86d(0x1b5)]){_0x1d539f=!0x0;break;}_0x38edcf[_0x37e86d(0x20e)](_0x3853b6[_0x37e86d(0x1c5)](_0x318cb2,_0x3b1846,_0x534ac6,_0x18f27a,_0x1d822a,_0x110f7e));}}}}}if(_0x5e297c[_0x37e86d(0x1ce)]=_0x18f27a,_0x114dc1?(_0x5e297c[_0x37e86d(0x25b)]=_0x534ac6[_0x37e86d(0x19b)](),this[_0x37e86d(0x1af)](_0x18f27a,_0x5e297c,_0x110f7e,_0x56be4c)):_0x18f27a==='date'?_0x5e297c['value']=this[_0x37e86d(0x1ba)]['call'](_0x534ac6):_0x18f27a==='bigint'?_0x5e297c[_0x37e86d(0x25b)]=_0x534ac6[_0x37e86d(0x210)]():_0x18f27a==='RegExp'?_0x5e297c[_0x37e86d(0x25b)]=this[_0x37e86d(0x22a)][_0x37e86d(0x1cb)](_0x534ac6):_0x18f27a==='symbol'&&this[_0x37e86d(0x1d4)]?_0x5e297c[_0x37e86d(0x25b)]=this['_Symbol'][_0x37e86d(0x1e9)][_0x37e86d(0x210)][_0x37e86d(0x1cb)](_0x534ac6):!_0x110f7e['depth']&&!(_0x18f27a===_0x37e86d(0x173)||_0x18f27a===_0x37e86d(0x238))&&(delete _0x5e297c[_0x37e86d(0x25b)],_0x5e297c['capped']=!0x0),_0x1d539f&&(_0x5e297c[_0x37e86d(0x246)]=!0x0),_0x46f576=_0x110f7e[_0x37e86d(0x209)][_0x37e86d(0x224)],_0x110f7e['node'][_0x37e86d(0x224)]=_0x5e297c,this[_0x37e86d(0x1c8)](_0x5e297c,_0x110f7e),_0x38edcf[_0x37e86d(0x251)]){for(_0x48122b=0x0,_0x45f5ba=_0x38edcf['length'];_0x48122b<_0x45f5ba;_0x48122b++)_0x38edcf[_0x48122b](_0x48122b);}_0x318cb2['length']&&(_0x5e297c[_0x37e86d(0x257)]=_0x318cb2);}catch(_0x289ed1){_0x19beb5(_0x289ed1,_0x5e297c,_0x110f7e);}return this[_0x37e86d(0x225)](_0x534ac6,_0x5e297c),this['_treeNodePropertiesAfterFullValue'](_0x5e297c,_0x110f7e),_0x110f7e[_0x37e86d(0x209)][_0x37e86d(0x224)]=_0x46f576,_0x110f7e[_0x37e86d(0x1a0)]--,_0x110f7e['autoExpand']=_0x4dfdfe,_0x110f7e['autoExpand']&&_0x110f7e[_0x37e86d(0x1e5)][_0x37e86d(0x1f2)](),_0x5e297c;}['_getOwnPropertySymbols'](_0x1069d2){var _0x723d6b=_0x545369;return Object[_0x723d6b(0x1f4)]?Object[_0x723d6b(0x1f4)](_0x1069d2):[];}['_isSet'](_0x348680){var _0x19684d=_0x545369;return!!(_0x348680&&_0xbd4ca0[_0x19684d(0x22d)]&&this[_0x19684d(0x22c)](_0x348680)===_0x19684d(0x1c1)&&_0x348680[_0x19684d(0x223)]);}[_0x545369(0x219)](_0x3855fe,_0x4f6183,_0x537161){var _0x1f4e53=_0x545369;return _0x537161[_0x1f4e53(0x20a)]?typeof _0x3855fe[_0x4f6183]==_0x1f4e53(0x252):!0x1;}[_0x545369(0x24d)](_0x5af96a){var _0x58353d=_0x545369,_0x187b92='';return _0x187b92=typeof _0x5af96a,_0x187b92===_0x58353d(0x1aa)?this['_objectToString'](_0x5af96a)===_0x58353d(0x1f7)?_0x187b92='array':this[_0x58353d(0x22c)](_0x5af96a)===_0x58353d(0x1be)?_0x187b92=_0x58353d(0x1b9):this['_objectToString'](_0x5af96a)===_0x58353d(0x197)?_0x187b92=_0x58353d(0x1de):_0x5af96a===null?_0x187b92=_0x58353d(0x173):_0x5af96a[_0x58353d(0x1ec)]&&(_0x187b92=_0x5af96a['constructor'][_0x58353d(0x23d)]||_0x187b92):_0x187b92===_0x58353d(0x238)&&this[_0x58353d(0x19a)]&&_0x5af96a instanceof this[_0x58353d(0x19a)]&&(_0x187b92=_0x58353d(0x1c7)),_0x187b92;}[_0x545369(0x22c)](_0x3c0da2){var _0x33fbb9=_0x545369;return Object[_0x33fbb9(0x1e9)]['toString'][_0x33fbb9(0x1cb)](_0x3c0da2);}['_isPrimitiveType'](_0xa69330){var _0x573c5a=_0x545369;return _0xa69330==='boolean'||_0xa69330===_0x573c5a(0x217)||_0xa69330===_0x573c5a(0x1b0);}[_0x545369(0x1c9)](_0x4ff28b){var _0x581072=_0x545369;return _0x4ff28b===_0x581072(0x21e)||_0x4ff28b===_0x581072(0x208)||_0x4ff28b===_0x581072(0x1d1);}[_0x545369(0x179)](_0x5b8a3f,_0x1232b2,_0x519405,_0x4c7929,_0x2456fa,_0x3fcaf4){var _0x44d25a=this;return function(_0x5c7843){var _0x235ced=_0x588c,_0x28223c=_0x2456fa['node'][_0x235ced(0x224)],_0x4f142b=_0x2456fa[_0x235ced(0x209)][_0x235ced(0x188)],_0x5f37ae=_0x2456fa[_0x235ced(0x209)][_0x235ced(0x1ee)];_0x2456fa[_0x235ced(0x209)][_0x235ced(0x1ee)]=_0x28223c,_0x2456fa[_0x235ced(0x209)][_0x235ced(0x188)]=typeof _0x4c7929==_0x235ced(0x1b0)?_0x4c7929:_0x5c7843,_0x5b8a3f[_0x235ced(0x20e)](_0x44d25a[_0x235ced(0x1ff)](_0x1232b2,_0x519405,_0x4c7929,_0x2456fa,_0x3fcaf4)),_0x2456fa['node'][_0x235ced(0x1ee)]=_0x5f37ae,_0x2456fa[_0x235ced(0x209)][_0x235ced(0x188)]=_0x4f142b;};}['_addObjectProperty'](_0x50721d,_0xf736e8,_0x34b355,_0x17666a,_0x20a6dc,_0x1d8048,_0x347b89){var _0x127354=_0x545369,_0x3a6a50=this;return _0xf736e8[_0x127354(0x255)+_0x20a6dc[_0x127354(0x210)]()]=!0x0,function(_0x2550cd){var _0x2b09eb=_0x127354,_0x49be58=_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x224)],_0x20be3f=_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x188)],_0x5759c6=_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x1ee)];_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x1ee)]=_0x49be58,_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x188)]=_0x2550cd,_0x50721d[_0x2b09eb(0x20e)](_0x3a6a50[_0x2b09eb(0x1ff)](_0x34b355,_0x17666a,_0x20a6dc,_0x1d8048,_0x347b89)),_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x1ee)]=_0x5759c6,_0x1d8048[_0x2b09eb(0x209)][_0x2b09eb(0x188)]=_0x20be3f;};}[_0x545369(0x1ff)](_0x29d290,_0x33d1dc,_0x3dc5c9,_0x4f3ace,_0x4c1214){var _0xe87137=_0x545369,_0x4f5999=this;_0x4c1214||(_0x4c1214=function(_0x3f1a47,_0xe7d713){return _0x3f1a47[_0xe7d713];});var _0x2b3662=_0x3dc5c9[_0xe87137(0x210)](),_0x51194c=_0x4f3ace[_0xe87137(0x1d5)]||{},_0x4ec001=_0x4f3ace[_0xe87137(0x17e)],_0x2cdc0a=_0x4f3ace[_0xe87137(0x22e)];try{var _0x4eb65d=this[_0xe87137(0x17b)](_0x29d290),_0x52885b=_0x2b3662;_0x4eb65d&&_0x52885b[0x0]==='\\x27'&&(_0x52885b=_0x52885b[_0xe87137(0x1b6)](0x1,_0x52885b[_0xe87137(0x251)]-0x2));var _0x1c2d57=_0x4f3ace[_0xe87137(0x1d5)]=_0x51194c['_p_'+_0x52885b];_0x1c2d57&&(_0x4f3ace[_0xe87137(0x17e)]=_0x4f3ace['depth']+0x1),_0x4f3ace['isExpressionToEvaluate']=!!_0x1c2d57;var _0x2c2467=typeof _0x3dc5c9==_0xe87137(0x22f),_0x1ead94={'name':_0x2c2467||_0x4eb65d?_0x2b3662:this['_propertyName'](_0x2b3662)};if(_0x2c2467&&(_0x1ead94['symbol']=!0x0),!(_0x33d1dc===_0xe87137(0x1b4)||_0x33d1dc===_0xe87137(0x201))){var _0x4b6e27=this[_0xe87137(0x19f)](_0x29d290,_0x3dc5c9);if(_0x4b6e27&&(_0x4b6e27[_0xe87137(0x1f5)]&&(_0x1ead94[_0xe87137(0x1c6)]=!0x0),_0x4b6e27[_0xe87137(0x1c2)]&&!_0x1c2d57&&!_0x4f3ace[_0xe87137(0x1c0)]))return _0x1ead94['getter']=!0x0,this[_0xe87137(0x193)](_0x1ead94,_0x4f3ace),_0x1ead94;}var _0x2ac1d8;try{_0x2ac1d8=_0x4c1214(_0x29d290,_0x3dc5c9);}catch(_0x51b74f){return _0x1ead94={'name':_0x2b3662,'type':_0xe87137(0x237),'error':_0x51b74f[_0xe87137(0x18b)]},this[_0xe87137(0x193)](_0x1ead94,_0x4f3ace),_0x1ead94;}var _0x363a2e=this[_0xe87137(0x24d)](_0x2ac1d8),_0x33a185=this[_0xe87137(0x235)](_0x363a2e);if(_0x1ead94[_0xe87137(0x1ce)]=_0x363a2e,_0x33a185)this[_0xe87137(0x193)](_0x1ead94,_0x4f3ace,_0x2ac1d8,function(){var _0x12d2d0=_0xe87137;_0x1ead94[_0x12d2d0(0x25b)]=_0x2ac1d8[_0x12d2d0(0x19b)](),!_0x1c2d57&&_0x4f5999[_0x12d2d0(0x1af)](_0x363a2e,_0x1ead94,_0x4f3ace,{});});else{var _0x5c36f4=_0x4f3ace[_0xe87137(0x1f0)]&&_0x4f3ace[_0xe87137(0x1a0)]<_0x4f3ace['autoExpandMaxDepth']&&_0x4f3ace[_0xe87137(0x1e5)][_0xe87137(0x250)](_0x2ac1d8)<0x0&&_0x363a2e!=='function'&&_0x4f3ace[_0xe87137(0x1eb)]<_0x4f3ace[_0xe87137(0x1b5)];_0x5c36f4||_0x4f3ace[_0xe87137(0x1a0)]<_0x4ec001||_0x1c2d57?(this[_0xe87137(0x227)](_0x1ead94,_0x2ac1d8,_0x4f3ace,_0x1c2d57||{}),this[_0xe87137(0x225)](_0x2ac1d8,_0x1ead94)):this[_0xe87137(0x193)](_0x1ead94,_0x4f3ace,_0x2ac1d8,function(){var _0x5569b6=_0xe87137;_0x363a2e==='null'||_0x363a2e===_0x5569b6(0x238)||(delete _0x1ead94[_0x5569b6(0x25b)],_0x1ead94[_0x5569b6(0x21d)]=!0x0);});}return _0x1ead94;}finally{_0x4f3ace[_0xe87137(0x1d5)]=_0x51194c,_0x4f3ace[_0xe87137(0x17e)]=_0x4ec001,_0x4f3ace[_0xe87137(0x22e)]=_0x2cdc0a;}}[_0x545369(0x1af)](_0x37e115,_0x632dca,_0x4033d8,_0x331bac){var _0x2fa5eb=_0x545369,_0x1c5cea=_0x331bac[_0x2fa5eb(0x233)]||_0x4033d8[_0x2fa5eb(0x233)];if((_0x37e115===_0x2fa5eb(0x217)||_0x37e115===_0x2fa5eb(0x208))&&_0x632dca['value']){let _0x52e658=_0x632dca['value'][_0x2fa5eb(0x251)];_0x4033d8[_0x2fa5eb(0x249)]+=_0x52e658,_0x4033d8[_0x2fa5eb(0x249)]>_0x4033d8['totalStrLength']?(_0x632dca[_0x2fa5eb(0x21d)]='',delete _0x632dca[_0x2fa5eb(0x25b)]):_0x52e658>_0x1c5cea&&(_0x632dca[_0x2fa5eb(0x21d)]=_0x632dca[_0x2fa5eb(0x25b)][_0x2fa5eb(0x1b6)](0x0,_0x1c5cea),delete _0x632dca[_0x2fa5eb(0x25b)]);}}[_0x545369(0x17b)](_0x47a64f){var _0x386352=_0x545369;return!!(_0x47a64f&&_0xbd4ca0['Map']&&this['_objectToString'](_0x47a64f)===_0x386352(0x215)&&_0x47a64f[_0x386352(0x223)]);}['_propertyName'](_0x5ad659){var _0x46b9ce=_0x545369;if(_0x5ad659[_0x46b9ce(0x1ad)](/^\\d+$/))return _0x5ad659;var _0x5ac031;try{_0x5ac031=JSON[_0x46b9ce(0x216)](''+_0x5ad659);}catch{_0x5ac031='\\x22'+this[_0x46b9ce(0x22c)](_0x5ad659)+'\\x22';}return _0x5ac031['match'](/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)?_0x5ac031=_0x5ac031[_0x46b9ce(0x1b6)](0x1,_0x5ac031['length']-0x2):_0x5ac031=_0x5ac031[_0x46b9ce(0x1dc)](/'/g,'\\x5c\\x27')[_0x46b9ce(0x1dc)](/\\\\\"/g,'\\x22')['replace'](/(^\"|\"$)/g,'\\x27'),_0x5ac031;}['_processTreeNodeResult'](_0x47ec42,_0x5856b8,_0x1b972c,_0x1b7c2f){var _0x9f56bc=_0x545369;this[_0x9f56bc(0x1c8)](_0x47ec42,_0x5856b8),_0x1b7c2f&&_0x1b7c2f(),this[_0x9f56bc(0x225)](_0x1b972c,_0x47ec42),this['_treeNodePropertiesAfterFullValue'](_0x47ec42,_0x5856b8);}[_0x545369(0x1c8)](_0x36c42c,_0x1d34c0){var _0x2d3916=_0x545369;this['_setNodeId'](_0x36c42c,_0x1d34c0),this[_0x2d3916(0x177)](_0x36c42c,_0x1d34c0),this[_0x2d3916(0x232)](_0x36c42c,_0x1d34c0),this[_0x2d3916(0x19e)](_0x36c42c,_0x1d34c0);}['_setNodeId'](_0x2b614d,_0x8a3cb3){}[_0x545369(0x177)](_0xd7dff2,_0x5aa9b6){}[_0x545369(0x213)](_0x37b2da,_0x11f26c){}['_isUndefined'](_0x40ec05){var _0x5471b1=_0x545369;return _0x40ec05===this[_0x5471b1(0x18d)];}[_0x545369(0x1dd)](_0x17f01a,_0x41a4c5){var _0xb15b45=_0x545369;this[_0xb15b45(0x213)](_0x17f01a,_0x41a4c5),this['_setNodeExpandableState'](_0x17f01a),_0x41a4c5[_0xb15b45(0x172)]&&this[_0xb15b45(0x184)](_0x17f01a),this[_0xb15b45(0x231)](_0x17f01a,_0x41a4c5),this[_0xb15b45(0x1f6)](_0x17f01a,_0x41a4c5),this[_0xb15b45(0x21c)](_0x17f01a);}[_0x545369(0x225)](_0x3e8395,_0x4f84c9){var _0x5dd20e=_0x545369;let _0x20421f;try{_0xbd4ca0['console']&&(_0x20421f=_0xbd4ca0['console'][_0x5dd20e(0x198)],_0xbd4ca0[_0x5dd20e(0x21a)][_0x5dd20e(0x198)]=function(){}),_0x3e8395&&typeof _0x3e8395[_0x5dd20e(0x251)]==_0x5dd20e(0x1b0)&&(_0x4f84c9['length']=_0x3e8395['length']);}catch{}finally{_0x20421f&&(_0xbd4ca0[_0x5dd20e(0x21a)][_0x5dd20e(0x198)]=_0x20421f);}if(_0x4f84c9[_0x5dd20e(0x1ce)]===_0x5dd20e(0x1b0)||_0x4f84c9[_0x5dd20e(0x1ce)]===_0x5dd20e(0x1d1)){if(isNaN(_0x4f84c9[_0x5dd20e(0x25b)]))_0x4f84c9['nan']=!0x0,delete _0x4f84c9['value'];else switch(_0x4f84c9[_0x5dd20e(0x25b)]){case Number['POSITIVE_INFINITY']:_0x4f84c9[_0x5dd20e(0x1e0)]=!0x0,delete _0x4f84c9[_0x5dd20e(0x25b)];break;case Number['NEGATIVE_INFINITY']:_0x4f84c9[_0x5dd20e(0x221)]=!0x0,delete _0x4f84c9[_0x5dd20e(0x25b)];break;case 0x0:this[_0x5dd20e(0x1fe)](_0x4f84c9[_0x5dd20e(0x25b)])&&(_0x4f84c9[_0x5dd20e(0x1b1)]=!0x0);break;}}else _0x4f84c9[_0x5dd20e(0x1ce)]===_0x5dd20e(0x252)&&typeof _0x3e8395[_0x5dd20e(0x23d)]==_0x5dd20e(0x217)&&_0x3e8395['name']&&_0x4f84c9[_0x5dd20e(0x23d)]&&_0x3e8395[_0x5dd20e(0x23d)]!==_0x4f84c9[_0x5dd20e(0x23d)]&&(_0x4f84c9['funcName']=_0x3e8395[_0x5dd20e(0x23d)]);}['_isNegativeZero'](_0x4eef47){var _0x571b0e=_0x545369;return 0x1/_0x4eef47===Number[_0x571b0e(0x191)];}[_0x545369(0x184)](_0x2d2bae){var _0x501cd1=_0x545369;!_0x2d2bae[_0x501cd1(0x257)]||!_0x2d2bae['props']['length']||_0x2d2bae[_0x501cd1(0x1ce)]===_0x501cd1(0x1b4)||_0x2d2bae[_0x501cd1(0x1ce)]===_0x501cd1(0x1ef)||_0x2d2bae['type']===_0x501cd1(0x22d)||_0x2d2bae[_0x501cd1(0x257)]['sort'](function(_0x206b78,_0xc11ce2){var _0x5d4834=_0x501cd1,_0x1e7689=_0x206b78[_0x5d4834(0x23d)][_0x5d4834(0x183)](),_0x5aa6fd=_0xc11ce2['name'][_0x5d4834(0x183)]();return _0x1e7689<_0x5aa6fd?-0x1:_0x1e7689>_0x5aa6fd?0x1:0x0;});}[_0x545369(0x231)](_0x647e8a,_0x535f77){var _0x5bf9bf=_0x545369;if(!(_0x535f77['noFunctions']||!_0x647e8a[_0x5bf9bf(0x257)]||!_0x647e8a[_0x5bf9bf(0x257)][_0x5bf9bf(0x251)])){for(var _0x965581=[],_0x38ee55=[],_0x27c0e6=0x0,_0x5d1cc7=_0x647e8a[_0x5bf9bf(0x257)][_0x5bf9bf(0x251)];_0x27c0e6<_0x5d1cc7;_0x27c0e6++){var _0x129c26=_0x647e8a['props'][_0x27c0e6];_0x129c26['type']===_0x5bf9bf(0x252)?_0x965581[_0x5bf9bf(0x20e)](_0x129c26):_0x38ee55['push'](_0x129c26);}if(!(!_0x38ee55[_0x5bf9bf(0x251)]||_0x965581[_0x5bf9bf(0x251)]<=0x1)){_0x647e8a[_0x5bf9bf(0x257)]=_0x38ee55;var _0x255a05={'functionsNode':!0x0,'props':_0x965581};this[_0x5bf9bf(0x23b)](_0x255a05,_0x535f77),this[_0x5bf9bf(0x213)](_0x255a05,_0x535f77),this[_0x5bf9bf(0x1fb)](_0x255a05),this[_0x5bf9bf(0x19e)](_0x255a05,_0x535f77),_0x255a05['id']+='\\x20f',_0x647e8a['props']['unshift'](_0x255a05);}}}[_0x545369(0x1f6)](_0x54674b,_0x975497){}[_0x545369(0x1fb)](_0x36e117){}[_0x545369(0x181)](_0x1b1aaa){var _0x4803bf=_0x545369;return Array[_0x4803bf(0x207)](_0x1b1aaa)||typeof _0x1b1aaa==_0x4803bf(0x1aa)&&this['_objectToString'](_0x1b1aaa)===_0x4803bf(0x1f7);}[_0x545369(0x19e)](_0x4385ec,_0xfc5f44){}[_0x545369(0x21c)](_0x8e1120){var _0x30365a=_0x545369;delete _0x8e1120[_0x30365a(0x194)],delete _0x8e1120[_0x30365a(0x243)],delete _0x8e1120['_hasMapOnItsPath'];}[_0x545369(0x232)](_0x18e420,_0x45879b){}}let _0x485536=new _0x2f58d4(),_0x4be095={'props':0x64,'elements':0x64,'strLength':0x400*0x32,'totalStrLength':0x400*0x32,'autoExpandLimit':0x1388,'autoExpandMaxDepth':0xa},_0x13f799={'props':0x5,'elements':0x5,'strLength':0x100,'totalStrLength':0x100*0x3,'autoExpandLimit':0x1e,'autoExpandMaxDepth':0x2};function _0x4e63b5(_0x48efcc,_0x422d7c,_0x4e0d6b,_0x3c6654,_0x381fc3,_0x2064c4){var _0x53b142=_0x545369;let _0x114e5c,_0x712209;try{_0x712209=_0x2ba42f(),_0x114e5c=_0xde2948[_0x422d7c],!_0x114e5c||_0x712209-_0x114e5c['ts']>0x1f4&&_0x114e5c['count']&&_0x114e5c[_0x53b142(0x1d0)]/_0x114e5c[_0x53b142(0x226)]<0x64?(_0xde2948[_0x422d7c]=_0x114e5c={'count':0x0,'time':0x0,'ts':_0x712209},_0xde2948[_0x53b142(0x1a8)]={}):_0x712209-_0xde2948[_0x53b142(0x1a8)]['ts']>0x32&&_0xde2948[_0x53b142(0x1a8)]['count']&&_0xde2948['hits'][_0x53b142(0x1d0)]/_0xde2948[_0x53b142(0x1a8)]['count']<0x64&&(_0xde2948[_0x53b142(0x1a8)]={});let _0x9271d=[],_0x5e3442=_0x114e5c[_0x53b142(0x1e6)]||_0xde2948[_0x53b142(0x1a8)][_0x53b142(0x1e6)]?_0x13f799:_0x4be095,_0x38367a=_0x39458b=>{var _0x2a5eef=_0x53b142;let _0x805051={};return _0x805051[_0x2a5eef(0x257)]=_0x39458b[_0x2a5eef(0x257)],_0x805051['elements']=_0x39458b[_0x2a5eef(0x211)],_0x805051[_0x2a5eef(0x233)]=_0x39458b[_0x2a5eef(0x233)],_0x805051[_0x2a5eef(0x245)]=_0x39458b['totalStrLength'],_0x805051['autoExpandLimit']=_0x39458b[_0x2a5eef(0x1b5)],_0x805051[_0x2a5eef(0x25a)]=_0x39458b['autoExpandMaxDepth'],_0x805051[_0x2a5eef(0x172)]=!0x1,_0x805051[_0x2a5eef(0x20a)]=!_0x3f5da3,_0x805051[_0x2a5eef(0x17e)]=0x1,_0x805051[_0x2a5eef(0x1a0)]=0x0,_0x805051[_0x2a5eef(0x259)]='root_exp_id',_0x805051[_0x2a5eef(0x228)]=_0x2a5eef(0x190),_0x805051[_0x2a5eef(0x1f0)]=!0x0,_0x805051[_0x2a5eef(0x1e5)]=[],_0x805051[_0x2a5eef(0x1eb)]=0x0,_0x805051[_0x2a5eef(0x1c0)]=!0x0,_0x805051[_0x2a5eef(0x249)]=0x0,_0x805051[_0x2a5eef(0x209)]={'current':void 0x0,'parent':void 0x0,'index':0x0},_0x805051;};for(var _0x353e65=0x0;_0x353e65<_0x381fc3['length'];_0x353e65++)_0x9271d['push'](_0x485536[_0x53b142(0x227)]({'timeNode':_0x48efcc===_0x53b142(0x1d0)||void 0x0},_0x381fc3[_0x353e65],_0x38367a(_0x5e3442),{}));if(_0x48efcc==='trace'){let _0x56bbd8=Error[_0x53b142(0x1e2)];try{Error[_0x53b142(0x1e2)]=0x1/0x0,_0x9271d['push'](_0x485536[_0x53b142(0x227)]({'stackNode':!0x0},new Error()['stack'],_0x38367a(_0x5e3442),{'strLength':0x1/0x0}));}finally{Error[_0x53b142(0x1e2)]=_0x56bbd8;}}return{'method':_0x53b142(0x1c4),'version':_0x59bc57,'args':[{'ts':_0x4e0d6b,'session':_0x3c6654,'args':_0x9271d,'id':_0x422d7c,'context':_0x2064c4}]};}catch(_0x43f89c){return{'method':'log','version':_0x59bc57,'args':[{'ts':_0x4e0d6b,'session':_0x3c6654,'args':[{'type':_0x53b142(0x237),'error':_0x43f89c&&_0x43f89c[_0x53b142(0x18b)]}],'id':_0x422d7c,'context':_0x2064c4}]};}finally{try{if(_0x114e5c&&_0x712209){let _0x50ac2d=_0x2ba42f();_0x114e5c[_0x53b142(0x226)]++,_0x114e5c['time']+=_0x40efbf(_0x712209,_0x50ac2d),_0x114e5c['ts']=_0x50ac2d,_0xde2948[_0x53b142(0x1a8)][_0x53b142(0x226)]++,_0xde2948[_0x53b142(0x1a8)][_0x53b142(0x1d0)]+=_0x40efbf(_0x712209,_0x50ac2d),_0xde2948['hits']['ts']=_0x50ac2d,(_0x114e5c[_0x53b142(0x226)]>0x32||_0x114e5c[_0x53b142(0x1d0)]>0x64)&&(_0x114e5c[_0x53b142(0x1e6)]=!0x0),(_0xde2948[_0x53b142(0x1a8)]['count']>0x3e8||_0xde2948[_0x53b142(0x1a8)][_0x53b142(0x1d0)]>0x12c)&&(_0xde2948[_0x53b142(0x1a8)][_0x53b142(0x1e6)]=!0x0);}}catch{}}}return _0x4e63b5;}((_0x397823,_0xa9058f,_0x662412,_0x43560e,_0x7a7719,_0x41294b,_0x3f36f9,_0x2a667e,_0x22c644,_0x979242)=>{var _0x299fe2=_0x1f6eda;if(_0x397823[_0x299fe2(0x1df)])return _0x397823[_0x299fe2(0x1df)];if(!J(_0x397823,_0x2a667e,_0x7a7719))return _0x397823[_0x299fe2(0x1df)]={'consoleLog':()=>{},'consoleTrace':()=>{},'consoleTime':()=>{},'consoleTimeEnd':()=>{},'autoLog':()=>{},'autoLogMany':()=>{},'autoTraceMany':()=>{},'coverage':()=>{},'autoTrace':()=>{},'autoTime':()=>{},'autoTimeEnd':()=>{}},_0x397823['_console_ninja'];let _0x41c48e=W(_0x397823),_0x24d075=_0x41c48e[_0x299fe2(0x1d6)],_0x4a9ec1=_0x41c48e[_0x299fe2(0x244)],_0x59aac0=_0x41c48e[_0x299fe2(0x1a7)],_0x46a5d6={'hits':{},'ts':{}},_0x38ed34=Y(_0x397823,_0x22c644,_0x46a5d6,_0x41294b),_0x33ac10=_0xec81bd=>{_0x46a5d6['ts'][_0xec81bd]=_0x4a9ec1();},_0x214ca4=(_0x2cc30e,_0x307583)=>{let _0x2c3d01=_0x46a5d6['ts'][_0x307583];if(delete _0x46a5d6['ts'][_0x307583],_0x2c3d01){let _0x4e4473=_0x24d075(_0x2c3d01,_0x4a9ec1());_0x3b5fab(_0x38ed34('time',_0x2cc30e,_0x59aac0(),_0x4b74ac,[_0x4e4473],_0x307583));}},_0x216770=_0xd45304=>_0x1872b8=>{var _0xff0a0d=_0x299fe2;try{_0x33ac10(_0x1872b8),_0xd45304(_0x1872b8);}finally{_0x397823[_0xff0a0d(0x21a)][_0xff0a0d(0x1d0)]=_0xd45304;}},_0x424542=_0x1b68e2=>_0x410b69=>{var _0xa8a6f6=_0x299fe2;try{let [_0x2983a6,_0x2a1e79]=_0x410b69[_0xa8a6f6(0x20f)](_0xa8a6f6(0x1cc));_0x214ca4(_0x2a1e79,_0x2983a6),_0x1b68e2(_0x2983a6);}finally{_0x397823[_0xa8a6f6(0x21a)][_0xa8a6f6(0x192)]=_0x1b68e2;}};_0x397823[_0x299fe2(0x1df)]={'consoleLog':(_0x557bbe,_0xb7e0ff)=>{var _0x218e61=_0x299fe2;_0x397823['console']['log'][_0x218e61(0x23d)]!==_0x218e61(0x1e8)&&_0x3b5fab(_0x38ed34(_0x218e61(0x1c4),_0x557bbe,_0x59aac0(),_0x4b74ac,_0xb7e0ff));},'consoleTrace':(_0x648621,_0x419e93)=>{var _0xcfd31e=_0x299fe2;_0x397823[_0xcfd31e(0x21a)][_0xcfd31e(0x1c4)][_0xcfd31e(0x23d)]!==_0xcfd31e(0x1b7)&&_0x3b5fab(_0x38ed34(_0xcfd31e(0x19d),_0x648621,_0x59aac0(),_0x4b74ac,_0x419e93));},'consoleTime':()=>{var _0x1cf6a3=_0x299fe2;_0x397823[_0x1cf6a3(0x21a)][_0x1cf6a3(0x1d0)]=_0x216770(_0x397823[_0x1cf6a3(0x21a)]['time']);},'consoleTimeEnd':()=>{var _0x143a42=_0x299fe2;_0x397823[_0x143a42(0x21a)]['timeEnd']=_0x424542(_0x397823[_0x143a42(0x21a)][_0x143a42(0x192)]);},'autoLog':(_0x4a9cf1,_0x7d7e42)=>{var _0x36905b=_0x299fe2;_0x3b5fab(_0x38ed34(_0x36905b(0x1c4),_0x7d7e42,_0x59aac0(),_0x4b74ac,[_0x4a9cf1]));},'autoLogMany':(_0x6761e9,_0x5b6d99)=>{var _0xbde178=_0x299fe2;_0x3b5fab(_0x38ed34(_0xbde178(0x1c4),_0x6761e9,_0x59aac0(),_0x4b74ac,_0x5b6d99));},'autoTrace':(_0x3fd090,_0x3bcc3f)=>{var _0x5427e5=_0x299fe2;_0x3b5fab(_0x38ed34(_0x5427e5(0x19d),_0x3bcc3f,_0x59aac0(),_0x4b74ac,[_0x3fd090]));},'autoTraceMany':(_0x160407,_0x476de5)=>{var _0x4a26ee=_0x299fe2;_0x3b5fab(_0x38ed34(_0x4a26ee(0x19d),_0x160407,_0x59aac0(),_0x4b74ac,_0x476de5));},'autoTime':(_0x2ebc4f,_0x8f55ad,_0xb83791)=>{_0x33ac10(_0xb83791);},'autoTimeEnd':(_0x318572,_0x407429,_0x14912f)=>{_0x214ca4(_0x407429,_0x14912f);},'coverage':_0x3ea1ad=>{var _0x27f71f=_0x299fe2;_0x3b5fab({'method':_0x27f71f(0x1a5),'version':_0x41294b,'args':[{'id':_0x3ea1ad}]});}};let _0x3b5fab=b(_0x397823,_0xa9058f,_0x662412,_0x43560e,_0x7a7719,_0x979242),_0x4b74ac=_0x397823[_0x299fe2(0x22b)];return _0x397823[_0x299fe2(0x1df)];})(globalThis,_0x1f6eda(0x241),_0x1f6eda(0x203),_0x1f6eda(0x1db),_0x1f6eda(0x220),_0x1f6eda(0x1a3),_0x1f6eda(0x1d7),_0x1f6eda(0x1d3),_0x1f6eda(0x17d),_0x1f6eda(0x174));");
  } catch (e) {}
}

;

function oo_oo(i) {
  for (var _len = arguments.length, v = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    v[_key - 1] = arguments[_key];
  }

  try {
    oo_cm().consoleLog(i, v);
  } catch (e) {}

  return v;
}

;

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

function oo_ts() {
  try {
    oo_cm().consoleTime();
  } catch (e) {}
}

;

function oo_te() {
  try {
    oo_cm().consoleTimeEnd();
  } catch (e) {}
}

;
/*eslint unicorn/no-abusive-eslint-disable:,eslint-comments/disable-enable-pair:,eslint-comments/no-unlimited-disable:,eslint-comments/no-aggregating-enable:,eslint-comments/no-duplicate-disable:,eslint-comments/no-unused-disable:,eslint-comments/no-unused-enable:,*/

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/plagiarism-checker.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\WORK\cmlabs\tools\resources\js\plagiarism-checker.js */"./resources/js/plagiarism-checker.js");


/***/ })

/******/ });