<?php



$post = array(

	'menu_order' => [ <order> ] //Если создаём страницу, то здесь устанавливаем порядок её отображения.
	'comment_status' => [ 'closed' | 'open' ] //'closed' - комментирование закрыто.
	'ping_status' => [ 'closed' | 'open' ] //'closed' - отключает pingbacks или trackbacks
	'pinged' => [ ? ] //?
	'post_author' => [ <user ID> ] //ID автора поста.
	'post_category' => [ array(<category id>, <...>) ] //Добавление ID категорий.
	'post_content' => [ <the text of the post> ] //Полный текст поста.
	'post_date' => [ Y-m-d H:i:s ] //Дата создания поста.
	'post_date_gmt' => [ Y-m-d H:i:s ] //Дата создания поста по Гринвичу.
	'post_excerpt' => [ <an excerpt> ] //Для ваших цитат из поста.
	'post_name' => [ <the name> ] //Имя (slug) вашего поста.
	'post_parent' => [ <post ID> ] //Установить родителя поста.
	'post_password' => [ ? ] //Пароль для поста.
	'post_status' => [ 'draft' | 'publish' | 'pending'| 'future' | 'private' ] //Статус для нового поста.
	'post_title' => [ <the title> ] //Название вашего поста.
	'post_type' => [ 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type ] //Тип поста: статья, страница, ссылка, пункт меню, иной тип.
	'tags_input' => [ '<tag>, <tag>, <...>' ] //Для тэгов.
	'to_ping' => [ ? ] //?
	'tax_input' => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] //Поддержка пользовательской таксономии.
);  


// Создаём объект записи
$recipe = array(
	'post_title' => '', 
	'post_status' => 'publish',
	'post_name' => '', //link
	'post_author' => 1,
	'post_type' => 'recipes',
	'tax_input' => '' 

);

// Вставляем запись в базу данных
wp_insert_post( $recipe );