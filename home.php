<?php
	
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		include 'includes/dbConnections.php';
	
		$sideNav = 
		'	
			<h3>Miscellaneous Forms</h3>
				<p>Login to CFA dropbox and quickly browse all documents/forms.</p>
				<center>
				<input type="dropbox-chooser" name="selected-file" id="db-chooser"/>
				<script type="text/javascript">
					document.getElementById("db-chooser").addEventListener("DbxChooserSuccess",
					function(e) {
						$("#openFile").attr("href",e.files[0].link);
						$("#bOpenFile").html("Open " + e.files[0].name);							
					//	alert("Here\'s the chosen file: " + e.files[0].link);
					}, false);
				</script>
				
				<a href="" id="openFile" target="_blank"><button type="button" id="bOpenFile" class="issueName" style="width: 151px;">Select A File Above</button></a>
				</center>
				<br />
				<br />
			<h3>Customer Follow Ups</h3>
		';

		$query = $db->prepare("SELECT customerName,incidentDate FROM Incident WHERE followUp='true'");
		$query->execute();

		$sideNav .= '<ul>';

		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$sideNav .= '<li>- ' . stripslashes($row['customerName']) . " " . stripslashes($row['incidentDate']) . '</li>';
		}

		$sideNav .= '</ul>';

		$query = $db->prepare("SELECT motd, notes, leaderShipNotes FROM HomePage");
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);
		
		$query = $db->prepare("SELECT goal, dateGoalAdded FROM cleanMaint LIMIT 5");
		$query->execute();
		$cleanMaint = "";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$cleanMaint .= '- ' . substr(stripslashes($row['dateGoalAdded']),0,10) . ' ' . stripslashes($row['goal']) . '<br />';
		}
		
		$query = $db->prepare("SELECT goal, dateGoalAdded FROM sosAndTof LIMIT 5");
		$query->execute();
		$sosAndTof= "";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$sosAndTof.= '- ' . substr(stripslashes($row['dateGoalAdded']),0,10) . ' ' . stripslashes($row['goal']) . '<br />';
		}
		
		$query = $db->prepare("SELECT goal, dateGoalAdded FROM service LIMIT 5");
		$query->execute();
		$service = "";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$service .= '- ' . substr(stripslashes($row['dateGoalAdded']),0,10) . ' ' . stripslashes($row['goal']) . '<br />';
		}			

		$mainPage = 
		'
				<div id="box1">
					<h2>
						Welcome to Chick-fil-A Management System
					</h2><img class="left" src="images/Chick-fil-A-icon-lg.jpg" width="90" height="90" alt="" />
					<p>'.
						htmlspecialchars_decode(stripslashes($data['motd']))	
					.'</p>
				</div>
				<div id="box2">
					<h2>
						Leadership Goals
					</h2>
					<ul class="imageList">
						<li class="first">
							<h3>Cleanliness and Maintenance</h3>
							<!--<img class="left" src="images/pic2.jpg" width="60" height="60" alt="" /> -->
							' . htmlspecialchars_decode(stripslashes($cleanMaint)) . '
						</li>
						<li>
							<h3>Speed of Service and Taste of Food</h3>
							<!--<img class="left" src="images/pic2.jpg" width="60" height="60" alt="" /> -->
							' . htmlspecialchars_decode(stripslashes($sosAndTof)) . '
						</li>
						<li class="last">
							<h3>Service</h3>
							<!--<img class="left" src="images/pic2.jpg" width="60" height="60" alt="" /> -->
							' . htmlspecialchars_decode(stripslashes($service)) . '
						</li>
					</ul>	
				</div>
				<div id="box3">
					<h2>
						Leadership Meetings
					</h2>'
					.
						htmlspecialchars_decode(stripslashes($data['leaderShipNotes']))
					.				
				'</div>
				<br />
				<div id="box4">
					<h2>
						Notes
					</h2>'
					.
						htmlspecialchars_decode(stripslashes($data['notes']))
					.				
				'</div>
		';

		displayPage($sideNav,$mainPage);
	}
?>