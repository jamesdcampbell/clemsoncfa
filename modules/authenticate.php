<?php
	include '../includes/dbConnections.php';

	session_start();

	if(!isset($_POST['login'])) {
		header("Location: ../index.php");
		exit;
	} else {
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];

		$password = sha1($password);
		
		$query = $db->prepare("SELECT id, email, login FROM teammemberinfo WHERE email = :username AND password = :password");

		$query->bindValue(':username',$username);
		$query->bindValue(':password',$password);

		$query->execute();

		$rows = $query->fetch(PDO::FETCH_ASSOC);
		
		$num = $query->rowCount();
		
		if($num > 0) {
			

			// if it's first time logging in, make them change pw
			if($password == "7b4f075f3914bbd4bf9a26623d95954fa0dac20a"){
				$_SESSION['change'] = $rows['id'];
				header("Location: ../nope.php");
			} else {
				// set session variable
				$_SESSION['id'] = $rows['id'];
				$_SESSION['email'] = $rows['email'];
				
				//Employees can only acces the employee section of performance reviews
				if($rows["login"] == "false")
				{
					header("location: /performance/employee/");
				}
				
				else
				{
					header("Location: ../home.php");
				}
			}						
		} else {
			header("Location: ../index.php");
		}
	}
?>