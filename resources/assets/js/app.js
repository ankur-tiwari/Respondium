var Vue = require('vue');
require('./vendor/jquery.timeago.js');

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