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
				templateUrl: 'http://lab.bananagarden.net/cook-book/wp-content/themes/angular_ecommerce/views/list.html',
				controller: 'cookbookList'
			}).
			when('/recipes/:recipeId', {
				templateUrl: 'http://lab.bananagarden.net/cook-book/wp-content/themes/angular_ecommerce/views/single.html',
				controller: 'cookbookSingle'
			}).
      	otherwise({
				redirectTo: '/recipes'
      	});
}]);
