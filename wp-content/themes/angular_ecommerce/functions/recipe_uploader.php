<?php

add_action(  'wp_dashboard_setup',  'add_recipe_uploader_widget'  );
// вызываем функцию для создания консольного виджета 
function add_recipe_uploader_widget() {

	wp_add_dashboard_widget('recipe_widget',
									'Загрузчик рецептов из json',  
									'recipe_uploader_widget'  
									);
}

// функция для отображения содержания консольного виджета 
function recipe_uploader_widget() {

	echo '<form method="post" style="text-align: center;">';
	echo '<input name="recipe_uploader_submit" type="submit" class="button button-primary" value="Загрузить"><br>';
	echo '</form>';
}


add_action( 'init', 'save_new_recipe' );


function save_new_recipe() {

	if( 'POST' == $_SERVER['REQUEST_METHOD'] && isset( $_POST['recipe_uploader_submit'] ) ) {

		$dir = get_template_directory() . '/recipes';
		$recipe_list = scandir( $dir );

		/**
		 * 	remove . and .. value in array 
		 */
		unset($recipe_list[0]);
		unset($recipe_list[1]);

		foreach ($recipe_list as $recipe ) {
			$recipe = file_get_contents( $dir . '/' . $recipe);
			$recipe = json_decode( $recipe, true );

			$rec = array(
				'post_title' => $recipe['title'], 
				'post_status' => 'publish',
				'post_name' => $recipe['link'],
				'post_author' => 1,
				'post_type' => 'recipes'
			);

			$recipe_id = wp_insert_post( $rec );

			wp_set_object_terms( $recipe_id, strtolower($recipe['category']), 'ingredients', false); //set taxonomies

			update_post_meta( $recipe_id, '_recipe_second_header', trim($recipe['subtitle']) );
			update_post_meta( $recipe_id, '_recipe_description', trim($recipe['desc']) );
			update_post_meta( $recipe_id, '_recipe_main_photo', trim($recipe['headbg']) );
			update_post_meta( $recipe_id, '_recipe_thumb', trim($recipe['thumb']) );
			update_post_meta( $recipe_id, '_recipe_ing_photo',	trim($recipe['ingbg']) );
			update_post_meta( $recipe_id, '_recipe_portions', trim($recipe['portions']) );
			update_post_meta( $recipe_id, '_recipe_calories', trim($recipe['calories']) );
			update_post_meta( $recipe_id, '_recipe_cooktime', trim($recipe['time']) );

			$i = 1;

			foreach ( $recipe['ingredients'] as $ing ) {
				update_post_meta( $recipe_id, '_recipe_ing' . $i, trim($ing) );
				$i++;
			}

			$i = 1;

			foreach ( $recipe['steps'] as $step ) {

				$step_name = 'recipe_step_' . $i . '_name';
				$step_description = 'recipe_step_' . $i . '_description';
				$step_photo = 'recipe_step_' . $i . '_photo';
				$i++;

				update_post_meta( $recipe_id, '_' . $step_name, trim($step['title'] ));
				update_post_meta( $recipe_id, '_' . $step_description, trim($step['desc'] ));
				update_post_meta( $recipe_id, '_' . $step_photo, trim($step['img'])  );
			}
		}
	}
}