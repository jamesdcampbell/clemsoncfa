<html>
<head>
	<title>Dropbox Test</title>	
</head>
<body>
	<!--<input type="dropbox-chooser" name="selected-file" style="visibility: hidden;"/>-->
	<input type="dropbox-chooser" name="selected-file" id="db-chooser"/>
	<script type="text/javascript">
	    document.getElementById("db-chooser").addEventListener("DbxChooserSuccess",
	        function(e) {
	            alert("Here's the chosen file: " + e.files[0].link)
	        }, false);
	</script>
</body>
</html>