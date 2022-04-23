<?php
	include_once("./inc/db.php");
	include_once("./inc/conn.php");
	include_once("./inc/functions.php");
	include_once("./inc/connection.php");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'){
	if(isset($_POST['action']) && $_POST['action'] == 'add'){
		$id = $_POST['id'];
		$sname = $_POST['sname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$matric = $_POST['matric'];
		$course = $_POST['course'];
		$sex = $_POST['sex'];
		$dept = $_POST['dept'];

		$in = array('for_id' => $id,
					'sname' => $sname, 
					'fname' => $fname, 
					'mname' => $mname, 
					'matric' => $matric, 
					'dept' => $course, 
					'sex' => $sex, 
					'faculty' => $dept

		);

		create('clear',$in);
		echo "Details Permanently Confiirmed";	
	}

	if(isset($_POST['action']) && $_POST['action'] == 'accepting'){
		$id = $_POST['id'];
		$superv = $_POST['superv'];
		$ans = "yes";	

		$in = array('wsp' => $ans,
					'nos' => $superv
				);

		update('clear',$in,'for_id',$id);
		echo "Done";	
	}


	if(isset($_POST['action']) && $_POST['action'] == 'nays'){
		$id = $_POST['id'];
		$ans = "no";	

		$in = array('wsp' => $ans,
					'nos' => $ans
				);

		update('clear',$in,'for_id',$id);
		echo "Done";	
	}


if (isset($_FILES [ "file" ][ "type" ]))
{
$file = $_FILES['file']['tmp_name'];
$id = $_POST['id'];
if (empty($file)) {
	echo "Insert an image";
}else{
$validextensions = array("jpeg" , "jpg" , "png" );
$temporary = explode("." , $_FILES [ "file" ][ "name" ]);
$file_extension = end ($temporary );
$pic = $_FILES['file']['name'];
$picp = $_FILES['file']['tmp_name'];
$pics = $_FILES['file']['size'];
list($width, $height, $types, $attr) = getimagesize($picp);


$hash = sha1($pic);

$ext1 = pathinfo($pic, PATHINFO_EXTENSION);
$ext1 = strtolower($ext1);

$upload_folder1 = "uploads/".$hash.".".$ext1;
$uploadpic = $hash.".".$ext1;
$datee = date('l M d, Y H:i');

$in = array('passport' => $uploadpic,
			'date' => $datee 
);

	if ($width > 120 || $width < 120 || $height > 120 || $height < 120 ) {
		$msgg = "Image must be 120 x 120 (px)";
		echo "$msgg";
	}else{
		move_uploaded_file($picp, $upload_folder1);
		update('clear',$in,'for_id',$id);
		echo "Passport uploaded";

}
}




	}




if (isset($_FILES [ "file2" ][ "type" ]))
{
$file = $_FILES['file2']['tmp_name'];
$id = $_POST['id'];
if (empty($file)) {
	echo "Insert an image";
}else{
$validextensions = array("jpeg" , "jpg" , "png" );
$temporary = explode("." , $_FILES [ "file2" ][ "name" ]);
$file_extension = end ($temporary );
$pic = $_FILES['file2']['name'];
$picp = $_FILES['file2']['tmp_name'];
$pics = $_FILES['file2']['size'];
list($width, $height, $types, $attr) = getimagesize($picp);


$hash = sha1($pic);

$ext1 = pathinfo($pic, PATHINFO_EXTENSION);
$ext1 = strtolower($ext1);

$upload_folder1 = "uploads/hostel/".$hash.".".$ext1;
$uploadpic = $hash.".".$ext1;
$datee = date('l M d, Y H:i');

$in = array('hostel' => $uploadpic,
);


		move_uploaded_file($picp, $upload_folder1);
		update('clear',$in,'for_id',$id);
		echo "File uploaded";

}




	}






	if (isset($_FILES [ "file3" ][ "type" ]))
{
$file = $_FILES['file3']['tmp_name'];
$id = $_POST['id'];
if (empty($file)) {
	echo "Insert an image";
}else{
$validextensions = array("jpeg" , "jpg" , "png" );
$temporary = explode("." , $_FILES [ "file3" ][ "name" ]);
$file_extension = end ($temporary );
$pic = $_FILES['file3']['name'];
$picp = $_FILES['file3']['tmp_name'];
$pics = $_FILES['file3']['size'];
list($width, $height, $types, $attr) = getimagesize($picp);


$hash = sha1($pic);

$ext1 = pathinfo($pic, PATHINFO_EXTENSION);
$ext1 = strtolower($ext1);

$upload_folder1 = "uploads/library/".$hash.".".$ext1;
$uploadpic = $hash.".".$ext1;
$datee = date('l M d, Y H:i');

$in = array('library' => $uploadpic,
);


		move_uploaded_file($picp, $upload_folder1);
		update('clear',$in,'for_id',$id);
		echo "File uploaded";

}




	}



		if (isset($_FILES [ "file4" ][ "type" ]))
{
$file = $_FILES['file4']['tmp_name'];
$id = $_POST['id'];
if (empty($file)) {
	echo "Insert an image";
}else{
$validextensions = array("jpeg" , "jpg" , "png" );
$temporary = explode("." , $_FILES [ "file4" ][ "name" ]);
$file_extension = end ($temporary );
$pic = $_FILES['file4']['name'];
$picp = $_FILES['file4']['tmp_name'];
$pics = $_FILES['file4']['size'];
list($width, $height, $types, $attr) = getimagesize($picp);


$hash = sha1($pic);

$ext1 = pathinfo($pic, PATHINFO_EXTENSION);
$ext1 = strtolower($ext1);

$upload_folder1 = "uploads/vsesc/".$hash.".".$ext1;
$uploadpic = $hash.".".$ext1;
$datee = date('l M d, Y H:i');

$in = array('vesc' => $uploadpic,
);


		move_uploaded_file($picp, $upload_folder1);
		update('clear',$in,'for_id',$id);
		echo "File uploaded";

}




	}


			if (isset($_FILES [ "file5" ][ "type" ]))
{
$file = $_FILES['file5']['tmp_name'];
$id = $_POST['id'];
if (empty($file)) {
	echo "Insert an image";
}else{
$validextensions = array("jpeg" , "jpg" , "png" );
$temporary = explode("." , $_FILES [ "file5" ][ "name" ]);
$file_extension = end ($temporary );
$pic = $_FILES['file5']['name'];
$picp = $_FILES['file5']['tmp_name'];
$pics = $_FILES['file5']['size'];
list($width, $height, $types, $attr) = getimagesize($picp);


$hash = sha1($pic);

$ext1 = pathinfo($pic, PATHINFO_EXTENSION);
$ext1 = strtolower($ext1);

$upload_folder1 = "uploads/department/".$hash.".".$ext1;
$uploadpic = $hash.".".$ext1;
$datee = date('l M d, Y H:i');

$in = array('department' => $uploadpic,
);


		move_uploaded_file($picp, $upload_folder1);
		update('clear',$in,'for_id',$id);
		echo "File uploaded";

}




	}
}

?>