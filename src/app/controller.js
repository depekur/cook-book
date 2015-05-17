'use strict';


var cookbookCtrl = angular.module('cookbookCtrl', []);

cookbookCtrl.controller('ListCtrl', ['$scope', '$http',
	function($scope, $http) {

	$http.get('src/core/controller.php/').success(function(data) {
		$scope.posts = data;
	});

	$scope.orderProp = 'id';
}]);

