<?php
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		include 'includes/dbConnections.php';

		// preparing SQL statement
		$query = $db->prepare("SELECT id,teamName,inUse FROM teams");

		// executes the query
		$query->execute();

		// fetch the results from the query that was executed	
		$sideBar = "<h3>Leadership Focus Teams</h3>";
		$sideBar .= '<button type="button" class="issueName" name="id" value="100">Cleanliness and Maintenance</button><br />';
		$sideBar .= '<button type="button" class="issueName" name="id" value="200">Speed of Service and Taste of Food</button><br />';
		$sideBar .= '<button type="button" class="issueName" name="id" value="300">Service</button><br />';
		$notInUse = "";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {	
			if($row['inUse'] == 0)
			{
				$sideBar .= '<button type="button" class="issueName" name="id" value="'.$row['id'].'">'.$row['teamName'].'</button><br />';
			}
			else
			{
				$notInUse .= '<button type="button" class="changeName" name="id" value="'.$row['id'].'">'.$row['teamName'].'</button><br />';
			}
		}	 
		
		$sideBar .= $notInUse;

		// displayPage() (in template.php)
		displayPage($sideBar,
				'<div id="box1">
				<h2 id="sName">Leadership Focus Teams - Select a team</h2>
						<div id="changeTeamName">
							<form method="GET" action="/modules/updateTabs.php">
								<fieldset style="float: left; width: 40%; height: 275px;">
									<legend>New Team Name</legend>
										Team Name:<br />
										<input type="text" name="team" id="team"><br />
										<input type="hidden" id="teamID" name="teamID" value="" />
										<input type="submit" name="submit" value="Set Team Name" />													
								</fieldset>
							</form>
						</div>
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
			                                        goal: { editable: true, validation: { required: true } },	                                        
			                                        numGoal: { editable: true},
			                                        ranking: { editable: true },
			                                        dateGoalAdded: { editable: true, type: "date" },
			                                        dateNumGoal: { editable: true, type: "date"  },
			                                        dateRanking: { editable: true, type: "date" },
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
							    { field: "dateGoalAdded", title: "Goal Date", format: "{0:MM/dd/yyyy}", width: "95px", filterable: true },			                            
				                            { field: "goal", title: "Goal", editor: textareaEditor, width: "200px", filterable: true },
				                            { field: "dateNumGoal", title: "Number Date", format: "{0:MM/dd/yyyy}", width: "110px", filterable: true },
				                            { field: "numGoal", title: "Number Goal", width: "100px", filterable: true},
				                            { field: "dateRanking", title: "Rank Date", format: "{0:MM/dd/yyyy}", width: "95px", filterable: true },
				                            { field: "ranking", title: "Ranking", width: "85px", filterable: true },
				                            { field: "email", title: "Email Out?", hidden: true, editor: "<input type=\'checkbox\' name=\'emailOut\' value=\'0\' />" },		                            				                            				                            				                            				                            				                            
							    { command: ["edit", "destroy"], title: "&nbsp;" }],
				                        editable: "popup"
				                    });									

		   							$(".issueName").click(function () {
		   								$("#changeTeamName").hide();
		   								$("#grid").show();
		   								$("#sName").html("Leadership Focus Teams - " + $(this).html());
		   								var grid = $("#grid").data("kendoGrid");
										grid.dataSource.transport.options.read.url = "/modules/getLeadership.php?id=" + $(this).attr("value") + "&q=1";
										grid.dataSource.transport.options.update.url = "/modules/getLeadership.php?id=" + $(this).attr("value") + "&q=2"; 
										grid.dataSource.transport.options.destroy.url = "/modules/getLeadership.php?id=" + $(this).attr("value") + "&q=3"; 
										grid.dataSource.transport.options.create.url = "/modules/getLeadership.php?id=" + $(this).attr("value") + "&q=4"; 
										dataSource.read();	
												        					    						
									});
									
									$(".changeName").click(function () {
										$("#grid").hide();
		   								$("#teamID").val($(this).attr("value"));
		   								$("#changeTeamName").show();		   										   																				       					    						
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