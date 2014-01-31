app.service('navigate', function($location) 
{	
	this.branche = function(brancheId) 
	{
		$location.path('/branche/' + brancheId);
	};
});