<?php
	session_start();
	// don't let someone already logged in go back to login page
	if(isset($_SESSION['id'])) {
		header("Location: home.php");
		exit;
	}
?>
<html>
	 			<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css" />
		        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="style.css" />
<head>
	<title>CFA Login</title>
</head>
<body>

<table border="0" style="height: 100%; width: 100%;">
	<tr>
		<td colspan="3" style="height: 33%;">
	<!--		<div id="logo">
				<h1>
					<a href="#">Chick-fil-A Management System</a>
				</h1>
			</div>
	-->		
		</td>
	</tr>
	<tr>
		<td style="height: 33%; width: 33%;">
		</td>
		
		<td valign="middle">
		
			<div id="loginDiv">
			<fieldset>
			<legend style="margin-left: 15px;">Login</legend>
			<table border="0" style="height: 100%; width: 100%;">
				<tr>
					<td valign="middle" align="center">
													
							<div id="loginForm">
							<form method="POST" action="modules/authenticate.php">								
								<label for="username">Username:</label>
								<input type="text" name="username" /><br /><br />
								<label for="password">Password:</label>
								<input type="password" name="password" /><br /><br />
								<input type="submit" class ="lateName" value="Login" name="login" style="width: 180px;"/>								
							</form>
							</div>
					</td>
				</tr>
			</table>
			</fieldset>
			</div>		
		</td>
				
		<td style="height: 33%; width: 33%;">
		</td>
	</tr>
	<tr>
		<td colspan="3" style="height: 33%;">
		</td>
	</tr>
</table>

</body>
</html>