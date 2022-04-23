<?php
	session_start();
	if(isset($_SESSION['notification'])){
		$notification = $_SESSION['notification'];
	}

	include_once("./inc/db.php");
	include_once("./inc/conn.php");
	include_once("./inc/functions.php");
	include_once("./inc/connection.php");

	if(isset($_SESSION['alumni_logged'])){
		header("Location: $base_url/profile.php");
		exit();
	}


		if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$hash = sha1(md5($pass));

		if (empty($user) || empty($pass)) {
			$msg = "Please fill all empty fields";
		}else{
		$select = $conn->query("SELECT * FROM students WHERE matric = '$user' AND password = '$hash'");
        $fetch = $select->fetchAll(PDO::FETCH_OBJ);
        $row = $select->rowCount();
        if ($row > 0) {
        foreach ($fetch as $key) {
                $id = $key->id;
                $nos = $key->nos;
                $matric = $key->matric;
                $sex = $key->sex;
                $dept = $key->dept;

                $_SESSION['id'] = $id;
                $_SESSION['nos'] = $nos;
                $_SESSION['matric'] = $matric;
                $_SESSION['sex'] = $sex;
                $_SESSION['dept'] = $dept;

                redirect('main.php');
              
        }
        }else{
        	$msg = "Incorrect login details";
        }
		}
	}

	if (isset($_POST['cpassword'])) {
		$sname = $_POST['sname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$matric = $_POST['matric'];
		$cp = $_POST['cp'];
		$np = $_POST['np'];
		$cnp = $_POST['cnp'];
		$hash1 = sha1(md5($cp));
		$hash = sha1(md5($np));
		$ps = "2014070501195";
		$pps = sha1(md5($ps));

		$in = array('password' => $hash, );

		if (empty($sname) || empty($fname) || empty($mname) || empty($matric) || empty($cp) || empty($np) || empty($cnp)) {
			echo "<script> alert('please fill all empty fields') </script>";
		}elseif ($np !== $cnp) {
			echo "<script> alert('password does not match') </script>";
		}else{
		$find = $conn->query("SELECT * FROM students WHERE sname = '$sname' AND fname = '$fname' AND mname = '$mname' AND matric = '$matric'");
		$fetch = $find->fetchAll(PDO::FETCH_OBJ);
		$count = $find->rowCount();
		if ($count > 0) {
		foreach ($fetch as $value) {
			$id = $value->id;
			$password = $value->password;

			if ($hash1 == $password) {
				update('students',$in,'id',$id);
				echo "<script> alert('Password changed') </script>";
			}else{
				echo "<script> alert('Current password is not correct') </script>";
			}
		}
		}
		}
	}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
		<title>Online Clearance System | Student</title>
		<base href="http://localhost/nacess/alumni/"></base>	

		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/body.css">

		<script src="<?php echo $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include_once("./inc/header.php"); ?>
		<!-- START MAIN CONTAINER-->
		<div class="container-fluid main-container reg">

			<!-- START CONTENT WRAPPER -->
			<div class="row-fluid top">

				<div class="col-md-12 two">
					<div class="col-md-2">
					</div>
					
					<form class="col-md-8" method="POST">
						
						<div class="form-group col-md-12">
							<p style="text-align:center; margin-top:10px;">ONLINE CLEARANCE SYSTEM | STUDENT</p>
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
									<label for="user" class="input-group-addon">
										USERNAME
									</label>
									<input type="text" class="form-control" name="user" id="user" placeholder="User&nbsp;Name">
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
									<label for="password" class="input-group-addon">
										PASSWORD
									</label>
									<input type="password" id="password" class="form-control" placeholder="******" name="password">
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
						<div class="col-md-12">
							<div class="col-md-3">
							</div>
							<div class="form-group col-md-6">
								<a data-toggle="modal" data-target="#cpassword">Change password here</a>
							</div>
						</div>				
				<div class="modal fade" id="cpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header" style="background: #003399;">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                     <h4 class="modal-title" id="myModalLabel" style="color: white;">Please Provide All Informations Below </h4>
                     </div>
                     <div class="modal-body">
                      <form method="post">
                      	<div class="row">
                      	<div class="col-md-4">
                      	<div class="form-group">
                      		<label for="sname">Surname</label>
                      		<input type="text" name="sname" class="form-control" id="sname" placeholder="Surname">
                      	</div>
                      </div>
                      	<div class="col-md-4">
                      	<div class="form-group">
                      		<label for="fname">First Name</label>
                      		<input type="text" name="fname" class="form-control" id="fname" placeholder="First&nbsp;Name">
                      	</div>
                      </div>
                      <div class="col-md-4">
                      	<div class="form-group">
                      		<label for="mname">Middle Name</label>
                      		<input type="text" name="mname" class="form-control" id="mname" placeholder="Middle&nbsp;Name">
                      	</div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      		<label for="matric">Matric Number</label>
                      		<input type="text" name="matric" class="form-control" id="matric" placeholder="Matric&nbsp;Number">
                      	</div>
                      </div>
                      <div class="col-md-6">
                      	<div class="form-group">
                      		<label for="cp">Current Password</label>
                      		<input type="text" name="cp" class="form-control" id="cp" placeholder="******">
                      	</div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      		<label for="np">New Password</label>
                      		<input type="text" name="np" class="form-control" id="np" placeholder="******">
                      	</div>
                      </div>
                      <div class="col-md-6">
                      	<div class="form-group">
                      		<label for="cnp">Confirm Password</label>
                      		<input type="text" name="cnp" class="form-control" id="cnp" placeholder="******">
                      	</div>
                      </div>
                  </div>
						<button class="btn btn-success" type="submit" name="cpassword">Change</button>
                      </form>
                    
                     </div>
                     </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
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
		<?php include_once('inc/footer.php') ?>
		<!-- END FOOTER WRAPPER -->

	</body>
</html>
<?php  
	unset($_SESSION['notification']);
?>