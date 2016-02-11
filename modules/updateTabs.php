<?php
	include '../includes/dbConnections.php';

	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		exit;
	} else {
		$query = $db->prepare("UPDATE teams SET teamName=:name,inUse='0' WHERE id=:teamID");
		$query->bindValue(':name',$_GET['team']);
		$query->bindValue(':teamID',$_GET['teamID']);

		$query->execute();
		header("Location: ../leaders.php");
		exit;
	}
?>