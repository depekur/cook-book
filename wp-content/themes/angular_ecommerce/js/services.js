'use strict';

/* Services */

var cookbookServices = angular.module('cookbookServices', ['ngResource']);

cookbookServices.factory('Recipe', ['$resource',
	function($resource){
		return $resource('http://lab.bananagarden.net/cook-book/wp-content/themes/angular_ecommerce/recipes/:recipeId.json', {}, {
			query: {method:'GET', params:{recipeId:'recipes'}, isArray:true}
	});
}]);