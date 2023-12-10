<?php include_once "./includes/class.database.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Intranet | Inloggen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="shortcut icon" href="./logo.png" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./login/css/main.css">
<!--===============================================================================================-->

</head>
<body>
	<div class="size1 bg0 where1-parent">
		<!-- Coutdown -->
		<div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('https://district-rijnmond.net/unknown2.png');">
			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">

			</div>
		</div>

		<!-- Form -->
		<div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
			<div class="wrap-pic1">
				<img width="150" height="150"src="https://cdn.discordapp.com/attachments/1010341507632468029/1013178395229696100/lms_logo_rgb_246h2.png" alt="LOGO">
			</div>

			<div class="p-t-50 p-b-60">
		
				<p class="m1-txt1 p-b-36">
					<span class="m1-txt2">My Intranet</span> | Inloggen</br>
					
					
					 <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        if($sQuery = $db->query("SELECT salt FROM users WHERE email='".$db->real_escape_string($_POST['email'])."'")){
                            $sFetch = $sQuery->fetch_assoc();
                            if($lQuery = $db->query("SELECT id FROM users WHERE email='".$db->real_escape_string($_POST['email'])."' AND password='".crypt($_POST['password'], $sFetch['salt'])."'")){
                                if($lQuery->num_rows > 0){
                                    $_SESSION['email'] = $_POST['email'];
                                    ?><script>
                                    window.location = '<?php echo $site; ?>/home';
                                    </script><?php
                                }else{
                                    echo "Je email of wachtwoord klopt niet.";
                                }    
                            }else{
                                echo "Er is iets misgegaan. Foutmelding: ".$db->error;
                            }
                        }else{
                            echo "Er is iets misgegaan. Foutmelding: ".$db->error;
                        }
                    }    
                    ?>

				<form  role="form" action="" method="POST" class="contact100-form validate-form">
				
					<div class="wrap-input100 m-b-10 validate-input" data-validate = "Email is vereist: voorbeeld@abc.xyz">
						<input class="s2-txt1 placeholder0 input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-20 validate-input" data-validate = "Wachtwoord is vereist!">
						<input class="s2-txt1 placeholder0 input100" type="password" name="password" placeholder="Wachtwoord">
						<span class="focus-input100"></span>
					</div>

					<div class="w-full">
					<input type="submit" class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04" value="Login">
					</div>
				</form>

				<p class="s2-txt3 p-t-18">
					Wachtwoord vergeten? Stuur even een bericht naar een leidinggevende!
				</p>
			</div>

			<div class="flex-w">
				
			</div>
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="./login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./login/vendor/bootstrap/js/popper.js"></script>
	<script src="./login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./login/vendor/countdowntime/moment.min.js"></script>
	<script src="./login/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="./login/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="./login/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>