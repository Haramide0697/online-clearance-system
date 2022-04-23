
<script type="text/javascript">
    function pro(id,sname,fname,mname,matric,course,sex,dept,action)
    {
        var che = document.getElementById('accept').checked;

        if (che == true) {
    var dataString = "id="+id+"&sname="+sname+"&fname="+fname+"&mname="+mname+"&matric="+matric+"&course="+course+"&sex="+sex+"&dept="+dept+"&action="+action;
    var status = $("#status").val();
    var identity = $('#loading')+id;
    $.ajax({
        type: "POST",
        url: "control.php",
        cache : false,
        data : dataString,
        beforeSend : function(){
            $('#adding').hide();
            $('#loading'+id).show();
        },
        success : function(response){
            $('#loading'+id).hide();
            alert(response);
            window.location.reload(1);
        }
    });
        }else{
            alert("Please Accept The Condition First");
        }

        
    }


</script>

<?php
    if (isset($_POST['submit'])) {
        $iden = $_POST['iden'];
        $sname = $_POST['sname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $matric = $_POST['matric'];
        $dept = $_POST['dept'];
        $course = $_POST['course'];
        $sex = $_POST['sex'];

        $in = array('sname' => $sname,
                    'fname' => $fname, 
                    'mname' => $mname, 
                    'matric' => $matric, 
                    'dept' => $course, 
                    'sex' => $sex, 
                    'faculty' => $dept
        );

        if (empty($sname) || empty($fname) || empty($mname) || empty($matric) || empty($dept) || empty($course)) {
            $msg = "Please fill all empty fields";
        }else{
            (update('students',$in,'id',$iden));

            redirect('?mod=clearance&link=final');
        }

}

?>
        <!-- START MAIN CONTAINER-->

<?php
$query2 = $conn->query("SELECT * FROM students WHERE id = $identity");

    $fetch2 = $query2->fetchAll(PDO::FETCH_OBJ);
    $count2 = $query2->rowCount();
    if ($count2 > 0) {
        foreach ($fetch2 as $key2) {


        $sname1 = $key2->sname;
        $fname1 = $key2->fname;
        $mname1 = $key2->mname;
        $matric1 = $key2->matric;
        $course1 = $key2->dept;
        $sex1 = $key2->sex;
        $dept1 = $key2->faculty;
        $date1 = $key2->date;
        }
}   
?>

		<?php
		if (isset($msg)) {
		?>
		<div class="alert alert-warning">
			<p><?php echo "$msg"; ?></p>
		</div>
		<?php
		}elseif (isset($_GET['suc']) && $_GET['suc'] == "suc") {
		?>
		<div class="alert alert-success">
			<p>Your Operation Was Successful</p>
		</div>
		<?php
		}
		?>
		<div class="col-md-10">
        <div class="progress progress-striped active">
         <div class="progress-bar progress-bar-info" role="progressbar"
         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
         style="width: 10%;">10% Complete
         </div>
        </div>
		<h2>Please check these details properly</h2><hr>
		<div style="text-transform: uppercase;">
		<div class="row">
		<div class="col-md-4">
		Surname: <b><?php echo "$sname1"; ?></b>
		</div>
		<div class="col-md-4">
		First Name: <b><?php echo "$fname1"; ?></b>
		</div>
		<div class="col-md-4">
		Middle Name: <b><?php echo "$mname1"; ?></b>
		</div>
		</div>
		<div class="row">
		<div class="col-md-4">
		Matric No: <b><?php echo "$matric1"; ?></b>
		</div>
		<div class="col-md-4">
		Course: <b><?php echo "$course1"; ?></b>
		</div>
		<div class="col-md-4">
		Sex: <b><?php echo "$sex1"; ?></b>
		</div>
		<div class="col-md-4">
		Department: <b><?php echo "$dept1"; ?></b>
		</div>
		</div>
		</div>
			<hr>
			<p><input type="checkbox" name="accept" id="accept" value="on"> I, <?php echo "$sname1 $fname1 $mname1"; ?> is satisfied with the information provided by the admin</p>


			<a id="adding" onclick="pro('<?php echo $identity ?>','<?php echo $sname1 ?>','<?php echo $fname1 ?>','<?php echo $mname1 ?>','<?php echo $matric ?>','<?php echo $course1 ?>','<?php echo $sex1 ?>','<?php echo $dept1 ?>','add');" ><button class="btn btn-success" >Continue</button></a><span id="loading<?php echo $identity ?>" style="display:none"><img src="<?php echo $base_url; ?>/assets/img/loading.gif"></span>
			<button class="btn btn-danger" data-toggle="modal" data-target="#edit<?php echo "$identity" ?>">Adjust Info</button><hr>


						<div class="modal fade" id="edit<?php echo "$identity" ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		              <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header" style="background: #003399;">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                     <h4 class="modal-title" id="myModalLabel" style="color: white;"><i class="fa fa-edit"></i> Edit details for for <?php echo "$sname1 $fname1 $mname1"; ?> </h4>
                     </div>
                     <div class="modal-body">
                     	<form method="post"> 
    <input type="text" name="iden" style="display: none" value="<?php echo"$identity" ?>" readonly>
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="sname" >Surname</label>
        <input type="text" value="<?php echo"$sname1" ?>" name="sname" class="form-control" id="sname" placeholder="<?php echo"$sname1" ?>">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="fname" >First Name</label>
        <input type="text" value="<?php echo"$fname1" ?>" name="fname" class="form-control" id="fname" placeholder="<?php echo"$fname1" ?>">
    </div>
    </div>
        <div class="col-md-4">
    <div class="form-group">
        <label for="mname" >Middle Name</label>
        <input type="text" value="<?php echo"$mname1" ?>" name="mname" class="form-control" id="mname" placeholder="<?php echo"$mname1" ?>">
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="matric" >Matric  Number</label>
        <input type="text" value="<?php echo"$matric1" ?>" name="matric" class="form-control" id="matric" placeholder="<?php echo"$matric1" ?>">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="course" >Course</label>
        <input type="text" value="<?php echo"$course1" ?>" name="course" class="form-control" id="course" placeholder="<?php echo"$course1" ?>">
    </div>
    </div>  
    <div class="col-md-6">
    <div class="form-group">
        <label for="sex" >Sex</label>
        <select class="form-control" name="sex" id="sex">
            <option value="<?php echo"$sex1" ?>"><?php echo"$sex1" ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="dept" >Department</label>
        <input type="text" value="<?php echo"$dept1" ?>" name="dept" class="form-control" id="dept" placeholder="Department">
    </div>
    </div>
    </div>
    <button class="btn btn-success" name="submit" type="submit">Submit</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>
            		 </div>
                     </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>

</div>
