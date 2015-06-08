<?php
	require('includes/include.php');
	if(!isset($_SESSION['eRaiderUsername'])){
	echo 'Not authorized.';
	exit;
	}
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>Hiring Managers - Student Assistants</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<!--styles-->
		<link type="text/css" media="all" rel="stylesheet" href="../../../../styles/libstyle.css"  />
		<link type="text/css" media="print" rel="stylesheet" href="../../../../styles/ttuPrint.css" />
		<link rel="shortcut icon" href="../../../../styles/images/favicon.ico" />
		<link type="text/css" media="all" rel="stylesheet" href="styles/hmea.css" />
		<link rel="stylesheet" type="text/css" href="sweetAlert/sweetalert.css">
		
		<!--[if lte IE 6]>
		<link rel="stylesheet" type="text/css" href="../../styles/ie.css" />
		<![endif]-->
		
		<!--nav scripts-->
		<style type="text/css">
		<!--
		.style1 {color: #FF0000}
		.style3 {font-size: 15px}
		.style5 {color: #000000}
		.style11 {color: #FF3333}
		-->
		</style>
		<script src="../../../../scripts/LeftNav.js" type="text/javascript"></script>
		<script src="../../../../scripts/TopNav.js" type="text/javascript"></script>
	</head>
	<body>
		<!-- **ADA LINKS** -->
		
		<div id="skipLinks">
			skip to: <a href="#pageContent">page content</a> | <a href="#pageNav">links on this page</a> | <a href="#siteNav">site navigation</a> | <a href="#pageFooter">footer (site information)</a>
		</div>

		<div id="container">
			
		<!-- BEGINNING OF LOGO AND UPPER NAVIGATION REGION: MASTHEAD  *  SEARCH FORM FOR WHOLE SITE -->

		<div id="masthead">

			<a href="../../../../index.php" id="logo" class="imgswap" title="Home" name="top">Texas Tech University Libraries</a>
		
			<form action="http://google.ttu.edu/search" method="get" id="search-box" style="margin-bottom: 0"><label for="q"></label>
				<input id="q" type="text" name="q" value="Search Library Website" onfocus="this.value=''"/><input type="hidden" name="site" value="Library" />
				<input type="hidden" name="client" value="texas_tech" /><input type="hidden" name="proxystylesheet" value="styles/ttuSearch.css" />
				<input type="hidden" name="output" value="xml_no_dtd" /><input type="hidden" name="restrict" value="" />
				<input class="button" type="image" name="submit" src="../../../../styles/images/search-arrow.gif" alt="Search" />
			</form>

		</div>

		<div id="topSubjectBanner-employment" class="topSubjectBanner"></div> 
	<!-- LEFT HAND NAVIGATION BAR -->

		<?php include("../../../../includes/leftNav.html"); ?>         
		
		<div id="topmneu-c">
		<?php include("../../../../includes/topNav.html"); ?>
		</div>

		<a name="pageContent"></a> 
		
		
		<div id="content">
				
		<h1><br />Hiring Managers - Student Assistants</h1>
		
		<!--content begins here-->
		<form action="add-do.php" name="form" method="post" onsubmit="return ValidateEmail(document.form.email)"> 
			<label for="position" class="text-hmea">Position Number:</label>
			<input name="position" type="text" size="4" maxlength="3" class="input-hmea" onkeyup="check4Dup(this.value)" required/>
			<p id="alert"></p>
				<br />
				<br />
			<label for="email" class="text-hmea">E-mail Address:</label>&nbsp;&nbsp;
			<input name="email" type="email" size="30" maxlength="100" required placeholder="example@ttu.edu" class="input-hmea"/>
			<br /><br />
			<input type="submit" value="ADD" class="btn-add" /> 
		</form>
		<br /><br />
		
		<form action="index.php" method="post">
			<input type="submit" value="BACK" class="btn-add" />
		</form><br /><br />
		
		<?php  eRaiderShowSignoutButton();  ?>
		</div>
		<!--end content-->        
		
		</div>
		<?php include("../../../../includes/footer.html"); ?>
		
		<script src="../../../../scripts/LeftNav.js" type="text/javascript"></script>
		<script src="../../../../scripts/TopNav.js" type="text/javascript"></script>
		<script src="sweetAlert/sweetalert.min.js"></script>
		<script>
			function ValidateEmail(input){
				var emailFormat = /.+(@ttu.edu)/;
				
				if(input.value.match(emailFormat)){
					swal({
						title: "Success",
						text:"Submission was successful.",
						timer: 5000,
						showConfirmButton: false
					});
					return true;
				}
				else {
					swal("Error", "You entered an invalid email address.", "error");
					event.preventDefault();
					document.form.email.focus();
					return false;
				}
			}
			
			function check4Dup(str) {
				if (str.toString().length == 0){
					console.log("empty!");
					return;
				}
				
				else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("alert").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "check.php?q=" + str.toString(), true); // Want to request asynchronously, so use value true.
					xmlhttp.send();
				}
			}
		</script>
	</body>
</html>
