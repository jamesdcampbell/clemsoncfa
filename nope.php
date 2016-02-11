<?php
	session_start();	
	if(!isset($_SESSION['change'])) {
		header("Location: index.php");
		exit;
	} else {
		echo '
			<html>
			<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css" />
		        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="style.css" />
			<head>
				<title>Change Password</title>															
			</head>
			<body>
				<table border ="0" style="height: 100%; width: 100%;">
					<tr>
						<td style="height: 100%; width: 33%;">
						</td>
						
						<td valign="middle">
							<div id="resetLoginDiv">
							<fieldset>
							<legend style="margin-left: 15px;">Change Password</legend>
							<table border ="0" style="height: 100%; width: 100%;">
								<tr>
									<td valign="middle" align="center">						
											<div id="resetLoginForm">
												<form method="POST" action="/modules/changeDefault.php"/>
											<center>
												<label for="currPass">Current Password:</label>
												<input type="password" id="currPass" name="currPass" /><br /><br />
												<label for="newPass">New Password:</label>
												<input type="password" id="newPass" name="newPass" /><br /><br />
												<label for="newPassConf">Confirm New Password:</label>
												<input type="password" id="newPassConf" name="newPassConf" /><br /><br />
												<input type="submit" class="lateName" id="updatePass" value="Change Password" name="updatePass" style="width: 180px;"/>	
											</center>
											</form>
											</div>
									</td>
								</tr>
							</table>
							</fieldset>
							</div>		
						</td>
						
						<td style="height: 100%; width: 33%;">
						</td>
					</tr>
				</table>
			</body>
			</html>
		';

		
	}
?>
