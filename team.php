<?php
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		   
		$mainPage = '			<div id="box1">
								<h2>Team Member Information</h2>
								<div id="updateSuccess">
									<center>Password updated successfully..<br /><br />
									<input type="submit" class="lateName" id="successReturn" value="Return to Team Members"/></center>
								</div>
								<div id="updateFailed">
									<center>Password failed to update. Please make sure you have entered the correct old password and that the new passwords match.<br /><br />
									<input class="lateName" type="submit" id="failReturn" value="Return to Team Members"/></center>
								</div>
								<div id="procError">
									<center>Oops..something went wrong with the system. Please try to update your password again.<br /><br />
									<input class="lateName" type="submit" id="procReturn" value="Return to Team Members"/></center>
								</div>
								<div id="changePassword">
									<label for="currPass">Current Password:</label>
									<input type="password" id="currPass" name="currPass" /><br /><br />
									<label for="newPass">New Password:</label>
									<input type="password" id="newPass" name="newPass" /><br /><br />
									<label for="newPassConf">Confirm Password:</label>
									<input type="password" id="newPassConf" name="newPassConf" /><br /><br />
									<input type="submit" class="lateName" id="updatePass" value="Update" name="updatePass" />
								</div>
								<div id="grid">								
									<script>
		                $(document).ready(function () {
		                
		                  var crudServiceBaseUrl = "",
		                        dataSource = new kendo.data.DataSource({
		                            transport: {
		                                read:  {
		                                	url: crudServiceBaseUrl + "/modules/members.php?q=1",
		                                	dataType: "json",						                                										            
		                                
		                                },
		                                update: {
		                                    url: crudServiceBaseUrl + "/modules/members.php?q=2",
		                                    dataType: "json"
		                                },
		                                destroy: {
		                                    url: crudServiceBaseUrl + "/modules/members.php?q=3",
		                                    dataType: "json"
		                                },
		                                create: {
		                                    url: crudServiceBaseUrl + "/modules/members.php?q=4",
		                                    dataType: "json"
		                                },
		                                parameterMap: function(options, operation) {
		                                    if (operation !== "read" && options.models) {
		                                        return {models: kendo.stringify(options.models)};
		                                    }
		                                }
		                            },
		                            error: function (xhr, error) {
					        console.debug(xhr); console.debug(error);
					    },
		                            batch: true,
		                            pageSize: 10,					                          
		                            schema: {
		                                model: {
		                                    id: "memberID",
		                                    fields: {
		                                        memberID: { editable: false, nullable: true },
		                                        firstName: { editable: true, validation: { required: true } },
		                                        lastName: { editable: true, validation: { required: true} },
		                                        phoneNumber: { editable: true },
		                                        emailAddress: { editable: true },
												position: { editable: true, nullable:false },
		                                        canLogin: { type: "boolean", editable: true}
		                                    }
		                                }
		                            }
		                        });

		                    $("#grid").kendoGrid({
		                        dataSource: dataSource,					                       
		                        sortable: true,
		                        resizable: true,
		                        pageable: true,
		                        height: 500,
		                        toolbar: ["create"],
		                        columns: [						                        	
		                            { field: "firstName", title: "FirstName", width: "110px" },
		                            { field: "lastName", title: "LastName", width: "110px" },
		                            { field: "phoneNumber", title: "Phone #", width: "100px" },
		                            { field: "emailAddress", title: "Email", width: "200px" },
		                            { field: "position", title: "Front/Back", width: "75px" },
		                            { field: "canLogin", title: "Manager", width: "75px" },
		                            { command: ["edit", "destroy"], title: "&nbsp;" }],
		                        editable: "popup"
		                    });
		                    		

		                    $("#bUpdatePW").click(function() {
		                    	$("#currPass").val("");
		                    	$("#newPass").val("");
		                    	$("#newPassConf").val("");
								$("#procError").hide();
								$("#updateFailed").hide();
								$("#updateSuccess").hide();
								$("#grid").hide("slow", function() {									    									
									$("#changePassword").show("slow");	    												    										
								});		    									
							});																					

		        	});
	 		</script>
	           			 		</div>';

		$sideBar = "<h3>Utilities</h3>
					<button id='bUpdatePW' class='lateName'>Change Password</button>";

		displayPage($sideBar,$mainPage);
}
?>