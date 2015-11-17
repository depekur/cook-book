<?php

function add_recipe_steps_view ( $post ) 
{
	$steps = 7;
	wp_nonce_field( 'save_recipe_steps', 'recipe_steps_nonce' );


	for ($i = 1; $i < $steps; $i++) {

		${'recipe_step_' . $i . '_name'} = get_post_meta( $post->ID, '_recipe_step_' . $i . '_name', true );
		${'recipe_step_' . $i . '_description'} = get_post_meta( $post->ID, '_recipe_step_' . $i . '_description', true );
		${'recipe_step_' . $i . '_photo'} = get_post_meta( $post->ID, '_recipe_step_' . $i . '_photo', true );

	?>

		<section style="margin-bottom: 50px;">	
			<h1>Шаг #<?= $i ?></h1>

		
			<p>
			<label for="recipe_step_<?= $i ?>_name">Название шага:<br>
				<input type="text" id="recipe_step_<?= $i ?>" name="recipe_step_<?= $i ?>_name" value="<?= esc_attr( ${'recipe_step_' . $i . '_name'} ) ?>" size="100" />
			</label>

			</p>
			<p>
				<label for="recipe_step_<?= $i ?>_description">Описание шага:<br>
					<textarea type="text" id="recipe_step_<?= $i ?>_description" name="recipe_step_<?= $i ?>_description" cols="100" rows="7"><?= ${'recipe_step_' . $i . '_description'} ?></textarea>
				</label>
			</p>
			<p>
				<label for="recipe_step_<?= $i ?>_photo">Фото шага:<br>
					<input type="text" id="recipe_step_<?= $i ?>_photo" name="recipe_step_<?= $i ?>_photo" value="<?= esc_attr( ${'recipe_step_' . $i . '_photo'} ) ?>" size="100" />
				</label>
			</p>

		</section>

	<?php

	}

}




function save_recipe_steps( $post_id ) 
{

	if ( ! isset( $_POST['recipe_steps_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['recipe_steps_nonce'], 'save_recipe_steps' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}


	$steps = 7;

	for ($i = 1; $i < $steps; $i++) {

		$step_name = 'recipe_step_' . $i . '_name';
		$step_description = 'recipe_step_' . $i . '_description';
		$step_photo = 'recipe_step_' . $i . '_photo';


		if ( isset( $_POST[ $step_name ] ) ) {
		update_post_meta( $post_id, 
								'_' . $step_name, 
								sanitize_text_field( $_POST[ $step_name ]) 
								);
		}

		if ( isset( $_POST[ $step_description ] ) ) {
		update_post_meta( $post_id, 
								'_' . $step_description, 
								sanitize_text_field( $_POST[ $step_description ]) 
								);
		}

		if ( isset( $_POST[ $step_photo ] ) ) {
		update_post_meta( $post_id, 
								'_' . $step_photo, 
								sanitize_text_field( $_POST[ $step_photo ]) 
								);
		}

	}
}