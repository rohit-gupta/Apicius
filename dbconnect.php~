<?php
function connect_db()
{
	$dbname='testProject2';
	$host='localhost';
	$username='grohit';
	$password='angmar';
	
	try {
		$conn = new PDO("pgsql:host=".$host.";dbname=".$dbname, $username, $password );
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	return $conn;
}
?>
