<?php
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		exit;
	} else {
		include '../includes/dbConnections.php';

		$data = json_decode($_GET['models']);
		//echo $_GET['models'];
		$data[0]->firstName;
		
		$query = $db->prepare("INSERT INTO teammemberinfo (fName,lName,phone,email,login) VALUES (:fName,:lName,:pNumber,:eAddress,:canLogin)");

		// parameterize queries
		$query->bindValue(':fName',$data[0]->firstName);
		$query->bindValue(':lName',$data[0]->lastName);
		$query->bindValue(':pNumber',$data[0]->phoneNumber);
		$query->bindValue(':eAddress',$data[0]->emailAddress);

		// convert  the true to 1 (that's how it's represented in db)
		if($data[0]->canLogin == "true") {
			// need to generate password and email to user *************************************************************************
			$query->bindValue(':canLogin',"true");		
		}
		else if($data[0]->canLogin == "false") {
			$query->bindValue(':canLogin',"false");
		}

		$query->execute();

		// grab  data just inserted and return it to data grid
		$query = $db->prepare("SELECT id AS memberID, fName AS firstName, lName AS lastName, phone AS phoneNumber, email AS emailAddress, login AS canLogin FROM teammemberinfo ORDER BY id DESC LIMIT 1");

		$query->execute();
		
		$returnData = array();
		$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
		echo json_encode($returnData);
	}
?>