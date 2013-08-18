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


try {
	$conn=connect_db();
	
	//get the cooking instructions
	$param= array('dish_id'=>1);
	$param['user_id']=$_SESSION['user_id'];
	if(isset($_GET['id'])&&filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT))
		$param['dish_id']=$_GET['id'];
	$query=values_to_query('sql/recipe_steps.sql',$param);
	$res=$conn->query($query);
	$steps=$res->fetchAll();	
	trim_result($steps);
	
	// get all ingredients required for recipe
	$query=values_to_query('sql/ingredients_requirement.sql',$param);
	$res=$conn->query($query);
	$ingredients=$res->fetchAll();	
	trim_result($ingredients);
	
	// get all equipment required for recipe
	$query=values_to_query('sql/equipment_requirement.sql',$param);
	$res=$conn->query($query);
	$equipment=$res->fetchAll();	
	trim_result($equipment);
	
	//get name of the dish
	$query="SELECT name FROM dishes WHERE dish_id=".$param['dish_id'];
	$res=$conn->query($query);
	$name=$res->fetchAll();	
	trim_result($name);
	$name=$name[0]['name'];
	
	//get average rating for the dish
	$query="SELECT AVG(rating_value) FROM ratings WHERE dish_id=".$param['dish_id'];
	$res=$conn->query($query);
	$rating=$res->fetchAll();	
	trim_result($rating);
	$stars='';
	$itr=0;
	while($itr<round($rating[0]['avg']))
	{$itr++; $stars.='<i class="icon-star"></i>';}
	while($itr<10)
	{$itr++; $stars.='<i class="icon-star-empty"></i>';}
	
	//get user rating if any
	$query="SELECT rating_value FROM ratings WHERE dish_id=".$param['dish_id']."AND user_id=".$param['user_id'];
	$res=$conn->query($query);
	$urate=$res->fetchAll();
	if(empty($urate))
	$user_rating=values_to_query('selectbox.html',$param);
	else
	$user_rating="Your Rating: ".$urate[0]['rating_value'];

	// prepared statement version
	/*
	$uid=1;
	$stmt=$conn->prepare(file_get_contents('sql/possible_dishes.sql'));
	$stmt->bindParam(':user_id',$uid,PDO::PARAM_INT);
	$stmt->execute();
	$assoc=$stmt->fetchAll();*/
	
	//construct the HTML for various sections
	$requirements=construct_html($ingredients,'ingredients_list.html');
	$requirements.=construct_html($equipment,'equipment_list.html');
	$stepslist=construct_html($steps,'steps.html');
	$pic=str_replace(' ','_',$name);
	$pic='img/recipes/'.$pic.'.jpg';
	
	//disconnect from database
	$conn = null;
	
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

include 'recipe_detail_page.php';
?>


