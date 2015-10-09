var Vue = require('vue');
require('./vendor/jquery.timeago.js');
require('./vendor/jquery.chosen.js');

$('#tags_select_box').chosen();

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

Vue.component('comments-list', require('./components/comments-list'));
// votes for questions.
new Vue(require('./modules/votes'))
// comments for questions.
new Vue(require('./modules/comments'));
// comments for answers.
new Vue(require('./modules/answercomment'))
// search
new Vue(require('./modules/search'));

// tooltip logic

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});

// Text Loop

var loopTags = $(".loop-tags");
var quoteIndex = -1;

function showNextQuote() {
    ++quoteIndex;
    loopTags.eq(quoteIndex % loopTags.length)
        .fadeIn(500)
        .delay(3000)
        .fadeOut(500, showNextQuote);
}

showNextQuote();
