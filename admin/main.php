<?php
	session_start();
	if(isset($_SESSION['id'])){
		$identity = $_SESSION['id'];
	}

	include_once("../inc/db.php");
	include_once("../inc/conn.php");
	include_once("../inc/functions.php");
	include_once("../inc/connection.php");

	if (!isset($_SESSION['id'])) {
	redirect('index.php');
}



?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
		<title>Admin</title>

		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/body.css">

		<script src="<?php echo $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include_once("../inc/header.php"); ?>
		<!-- START MAIN CONTAINER-->
	<div class="container">
		<div class="row" style="margin-top: 5%;">
			<div class="col-md-2">
				<a href="?mod=student&link=reg" class="btn btn-info btn-block">Register a new student</a>
				<a href="?mod=student&link=view" class="btn btn-info btn-block">View all students</a>
				<a href="?mod=clearance&link=final" class="btn btn-info btn-block">Final Clearance Result</a>
				<a href="?mod=clearance&link=bursary" class="btn btn-info btn-block">Bursary Clearance Result</a>
				<a href="logout.php" class="btn btn-danger btn-block">Logout</a>
			</div>
			<div class="col-md-10">
				<?php
				if (isset($_GET['mod']) && $_GET['mod'] == "student" && isset($_GET['link']) && $_GET['link'] == "reg") {
					include('pages/reg.php');
				}elseif (isset($_GET['mod']) && $_GET['mod'] == "student" && isset($_GET['link']) && $_GET['link'] == "view") {
					include('pages/view.php');
				}elseif (isset($_GET['mod']) && $_GET['mod'] == "clearance" && isset($_GET['link']) && $_GET['link'] == "final") {
					include('pages/final.php');
				}elseif (isset($_GET['mod']) && $_GET['mod'] == "clearance" && isset($_GET['link']) && $_GET['link'] == "bursary") {
					include('pages/bursary.php');
				}else{
					include('pages/reg.php');
				}


				?>
			</div>
		</div>
	</div>
	</body>
</html>
<?php  
	unset($_SESSION['notification']);
?>