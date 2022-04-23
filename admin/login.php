<?php
	session_start();
	if(isset($_SESSION['id'])){
		$identity = $_SESSION['id'];
	}

	include_once("../inc/db.php");
	include_once("../inc/conn.php");
	include_once("../inc/functions.php");
	include_once("../inc/connection.php");


	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$password = sha1(md5($pass));

		if (empty($user) || empty($pass)) {
			$msg = "Please fill all empty fields";
		}else{
		$select = $conn->query("SELECT * FROM admin WHERE username = '$user' AND password = '$password'");
        $fetch = $select->fetchAll(PDO::FETCH_OBJ);
        $row = $select->rowCount();
        if ($row > 0) {
        foreach ($fetch as $key) {
                $id = $key->id;

                $_SESSION['id'] = $id;

                redirect('main.php');
              
        }
        }else{
        	$msg = "Incorrect login details";
        }
		}
	}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
		<title>Online Clearance System | Admin</title>
		<base href="http://localhost/nacess/alumni/"></base>	

		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/body.css">

		<script src="<?php echo $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include_once("../inc/header.php"); ?>
		<!-- START MAIN CONTAINER-->
		<div class="container-fluid main-container reg">

			<!-- START CONTENT WRAPPER -->
			<div class="row-fluid top">

				<div class="col-md-12 two">
					<div class="col-md-2">
					</div>
					
					<form class="col-md-8" method="POST">
						
						<div class="form-group col-md-12">
							<p style="text-align:center; margin-top:10px;">ONLINE CLEARANCE SYSTEM | ADMIN</p>
						</div>


						<div class="col-md-12">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
							<?php if(isset($msg)){
								?>
								<div class="alert alert-warning">
									<?php
								echo $msg; ?>
								</div>
								<?php
								} ?>
							</div>
							<div class="col-md-3">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
							</div>
							<div class="form-group col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										USERNAME
									</span>
									<input type="text" class="form-control" name="user">
								</div>
							</div>
							<div class="col-md-3">
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-3">
							</div>
							<div class="form-group col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										PASSWORD
									</span>
									<input type="password" class="form-control" name="password">
								</div>
							</div>
						</div>
						

						<div class="col-md-12">
							<div class="col-md-3">
							</div>
							<div class="form-group col-md-6">
								<input type="submit" class="form-control" value="SUBMIT" name="login">
							</div>
						</div>				
						
					</form>
					<div class="col-md-2">
					</div>
				</div>
				
			</div>
		
			<!-- END CONTENT WRAPPER -->

		</div>
		<!-- END MAIN CONTAINER-->
		<!-- START FOOTER WRAPPER -->
		<div class="container-fluid footer-wrapper">		
			<div class="col-sm-12 col-md-12 col-xs-12">
                <center>  &copy; 2018. All Rights Reserved Online Clearance System. Project by Usher Supervised by Mr/Mrs........ </center>            
            </div>
			
		</div>

		<!-- END FOOTER WRAPPER -->

	</body>
</html>
<?php  
	unset($_SESSION['notification']);
?>