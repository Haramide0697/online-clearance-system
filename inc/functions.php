<?php
	$base_url = "http://localhost/polyclear";

	function get_student_name($id, $db, $sql) {
		$query = "SELECT * FROM a_users WHERE id='$id'";
		$return = $db->selectDB($sql,$query);
		if ($return->rowCount() > 0) {
			while($r = $return->fetch()){
				return $r['name'];
			}
		}
		else{
			return NULL;
		}	
	}


		function get_user_id($email, $db, $sql) {
		$query = "SELECT * FROM a_users WHERE email='$email'";
		$return = $db->selectDB($sql,$query);
		if ($return->rowCount() > 0) {
			while($r = $return->fetch()){
				return $r['id'];
			}
		}
		else{
			return NULL;
		}	
	}

	
	function get_num_student($db, $sql){
		$query = "SELECT * FROM a_users";
		$return = $db->selectDB($sql, $query);
		if($return){
			return $return->rowCount();
		}else{
			return NULL;
		}
		
	}

?>
