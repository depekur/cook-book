'use strict';


var cookbookApp = angular.module('cookbookApp', [
	'ngRoute',
	'cookbookCtrl',
	'cookbookFilters',
	'cookbookServices'
]);

cookbookApp.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/recipes', {
				templateUrl: 'views/list.html',
				controller: 'cookbookList'
			}).
			when('/recipes/:recipeId', {
				templateUrl: 'views/single.html',
				controller: 'cookbookSingle'
			}).
      	otherwise({
				redirectTo: '/recipes'
      	});
}]);
