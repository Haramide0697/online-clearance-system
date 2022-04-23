<h3 style="color: blue;">Admin->All_Students</h3>
<?php
if (isset($_POST['submit'])) {
    $iden = $_POST['iden'];
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $matric = $_POST['matric'];
    $course = $_POST['course'];
    $sex = $_POST['sex'];
    $dept = $_POST['dept'];
    $date = date('D M, Y. H:i:s');

    $in = array('sname' => $sname,
                'fname' => $fname,
                'mname' => $mname,
                'matric' => $matric,
                'dept' => $course,
                'sex' => $sex,
                'faculty' => $dept,

    );

    if (empty($sname) || empty($fname) || empty($mname) || empty($matric) || empty($course) || empty($sex) || empty($dept)) {
        $msg = "Fill all empty fields";
    }else{
        update('students',$in,'id',$iden);
        
        echo "<script> alert('Your Edit Was Successfull');</script>";
    }
}
?>

   <script>
   /* $ (window).on('load',function(){
    $("#myModal").modal('show');
});*/
                function del(iden,action){
    var dataString = "id="+iden+"&action="+action;
    var status = $("#status").val();
    var identity = $('#loading')+iden;
    var confirms = confirm("clicking this will remove this student and all the records completely, are you sure you want to continue?");
    if (confirms == true) {
    $.ajax({
        type: "POST",
        url: "control.php",
        cache : false,
        data : dataString,
        beforeSend : function(){
            $('#del'+iden).hide();
            $('#loading'+iden).show();
        },
        success : function(response){
            $('#loading'+iden).hide();
            alert(response);
            window.location.reload(1);
        }
    });
}
}
                </script>


<div class="table-responsive">
<table class="table table-striped table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>Id</th>
        <th>Surname</th>
        <th>First Name</th>
		<th>Middle Name</th>
        <th>Matric Number</th>
		<th>Department</th>
		<th>Sex</th>
		<th>Faculty</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	<tr>
<?php
$fetch = $conn->query("SELECT * FROM students");
$result = $fetch->fetchAll(PDO::FETCH_OBJ);
$count = $fetch->rowCount();
if ($count > 0) {
foreach ($result as $key) {
	$id = $key->id;
    $sname = $key->sname;
    $fname = $key->fname;
	$mname = $key->mname;
    $matric = $key->matric;
	$course = $key->dept;
	$sex = $key->sex;
	$dept = $key->faculty;
	$date = $key->date;
?>


	
		<td><?php echo "$id"; ?></td>
        <td><?php echo "$sname"; ?></td>
        <td><?php echo "$fname"; ?></td>
		<td><?php echo "$mname"; ?></td>
        <td><?php echo "$matric"; ?></td>
		<td><?php echo "$course"; ?></td>
		<td><?php echo "$sex"; ?></td>
		<td><?php echo "$dept"; ?></td>
		<td><?php echo "$date"; ?></td>
		<td><a style="cursor:pointer" onclick= "del('<?php echo $id ?>', 'deleteuser')" title="Remove this student" id="del<?php echo $id?>"><i class="glyphicon glyphicon-trash"></i></a>  <span id="loading<?php echo $id ?>" style="display:none"><img src="<?php echo $base_url; ?>/assets/img/loading.gif"></span> 

		<a data-toggle="modal" data-target="#edit1<?php echo "$id" ?>" title="Edit"><i class="fa fa-edit"></i></a> </td>
			

            <div class="modal fade" id="edit1<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header" style="background: #003399;">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                     <h4 class="modal-title" id="myModalLabel" style="color: white;"><i class="fa fa-edit"></i> Confirm Edit for <?php echo "$sname $fname $mname"; ?> </h4>
                     </div>
                     <div class="modal-body">
                            <p>Are you sure you want to edit details?</p>
                    <button class="btn btn-success" data-toggle="modal" data-dismiss="modal" data-target="#edit<?php echo "$id" ?>">Yes</button>
                    <button class="btn btn-danger" data-dismiss="modal">No</button>
                     </div>
                     </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>

			<div class="modal fade" id="edit<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		              <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header" style="background: #003399;">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                     <h4 class="modal-title" id="myModalLabel" style="color: white;"><i class="fa fa-edit"></i> Edit details for for <?php echo "$sname $fname $mname"; ?> </h4>
                     </div>
                     <div class="modal-body">

<form method="post"> 
    <input type="text" name="iden" style="display: none" value="<?php echo"$id" ?>" readonly>
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="sname" >Surname</label>
        <input type="text" value="<?php echo"$sname" ?>" name="sname" class="form-control" id="sname" placeholder="<?php echo"$sname" ?>">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="fname" >First Name</label>
        <input type="text" value="<?php echo"$fname" ?>" name="fname" class="form-control" id="fname" placeholder="<?php echo"$fname" ?>">
    </div>
    </div>
        <div class="col-md-4">
    <div class="form-group">
        <label for="mname" >Middle Name</label>
        <input type="text" value="<?php echo"$mname" ?>" name="mname" class="form-control" id="mname" placeholder="<?php echo"$mname" ?>">
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="matric" >Matric  Number</label>
        <input type="text" value="<?php echo"$matric" ?>" name="matric" class="form-control" id="matric" placeholder="<?php echo"$matric" ?>">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="course" >Department</label>
        <input type="text" value="<?php echo"$course" ?>" name="course" class="form-control" id="course" placeholder="<?php echo"$course" ?>">
    </div>
    </div>  
    <div class="col-md-6">
    <div class="form-group">
        <label for="sex" >Sex</label>
        <select class="form-control" name="sex" id="sex">
            <option value="<?php echo"$sex" ?>"><?php echo"$sex" ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="dept" >Faculty</label>
        <input type="text" value="<?php echo"$dept" ?>" name="dept" class="form-control" id="dept" placeholder="Department">
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
</tr>
</tbody>
<?php
}
}else{
	?>
	No Data Yet
	<?php
}

?>
	
</table>
</div>