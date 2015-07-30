var Vue = require('vue');
require('./vendor/jquery.timeago.js');

// comments for questions.
new Vue(require('./modules/comments'));
new Vue(require('./modules/search'));