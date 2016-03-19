<?php
	session_start();
	
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

		$query = $db->prepare("UPDATE homepage SET motd=:motd, notes=:notes, leaderShipNotes=:lsNotes");
		$query->bindValue(':motd',$_POST['motd']);
		$query->bindValue(':notes',$_POST['notes']);
		$query->bindValue(':lsNotes',$_POST['lsNotes']);
		$query->execute();
		
		if($_POST['motdEmail'] == "1")
		{
			$body = "Message of the Day - " . strip_tags(html_entity_decode($_POST['motd'])) . "\n";				
			email("ClemsonCFA - Message of the Day",$body);
		}
		
		if($_POST['notesEmail'] == "1")
		{
			$body = "Notes - " . strip_tags(html_entity_decode($_POST['notes'])) . "\n";				
			email("ClemsonCFA - Notes",$body);
		}
		
		if($_POST['lsNotesEmail'] == "1")
		{
			$body = "Leadership Notes - " . strip_tags(html_entity_decode($_POST['lsNotes'])) . "\n";				
			email("ClemsonCFA - Leadership notes",$body);
		}

		header("Location: ../home.php");
	}
?>