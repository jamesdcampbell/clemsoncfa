<?php
	session_start();

	function stripslashes_deep($value)
	{
	    $value = is_array($value) ?
	                array_map('stripslashes_deep', $value) :
	                stripslashes($value);
	
	    return $value;
	}
	
	function email($subject,$body)
	{
		require_once("../includes/email.php");
		
		$email = new Email();
		$email->subject =  $subject;
		$email->body = $body;
		$email->sendEmail();
	}

	if(!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		exit;
	} else {
		include '../includes/dbConnections.php';
		
		$module = $_GET['q'];
		$memberID = $_GET['id'];

		// retrieve data
		if($module == "1") {	
			$query = $db->prepare("SELECT TeamMemberIssues.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberIssues.dateOfIncident, TeamMemberIssues.managerName, TeamMemberIssues.issue FROM TeamMemberIssues INNER JOIN TeamMemberInfo ON TeamMemberIssues.memberID=TeamMemberInfo.id WHERE TeamMemberIssues.memberID=:memberID");	
			
			$query->bindValue(':memberID', $memberID);
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			$data = stripslashes_deep($data);
			echo json_encode($data);
		}
		// update member issue
		elseif ($module == "2") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("UPDATE TeamMemberIssues SET dateOfIncident=:doi,managerName=:managerName,issue=:issue WHERE id=:issueID");
			$query->bindValue(':doi',$data[0]->dateOfIncident);
			$query->bindValue(':managerName',$data[0]->managerName);
			$query->bindValue(':issue',$data[0]->issue);
			$query->bindValue(':issueID',$data[0]->uniqueID);
			
			// probably should substr the name for subject, but it will most likely be alright
			if($data[0]->emailOut == "true")
			{	
				$body = "Employee Name: " . $data[0]->name. "\n\n";
				$body .= "Manager Name: " . $data[0]->managerName . "\n";
				$body .= "Date of Incident: " . substr($data[0]->dateOfIncident,0,10) . "\n\n";
				$body .= "Issue: " . $data[0]->issue . "\n";				
				email("Team Member Issue Updated - " . $data[0]->name,$body);
			}
			
			if($query->execute()) {
				$query = $db->prepare("SELECT TeamMemberIssues.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberIssues.dateOfIncident, TeamMemberIssues.managerName, TeamMemberIssues.issue FROM TeamMemberIssues INNER JOIN TeamMemberInfo ON TeamMemberIssues.memberID=TeamMemberInfo.id WHERE TeamMemberIssues.id=:issueID");	
				$query->bindValue(':issueID',$data[0]->uniqueID);
				$query->execute();

				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
		// delete team member issue
		elseif ($module == "3") {
			$data = json_decode($_GET['models']);
			
			// preserve issue information for logging purposes
			$query = $db->prepare("SELECT CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name, TeamMemberIssues.dateOfIncident, 						TeamMemberIssues.issue FROM TeamMemberIssues INNER JOIN TeamMemberInfo ON TeamMemberIssues.memberID=TeamMemberInfo.id WHERE TeamMemberIssues.id=:issueID");	
			$query->bindValue(':issueID',$data[0]->uniqueID);
			$query->execute();
			
			$preservedData = $query->fetch(PDO::FETCH_ASSOC);
			
			$query = $db->prepare("INSERT INTO TeamMemberIssuesLog (time,operation,user,preservedMember,dateOfIncident,issue) VALUES (NOW(),'Deleted Issue',:user,:memberName,:doi,:issue)");
			$query->bindValue(':user',$_SESSION['email']);
			$query->bindValue(':memberName',$preservedData['name']);
			$query->bindValue(':doi',$preservedData['dateOfIncident']);
			$query->bindValue(':issue',$preservedData['issue']);
			$query->execute();
			
			$query = $db->prepare("DELETE FROM TeamMemberIssues WHERE id=:issueID");
			$query->bindValue(':issueID',$data[0]->uniqueID);

			$query->execute();				
		}
		// create team member issue
		elseif ($module == "4") {
			// ************************************************************EMail out to managers new issue created
			$data = json_decode($_GET['models']);
			
			$query = $db->prepare("INSERT INTO TeamMemberIssuesLog (time,operation,user,preservedMember,dateOfIncident,issue) VALUES (NOW(),'Created Issue',:user,:memberName,:doi,:issue)");
			$query->bindValue(':user',$_SESSION['email']);
			$query->bindValue(':memberName',$data[0]->name);
			$query->bindValue(':doi',$data[0]->dateOfIncident);
			$query->bindValue(':issue',$data[0]->issue);
			$query->execute();

			$query = $db->prepare("INSERT INTO TeamMemberIssues (memberID,dateOfIncident,managerName,issue) VALUES (:memID,:doi,:managerName,:issue)");
			$query->bindValue(':memID',$memberID);
			$query->bindValue(':doi',$data[0]->dateOfIncident);
			$query->bindValue(':managerName',$data[0]->managerName);
			$query->bindValue(':issue',$data[0]->issue);
			
			if($data[0]->emailOut == "true")
			{	
				$body = "Employee Name: " . $data[0]->name. "\n\n";
				$body .= "Manager Name: " . $data[0]->managerName . "\n";
				$body .= "Date of Incident: " . substr($data[0]->dateOfIncident,0,10) . "\n\n";
				$body .= "Issue: " . $data[0]->issue . "\n";				
				email("Team Member Issue Added - " . $data[0]->name,$body);
			}

			if($query->execute()){

				$query = $db->prepare("SELECT TeamMemberIssues.id AS uniqueID, TeamMemberInfo.id AS memID, CONCAT(TeamMemberInfo.fName, ' ', TeamMemberInfo.lName) AS name,
									TeamMemberIssues.dateOfIncident, TeamMemberIssues.managerName, TeamMemberIssues.issue FROM TeamMemberIssues INNER JOIN TeamMemberInfo ON TeamMemberIssues.memberID=TeamMemberInfo.id ORDER BY TeamMemberIssues.id DESC LIMIT 1");
				$query->execute();
				
				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}	
	}
?>