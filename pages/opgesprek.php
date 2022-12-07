<!DOCTYPE HTML>
<?php 


include_once("../includes/class.database.php");
if($userFetch['opgesprek'] == '0'){
    header("Location: home.php");
}
?>
<html lang="en">
<head>
	<title>District Blauw - Op Gesprek</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
	
	
	<link href="../css/ionicons.css" rel="stylesheet">
	
	
	<link rel="../stylesheet" href="css2/jquery.classycountdown.css" />
		
	<link href="../css/styles.css" rel="stylesheet">
	
	<link href="../css/responsive.css" rel="stylesheet">
	
</head>
<body>
	
	<div class="main-area">
		
		<section class="left-section" style="background-image: url(http://intranet.districtblauw.nl/img/alert.png)">
		
			<div class="display-table center-text">
				<div class="display-table-cell">
					
					
					
				</div><!-- display-table-cell -->
			</div><!-- display-table -->
			
		</section><!-- left-section -->
		
		
		<section class="right-section full-height">
		
			
			
			<div class="display-table">
				<div class="display-table-cell">
					<div class="main-content">
						<h1 class="title"><b>Oeps!</b></h1>
						<p>Je staat momenteel op gesprek. Neem zo snel mogelijk contact op met je leidinggevende!</p>

						
						
						
					</div><!-- main-content -->
				</div><!-- display-table-cell -->
			</div><!-- display-table -->
			
			
		
		</section><!-- right-section -->
		
	</div><!-- main-area -->
	
	<!-- SCIPTS -->
	
	<script src="../js/jquery-3.1.1.min.js"></script>
	
	<script src="../js/jquery.countdown.min.js"></script>
	
	<script src="../js2/scripts.js"></script>
	
</body>
</html>