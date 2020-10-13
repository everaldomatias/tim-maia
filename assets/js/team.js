jQuery(document).ready(function ($) {

	if ($('.post-type-archive-team')) {

		$('body').on('click', '.each a', function(event) {

			event.preventDefault();

			var post_id = $(this).attr('data-post-id');

			var data = {
				'action': 'get_member',
				'security': team_object.security,
				'post_id': post_id
			};

			$.post(team_object.ajaxurl, data, function (response) {

				if (response) {

					$('.overlay-modal').toggleClass('active');
					$('html').toggleClass('modal-active');

					$('.response-content').html(response);
				}

			});

		})

		$('body').on('click', '.close', function (event) {

			event.preventDefault();

			$('.overlay-modal').toggleClass('active');
			$('html').toggleClass('modal-active');

			$('.response-content').html('');

		})

	}

});
