<!DOCTYPE html>
<meta charset='utf-8'>
<html>
<head>
<title>Apicius</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<style>


.recipe-name{

	color:#ff5600;
}
#typeahead{
width:100%;
}
</style>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function() { 

var recipes= <?=$recipe_list?>;
$('#typeahead').typeahead({source: recipes, updater: function (item){  window.location.href=$('#'+item.replace(" ","_")).attr('href'); } });

$('li').click( function() { $(this).siblings().removeClass('active'); $(this).addClass('active');}  );


	
} ); 
</script>
</head>
<body style="background-color: rgb(224, 224, 224);">
	 <div class="navbar">
		    <div class="navbar-inner">
		    <a class="brand" href="#" >Apicius</a>
		    <ul class="nav">
		    <li class="<?=$state['recipes']?>"><a href="index.php">Recipes</a></li>
		    <li class="<?=$state['ingredients']?>"><a href="ingredients.php">Ingredients</a></li>
		    <li class="<?=$state['equipment']?>"><a href="equipment.php">Equipment</a></li>
		    <li><a href="logout.php">Logout</a></li>
		    </ul>
		    </div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" style=" padding:10px; background-color: white;">
			<div class="row-fluid">	
			<ul class="breadcrumb" style="background-color: white;">
			    <li class="<?=$state['all']?>"><a href="index.php?all=true">All</a> <span class="divider">/</span></li>
			    <li class="<?=$state['possible']?>"><a href="index.php">Possible</a></li>
			</ul>
			</div>
			<!--Body content-->
			<div class="row-fluid">	
				<div class="span6 offset3">
				<input type="text" id="typeahead" placeholder="Search ..." />
				</div>
			</div>
			<?=$html?>
			</div>
		</div>
	</div>
</body>
</html>
