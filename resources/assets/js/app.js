var Vue = require('vue');
require('./vendor/jquery.timeago.js');

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