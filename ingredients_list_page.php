<!DOCTYPE html>
<meta charset='utf-8'>
<html>
<head>
<title>Ingredients: Apicius</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<style>


.org,.org:hover,.org:focus,.org:active{

	background-color:rgb(255, 86, 0);
	background-image:none;
	background-position:0;
	color:white;
}
#myModalLabel{
	color:#ff5600;
}
.add-on{
border-color:#ff5600;
}
#unit,#sign{
color:white; background-color:#ff5600; background-image:none; background-position:0; border-color:#ff5600;
}
.dl-horizontal > dd > span {
cursor:pointer;
}
</style>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var upsert=0;
var sign,unit,id;
var ingred_Avl= <?="'".$ingred_avl."'"?>;
var ingred_All=<?="'".$ingred_all."'"?>;
var ingredAvlArr,ingredAllArr;
var ingred_Names = <?=$ingred_names?>;
$(document).ready(function() { 

ingredAvlArr=$.parseJSON(ingred_Avl);
ingredAllArr=$.parseJSON(ingred_All);

$('#myModal').modal({show:false});

$('.nav > li').click( function() { $(this).siblings().removeClass('active'); $(this).addClass('active');}  );

$('.dl-horizontal > dd > span > .icon-arrow-up').click( function() { upsert=0; sign=1; $('#sign').html('+'); id= $(this).parent().parent().attr('id'); $('#dish_name').html(ingredAvlArr[id]['name']); $('#myModal').modal('show'); /* return false;*/} );

$('.dl-horizontal > dd > span > .icon-arrow-down').click( function() { upsert=0; sign=0; $('#sign').html('—'); id= $(this).parent().parent().attr('id'); $('#dish_name').html(ingredAvlArr[id]['name']); $('#myModal').modal('show'); } );

$('#change').click( function() { var url= 'change.php?action=ingredients&id='+id+'&upsert='+upsert+'&sign='+sign+'&val='+$('#quantity').val(); window.location.href= url; } );

$('#typeahead').typeahead({source: ingred_Names, updater: function (item){ upsert=1; sign=1; id=ingredAllArr[item].ingred_id; $('#sign').html('+'); $('#dish_name').html(item);  $('#myModal').modal('show'); return item;}});
	
} ); 
</script>
</head>
<body style="background-color: rgb(224, 224, 224);">
	 <div class="navbar">
		    <div class="navbar-inner">
		    <a class="brand" href="#" >Apicius</a>
		    <ul class="nav">
		    <li class="<?=$state['recipes']?>"><a href="index.php">Recipes</a></li>
		    <li class="<?=$state['ingredients']?>"><a href="#">Ingredients</a></li>
		    <li class="<?=$state['equipment']?>"><a href="equipment.php">Equipment</a></li>
		    <li><a href="logout.php">Logout</a></li>
		    </ul>
		    </div>
	</div>
	
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Modify Value</h3>
		</div>
	<div class="modal-body">
	<p>
		<span id='dish_name'>Vodka</span>
		<div class="input-prepend input-append">height
		<span class="add-on" id="sign">+</span>
		<input class="span2" id="quantity" style="min-height:20px;" type="text" placeholder="Quantity" required>
		 <span class="add-on" id="unit">oz</span>
		</div>	
	</p>
	</div>
		<div class="modal-footer">
		<button class="btn org" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn org" id="change">Save changes</button>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span4 offset4" style=" padding:10px; background-color: white;">
			<!--Body content-->

			<dl class="dl-horizontal">
			<?=$html?>
			</dl>
			<input type="text" id="typeahead" placeholder="Search ..." />
			</div>
		</div>
	</div>
</body>
</html>
