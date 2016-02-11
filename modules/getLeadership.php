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
	
	function doWork($tableName,$emailSubject)
	{
		include '../includes/dbConnections.php';		
		
		$option= $_GET['q'];

		// read goals
		if($option == 1)
		{	
			$query = $db->prepare("SELECT id AS uniqueID, goal, numGoal, ranking, dateGoalAdded, dateNumGoal, dateRanking FROM $tableName");
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			$data = stripslashes_deep($data);
			echo json_encode($data);
		}
		// update goal
		elseif($option == 2)
		{
			$data = json_decode($_GET['models']);
			
			$query = $db->prepare("UPDATE $tableName SET goal=:goal,numGoal=:numGoal,ranking=:ranking,dateGoalAdded=:dga,dateNumGoal=:dng, dateRanking=:dr WHERE id=:goalID");
			$query->bindValue(':goalID',$data[0]->uniqueID);
			$query->bindValue(':goal',$data[0]->goal);
			$query->bindValue(':numGoal',$data[0]->numGoal);
			$query->bindValue(':ranking',$data[0]->ranking);
			$query->bindValue(':dga',$data[0]->dateGoalAdded);
			$query->bindValue(':dng',$data[0]->dateNumGoal);
			$query->bindValue(':dr',$data[0]->dateRanking);
			
			// probably should substr the name for subject, but it will most likely be alright
			if($data[0]->emailOut == "true")
			{	
				$body = "Date Goal Added: " . substr($data[0]->dateGoalAdded,0,10). "\n";
				$body .= "Goal: " . $data[0]->goal . "\n\n";
				$body .= "Number Goal: " . $data[0]->numGoal . "\n";
				$body .= "Ranking: " . $data[0]->ranking . "\n";				
				email("Cleanliness and Maintenance Team Goal Updated",$body);
			}
			
			
			if($query->execute()){

				$query = $db->prepare("SELECT id AS uniqueID, goal, numGoal, ranking,dateGoalAdded,dateNumGoal,dateRanking FROM $tableName WHERE id=:goalID");
				$query->bindValue(':goalID',$data[0]->uniqueID);
				$query->execute();
				
				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
		// delete goal
		elseif($option == 3)
		{
			$data = json_decode($_GET['models']);

			$query = $db->prepare("DELETE FROM $tableName WHERE id=:goalID");
			$query->bindValue(':goalID',$data[0]->uniqueID);
			$query->execute();				
		}
		// create goal
		elseif($option == 4)
		{
			$data = json_decode($_GET['models']);
			
			$query = $db->prepare("INSERT INTO $tableName (goal,numGoal,ranking,dateGoalAdded,dateNumGoal,dateRanking) VALUES (:goal,:numGoal,:ranking,:dga,:dng,:dr)");
			$query->bindValue(':goal',$data[0]->goal);
			$query->bindValue(':numGoal',$data[0]->numGoal);
			$query->bindValue(':ranking',$data[0]->ranking);
			$query->bindValue(':dga',$data[0]->dateGoalAdded);
			$query->bindValue(':dng',$data[0]->dateNumGoal);
			$query->bindValue(':dr',$data[0]->dateRanking);
			
			if($data[0]->emailOut == "true")
			{	
				$body = "Date Goal Added: " . substr($data[0]->dateGoalAdded,0,10). "\n";
				$body .= "Goal: " . $data[0]->goal . "\n\n";
				$body .= "Number Goal: " . $data[0]->numGoal . "\n";
				$body .= "Ranking: " . $data[0]->ranking . "\n";				
				email("Cleanliness and Maintenance Team Goal Added",$body);
			}
			
			if($query->execute()){

				$query = $db->prepare("SELECT id AS uniqueID, goal, numGoal, ranking,dateGoalAdded,dateNumGoal,dateRanking FROM $tableName ORDER BY id DESC LIMIT 1");
				$query->execute();
				
				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
	}

	if(!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		exit;
	} else {
		$module = $_GET['id'];
	
		if($module == "100")
		{
			doWork("cleanMaint","Cleanliness and Maintenance Team");
		}
		// speed of service and taste of food methods
		elseif ($module == "200") {
			doWork("sosAndTof","Speed of Service and Taste of Food Team");
			
		}
		// service methods
		elseif ($module == "300") {
			doWork("service","Service Team");
		}
		elseif ($module == "1") {
			doWork("teamOne","Service Team");
		}
		elseif ($module == "2") {
			doWork("teamTwo","Service Team");
		}
		elseif ($module == "3") {
			doWork("teamThree","Service Team");
		}
		elseif ($module == "4") {
			doWork("teamFour","Service Team");
		}
		elseif ($module == "5") {
			doWork("teamFive","Service Team");
		}
		elseif ($module == "6") {
			doWork("teamSix","Service Team");
		}
		elseif ($module == "7") {
			doWork("teamSeven","Service Team");
		}
		elseif ($module == "8") {
			doWork("teamEight","Service Team");
		}
	}
?>