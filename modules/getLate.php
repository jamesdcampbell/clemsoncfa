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
		include '../includes/dbConnections.php';

		$module = $_GET['q'];
		$memberID = $_GET['id'];

		// retrieve data
		if($module == "1"){
			$query = $db->prepare("SELECT TeamMemberLate.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberLate.date, TeamMemberLate.arrivalTime AS timeArrived, TeamMemberLate.scheduledTime AS schedTime, TeamMemberLate.managerName, 
									TeamMemberLate.comments FROM TeamMemberLate INNER JOIN TeamMemberInfo ON TeamMemberLate.memberID=TeamMemberInfo.id WHERE TeamMemberLate.memberID=:memberID");
			$query->bindValue(':memberID', $memberID);
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			$data = stripslashes_deep($data);
			echo json_encode($data);
		}
		// update member late log 
		elseif ($module == "2") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("UPDATE TeamMemberLate SET date=:date,arrivalTime=:aTime,scheduledTime=:sTime,managerName=:manName,comments=:comments WHERE id=:uniqueID");
			$query->bindValue(':date',$data[0]->date);
			$query->bindValue(':aTime',$data[0]->timeArrived);
			$query->bindValue(':sTime',$data[0]->schedTime);
			$query->bindValue(':manName',$data[0]->managerName);
			$query->bindValue(':comments',$data[0]->comments);
			$query->bindValue(':uniqueID',$data[0]->uniqueID);

			if($query->execute()) {
				$query = $db->prepare("SELECT TeamMemberLate.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberLate.date, TeamMemberLate.arrivalTime AS timeArrived, TeamMemberLate.scheduledTime AS schedTime, TeamMemberLate.managerName, 
									TeamMemberLate.comments FROM TeamMemberLate INNER JOIN TeamMemberInfo ON TeamMemberLate.memberID=TeamMemberInfo.id WHERE TeamMemberLate.id=:uniqueID");
				$query->bindValue(':uniqueID',$data[0]->uniqueID);
				$query->execute();

				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
		// delete late log entry
		elseif ($module == "3") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("DELETE FROM TeamMemberLate WHERE id=:lateID");
			$query->bindValue(':lateID',$data[0]->uniqueID);

			$query->execute();
		}
		// create new late log entry
		elseif ($module == "4") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("INSERT INTO TeamMemberLate (memberID,date,arrivalTime,scheduledTime,managerName,comments) VALUES
																(:memID,:date,:aTime,:sTime,:manName,:comments)");
			$query->bindValue(':memID',$memberID);
			$query->bindValue(':date',$data[0]->date);
			$query->bindValue(':aTime',$data[0]->timeArrived);
			$query->bindValue(':sTime',$data[0]->schedTime);
			$query->bindValue(':manName',$data[0]->managerName);
			$query->bindValue(':comments',$data[0]->comments);

			if($query->execute()) {
				$query = $db->prepare("SELECT TeamMemberLate.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberLate.date, TeamMemberLate.arrivalTime AS timeArrived, TeamMemberLate.scheduledTime AS schedTime, TeamMemberLate.managerName, 
									TeamMemberLate.comments FROM TeamMemberLate INNER JOIN TeamMemberInfo ON TeamMemberLate.memberID=TeamMemberInfo.id ORDER BY TeamMemberLate.id DESC LIMIT 1");
				$query->execute();

				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
	}
?>