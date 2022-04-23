<h3 style="color: blue;">Admin->Register_New</h3>
<?php
if (isset($_POST['submit'])) {
	$sname = $_POST['sname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$matric = $_POST['matric'];
	$course = $_POST['course'];
	$sex = $_POST['sex'];
	$dept = $_POST['dept'];
	$date = date('D M, Y. H:i:s');
	$hash = sha1(md5($matric));

	$in = array('sname' => $sname,
				'fname' => $fname,
				'mname' => $mname,
				'matric' => $matric,
				'dept' => $course,
				'sex' => $sex,
				'faculty' => $dept,
				'password' => $hash,
				'date' => $date 

	);

	if (empty($sname) || empty($fname) || empty($mname) || empty($matric) || empty($course) || empty($sex) || empty($dept)) {
		$msg = "Fill all empty fields";
	}else{
		create('students',$in);
		redirect('?mod=student&link=reg&sus=sus');
	}
}
?>

<form method="post"> 
	<?php
	if (isset($msg)) {
	?>
	<div class="alert alert-warning">
		<?php echo "$msg"; ?>
	</div>
	<?php
	}elseif (isset($_GET['sus']) && $_GET['sus'] == "sus") {
	?>
	<div class="alert alert-success">
		You have successfully registered a new student
	</div>
	<?php
	}
	?>
	<div class="row">
	<div class="col-md-4">
	<div class="form-group">
		<label for="sname" >Surname</label>
		<input type="text" name="sname" class="form-control" id="sname" placeholder="Surname">
	</div>
	</div>
	<div class="col-md-4">
	<div class="form-group">
		<label for="fname" >First Name</label>
		<input type="text" name="fname" class="form-control" id="fname" placeholder="First&nbsp;Name">
	</div>
	</div>
		<div class="col-md-4">
	<div class="form-group">
		<label for="mname" >Middle Name</label>
		<input type="text" name="mname" class="form-control" id="mname" placeholder="Middle&nbsp;Name">
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div class="form-group">
		<label for="matric" >Matric  Number</label>
		<input type="text" name="matric" class="form-control" id="matric" placeholder="Matric&nbsp;Number">
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label for="course" >Department</label>
		<input type="text" name="course" class="form-control" id="course" placeholder="Department">
	</div>
	</div>	
	<div class="col-md-6">
	<div class="form-group">
		<label for="sex" >Sex</label>
		<select class="form-control" name="sex" id="sex">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label for="dept" >Faculty</label>
		<input type="text" name="dept" class="form-control" id="dept" placeholder="Faculty">
	</div>
	</div>
	</div>
	<button class="btn btn-success" name="submit" type="submit">Submit</button>
	<button class="btn btn-default" type="reset">Reset</button>
</form>