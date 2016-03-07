<?php
	session_start();

	if(!isset($_SESSION['change'])) {
  		header("Location: ../index.php");
     	exit;
    } else {    	
    	include '../includes/dbConnections.php';

    	$currPass = $_POST['currPass'];
    	$newPass = $_POST['newPass'];
    	$newPassConf = $_POST['newPassConf'];

        

    	// select old hash from userID
    	$query = $db->prepare("SELECT password FROM teammemberinfo WHERE id=:userID");
    	$query->bindValue(":userID",$_SESSION['change']);
    	$query->execute();

    	$data = $query->fetch(PDO::FETCH_ASSOC);

    	// if current pw matches the one stored in db start update procedure
    	if($data['password'] == sha1($currPass)) {
    		if(($newPass == $newPassConf) && (sha1($newPass) != "7b4f075f3914bbd4bf9a26623d95954fa0dac20a")) {
    			$newPass = sha1($newPass);
    			$query = $db->prepare("UPDATE teammemberinfo SET password=:pass WHERE id=:userID");
    			$query->bindValue(":userID",$_SESSION['change']);
    			$query->bindValue(":pass",$newPass);
    			
                if($query->execute())
    			{
    				$_SESSION['id'] = $_SESSION['change'];
                    unset($_SESSION['change']);
                    header("Location: ../home.php");
                    exit;
    			} 
    			else {
    				header("Location: ../nope.php");
                    exit;
    			}

    		}
    		else {
                header("Location: ../nope.php");
                exit;
    		}
    	}
    	else
    	{
            header("Location: ../nope.php");
            exit;
    	}    	   
    }
?>