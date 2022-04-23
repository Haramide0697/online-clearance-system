<?php
	include_once("../inc/db.php");
	include_once("../inc/conn.php");
	include_once("../inc/functions.php");
	include_once("../inc/connection.php");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'){
	if(isset($_POST['action']) && $_POST['action'] == 'deleteuser'){
		$id = $_POST['id'];

		$fetch = $conn->query("SELECT * FROM clear WHERE for_id = $id");
		$fetch2 = $conn->query("SELECT * FROM payment WHERE payment_by = $id");
		$count = $fetch->rowCount();
		$count2 = $fetch2->rowCount();
		if ($count2 > 0) {
		 	$conn->query("DELETE FROM payment WHERE payment_by = $id");
		 }

		if ($count > 0) {
		 	$conn->query("DELETE FROM clear WHERE for_id = $id");
		 } 
		
		$conn->query("DELETE FROM students WHERE id = $id");

		echo "Student Removed";
		
		
		
	}
	}

?>