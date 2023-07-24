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
var results, querywords;

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
    results.forEach(function (result) {
      if (count < parseInt(selectedValue)) {
        $(".result-container").append(resultCards(querywords, result));
      }

      count++;
    });
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
  wordCounter();
}); // linkChecker

$("#linkCheckerBtn").on("click", function () {
  if (checkUrl(inputLink.value)) {
    $("#urlEmbedContainer").attr("src", inputLink.value);
    $("#emptyState").hide();
    $(".url-mode-container").show();
    $(".estimation-card").show();
    $(".url-viewer .levels").html("".concat(checkUrlLevel(inputLink.value), " levels"));
    $(".url-viewer .url").html(inputLink.value);
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

var resultCards = function resultCards(totalWords, data) {
  var percentage = Math.round(data.minwordsmatched / totalWords * 100);
  var levelUrl = checkUrlLevel(data.url);
  var titlesizer = $("#titlesizer");
  titlesizer.attr("style", "font-family: arial, sans-serif !important; font-size: 13px !important; position: absolute !important; visibility: hidden !important; white-space: nowrap !important;");
  titlesizer.text(data.title);
  var pixel = Math.floor(titlesizer.innerWidth());
  return "\n<div class=\"accordion accordion-light accordion-toggle-arrow custom-features-accordion\" id = \"accordionResult".concat(data.index, "\">\n    <div class=\"card bg-white px-3\" style=\"\">\n        <div class=\"card-header\" id=\"headingOne2\">\n            <div class=\"card-title collapsed pr-4 justify-content-between\" data-toggle=\"collapse\"\n                data-target=\"#accordion").concat(data.index, "One\">\n                <div class=\"index-pill s-400\">").concat(data.index, "</div>\n                <div class=\"d-flex align-items-center\">\n                    ").concat(data.percentmatched != undefined ? "\n                    <p class=\"m-0 s-400 text-primary-70 mr-3\">".concat(data.percentmatched, "%</p>\n                    <p class=\"m-0 s-400\">Text matched</p>") : '', "\n                </div>\n            </div>\n        </div>\n        <div id=\"accordion").concat(data.index, "One\" class=\"collapse\" data-parent=\"#accordionResult").concat(data.index, "\">\n            <div class=\"card-body py-2\">\n                <div class=\"d-flex align-items-center flex-column\">\n                    <hr class='my-2 w-100'>\n                        <div class=\"row w-100\">\n                            <div class=\"col-7 s-400 text-ellipsis\"><a href=\"").concat(data.url, "\" target=\"_blank\" rel=\"noopener noreferrer noindex\">").concat(data.url, "</a></div>\n                            <div class=\"col-3 s-400 flex-shrink-0 text-primary-70\">").concat(levelUrl, " levels</div>\n                            <div class=\"col-2 s-400 flex-shrink-0 text-gray-100 text-right\">URL</div>\n                        </div>\n                        <hr class='my-2 w-100'>\n                            <div class=\"row w-100\">\n                                <div class=\"col-7 s-400 text-ellipsis\">").concat(data.title, "</div>\n                                <div class=\"col-3 s-400 flex-shrink-0 text-primary-70\">").concat(pixel, " pixels</div>\n                                <div class=\"col-2 s-400 flex-shrink-0 text-gray-100 text-right\">Title</div>\n                            </div>\n                            <hr class='my-2 w-100'>\n                                <div class=\"d-flex w-100 justify-content-end pr-3\">\n                                    <p class=\"m-0 mx-3 s-400 text-gray-100\">(").concat(data.minwordsmatched, " of ").concat(totalWords, ")</p>\n                                </div>\n                                <div class=\"my-3 w-100 py-2 px-3 background-gray-20 b2-400\">\n                                    ").concat(data.textsnippet, "\n                                </div>\n\n                                <div class=\"my-2 d-flex align-items-start justify-content-start w-100\">\n                                    <a href=\"").concat(data.url, "\" target=\"_blank\" rel=\"noopener noreferrer noindex\" class=\"btn button-gray-20 b2-700\"> <u>View \"index\" on CopyScape</u></a>\n                                </div>\n\n                                <hr class='my-2 w-100'>\n                                    <div class=\"d-flex w-100 justify-content-end mb-3 pr-3\">\n                                        <p class=\"m-0 mx-3 s-400 text-gray-100\">(").concat(data.minwordsmatched, " of ").concat(totalWords, ")</p>\n                                        <p class=\"m-0 mx-3 s-400 text-primary-70\">").concat(percentage, "%</p>\n                                        <p class=\"m-0 ml-3 s-400 text-gray-100\">Minimum words matched limit</p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                </div>\n            </div>");
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
} // PLAGIARISM CHECKER


$("#button-checker").on("click", function () {
  var text;
  Swal.fire({
    text: 'Are u sure want to run the copyscape check?',
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

            // console.log(res.data)
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
            /* eslint-disable */

            (_console = console).log.apply(_console, _toConsumableArray(oo_oo("b2529315_0", res.data.alltextmatched)));

            var textareaContent = styleMatchedText(_text, res.data.alltextmatched);
            $('.result-input').append(textareaContent);
            $('.result-input').show();
            $('.url-mode-container').hide();
            $('#text-check').hide();
            results = res.data.result;
            querywords = res.data.querywords;
            results.forEach(function (result) {
              $(".result-container").append(resultCards(querywords, result));
            });
            fetchLogAndUpdate();
          } else {
            toastr.error(res.message);
          }
        },
        error: function error(err) {
          toastr.error(err.responseJSON.message);
        }
      });
    }
  });
});
/* eslint-disable */

;

