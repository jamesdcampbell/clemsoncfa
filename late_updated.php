<?php
include "performance/includes/init.php";
include "header.php";

		// preparing SQL statement
		$employees = CfaEmployee::getAll();

		// fetch the results from the query that was executed	
		$sideBar = "<h3>Team Members</h3>";
		foreach($employees as $row)
		{
			$sideBar .= '<button type="button" class="lateName" name="id" value="' . $row->id . '">' . $row->fName . " " . $row->lName . '</button><br />';
		}

		// call displayPage() (in template.php)	 
		/*displayPage($sideBar,'<div id="box1">
			<h2 id="sName">Late Log - Select a name</h2>
						<div id="grid" style="display: none;">
							<script>
							$(document).ready(function() {																																			        
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
		                                        date: { editable: true, type: "date" },
		                                        timeArrived: { editable: true, validation: { required: true } },
		                                        schedTime: { editable: true, validation: { required: true } },
		                                        managerName: { editable: true },
		                                        comments: { editable: true, validation: { required: true } }
		                                    }
		                                }
		                            }
		                        });

			                    $("#grid").kendoGrid({
			                        dataSource: dataSource,
			                        sortable: true,
			                        pageable: true,		                        
			                        height: 500,
			                        toolbar: ["create"],
			                        columns: [				                            
			                            { field: "name", title: "Employee Name", width: "120px" },
			                            { field: "date", title: "Date", format: "{0:MM/dd/yyyy}", width: "90px" },
			                            { field: "timeArrived", title: "Time Arrived", width: "100px" },
			                            { field: "schedTime", title: "Sched. Arrival", width: "110px" },
			                            { field: "managerName", title: "Manager Name", width: "115px" },
			                            { field: "comments", title: "Comments", width: "140px",editor: textareaEditor },		                            
			                            { command: ["edit", "destroy"], title: "&nbsp;"}],
			                        editable: "popup"
			                    });	

			                    $(".lateName").click(function () {
			                    		
			                    	$("#sName").html("Late Log - " + $(this).html());	
			                    	$("#grid").show();			
									var grid = $("#grid").data("kendoGrid");
									grid.dataSource.transport.options.read.url = "/modules/getLate.php?id=" + $(this).attr("value") + "&q=1";
									grid.dataSource.transport.options.update.url = "/modules/getLate.php?id=" + $(this).attr("value") + "&q=2"; 
									grid.dataSource.transport.options.destroy.url = "/modules/getLate.php?id=" + $(this).attr("value") + "&q=3"; 
									grid.dataSource.transport.options.create.url = "/modules/getLate.php?id=" + $(this).attr("value") + "&q=4"; 
									dataSource.read();					        					    		
								});

			                    function textareaEditor(container, options) {
										    	$("<textarea data-bind=\"value: " + options.field + "\" cols=\"19\" rows=\"4\"></textarea>")
		        								.appendTo(container);
								}													        					    												
							});
						</script>
						</div>
						</div>');*/
?>