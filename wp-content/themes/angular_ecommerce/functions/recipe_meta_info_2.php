<?php

function add_recipe_side_info_view( $post ) 
{

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'save_recipe_meta_info_2', 'recipe_meta_info_2_nonce' );

	$recipe_portions = get_post_meta( $post->ID, '_recipe_portions', true );
	$recipe_calories = get_post_meta( $post->ID, '_recipe_calories', true );
	$recipe_cooktime = get_post_meta( $post->ID, '_recipe_cooktime', true );

	?>

<p>
	<label> Порции:
		<input type="text" id="recipe_portions" name="recipe_portions" value="<?= esc_attr( $recipe_portions ) ?>" size="30" >
	</label>
</p>

<p>
	<label> Калории:
		<input type="text" id="recipe_calories" name="recipe_calories" value="<?= esc_attr( $recipe_calories ) ?>" size="30" >
	</label>
</p>

<p>
	<label> Время готовки:
		<input type="text" id="recipe_cooktime" name="recipe_cooktime" value="<?= esc_attr( $recipe_cooktime ) ?>" size="30" >
	</label>
</p>


<?php
}




function save_recipe_meta_info_2( $post_id ) 
{

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['recipe_meta_info_2_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['recipe_meta_info_2_nonce'], 'save_recipe_meta_info_2' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	
//save name
	if ( isset( $_POST['recipe_portions'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_portions', 
								sanitize_text_field( $_POST['recipe_portions']) 
								);
	}

//save description
	if ( isset( $_POST['recipe_calories'] ) ) {

		update_post_meta( $post_id, 
								'_recipe_calories', 
								sanitize_text_field( $_POST['recipe_calories'] ) 
								);
	}

//save image
	if ( isset( $_POST['recipe_cooktime'] ) ) {
		update_post_meta( $post_id, 
								'_recipe_cooktime', 
								sanitize_text_field( $_POST['recipe_cooktime'] ) 
								);
	}
}
