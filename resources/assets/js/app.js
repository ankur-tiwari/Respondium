(function() {

	// HTML editor
	$('#description_editor').editable({
		inlineMode: false,
		height: 300
	});

	$('time.timeago').timeago();

	var commentForm = $('#comment_form');

	commentForm.on('submit', function(e) {
		e.preventDefault();

		var $form = $(this);

		var $comments = $('#comments');

		var data = $form.serialize();

		$form.find('textarea').val('');

		var template = $('#comment_template').html();

		$.ajax({
			method: 'post',
			url: '/comments',
			data: data,
			success: function(data) {
				getUser(data.user_id).success(function(user) {
					data.user = user;
					var output = Mustache.render(template, data);
					$comments.prepend(output);
					$('.created-at-timeago').timeago();
				});
			}
		});

	});

	function getUser(id) {

		return $.ajax({
			url: '/raw/user/' + id,
			method: 'get'
		});

	}

})();