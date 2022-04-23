<h3 style="color: blue;">Student_Clearance->Bursary_Report</h3>
<?php
$query = $conn->query("SELECT * FROM students WHERE id = $identity");
$fetch = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($fetch as $value) {
	$sname = $value->sname;
	$fname = $value->fname;
	$mname = $value->mname;
}
$query2 = $conn->query("SELECT * FROM payment WHERE payment_by = $identity");
$fetch2 = $query2->fetchAll(PDO::FETCH_OBJ);
$count2 = $query2->rowCount();
if ($count2 > 0) {
foreach ($fetch2 as $key) {
	$trans_id = $key->trans_id;
	$date = $key->date;
}
?>
<h2>Dear <?php echo "$sname $fname $mname"; ?>, you have successfully  completed the bursary clearance by paying the sum of <strike>N</strike>5000 with the Transaction id: <b> <?php echo "$trans_id"; ?> </b> on <?php echo "$date"; ?>. Please copy the transaction id and use it for your further clearance</h2>

		
<?php
}else{
?>

<?php redirect('./webpay') ?>

<?php
}

?>