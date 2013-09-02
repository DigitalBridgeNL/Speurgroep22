<?php
include('includes/header.php');
?>
<div class="container" ng-controller="customerCtrl">
    <div class="row">
        <div class="large-12 columns">
            <table ng-repeat="category in categories">
                <thead>
                 	<tr>
                    	<td >{{category.naam}}</td>
                    </tr>   
                </thead>
                <tbody>
                <tr ng-repeat="branche in branchesInCategory(category.branche_categoryID)">
                <td>{{branche.naam}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

	
<?php include('includes/footer.php');?>