<?php
include('includes/header.php');
?>
<div class="container" ng-controller="customerCtrl">
    <div class="row">
        <div class="large-12 columns">
        	<div class="row">
        		<div class="large=12 columns">
        			<h2>Branches per kategorie</h2>
        		</div>
        	</div>
        	<div class="row">
        		<div class="large-12 columns">
        			<input type="text-field" ng-model="search"> Zoeken
        		</div>
        	</div>
            <div class="row">
            	<div class="large-3 columns" ng-repeat="category in categories">
            		<h3>{{category['naam']}}</h3>
            		<div class="branche" ng-repeat="branche in category['branches']">
            			<a ng-click="toBranche(branche)">{{branche}}</a>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>

	
<?php include('includes/footer.php');?>