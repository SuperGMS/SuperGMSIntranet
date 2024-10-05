<?php
include_once "./includes/class.database.php";
?>
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
		<style>
			.overlay1::after {
				background: linear-gradient(180deg, purple, blue);
			}

			.test {
				background: linear-gradient(180deg, purple, blue);
				width: 23.9rem;

			}
			body {
				background: linear-gradient(180deg, purple, blue);
			}

			.bg0 {
				background: linear-gradient(180deg, purple, blue);
			}
		</style>
		<div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcS7imMUG6o6m5te0rLdahwGd5xED88E__2jRTDqaWJ--ORvOXxgAgAuJpaAyfzhQwEp38y05mj1YdWwxKg');">
			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">

			</div>
		</div>

		<!-- Form -->
		<div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1 test">
			<div class="wrap-pic1" style="width:15rem">
				<svg data-v-0dd9719b="" version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 340.000000 250.000000" preserveAspectRatio="xMidYMid meet" color-interpolation-filters="sRGB" style="margin: auto;">
					<rect data-v-0dd9719b="" x="0" y="0" width="100%" height="100%" fill="#f58021" fill-opacity="0" class="background"></rect>
					<rect data-v-0dd9719b="" x="0" y="0" width="100%" height="100%" fill="url(#watermark)" fill-opacity="1" class="watermarklayer"></rect>
					<g data-v-0dd9719b="" fill="#feffff" class="iconbordersvg" transform="translate(46.61000061035156,68.19790649414062)">
						<g>
							<polyline stroke="#feffff" stroke-width="2" fill-opacity="0" points="92.93999862670898,99.52418661117554 0,99.52418661117554 0,31.81318473815918 100.38999938964844,31.81318473815918"></polyline>
							<polyline stroke="#feffff" stroke-width="2" fill-opacity="0" points="153.8400001525879,99.52418661117554 246.77999877929688,99.52418661117554 246.77999877929688,31.81318473815918 146.38999938964844,31.81318473815918"></polyline>
						</g>
						<g>
							<g>
								<rect data-gra="graph-name-bg" stroke-width="2" class="i-icon-bg" x="0" y="0" width="246.77999877929688" height="113.60418701171875" fill-opacity="0"></rect> <!----> <!---->
							</g>
							<g transform="translate(10,10)">
								<g transform="translate(1.0988998413085938,0)">
									<rect fill="#feffff" width="90.38999938964844" height="1" fill-opacity="0" x="0" y="21.31318473815918"></rect>
									<g class="iconsvg-imagesvg" transform="matrix(1,0,0,1,93.38999938964844,0)" opacity="1">
										<g><!----> <svg filter="url(#colors6312241520)" x="0" y="0" width="40" height="46.16272360069244" filtersec="colorsf9738443529" class="image-svg-svg primary" style="overflow: visible;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0.2999999999999998 72.8 83.39999">
													<path d="M2 22.2L36.4 2.3l34.4 19.9v39.7L36.4 81.7 2 61.9V22.2zm8.6 4.9v29.8L45 76.7m-8.6-4.9L62 57V27m-8.4 34.9V32.1L27.8 17.2m8.6 5l-17.2 9.9v29.7m0-9.9l17 9.8 17.4-9.8m0-19.8l-8.8 4.8-8.4-4.8L19.2 42m51.3-19.9L62 27 36.4 12.2 2 32.1M27.8 37v10l16.7 9.6m-7.6-4.9L45 47V37M27.8 47l8.6-5v-9.9M45 47l-8.6-5" fill="none" stroke="#333" stroke-width="4" stroke-miterlimit="10"></path>
												</svg></svg>
											<defs>
												<filter id="colors6312241520">
													<feColorMatrix type="matrix" values="0 0 0 0 0.9921875  0 0 0 0 0.99609375  0 0 0 0 0.99609375  0 0 0 1 0" class="icon-fecolormatrix"></feColorMatrix>
												</filter>
												<filter id="colorsf9738443529">
													<feColorMatrix type="matrix" values="0 0 0 0 0.99609375  0 0 0 0 0.99609375  0 0 0 0 0.99609375  0 0 0 1 0" class="icon-fecolormatrix"></feColorMatrix>
												</filter>
												<filter id="colorsb6772012661">
													<feColorMatrix type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 0" class="icon-fecolormatrix"></feColorMatrix>
												</filter>
											</defs>
										</g>
									</g>
									<rect fill="#feffff" width="90.38999938964844" height="1" fill-opacity="0" x="134.19219970703125" y="21.31318473815918"></rect>
								</g>
								<g transform="translate(0,46.62636947631836)">
									<g data-gra="path-name" fill-rule="" class="tp-name" transform="matrix(1,0,0,1,0,0)" opacity="1">
										<g transform="scale(1)">
											<g>
												<path d="M9.49-32.71L4.28-32.71C2.81-32.71 2.3-32.21 2.3-30.78L2.3-1.94C2.3-0.51 2.81 0 4.28 0L22.53 0C23.96 0 24.47-0.51 24.47-1.94L24.47-6.13C24.47-7.6 23.96-8.06 22.53-8.06L11.43-8.06 11.43-30.78C11.43-32.21 10.97-32.71 9.49-32.71ZM27.28-30.87L27.28-1.84C27.28-0.46 27.74 0 29.12 0L34.56 0C35.94 0 36.4-0.46 36.4-1.84L36.4-30.87C36.4-32.25 35.94-32.71 34.56-32.71L29.12-32.71C27.74-32.71 27.28-32.25 27.28-30.87ZM72.47-32.76L67.87-32.76C66.35-32.76 65.93-32.53 65.29-31.28L57.68-16.4 50.08-31.33C49.44-32.48 48.98-32.76 47.36-32.76L43.03-32.76C41.56-32.76 41.05-32.3 41.05-30.82L41.05-1.89C41.05-0.46 41.56 0 43.03 0L47.73 0C49.21 0 49.71-0.46 49.71-1.89L49.71-8.43C49.71-11.61 49.48-13.91 47.82-20.55L48.29-20.55C48.75-18.94 50.17-14.7 51.14-12.95L53.86-7.74C54.37-6.73 54.83-6.4 56.07-6.4L59.16-6.4C60.4-6.4 60.86-6.82 61.37-7.74L63.95-12.95C64.92-14.84 66.58-19.03 67.04-20.55L67.54-20.55C65.79-14.42 65.52-11.52 65.52-8.48L65.52-1.89C65.52-0.46 65.98 0 67.45 0L72.47 0C73.95 0 74.46-0.46 74.46-1.89L74.46-30.82C74.46-32.3 73.95-32.76 72.47-32.76ZM79.06-30.87L79.06-1.84C79.06-0.46 79.52 0 80.91 0L86.34 0C87.72 0 88.19-0.46 88.19-1.84L88.19-30.87C88.19-32.25 87.72-32.71 86.34-32.71L80.91-32.71C79.52-32.71 79.06-32.25 79.06-30.87ZM115.83-32.71L93.02-32.71C91.55-32.71 91.09-32.21 91.09-30.78L91.09-26.63C91.09-25.16 91.55-24.65 93.02-24.65L99.89-24.65 99.89-1.94C99.89-0.51 100.35 0 101.82 0L107.03 0C108.5 0 109.01-0.51 109.01-1.94L109.01-24.65 115.83-24.65C117.3-24.65 117.81-25.16 117.81-26.63L117.81-30.78C117.81-32.21 117.3-32.71 115.83-32.71ZM127.81-32.71L122.6-32.71C121.13-32.71 120.62-32.21 120.62-30.78L120.62-1.94C120.62-0.51 121.13 0 122.6 0L140.85 0C142.28 0 142.78-0.51 142.78-1.94L142.78-6.13C142.78-7.6 142.28-8.06 140.85-8.06L129.74-8.06 129.74-30.78C129.74-32.21 129.28-32.71 127.81-32.71ZM166.88-32.71L147.57-32.71C146.1-32.71 145.59-32.21 145.59-30.78L145.59-1.94C145.59-0.51 146.1 0 147.57 0L167.29 0C168.72 0 169.23-0.51 169.23-1.94L169.23-6.13C169.23-7.6 168.72-8.06 167.29-8.06L154.72-8.06 154.72-12.49 164.44-12.49C165.91-12.49 166.42-12.99 166.42-14.47L166.42-18.61C166.42-20.04 165.91-20.55 164.44-20.55L154.72-20.55 154.72-24.65 166.88-24.65C168.35-24.65 168.86-25.16 168.86-26.63L168.86-30.78C168.86-32.21 168.35-32.71 166.88-32.71ZM171.67-23.08C171.67-14.14 179.23-13.18 184.62-12.44 187.66-12.03 190.01-11.52 190.01-9.72 190.01-7.74 188.17-7.1 185.08-7.1 182.5-7.1 180.7-7.92 179.87-9.54 179.18-10.87 178.54-11.01 177.15-10.55L172.82-8.98C171.49-8.48 171.07-7.83 171.58-6.45 173.33-1.66 178.12 0.69 184.99 0.69 193.14 0.69 199.27-3.04 199.27-9.81 199.27-18.52 192.36-19.81 187.01-20.55 183.7-20.96 180.98-21.38 180.98-23.36 180.98-24.97 182.22-25.76 185.35-25.76 187.47-25.76 189.13-25.11 190.01-23.36 190.75-22.02 191.25-21.84 192.5-22.39L197.1-24.37C198.49-24.93 198.85-25.62 198.21-26.95 196.04-31.38 192.17-33.4 185.35-33.4 176.55-33.4 171.67-29.16 171.67-23.08ZM201.48-23.08C201.48-14.14 209.04-13.18 214.43-12.44 217.47-12.03 219.82-11.52 219.82-9.72 219.82-7.74 217.97-7.1 214.89-7.1 212.31-7.1 210.51-7.92 209.68-9.54 208.99-10.87 208.35-11.01 206.96-10.55L202.63-8.98C201.3-8.48 200.88-7.83 201.39-6.45 203.14-1.66 207.93 0.69 214.8 0.69 222.95 0.69 229.08-3.04 229.08-9.81 229.08-18.52 222.17-19.81 216.82-20.55 213.51-20.96 210.79-21.38 210.79-23.36 210.79-24.97 212.03-25.76 215.16-25.76 217.28-25.76 218.94-25.11 219.82-23.36 220.55-22.02 221.06-21.84 222.31-22.39L226.91-24.37C228.3-24.93 228.66-25.62 228.02-26.95 225.85-31.38 221.98-33.4 215.16-33.4 206.36-33.4 201.48-29.16 201.48-23.08Z" transform="translate(-2.299999952316284, 33.400001525878906)"></path>
											</g> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</g>
									</g>
									<g transform="translate(85.93999862670898,40.09000015258789)">
										<g data-gra="path-slogan" fill-rule="" class="tp-slogan" fill="#feffff" transform="matrix(1,0,0,1,0,0)" opacity="1"><!----> <!---->
											<g transform="scale(1, 1)">
												<g transform="scale(1)">
													<path d="M1.10-1.72L0.50-1.02C0.85-0.66 1.26-0.38 1.73-0.17C2.20 0.04 2.71 0.14 3.26 0.14C3.68 0.14 4.05 0.09 4.38-0.03C4.71-0.15 4.99-0.31 5.22-0.51C5.45-0.71 5.63-0.95 5.75-1.22C5.88-1.50 5.94-1.79 5.94-2.10C5.94-2.39 5.90-2.64 5.81-2.86C5.73-3.08 5.62-3.27 5.47-3.44C5.33-3.60 5.16-3.75 4.96-3.87C4.76-3.99 4.54-4.10 4.32-4.20L3.20-4.68C3.04-4.74 2.89-4.81 2.74-4.89C2.58-4.97 2.44-5.05 2.32-5.15C2.19-5.25 2.09-5.37 2.01-5.50C1.93-5.63 1.90-5.80 1.90-5.99C1.90-6.35 2.03-6.63 2.30-6.83C2.57-7.04 2.92-7.14 3.36-7.14C3.73-7.14 4.06-7.07 4.35-6.94C4.64-6.81 4.91-6.63 5.15-6.40L5.69-7.04C5.41-7.33 5.07-7.57 4.67-7.75C4.27-7.93 3.83-8.02 3.36-8.02C3-8.02 2.67-7.96 2.37-7.86C2.07-7.76 1.81-7.61 1.59-7.42C1.37-7.23 1.20-7.01 1.07-6.76C0.95-6.50 0.89-6.22 0.89-5.93C0.89-5.64 0.94-5.39 1.03-5.17C1.13-4.95 1.25-4.76 1.40-4.60C1.56-4.44 1.73-4.30 1.92-4.19C2.11-4.08 2.30-3.98 2.48-3.90L3.61-3.41C3.80-3.32 3.97-3.24 4.13-3.16C4.29-3.08 4.43-2.99 4.54-2.89C4.66-2.79 4.75-2.67 4.82-2.53C4.89-2.39 4.92-2.22 4.92-2.02C4.92-1.63 4.78-1.32 4.49-1.09C4.20-0.85 3.80-0.73 3.28-0.73C2.87-0.73 2.47-0.82 2.09-1.00C1.71-1.18 1.38-1.42 1.10-1.72ZM10.39 0.14C10.89 0.14 11.34 0.05 11.75-0.14C12.17-0.34 12.52-0.61 12.82-0.97C13.12-1.32 13.35-1.75 13.52-2.26C13.68-2.77 13.76-3.34 13.76-3.97C13.76-4.60 13.68-5.16 13.52-5.66C13.35-6.16 13.12-6.58 12.82-6.93C12.52-7.28 12.17-7.55 11.75-7.73C11.34-7.92 10.89-8.02 10.39-8.02C9.90-8.02 9.44-7.92 9.03-7.74C8.62-7.56 8.26-7.29 7.97-6.94C7.67-6.59 7.44-6.17 7.28-5.67C7.11-5.17 7.03-4.60 7.03-3.97C7.03-3.34 7.11-2.77 7.28-2.26C7.44-1.75 7.67-1.32 7.97-0.97C8.26-0.61 8.62-0.34 9.03-0.14C9.44 0.05 9.90 0.14 10.39 0.14ZM10.39-0.73C10.04-0.73 9.72-0.81 9.44-0.96C9.15-1.11 8.91-1.33 8.71-1.61C8.50-1.90 8.34-2.24 8.23-2.63C8.12-3.03 8.06-3.48 8.06-3.97C8.06-4.46 8.12-4.90 8.23-5.29C8.34-5.68 8.50-6.02 8.71-6.29C8.91-6.56 9.15-6.77 9.44-6.92C9.72-7.07 10.04-7.14 10.39-7.14C10.74-7.14 11.06-7.07 11.35-6.92C11.63-6.77 11.87-6.56 12.08-6.29C12.28-6.02 12.44-5.68 12.55-5.29C12.66-4.90 12.72-4.46 12.72-3.97C12.72-3.48 12.66-3.03 12.55-2.63C12.44-2.24 12.28-1.90 12.08-1.61C11.87-1.33 11.63-1.11 11.35-0.96C11.06-0.81 10.74-0.73 10.39-0.73ZM15.46-7.87L15.46 0L16.45 0L16.45-3.53L19.45-3.53L19.45-4.37L16.45-4.37L16.45-7.03L19.99-7.03L19.99-7.87ZM23.02-7.03L23.02 0L24.02 0L24.02-7.03L26.40-7.03L26.40-7.87L20.64-7.87L20.64-7.03ZM27.01-7.87L28.68 0L29.87 0L31.03-4.74C31.10-5.04 31.16-5.34 31.23-5.63C31.30-5.93 31.36-6.22 31.43-6.53L31.48-6.53C31.54-6.22 31.60-5.93 31.66-5.63C31.72-5.34 31.79-5.04 31.86-4.74L33.05 0L34.25 0L35.88-7.87L34.92-7.87L34.09-3.59C34.01-3.16 33.94-2.74 33.86-2.32C33.79-1.90 33.72-1.48 33.65-1.04L33.60-1.04C33.50-1.48 33.41-1.90 33.31-2.33C33.22-2.75 33.12-3.17 33.02-3.59L31.93-7.87L31.02-7.87L29.93-3.59C29.84-3.16 29.75-2.74 29.65-2.32C29.56-1.90 29.46-1.48 29.38-1.04L29.33-1.04C29.26-1.48 29.18-1.90 29.10-2.32C29.02-2.73 28.94-3.16 28.87-3.59L28.04-7.87ZM40.60-3.20L38.23-3.20L38.60-4.40C38.75-4.84 38.88-5.28 39.01-5.72C39.14-6.15 39.26-6.60 39.38-7.06L39.43-7.06C39.56-6.60 39.69-6.15 39.82-5.72C39.94-5.28 40.08-4.84 40.22-4.40ZM40.85-2.40L41.59 0L42.66 0L40.00-7.87L38.87-7.87L36.20 0L37.22 0L37.98-2.40ZM44.77-4.14L44.77-7.07L46.09-7.07C46.71-7.07 47.18-6.96 47.51-6.76C47.84-6.55 48.00-6.18 48.00-5.66C48.00-5.15 47.84-4.77 47.51-4.52C47.18-4.27 46.71-4.14 46.09-4.14ZM48.10 0L49.22 0L47.23-3.43C47.77-3.57 48.20-3.82 48.52-4.19C48.84-4.56 49.00-5.05 49.00-5.66C49.00-6.07 48.93-6.42 48.79-6.70C48.66-6.98 48.47-7.20 48.22-7.38C47.98-7.56 47.69-7.68 47.35-7.76C47.01-7.83 46.64-7.87 46.24-7.87L43.78-7.87L43.78 0L44.77 0L44.77-3.32L46.20-3.32ZM50.75-7.87L50.75 0L55.40 0L55.40-0.85L51.74-0.85L51.74-3.71L54.73-3.71L54.73-4.56L51.74-4.56L51.74-7.03L55.28-7.03L55.28-7.87Z" transform="translate(-0.504, 8.016)"></path>
												</g>
											</g>
										</g>
									</g>
								</g>
							</g>
						</g>
					</g>
					<defs v-gra="od"></defs>
				</svg>
			</div>

			<div class="p-t-50 p-b-60" style="width:25rem">

				<p class="m1-txt1 p-b-36" style="color:white">
					<span class="m1-txt2" style="color:white">My Intranet</span> | Inloggen</br>


					<?php
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						$email = $_POST['email'];
						$password = $_POST['password'];

						// Prepare the SQL query
						$query = "SELECT salt FROM users WHERE email = :email";
						$stmt = $db->prepare($query);
						$stmt->bindParam(':email', $email);

						// Execute the query
						if ($stmt->execute()) {
							$user = $stmt->fetch(PDO::FETCH_ASSOC);

							if ($user) {
								// Prepare the SQL query
								$salt = $user['salt'];
								$query = "SELECT id FROM users WHERE email = :email AND password = :password";
								$stmt = $db->prepare($query);
								$stmt->bindParam(':email', $email);
								$stmt->bindParam(':password', crypt($password, $salt));

								// Execute the query
								if ($stmt->execute()) {
									$result = $stmt->fetch(PDO::FETCH_ASSOC);

									if ($result) {
										$_SESSION['email'] = $email;
					?>
										<script>
											window.location = '<?php echo $site; ?>/home';
										</script>
					<?php
									} else {
										echo "Je email of wachtwoord klopt niet.";
									}
								} else {
									echo "Er is iets misgegaan. Foutmelding: " . $stmt->errorInfo()[2];
								}
							} else {
								echo "Er is iets misgegaan. Foutmelding: Gebruiker niet gevonden.";
							}
						} else {
							echo "Er is iets misgegaan. Foutmelding: " . $stmt->errorInfo()[2];
						}
					}
					?>

				<form role="form" action="" method="POST" class="contact100-form validate-form">

					<div class="wrap-input100 m-b-10 validate-input" data-validate="Email is vereist: voorbeeld@abc.xyz">
						<input class="s2-txt1 placeholder0 input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-20 validate-input" data-validate="Wachtwoord is vereist!">
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
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>