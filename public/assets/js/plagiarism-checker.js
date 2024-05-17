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
/* istanbul ignore next */

/* c8 ignore start */

/* eslint-disable */

;

function oo_cm() {
  try {
    return (0, eval)("globalThis._console_ninja") || (0, eval)("/* https://github.com/wallabyjs/console-ninja#how-does-it-work */'use strict';function _0x3349(){var _0x5b1e55=['unref','set','_hasSetOnItsPath','1478090nErLhU','global','strLength','[object\\x20Date]','location','_getOwnPropertyNames','_attemptToReconnectShortly','autoExpandPropertyCount','_p_','serialize','background:\\x20rgb(30,30,30);\\x20color:\\x20rgb(255,213,92)','_setNodeQueryPath','stringify','hrtime','logger\\x20websocket\\x20error','_isUndefined','NEXT_RUNTIME','expressionsToEvaluate','catch','dockerizedApp','_inBrowser','current','time','_sendErrorMessage','isArray','hostname','onclose','stackTraceLimit','call','negativeInfinity','_additionalMetadata','9624ejzwia','defineProperty','HTMLAllCollection','_type','valueOf','origin','_keyStrRegExp','14pJLLQA','_isPrimitiveWrapperType','_connectAttemptCount','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host','cappedElements','Error','NEGATIVE_INFINITY','index','_HTMLAllCollection','_addLoadNode','_getOwnPropertyDescriptor','_isArray','_treeNodePropertiesAfterFullValue','capped','node','127.0.0.1','versions','cappedProps','parse','42KehWwy','type','next.js','length','...','_objectToString','map','_undefined','rootExpression','allStrLength','test','_isSet','9bMUgid','RegExp','1','astro','_connectToHostNow','_setNodeId','console','send','elapsed','name','unshift','port','data','Set','reduceLimits','178299oTxspT','_property','_connecting','','root_exp_id','elements','ws/index.js','warn','count','getWebSocketClass','parent','%c\\x20Console\\x20Ninja\\x20extension\\x20is\\x20connected\\x20to\\x20','replace','[object\\x20Set]','onmessage','_hasSymbolPropertyOnItsPath','_allowedToSend','https://tinyurl.com/37x8b79t','onerror','Map','number','50475','_console_ninja_session','autoExpandLimit','string','ws://','unknown','charAt','match','_setNodeExpressionPath','_isMap','readyState','substr','_disposeWebsocket','_regExpToString','host','root_exp','_isPrimitiveType','_addProperty','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20restarting\\x20the\\x20process\\x20may\\x20help;\\x20also\\x20see\\x20','44xFAaRs','funcName','resolveGetters','symbol','Number','__es'+'Module','_setNodeLabel','array','error','boolean','_maxConnectAttemptCount','3718jcdYHS','then','_Symbol','toUpperCase','getter','eventReceivedCallback','bigint','process','6181cezSQZ','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20refreshing\\x20the\\x20page\\x20may\\x20help;\\x20also\\x20see\\x20','log','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host,\\x20see\\x20','path','_hasMapOnItsPath','indexOf','_isNegativeZero','_p_name','undefined','get','_addObjectProperty','value','_p_length','_addFunctionsNode','_webSocketErrorDocsLink','null','','onopen','getOwnPropertyNames','autoExpandMaxDepth','\\x20server','autoExpand','object','edge','bind','_treeNodePropertiesBeforeFullValue','message','nodeModules','performance','failed\\x20to\\x20connect\\x20to\\x20host:\\x20','forEach','String','473624AuvuFR','autoExpandPreviousObjects','[object\\x20Array]','url','Buffer','trace','nan','totalStrLength','_ws','_allowedToConnectOnSend','stack','concat','push','_capIfString','enumerable','level','constructor','failed\\x20to\\x20find\\x20and\\x20load\\x20WebSocket','_setNodeExpandableState','getOwnPropertyDescriptor','_propertyName','positiveInfinity','1715910517347','nuxt','toLowerCase','getOwnPropertySymbols','sortProps','props','40880bOSrZr','sort','_numberRegExp','_socket','coverage','env','hits','toString','_console_ninja','disabledTrace','prototype','_inNextEdge','_blacklistedProperty','join','_sortProps','args','[object\\x20BigInt]','WebSocket','pathToFileURL','154705eCNpQA','depth','date','isExpressionToEvaluate','default','reload','_WebSocketClass','now','_dateToString','timeStamp','Symbol','_consoleNinjaAllowedToStart','_reconnectTimeout','_setNodePermissions','pop','_WebSocket','getPrototypeOf','noFunctions','_processTreeNodeResult','_cleanNode','negativeZero','function','_getOwnPropertySymbols','_connected'];_0x3349=function(){return _0x5b1e55;};return _0x3349();}var _0x4626ea=_0x9226;(function(_0x1b9b78,_0x56b01c){var _0x52900b=_0x9226,_0x178b03=_0x1b9b78();while(!![]){try{var _0x49bc64=-parseInt(_0x52900b(0x14c))/0x1+parseInt(_0x52900b(0x1a0))/0x2*(parseInt(_0x52900b(0x1ce))/0x3)+-parseInt(_0x52900b(0x1f6))/0x4*(-parseInt(_0x52900b(0x15f))/0x5)+parseInt(_0x52900b(0x1b3))/0x6*(-parseInt(_0x52900b(0x209))/0x7)+-parseInt(_0x52900b(0x130))/0x8+parseInt(_0x52900b(0x1bf))/0x9*(-parseInt(_0x52900b(0x17a))/0xa)+-parseInt(_0x52900b(0x201))/0xb*(parseInt(_0x52900b(0x199))/0xc);if(_0x49bc64===_0x56b01c)break;else _0x178b03['push'](_0x178b03['shift']());}catch(_0x1e0ecd){_0x178b03['push'](_0x178b03['shift']());}}}(_0x3349,0x38741));function _0x9226(_0x38f77e,_0x58c5f7){var _0x334989=_0x3349();return _0x9226=function(_0x92266e,_0x2fe33a){_0x92266e=_0x92266e-0x110;var _0x228356=_0x334989[_0x92266e];return _0x228356;},_0x9226(_0x38f77e,_0x58c5f7);}var K=Object['create'],Q=Object[_0x4626ea(0x19a)],G=Object[_0x4626ea(0x143)],ee=Object['getOwnPropertyNames'],te=Object[_0x4626ea(0x16f)],ne=Object['prototype']['hasOwnProperty'],re=(_0x180195,_0x3e7da9,_0x595410,_0x45ea86)=>{var _0x434783=_0x4626ea;if(_0x3e7da9&&typeof _0x3e7da9==_0x434783(0x126)||typeof _0x3e7da9=='function'){for(let _0x3e923e of ee(_0x3e7da9))!ne[_0x434783(0x196)](_0x180195,_0x3e923e)&&_0x3e923e!==_0x595410&&Q(_0x180195,_0x3e923e,{'get':()=>_0x3e7da9[_0x3e923e],'enumerable':!(_0x45ea86=G(_0x3e7da9,_0x3e923e))||_0x45ea86[_0x434783(0x13e)]});}return _0x180195;},V=(_0x3190cc,_0x4f2f53,_0x467908)=>(_0x467908=_0x3190cc!=null?K(te(_0x3190cc)):{},re(_0x4f2f53||!_0x3190cc||!_0x3190cc[_0x4626ea(0x1fb)]?Q(_0x467908,'default',{'value':_0x3190cc,'enumerable':!0x0}):_0x467908,_0x3190cc)),x=class{constructor(_0x3d2130,_0xfa9df8,_0x4fc95f,_0x41783b,_0x2cbdbf,_0x46faa0){var _0x36ecf1=_0x4626ea,_0x1aaeea,_0x483bda,_0x4f2f8a,_0x116edb;this[_0x36ecf1(0x17b)]=_0x3d2130,this['host']=_0xfa9df8,this['port']=_0x4fc95f,this[_0x36ecf1(0x12b)]=_0x41783b,this[_0x36ecf1(0x18d)]=_0x2cbdbf,this[_0x36ecf1(0x206)]=_0x46faa0,this['_allowedToSend']=!0x0,this['_allowedToConnectOnSend']=!0x0,this[_0x36ecf1(0x176)]=!0x1,this[_0x36ecf1(0x1d0)]=!0x1,this[_0x36ecf1(0x157)]=((_0x483bda=(_0x1aaeea=_0x3d2130[_0x36ecf1(0x208)])==null?void 0x0:_0x1aaeea['env'])==null?void 0x0:_0x483bda[_0x36ecf1(0x18a)])===_0x36ecf1(0x127),this[_0x36ecf1(0x18e)]=!((_0x116edb=(_0x4f2f8a=this[_0x36ecf1(0x17b)][_0x36ecf1(0x208)])==null?void 0x0:_0x4f2f8a[_0x36ecf1(0x1b0)])!=null&&_0x116edb[_0x36ecf1(0x1ae)])&&!this[_0x36ecf1(0x157)],this[_0x36ecf1(0x165)]=null,this[_0x36ecf1(0x1a2)]=0x0,this[_0x36ecf1(0x200)]=0x14,this['_webSocketErrorDocsLink']=_0x36ecf1(0x1df),this[_0x36ecf1(0x191)]=(this[_0x36ecf1(0x18e)]?_0x36ecf1(0x110):_0x36ecf1(0x1f5))+this[_0x36ecf1(0x11e)];}async['getWebSocketClass'](){var _0x46068b=_0x4626ea,_0xb4e591,_0x570dbb;if(this[_0x46068b(0x165)])return this['_WebSocketClass'];let _0x14235a;if(this[_0x46068b(0x18e)]||this[_0x46068b(0x157)])_0x14235a=this['global'][_0x46068b(0x15d)];else{if((_0xb4e591=this[_0x46068b(0x17b)][_0x46068b(0x208)])!=null&&_0xb4e591[_0x46068b(0x16e)])_0x14235a=(_0x570dbb=this[_0x46068b(0x17b)]['process'])==null?void 0x0:_0x570dbb[_0x46068b(0x16e)];else try{let _0x1fc366=await import(_0x46068b(0x113));_0x14235a=(await import((await import(_0x46068b(0x133)))[_0x46068b(0x15e)](_0x1fc366[_0x46068b(0x159)](this[_0x46068b(0x12b)],_0x46068b(0x1d4)))[_0x46068b(0x153)]()))[_0x46068b(0x163)];}catch{try{_0x14235a=require(require(_0x46068b(0x113))[_0x46068b(0x159)](this['nodeModules'],'ws'));}catch{throw new Error(_0x46068b(0x141));}}}return this[_0x46068b(0x165)]=_0x14235a,_0x14235a;}['_connectToHostNow'](){var _0x5e8c7d=_0x4626ea;this[_0x5e8c7d(0x1d0)]||this[_0x5e8c7d(0x176)]||this[_0x5e8c7d(0x1a2)]>=this[_0x5e8c7d(0x200)]||(this[_0x5e8c7d(0x139)]=!0x1,this[_0x5e8c7d(0x1d0)]=!0x0,this[_0x5e8c7d(0x1a2)]++,this[_0x5e8c7d(0x138)]=new Promise((_0x13021b,_0x3fd202)=>{var _0x1f0f27=_0x5e8c7d;this[_0x1f0f27(0x1d7)]()[_0x1f0f27(0x202)](_0x31566d=>{var _0x536e64=_0x1f0f27;let _0x52cfe0=new _0x31566d(_0x536e64(0x1e7)+(!this['_inBrowser']&&this[_0x536e64(0x18d)]?'gateway.docker.internal':this[_0x536e64(0x1f1)])+':'+this[_0x536e64(0x1ca)]);_0x52cfe0[_0x536e64(0x1e0)]=()=>{var _0x4700a0=_0x536e64;this[_0x4700a0(0x1de)]=!0x1,this[_0x4700a0(0x1ef)](_0x52cfe0),this[_0x4700a0(0x180)](),_0x3fd202(new Error(_0x4700a0(0x188)));},_0x52cfe0[_0x536e64(0x121)]=()=>{var _0x42dbbf=_0x536e64;this[_0x42dbbf(0x18e)]||_0x52cfe0[_0x42dbbf(0x14f)]&&_0x52cfe0[_0x42dbbf(0x14f)][_0x42dbbf(0x177)]&&_0x52cfe0[_0x42dbbf(0x14f)]['unref'](),_0x13021b(_0x52cfe0);},_0x52cfe0[_0x536e64(0x194)]=()=>{var _0x4466c7=_0x536e64;this[_0x4466c7(0x139)]=!0x0,this[_0x4466c7(0x1ef)](_0x52cfe0),this[_0x4466c7(0x180)]();},_0x52cfe0[_0x536e64(0x1dc)]=_0x5152b8=>{var _0x2eaf79=_0x536e64;try{if(!(_0x5152b8!=null&&_0x5152b8[_0x2eaf79(0x1cb)])||!this[_0x2eaf79(0x206)])return;let _0x2eda32=JSON[_0x2eaf79(0x1b2)](_0x5152b8['data']);this[_0x2eaf79(0x206)](_0x2eda32['method'],_0x2eda32['args'],this[_0x2eaf79(0x17b)],this[_0x2eaf79(0x18e)]);}catch{}};})[_0x1f0f27(0x202)](_0xe49ea5=>(this[_0x1f0f27(0x176)]=!0x0,this[_0x1f0f27(0x1d0)]=!0x1,this[_0x1f0f27(0x139)]=!0x1,this[_0x1f0f27(0x1de)]=!0x0,this[_0x1f0f27(0x1a2)]=0x0,_0xe49ea5))[_0x1f0f27(0x18c)](_0x516dfd=>(this['_connected']=!0x1,this[_0x1f0f27(0x1d0)]=!0x1,console[_0x1f0f27(0x1d5)](_0x1f0f27(0x112)+this[_0x1f0f27(0x11e)]),_0x3fd202(new Error(_0x1f0f27(0x12d)+(_0x516dfd&&_0x516dfd[_0x1f0f27(0x12a)])))));}));}[_0x4626ea(0x1ef)](_0x277ffa){var _0x1a06d6=_0x4626ea;this[_0x1a06d6(0x176)]=!0x1,this[_0x1a06d6(0x1d0)]=!0x1;try{_0x277ffa[_0x1a06d6(0x194)]=null,_0x277ffa['onerror']=null,_0x277ffa[_0x1a06d6(0x121)]=null;}catch{}try{_0x277ffa[_0x1a06d6(0x1ed)]<0x2&&_0x277ffa['close']();}catch{}}[_0x4626ea(0x180)](){var _0x486cb1=_0x4626ea;clearTimeout(this['_reconnectTimeout']),!(this[_0x486cb1(0x1a2)]>=this['_maxConnectAttemptCount'])&&(this[_0x486cb1(0x16b)]=setTimeout(()=>{var _0xbc7d0d=_0x486cb1,_0x3be647;this[_0xbc7d0d(0x176)]||this[_0xbc7d0d(0x1d0)]||(this['_connectToHostNow'](),(_0x3be647=this[_0xbc7d0d(0x138)])==null||_0x3be647[_0xbc7d0d(0x18c)](()=>this[_0xbc7d0d(0x180)]()));},0x1f4),this['_reconnectTimeout']['unref']&&this[_0x486cb1(0x16b)]['unref']());}async['send'](_0x186f46){var _0xcca76d=_0x4626ea;try{if(!this[_0xcca76d(0x1de)])return;this[_0xcca76d(0x139)]&&this[_0xcca76d(0x1c3)](),(await this[_0xcca76d(0x138)])[_0xcca76d(0x1c6)](JSON[_0xcca76d(0x186)](_0x186f46));}catch(_0x24acd6){console[_0xcca76d(0x1d5)](this[_0xcca76d(0x191)]+':\\x20'+(_0x24acd6&&_0x24acd6[_0xcca76d(0x12a)])),this[_0xcca76d(0x1de)]=!0x1,this[_0xcca76d(0x180)]();}}};function q(_0x2c0f6c,_0x40579d,_0x3c5848,_0x46731b,_0x2e2213,_0x588074,_0x382e94,_0x44549d=ie){var _0xcd0c31=_0x4626ea;let _0x5a69fc=_0x3c5848['split'](',')[_0xcd0c31(0x1b9)](_0x4c204a=>{var _0x441344=_0xcd0c31,_0x124fcf,_0x5e5a25,_0x5ba067,_0x5a400e;try{if(!_0x2c0f6c[_0x441344(0x1e4)]){let _0x3128e1=((_0x5e5a25=(_0x124fcf=_0x2c0f6c[_0x441344(0x208)])==null?void 0x0:_0x124fcf['versions'])==null?void 0x0:_0x5e5a25[_0x441344(0x1ae)])||((_0x5a400e=(_0x5ba067=_0x2c0f6c['process'])==null?void 0x0:_0x5ba067[_0x441344(0x151)])==null?void 0x0:_0x5a400e['NEXT_RUNTIME'])===_0x441344(0x127);(_0x2e2213==='next.js'||_0x2e2213==='remix'||_0x2e2213===_0x441344(0x1c2)||_0x2e2213==='angular')&&(_0x2e2213+=_0x3128e1?_0x441344(0x124):'\\x20browser'),_0x2c0f6c['_console_ninja_session']={'id':+new Date(),'tool':_0x2e2213},_0x382e94&&_0x2e2213&&!_0x3128e1&&console[_0x441344(0x111)](_0x441344(0x1d9)+(_0x2e2213[_0x441344(0x1e9)](0x0)[_0x441344(0x204)]()+_0x2e2213['substr'](0x1))+',',_0x441344(0x184),'see\\x20https://tinyurl.com/2vt8jxzw\\x20for\\x20more\\x20info.');}let _0x338f00=new x(_0x2c0f6c,_0x40579d,_0x4c204a,_0x46731b,_0x588074,_0x44549d);return _0x338f00[_0x441344(0x1c6)][_0x441344(0x128)](_0x338f00);}catch(_0x13925e){return console['warn'](_0x441344(0x1a3),_0x13925e&&_0x13925e[_0x441344(0x12a)]),()=>{};}});return _0x52d6fc=>_0x5a69fc[_0xcd0c31(0x12e)](_0x304222=>_0x304222(_0x52d6fc));}function ie(_0x248522,_0x22b47,_0x101d81,_0x49f9d5){var _0x2152db=_0x4626ea;_0x49f9d5&&_0x248522===_0x2152db(0x164)&&_0x101d81[_0x2152db(0x17e)]['reload']();}function b(_0x2f8a94){var _0x2c3352=_0x4626ea,_0x39dd14,_0x5cd825;let _0xff2cb3=function(_0x2707a5,_0x1f13e1){return _0x1f13e1-_0x2707a5;},_0x5714e8;if(_0x2f8a94['performance'])_0x5714e8=function(){var _0x6fee0f=_0x9226;return _0x2f8a94[_0x6fee0f(0x12c)]['now']();};else{if(_0x2f8a94[_0x2c3352(0x208)]&&_0x2f8a94['process'][_0x2c3352(0x187)]&&((_0x5cd825=(_0x39dd14=_0x2f8a94['process'])==null?void 0x0:_0x39dd14[_0x2c3352(0x151)])==null?void 0x0:_0x5cd825[_0x2c3352(0x18a)])!=='edge')_0x5714e8=function(){var _0x510a95=_0x2c3352;return _0x2f8a94['process'][_0x510a95(0x187)]();},_0xff2cb3=function(_0x1872da,_0xa7dc7d){return 0x3e8*(_0xa7dc7d[0x0]-_0x1872da[0x0])+(_0xa7dc7d[0x1]-_0x1872da[0x1])/0xf4240;};else try{let {performance:_0x46fdf0}=require('perf_hooks');_0x5714e8=function(){var _0x35a440=_0x2c3352;return _0x46fdf0[_0x35a440(0x166)]();};}catch{_0x5714e8=function(){return+new Date();};}}return{'elapsed':_0xff2cb3,'timeStamp':_0x5714e8,'now':()=>Date[_0x2c3352(0x166)]()};}function X(_0x11aedc,_0x1ca58d,_0x37c59b){var _0x2e4e28=_0x4626ea,_0x43e98c,_0x5da067,_0x37df21,_0x2f7d64,_0x541c33;if(_0x11aedc[_0x2e4e28(0x16a)]!==void 0x0)return _0x11aedc['_consoleNinjaAllowedToStart'];let _0x593073=((_0x5da067=(_0x43e98c=_0x11aedc[_0x2e4e28(0x208)])==null?void 0x0:_0x43e98c[_0x2e4e28(0x1b0)])==null?void 0x0:_0x5da067[_0x2e4e28(0x1ae)])||((_0x2f7d64=(_0x37df21=_0x11aedc[_0x2e4e28(0x208)])==null?void 0x0:_0x37df21[_0x2e4e28(0x151)])==null?void 0x0:_0x2f7d64[_0x2e4e28(0x18a)])===_0x2e4e28(0x127);return _0x593073&&_0x37c59b===_0x2e4e28(0x147)?_0x11aedc[_0x2e4e28(0x16a)]=!0x1:_0x11aedc['_consoleNinjaAllowedToStart']=_0x593073||!_0x1ca58d||((_0x541c33=_0x11aedc[_0x2e4e28(0x17e)])==null?void 0x0:_0x541c33[_0x2e4e28(0x193)])&&_0x1ca58d['includes'](_0x11aedc[_0x2e4e28(0x17e)]['hostname']),_0x11aedc[_0x2e4e28(0x16a)];}function H(_0x510064,_0x33a768,_0x5d605e,_0x2f5141){var _0x391961=_0x4626ea;_0x510064=_0x510064,_0x33a768=_0x33a768,_0x5d605e=_0x5d605e,_0x2f5141=_0x2f5141;let _0x187be4=b(_0x510064),_0x496f24=_0x187be4['elapsed'],_0x2c3d14=_0x187be4[_0x391961(0x168)];class _0x8237c4{constructor(){var _0xe23f1a=_0x391961;this[_0xe23f1a(0x19f)]=/^(?!(?:do|if|in|for|let|new|try|var|case|else|enum|eval|false|null|this|true|void|with|break|catch|class|const|super|throw|while|yield|delete|export|import|public|return|static|switch|typeof|default|extends|finally|package|private|continue|debugger|function|arguments|interface|protected|implements|instanceof)$)[_$a-zA-Z\\xA0-\\uFFFF][_$a-zA-Z0-9\\xA0-\\uFFFF]*$/,this[_0xe23f1a(0x14e)]=/^(0|[1-9][0-9]*)$/,this['_quotedRegExp']=/'([^\\\\']|\\\\')*'/,this[_0xe23f1a(0x1ba)]=_0x510064['undefined'],this[_0xe23f1a(0x1a8)]=_0x510064[_0xe23f1a(0x19b)],this[_0xe23f1a(0x1aa)]=Object[_0xe23f1a(0x143)],this[_0xe23f1a(0x17f)]=Object[_0xe23f1a(0x122)],this[_0xe23f1a(0x203)]=_0x510064[_0xe23f1a(0x169)],this[_0xe23f1a(0x1f0)]=RegExp[_0xe23f1a(0x156)][_0xe23f1a(0x153)],this[_0xe23f1a(0x167)]=Date[_0xe23f1a(0x156)][_0xe23f1a(0x153)];}['serialize'](_0x5d18a7,_0x2b1f18,_0x4b5a75,_0xc8f070){var _0x216aa1=_0x391961,_0x767bb1=this,_0xd96c8a=_0x4b5a75['autoExpand'];function _0x1d3adf(_0x598192,_0x1e7c16,_0x5ddf6e){var _0x50bd5a=_0x9226;_0x1e7c16['type']=_0x50bd5a(0x1e8),_0x1e7c16[_0x50bd5a(0x1fe)]=_0x598192[_0x50bd5a(0x12a)],_0x2a9e62=_0x5ddf6e[_0x50bd5a(0x1ae)][_0x50bd5a(0x18f)],_0x5ddf6e[_0x50bd5a(0x1ae)]['current']=_0x1e7c16,_0x767bb1['_treeNodePropertiesBeforeFullValue'](_0x1e7c16,_0x5ddf6e);}try{_0x4b5a75[_0x216aa1(0x13f)]++,_0x4b5a75[_0x216aa1(0x125)]&&_0x4b5a75[_0x216aa1(0x131)][_0x216aa1(0x13c)](_0x2b1f18);var _0xba12f2,_0x3d2ea1,_0x210bc5,_0x5c98a5,_0x540845=[],_0x4bc002=[],_0x852303,_0x4888d1=this['_type'](_0x2b1f18),_0x33ea32=_0x4888d1===_0x216aa1(0x1fd),_0xccd31a=!0x1,_0x5258d3=_0x4888d1===_0x216aa1(0x174),_0x743b81=this[_0x216aa1(0x1f3)](_0x4888d1),_0xfe0678=this[_0x216aa1(0x1a1)](_0x4888d1),_0x22d6ec=_0x743b81||_0xfe0678,_0x4f2440={},_0x3f9058=0x0,_0x18fb20=!0x1,_0x2a9e62,_0x3d1f2d=/^(([1-9]{1}[0-9]*)|0)$/;if(_0x4b5a75['depth']){if(_0x33ea32){if(_0x3d2ea1=_0x2b1f18[_0x216aa1(0x1b6)],_0x3d2ea1>_0x4b5a75['elements']){for(_0x210bc5=0x0,_0x5c98a5=_0x4b5a75[_0x216aa1(0x1d3)],_0xba12f2=_0x210bc5;_0xba12f2<_0x5c98a5;_0xba12f2++)_0x4bc002['push'](_0x767bb1[_0x216aa1(0x1f4)](_0x540845,_0x2b1f18,_0x4888d1,_0xba12f2,_0x4b5a75));_0x5d18a7[_0x216aa1(0x1a4)]=!0x0;}else{for(_0x210bc5=0x0,_0x5c98a5=_0x3d2ea1,_0xba12f2=_0x210bc5;_0xba12f2<_0x5c98a5;_0xba12f2++)_0x4bc002[_0x216aa1(0x13c)](_0x767bb1[_0x216aa1(0x1f4)](_0x540845,_0x2b1f18,_0x4888d1,_0xba12f2,_0x4b5a75));}_0x4b5a75[_0x216aa1(0x181)]+=_0x4bc002[_0x216aa1(0x1b6)];}if(!(_0x4888d1===_0x216aa1(0x11f)||_0x4888d1===_0x216aa1(0x118))&&!_0x743b81&&_0x4888d1!==_0x216aa1(0x12f)&&_0x4888d1!==_0x216aa1(0x134)&&_0x4888d1!==_0x216aa1(0x207)){var _0x1971d5=_0xc8f070['props']||_0x4b5a75[_0x216aa1(0x14b)];if(this[_0x216aa1(0x1be)](_0x2b1f18)?(_0xba12f2=0x0,_0x2b1f18[_0x216aa1(0x12e)](function(_0x27ec34){var _0x1aafe2=_0x216aa1;if(_0x3f9058++,_0x4b5a75[_0x1aafe2(0x181)]++,_0x3f9058>_0x1971d5){_0x18fb20=!0x0;return;}if(!_0x4b5a75[_0x1aafe2(0x162)]&&_0x4b5a75['autoExpand']&&_0x4b5a75['autoExpandPropertyCount']>_0x4b5a75['autoExpandLimit']){_0x18fb20=!0x0;return;}_0x4bc002[_0x1aafe2(0x13c)](_0x767bb1[_0x1aafe2(0x1f4)](_0x540845,_0x2b1f18,_0x1aafe2(0x1cc),_0xba12f2++,_0x4b5a75,function(_0x729ea1){return function(){return _0x729ea1;};}(_0x27ec34)));})):this[_0x216aa1(0x1ec)](_0x2b1f18)&&_0x2b1f18[_0x216aa1(0x12e)](function(_0x518f09,_0x375058){var _0x57432c=_0x216aa1;if(_0x3f9058++,_0x4b5a75[_0x57432c(0x181)]++,_0x3f9058>_0x1971d5){_0x18fb20=!0x0;return;}if(!_0x4b5a75['isExpressionToEvaluate']&&_0x4b5a75[_0x57432c(0x125)]&&_0x4b5a75['autoExpandPropertyCount']>_0x4b5a75[_0x57432c(0x1e5)]){_0x18fb20=!0x0;return;}var _0x135ea4=_0x375058[_0x57432c(0x153)]();_0x135ea4[_0x57432c(0x1b6)]>0x64&&(_0x135ea4=_0x135ea4['slice'](0x0,0x64)+_0x57432c(0x1b7)),_0x4bc002[_0x57432c(0x13c)](_0x767bb1[_0x57432c(0x1f4)](_0x540845,_0x2b1f18,_0x57432c(0x1e1),_0x135ea4,_0x4b5a75,function(_0x1c99a5){return function(){return _0x1c99a5;};}(_0x518f09)));}),!_0xccd31a){try{for(_0x852303 in _0x2b1f18)if(!(_0x33ea32&&_0x3d1f2d['test'](_0x852303))&&!this[_0x216aa1(0x158)](_0x2b1f18,_0x852303,_0x4b5a75)){if(_0x3f9058++,_0x4b5a75['autoExpandPropertyCount']++,_0x3f9058>_0x1971d5){_0x18fb20=!0x0;break;}if(!_0x4b5a75[_0x216aa1(0x162)]&&_0x4b5a75[_0x216aa1(0x125)]&&_0x4b5a75[_0x216aa1(0x181)]>_0x4b5a75[_0x216aa1(0x1e5)]){_0x18fb20=!0x0;break;}_0x4bc002[_0x216aa1(0x13c)](_0x767bb1[_0x216aa1(0x11a)](_0x540845,_0x4f2440,_0x2b1f18,_0x4888d1,_0x852303,_0x4b5a75));}}catch{}if(_0x4f2440[_0x216aa1(0x11c)]=!0x0,_0x5258d3&&(_0x4f2440[_0x216aa1(0x117)]=!0x0),!_0x18fb20){var _0x484cfa=[][_0x216aa1(0x13b)](this['_getOwnPropertyNames'](_0x2b1f18))[_0x216aa1(0x13b)](this[_0x216aa1(0x175)](_0x2b1f18));for(_0xba12f2=0x0,_0x3d2ea1=_0x484cfa[_0x216aa1(0x1b6)];_0xba12f2<_0x3d2ea1;_0xba12f2++)if(_0x852303=_0x484cfa[_0xba12f2],!(_0x33ea32&&_0x3d1f2d[_0x216aa1(0x1bd)](_0x852303[_0x216aa1(0x153)]()))&&!this[_0x216aa1(0x158)](_0x2b1f18,_0x852303,_0x4b5a75)&&!_0x4f2440['_p_'+_0x852303[_0x216aa1(0x153)]()]){if(_0x3f9058++,_0x4b5a75[_0x216aa1(0x181)]++,_0x3f9058>_0x1971d5){_0x18fb20=!0x0;break;}if(!_0x4b5a75['isExpressionToEvaluate']&&_0x4b5a75[_0x216aa1(0x125)]&&_0x4b5a75['autoExpandPropertyCount']>_0x4b5a75[_0x216aa1(0x1e5)]){_0x18fb20=!0x0;break;}_0x4bc002[_0x216aa1(0x13c)](_0x767bb1[_0x216aa1(0x11a)](_0x540845,_0x4f2440,_0x2b1f18,_0x4888d1,_0x852303,_0x4b5a75));}}}}}if(_0x5d18a7['type']=_0x4888d1,_0x22d6ec?(_0x5d18a7[_0x216aa1(0x11b)]=_0x2b1f18[_0x216aa1(0x19d)](),this[_0x216aa1(0x13d)](_0x4888d1,_0x5d18a7,_0x4b5a75,_0xc8f070)):_0x4888d1==='date'?_0x5d18a7[_0x216aa1(0x11b)]=this[_0x216aa1(0x167)][_0x216aa1(0x196)](_0x2b1f18):_0x4888d1===_0x216aa1(0x207)?_0x5d18a7[_0x216aa1(0x11b)]=_0x2b1f18['toString']():_0x4888d1===_0x216aa1(0x1c0)?_0x5d18a7[_0x216aa1(0x11b)]=this['_regExpToString']['call'](_0x2b1f18):_0x4888d1==='symbol'&&this[_0x216aa1(0x203)]?_0x5d18a7[_0x216aa1(0x11b)]=this[_0x216aa1(0x203)][_0x216aa1(0x156)]['toString'][_0x216aa1(0x196)](_0x2b1f18):!_0x4b5a75[_0x216aa1(0x160)]&&!(_0x4888d1===_0x216aa1(0x11f)||_0x4888d1===_0x216aa1(0x118))&&(delete _0x5d18a7[_0x216aa1(0x11b)],_0x5d18a7[_0x216aa1(0x1ad)]=!0x0),_0x18fb20&&(_0x5d18a7[_0x216aa1(0x1b1)]=!0x0),_0x2a9e62=_0x4b5a75[_0x216aa1(0x1ae)][_0x216aa1(0x18f)],_0x4b5a75[_0x216aa1(0x1ae)][_0x216aa1(0x18f)]=_0x5d18a7,this['_treeNodePropertiesBeforeFullValue'](_0x5d18a7,_0x4b5a75),_0x4bc002[_0x216aa1(0x1b6)]){for(_0xba12f2=0x0,_0x3d2ea1=_0x4bc002[_0x216aa1(0x1b6)];_0xba12f2<_0x3d2ea1;_0xba12f2++)_0x4bc002[_0xba12f2](_0xba12f2);}_0x540845[_0x216aa1(0x1b6)]&&(_0x5d18a7['props']=_0x540845);}catch(_0xb4f8d5){_0x1d3adf(_0xb4f8d5,_0x5d18a7,_0x4b5a75);}return this[_0x216aa1(0x198)](_0x2b1f18,_0x5d18a7),this[_0x216aa1(0x1ac)](_0x5d18a7,_0x4b5a75),_0x4b5a75[_0x216aa1(0x1ae)][_0x216aa1(0x18f)]=_0x2a9e62,_0x4b5a75[_0x216aa1(0x13f)]--,_0x4b5a75[_0x216aa1(0x125)]=_0xd96c8a,_0x4b5a75[_0x216aa1(0x125)]&&_0x4b5a75[_0x216aa1(0x131)][_0x216aa1(0x16d)](),_0x5d18a7;}[_0x391961(0x175)](_0x1352b4){var _0x317466=_0x391961;return Object[_0x317466(0x149)]?Object[_0x317466(0x149)](_0x1352b4):[];}[_0x391961(0x1be)](_0x407d32){var _0x105bbc=_0x391961;return!!(_0x407d32&&_0x510064[_0x105bbc(0x1cc)]&&this[_0x105bbc(0x1b8)](_0x407d32)===_0x105bbc(0x1db)&&_0x407d32['forEach']);}[_0x391961(0x158)](_0x105e25,_0x40447,_0x1e1069){var _0x402cc6=_0x391961;return _0x1e1069[_0x402cc6(0x170)]?typeof _0x105e25[_0x40447]=='function':!0x1;}[_0x391961(0x19c)](_0x4e070f){var _0x38ce28=_0x391961,_0x13c348='';return _0x13c348=typeof _0x4e070f,_0x13c348===_0x38ce28(0x126)?this[_0x38ce28(0x1b8)](_0x4e070f)===_0x38ce28(0x132)?_0x13c348=_0x38ce28(0x1fd):this[_0x38ce28(0x1b8)](_0x4e070f)===_0x38ce28(0x17d)?_0x13c348=_0x38ce28(0x161):this[_0x38ce28(0x1b8)](_0x4e070f)===_0x38ce28(0x15c)?_0x13c348=_0x38ce28(0x207):_0x4e070f===null?_0x13c348='null':_0x4e070f[_0x38ce28(0x140)]&&(_0x13c348=_0x4e070f['constructor']['name']||_0x13c348):_0x13c348===_0x38ce28(0x118)&&this[_0x38ce28(0x1a8)]&&_0x4e070f instanceof this['_HTMLAllCollection']&&(_0x13c348='HTMLAllCollection'),_0x13c348;}['_objectToString'](_0xc97f51){var _0x176479=_0x391961;return Object[_0x176479(0x156)]['toString'][_0x176479(0x196)](_0xc97f51);}[_0x391961(0x1f3)](_0x53b2c5){var _0x17f551=_0x391961;return _0x53b2c5===_0x17f551(0x1ff)||_0x53b2c5==='string'||_0x53b2c5===_0x17f551(0x1e2);}[_0x391961(0x1a1)](_0x9f0f9a){var _0x457596=_0x391961;return _0x9f0f9a==='Boolean'||_0x9f0f9a===_0x457596(0x12f)||_0x9f0f9a===_0x457596(0x1fa);}[_0x391961(0x1f4)](_0x232d9b,_0xdc38d1,_0x58d536,_0x3ad627,_0x37f014,_0xb21601){var _0x2bffb6=this;return function(_0x2c7468){var _0x1a7116=_0x9226,_0x54a698=_0x37f014[_0x1a7116(0x1ae)][_0x1a7116(0x18f)],_0x465fad=_0x37f014[_0x1a7116(0x1ae)][_0x1a7116(0x1a7)],_0xafec7b=_0x37f014[_0x1a7116(0x1ae)][_0x1a7116(0x1d8)];_0x37f014['node'][_0x1a7116(0x1d8)]=_0x54a698,_0x37f014[_0x1a7116(0x1ae)]['index']=typeof _0x3ad627==_0x1a7116(0x1e2)?_0x3ad627:_0x2c7468,_0x232d9b[_0x1a7116(0x13c)](_0x2bffb6[_0x1a7116(0x1cf)](_0xdc38d1,_0x58d536,_0x3ad627,_0x37f014,_0xb21601)),_0x37f014['node'][_0x1a7116(0x1d8)]=_0xafec7b,_0x37f014[_0x1a7116(0x1ae)][_0x1a7116(0x1a7)]=_0x465fad;};}[_0x391961(0x11a)](_0x187213,_0x25b0f0,_0x319acf,_0xf744d3,_0x574c7e,_0x173630,_0x2ac11c){var _0x311022=_0x391961,_0x4bc3c4=this;return _0x25b0f0[_0x311022(0x182)+_0x574c7e[_0x311022(0x153)]()]=!0x0,function(_0x747146){var _0x5e5b41=_0x311022,_0x3b8e0b=_0x173630['node'][_0x5e5b41(0x18f)],_0x1554b2=_0x173630[_0x5e5b41(0x1ae)][_0x5e5b41(0x1a7)],_0x287b34=_0x173630[_0x5e5b41(0x1ae)]['parent'];_0x173630[_0x5e5b41(0x1ae)][_0x5e5b41(0x1d8)]=_0x3b8e0b,_0x173630['node']['index']=_0x747146,_0x187213['push'](_0x4bc3c4[_0x5e5b41(0x1cf)](_0x319acf,_0xf744d3,_0x574c7e,_0x173630,_0x2ac11c)),_0x173630[_0x5e5b41(0x1ae)][_0x5e5b41(0x1d8)]=_0x287b34,_0x173630['node'][_0x5e5b41(0x1a7)]=_0x1554b2;};}[_0x391961(0x1cf)](_0x3db910,_0x4e06af,_0x120900,_0xd2f9f5,_0x3e1e95){var _0x2d7627=_0x391961,_0x1c58f2=this;_0x3e1e95||(_0x3e1e95=function(_0x534986,_0x4def4b){return _0x534986[_0x4def4b];});var _0x28d910=_0x120900['toString'](),_0x3bdf47=_0xd2f9f5[_0x2d7627(0x18b)]||{},_0x41e3ce=_0xd2f9f5[_0x2d7627(0x160)],_0x64c7cf=_0xd2f9f5[_0x2d7627(0x162)];try{var _0x427ef3=this[_0x2d7627(0x1ec)](_0x3db910),_0x563948=_0x28d910;_0x427ef3&&_0x563948[0x0]==='\\x27'&&(_0x563948=_0x563948['substr'](0x1,_0x563948[_0x2d7627(0x1b6)]-0x2));var _0x2ce170=_0xd2f9f5[_0x2d7627(0x18b)]=_0x3bdf47[_0x2d7627(0x182)+_0x563948];_0x2ce170&&(_0xd2f9f5['depth']=_0xd2f9f5[_0x2d7627(0x160)]+0x1),_0xd2f9f5[_0x2d7627(0x162)]=!!_0x2ce170;var _0x3a303b=typeof _0x120900==_0x2d7627(0x1f9),_0x2b5081={'name':_0x3a303b||_0x427ef3?_0x28d910:this[_0x2d7627(0x144)](_0x28d910)};if(_0x3a303b&&(_0x2b5081[_0x2d7627(0x1f9)]=!0x0),!(_0x4e06af===_0x2d7627(0x1fd)||_0x4e06af===_0x2d7627(0x1a5))){var _0x30c000=this[_0x2d7627(0x1aa)](_0x3db910,_0x120900);if(_0x30c000&&(_0x30c000[_0x2d7627(0x178)]&&(_0x2b5081['setter']=!0x0),_0x30c000[_0x2d7627(0x119)]&&!_0x2ce170&&!_0xd2f9f5[_0x2d7627(0x1f8)]))return _0x2b5081[_0x2d7627(0x205)]=!0x0,this[_0x2d7627(0x171)](_0x2b5081,_0xd2f9f5),_0x2b5081;}var _0x31489d;try{_0x31489d=_0x3e1e95(_0x3db910,_0x120900);}catch(_0x110ec0){return _0x2b5081={'name':_0x28d910,'type':_0x2d7627(0x1e8),'error':_0x110ec0[_0x2d7627(0x12a)]},this['_processTreeNodeResult'](_0x2b5081,_0xd2f9f5),_0x2b5081;}var _0x41ba38=this['_type'](_0x31489d),_0x525062=this['_isPrimitiveType'](_0x41ba38);if(_0x2b5081['type']=_0x41ba38,_0x525062)this['_processTreeNodeResult'](_0x2b5081,_0xd2f9f5,_0x31489d,function(){var _0x2548fe=_0x2d7627;_0x2b5081['value']=_0x31489d['valueOf'](),!_0x2ce170&&_0x1c58f2[_0x2548fe(0x13d)](_0x41ba38,_0x2b5081,_0xd2f9f5,{});});else{var _0x307caf=_0xd2f9f5['autoExpand']&&_0xd2f9f5[_0x2d7627(0x13f)]<_0xd2f9f5['autoExpandMaxDepth']&&_0xd2f9f5['autoExpandPreviousObjects'][_0x2d7627(0x115)](_0x31489d)<0x0&&_0x41ba38!==_0x2d7627(0x174)&&_0xd2f9f5[_0x2d7627(0x181)]<_0xd2f9f5[_0x2d7627(0x1e5)];_0x307caf||_0xd2f9f5[_0x2d7627(0x13f)]<_0x41e3ce||_0x2ce170?(this[_0x2d7627(0x183)](_0x2b5081,_0x31489d,_0xd2f9f5,_0x2ce170||{}),this[_0x2d7627(0x198)](_0x31489d,_0x2b5081)):this[_0x2d7627(0x171)](_0x2b5081,_0xd2f9f5,_0x31489d,function(){var _0xfd0181=_0x2d7627;_0x41ba38==='null'||_0x41ba38==='undefined'||(delete _0x2b5081['value'],_0x2b5081[_0xfd0181(0x1ad)]=!0x0);});}return _0x2b5081;}finally{_0xd2f9f5[_0x2d7627(0x18b)]=_0x3bdf47,_0xd2f9f5[_0x2d7627(0x160)]=_0x41e3ce,_0xd2f9f5[_0x2d7627(0x162)]=_0x64c7cf;}}['_capIfString'](_0x541c7a,_0x18d80c,_0x1af37f,_0x3a12d7){var _0x3b4d9e=_0x391961,_0x1253d8=_0x3a12d7['strLength']||_0x1af37f['strLength'];if((_0x541c7a===_0x3b4d9e(0x1e6)||_0x541c7a===_0x3b4d9e(0x12f))&&_0x18d80c[_0x3b4d9e(0x11b)]){let _0x309e70=_0x18d80c[_0x3b4d9e(0x11b)][_0x3b4d9e(0x1b6)];_0x1af37f[_0x3b4d9e(0x1bc)]+=_0x309e70,_0x1af37f[_0x3b4d9e(0x1bc)]>_0x1af37f['totalStrLength']?(_0x18d80c[_0x3b4d9e(0x1ad)]='',delete _0x18d80c[_0x3b4d9e(0x11b)]):_0x309e70>_0x1253d8&&(_0x18d80c[_0x3b4d9e(0x1ad)]=_0x18d80c[_0x3b4d9e(0x11b)][_0x3b4d9e(0x1ee)](0x0,_0x1253d8),delete _0x18d80c[_0x3b4d9e(0x11b)]);}}[_0x391961(0x1ec)](_0x51064f){var _0x4e5228=_0x391961;return!!(_0x51064f&&_0x510064[_0x4e5228(0x1e1)]&&this[_0x4e5228(0x1b8)](_0x51064f)==='[object\\x20Map]'&&_0x51064f['forEach']);}[_0x391961(0x144)](_0x42b554){var _0x41991c=_0x391961;if(_0x42b554[_0x41991c(0x1ea)](/^\\d+$/))return _0x42b554;var _0xaeb2a7;try{_0xaeb2a7=JSON[_0x41991c(0x186)](''+_0x42b554);}catch{_0xaeb2a7='\\x22'+this[_0x41991c(0x1b8)](_0x42b554)+'\\x22';}return _0xaeb2a7[_0x41991c(0x1ea)](/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)?_0xaeb2a7=_0xaeb2a7['substr'](0x1,_0xaeb2a7[_0x41991c(0x1b6)]-0x2):_0xaeb2a7=_0xaeb2a7[_0x41991c(0x1da)](/'/g,'\\x5c\\x27')['replace'](/\\\\\"/g,'\\x22')[_0x41991c(0x1da)](/(^\"|\"$)/g,'\\x27'),_0xaeb2a7;}['_processTreeNodeResult'](_0x32aee4,_0x590d37,_0x35d66e,_0x5ac389){var _0x35578e=_0x391961;this[_0x35578e(0x129)](_0x32aee4,_0x590d37),_0x5ac389&&_0x5ac389(),this[_0x35578e(0x198)](_0x35d66e,_0x32aee4),this['_treeNodePropertiesAfterFullValue'](_0x32aee4,_0x590d37);}[_0x391961(0x129)](_0x4edcdf,_0x3e4b5a){var _0x420f=_0x391961;this['_setNodeId'](_0x4edcdf,_0x3e4b5a),this[_0x420f(0x185)](_0x4edcdf,_0x3e4b5a),this[_0x420f(0x1eb)](_0x4edcdf,_0x3e4b5a),this[_0x420f(0x16c)](_0x4edcdf,_0x3e4b5a);}[_0x391961(0x1c4)](_0x2f8c11,_0x58fabb){}['_setNodeQueryPath'](_0x1ae224,_0x1e829c){}[_0x391961(0x1fc)](_0x4a1918,_0x20d9c2){}[_0x391961(0x189)](_0x31bed1){return _0x31bed1===this['_undefined'];}[_0x391961(0x1ac)](_0x4ecc24,_0x763395){var _0x51f0f0=_0x391961;this['_setNodeLabel'](_0x4ecc24,_0x763395),this[_0x51f0f0(0x142)](_0x4ecc24),_0x763395[_0x51f0f0(0x14a)]&&this[_0x51f0f0(0x15a)](_0x4ecc24),this['_addFunctionsNode'](_0x4ecc24,_0x763395),this['_addLoadNode'](_0x4ecc24,_0x763395),this[_0x51f0f0(0x172)](_0x4ecc24);}[_0x391961(0x198)](_0x3779ec,_0x43d9da){var _0x92d911=_0x391961;let _0x3351b5;try{_0x510064['console']&&(_0x3351b5=_0x510064[_0x92d911(0x1c5)][_0x92d911(0x1fe)],_0x510064['console'][_0x92d911(0x1fe)]=function(){}),_0x3779ec&&typeof _0x3779ec[_0x92d911(0x1b6)]==_0x92d911(0x1e2)&&(_0x43d9da[_0x92d911(0x1b6)]=_0x3779ec[_0x92d911(0x1b6)]);}catch{}finally{_0x3351b5&&(_0x510064[_0x92d911(0x1c5)]['error']=_0x3351b5);}if(_0x43d9da[_0x92d911(0x1b4)]===_0x92d911(0x1e2)||_0x43d9da[_0x92d911(0x1b4)]===_0x92d911(0x1fa)){if(isNaN(_0x43d9da[_0x92d911(0x11b)]))_0x43d9da[_0x92d911(0x136)]=!0x0,delete _0x43d9da[_0x92d911(0x11b)];else switch(_0x43d9da['value']){case Number['POSITIVE_INFINITY']:_0x43d9da[_0x92d911(0x145)]=!0x0,delete _0x43d9da[_0x92d911(0x11b)];break;case Number[_0x92d911(0x1a6)]:_0x43d9da[_0x92d911(0x197)]=!0x0,delete _0x43d9da[_0x92d911(0x11b)];break;case 0x0:this['_isNegativeZero'](_0x43d9da[_0x92d911(0x11b)])&&(_0x43d9da[_0x92d911(0x173)]=!0x0);break;}}else _0x43d9da['type']===_0x92d911(0x174)&&typeof _0x3779ec['name']==_0x92d911(0x1e6)&&_0x3779ec[_0x92d911(0x1c8)]&&_0x43d9da[_0x92d911(0x1c8)]&&_0x3779ec[_0x92d911(0x1c8)]!==_0x43d9da[_0x92d911(0x1c8)]&&(_0x43d9da[_0x92d911(0x1f7)]=_0x3779ec['name']);}[_0x391961(0x116)](_0x4db2dd){var _0xf7b3e2=_0x391961;return 0x1/_0x4db2dd===Number[_0xf7b3e2(0x1a6)];}['_sortProps'](_0xa48a70){var _0x5dce5f=_0x391961;!_0xa48a70[_0x5dce5f(0x14b)]||!_0xa48a70[_0x5dce5f(0x14b)][_0x5dce5f(0x1b6)]||_0xa48a70[_0x5dce5f(0x1b4)]===_0x5dce5f(0x1fd)||_0xa48a70[_0x5dce5f(0x1b4)]===_0x5dce5f(0x1e1)||_0xa48a70[_0x5dce5f(0x1b4)]===_0x5dce5f(0x1cc)||_0xa48a70[_0x5dce5f(0x14b)][_0x5dce5f(0x14d)](function(_0xd2b2c3,_0x29d5cd){var _0x92d94b=_0x5dce5f,_0x538cfa=_0xd2b2c3['name'][_0x92d94b(0x148)](),_0x6b9285=_0x29d5cd[_0x92d94b(0x1c8)][_0x92d94b(0x148)]();return _0x538cfa<_0x6b9285?-0x1:_0x538cfa>_0x6b9285?0x1:0x0;});}[_0x391961(0x11d)](_0x583623,_0x46e3e8){var _0x3ce46e=_0x391961;if(!(_0x46e3e8['noFunctions']||!_0x583623[_0x3ce46e(0x14b)]||!_0x583623['props'][_0x3ce46e(0x1b6)])){for(var _0x42d08a=[],_0x52dbe5=[],_0x4b8335=0x0,_0x450baf=_0x583623['props'][_0x3ce46e(0x1b6)];_0x4b8335<_0x450baf;_0x4b8335++){var _0x398f8c=_0x583623['props'][_0x4b8335];_0x398f8c[_0x3ce46e(0x1b4)]==='function'?_0x42d08a[_0x3ce46e(0x13c)](_0x398f8c):_0x52dbe5[_0x3ce46e(0x13c)](_0x398f8c);}if(!(!_0x52dbe5[_0x3ce46e(0x1b6)]||_0x42d08a[_0x3ce46e(0x1b6)]<=0x1)){_0x583623[_0x3ce46e(0x14b)]=_0x52dbe5;var _0x56bfbd={'functionsNode':!0x0,'props':_0x42d08a};this[_0x3ce46e(0x1c4)](_0x56bfbd,_0x46e3e8),this[_0x3ce46e(0x1fc)](_0x56bfbd,_0x46e3e8),this[_0x3ce46e(0x142)](_0x56bfbd),this[_0x3ce46e(0x16c)](_0x56bfbd,_0x46e3e8),_0x56bfbd['id']+='\\x20f',_0x583623[_0x3ce46e(0x14b)][_0x3ce46e(0x1c9)](_0x56bfbd);}}}[_0x391961(0x1a9)](_0x430e38,_0x1fa560){}['_setNodeExpandableState'](_0x2fd910){}[_0x391961(0x1ab)](_0x54e605){var _0x19641c=_0x391961;return Array[_0x19641c(0x192)](_0x54e605)||typeof _0x54e605==_0x19641c(0x126)&&this[_0x19641c(0x1b8)](_0x54e605)==='[object\\x20Array]';}[_0x391961(0x16c)](_0x54cd11,_0x472425){}['_cleanNode'](_0x98c2ca){var _0x428c79=_0x391961;delete _0x98c2ca[_0x428c79(0x1dd)],delete _0x98c2ca[_0x428c79(0x179)],delete _0x98c2ca[_0x428c79(0x114)];}['_setNodeExpressionPath'](_0x372a40,_0x5986da){}}let _0x30d0d1=new _0x8237c4(),_0x1e7343={'props':0x64,'elements':0x64,'strLength':0x400*0x32,'totalStrLength':0x400*0x32,'autoExpandLimit':0x1388,'autoExpandMaxDepth':0xa},_0x21fae0={'props':0x5,'elements':0x5,'strLength':0x100,'totalStrLength':0x100*0x3,'autoExpandLimit':0x1e,'autoExpandMaxDepth':0x2};function _0x4bb77d(_0x284bbe,_0x113d13,_0x283f4b,_0x2585f4,_0xb7dbca,_0x4426e0){var _0x45c2c2=_0x391961;let _0x185714,_0x54555f;try{_0x54555f=_0x2c3d14(),_0x185714=_0x5d605e[_0x113d13],!_0x185714||_0x54555f-_0x185714['ts']>0x1f4&&_0x185714[_0x45c2c2(0x1d6)]&&_0x185714[_0x45c2c2(0x190)]/_0x185714['count']<0x64?(_0x5d605e[_0x113d13]=_0x185714={'count':0x0,'time':0x0,'ts':_0x54555f},_0x5d605e[_0x45c2c2(0x152)]={}):_0x54555f-_0x5d605e[_0x45c2c2(0x152)]['ts']>0x32&&_0x5d605e['hits'][_0x45c2c2(0x1d6)]&&_0x5d605e['hits'][_0x45c2c2(0x190)]/_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x1d6)]<0x64&&(_0x5d605e[_0x45c2c2(0x152)]={});let _0x297324=[],_0x3b32c9=_0x185714['reduceLimits']||_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x1cd)]?_0x21fae0:_0x1e7343,_0x292fa3=_0x4e1175=>{var _0x4c44eb=_0x45c2c2;let _0x2c5531={};return _0x2c5531[_0x4c44eb(0x14b)]=_0x4e1175[_0x4c44eb(0x14b)],_0x2c5531['elements']=_0x4e1175['elements'],_0x2c5531['strLength']=_0x4e1175[_0x4c44eb(0x17c)],_0x2c5531[_0x4c44eb(0x137)]=_0x4e1175[_0x4c44eb(0x137)],_0x2c5531['autoExpandLimit']=_0x4e1175[_0x4c44eb(0x1e5)],_0x2c5531[_0x4c44eb(0x123)]=_0x4e1175[_0x4c44eb(0x123)],_0x2c5531['sortProps']=!0x1,_0x2c5531[_0x4c44eb(0x170)]=!_0x33a768,_0x2c5531[_0x4c44eb(0x160)]=0x1,_0x2c5531[_0x4c44eb(0x13f)]=0x0,_0x2c5531['expId']=_0x4c44eb(0x1d2),_0x2c5531[_0x4c44eb(0x1bb)]=_0x4c44eb(0x1f2),_0x2c5531[_0x4c44eb(0x125)]=!0x0,_0x2c5531['autoExpandPreviousObjects']=[],_0x2c5531[_0x4c44eb(0x181)]=0x0,_0x2c5531[_0x4c44eb(0x1f8)]=!0x0,_0x2c5531[_0x4c44eb(0x1bc)]=0x0,_0x2c5531['node']={'current':void 0x0,'parent':void 0x0,'index':0x0},_0x2c5531;};for(var _0x271d05=0x0;_0x271d05<_0xb7dbca[_0x45c2c2(0x1b6)];_0x271d05++)_0x297324[_0x45c2c2(0x13c)](_0x30d0d1['serialize']({'timeNode':_0x284bbe===_0x45c2c2(0x190)||void 0x0},_0xb7dbca[_0x271d05],_0x292fa3(_0x3b32c9),{}));if(_0x284bbe==='trace'){let _0x2542c2=Error[_0x45c2c2(0x195)];try{Error[_0x45c2c2(0x195)]=0x1/0x0,_0x297324[_0x45c2c2(0x13c)](_0x30d0d1[_0x45c2c2(0x183)]({'stackNode':!0x0},new Error()[_0x45c2c2(0x13a)],_0x292fa3(_0x3b32c9),{'strLength':0x1/0x0}));}finally{Error[_0x45c2c2(0x195)]=_0x2542c2;}}return{'method':'log','version':_0x2f5141,'args':[{'ts':_0x283f4b,'session':_0x2585f4,'args':_0x297324,'id':_0x113d13,'context':_0x4426e0}]};}catch(_0x1e8623){return{'method':_0x45c2c2(0x111),'version':_0x2f5141,'args':[{'ts':_0x283f4b,'session':_0x2585f4,'args':[{'type':_0x45c2c2(0x1e8),'error':_0x1e8623&&_0x1e8623[_0x45c2c2(0x12a)]}],'id':_0x113d13,'context':_0x4426e0}]};}finally{try{if(_0x185714&&_0x54555f){let _0x42b843=_0x2c3d14();_0x185714['count']++,_0x185714['time']+=_0x496f24(_0x54555f,_0x42b843),_0x185714['ts']=_0x42b843,_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x1d6)]++,_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x190)]+=_0x496f24(_0x54555f,_0x42b843),_0x5d605e[_0x45c2c2(0x152)]['ts']=_0x42b843,(_0x185714[_0x45c2c2(0x1d6)]>0x32||_0x185714[_0x45c2c2(0x190)]>0x64)&&(_0x185714[_0x45c2c2(0x1cd)]=!0x0),(_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x1d6)]>0x3e8||_0x5d605e[_0x45c2c2(0x152)][_0x45c2c2(0x190)]>0x12c)&&(_0x5d605e[_0x45c2c2(0x152)]['reduceLimits']=!0x0);}}catch{}}}return _0x4bb77d;}((_0x166570,_0x13c185,_0x50ce36,_0x4c8613,_0xc64222,_0x1e8974,_0x228dba,_0x28bbaf,_0x328698,_0x40a2ab,_0x310429)=>{var _0x1f92ab=_0x4626ea;if(_0x166570[_0x1f92ab(0x154)])return _0x166570['_console_ninja'];if(!X(_0x166570,_0x28bbaf,_0xc64222))return _0x166570['_console_ninja']={'consoleLog':()=>{},'consoleTrace':()=>{},'consoleTime':()=>{},'consoleTimeEnd':()=>{},'autoLog':()=>{},'autoLogMany':()=>{},'autoTraceMany':()=>{},'coverage':()=>{},'autoTrace':()=>{},'autoTime':()=>{},'autoTimeEnd':()=>{}},_0x166570['_console_ninja'];let _0xdd87f3=b(_0x166570),_0x344045=_0xdd87f3[_0x1f92ab(0x1c7)],_0x23ac14=_0xdd87f3[_0x1f92ab(0x168)],_0x291990=_0xdd87f3[_0x1f92ab(0x166)],_0x4e4fa2={'hits':{},'ts':{}},_0x12dc4d=H(_0x166570,_0x328698,_0x4e4fa2,_0x1e8974),_0x31f310=_0xe6f4e=>{_0x4e4fa2['ts'][_0xe6f4e]=_0x23ac14();},_0x3614dd=(_0x9be044,_0x560c04)=>{var _0x323d35=_0x1f92ab;let _0x31fd9e=_0x4e4fa2['ts'][_0x560c04];if(delete _0x4e4fa2['ts'][_0x560c04],_0x31fd9e){let _0x1938e0=_0x344045(_0x31fd9e,_0x23ac14());_0x346395(_0x12dc4d(_0x323d35(0x190),_0x9be044,_0x291990(),_0x3a4102,[_0x1938e0],_0x560c04));}},_0x11e437=_0x545750=>{var _0xe1bfdf=_0x1f92ab,_0x5a609d;return _0xc64222===_0xe1bfdf(0x1b5)&&_0x166570[_0xe1bfdf(0x19e)]&&((_0x5a609d=_0x545750==null?void 0x0:_0x545750[_0xe1bfdf(0x15b)])==null?void 0x0:_0x5a609d[_0xe1bfdf(0x1b6)])&&(_0x545750[_0xe1bfdf(0x15b)][0x0][_0xe1bfdf(0x19e)]=_0x166570['origin']),_0x545750;};_0x166570['_console_ninja']={'consoleLog':(_0x21df8e,_0x23ebc6)=>{var _0x40def2=_0x1f92ab;_0x166570[_0x40def2(0x1c5)]['log'][_0x40def2(0x1c8)]!=='disabledLog'&&_0x346395(_0x12dc4d(_0x40def2(0x111),_0x21df8e,_0x291990(),_0x3a4102,_0x23ebc6));},'consoleTrace':(_0x398c73,_0x32b4fb)=>{var _0x1e52d8=_0x1f92ab;_0x166570['console'][_0x1e52d8(0x111)][_0x1e52d8(0x1c8)]!==_0x1e52d8(0x155)&&_0x346395(_0x11e437(_0x12dc4d(_0x1e52d8(0x135),_0x398c73,_0x291990(),_0x3a4102,_0x32b4fb)));},'consoleTime':_0x41442a=>{_0x31f310(_0x41442a);},'consoleTimeEnd':(_0x240419,_0x127bab)=>{_0x3614dd(_0x127bab,_0x240419);},'autoLog':(_0x5ea011,_0x4126e2)=>{var _0x30986a=_0x1f92ab;_0x346395(_0x12dc4d(_0x30986a(0x111),_0x4126e2,_0x291990(),_0x3a4102,[_0x5ea011]));},'autoLogMany':(_0x7e654b,_0x2fade8)=>{var _0x2b6440=_0x1f92ab;_0x346395(_0x12dc4d(_0x2b6440(0x111),_0x7e654b,_0x291990(),_0x3a4102,_0x2fade8));},'autoTrace':(_0x8aa6ee,_0x494eb2)=>{_0x346395(_0x11e437(_0x12dc4d('trace',_0x494eb2,_0x291990(),_0x3a4102,[_0x8aa6ee])));},'autoTraceMany':(_0x4b5ec1,_0x2bbad4)=>{var _0x545cf6=_0x1f92ab;_0x346395(_0x11e437(_0x12dc4d(_0x545cf6(0x135),_0x4b5ec1,_0x291990(),_0x3a4102,_0x2bbad4)));},'autoTime':(_0x50122b,_0x1430e7,_0x35bbd8)=>{_0x31f310(_0x35bbd8);},'autoTimeEnd':(_0xc3c915,_0x1478ec,_0x2151f3)=>{_0x3614dd(_0x1478ec,_0x2151f3);},'coverage':_0x4bb18d=>{var _0x1d9120=_0x1f92ab;_0x346395({'method':_0x1d9120(0x150),'version':_0x1e8974,'args':[{'id':_0x4bb18d}]});}};let _0x346395=q(_0x166570,_0x13c185,_0x50ce36,_0x4c8613,_0xc64222,_0x40a2ab,_0x310429),_0x3a4102=_0x166570[_0x1f92ab(0x1e4)];return _0x166570[_0x1f92ab(0x154)];})(globalThis,_0x4626ea(0x1af),_0x4626ea(0x1e3),\"c:\\\\Users\\\\user\\\\.vscode\\\\extensions\\\\wallabyjs.console-ninja-1.0.322\\\\node_modules\",'webpack','1.0.0',_0x4626ea(0x146),[\"localhost\",\"127.0.0.1\",\"example.cypress.io\",\"LAPTOP-M1GJOSB2\",\"192.168.208.30\"],_0x4626ea(0x1d1),_0x4626ea(0x120),_0x4626ea(0x1c1));");
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

;
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