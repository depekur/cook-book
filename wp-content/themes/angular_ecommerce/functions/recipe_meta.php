<?php

add_action( 'add_meta_boxes', 'add_recipe_meta_box' );


function add_recipe_meta_box() 
{

		/**
		 * 	Основная информация
		 */
		add_meta_box(
			'recipe_main_info',
			__( 'Основная информация', 'myplugin_textdomain' ),
			'add_recipe_meta_box_view',
			'recipes',
			'normal',
			'high'
		);


		/**
		 *		Пошаговый рецепт
		 * 
		 */
		add_meta_box(
			'recipe_steps',
			'Пошаговый рецепт',
			'add_recipe_steps_view',
			'recipes',
			'normal',
			'default'
		);

		/**
		 * 	порции, калории, время готовки
		 * 
		 */
		add_meta_box(
			'recipe_side_info',
			'Рецепт',
			'add_recipe_side_info_view',
			'recipes',
			'side',
			'default'
		);



		/**
		 * 	список ингридиентов
		 * 
		 */
		add_meta_box(
			'resipe_ingredients',
			'Ингридиенты',
			'add_recipe_ingredients_view',
			'recipes',
			'side',
			'default'
		);

}


function add_recipe_meta_box_view( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_save_meta_box_data', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_my_meta_value_key', true );

	?>

	<p>
		<label for="myplugin_new_field">Второй заголовок:<br>
			<textarea type="text" id="product_schema_field_description" name="product_schema_field_description" cols="100" rows="4"> </textarea>
		</label>


	</p>
	<p>
		<label for="myplugin_new_field">Описание рецепта:<br>
			<textarea type="text" id="product_schema_field_description" name="product_schema_field_description" cols="100" rows="7"> </textarea>
		</label>
	</p>
	<p>
		<label for="myplugin_new_field">Основное фото рецепта:<br>
			<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
		</label>
	</p>

	<p>
		<label for="myplugin_new_field">Фото ингридиентов:<br>
			<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
		</label>
	</p>



<?php

}




function add_recipe_side_info_view( $post ) 
{

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_schema_save_meta', 'product_schema_meta_box_nonce' );

	$product_schema_name = get_post_meta( $post->ID, '_product_schema_name', true );
	$product_schema_description = get_post_meta( $post->ID, '_product_schema_description', true );
	$product_schema_image = get_post_meta( $post->ID, '_product_schema_image', true );
	$product_schema_price = get_post_meta( $post->ID, '_product_schema_price', true );
	$product_schema_val = get_post_meta( $post->ID, '_product_schema_val', true );

	?>

<p>
	<label> Порции:
		<input type="text" id="product_schema_field_name" name="product_schema_field_name" value="<?= esc_attr( $product_schema_name ) ?>" size="30" >
	</label>
</p>

<p>
	<label> Калории:
		<input type="text" id="product_schema_field_name" name="product_schema_field_name" value="<?= esc_attr( $product_schema_name ) ?>" size="30" >
	</label>
</p>

<p>
	<label> Время готовки:
		<input type="text" id="product_schema_field_name" name="product_schema_field_name" value="<?= esc_attr( $product_schema_name ) ?>" size="30" >
	</label>
</p>


<?php
}


function add_recipe_ingredients_view ( $post ) 
{



	for ( $ingredients = 1; $ingredients < 11; $ingredients++ ) {
		echo '<p>';
		echo '<label> Ингридиент #' . $ingredients;
		echo '<input type="text" id="product_schema_field_name" name="product_schema_field_name" value="" size="30" >';
		echo '</label>';
		echo '</p>';
	}

}



function add_recipe_steps_view ( $post ) 
{


	for ( $steps = 1; $steps < 7; $steps++ ) {

	?>

		<section style="margin-bottom: 50px;">	
			<h1>Шаг #<?= $steps ?></h1>

		
			<p>
			<label for="myplugin_new_field">Название шага:<br>
				<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
			</label>

			</p>
			<p>
				<label for="myplugin_new_field">Описание шага:<br>
					<textarea type="text" id="product_schema_field_description" name="product_schema_field_description" cols="100" rows="7"> </textarea>
				</label>
			</p>
			<p>
				<label for="myplugin_new_field">Фото шага:<br>
					<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
				</label>
			</p>

		</section>

	<?php

	}

}