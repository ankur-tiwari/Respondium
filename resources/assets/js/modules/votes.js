module.exports = {
	el: '.single-question-buttons',

	data: {
		postId: 0,

		voted: false,

		upvoted: false,

		downvoted: false,

		upvotes: 0,

		downvotes: 0
	},

	methods: {
		upvote: function(event) {
			event.preventDefault();

			$.post('/questions/' + this.postId + '/votes', {
				type: 'upvote'
			});

			this.setVoted();
		},

		downvote: function(event) {
			event.preventDefault();

			$.post('/questions/' + this.postId + '/votes', {
				type: 'downvote'
			});

			this.setVoted();
		},

		setVoted: function() {
			$.get('/questions/' + this.postId + '/voted').success(function(response) {
				if (response.voted === true) {
					this.voted = true;
					if (response.type === 'upvote') {
						this.upvoted = true;
					} else if (response.type === 'downvote') {
						this.downvoted = true;
					}
				}
			}.bind(this));

			this.setUpvotes();

			this.setDownvotes();
		},

		setUpvotes: function() {
			$.get('/questions/' + this.postId + '/upvotes').success(function(votes) {
				this.upvotes = votes.count;
			}.bind(this));
		},

		setDownvotes: function() {
			$.get('/questions/' + this.postId + '/downvotes').success(function(votes) {
				this.upvotes = votes.count;
			}.bind(this));
		}
	},

	ready: function() {
		this.postId = this.$$.question.getAttribute('data-post');

		this.setVoted();
	},
};