<?php
	session_start();
	if(isset($_SESSION['notification'])){
		$notification = $_SESSION['notification'];
	}

	include_once("./inc/db.php");
	include_once("./inc/conn.php");
	include_once("./inc/functions.php");

	if(isset($_SESSION['alumni_logged'])){
		header("Location: $base_url/profile.php");
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
		<title>Alumni SignUp</title>
		<base href="http://localhost/nacess/alumni"></base>

		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/body.css">

		<script src="<?php echo $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include_once("./inc/header.php"); ?>
		<!-- START MAIN CONTAINER-->
	







	
	</body>
</html>
<?php  
	unset($_SESSION['notification']);
?>