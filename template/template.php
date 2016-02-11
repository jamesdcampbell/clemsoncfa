<?php	
	/* File: template.php
	 * Purpose: this single file displays all pages. It should be included in all other pages and 
	 * the appropriate parameters should be passed in to render the page correctly.
	 * Misc: File is usually included in other files and displayPage() is called	 
	 */

	function displayPage($sideBar, $mainContent)
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<!--

			Design by Free CSS Templates
			http://www.freecsstemplates.org
			Released for free under a Creative Commons Attribution License

			Name       : Reverse Obscurity
			Version    : 1.0
			Released   : 20130222

		-->
		<html xmlns="http://www.w3.org/1999/xhtml">
		    <head>
		  
		        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<title>Chick-fil-A</title>
		        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css" />
		        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" type="text/css" href="style.css" />
			
			<script type="text/javascript" src="https://www.dropbox.com/static/api/1/dropbox.js" id="dropboxjs" data-app-key="4652lnc3p63ngty"></script>

			<!-- Kendo UI imports -->
			<link href="styles/kendo.common.min.css" rel="stylesheet"/>
			<link href="styles/kendo.silver.min.css" rel="stylesheet"/>
			<script src="js/jquery.min.js"></script>
			<script src="js/kendo.web.min.js"></script>	
			<script src="js/utils.js"></script>
		    </head>
		    <body>
				<div id="bg">
					<div id="outer">
						<div id="header">
							<div id="logo">
								<h1>
									<a href="#">Chick-fil-A Management System</a>
								</h1>
							</div>
							
							<div id="nav">
								
								<ul>
									<li class="first active">
										<a href="../home.php">Home</a>
									</li>									
									<li>
										<a href="../care.php">Customer Log</a>
									</li>
									<li>
										<a href="../late.php">Late Log</a>
									</li>
									<li>
										<a href="../sampling.php">Sampling</a>
									</li>
									<li>
										<a href="../leaders.php">Leadership Teams</a>
									</li>
									<li>
										<a href="../issues.php">Member Issues</a>
									</li>
									<li>
										<a href="../team.php">Member Info</a>
									</li>
									<li>
										<a href="../manage.php">Site Management</a>
									</li>
									<li>
										<a href="../logout.php">Logout</a>
									</li>
								</ul>
								<br class="clear" />
							</div>
						</div>
						<div id="main">
							<div id="sidebar1">'.
								$sideBar
							.'</div>		
							<div id="content">
								'.
								$mainContent	
								. '		
								<br class="clear" />
							</div>
							<br class="clear" />
						</div>
						<div id="footer">
							
							<br class="clear" />
						</div>
					</div>
					<div id="copyright">
						&copy; BSD | Design by FCT
					</div>
				</div>
		    </body>
		</html>';
	}

	function displayPageNoSideNav($mainContent)
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<!--

			Design by Free CSS Templates
			http://www.freecsstemplates.org
			Released for free under a Creative Commons Attribution License

			Name       : Reverse Obscurity
			Version    : 1.0
			Released   : 20130222

		-->
		<html xmlns="http://www.w3.org/1999/xhtml">
		    <head>
		        <meta name="keywords" content="" />
		        <meta name="description" content="" />
		        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<title>Chick-fil-A</title>
		        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css" />
		        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="style.css" />

				<!-- Kendo UI imports -->
				<link href="styles/kendo.common.min.css" rel="stylesheet"/>
				<link href="styles/kendo.silver.min.css" rel="stylesheet"/>
				<script src="js/jquery.min.js"></script>
				<script src="js/kendo.web.min.js"></script>	
			 
		    </head>
		    <body>
				<div id="bg">
					<div id="outer">
						<div id="header">
							<div id="logo">
								<h1>
									<a href="#">Chick-fil-A Management System</a>
								</h1>
							</div>
							
							<div id="nav">
								<ul>
									<li class="first active">
										<a href="../home.php">Home</a>
									</li>									
									<li>
										<a href="../care.php">Customer Log</a>
									</li>
									<li>
										<a href="../late.php">Late Log</a>
									</li>
									<li>
										<a href="../sampling.php">Sampling</a>
									</li>
									<li>
										<a href="../leaders.php">Leadership Teams</a>
									</li>
									<li>
										<a href="../issues.php">Member Issues</a>
									</li>
									<li>
										<a href="../team.php">Member Info</a>
									</li>
									<li class="last">
										<a href="../manage.php">Site Management</a>
									</li>
									<li>
										<a href="../logout.php">Logout</a>
									</li>
								</ul>
								<br class="clear" />
							</div>
						</div>
						<div id="main">							
							<div id="noSideContent">
								<div id="noSideBox1">'.
								$mainContent	
								. '</div>		
								<br class="clear" />
							</div>
							<br class="clear" />
						</div>
						<div id="footer">							
							<br class="clear" />
						</div>
					</div>
					<div id="copyright">
						&copy; BSD | Design by FCT
					</div>
				</div>
		    </body>
		</html>';
	}


?>