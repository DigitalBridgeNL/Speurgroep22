// JavaScript Document
function customerCtrl($scope, $location)
{
	$scope.categories = $.ajax({
		  url: "API/loadCategorie.php",
		  dataType:"json",
		  async: false
		  });
		
	
	$scope.toBranche = function(bracheNaam)
	{
		$location.path("index.php");
	}
}