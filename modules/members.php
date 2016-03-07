<?php
	session_start();

	function stripslashes_deep($value)
	{
	    $value = is_array($value) ?
	                array_map('stripslashes_deep', $value) :
	                stripslashes($value);
	
	    return $value;
	}

	if(!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		exit;
	} else {
		// make where only logged in users can access this page
		include '../includes/dbConnections.php';
		
		$module = $_GET['q'];

		// return all data from team member info table
		if($module == "1"){
			$query = $db->prepare("SELECT id AS memberID, fName AS firstName, lName AS lastName, phone AS phoneNumber, email AS emailAddress, position as position, hire_date AS hireDate, login AS canLogin FROM teammemberinfo");		
			
			if($query->execute()) {
				$data = array();
				while($row = $query->fetch(PDO::FETCH_ASSOC)) {
					$data[] = $row;
				}
				$data = stripslashes_deep($data);	
				echo json_encode($data);		
			}				
		} 
		// update member info
		elseif ($module == "2") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("UPDATE teammemberinfo SET fName=:fName,lName=:lName,phone=:pNumber,email=:eAddress,hire_date=:hire_date,position=:position,login=:canLogin WHERE id=:memberID");
			$query->bindValue(':fName',$data[0]->firstName);
			$query->bindValue(':lName',$data[0]->lastName);
			$query->bindValue(':pNumber',$data[0]->phoneNumber);
			$query->bindValue(':eAddress',$data[0]->emailAddress);
			$query->bindValue(':position',$data[0]->position);
			$query->bindValue(':hire_date',$data[0]->hireDate);
			$query->bindValue(':memberID',$data[0]->memberID);
			
			if($data[0]->canLogin == 1) {		
				$query->bindValue(':canLogin',"true");		
			}
			else if($data[0]->canLogin == 0) {				
				$query->bindValue(':canLogin',"false");
			}

			if($query->execute()) {
				// grab updated info back out and return to grid
				$query = $db->prepare("SELECT id AS memberID, fName AS firstName, lName AS lastName, phone AS phoneNumber, email AS emailAddress, position, hire_date AS hireDate, login AS canLogin FROM teammemberinfo WHERE id=:memberID");
				$query->bindValue(':memberID',$data[0]->memberID);
				$query->execute();

				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		} 
		// delete member
		elseif($module == "3") {
			$data = json_decode($_GET['models']);
			
			$query = $db->prepare("SELECT COUNT(*) AS numMan FROM teammemberinfo WHERE login='true'");
			$query->execute();
			$numPeep = $query->fetch(PDO::FETCH_ASSOC);

			$query = $db->prepare("SELECT login FROM teammemberinfo WHERE id=:memberID");
			$query->bindValue(':memberID',$data[0]->memberID);
			$query->execute();
			$manager = $query->fetch(PDO::FETCH_ASSOC);
			
			$man = False;
			if($manager['login'] == 'true')
			{
				$man  = True;
			}
			
			if((!$man && ($numPeep['numMan'] >= 1)) || ($man && ($numPeep['numMan'] > 1)))
			{
				$query = $db->prepare("SELECT CONCAT(fName, ' ', lName) AS name, email FROM teammemberinfo WHERE id=:memberID");
				$query->bindValue(':memberID',$data[0]->memberID);
				$query->execute();
				
				$preservedData = $query->fetch(PDO::FETCH_ASSOC);
				
				// preserve member information for logging purposes
				$query = $db->prepare("INSERT INTO teammemberinfolog (time,operation,user,name,email) VALUES (NOW(),'Delete Member',:user,:name,:email)");
				$query->bindValue(':user',$_SESSION['email']);
				$query->bindValue(':name',$preservedData['name']);
				$query->bindValue(':email',$preservedData['email']);
				$query->execute();
				
				$query = $db->prepare("DELETE FROM teammemberinfo WHERE id=:memberID");
				$query->bindValue(':memberID',$data[0]->memberID);
	
				$query->execute();
			}
		} 
		// create team member
		elseif($module == "4") {
			$data = json_decode($_GET['models']);
						
			// preserve member information for logging purposes
			$query = $db->prepare("INSERT INTO teammemberinfolog (time,operation,user,name,email) VALUES (NOW(),'Add Member',:user,:name,:email)");
			$query->bindValue(':user',$_SESSION['email']);
			$query->bindValue(':name',$data[0]->firstName . " " . $data[0]->lastName);
			$query->bindValue(':email',$data[0]->emailAddress);
			$query->execute();
								
			$query = $db->prepare("INSERT INTO teammemberinfo (fName,lName,phone,email,position,hire_date,login,password) VALUES (:fName,:lName,:pNumber,:eAddress,:position,:hireDate,:canLogin,'7b4f075f3914bbd4bf9a26623d95954fa0dac20a')");		
			$query->bindValue(':fName',$data[0]->firstName);
			$query->bindValue(':lName',$data[0]->lastName);
			$query->bindValue(':pNumber',$data[0]->phoneNumber);
			$query->bindValue(':eAddress',$data[0]->emailAddress);
			$query->bindValue(':position',$data[0]->position);
			$query->bindValue(':hireDate',$data[0]->hireDate);

			if($data[0]->canLogin == 1) {				
				$query->bindValue(':canLogin',"true");		
			}
			elseif($data[0]->canLogin == 0) {
				$query->bindValue(':canLogin',"false");
			}

			if($query->execute()) {
				// grab data just inserted and return it to data grid
				$query = $db->prepare("SELECT id AS memberID, fName AS firstName, lName AS lastName, phone AS phoneNumber, email AS emailAddress, position, login AS canLogin FROM teammemberinfo ORDER BY id DESC LIMIT 1");
				$query->execute();
				
				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);
			}		
		}	
	}
?>