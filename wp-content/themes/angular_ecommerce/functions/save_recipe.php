<?php 



/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function myplugin_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['myplugin_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}
add_action( 'save_post', 'myplugin_save_meta_box_data' );








add_action( 'save_post', 'product_schema_save_meta' );


function product_schema_save_meta( $post_id ) 
{

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['product_schema_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['product_schema_meta_box_nonce'], 'product_schema_save_meta' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	
//save name
	if ( isset( $_POST['product_schema_field_name'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_name', 
								sanitize_text_field( $_POST['product_schema_field_name']) 
								);
	}

//save description
	if ( isset( $_POST['product_schema_field_description'] ) ) {

		update_post_meta( $post_id, 
								'_product_schema_description', 
								sanitize_text_field( $_POST['product_schema_field_description'] ) 
								);
	}

//save image
	if ( isset( $_POST['product_schema_field_image'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_image', 
								sanitize_text_field( $_POST['product_schema_field_image'] ) 
								);
	}

//save price
	if ( isset( $_POST['product_schema_field_price'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_price', 
								sanitize_text_field( $_POST['product_schema_field_price'] ) 
								);
	}

//save val
	if ( isset( $_POST['product_schema_field_val'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_val', 
								sanitize_text_field( $_POST['product_schema_field_val'] ) 
								);
	}
	
}
