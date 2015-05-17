'use strict';


var CookBook = angular.module('CookBook', [
  'ngRoute',
  'cookbookCtrl'
]);

CookBook.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/list', {
        templateUrl: 'src/views/list.html',
        controller: 'ListCtrl'
      }).
      otherwise({
        redirectTo: '/list'
      });
  }]);
