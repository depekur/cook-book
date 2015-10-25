'use strict';

/* Services */

var cookbookServices = angular.module('cookbookServices', ['ngResource']);

cookbookServices.factory('Recipe', ['$resource',
	function($resource){
		return $resource('recipes/:recipeId.json', {}, {
			query: {method:'GET', params:{recipeId:'recipes'}, isArray:true}
	});
}]);