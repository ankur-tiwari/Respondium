$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

module.exports = {
	el: '#comments',

	data: {

		comments: [],

		newComment: ''

	},

	ready: function() {
		this.questionId = this.$$.comments.getAttribute('data-post');

		$.get('/questions/' + this.questionId + '/comments').success(function(comments) {
			this.comments = comments;
		}.bind(this));
	},

	methods: {

		addComment: function(event) {
			event.preventDefault();

			$.post('/questions/' + this.questionId + '/comments', {
				body: this.newComment
			}).success(function(comment) {
				this.comments.push(comment);
			}.bind(this));

			this.newComment = '';

		}

	}
};