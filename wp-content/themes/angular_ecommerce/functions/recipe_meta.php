<?php

add_action( 'add_meta_boxes', 'add_recipe_meta_box' );

add_action( 'save_post', 'save_recipe_meta_info' );
add_action( 'save_post', 'save_recipe_meta_info_2' );
add_action( 'save_post', 'save_recipe_steps' );
add_action( 'save_post', 'save_recipe_ingredients' );

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