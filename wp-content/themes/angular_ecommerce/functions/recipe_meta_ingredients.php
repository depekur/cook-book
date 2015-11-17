<?php

function add_recipe_ingredients_view ( $post ) 
{

	$ing = 11; //количество ингридиентов + 1, чтоб нумерация начиналась с 1 а не 0

	wp_nonce_field( 'save_recipe_ingredients', 'recipe_ingredients_nonce' );

	for ($i = 1; $i < $ing; $i++) { 
		${'recipe_ing_' . $i} = get_post_meta( $post->ID, '_recipe_ing' . $i, true );

		echo '<p>';
		echo '<label for="recipe_ing_' . $i . '"> Ингридиент #' . $i;
		echo '<input type="text" id="recipe_ing_' . $i . '" name="recipe_ing_' . $i . '" value="' . esc_attr( ${'recipe_ing_' . $i} ) . '" size="30" >';
		echo '</label>';
		echo '</p>';

	}
}



function save_recipe_ingredients( $post_id ) 
{

	if ( ! isset( $_POST['recipe_ingredients_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['recipe_ingredients_nonce'], 'save_recipe_ingredients' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}




	$ing = 11;
	$rec = 'recipe_ing_';

	for ($i = 1; $i < $ing; $i++) {

		if ( isset( $_POST[$rec . $i] ) ) {
		update_post_meta( $post_id, 
								'_recipe_ing' . $i, 
								sanitize_text_field( $_POST[$rec . $i]) 
								);
		}
	}
}