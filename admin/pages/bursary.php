<h3 style="color: blue;">Admin->Bursary_Result</h3>
<div class="table-responsive">
<table class="table table-striped table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>Id</th>
		<th>Name of Student</th>
		<th>Transaction id</th>
		<th>Date</th>
	</tr>
</thead>
<tbody>
	<tr>
<?php
$fetch = $conn->query("SELECT * FROM payment");
$result = $fetch->fetchAll(PDO::FETCH_OBJ);
$count = $fetch->rowCount();
if ($count > 0) {
foreach ($result as $key) {
	$id = $key->id;
	$trans = $key->trans_id;
	$by = $key->payment_by;
	$date = $key->date;

$fetch = $conn->query("SELECT * FROM students WHERE id = $by");
$result = $fetch->fetchAll(PDO::FETCH_OBJ);
$count = $fetch->rowCount();
if ($count > 0) {
	foreach ($result as $value) {
		$sname = $value->sname;
		$fname = $value->fname;
		$mname = $value->mname;

		$comb = "$sname $fname $mname";
}
}
?>


	
		<td><?php echo "$id"; ?></td>
		<td> <?php echo "$comb"; ?></td>
		<td><?php echo "$trans"; ?></td>
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