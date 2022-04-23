<?php 
    session_start();
    if(isset($_SESSION['notification'])){
        $notification = $_SESSION['notification'];
    }
    include_once("../inc/db.php");
    include_once("../inc/conn.php");
    include_once("../inc/functions.php");

    //create database object
    $db = new db();

    //connect to database
    if($sql = $db->connectDB($connStr,$user,$pass)){
        if (is_string($sql)) {
            echo $sql;
        }
        
    }

    

   ?>

<div class="row top-header">
			<div class="col-md-5 logos">
				<img src="<?php echo $base_url; ?>/assets/img/logos.jpg">
			</div>
			
				
					
			</div>
		</div>