function oo_cm() {
  try {
    return (0, eval)("globalThis._console_ninja") || (0, eval)("/* https://github.com/wallabyjs/console-ninja#how-does-it-work */'use strict';var _0x575a5b=_0x45b6;(function(_0x478952,_0x3684c7){var _0x112c43=_0x45b6,_0x11e74a=_0x478952();while(!![]){try{var _0x9623fb=parseInt(_0x112c43(0x252))/0x1+-parseInt(_0x112c43(0x21a))/0x2*(-parseInt(_0x112c43(0x22b))/0x3)+parseInt(_0x112c43(0x1e2))/0x4+-parseInt(_0x112c43(0x25d))/0x5*(-parseInt(_0x112c43(0x1dd))/0x6)+parseInt(_0x112c43(0x228))/0x7*(parseInt(_0x112c43(0x256))/0x8)+parseInt(_0x112c43(0x23a))/0x9+-parseInt(_0x112c43(0x1b5))/0xa;if(_0x9623fb===_0x3684c7)break;else _0x11e74a['push'](_0x11e74a['shift']());}catch(_0x5724a9){_0x11e74a['push'](_0x11e74a['shift']());}}}(_0x11e3,0x6e0c1));function _0x45b6(_0x281fc5,_0x2747be){var _0x11e36e=_0x11e3();return _0x45b6=function(_0x45b69f,_0x3b4242){_0x45b69f=_0x45b69f-0x1a4;var _0x543b59=_0x11e36e[_0x45b69f];return _0x543b59;},_0x45b6(_0x281fc5,_0x2747be);}function _0x11e3(){var _0x364765=['logger\\x20failed\\x20to\\x20connect\\x20to\\x20host,\\x20see\\x20','log','root_exp_id','','undefined','_reconnectTimeout','count','_setNodePermissions','hrtime','negativeZero','null','onclose','type','1690160904994','bigint','error','close','_inBrowser','_treeNodePropertiesAfterFullValue','Set','webpack','_maxConnectAttemptCount','_objectToString','50473','process','_addFunctionsNode','string','_sortProps','value','setter','_WebSocket','_connecting','[object\\x20Date]','send','1428ikQfNE','[object\\x20Map]','pathToFileURL','_hasSetOnItsPath','level','1504024bXfPMB','__es'+'Module','location','_undefined','replace','_sendErrorMessage','sortProps','length','parse','expId','node','hasOwnProperty','logger\\x20failed\\x20to\\x20connect\\x20to\\x20host','NEGATIVE_INFINITY','_allowedToSend','push','elements','_setNodeId','_getOwnPropertySymbols','positiveInfinity','_ws',[\"localhost\",\"127.0.0.1\",\"example.cypress.io\",\"LAPTOP-M1GJOSB2\",\"192.168.43.3\"],'_numberRegExp','url','performance','[object\\x20Array]','Number','_keyStrRegExp','test','_p_','_setNodeExpandableState','unref','_console_ninja_session','_connectAttemptCount','rootExpression','name','_propertyName','props','capped','_setNodeExpressionPath','onerror','_cleanNode','reduceLimits','array','parent','enumerable','_consoleNinjaAllowedToStart','default','getPrototypeOf','autoExpand','cappedProps','_addProperty','valueOf','_isNegativeZero','stringify','symbol','2EVfLUo','timeEnd','autoExpandPreviousObjects','call','global','nan',':logPointId:','ws/index.js','_quotedRegExp',\"c:\\\\Users\\\\user\\\\.vscode\\\\extensions\\\\wallabyjs.console-ninja-0.0.187\\\\node_modules\",'function','match','_hasMapOnItsPath','hits','1452017nRzOgV','nuxt','127.0.0.1','1942818MJmPoe','_getOwnPropertyNames','_HTMLAllCollection','timeStamp','_regExpToString','_setNodeLabel','substr','noFunctions','_isPrimitiveWrapperType','POSITIVE_INFINITY','elapsed','cappedElements','https://tinyurl.com/37x8b79t','host','onmessage','1542582JardkD','_capIfString','_isPrimitiveType','disabledLog','now','autoExpandLimit','String','_setNodeQueryPath','number','_disposeWebsocket','getOwnPropertyNames','_Symbol','then','time','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20refreshing\\x20the\\x20page\\x20may\\x20help;\\x20also\\x20see\\x20','_attemptToReconnectShortly','split','catch','_connected','disabledTrace','boolean','Boolean','Buffer','nodeModules','855808vAUHwe','current','index','_isUndefined','8GyVHqm','_console_ninja','console','bind','funcName','allStrLength','[object\\x20BigInt]','13940rBCLxN','_processTreeNodeResult','_webSocketErrorDocsLink','_dateToString','astro','getWebSocketClass','_WebSocketClass','Symbol','_isSet','warn','path','serialize','strLength','autoExpandPropertyCount','HTMLAllCollection','trace','versions','_socket','logger\\x20websocket\\x20error','constructor','toString','failed\\x20to\\x20connect\\x20to\\x20host:\\x20','method','perf_hooks','forEach','_connectToHostNow','_blacklistedProperty','_addObjectProperty','_getOwnPropertyDescriptor','hostname','autoExpandMaxDepth','negativeInfinity','Map','\\x20browser','stackTraceLimit','reload','message','_isMap','_p_name','_propertyAccessor','WebSocket','ws://','toLowerCase','isArray','_property','_treeNodePropertiesBeforeFullValue','expressionsToEvaluate','_addLoadNode','_isArray','onopen','unknown','depth','map','prototype','port','_type','concat','_additionalMetadata','Console\\x20Ninja\\x20failed\\x20to\\x20send\\x20logs,\\x20restarting\\x20the\\x20process\\x20may\\x20help;\\x20also\\x20see\\x20','_allowedToConnectOnSend','24710400FPbrEf','resolveGetters','isExpressionToEvaluate','slice','includes','totalStrLength'];_0x11e3=function(){return _0x364765;};return _0x11e3();}var ue=Object['create'],te=Object['defineProperty'],he=Object['getOwnPropertyDescriptor'],le=Object['getOwnPropertyNames'],fe=Object[_0x575a5b(0x212)],_e=Object['prototype'][_0x575a5b(0x1ed)],pe=(_0x1c4027,_0x4abd60,_0x40f37b,_0x1759af)=>{var _0x1c938b=_0x575a5b;if(_0x4abd60&&typeof _0x4abd60=='object'||typeof _0x4abd60==_0x1c938b(0x224)){for(let _0x122ef1 of le(_0x4abd60))!_e[_0x1c938b(0x21d)](_0x1c4027,_0x122ef1)&&_0x122ef1!==_0x40f37b&&te(_0x1c4027,_0x122ef1,{'get':()=>_0x4abd60[_0x122ef1],'enumerable':!(_0x1759af=he(_0x4abd60,_0x122ef1))||_0x1759af[_0x1c938b(0x20f)]});}return _0x1c4027;},ne=(_0x485515,_0x4a6949,_0x5ec9fe)=>(_0x5ec9fe=_0x485515!=null?ue(fe(_0x485515)):{},pe(_0x4a6949||!_0x485515||!_0x485515[_0x575a5b(0x1e3)]?te(_0x5ec9fe,_0x575a5b(0x211),{'value':_0x485515,'enumerable':!0x0}):_0x5ec9fe,_0x485515)),Q=class{constructor(_0x50eba7,_0x51a2bc,_0x1124df,_0x2499b6){var _0x48d2bb=_0x575a5b;this[_0x48d2bb(0x21e)]=_0x50eba7,this[_0x48d2bb(0x238)]=_0x51a2bc,this[_0x48d2bb(0x1af)]=_0x1124df,this[_0x48d2bb(0x251)]=_0x2499b6,this[_0x48d2bb(0x1f0)]=!0x0,this[_0x48d2bb(0x1b4)]=!0x0,this[_0x48d2bb(0x24c)]=!0x1,this['_connecting']=!0x1,this[_0x48d2bb(0x1cc)]=!!this['global'][_0x48d2bb(0x285)],this['_WebSocketClass']=null,this[_0x48d2bb(0x203)]=0x0,this[_0x48d2bb(0x1d0)]=0x14,this['_webSocketErrorDocsLink']=_0x48d2bb(0x237),this['_sendErrorMessage']=(this['_inBrowser']?_0x48d2bb(0x248):_0x48d2bb(0x1b3))+this[_0x48d2bb(0x25f)];}async[_0x575a5b(0x262)](){var _0x1e7e93=_0x575a5b;if(this['_WebSocketClass'])return this[_0x1e7e93(0x263)];let _0x4fab6e;if(this['_inBrowser'])_0x4fab6e=this[_0x1e7e93(0x21e)][_0x1e7e93(0x285)];else{if(this[_0x1e7e93(0x21e)][_0x1e7e93(0x1d3)]?.[_0x1e7e93(0x1d9)])_0x4fab6e=this[_0x1e7e93(0x21e)]['process']?.['_WebSocket'];else try{let _0x4a8ef2=await import(_0x1e7e93(0x267));_0x4fab6e=(await import((await import(_0x1e7e93(0x1f9)))[_0x1e7e93(0x1df)](_0x4a8ef2['join'](this[_0x1e7e93(0x251)],_0x1e7e93(0x221)))[_0x1e7e93(0x271)]()))[_0x1e7e93(0x211)];}catch{try{_0x4fab6e=require(require(_0x1e7e93(0x267))['join'](this['nodeModules'],'ws'));}catch{throw new Error('failed\\x20to\\x20find\\x20and\\x20load\\x20WebSocket');}}}return this['_WebSocketClass']=_0x4fab6e,_0x4fab6e;}['_connectToHostNow'](){var _0x5b4147=_0x575a5b;this[_0x5b4147(0x1da)]||this[_0x5b4147(0x24c)]||this[_0x5b4147(0x203)]>=this['_maxConnectAttemptCount']||(this[_0x5b4147(0x1b4)]=!0x1,this[_0x5b4147(0x1da)]=!0x0,this[_0x5b4147(0x203)]++,this[_0x5b4147(0x1f6)]=new Promise((_0x3fc108,_0x55c687)=>{var _0x684514=_0x5b4147;this[_0x684514(0x262)]()['then'](_0x289aa3=>{var _0x24ae8e=_0x684514;let _0x1a793b=new _0x289aa3(_0x24ae8e(0x286)+this[_0x24ae8e(0x238)]+':'+this[_0x24ae8e(0x1af)]);_0x1a793b[_0x24ae8e(0x20a)]=()=>{var _0x31775b=_0x24ae8e;this['_allowedToSend']=!0x1,this[_0x31775b(0x243)](_0x1a793b),this['_attemptToReconnectShortly'](),_0x55c687(new Error(_0x31775b(0x26f)));},_0x1a793b[_0x24ae8e(0x1aa)]=()=>{var _0x42f723=_0x24ae8e;this[_0x42f723(0x1cc)]||_0x1a793b['_socket']&&_0x1a793b[_0x42f723(0x26e)]['unref']&&_0x1a793b[_0x42f723(0x26e)][_0x42f723(0x201)](),_0x3fc108(_0x1a793b);},_0x1a793b[_0x24ae8e(0x1c6)]=()=>{var _0x49099b=_0x24ae8e;this[_0x49099b(0x1b4)]=!0x0,this[_0x49099b(0x243)](_0x1a793b),this['_attemptToReconnectShortly']();},_0x1a793b[_0x24ae8e(0x239)]=_0x323b9f=>{var _0x2727db=_0x24ae8e;try{_0x323b9f&&_0x323b9f['data']&&this[_0x2727db(0x1cc)]&&JSON[_0x2727db(0x1ea)](_0x323b9f['data'])[_0x2727db(0x273)]==='reload'&&this[_0x2727db(0x21e)]['location'][_0x2727db(0x280)]();}catch{}};})[_0x684514(0x246)](_0x494edb=>(this[_0x684514(0x24c)]=!0x0,this['_connecting']=!0x1,this['_allowedToConnectOnSend']=!0x1,this[_0x684514(0x1f0)]=!0x0,this[_0x684514(0x203)]=0x0,_0x494edb))[_0x684514(0x24b)](_0x36106f=>(this[_0x684514(0x24c)]=!0x1,this[_0x684514(0x1da)]=!0x1,console[_0x684514(0x266)](_0x684514(0x1bb)+this['_webSocketErrorDocsLink']),_0x55c687(new Error(_0x684514(0x272)+(_0x36106f&&_0x36106f[_0x684514(0x281)])))));}));}[_0x575a5b(0x243)](_0x133c18){var _0xb80cc5=_0x575a5b;this[_0xb80cc5(0x24c)]=!0x1,this[_0xb80cc5(0x1da)]=!0x1;try{_0x133c18[_0xb80cc5(0x1c6)]=null,_0x133c18[_0xb80cc5(0x20a)]=null,_0x133c18[_0xb80cc5(0x1aa)]=null;}catch{}try{_0x133c18['readyState']<0x2&&_0x133c18[_0xb80cc5(0x1cb)]();}catch{}}[_0x575a5b(0x249)](){var _0x533717=_0x575a5b;clearTimeout(this['_reconnectTimeout']),!(this['_connectAttemptCount']>=this[_0x533717(0x1d0)])&&(this[_0x533717(0x1c0)]=setTimeout(()=>{var _0x3d0eb3=_0x533717;this['_connected']||this[_0x3d0eb3(0x1da)]||(this[_0x3d0eb3(0x276)](),this[_0x3d0eb3(0x1f6)]?.[_0x3d0eb3(0x24b)](()=>this[_0x3d0eb3(0x249)]()));},0x1f4),this[_0x533717(0x1c0)][_0x533717(0x201)]&&this[_0x533717(0x1c0)]['unref']());}async[_0x575a5b(0x1dc)](_0x5908cf){var _0x2547b6=_0x575a5b;try{if(!this[_0x2547b6(0x1f0)])return;this[_0x2547b6(0x1b4)]&&this[_0x2547b6(0x276)](),(await this['_ws'])['send'](JSON['stringify'](_0x5908cf));}catch(_0x4b733a){console[_0x2547b6(0x266)](this[_0x2547b6(0x1e7)]+':\\x20'+(_0x4b733a&&_0x4b733a[_0x2547b6(0x281)])),this[_0x2547b6(0x1f0)]=!0x1,this['_attemptToReconnectShortly']();}}};function V(_0x2aa66a,_0x356888,_0x215af3,_0x30e80c,_0x45768d){var _0x10ccb7=_0x575a5b;let _0x16efa9=_0x215af3[_0x10ccb7(0x24a)](',')[_0x10ccb7(0x1ad)](_0x44c61e=>{var _0x10cd3a=_0x10ccb7;try{_0x2aa66a[_0x10cd3a(0x202)]||((_0x45768d==='next.js'||_0x45768d==='remix'||_0x45768d===_0x10cd3a(0x261))&&(_0x45768d+=_0x2aa66a[_0x10cd3a(0x1d3)]?.[_0x10cd3a(0x26d)]?.[_0x10cd3a(0x1ec)]?'\\x20server':_0x10cd3a(0x27e)),_0x2aa66a[_0x10cd3a(0x202)]={'id':+new Date(),'tool':_0x45768d});let _0x4cb342=new Q(_0x2aa66a,_0x356888,_0x44c61e,_0x30e80c);return _0x4cb342[_0x10cd3a(0x1dc)][_0x10cd3a(0x259)](_0x4cb342);}catch(_0x1a016f){return console['warn'](_0x10cd3a(0x1ee),_0x1a016f&&_0x1a016f['message']),()=>{};}});return _0x13352e=>_0x16efa9[_0x10ccb7(0x275)](_0x52c5e9=>_0x52c5e9(_0x13352e));}function H(_0xb0228){var _0x112d43=_0x575a5b;let _0x36955e=function(_0x43e3f8,_0x50efdc){return _0x50efdc-_0x43e3f8;},_0x13adcf;if(_0xb0228[_0x112d43(0x1fa)])_0x13adcf=function(){var _0x30ab54=_0x112d43;return _0xb0228[_0x30ab54(0x1fa)][_0x30ab54(0x23e)]();};else{if(_0xb0228['process']&&_0xb0228[_0x112d43(0x1d3)][_0x112d43(0x1c3)])_0x13adcf=function(){var _0xd05437=_0x112d43;return _0xb0228['process'][_0xd05437(0x1c3)]();},_0x36955e=function(_0x3c196f,_0x23fc20){return 0x3e8*(_0x23fc20[0x0]-_0x3c196f[0x0])+(_0x23fc20[0x1]-_0x3c196f[0x1])/0xf4240;};else try{let {performance:_0x2c88d7}=require(_0x112d43(0x274));_0x13adcf=function(){var _0x27f63d=_0x112d43;return _0x2c88d7[_0x27f63d(0x23e)]();};}catch{_0x13adcf=function(){return+new Date();};}}return{'elapsed':_0x36955e,'timeStamp':_0x13adcf,'now':()=>Date['now']()};}function X(_0x4eee9e,_0x446353,_0x156062){var _0x1871ac=_0x575a5b;if(_0x4eee9e[_0x1871ac(0x210)]!==void 0x0)return _0x4eee9e[_0x1871ac(0x210)];let _0x2f1077=_0x4eee9e[_0x1871ac(0x1d3)]?.[_0x1871ac(0x26d)]?.[_0x1871ac(0x1ec)];return _0x2f1077&&_0x156062===_0x1871ac(0x229)?_0x4eee9e['_consoleNinjaAllowedToStart']=!0x1:_0x4eee9e[_0x1871ac(0x210)]=_0x2f1077||!_0x446353||_0x4eee9e[_0x1871ac(0x1e4)]?.[_0x1871ac(0x27a)]&&_0x446353[_0x1871ac(0x1b9)](_0x4eee9e[_0x1871ac(0x1e4)]['hostname']),_0x4eee9e[_0x1871ac(0x210)];}((_0x1b44f2,_0x157879,_0x4ec912,_0x28949f,_0x4b8a2b,_0x2891fc,_0x2d043a,_0x59534c,_0x48c8d8)=>{var _0xc05b6b=_0x575a5b;if(_0x1b44f2[_0xc05b6b(0x257)])return _0x1b44f2[_0xc05b6b(0x257)];if(!X(_0x1b44f2,_0x59534c,_0x4b8a2b))return _0x1b44f2[_0xc05b6b(0x257)]={'consoleLog':()=>{},'consoleTrace':()=>{},'consoleTime':()=>{},'consoleTimeEnd':()=>{},'autoLog':()=>{},'autoLogMany':()=>{},'autoTraceMany':()=>{},'autoTrace':()=>{},'autoTime':()=>{},'autoTimeEnd':()=>{}},_0x1b44f2['_console_ninja'];let _0x43f269={'props':0x64,'elements':0x64,'strLength':0x400*0x32,'totalStrLength':0x400*0x32,'autoExpandLimit':0x1388,'autoExpandMaxDepth':0xa},_0x3b9656={'props':0x5,'elements':0x5,'strLength':0x100,'totalStrLength':0x100*0x3,'autoExpandLimit':0x1e,'autoExpandMaxDepth':0x2},_0x51e368=H(_0x1b44f2),_0x4611fb=_0x51e368[_0xc05b6b(0x235)],_0x5b3aa3=_0x51e368[_0xc05b6b(0x22e)],_0xf63cf8=_0x51e368[_0xc05b6b(0x23e)],_0x363e42={'hits':{},'ts':{}},_0xa777c=_0x5042e9=>{_0x363e42['ts'][_0x5042e9]=_0x5b3aa3();},_0x18f243=(_0x3e157f,_0xd36bb6)=>{var _0x2ba9f1=_0xc05b6b;let _0x3cb7e6=_0x363e42['ts'][_0xd36bb6];if(delete _0x363e42['ts'][_0xd36bb6],_0x3cb7e6){let _0x48ca81=_0x4611fb(_0x3cb7e6,_0x5b3aa3());_0x25cc5f(_0xe20198(_0x2ba9f1(0x247),_0x3e157f,_0xf63cf8(),_0x58f34b,[_0x48ca81],_0xd36bb6));}},_0x5dee20=_0x3cc7cb=>_0x14df46=>{var _0x37565f=_0xc05b6b;try{_0xa777c(_0x14df46),_0x3cc7cb(_0x14df46);}finally{_0x1b44f2[_0x37565f(0x258)]['time']=_0x3cc7cb;}},_0x4471d5=_0x25f1d5=>_0x54f042=>{var _0x1da1f2=_0xc05b6b;try{let [_0x52fc53,_0x193932]=_0x54f042[_0x1da1f2(0x24a)](_0x1da1f2(0x220));_0x18f243(_0x193932,_0x52fc53),_0x25f1d5(_0x52fc53);}finally{_0x1b44f2[_0x1da1f2(0x258)]['timeEnd']=_0x25f1d5;}};_0x1b44f2[_0xc05b6b(0x257)]={'consoleLog':(_0x308b4c,_0xe573fb)=>{var _0x2b5c2c=_0xc05b6b;_0x1b44f2[_0x2b5c2c(0x258)][_0x2b5c2c(0x1bc)][_0x2b5c2c(0x205)]!==_0x2b5c2c(0x23d)&&_0x25cc5f(_0xe20198(_0x2b5c2c(0x1bc),_0x308b4c,_0xf63cf8(),_0x58f34b,_0xe573fb));},'consoleTrace':(_0x5318be,_0x148170)=>{var _0x2a878f=_0xc05b6b;_0x1b44f2['console'][_0x2a878f(0x1bc)][_0x2a878f(0x205)]!==_0x2a878f(0x24d)&&_0x25cc5f(_0xe20198('trace',_0x5318be,_0xf63cf8(),_0x58f34b,_0x148170));},'consoleTime':()=>{var _0x485b2f=_0xc05b6b;_0x1b44f2[_0x485b2f(0x258)][_0x485b2f(0x247)]=_0x5dee20(_0x1b44f2['console']['time']);},'consoleTimeEnd':()=>{var _0x137795=_0xc05b6b;_0x1b44f2[_0x137795(0x258)][_0x137795(0x21b)]=_0x4471d5(_0x1b44f2[_0x137795(0x258)][_0x137795(0x21b)]);},'autoLog':(_0x576458,_0x339c7a)=>{var _0x10e585=_0xc05b6b;_0x25cc5f(_0xe20198(_0x10e585(0x1bc),_0x339c7a,_0xf63cf8(),_0x58f34b,[_0x576458]));},'autoLogMany':(_0x4d636e,_0x35d9e3)=>{var _0x4cd4b0=_0xc05b6b;_0x25cc5f(_0xe20198(_0x4cd4b0(0x1bc),_0x4d636e,_0xf63cf8(),_0x58f34b,_0x35d9e3));},'autoTrace':(_0x3e0627,_0x326077)=>{var _0x15d215=_0xc05b6b;_0x25cc5f(_0xe20198(_0x15d215(0x26c),_0x326077,_0xf63cf8(),_0x58f34b,[_0x3e0627]));},'autoTraceMany':(_0x31c452,_0x239a71)=>{var _0xdda9e3=_0xc05b6b;_0x25cc5f(_0xe20198(_0xdda9e3(0x26c),_0x31c452,_0xf63cf8(),_0x58f34b,_0x239a71));},'autoTime':(_0x41ea2d,_0x1e72d2,_0x2786f5)=>{_0xa777c(_0x2786f5);},'autoTimeEnd':(_0x22079c,_0x477898,_0x1ac318)=>{_0x18f243(_0x477898,_0x1ac318);}};let _0x25cc5f=V(_0x1b44f2,_0x157879,_0x4ec912,_0x28949f,_0x4b8a2b),_0x58f34b=_0x1b44f2[_0xc05b6b(0x202)];class _0x747b{constructor(){var _0x58047f=_0xc05b6b;this[_0x58047f(0x1fd)]=/^(?!(?:do|if|in|for|let|new|try|var|case|else|enum|eval|false|null|this|true|void|with|break|catch|class|const|super|throw|while|yield|delete|export|import|public|return|static|switch|typeof|default|extends|finally|package|private|continue|debugger|function|arguments|interface|protected|implements|instanceof)$)[_$a-zA-Z\\xA0-\\uFFFF][_$a-zA-Z0-9\\xA0-\\uFFFF]*$/,this[_0x58047f(0x1f8)]=/^(0|[1-9][0-9]*)$/,this[_0x58047f(0x222)]=/'([^\\\\']|\\\\')*'/,this['_undefined']=_0x1b44f2[_0x58047f(0x1bf)],this[_0x58047f(0x22d)]=_0x1b44f2['HTMLAllCollection'],this[_0x58047f(0x279)]=Object['getOwnPropertyDescriptor'],this[_0x58047f(0x22c)]=Object[_0x58047f(0x244)],this[_0x58047f(0x245)]=_0x1b44f2[_0x58047f(0x264)],this[_0x58047f(0x22f)]=RegExp[_0x58047f(0x1ae)][_0x58047f(0x271)],this[_0x58047f(0x260)]=Date[_0x58047f(0x1ae)][_0x58047f(0x271)];}[_0xc05b6b(0x268)](_0x169d38,_0x43b702,_0x4e35d3,_0x676536){var _0x188207=_0xc05b6b,_0x3ea1d1=this,_0x177ad0=_0x4e35d3[_0x188207(0x213)];function _0x3bc2a4(_0x140be2,_0x584ccb,_0x3795f1){var _0x13853d=_0x188207;_0x584ccb[_0x13853d(0x1c7)]=_0x13853d(0x1ab),_0x584ccb['error']=_0x140be2[_0x13853d(0x281)],_0x1aaa58=_0x3795f1[_0x13853d(0x1ec)]['current'],_0x3795f1[_0x13853d(0x1ec)][_0x13853d(0x253)]=_0x584ccb,_0x3ea1d1['_treeNodePropertiesBeforeFullValue'](_0x584ccb,_0x3795f1);}try{_0x4e35d3[_0x188207(0x1e1)]++,_0x4e35d3[_0x188207(0x213)]&&_0x4e35d3[_0x188207(0x21c)][_0x188207(0x1f1)](_0x43b702);var _0x393b50,_0x364c66,_0x4047e9,_0x305c1d,_0x1151a1=[],_0x5df3da=[],_0x25a632,_0x5df299=this[_0x188207(0x1b0)](_0x43b702),_0x18d420=_0x5df299==='array',_0x5ee9a6=!0x1,_0x4ca509=_0x5df299===_0x188207(0x224),_0x4bb1cc=this[_0x188207(0x23c)](_0x5df299),_0x5e1339=this[_0x188207(0x233)](_0x5df299),_0x17f48f=_0x4bb1cc||_0x5e1339,_0x5ce3cb={},_0x4d3671=0x0,_0x4240ee=!0x1,_0x1aaa58,_0x38d3b4=/^(([1-9]{1}[0-9]*)|0)$/;if(_0x4e35d3['depth']){if(_0x18d420){if(_0x364c66=_0x43b702[_0x188207(0x1e9)],_0x364c66>_0x4e35d3[_0x188207(0x1f2)]){for(_0x4047e9=0x0,_0x305c1d=_0x4e35d3['elements'],_0x393b50=_0x4047e9;_0x393b50<_0x305c1d;_0x393b50++)_0x5df3da[_0x188207(0x1f1)](_0x3ea1d1[_0x188207(0x215)](_0x1151a1,_0x43b702,_0x5df299,_0x393b50,_0x4e35d3));_0x169d38[_0x188207(0x236)]=!0x0;}else{for(_0x4047e9=0x0,_0x305c1d=_0x364c66,_0x393b50=_0x4047e9;_0x393b50<_0x305c1d;_0x393b50++)_0x5df3da[_0x188207(0x1f1)](_0x3ea1d1[_0x188207(0x215)](_0x1151a1,_0x43b702,_0x5df299,_0x393b50,_0x4e35d3));}_0x4e35d3['autoExpandPropertyCount']+=_0x5df3da[_0x188207(0x1e9)];}if(!(_0x5df299===_0x188207(0x1c5)||_0x5df299==='undefined')&&!_0x4bb1cc&&_0x5df299!==_0x188207(0x240)&&_0x5df299!==_0x188207(0x250)&&_0x5df299!==_0x188207(0x1c9)){var _0x1d644e=_0x676536[_0x188207(0x207)]||_0x4e35d3[_0x188207(0x207)];if(this[_0x188207(0x265)](_0x43b702)?(_0x393b50=0x0,_0x43b702[_0x188207(0x275)](function(_0x53d1ef){var _0x7640c9=_0x188207;if(_0x4d3671++,_0x4e35d3[_0x7640c9(0x26a)]++,_0x4d3671>_0x1d644e){_0x4240ee=!0x0;return;}if(!_0x4e35d3['isExpressionToEvaluate']&&_0x4e35d3[_0x7640c9(0x213)]&&_0x4e35d3[_0x7640c9(0x26a)]>_0x4e35d3[_0x7640c9(0x23f)]){_0x4240ee=!0x0;return;}_0x5df3da['push'](_0x3ea1d1['_addProperty'](_0x1151a1,_0x43b702,_0x7640c9(0x1ce),_0x393b50++,_0x4e35d3,function(_0x368bf4){return function(){return _0x368bf4;};}(_0x53d1ef)));})):this[_0x188207(0x282)](_0x43b702)&&_0x43b702[_0x188207(0x275)](function(_0x2fce99,_0x579c5d){var _0x55602e=_0x188207;if(_0x4d3671++,_0x4e35d3[_0x55602e(0x26a)]++,_0x4d3671>_0x1d644e){_0x4240ee=!0x0;return;}if(!_0x4e35d3['isExpressionToEvaluate']&&_0x4e35d3[_0x55602e(0x213)]&&_0x4e35d3[_0x55602e(0x26a)]>_0x4e35d3[_0x55602e(0x23f)]){_0x4240ee=!0x0;return;}var _0x527361=_0x579c5d['toString']();_0x527361[_0x55602e(0x1e9)]>0x64&&(_0x527361=_0x527361[_0x55602e(0x1b8)](0x0,0x64)+'...'),_0x5df3da['push'](_0x3ea1d1[_0x55602e(0x215)](_0x1151a1,_0x43b702,_0x55602e(0x27d),_0x527361,_0x4e35d3,function(_0x2a9385){return function(){return _0x2a9385;};}(_0x2fce99)));}),!_0x5ee9a6){try{for(_0x25a632 in _0x43b702)if(!(_0x18d420&&_0x38d3b4['test'](_0x25a632))&&!this[_0x188207(0x277)](_0x43b702,_0x25a632,_0x4e35d3)){if(_0x4d3671++,_0x4e35d3[_0x188207(0x26a)]++,_0x4d3671>_0x1d644e){_0x4240ee=!0x0;break;}if(!_0x4e35d3[_0x188207(0x1b7)]&&_0x4e35d3[_0x188207(0x213)]&&_0x4e35d3[_0x188207(0x26a)]>_0x4e35d3[_0x188207(0x23f)]){_0x4240ee=!0x0;break;}_0x5df3da[_0x188207(0x1f1)](_0x3ea1d1[_0x188207(0x278)](_0x1151a1,_0x5ce3cb,_0x43b702,_0x5df299,_0x25a632,_0x4e35d3));}}catch{}if(_0x5ce3cb['_p_length']=!0x0,_0x4ca509&&(_0x5ce3cb[_0x188207(0x283)]=!0x0),!_0x4240ee){var _0x3a48e7=[][_0x188207(0x1b1)](this[_0x188207(0x22c)](_0x43b702))[_0x188207(0x1b1)](this['_getOwnPropertySymbols'](_0x43b702));for(_0x393b50=0x0,_0x364c66=_0x3a48e7[_0x188207(0x1e9)];_0x393b50<_0x364c66;_0x393b50++)if(_0x25a632=_0x3a48e7[_0x393b50],!(_0x18d420&&_0x38d3b4[_0x188207(0x1fe)](_0x25a632[_0x188207(0x271)]()))&&!this[_0x188207(0x277)](_0x43b702,_0x25a632,_0x4e35d3)&&!_0x5ce3cb[_0x188207(0x1ff)+_0x25a632[_0x188207(0x271)]()]){if(_0x4d3671++,_0x4e35d3[_0x188207(0x26a)]++,_0x4d3671>_0x1d644e){_0x4240ee=!0x0;break;}if(!_0x4e35d3['isExpressionToEvaluate']&&_0x4e35d3['autoExpand']&&_0x4e35d3[_0x188207(0x26a)]>_0x4e35d3[_0x188207(0x23f)]){_0x4240ee=!0x0;break;}_0x5df3da[_0x188207(0x1f1)](_0x3ea1d1[_0x188207(0x278)](_0x1151a1,_0x5ce3cb,_0x43b702,_0x5df299,_0x25a632,_0x4e35d3));}}}}}if(_0x169d38['type']=_0x5df299,_0x17f48f?(_0x169d38[_0x188207(0x1d7)]=_0x43b702[_0x188207(0x216)](),this[_0x188207(0x23b)](_0x5df299,_0x169d38,_0x4e35d3,_0x676536)):_0x5df299==='date'?_0x169d38[_0x188207(0x1d7)]=this['_dateToString']['call'](_0x43b702):_0x5df299===_0x188207(0x1c9)?_0x169d38['value']=_0x43b702[_0x188207(0x271)]():_0x5df299==='RegExp'?_0x169d38[_0x188207(0x1d7)]=this[_0x188207(0x22f)][_0x188207(0x21d)](_0x43b702):_0x5df299==='symbol'&&this['_Symbol']?_0x169d38[_0x188207(0x1d7)]=this[_0x188207(0x245)][_0x188207(0x1ae)][_0x188207(0x271)][_0x188207(0x21d)](_0x43b702):!_0x4e35d3[_0x188207(0x1ac)]&&!(_0x5df299==='null'||_0x5df299===_0x188207(0x1bf))&&(delete _0x169d38['value'],_0x169d38['capped']=!0x0),_0x4240ee&&(_0x169d38[_0x188207(0x214)]=!0x0),_0x1aaa58=_0x4e35d3['node'][_0x188207(0x253)],_0x4e35d3[_0x188207(0x1ec)][_0x188207(0x253)]=_0x169d38,this['_treeNodePropertiesBeforeFullValue'](_0x169d38,_0x4e35d3),_0x5df3da[_0x188207(0x1e9)]){for(_0x393b50=0x0,_0x364c66=_0x5df3da['length'];_0x393b50<_0x364c66;_0x393b50++)_0x5df3da[_0x393b50](_0x393b50);}_0x1151a1[_0x188207(0x1e9)]&&(_0x169d38[_0x188207(0x207)]=_0x1151a1);}catch(_0x2b5886){_0x3bc2a4(_0x2b5886,_0x169d38,_0x4e35d3);}return this[_0x188207(0x1b2)](_0x43b702,_0x169d38),this[_0x188207(0x1cd)](_0x169d38,_0x4e35d3),_0x4e35d3['node'][_0x188207(0x253)]=_0x1aaa58,_0x4e35d3[_0x188207(0x1e1)]--,_0x4e35d3[_0x188207(0x213)]=_0x177ad0,_0x4e35d3[_0x188207(0x213)]&&_0x4e35d3[_0x188207(0x21c)]['pop'](),_0x169d38;}[_0xc05b6b(0x1f4)](_0xf32430){return Object['getOwnPropertySymbols']?Object['getOwnPropertySymbols'](_0xf32430):[];}[_0xc05b6b(0x265)](_0x55c835){var _0x438d1f=_0xc05b6b;return!!(_0x55c835&&_0x1b44f2['Set']&&this[_0x438d1f(0x1d1)](_0x55c835)==='[object\\x20Set]'&&_0x55c835['forEach']);}[_0xc05b6b(0x277)](_0x4a2552,_0x3ac3f9,_0x1121cd){var _0x58760c=_0xc05b6b;return _0x1121cd[_0x58760c(0x232)]?typeof _0x4a2552[_0x3ac3f9]==_0x58760c(0x224):!0x1;}['_type'](_0x2c32ec){var _0x2e1154=_0xc05b6b,_0x25b5dd='';return _0x25b5dd=typeof _0x2c32ec,_0x25b5dd==='object'?this[_0x2e1154(0x1d1)](_0x2c32ec)===_0x2e1154(0x1fb)?_0x25b5dd=_0x2e1154(0x20d):this['_objectToString'](_0x2c32ec)===_0x2e1154(0x1db)?_0x25b5dd='date':this['_objectToString'](_0x2c32ec)===_0x2e1154(0x25c)?_0x25b5dd='bigint':_0x2c32ec===null?_0x25b5dd='null':_0x2c32ec[_0x2e1154(0x270)]&&(_0x25b5dd=_0x2c32ec['constructor'][_0x2e1154(0x205)]||_0x25b5dd):_0x25b5dd==='undefined'&&this[_0x2e1154(0x22d)]&&_0x2c32ec instanceof this[_0x2e1154(0x22d)]&&(_0x25b5dd=_0x2e1154(0x26b)),_0x25b5dd;}[_0xc05b6b(0x1d1)](_0x16cb2d){var _0x51f07b=_0xc05b6b;return Object[_0x51f07b(0x1ae)][_0x51f07b(0x271)]['call'](_0x16cb2d);}[_0xc05b6b(0x23c)](_0x36368c){var _0x20f36d=_0xc05b6b;return _0x36368c===_0x20f36d(0x24e)||_0x36368c==='string'||_0x36368c===_0x20f36d(0x242);}[_0xc05b6b(0x233)](_0x29cd1f){var _0x38c8bf=_0xc05b6b;return _0x29cd1f===_0x38c8bf(0x24f)||_0x29cd1f===_0x38c8bf(0x240)||_0x29cd1f==='Number';}[_0xc05b6b(0x215)](_0x416c53,_0x51f001,_0x4e43f7,_0x72b93c,_0x342d61,_0x258051){var _0x1fc46c=this;return function(_0x5ec765){var _0x523e2d=_0x45b6,_0x2af954=_0x342d61[_0x523e2d(0x1ec)]['current'],_0x3dc3cb=_0x342d61[_0x523e2d(0x1ec)]['index'],_0x5a60a9=_0x342d61[_0x523e2d(0x1ec)][_0x523e2d(0x20e)];_0x342d61[_0x523e2d(0x1ec)]['parent']=_0x2af954,_0x342d61[_0x523e2d(0x1ec)][_0x523e2d(0x254)]=typeof _0x72b93c==_0x523e2d(0x242)?_0x72b93c:_0x5ec765,_0x416c53[_0x523e2d(0x1f1)](_0x1fc46c[_0x523e2d(0x1a5)](_0x51f001,_0x4e43f7,_0x72b93c,_0x342d61,_0x258051)),_0x342d61[_0x523e2d(0x1ec)][_0x523e2d(0x20e)]=_0x5a60a9,_0x342d61['node']['index']=_0x3dc3cb;};}[_0xc05b6b(0x278)](_0x291f9a,_0x3c3691,_0x1fbffc,_0x42d41f,_0x5abdf0,_0x10d40f,_0x15cce6){var _0x2cc6e5=this;return _0x3c3691['_p_'+_0x5abdf0['toString']()]=!0x0,function(_0x4d9b13){var _0x129199=_0x45b6,_0x5d1295=_0x10d40f[_0x129199(0x1ec)][_0x129199(0x253)],_0x14603f=_0x10d40f[_0x129199(0x1ec)][_0x129199(0x254)],_0x1c54f2=_0x10d40f[_0x129199(0x1ec)][_0x129199(0x20e)];_0x10d40f[_0x129199(0x1ec)][_0x129199(0x20e)]=_0x5d1295,_0x10d40f['node'][_0x129199(0x254)]=_0x4d9b13,_0x291f9a['push'](_0x2cc6e5[_0x129199(0x1a5)](_0x1fbffc,_0x42d41f,_0x5abdf0,_0x10d40f,_0x15cce6)),_0x10d40f['node'][_0x129199(0x20e)]=_0x1c54f2,_0x10d40f[_0x129199(0x1ec)][_0x129199(0x254)]=_0x14603f;};}[_0xc05b6b(0x1a5)](_0x3104e0,_0x11f3cd,_0x9cff7d,_0x16cacf,_0x3dd19f){var _0x39b690=_0xc05b6b,_0x810ce7=this;_0x3dd19f||(_0x3dd19f=function(_0x44d7f7,_0x7711b0){return _0x44d7f7[_0x7711b0];});var _0x4e6241=_0x9cff7d[_0x39b690(0x271)](),_0x3f6e96=_0x16cacf['expressionsToEvaluate']||{},_0x49e3e7=_0x16cacf[_0x39b690(0x1ac)],_0x1ac549=_0x16cacf[_0x39b690(0x1b7)];try{var _0x336e02=this['_isMap'](_0x3104e0),_0x48fd30=_0x4e6241;_0x336e02&&_0x48fd30[0x0]==='\\x27'&&(_0x48fd30=_0x48fd30[_0x39b690(0x231)](0x1,_0x48fd30['length']-0x2));var _0x392474=_0x16cacf[_0x39b690(0x1a7)]=_0x3f6e96[_0x39b690(0x1ff)+_0x48fd30];_0x392474&&(_0x16cacf[_0x39b690(0x1ac)]=_0x16cacf[_0x39b690(0x1ac)]+0x1),_0x16cacf[_0x39b690(0x1b7)]=!!_0x392474;var _0x14017e=typeof _0x9cff7d==_0x39b690(0x219),_0x390d36={'name':_0x14017e||_0x336e02?_0x4e6241:this[_0x39b690(0x206)](_0x4e6241)};if(_0x14017e&&(_0x390d36['symbol']=!0x0),!(_0x11f3cd==='array'||_0x11f3cd==='Error')){var _0x21dc5f=this['_getOwnPropertyDescriptor'](_0x3104e0,_0x9cff7d);if(_0x21dc5f&&(_0x21dc5f['set']&&(_0x390d36[_0x39b690(0x1d8)]=!0x0),_0x21dc5f['get']&&!_0x392474&&!_0x16cacf[_0x39b690(0x1b6)]))return _0x390d36['getter']=!0x0,this[_0x39b690(0x25e)](_0x390d36,_0x16cacf),_0x390d36;}var _0x21627e;try{_0x21627e=_0x3dd19f(_0x3104e0,_0x9cff7d);}catch(_0x3ac12f){return _0x390d36={'name':_0x4e6241,'type':_0x39b690(0x1ab),'error':_0x3ac12f['message']},this['_processTreeNodeResult'](_0x390d36,_0x16cacf),_0x390d36;}var _0x1213b3=this[_0x39b690(0x1b0)](_0x21627e),_0x3b7cb1=this['_isPrimitiveType'](_0x1213b3);if(_0x390d36['type']=_0x1213b3,_0x3b7cb1)this['_processTreeNodeResult'](_0x390d36,_0x16cacf,_0x21627e,function(){var _0x43fd5d=_0x39b690;_0x390d36[_0x43fd5d(0x1d7)]=_0x21627e[_0x43fd5d(0x216)](),!_0x392474&&_0x810ce7['_capIfString'](_0x1213b3,_0x390d36,_0x16cacf,{});});else{var _0x2acbc4=_0x16cacf[_0x39b690(0x213)]&&_0x16cacf['level']<_0x16cacf[_0x39b690(0x27b)]&&_0x16cacf[_0x39b690(0x21c)]['indexOf'](_0x21627e)<0x0&&_0x1213b3!==_0x39b690(0x224)&&_0x16cacf[_0x39b690(0x26a)]<_0x16cacf[_0x39b690(0x23f)];_0x2acbc4||_0x16cacf[_0x39b690(0x1e1)]<_0x49e3e7||_0x392474?(this['serialize'](_0x390d36,_0x21627e,_0x16cacf,_0x392474||{}),this['_additionalMetadata'](_0x21627e,_0x390d36)):this[_0x39b690(0x25e)](_0x390d36,_0x16cacf,_0x21627e,function(){var _0x21c2dc=_0x39b690;_0x1213b3===_0x21c2dc(0x1c5)||_0x1213b3===_0x21c2dc(0x1bf)||(delete _0x390d36['value'],_0x390d36[_0x21c2dc(0x208)]=!0x0);});}return _0x390d36;}finally{_0x16cacf[_0x39b690(0x1a7)]=_0x3f6e96,_0x16cacf[_0x39b690(0x1ac)]=_0x49e3e7,_0x16cacf[_0x39b690(0x1b7)]=_0x1ac549;}}[_0xc05b6b(0x23b)](_0x5ba6df,_0x9bb18c,_0x4c96a7,_0x58cc02){var _0x321431=_0xc05b6b,_0x1b6893=_0x58cc02[_0x321431(0x269)]||_0x4c96a7[_0x321431(0x269)];if((_0x5ba6df===_0x321431(0x1d5)||_0x5ba6df===_0x321431(0x240))&&_0x9bb18c[_0x321431(0x1d7)]){let _0x484d06=_0x9bb18c[_0x321431(0x1d7)][_0x321431(0x1e9)];_0x4c96a7[_0x321431(0x25b)]+=_0x484d06,_0x4c96a7[_0x321431(0x25b)]>_0x4c96a7[_0x321431(0x1ba)]?(_0x9bb18c['capped']='',delete _0x9bb18c[_0x321431(0x1d7)]):_0x484d06>_0x1b6893&&(_0x9bb18c[_0x321431(0x208)]=_0x9bb18c[_0x321431(0x1d7)][_0x321431(0x231)](0x0,_0x1b6893),delete _0x9bb18c[_0x321431(0x1d7)]);}}[_0xc05b6b(0x282)](_0x425e95){var _0xfd4c9a=_0xc05b6b;return!!(_0x425e95&&_0x1b44f2[_0xfd4c9a(0x27d)]&&this[_0xfd4c9a(0x1d1)](_0x425e95)===_0xfd4c9a(0x1de)&&_0x425e95[_0xfd4c9a(0x275)]);}['_propertyName'](_0xda3ed7){var _0x54cee7=_0xc05b6b;if(_0xda3ed7['match'](/^\\d+$/))return _0xda3ed7;var _0x381e02;try{_0x381e02=JSON[_0x54cee7(0x218)](''+_0xda3ed7);}catch{_0x381e02='\\x22'+this[_0x54cee7(0x1d1)](_0xda3ed7)+'\\x22';}return _0x381e02['match'](/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)?_0x381e02=_0x381e02[_0x54cee7(0x231)](0x1,_0x381e02['length']-0x2):_0x381e02=_0x381e02[_0x54cee7(0x1e6)](/'/g,'\\x5c\\x27')[_0x54cee7(0x1e6)](/\\\\\"/g,'\\x22')['replace'](/(^\"|\"$)/g,'\\x27'),_0x381e02;}[_0xc05b6b(0x25e)](_0x52c272,_0x46b066,_0x2f2aec,_0x153aa5){var _0x4e76de=_0xc05b6b;this['_treeNodePropertiesBeforeFullValue'](_0x52c272,_0x46b066),_0x153aa5&&_0x153aa5(),this[_0x4e76de(0x1b2)](_0x2f2aec,_0x52c272),this[_0x4e76de(0x1cd)](_0x52c272,_0x46b066);}[_0xc05b6b(0x1a6)](_0x1092da,_0x10d635){var _0x132135=_0xc05b6b;this[_0x132135(0x1f3)](_0x1092da,_0x10d635),this[_0x132135(0x241)](_0x1092da,_0x10d635),this[_0x132135(0x209)](_0x1092da,_0x10d635),this[_0x132135(0x1c2)](_0x1092da,_0x10d635);}[_0xc05b6b(0x1f3)](_0x4a586d,_0x1839d8){}[_0xc05b6b(0x241)](_0x142ea6,_0x5a6ee9){}[_0xc05b6b(0x230)](_0x59188c,_0x576de2){}[_0xc05b6b(0x255)](_0x1fc151){var _0x40de41=_0xc05b6b;return _0x1fc151===this[_0x40de41(0x1e5)];}['_treeNodePropertiesAfterFullValue'](_0x217c29,_0x18c496){var _0x2da097=_0xc05b6b;this['_setNodeLabel'](_0x217c29,_0x18c496),this[_0x2da097(0x200)](_0x217c29),_0x18c496[_0x2da097(0x1e8)]&&this['_sortProps'](_0x217c29),this[_0x2da097(0x1d4)](_0x217c29,_0x18c496),this[_0x2da097(0x1a8)](_0x217c29,_0x18c496),this[_0x2da097(0x20b)](_0x217c29);}[_0xc05b6b(0x1b2)](_0x3fd804,_0x4a74b3){var _0x15aac1=_0xc05b6b;let _0x3340a3;try{_0x1b44f2[_0x15aac1(0x258)]&&(_0x3340a3=_0x1b44f2['console'][_0x15aac1(0x1ca)],_0x1b44f2[_0x15aac1(0x258)][_0x15aac1(0x1ca)]=function(){}),_0x3fd804&&typeof _0x3fd804[_0x15aac1(0x1e9)]==_0x15aac1(0x242)&&(_0x4a74b3[_0x15aac1(0x1e9)]=_0x3fd804[_0x15aac1(0x1e9)]);}catch{}finally{_0x3340a3&&(_0x1b44f2[_0x15aac1(0x258)][_0x15aac1(0x1ca)]=_0x3340a3);}if(_0x4a74b3[_0x15aac1(0x1c7)]===_0x15aac1(0x242)||_0x4a74b3[_0x15aac1(0x1c7)]===_0x15aac1(0x1fc)){if(isNaN(_0x4a74b3[_0x15aac1(0x1d7)]))_0x4a74b3[_0x15aac1(0x21f)]=!0x0,delete _0x4a74b3[_0x15aac1(0x1d7)];else switch(_0x4a74b3[_0x15aac1(0x1d7)]){case Number[_0x15aac1(0x234)]:_0x4a74b3[_0x15aac1(0x1f5)]=!0x0,delete _0x4a74b3['value'];break;case Number[_0x15aac1(0x1ef)]:_0x4a74b3[_0x15aac1(0x27c)]=!0x0,delete _0x4a74b3[_0x15aac1(0x1d7)];break;case 0x0:this[_0x15aac1(0x217)](_0x4a74b3[_0x15aac1(0x1d7)])&&(_0x4a74b3[_0x15aac1(0x1c4)]=!0x0);break;}}else _0x4a74b3['type']==='function'&&typeof _0x3fd804[_0x15aac1(0x205)]=='string'&&_0x3fd804[_0x15aac1(0x205)]&&_0x4a74b3[_0x15aac1(0x205)]&&_0x3fd804[_0x15aac1(0x205)]!==_0x4a74b3['name']&&(_0x4a74b3[_0x15aac1(0x25a)]=_0x3fd804[_0x15aac1(0x205)]);}[_0xc05b6b(0x217)](_0x5c9cd8){var _0x4b14a2=_0xc05b6b;return 0x1/_0x5c9cd8===Number[_0x4b14a2(0x1ef)];}[_0xc05b6b(0x1d6)](_0x33d971){var _0x2a784e=_0xc05b6b;!_0x33d971['props']||!_0x33d971['props']['length']||_0x33d971[_0x2a784e(0x1c7)]===_0x2a784e(0x20d)||_0x33d971[_0x2a784e(0x1c7)]===_0x2a784e(0x27d)||_0x33d971['type']===_0x2a784e(0x1ce)||_0x33d971['props']['sort'](function(_0x407fea,_0x157ef0){var _0x4a4362=_0x2a784e,_0x5ade88=_0x407fea[_0x4a4362(0x205)][_0x4a4362(0x287)](),_0x2e4bcc=_0x157ef0[_0x4a4362(0x205)][_0x4a4362(0x287)]();return _0x5ade88<_0x2e4bcc?-0x1:_0x5ade88>_0x2e4bcc?0x1:0x0;});}[_0xc05b6b(0x1d4)](_0x26c008,_0x48d3ea){var _0x15abdd=_0xc05b6b;if(!(_0x48d3ea[_0x15abdd(0x232)]||!_0x26c008[_0x15abdd(0x207)]||!_0x26c008[_0x15abdd(0x207)]['length'])){for(var _0x2e1342=[],_0x5db55a=[],_0x389d36=0x0,_0x4194b7=_0x26c008[_0x15abdd(0x207)][_0x15abdd(0x1e9)];_0x389d36<_0x4194b7;_0x389d36++){var _0x1c079a=_0x26c008[_0x15abdd(0x207)][_0x389d36];_0x1c079a[_0x15abdd(0x1c7)]===_0x15abdd(0x224)?_0x2e1342['push'](_0x1c079a):_0x5db55a[_0x15abdd(0x1f1)](_0x1c079a);}if(!(!_0x5db55a[_0x15abdd(0x1e9)]||_0x2e1342[_0x15abdd(0x1e9)]<=0x1)){_0x26c008[_0x15abdd(0x207)]=_0x5db55a;var _0x5c5064={'functionsNode':!0x0,'props':_0x2e1342};this[_0x15abdd(0x1f3)](_0x5c5064,_0x48d3ea),this[_0x15abdd(0x230)](_0x5c5064,_0x48d3ea),this['_setNodeExpandableState'](_0x5c5064),this[_0x15abdd(0x1c2)](_0x5c5064,_0x48d3ea),_0x5c5064['id']+='\\x20f',_0x26c008['props']['unshift'](_0x5c5064);}}}[_0xc05b6b(0x1a8)](_0x3cae0a,_0x1f2d22){}[_0xc05b6b(0x200)](_0x4c6eee){}[_0xc05b6b(0x1a9)](_0x47fc8b){var _0x3a50d=_0xc05b6b;return Array[_0x3a50d(0x1a4)](_0x47fc8b)||typeof _0x47fc8b=='object'&&this[_0x3a50d(0x1d1)](_0x47fc8b)==='[object\\x20Array]';}['_setNodePermissions'](_0x2fd1eb,_0x525ece){}[_0xc05b6b(0x20b)](_0x1d3baa){var _0x504da9=_0xc05b6b;delete _0x1d3baa['_hasSymbolPropertyOnItsPath'],delete _0x1d3baa[_0x504da9(0x1e0)],delete _0x1d3baa[_0x504da9(0x226)];}[_0xc05b6b(0x209)](_0x2c6c60,_0x106645){}[_0xc05b6b(0x284)](_0x340e6f){var _0x2d8cb8=_0xc05b6b;return _0x340e6f?_0x340e6f[_0x2d8cb8(0x225)](this[_0x2d8cb8(0x1f8)])?'['+_0x340e6f+']':_0x340e6f[_0x2d8cb8(0x225)](this[_0x2d8cb8(0x1fd)])?'.'+_0x340e6f:_0x340e6f[_0x2d8cb8(0x225)](this[_0x2d8cb8(0x222)])?'['+_0x340e6f+']':'[\\x27'+_0x340e6f+'\\x27]':'';}}let _0x57e8e5=new _0x747b();function _0xe20198(_0x1fc0b7,_0xa04bae,_0x16238e,_0x16d477,_0x12f059,_0x4360ef){var _0x66ea98=_0xc05b6b;let _0xbc59c3,_0x3d0c6a;try{_0x3d0c6a=_0x5b3aa3(),_0xbc59c3=_0x363e42[_0xa04bae],!_0xbc59c3||_0x3d0c6a-_0xbc59c3['ts']>0x1f4&&_0xbc59c3[_0x66ea98(0x1c1)]&&_0xbc59c3['time']/_0xbc59c3[_0x66ea98(0x1c1)]<0x64?(_0x363e42[_0xa04bae]=_0xbc59c3={'count':0x0,'time':0x0,'ts':_0x3d0c6a},_0x363e42[_0x66ea98(0x227)]={}):_0x3d0c6a-_0x363e42[_0x66ea98(0x227)]['ts']>0x32&&_0x363e42['hits'][_0x66ea98(0x1c1)]&&_0x363e42[_0x66ea98(0x227)][_0x66ea98(0x247)]/_0x363e42[_0x66ea98(0x227)][_0x66ea98(0x1c1)]<0x64&&(_0x363e42[_0x66ea98(0x227)]={});let _0x59fcbc=[],_0x554b2e=_0xbc59c3[_0x66ea98(0x20c)]||_0x363e42['hits'][_0x66ea98(0x20c)]?_0x3b9656:_0x43f269,_0x195012=_0x30ab1c=>{var _0x1d6ab2=_0x66ea98;let _0x5de412={};return _0x5de412[_0x1d6ab2(0x207)]=_0x30ab1c[_0x1d6ab2(0x207)],_0x5de412[_0x1d6ab2(0x1f2)]=_0x30ab1c['elements'],_0x5de412['strLength']=_0x30ab1c[_0x1d6ab2(0x269)],_0x5de412[_0x1d6ab2(0x1ba)]=_0x30ab1c['totalStrLength'],_0x5de412[_0x1d6ab2(0x23f)]=_0x30ab1c[_0x1d6ab2(0x23f)],_0x5de412[_0x1d6ab2(0x27b)]=_0x30ab1c['autoExpandMaxDepth'],_0x5de412[_0x1d6ab2(0x1e8)]=!0x1,_0x5de412['noFunctions']=!_0x48c8d8,_0x5de412[_0x1d6ab2(0x1ac)]=0x1,_0x5de412[_0x1d6ab2(0x1e1)]=0x0,_0x5de412[_0x1d6ab2(0x1eb)]=_0x1d6ab2(0x1bd),_0x5de412[_0x1d6ab2(0x204)]='root_exp',_0x5de412[_0x1d6ab2(0x213)]=!0x0,_0x5de412['autoExpandPreviousObjects']=[],_0x5de412[_0x1d6ab2(0x26a)]=0x0,_0x5de412['resolveGetters']=!0x0,_0x5de412[_0x1d6ab2(0x25b)]=0x0,_0x5de412['node']={'current':void 0x0,'parent':void 0x0,'index':0x0},_0x5de412;};for(var _0x19ca74=0x0;_0x19ca74<_0x12f059['length'];_0x19ca74++)_0x59fcbc[_0x66ea98(0x1f1)](_0x57e8e5['serialize']({'timeNode':_0x1fc0b7==='time'||void 0x0},_0x12f059[_0x19ca74],_0x195012(_0x554b2e),{}));if(_0x1fc0b7==='trace'){let _0x4c932d=Error['stackTraceLimit'];try{Error['stackTraceLimit']=0x1/0x0,_0x59fcbc[_0x66ea98(0x1f1)](_0x57e8e5[_0x66ea98(0x268)]({'stackNode':!0x0},new Error()['stack'],_0x195012(_0x554b2e),{'strLength':0x1/0x0}));}finally{Error[_0x66ea98(0x27f)]=_0x4c932d;}}return{'method':_0x66ea98(0x1bc),'version':_0x2891fc,'args':[{'ts':_0x16238e,'session':_0x16d477,'args':_0x59fcbc,'id':_0xa04bae,'context':_0x4360ef}]};}catch(_0x10ac1d){return{'method':'log','version':_0x2891fc,'args':[{'ts':_0x16238e,'session':_0x16d477,'args':[{'type':_0x66ea98(0x1ab),'error':_0x10ac1d&&_0x10ac1d[_0x66ea98(0x281)]}],'id':_0xa04bae,'context':_0x4360ef}]};}finally{try{if(_0xbc59c3&&_0x3d0c6a){let _0x56064f=_0x5b3aa3();_0xbc59c3['count']++,_0xbc59c3[_0x66ea98(0x247)]+=_0x4611fb(_0x3d0c6a,_0x56064f),_0xbc59c3['ts']=_0x56064f,_0x363e42['hits']['count']++,_0x363e42['hits'][_0x66ea98(0x247)]+=_0x4611fb(_0x3d0c6a,_0x56064f),_0x363e42['hits']['ts']=_0x56064f,(_0xbc59c3[_0x66ea98(0x1c1)]>0x32||_0xbc59c3[_0x66ea98(0x247)]>0x64)&&(_0xbc59c3[_0x66ea98(0x20c)]=!0x0),(_0x363e42[_0x66ea98(0x227)][_0x66ea98(0x1c1)]>0x3e8||_0x363e42[_0x66ea98(0x227)]['time']>0x12c)&&(_0x363e42[_0x66ea98(0x227)][_0x66ea98(0x20c)]=!0x0);}}catch{}}}return _0x1b44f2['_console_ninja'];})(globalThis,_0x575a5b(0x22a),_0x575a5b(0x1d2),_0x575a5b(0x223),_0x575a5b(0x1cf),'1.0.0',_0x575a5b(0x1c8),_0x575a5b(0x1f7),_0x575a5b(0x1be));");
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
/*eslint eslint-comments/disable-enable-pair:,eslint-comments/no-unlimited-disable:,eslint-comments/no-aggregating-enable:,eslint-comments/no-duplicate-disable:,eslint-comments/no-unused-disable:,eslint-comments/no-unused-enable:,*/

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