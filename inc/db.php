<?php

/**
 * Database Connection class for 
 * 
 * This connects,inserts,selects,delete to/from the database.
 * 
 * @package MAY 2016
 * @author Sangosanya Segun <www.astratech.com.ng>
 * @copyright AstraTech 2016
 * @version 1.0
 * @param $connstr| the connection string = host + dbname
 * @param $user | the database user name
 * @param $pass | the database user
 * @param array| the functions return values in an array
 */


//TO HIDE ERROR OFF THE SCREEN
//error_reporting (E_ALL ^E_NOTICE);
//error_reporting (E_STRICT);

class db{

	function connectDB($connStr,$user,$pass){
	    try{
	       $conn = new PDO($connStr,$user,$pass);
	       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    } 
	    catch (Exception $ex) {
	      $error = $ex->getMessage();
        return $error;
	    }
    
    return $conn;
  }

  
  function insertDB($conn,$query){
     try{
      $conn->query($query);
    }
    catch (PDOException $e){
      $error = "ERROR INSERTING INTO db: ".$e->getMessage();
      return $error;
    }

    return "Successful";
  }
  
  function selectDB($conn,$query){
    try{
      $q = $conn->query($query);
      $q->setFetchMode(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e){
      $error = "ERROR SELECTING FROM DB: ".$e->getMessage();
      return $error;
    }

    return $q;
  }

  function updateDB($conn,$query){
    try{
   		$conn->query($query);
    }
    catch (PDOException $e){
      $error = "ERROR INSERTING INTO db: ".$e->getMessage();
    }

    return array("success"=>"Insertion Successful",
           "error"=>$error
           );
  }
}

function deleteDB($conn,$query){
        try{
            $conn->query($query);
            return true;
        }
        catch (PDOException $e) {
          $error = "ERROR DELETING db: ".$e->getMessage();
          return $error;
        }
    }
?>