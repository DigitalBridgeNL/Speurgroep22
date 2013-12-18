<?php
	include('includes/header.php');
?>
<div class="clear"></div>
        <style>
            .cke_contents {
                height: 400px !important;
            }
        </style>   
    <script>
 $(document).ready(function() {
      $("#searchInput").keyup(function(){
			//hide all the rows
          $("#pagesTable").find("tr").hide();
 			//split the current value of searchInput
          var data = this.value.split(" ");
 			//create a jquery object of the rows
          var jo = $("#pagesTable").find("tr");
 			//Recursively filter the jquery object to get results. 
          $.each(data, function(i, v){
              jo = jo.filter("*:contains('"+v+"')");
          });
 			//show the rows that match.
          jo.show();
 			//Removes the placeholder text 
      }).focus(function(){
          this.value="";
          $(this).css({"color":"black"});
          $(this).unbind('focus');
      }).css({"color":"#C0C0C0"});
  });
</script>
<script>
 	$( window ).load(function() {
        getAllpages();
    });
	$(document).ready(function(){
    	$("#table-scroll table").delegate('tr', 'click', function() {
			var id = $(this).attr('id');
			window.location.href = '?page=' + id;
		});
	});
</script>
    <body>
    <div class="pages">
    <input id="searchInput" value="Type To Filter"><br/>
    	<div id="table-wrapper">
 			<div id="table-scroll">
                <table>
                    <thead>
                        <tr>
                        <th>Categorie</th><th>Page</th>
                        </tr>
                    </thead>
                    <tbody id="pagesTable">
                    </tbody>
                </table>
    		</div>
		</div>
    </div>
    <div class="editor">
	<?php
	$pageID = $_GET['page'];
	switch ($pageID)
	{
		case  $pageID:
			loadHTML($pageID);
		break;
		default:
			loadHTML(1);
  	}	
	?>
    </div>
</div><!-- close div center !-->
