<?php
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	} else {
		include 'template/template.php';
		include 'includes/dbConnections.php';

		$sideNav = "<h3>Utilities</h3>";

		$mainPage = '<div id="noSideBox1">
			<h2>Sampling</h2>
				<div id="grid"></div>
							<script>
		 						$(document).ready(function () {		
		 																																																						            	 
			                        var crudServiceBaseUrl = "",
						           	dataSource = new kendo.data.DataSource({
			                            transport: {
			                             	read:  {
			                                    url: crudServiceBaseUrl + "/modules/getSamples.php?q=1",
			                                    dataType: "json"
			                                },
			                                update: {
			                                    url: crudServiceBaseUrl + "/modules/getSamples.php?q=2",
			                                    dataType: "json"
			                                },
			                                destroy: {
			                                    url: crudServiceBaseUrl + "/modules/getSamples.php?q=3",
			                                    dataType: "json"
			                                },
			                                create: {
			                                    url: crudServiceBaseUrl + "/modules/getSamples.php?q=4",
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
			                                        date: { editable: true, type: "date" },
			                                        product: { editable: true, validation: { required: true } },	                                        			                                        
								units: { editable: true, validation: { required: true } },	                                        			                                        
			                                        samplesGiven: { editable: true },
			                                        wholeProduct: { editable: false },
			                                        comments: { editable: true, validation: { required: true } }
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
				                            { field: "date", title: "Date", format: "{0:MM/dd/yyyy}", width: "90px" },
				                            { field: "product", title: "Product", width: "135px" },
				                            { field: "units", title: "Product Size", width: "105px" },
				                            { field: "samplesGiven", title: "Samples Given", width: "115px" },
				                            { field: "wholeProduct", title: "Whole Product Samp.", width: "154px" },
				                            { field: "comments", title: "Comments", editor: textareaEditor, width: "250px" },		                            
				                            { command: ["edit", "destroy"], title: "&nbsp;" }],
				                        editable: "popup"
				                    });									
										
				                    function textareaEditor(container, options) {
											    	$("<textarea data-bind=\"value: " + options.field + "\" cols=\"19\" rows=\"4\"></textarea>")
			        								.appendTo(container);
									}
								});
						</script>			
			</div>';

		displayPageNoSideNav($mainPage);

	}
?>