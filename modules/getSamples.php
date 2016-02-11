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

		// retrieve sampling data
		if ($module == "1") {
			$query = $db->prepare("SELECT id AS uniqueID, date, product, units, samplesGiven, wholeProduct, comments FROM Sampling");							
			$query->execute();

			$data = array();
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$row['wholeProduct'] = $row['samplesGiven'] / $row['units'];
				$data[] = $row;
			}
			$data = stripslashes_deep($data);
			echo json_encode($data);
		}
		// update sampling data
		elseif ($module == "2") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("UPDATE Sampling SET date=:date,product=:prod,units=:units,samplesGiven=:sGiven,wholeProduct=:wProd,comments=:comments WHERE id=:sampleID");
			$query->bindValue(':sampleID',$data[0]->uniqueID);
			$query->bindValue(':date',$data[0]->date);
			$query->bindValue(':prod',$data[0]->product);
			$query->bindValue(':units',$data[0]->units);
			$query->bindValue(':sGiven',$data[0]->samplesGiven);
			$query->bindValue(':wProd',$data[0]->wholeProduct);
			$query->bindValue(':comments',$data[0]->comments);

			if($query->execute()) {
				$query = $db->prepare("SELECT id AS uniqueID, date, product, units, samplesGiven, wholeProduct, comments FROM Sampling WHERE id=:sampleID");	
				$query->bindValue(':sampleID',$data[0]->uniqueID);
				$query->execute();

				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);				
				$returnData = stripslashes_deep($returnData);
				$returnData[0]['wholeProduct'] = $returnData[0]['samplesGiven'] / $returnData[0]['units'];
				echo json_encode($returnData);		
			}			
		}
		// delete sampling data
		elseif ($module == "3") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("DELETE FROM Sampling WHERE id=:issueID");
			$query->bindValue(':issueID',$data[0]->uniqueID);

			$query->execute();				
		}
		// create sampling data
		elseif ($module == "4") {
			$data = json_decode($_GET['models']);

			$query = $db->prepare("INSERT INTO Sampling (date,product,units,samplesGiven, comments) VALUES (:date,:prod,:units,:sGiven,:comments)");
			$query->bindValue(':date',$data[0]->date);
			$query->bindValue(':prod',$data[0]->product);
			$query->bindValue(':units',$data[0]->units);
			$query->bindValue(':sGiven',$data[0]->samplesGiven);
			//$query->bindValue(':wProd',$data[0]->wholeProduct);
			$query->bindValue(':comments',$data[0]->comments);

			if($query->execute()){

				$query = $db->prepare("SELECT id AS uniqueID, date, product, units, samplesGiven, wholeProduct, comments FROM Sampling ORDER BY id DESC LIMIT 1");
				$query->execute();
				
				$returnData = array();
				$returnData[] = $query->fetch(PDO::FETCH_ASSOC);
				$returnData[0]['wholeProduct'] = $returnData[0]['samplesGiven'] / $returnData[0]['units'];
				$returnData = stripslashes_deep($returnData);
				echo json_encode($returnData);		
			}
		}
	}

?>