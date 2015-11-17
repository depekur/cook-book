<?php


function main_ingredients_taxonomy() {
	// create a new taxonomy
	register_taxonomy(
		'main_ingredient',
		'recipes',
		array(
			'labels' => array(
								'name'              => 'Главные ингридиенты',
								'singular_name'     => 'Главный ингридиент',
								'search_items'      => 'Искать ингридиенты',
								'all_items'         => 'Все ингридиенты',
								'parent_item'       => 'Родительские ингридиенты',
								'parent_item_colon' => 'Родительские ингридиенты:',
								'edit_item'         => 'Редактировать ингридиенты',
								'update_item'       => 'Обновить ингридиенты',
								'add_new_item'      => 'Добавить новый ингридиент',
								'new_item_name'     => 'Новый ингридиент',
								'menu_name'         => 'Ингридиенты',
							),
			'rewrite' => true,
			'capabilities' => array(),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'main_ingredients_taxonomy' );