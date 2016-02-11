<?php
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		include 'includes/dbConnections.php';

		// preparing SQL statement
		$query = $db->prepare("SELECT id,fName,lName FROM TeamMemberInfo ORDER BY lName ASC");

		// executes the query
		$query->execute();

		// fetch the results from the query that was executed	
		$sideBar = "<h3>Team Members</h3>";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {	
			$sideBar .= '<button type="button" class="issueName" name="id" value="' . $row['id'] . '">' . $row['fName'] . " " . $row['lName'] . '</button><br />';
		}	 

		// displayPage() (in template.php)
		displayPage($sideBar,
				'<div id="box1">
				<h2 id="sName">Team Member Issues - Select a name</h2>
						<div id="grid" style="display: none;">
							<script>
		 						$(document).ready(function () {		
		 																																																						            	 
			                        var dataSource = new kendo.data.DataSource({
			                            transport: {
			                                read:  {
			                                    url: "",
			                                    dataType: "json"
			                                },
			                                update: {
			                                    url: "",
			                                    dataType: "json"	                                   
			                                },
			                                destroy: {
			                                    url: "",
			                                    dataType: "json"
			                                },
			                                create: {
			                                    url: "",
			                                    dataType: "json"	                                         									        								    									
			                                },
			                                parameterMap: function(options, operation) {
			                                    if (operation !== "read" && options.models) {
			                                        return {models: kendo.stringify(options.models)};
			                                    }
			                                }
			                            },
			                            batch: true,
			                            pageSize: 10,	                            	                            
			                            schema: {
			                                model: {
			                                    id: "uniqueID",
			                                    fields: {
			                                    	uniqueID: { editable: false, nullable: true },
			                                        memID: { editable: false, nullable: true },
			                                        name: { editable: true, validation: { required: true } },	                                        
			                                        dateOfIncident: { editable: true, type: "date" },
			                                        managerName: { editable: true },
			                                        issue: { editable: true, validation: { required: true } },
			                                        email: {editable: true}
			                                    }
			                                }
			                            }
			                            
			                        });		                    												

				                    $("#grid").kendoGrid({
				                    	autoBind: false,
				                        dataSource: dataSource,
				                        sortable: true,
				                        resizable: true,
				                        pageable: true,
				                        height: 500,		                        
				                        toolbar: ["create"],				                       				                       
				                        columns: [				                            
				                            { field: "name", title: "Employee Name", width: "120px", filterable: true },
				                            { field: "dateOfIncident", title: "Date", format: "{0:MM/dd/yyyy}", width: "110px", filterable: false },
				                            { field: "managerName", title: "Manager Name", width: "150px", filterable: false },
				                            { field: "issue", title: "Issue", width: "250px", editor: textareaEditor, filterable: true },
				                            { field: "email", title: "Email Out?", hidden: true, editor: "<input type=\'checkbox\' name=\'emailOut\' value=\'0\' />" },		                            
				                            { command: ["edit", "destroy"], title: "&nbsp;" }],
				                        editable: "popup"
				                    });									

		   							$(".issueName").click(function () {
		   								$("#grid").show();
		   								$("#sName").html("Team Member Issues - " + $(this).html());
		   								var grid = $("#grid").data("kendoGrid");
										grid.dataSource.transport.options.read.url = "/modules/getIssues.php?id=" + $(this).attr("value") + "&q=1";
										grid.dataSource.transport.options.update.url = "/modules/getIssues.php?id=" + $(this).attr("value") + "&q=2"; 
										grid.dataSource.transport.options.destroy.url = "/modules/getIssues.php?id=" + $(this).attr("value") + "&q=3"; 
										grid.dataSource.transport.options.create.url = "/modules/getIssues.php?id=" + $(this).attr("value") + "&q=4"; 
										dataSource.read();	
												        					    						
									});	
										
				                    function textareaEditor(container, options) {
											    	$("<textarea data-bind=\"value: " + options.field + "\" cols=\"19\" rows=\"4\"></textarea>")
			        								.appendTo(container);
									}
								});
						</script>
					</div>
					</div>');
	}
?>