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
$state['ingredients']='';
$state['equipment']='active';

try {
	$conn=connect_db();
	$param= array();
	$param['user_id']=$_SESSION['user_id'];
	
	//get list of equipment available with user
	$query=values_to_query('sql/equipment_availability.sql',$param);
	$res=$conn->query($query);
	$assoc=$res->fetchAll();	
	trim_result($assoc);
	$i=0;
	$html='';
	while(isset($assoc[$i]))
	{
		$thumb=values_to_query('equip_list.html',$assoc[$i]); 
		$html.=$thumb;
		$i++;
	}
	//get list of all equipment
	$query="SELECT * FROM equipment ";
	$res=$conn->query($query);
	$allEquipment=$res->fetchAll();	
	trim_result($allEquipment);
	$assoc=reindex($assoc,'equip_id');
	$allEquipment=reindex($allEquipment,'name');
	$equip_avl=json_encode($assoc);
	$equip_all=json_encode($allEquipment);
	$equip_names=array_keys($allEquipment);
	$equip_names=json_encode($equip_names);
	
	//disconnect from database
	$conn = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

include 'equipment_list_page.php';
?>


