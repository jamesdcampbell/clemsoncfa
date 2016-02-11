<?php
	session_start();

	if(!isset($_SESSION['id'])) {
  		header("Location: ../index.php");
     	exit;
    } else {    	
    	include '../includes/dbConnections.php';

    	$currPass = $_GET['currPass'];
    	$newPass = $_GET['newPass'];
    	$newPassConf = $_GET['newPassConf'];

    	// select old hash from userID
    	$query = $db->prepare("SELECT password FROM TeamMemberInfo WHERE id=:userID");
    	$query->bindValue(":userID",$_SESSION['id']);
    	$query->execute();

    	$data = $query->fetch(PDO::FETCH_ASSOC);

    	// if current pw matches the one stored in db start update procedure
    	if($data['password'] == sha1($currPass)) {
    		if(($newPass == $newPassConf) && (sha1($newPass) != "7b4f075f3914bbd4bf9a26623d95954fa0dac20a")) {
    			$newPass = sha1($newPass);
    			$query = $db->prepare("UPDATE TeamMemberInfo SET password=:pass WHERE id=:userID");
    			$query->bindValue(":userID",$_SESSION['id']);
    			$query->bindValue(":pass",$newPass);
    			if($query->execute())
    			{
    				echo "1";
    			} 
    			else {
    				echo "0";
    			}

    		}
    		else {
    			echo "0";
    			exit;
    		}
    	}
    	else
    	{
    		echo "0";
    	}    	   
    }
?>