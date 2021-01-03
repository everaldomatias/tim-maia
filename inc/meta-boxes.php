<?php
add_action('admin_menu', 'tm_team_add_metabox');

function tm_team_add_metabox() {

	add_meta_box(
		'team_mb',
		__('Mais informações', 'tim-maia'),
		'tm_team_callback_metabox',
		'team',
		'normal',
		'default'
	);

}

function tm_team_callback_metabox($post) {

	$team_specialty = get_post_meta($post->ID, 'team_specialty', true);

	wp_nonce_field('nonce_team', '_nonce_team' );

	echo '<table class="form-table">
		<tbody>
			<tr>
				<th><label for="team_specialty">Especialidade</label></th>
				<th><input type="text" id="team_specialty" name="team_specialty" value="'. esc_attr($team_specialty) .'"></th>
			</tr>
		</tbody>
	</table>';

}

add_action('save_post', 'tm_team_metabox_save', 10, 2);

function tm_team_metabox_save($post_id, $post) {

	if (!isset($_POST[ '_nonce_team' ]) || !wp_verify_nonce($_POST[ '_nonce_team' ], 'nonce_team')) {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ($post->post_type != 'team') {
		return $post_id;
	}

	if (isset($_POST['team_specialty'])) {
		update_post_meta($post_id, 'team_specialty', sanitize_text_field($_POST['team_specialty']));
	} else {
		delete_post_meta($post_id, 'team_specialty');
	}

	return $post_id;

}
