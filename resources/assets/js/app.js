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
				var output = Mustache.render(template, data);
				$comments.prepend(output);
				$('.created-at-timeago').timeago();
			}
		});
	});

	$('select#tags_select_box').select2();

})();