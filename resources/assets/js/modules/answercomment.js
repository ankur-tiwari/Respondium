module.exports = {
	el: '.answer_comment',

	data: {
		comments: [],
		newComment: []
	},

	ready: function() {
		this.answerId = this.$$.answer.getAttribute('data-answer');

		$.get('/answers/' + this.answerId + '/comments').success(function(comments) {
			this.comments = comments;
		}.bind(this));
	},

	methods: {
		addComment: function(event) {
			event.preventDefault();

			$.post('/answers/' + this.answerId + '/comments', { body: this.newComment }).success(function(comment) {
				this.comments.push(comment);
			}.bind(this));

			this.newComment = '';
		}
	}
};
