<?php

	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		include 'includes/dbConnections.php';

		$mainContent = '
		<div id="box1">
		<h2>
			Customer Care Log
		</h2>
		<div id="grid"></div>
		<div id="issueAdded">
			<center>Issue has been added.. <br /><br />
			<input class="lateName" type="submit" id="rCustLog" value="Return to Care Log" /></center>
		</div>
		<div id="issueEdited">
			<center>Issue has been updated.. <br /><br />
			<input class="lateName" type="submit" id="erCustLog" value="Return to Care Log"/></center>
		</div>
		<div id="issueFail">
			Oops..something went wrong while adding this issue. Please try again.							
		</div>
		<div id="editIssue">
				<fieldset style="float: left; width: 40%; height: 275px;">
					<legend>Call Information</legend>
						Date Incident Reported:<br />
						<input type="text" name="edir" id="edir"><br />
						Time Incident Reported:<br />
						<input type="text" name="etir" id="etir"><br />
						Call Taken By: <br />
						<input type="text" name="ecallTakenBy" id="ecallTakenBy"><br />
				</fieldset>
				<fieldset style="float: right; width:40%; height: 275px;">
					<legend>Customer Information</legend>
						Name:<br />
						<input type="text" name="ecustName" id="ecustName"><br />
						Address:<br />
						<input type="text" name="eaddr" id="eaddr"><br />
						Phone 1:<br />
						<input type="text" name="ephoneOne" id="ephoneOne"><br />
						Phone 2:<br />
						<input type="text" name="ephoneTwo" id="ephoneTwo"><br />
				</fieldset><br />
				<fieldset>
					<legend>Issue</legend>
					<div id="leftIssue">
						Date of Incident:<br />
						<input type="text" name="edoi" id="edoi"><br />
						Time of Incident:<br />
						<input type="text" name="etoi" id="etoi"><br />
						Team Member:<br />
						<input type="text" name="eteamMem" id="eteamMem"><br />
					</div>
					<div id="rightIssue">
						Details:<br />
						<textarea name="edetails" id="edetails"></textarea><br />
						How Was it Handled?:<br />
						<textarea name="ehandled" id="ehandled"></textarea><br />
						Follow Up?:<input type="checkbox" value="yes" name="efollowUp" id="efollowUp">
					</div>
				</fieldset>	
				<input type="hidden" id="uValue" name="uValue" value=""/>
				<center><input class="lateName" type="submit" id="eIssue" value="Update Customer Issue"></center>
		</div>
		<div id="addIssue">
				<fieldset style="float: left; width: 40%; height: 275px;">
					<legend>Call Information</legend>
						Date Incident Reported:<br />
						<input type="text" name="dir" id="dir"><br />
						Time Incident Reported:<br />
						<input type="text" name="tir" id="tir"><br />
						Call Taken By: <br />
						<input type="text" name="callTakenBy" id="callTakenBy"><br />
				</fieldset>
				<fieldset style="float: right; width:40%; height: 275px;">
					<legend>Customer Information</legend>
						Name:<br />
						<input type="text" name="custName" id="custName"><br />
						Address:<br />
						<input type="text" name="addr" id="addr"><br />
						Phone 1:<br />
						<input type="text" name="phoneOne" id="phoneOne"><br />
						Phone 2:<br />
						<input type="text" name="phoneTwo" id="phoneTwo"><br />
				</fieldset><br />
				<fieldset>
					<legend>Issue</legend>
						<div id="leftIssue">
							Date of Incident:<br />
							<input type="text" name="doi" id="doi"><br />
							Time of Incident:<br />
							<input type="text" name="toi" id="toi"><br />
							Team Member:<br />
							<input type="text" name="teamMem" id="teamMem"><br />
						</div>
						<div id="rightIssue">
							Details:<br />
							<textarea name="details" id="details"></textarea><br />
							How Was it Handled?:<br />
							<textarea name="handled" id="handled"></textarea><br />
							Follow Up?:<input type="checkbox" value="yes" name="followUp" id="followUp">
						</div>
				</fieldset>	
					<center><input class="lateName" type="submit" id="aIssue" value="Add Customer Issue"></center>
				


		</div>
		<script type="text/x-kendo-template" id="template">
			<div class="tabstrip">
				<ul>			                        
					<li class="k-state-active">
						Call Information
					</li>
					<li>
						Issue Information
					</li>
				</ul>			                 
				<div>
					<div class="employee-details">
						<ul>
							<li><label>Date Incident Reported: </label>#= dateCall #</li>
							<li><label>Time Incident Reported: </label>#= callTime #</li>
							<li><label>Call Taken By: </label>#= callTakenBy #</li>			                                
						</ul>
					</div>			                    
				</div>
				<div>
					<div class="employee-details">
						<ul>
							<li><label>Date of Incident: </label>#= doi #</li>
							<li><label>Time of Incident: </label>#= toi #</li>
							<li><label>Team Member: </label>#= tMemberIssue #</li>
							<li><label>Details: </label>#= details #</li>
							<li><label>How was it handled?: </label>#= handled #</li>			                                
						</ul>
					</div>
				</div>
			</div>
		</script>
			<script>
	$(document).ready(function() {										        	            
			var crudServiceBaseUrl = "",
			dataSource = new kendo.data.DataSource({
				transport: {
					read:  {
						url: crudServiceBaseUrl + "/modules/getCareLog.php?q=1",
						dataType: "json"
					},	                               
					destroy: {
						url: crudServiceBaseUrl + "/modules/getCareLog.php?q=2",
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
							custName: { editable: false},	                                        
							dateCall: { editable: false},
							callTime: { editable: false},
							callTakenBy: { editable: false },
							doi: { editable: false },	                                        
							toi: { editable: false },
							details: { editable: false },
							followUp: { editable: false },
							address: { editable: false, nullable: true },
							phoneOne: { editable: false, nullable: true },
							phoneTwo: { editable: false, nullable: true },
							tMemberIssue: { editable: false, nullable: true },
							handled: { editable: false, nullable: true }
						}
					}
				}
			});

			$("#grid").kendoGrid({
				dataSource: dataSource,
				sortable: true,
				scrollable: true,
				pageable: true,
				height: 500,
				filterable: {
					extra: false,
					operators: {
						string: {	                            				                            				                            			
							contains: "Contains",
							eq: "Equal to",
							neq: "Not equal to"                       			                            			
						}
					}
				},
				 detailTemplate: kendo.template($("#template").html()),
		detailInit: detailInit,
		dataBound: function() {                            
		},                            	                    		                       
				columns: [				                            
					{ field: "custName", title: "Customer Name", width: "135px", filterable: true },
					{ field: "phoneOne", title: "Phone One", width: "105px", filterable: true },
					{ field: "phoneTwo", title: "Phone Two", width: "105px", filterable: true },
					{ field: "address", title: "Address", width: "200px", filterable: true },		                            		                            		                            
					{ field: "doi", title: "Incident Date", format: "{0:MM/dd/yyyy}", width: "110px", filterable: false },																		
					{ command: [{ text: "Edit", click: showDetails },"destroy"], title: "&nbsp;" }],	
					editable: "popup"		                            		                        
			});

			function detailInit(e) {
				var detailRow = e.detailRow;

				detailRow.find(".tabstrip").kendoTabStrip({
					animation: {
						open: { effects: "fadeIn" }
					}
				});

				
			}		

			detailsTemplate = kendo.template($("#template").html());

			function showDetails(e) {
				e.preventDefault();																	
				//console.log(this.dataItem($(e.currentTarget).closest("tr")).uniqueID);								
				var id = this.dataItem($(e.currentTarget).closest("tr")).uniqueID;
				$("#grid").hide("slow", function() {	
					$.ajax({
						url: "/modules/getCareLog.php?q=4",
						type: "GET",
						data: {
							"id": id
						},
						success: function(data,textStatus) {
							if(textStatus == "success") {
								  var result = $.parseJSON(data);
								  //console.log(result);
								  $("#uValue").val(result[0].uniqueID);
								  $("#ecustName").val(result[0].custName);
								  $("#edir").val(result[0].dateCall);
								  $("#etir").val(result[0].callTime);
								  $("#ecallTakenBy").val(result[0].callTakenBy);
								  $("#edoi").val(result[0].doi);
								  $("#etoi").val(result[0].toi);
								  $("#edetails").val(result[0].details);						    					 
								  $("#eaddr").val(result[0].address);
								  $("#ephoneOne").val(result[0].phoneOne);
								  $("#ephoneTwo").val(result[0].phoneTwo);
								  $("#eteamMem").val(result[0].tMemberIssue);
								  $("#ehandled").val(result[0].handled);

								  // activate checkboxes depending on if follow has been taken
								  if(result[0].followUp == "true") {
									$("#efollowUp").prop("checked",true);
								  }
								  else {
									$("#efollowUp").prop("checked",false);	
								  }				  
							}
						}
					});		

					$("#editIssue").show("slow");	
				});									
			}					

			function textareaEditor(container, options) {
							$("<textarea data-bind=\"value: " + options.field + "\" cols=\"20\" rows=\"4\"></textarea>")
							.appendTo(container);
			}

			$("#addCustCare").click(function() {
					$("#editIssue").hide();
					$("#issueEdited").hide();
					$("#issueAdded").hide();
					$("#grid").hide("slow", function() {
						$("#addIssue").show("slow");	
					});									
			});						
			
			$("#erCustLog").click(function() {
					$("#issueEdited").hide("slow", function() {									    									
						$("#grid").show("slow",function() {
							var grid = $("#grid").data("kendoGrid");     									
							dataSource.read();
						});	
						
					});									
			});

			$("#rCustLog").click(function() {
					$("#custName").val("");
						$("#dir").val("");
						$("#tir").val("");
						$("#callTakenBy").val("");
						$("#doi").val("");
						$("#toi").val("");
						$("#details").val("");						    					 
						$("#addr").val("");
						$("#phoneOne").val("");
						$("#phoneTwo").val("");
						$("#teamMem").val("");
						$("#handled").val("");
						$("#followUp").prop("checked",false);
					
					$("#issueAdded").hide("slow", function() {									    									
						$("#grid").show("slow",function() {
							var grid = $("#grid").data("kendoGrid");     									
							dataSource.read();
						});	
						
					});									
			});																			        					    																									        					    							
	});
</script>
</div>				 
							';

		$sideBar = '<h3>Utilities</h3>
		<button type="button" id="addCustCare" class="lateName">Add Customer Issue</button><br/>
		</br>';
		$sideBar .= '<h3>Customer Follow Ups</h3>';

		$query = $db->prepare("SELECT customerName,incidentDate FROM Incident WHERE followUp='true'");
		$query->execute();

		$sideBar .= '<ul>';
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$sideBar .= '<li>- ' . $row['customerName'] . " " . $row['incidentDate'] . '</li>';
		}
		$sideBar .= '</ul>';

		displayPage($sideBar,$mainContent);
	}	
?>