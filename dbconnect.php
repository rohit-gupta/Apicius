<?php
function connect_db()
{
	$dbname='<DATABASE>';
	$host='<HOST>';
	$username='<USER>';
	$password='<PASSWORD>';
	
	try {
		$conn = new PDO("pgsql:host=".$host.";dbname=".$dbname, $username, $password );
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	return $conn;
}
?>
