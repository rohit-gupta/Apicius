<?php session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include 'dbconnect.php';
include 'utilities.php';

try{
	$conn=connect_db();
	//query version
	$query="SELECT * FROM users WHERE email = '".$_POST['email']."'";
	$res=$conn->query($query);
	$assoc=$res->fetchAll();
	trim_result($assoc);
	if(!isset($assoc[0])) 
	{
		echo 'Wrong emailID. Please retry';	
		echo '<a href="login.html">login.html</a>';
		exit();
	}
	if($assoc[0]['password_hash']==sha1($_POST['password']))
	{
		$_SESSION['user_id']=$assoc[0]['user_id'];
		header("location:index.php");
	}
	else{
		echo 'Wrong Password. please retry';	
		echo '<a href="login.html">login.html</a>';
	}
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>
