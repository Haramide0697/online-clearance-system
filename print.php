<?php
	session_start();
	if(isset($_SESSION['id'])){
		$identity = $_SESSION['id'];
		$nos = $_SESSION['nos'];
		$matric = $_SESSION['matric'];
		$sex = $_SESSION['sex'];
		$dept = $_SESSION['dept'];
	}

	include_once("./inc/db.php");
	include_once("./inc/conn.php");
	include_once("./inc/functions.php");
	include_once("./inc/connection.php");


	if (!isset($_SESSION['id'])) {
	redirect('index.php');
}



	

	

	if(isset($_SESSION['alumni_logged'])){
		header("Location: $base_url/profile.php");
		exit();
	}

$passport = $_GET['passport'];
$id = $_GET['id'];
$name = $_GET['name'];
$matric = $_GET['matric'];
$date = $_GET['date'];
$sex = $_GET['sex'];

if ($sex == "male") {
	$use = "his";
}elseif ($sex == "female") {
	$use = "her";
}

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
		<title>Students Clearance</title>

		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/body.css">

		<script src="<?php echo $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- START MAIN CONTAINER-->
	<div class="container" style="border: 1px solid black">
		<div class="col-md-8 col-md-offset-2">
		<div class="row" style="margin-top: 5%;">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<img src="assets/img/Capture.jpg" width="120px" height="120px">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 ">
				<img src="uploads/<?php echo $passport; ?>" width="120px" height="120px" class="pull-right">
			</div>
		</div>
		<h3>This is to certify that <?php echo "$name"; ?> with the matric number <?php echo "$matric"; ?> completed <?php echo "$use"; ?> clearance on <?php echo "$date"; ?>.</h3>
		<div class="row" style="margin-top: 7%">
			<div class="col-md-6 col-sm-6 col-xs-6">
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 ">
				<br><br><br><br>
				<p class="pull-right">Signature..................................</p>
			</div>
		</div>
</div>
	</body>
</html>
<script type="text/javascript">
	window.onload = def();

	function def(){
		document.getElementById('print').hidden = false;
		document.getElementById('back').hidden = false;
	}

	function hid(){
		document.getElementById('print').hidden = true;
		document.getElementById('back').hidden = true;
		window.location.reload(1);
	}

</script>
<?php  
	unset($_SESSION['notification']);
?>