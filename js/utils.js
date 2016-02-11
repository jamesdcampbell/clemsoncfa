$(document).ready(function() {

	/**************************************************************************************/
	
	/* File used in: care.php
	 * Purpose: to add and edit new customer issues (lol @ my naming scheme)
	 */

	$("#eIssue").click(function() {
		var a = $("#edir").val();
		var b = $("#etir").val();
		var c = $("#ecallTakenBy").val();
		var d = $("#ecustName").val();
		var e = $("#eaddr").val();
		var f = $("#ephoneOne").val();
		var g = $("#ephoneTwo").val();
		var h = $("#edoi").val();
		var i = $("#etoi").val();
		var j = $("#eteamMem").val();
		var k = $("#edetails").val();
		var l = $("#ehandled").val();
		var m = $('#efollowUp').attr('checked')?true:false;
		var n = $('#uValue').val();
		
		$.ajax({
			url: "/modules/getCareLog.php?q=5",
			type: "GET",
			data: {
				'dir' :  a,
				'tir' : b,
				'callTakenBy' : c,
				'custName' : d,
				'addr' : e,
				'phoneOne' : f,
				'phoneTwo' : g,
				'doi' : h,
				'toi' : i,
				'teamMem' : j,
				'details' : k,
				'handled' : l,
				'followUp' : m,
				'uValue' : n
			},
			success: function(data,textStatus) {
				//console.log(textStatus);
				//console.log(data);
				if(textStatus == "success") {
					$("#editIssue").hide("slow", function() {
						$("#issueEdited").show("slow");	
					});	
				}
				else {
					$("#editIssue").hide("slow", function() {
						$("#issueFail").show("slow");	
					});	
				}
			}

		});
	});

	$("#aIssue").click(function() {
		var a = $("#dir").val();
		var b = $("#tir").val();
		var c = $("#callTakenBy").val();
		var d = $("#custName").val();
		var e = $("#addr").val();
		var f = $("#phoneOne").val();
		var g = $("#phoneTwo").val();
		var h = $("#doi").val();
		var i = $("#toi").val();
		var j = $("#teamMem").val();
		var k = $("#details").val();
		var l = $("#handled").val();
		var m = $('#followUp').attr('checked')?true:false;
			
		$.ajax({
			url: "/modules/getCareLog.php?q=3",
			type: "GET",
			data: {
				'dir' :  a,
				'tir' : b,
				'callTakenBy' : c,
				'custName' : d,
				'addr' : e,
				'phoneOne' : f,
				'phoneTwo' : g,
				'doi' : h,
				'toi' : i,
				'teamMem' : j,
				'details' : k,
				'handled' : l,
				'followUp' : m
			},
			success: function(data,textStatus) {
				//console.log(textStatus);
				//console.log(data);
				if(textStatus == "success") {
					$("#addIssue").hide("slow", function() {
						$("#issueAdded").show("slow");	
					});	
				}
				else {
					$("#addIssue").hide("slow", function() {
						$("#issueFail").show("slow");	
					});	
				}
			}

		});
	});
	
	/**************************************************************************************/
	
	/* File used in: team.php
	 * Purpose: Code to update password and take care of display appropriate messages
	 */

	$("#updatePass").click(function() {
		var a = $("#currPass").val();
		var b = $("#newPass").val();
		var c = $("#newPassConf").val();
			
		$.ajax({
			url: "/modules/changePass.php",
			type: "GET",
			data: {
				'currPass' :  a,
				'newPass' : b,
				'newPassConf' : c				
			},
			success: function(data,textStatus) {
				//console.log(textStatus);
				//console.log(data);
				if(textStatus == "success") {
					$("#changePassword").hide("slow", function() {
						// 1 lets us know the password was successfully updated (no end user errors)
						if(data == "1") {
							$("#updateSuccess").show("slow");
						}
						// else a 0 and they've made a mistake
						else {
							$("#updateFailed").show("slow");	
						}
						
					});	
				}
				else {
					$("#changePassword").hide("slow", function() {
						$("#procError").show("slow");	
					});	
				}
			}

		});						                    
		
		$("#procReturn").click(function() {
			$("#procError").hide("slow",function() {
				$("#grid").show("slow");
			});
		});

		$("#failReturn").click(function() {
			$("#updateFailed").hide("slow",function() {
				$("#grid").show("slow");
			});
		});

		$("#successReturn").click(function() {
			$("#updateSuccess").hide("slow",function() {
				$("#grid").show("slow");
			});
		});

		/**************************************************************************************/
	});
});