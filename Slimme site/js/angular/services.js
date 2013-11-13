app.service('navigate', function($location) 
{	
	this.branche = function(branche) 
	{
		$location.path('/branche/' + branche);
	};
});