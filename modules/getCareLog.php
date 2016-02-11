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

		// retrieve customer care log
		if($module == "1") {
			$query = $db->prepare("SELECT id AS uniqueID, customerName AS custName, callDate AS dateCall, callTime, callTakenByID AS callTakenBy,
									incidentDate AS doi, incidentTime AS toi, details, followUp, address, phoneOne, phoneTwo, tMemberIssue, handled FROM Incident");
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			
			$data = stripslashes_deep($data);			
			echo json_encode($data); 	
		}
		// delete customer care issue
		elseif ($module == "2") {
			$data = json_decode($_GET['models']);
			echo $_GET['models'];
			$query = $db->prepare("DELETE FROM Incident WHERE id=:issueID");
			$query->bindValue(":issueID",$data[0]->uniqueID);
			$query->execute();									
		}
		// create new customer issue
		elseif($module == "3") {
			$dateIncRec = htmlspecialchars($_GET['dir']);
			$timeIncRec = htmlspecialchars($_GET['tir']);
			$callTakenBy = htmlspecialchars($_GET['callTakenBy']);
			$custName = htmlspecialchars($_GET['custName']);
			$address = htmlspecialchars($_GET['addr']);
			$phoneOne = htmlspecialchars($_GET['phoneOne']);
			$phoneTwo = htmlspecialchars($_GET['phoneTwo']);
			$dateOfInc = htmlspecialchars($_GET['doi']);
			$timeOfInc = htmlspecialchars($_GET['toi']);
			$teamMember = htmlspecialchars($_GET['teamMem']);
			$details = htmlspecialchars($_GET['details']);
			$handled = htmlspecialchars($_GET['handled']);
			$followUp = htmlspecialchars($_GET['followUp']);

			$query = $db->prepare("INSERT INTO Incident (customerName,callDate,callTime,callTakenByID,incidentDate,incidentTime,details,
									followUp,address,phoneOne,phoneTwo,tMemberIssue,handled) VALUES 
								(:custName,:dir,:tir,:callTakenBy,:doi,:toi,:details,:followUp,:addr,:phoneOne,:phoneTwo,:tMemberIssue,:handled)");
			$query->bindValue(':custName',$custName);
			$query->bindValue(':dir',$dateIncRec);
			$query->bindValue(':tir',$timeIncRec);
			$query->bindValue(':callTakenBy',$callTakenBy);
			$query->bindValue(':doi',$dateOfInc);
			$query->bindValue(':toi',$timeOfInc);
			$query->bindValue(':details',$details);
			$query->bindValue(':followUp',$followUp);
			$query->bindValue(':addr',$address);
			$query->bindValue(':phoneOne',$phoneOne);
			$query->bindValue(':phoneTwo',$phoneTwo);
			$query->bindValue(':tMemberIssue',$teamMember);
			$query->bindValue(':handled',$handled);

			$query->execute();
		}
		// return data for specific edit
		elseif($module == "4") {
			$id = $_GET['id'];

			$query = $db->prepare("SELECT id AS uniqueID, customerName AS custName, callDate AS dateCall, callTime, callTakenByID AS callTakenBy,
									incidentDate AS doi, incidentTime AS toi, details, followUp, address, phoneOne, phoneTwo, tMemberIssue, handled FROM Incident WHERE id=:id");
			$query->bindValue(':id',$id);
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			
			$data = stripslashes_deep($data);
			echo json_encode($data);
		}
		elseif ($module == "5") {
			$uniqueID = htmlspecialchars($_GET['uValue']);
			$dateIncRec = htmlspecialchars($_GET['dir']);
			$timeIncRec = htmlspecialchars($_GET['tir']);
			$callTakenBy = htmlspecialchars($_GET['callTakenBy']);
			$custName = htmlspecialchars($_GET['custName']);
			$address = htmlspecialchars($_GET['addr']);
			$phoneOne = htmlspecialchars($_GET['phoneOne']);
			$phoneTwo = htmlspecialchars($_GET['phoneTwo']);
			$dateOfInc = htmlspecialchars($_GET['doi']);
			$timeOfInc = htmlspecialchars($_GET['toi']);
			$teamMember = htmlspecialchars($_GET['teamMem']);
			$details = htmlspecialchars($_GET['details']);
			$handled = htmlspecialchars($_GET['handled']);
			$followUp = htmlspecialchars($_GET['followUp']);

			$query = $db->prepare("UPDATE Incident SET customerName=:custName,callDate=:dir,callTime=:tir,callTakenByID=:callTakenBy
									,incidentDate=:doi,incidentTime=:toi,details=:details,
									followUp=:followUp,address=:addr,phoneOne=:phoneOne,phoneTwo=:phoneTwo,
									tMemberIssue=:tMemberIssue,handled=:handled WHERE id=:id"); 
			
			$query->bindValue(':id',$uniqueID);
			$query->bindValue(':custName',$custName);
			$query->bindValue(':dir',$dateIncRec);
			$query->bindValue(':tir',$timeIncRec);
			$query->bindValue(':callTakenBy',$callTakenBy);
			$query->bindValue(':doi',$dateOfInc);
			$query->bindValue(':toi',$timeOfInc);
			$query->bindValue(':details',$details);
			$query->bindValue(':followUp',$followUp);
			$query->bindValue(':addr',$address);
			$query->bindValue(':phoneOne',$phoneOne);
			$query->bindValue(':phoneTwo',$phoneTwo);
			$query->bindValue(':tMemberIssue',$teamMember);
			$query->bindValue(':handled',$handled);

			$query->execute();
		}
	}
?>