// JavaScript Document
function categoriesCtrl($scope, $location, navigate)
{
	$scope.navigate = navigate;
	$scope.categories = $.ajax({
		  url: "API/loadCategorie.php",
		  dataType:"json",
		  async: false
		  });
}

function branchesCtrl($scope, $location, $routeParams, navigate)
{
	$scope.navigate = navigate;
	$scope.branche = $routeParams.branche;
	
	$scope.bedrijven = $.ajax({
		  url: "API/loadBedrijven.php",
		  data: "branche=" + $scope.branche,
		  dataType:"json",
		  async: false
		  });
}

function bedrijfCtrl($scope, $location)
{
	
}