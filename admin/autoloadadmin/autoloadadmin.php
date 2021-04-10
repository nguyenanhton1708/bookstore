<?php 
	session_start();
	require('../libraries/Database.php');
	// require('../../../libraries/Database.php');
	require('../libraries/Function.php');
	// require('../../../libraries/Function.php');
	$db = new Database ;

	if( !isset($_SESSION['admin_id']))
	{
		header("location: /login");
	}

	define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."public/uploads/");
	$sql = "select * from product where number  > 0";
	$tonkho = $db->fetchsql($sql);
 ?>