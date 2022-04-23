<h3 style="color: blue;">Admin->Final Clerance Result</h3>
<div class="table-responsive">
<table class="table table-striped table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>Id</th>
		<th>Passport</th>
		<th>Name of Student</th>
		<th>Matric Number</th>
		<th>Sex</th>
		<th>Department</th>
		<th>Faculty</th>
		<th>Burasry Acc Id</th>
		<th>Hostel</th>
		<th>Sport</th>
		<th>Library</th>
		<th>VSESC</th>
		<th>Department</th>
		<th>Date</th>
	</tr>
</thead>
<tbody>
	<tr>
<?php
$fetch = $conn->query("SELECT * FROM clear WHERE passport != '' ");
$result = $fetch->fetchAll(PDO::FETCH_OBJ);
$count = $fetch->rowCount();
if ($count > 0) {
foreach ($result as $key) {
	$id = $key->id;
	$nos1 = $key->sname;
	$nos2 = $key->fname;
	$nos3 = $key->mname;
	$nos11 = "$nos1 $nos2 $nos3";
	$matric = $key->matric;
	$sex = $key->sex;
	$dept = $key->dept;
	$date = $key->date;
	$course = $key->faculty;
	$hostel = $key->hostel;
	$library = $key->library;
	$sport = $key->sport;
	$vesc = $key->vesc;
	$department = $key->department;
	$passport = $key->passport;
	$bac = $key->bac;
?>


	
		<td><?php echo "$id"; ?></td>
		<td><img src="../uploads/<?php echo "$passport"; ?>" height ="50px" width="50px"></td>
		<td><?php echo "$nos11"; ?></td>
		<td><?php echo "$matric"; ?></td>
		<td><?php echo "$sex"; ?></td>
		<td><?php echo "$dept"; ?></td>
		<td><?php echo "$course"; ?></td>
		<td><?php echo "$bac"; ?></td>
		<td><img src="../uploads/hostel/<?php echo "$hostel"; ?>" height ="50px" width="50px"></td>
		<td><?php echo "$sport"; ?></td>
		<td><img src="../uploads/library/<?php echo "$library"; ?>" height ="50px" width="50px"></td>
		<td><img src="../uploads/vsesc/<?php echo "$vesc"; ?>" height ="50px" width="50px"></td>
		<td><img src="../uploads/department/<?php echo "$department"; ?>" height ="50px" width="50px"></td>
		<td><?php echo "$date"; ?></td>
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