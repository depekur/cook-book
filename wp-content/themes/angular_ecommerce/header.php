<!DOCTYPE html>
<html lang="ru" ng-app="cookbookApp">
<head>
	<meta charset="utf-8">
	<title>Cook Book</title>

	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/style.css'; ?>">

	<script src="<?= get_template_directory_uri() . '/bower_components/angular/angular.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/bower_components/angular-animate/angular-animate.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/bower_components/angular-route/angular-route.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/bower_components/angular-resource/angular-resource.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/app.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/controller.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/services.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/controller.js'; ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/filters.js'; ?>"></script>


	<?php wp_head(); ?>
</head>

<body>