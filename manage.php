<?php
        session_start();

        if(!isset($_SESSION['id'])) {
                header("Location: index.php");
                exit;
        } else {
        	include 'template/template.php';
        	include 'includes/dbConnections.php';

        	$query = $db->prepare("SELECT motd,notes,leaderShipNotes FROM HomePage");
        	$query->execute();
        	$data = $query->fetch(PDO::FETCH_ASSOC);

        	displayPageNoSideNav('
        	
			<script>
			$(document).ready(function() {										        	            			            
				// create Editor from textarea HTML element with default set of tools
        			$("#motdEditor").kendoEditor();												        					    																									        					    							
        			$("#notesEditor").kendoEditor();
        			$("#leaderNotes").kendoEditor();												        					    																									        					    							
			});
			</script>	
                        <form action="modules/edits.php" method="POST">
                                <table width = "100%" border = "0">
                                        <tr>

                                                <td id="tableHeading"><center><hr><br />Message of the Day<br /><br /><hr></center></td>

                                                <td id="tableHeading"><center><hr><br />Notes<br /><br /><hr></center></td>
                                        </tr>
                                        <tr>
                                        	<td><center><textarea id="motdEditor" name="motd" rows="10" cols="10" style="width:440px;height:340px">'
                                        		. stripslashes($data['motd']) .
                                        	'</textarea>
                                        	<input type="checkbox" name="motdEmail" value="1" /> Email MOTD </center>
                                        	</td>
                                        	
                                        	<td><center><textarea id="notesEditor" name="notes" rows="10" cols="30" style="width:440px;height:340px">'
                                        		. stripslashes($data['notes']) .
                                        	'</textarea>
                                        	<input type="checkbox" name="notesEmail" value="1" /> Email Notes </center>
                                        	</td> 
                                        </tr>
                                        <tr>
                                        	<td id="tableHeading" colspan="2"><center><hr style="width: 50%;"><br />Leadership Notes<br /><br /><hr style="width: 50%;"></center></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2">
	                                        	<center><textarea id="leaderNotes" name="lsNotes" rows="10" cols="30" style="width:440px;height:340px">'
	                                        		. stripslashes($data['leaderShipNotes']) .
	                                        	'</textarea>
	                                        <input type="checkbox" name="lsNotesEmail" value="1" /> Email Leadership Notes </center>	
                                        	</td>
                                        </tr>
                                        <tr>
                        	                <td style="padding: 20px" colspan="2"><center><input id="motd_notes" type="submit" value="Update" /></center></td>
                                        </tr>
                                </table>
                        </form>
        		');
        }
?>