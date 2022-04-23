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
        $dept1 = $key2->dept;
        $date1 = $key2->date;
        }
}   
?>
<div class="col-md-10">
<div class="progress progress-striped active">
 <div class="progress-bar progress-bar-info" role="progressbar"
 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
 style="width: 100%;">100% Complete
 </div>
</div>
<h2>Congratulations <?php echo "$sname1 $fname1 $mname1"; ?>, you have completed your clearance, <a href="print.php?name=<?php echo "$sname1 $fname1 $mname1"; ?>&matric=<?php echo "$matric1"; ?>&id=<?php echo "$identity"; ?>&date=<?php echo "$date"; ?>&sex=<?php echo "$sex"; ?>&passport=<?php echo "$passport"; ?>">click here</a> to print your slip</h2>
</div>