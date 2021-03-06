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
$state['recipes']='';
$state['ingredients']='active';
$state['equipment']='';

try {
	$conn=connect_db();
	
	//query version
	$param= array();
	$param['user_id']=$_SESSION['user_id'];
	
	// get list of ingredients available with user
	$query=values_to_query('sql/ingredients_availability.sql',$param);
	$res=$conn->query($query);
	$assoc=$res->fetchAll();	
	trim_result($assoc);
	$i=0;
	$html='';
	while(isset($assoc[$i]))
	{
		$thumb=values_to_query('ingred_list.html',$assoc[$i]); 
		$html.=$thumb;
		$i++;
	}

	// get list of all ingredients
	//create the JSON to pass data to page Javascript
	$query="SELECT * FROM ingredients ";
	$res=$conn->query($query);
	$allIngredients=$res->fetchAll();	
	trim_result($allIngredients);
	$assoc=reindex($assoc,'ingred_id');
	$allIngredients=reindex($allIngredients,'name');
	$ingred_avl=json_encode($assoc);
	$ingred_all=json_encode($allIngredients);
	$ingred_names=array_keys($allIngredients);
	$ingred_names=json_encode($ingred_names);
	
	//disconnect from database
	$conn = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

include 'ingredients_list_page.php';
?>


