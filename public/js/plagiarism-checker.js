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
    $(".estimation-box").hide();
    $(".plagiarism-result").hide();
    $(".words-density").hide();
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
            var textareaContent = styleMatchedText(_text, res.data.alltextmatched);
            $('.result-input').append(textareaContent);
            $('.result-input').show();
            $('.url-mode-container').hide();
            $('#text-check').hide();
            results = res.data.result;
            querywords = res.data.querywords;

            if (results.length > 0) {
              $(".result-option").show();
            } else {
              $(".result-option").hide();
            }

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