var toastr = require('toastr');

module.exports = {
	props: [
		'type', 'id', 'comments'
	],

	data: function () {
		return {
			comments: [],

			newComment: '',

			isAuthenticated: false
		};
	},

	template: require('./templates/commentsList.html'),

	ready: function () {
		if ( this.type === 'question' ) {
			this.commentsForQuestion();
		} else if ( this.type === 'answer' ) {
			this.commentsForAnswer();
		}

		$.get('/auth/show').success(function (response) {
			if (response.id) {
				this.isAuthenticated = true;
			}
		}.bind(this));
	},

	methods: {

		commentsForQuestion: function () {
			$.get('/questions/' + this.id + '/comments').success(function (response) {
				this.comments = response;
			}.bind(this));
		},

		commentsForAnswer: function () {
			$.get('/answers/' + this.id + '/comments').success(function (response) {
				this.comments = response;
			}.bind(this));
		},

		addComment: function (event) {
			event.preventDefault();

			if ( this.type === 'question' ) {
				this.addCommentForQuestion();
			} else if ( this.type === 'answer' ) {
				this.addCommentForAnswer();
			}

			this.newComment = '';
		},

		addCommentForQuestion: function () {
			$.post('/questions/' + this.id + '/comments', {
				body: this.newComment
			}).success(function (response) {
				this.comments.push(response);

				toastr.success('Your comment was posted!', 'Great!');
			}.bind(this));
		},

		addCommentForAnswer: function () {
			$.post('/answers/' + this.id + '/comments', {
				body: this.newComment
			}).success(function (response) {
				this.comments.push(response);

				toastr.success('Your comment was posted!', 'Great!');
			}.bind(this));
		}

	}
};