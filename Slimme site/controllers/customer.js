// JavaScript Document
function customerCtrl($scope)
{
	$scope.categories = $.ajax({
		  url: "includes/loadCategorie.php",
		  dataType:"json",
		  async: false
		  });
		
	$scope.branchesInCategory = function(category)
	{
		return $.ajax({
		  url: "includes/loadBranche_cat.php?id=" + category,
		  dataType:"json",
		  async: false
		  });	
	}
}