<?php


function add_recipe_meta_box_view( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'save_recipe_meta_info', 'recipe_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$recipe_second_header = get_post_meta( $post->ID, '_recipe_second_header', true );
	$recipe_description = get_post_meta( $post->ID, '_recipe_description', true );
	$recipe_main_photo = get_post_meta( $post->ID, '_recipe_main_photo', true );
	$recipe_ing_photo = get_post_meta( $post->ID, '_recipe_ing_photo', true );
	$recipe_thumb = get_post_meta( $post->ID, '_recipe_thumb', true );

	?>

	<p>
		<label for="recipe_second_header">Второй заголовок:<br>
			<textarea type="text" id="recipe_second_header" name="recipe_second_header" cols="100" rows="4"><?= esc_attr( $recipe_second_header ) ?></textarea>
		</label>


	</p>
	<p>
		<label for="recipe_description">Описание рецепта:<br>
			<textarea type="text" id="recipe_description" name="recipe_description" cols="100" rows="7"><?= esc_attr( $recipe_description ) ?></textarea>
		</label>
	</p>
	<p>
		<label for="recipe_main_photo">Основное фото рецепта:<br>
			<input type="text" id="recipe_main_photo" name="recipe_main_photo" value="<?= esc_attr( $recipe_main_photo ) ?>" size="100" />
		</label>
	</p>

	<p>
		<label for="recipe_ing_photo">Фото ингридиентов:<br>
			<input type="text" id="recipe_ing_photo" name="recipe_ing_photo" value="<?= esc_attr( $recipe_ing_photo ) ?>" size="100" />
		</label>
	</p>

	<p>
		<label for="recipe_thumb">Миниатюра:<br>
			<input type="text" id="recipe_thumb" name="recipe_thumb" value="<?= esc_attr( $recipe_thumb ) ?>" size="100" />
		</label>
	</p>



<?php

}






function save_recipe_meta_info( $post_id ) 
{

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['recipe_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['recipe_meta_box_nonce'], 'save_recipe_meta_info' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	

	if ( isset( $_POST['recipe_second_header'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_second_header', 
								sanitize_text_field( $_POST['recipe_second_header']) 
								);
	}


	if ( isset( $_POST['recipe_description'] ) ) {

		update_post_meta( $post_id, 
								'_recipe_description', 
								sanitize_text_field( $_POST['recipe_description'] ) 
								);
	}


	if ( isset( $_POST['recipe_main_photo'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_main_photo', 
								sanitize_text_field( $_POST['recipe_main_photo'] ) 
								);
	}

	if ( isset( $_POST['recipe_ing_photo'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_ing_photo', 
								sanitize_text_field( $_POST['recipe_ing_photo'] ) 
								);
	}

	if ( isset( $_POST['recipe_thumb'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_thumb', 
								sanitize_text_field( $_POST['recipe_thumb'] ) 
								);
	}
}