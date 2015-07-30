module.exports = {
	el: '#search_form',

	data: {
		searchInput: ''
	},

	methods: {
		search: function(event) {
			event.preventDefault();

			window.location.href = '/questions/search/' + this.searchInput;
	}
	}
};