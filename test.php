<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);
include 'utilities.php';
include 'dbconnect.php';
$conn=connect_db();
$res=$conn->query('SELECT * FROM dishes');
$assoc=$res->fetchAll();
trim_result($assoc);
echo '<xmp>';
$i=0;
while(isset($assoc[$i]))
{
	$html=values_to_query('recipe_thumbnail.html',$assoc[$i]); 
	echo $html;
	$i++;
}
echo '</xmp>';
?>
