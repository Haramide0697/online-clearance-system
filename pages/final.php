			<div class="container">
		<div class="col-md-10">
		<h1 style="text-align: center; color: red">GRADUATING STUDENT'S FINAL CLEARANCE</h1><hr>
		</div>
		<div>
			<?php
			$query2 = $conn->query("SELECT * FROM payment WHERE payment_by = $identity");
			$fetch2 = $query2->fetchAll(PDO::FETCH_OBJ);
			$count2 = $query2->rowCount();
			if ($count2 > 0) {
				$u = "yes";
			}else{
				$u = "no";
			}
			$fetch = $conn->query("SELECT * FROM clear WHERE for_id = $identity");
			$result = $fetch->fetchAll(PDO::FETCH_OBJ);
			$count = $fetch->rowCount();
			if ($count > 0){
			foreach ($result as $key ) {
				$bac = $key->bac;
				$hostel = $key->hostel;
				$sport = $key->sport;
				$library = $key->library;
				$vesc = $key->vesc;
				$department = $key->department;
				$passport = $key->passport;
				$date = $key->date;
			}
			if ($u == "no") {
				redirect('./webpay');
			}elseif (empty($bac)) {
				include('pages/cfill.php');
			}elseif (empty($hostel)) {
				include('pages/swp.php');
			}elseif (empty($sport)) {
				include('pages/sport.php');
			}elseif (empty($library)) {
				include('pages/library.php');
			}elseif (empty($vesc)) {
				include('pages/vesc.php');
			}elseif (empty($department)) {
				include('pages/department.php');
			}elseif (empty($passport)) {
				include('pages/pass.php');
			}else{
				include('pages/finish.php');
			}
		}else{
			?>
			<?php include('pages/cper.php'); ?>
		<?php
			}
		?>
		</div><hr>
		</div>
		<small><b>CLEARANCE SIGNING MUST BE COMPLETED AND SUBMITTED BEFORE CERTIFICATE/PERSONAL TRANSCRIPT CAN BE ISSUED</b></small>