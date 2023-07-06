// WORD CHECKER
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

var input = document.querySelector('#text-check'),
    characterCount = document.querySelector('#characterCount'),
    wordCount = document.querySelector('#wordCount'),
    sentenceCount = document.querySelector('#sentenceCount'),
    paragraphCount = document.querySelector('#paragraphCount'),
    readingTime = document.querySelector('#readingTime'),
    topKeywordsMobile = document.querySelector('#topKeywordsMobile'),
    topKeywords2Mobile = document.querySelector('#top2Mobile'),
    topKeywords3Mobile = document.querySelector('#top3Mobile');

characterCount.innerHTML = 0;
wordCount.innerHTML = 0;
sentenceCount.innerHTML = 0;
paragraphCount.innerHTML = 0;
readingTime.innerHTML = 0;

function start() {
    characterCount.innerHTML = numberWithCommas(input.value.length);

    var words = input.value.replace(/['";:,.?\xbf\-!\xa1]+/g, "").match(/\S+/g);
    if (words) {
        wordCount.innerHTML = words.length;
        WORDS_LENGTH = words.length
    } else {
        wordCount.innerHTML = 0;
        WORDS_LENGTH = 0
    }
    console.log("WOrd", WORDS_LENGTH)

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

        for (let j = 1; j < 6; j++) {
            var keywords = {};
            for (var i = 0; i < (nonStopWords.length - (j - 1)); i++) {
                var key = ''
                for (let k = i; k < i + j; k++) {
                    key += nonStopWords[k] + ' '
                }
                key = key.trim()
                if (key in keywords) {
                    keywords[key] += 1;
                } else {
                    keywords[key] = 1;
                }
            }
            var sortedKeywords = [];
            var weights = 0;
            for (var keyword in keywords) {
                sortedKeywords.push([keyword, keywords[keyword]])
                weights += keywords[keyword]
            }
            sortedKeywords.sort(function (a, b) {
                return b[1] - a[1]
            });

            let density = 0
            if (j === 2 || j === 3) {
                if (sortedKeywords[0]) {
                    density = sortedKeywords[0]
                }

                if (density > TOP_DENSITY)
                    TOP_DENSITY = density
            }

            topKeyword[j - 1].innerHTML = "";
            for (var i = 0; i < sortedKeywords.length && i < 10; i++) {
                var div = document.createElement('div');
                if (i == 9) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                } else if (i > 2) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                } else {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                }
                topKeyword[j - 1].appendChild(div);
            }

            topKeywordMobile[j - 1].innerHTML = "";
            for (var i = 0; i < sortedKeywords.length && i < 10; i++) {
                var div = document.createElement('div');
                if (i == 9) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] + "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                } else if (i > 2) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                } else {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                }
                topKeywordMobile[j - 1].appendChild(div);
            }
        }
    }
}

input.addEventListener("input", () => {
    start()
})

// PLAGIARISM CHECKER
$("#button-checker").on("click", function () {
    $.post({
        url: PLAGIARISM_CHECK_URL,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            text: $('#text-check').val(),
            user_id: USER_ID,
        },
        success: (res) => {
            if (res.statusCode === 200) {
                console.log(res.data)
            } else {
                toastr.error(res.message)
            }
        },
        error: (err) => {
            toastr.error(err.responseJSON.message)
        }
    });
});