<?php


function create_recipe() { 
    register_post_type( 'recipes',
        array(
            'labels' => array(
                'name' => 'Рецепты',
                'singular_name' => 'Рецепт',
                'add_new' => 'Добавить',
                'add_new_item' => 'Добавить рецепт',
                'edit' => 'Редактировать',
                'edit_item' => 'Редактировать рецепт',
                'new_item' => 'Новый рецепт',
                'view' => 'Просмотр',
                'view_item' => 'Посмотреть рецепт',
                'search_items' => 'Искать рецепт',
                'not_found' => 'Рецепт не найден',
                'not_found_in_trash' => 'Нет рецептов!',
                'parent' => 'parent'
            ),
            'public' => true,
            'menu_position' => 6,
            'supports' => array( 'title'),
            'taxonomies' => array( '' ),
            //'menu_icon' => plugins_url( 'tat.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'init', 'create_recipe' ); 