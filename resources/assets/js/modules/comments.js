module.exports = {
	el: '#comments',

	data: {
		comments: []
	},

	created: function () {
		this.$on('comments-loaded', function (comments) {
			this.comments = comments;
		}.bind(this));
	}
};