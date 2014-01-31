// JavaScript Document
function categoriesCtrl($scope, $location, navigate)
{
	$scope.navigate = navigate;
	$scope.categories = JSON.parse($.ajax({
		  url: "API/loadCategorie.php",
		  dataType:"json",
		  async: false
		  }).responseText);
}

function branchesCtrl($scope, $location, $routeParams, navigate)
{
	$scope.navigate = navigate;
	var brancheId = $routeParams.branche;
	
	var result = $.ajax({
		  url: "API/loadBedrijven.php",
		  data: "branche=" + brancheId,
		  dataType:"json",
		  async: false,
	});
	var data = JSON.parse(result['responseText']);
	console.log(data)
	$scope.bedrijven = data.bedrijven;
	$scope.branche = data.branche;
	$scope.categorie = data.category;
}

function bedrijfCtrl($scope, $location)
{
	
}