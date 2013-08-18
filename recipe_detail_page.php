<!DOCTYPE html>
<meta charset='utf-8'>
<html>
<head>
<title><?=$name?></title> <!-- recipe title-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<style>


#name_label{

	color:#ff5600;
	display:inline-block;
	vertical-align:bottom;
      	margin:0;
}

body{
/*color:#ff5600;*/
}
#dish{
            	display:inline-block;
          	vertical-align:bottom;
          	margin:0;
}
#cover{
	display:table-cell;
}
.thumbnail{
border: none;
}
</style>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function() { 

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
			<div class="span6 offset3" style=" padding:1em; background-color: white;" id="main">
			<!--Body content-->
			<div id="cover">
				
				<img class="img-polaroid" src="<?=$pic?>" id="dish" width="40%" alt="">
				<h1 id="name_label"><?=$name?></h1>
				<br/>
				Average Rating:
				<?=$stars?>
				&nbsp;&nbsp;<br/>
				<?=$user_rating?>
			</div>
			<div class="thumbnail">
				<h3>Requirements</h3>
				<dl class="dl-horizontal">
				<?=$requirements?>						
				</dl>
			</div>
			<div class="thumbnail">
				<h3>Preparation</h3>			
				<ol>
				<?=$stepslist?>
				</ol>
			</div>
		</div>
	</div>
</body>
</html>
