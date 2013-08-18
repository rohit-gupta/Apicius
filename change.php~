<?php session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include 'dbconnect.php';
include 'utilities.php';
if(!isset($_SESSION['user_id']))
	header("location:login.html");

$param=array();
$param['user_id']=$_SESSION['user_id'];
$param['quantity']=$_GET['val'];

$param['opsign']='+';
if($_GET['sign']==0)
$param['opsign']='-';

if($_GET['action']=='rating')
{
	$param['dish_id']=$_GET['id'];
	$param['rating_value']=$_POST['rating_value'];
	$query=values_to_query('sql/insert_rating.sql',$param);
}
else
{
if($_GET['upsert']==1)
{
	if($_GET['action']=='equipment')	
	{
		$param['equip_id']=$_GET['id'];
		$query=values_to_query('sql/insert_equip.sql',$param);
	}
	if($_GET['action']=='ingredients')	
	{
		$param['ingred_id']=$_GET['id'];
		$param['unit']='oz';
		$query=values_to_query('sql/insert_ingred.sql',$param);
	}
}
if($_GET['upsert']==0)
{
	if($_GET['action']=='equipment')	
	{
		$param['equip_id']=$_GET['id'];
		$query=values_to_query('sql/update_equip.sql',$param);
	}
	if($_GET['action']=='ingredients')	
	{
		$param['ingred_id']=$_GET['id'];
		$query=values_to_query('sql/update_ingred.sql',$param);
	}
}
}
//var_dump($query);
try{
$conn=connect_db();
$res=$conn->query($query);

if($_GET['action']=='rating')
{
	header("location:recipe.php?id=".$param['dish_id']);
	exit();
}
echo $query;
//clean up zero values from database
$query="DELETE FROM ingredients_availability WHERE quantity = 0;";
$res=$conn->query($query);
$query="DELETE FROM equipment_availability WHERE quantity = 0;";
$res=$conn->query($query);

} catch(PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
echo $query;
//header("location:".$_GET['action'].".php");
?>
