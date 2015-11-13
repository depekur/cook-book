'use strict';


var cookbookCtrl = angular.module('cookbookCtrl', []);


cookbookCtrl.controller('cookbookList', ['$scope', 'Recipe',
	function($scope, Recipe) {
		$scope.recipes = Recipe.query();

		var pagesShown = 1;
		var pageSize = 9;

		$scope.recipeCount = function(data) {
			return $scope.recipes.length;
		};

		$scope.paginationLimit = function(data) {
			return pageSize * pagesShown;
		};

		$scope.hasMoreItemsToShow = function() {
			return pagesShown < ($scope.recipes.length / pageSize);
		};

		$scope.showMoreItems = function() {
			pagesShown = pagesShown + 1;       
		}; 

}]);

cookbookCtrl.controller('cookbookSingle', ['$scope', '$routeParams', 'Recipe',
	function($scope, $routeParams, Recipe) {
		$scope.recipe = Recipe.get({recipeId: $routeParams.recipeId});

}]);
