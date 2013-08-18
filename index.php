<?php session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include 'dbconnect.php';
include 'utilities.php';

if(!isset($_SESSION['user_id']))
	header("location:login.html");

// setting null array of states
$state=array();
$state['recipes']='active';
$state['ingredients']='';
$state['equipment']='';
$state['all']='';
$state['possible']='';

// JSON variables for typeahead
$recipe_list='[';

if(isset($_GET['all']))
	$state['all']='active';
else
	$state['possible']='active';

try {
	$conn=connect_db();
	
	
	$param= array();
	$param['user_id']=$_SESSION['user_id'];
	if($state['all']==='active')
	$query="SELECT * FROM dishes"; //get info on all dishes from database
	else
	$query=values_to_query('sql/possible_dishes.sql',$param); //only on dishes that are possible to cook
	
	$res=$conn->query($query);
	$assoc=$res->fetchAll();	
	
	//contruct the HTML for display
	trim_result($assoc);
	$i=0;
	$html='';
	while(isset($assoc[$i]))
	{
		$assoc[$i]['pic']=str_replace(' ','_',$assoc[$i]['name']);
		$thumb=values_to_query('recipe_thumbnail.html',$assoc[$i]); 
		$html.=$thumb;
		$recipe_list.='"'.$assoc[$i]['name'].'",';
		$i++;
	}
	$recipe_list = substr_replace($recipe_list ,"]",-1); // replacing extra comma by closing bracket

	//disconnect from database
	$conn = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

include 'recipe_list_page.php';
?>


