var app = angular.module('klantenPortal', []).
  config(function($routeProvider) {
    $routeProvider.
      when('/', {controller:categoriesCtrl, templateUrl:'/partials/categories.html'}).
      when('/branche/:branche', {controller:branchesCtrl, templateUrl:'/partials/branche.html'}).
      when('/branche/:branche/bedrijf/:bedrijf', {controller:bedrijfCtrl, templateUrl:'/partials/bedrijf.html'}).
      otherwise({redirectTo:'/'});
  });