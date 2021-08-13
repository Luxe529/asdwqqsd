<?php
	include("../config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once "recaptchalib.php";
		$secret = $secretkey;
		 
		$response = null;
		 
		$reCaptcha = new ReCaptcha($secret);

		if ($_POST["g-recaptcha-response"]) {
		    $response = $reCaptcha->verifyResponse(
		        $_SERVER["REMOTE_ADDR"],
		        $_POST["g-recaptcha-response"]
		    );
		}

		extract($_POST);

		if ($response != null && $response->success) {
			$email = mysqli_escape_string($db, $_POST['email']);
			$discord = mysqli_escape_string($db, $_POST['discord']);
			$message = mysqli_escape_string($db, $_POST["message"]);

			if ($email == "" or null || $discord == "" or null || $message == "" or null) {
				$response = "negative; A field wasn't filled in";
			}

			elseif ($email !== "" or null && $discord !== "" or null && $message !== "" or null) {
				$insert = 'INSERT INTO contact (email, discord, message) VALUES ("'.$email.'", "'.$discord.'", "'.$message.'")';
				if (mysqli_query($db, $insert)) {
					$response = "positive; Your request was submitted successfully";
				}

				else {
					$response = "negative; An error has occurred";
				}
			}
		}
	}
?><!DOCTYPE html>
<html>
<head>
	<title>Contact - <?php echo $name ?></title>
	<link rel="icon" type="image/png" href="<?php echo $logo ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo $domain ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo $domain ?>/css/subpages.css">
	<link rel="stylesheet" href="<?php echo $domain ?>/css/contact.css">
	<meta name="theme-color" content="#<?php echo $color ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@<?php echo $twitter ?>">
	<meta name="twitter:creator" content="@jekeltor">
	<meta property="og:url" content="<?php echo $domain ?>/contact">
	<meta property="og:title" content="Contact - <?php echo $name ?>">
	<meta property="og:description" content="<?php echo $description ?>">
	<meta property="og:image" content="<?php echo $logo ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
		$('html, body').css({
		  	'overflow': 'hidden',
		  	'height': '100vh'
		});

		window.onload = function() {
			document.querySelector(".preloader").classList.add("loaded");
			$('html, body').css({
			  	'overflow': 'auto',
			 	'height': 'auto'
			});
		}
	</script>
	<style>
		:root {
			--theme-color: #<?php echo $color ?>;
			--background-image: url(<?php echo $backgroundimage ?>);
		}
	</style>
</head>
<body>
	<section class="preloader">
	</section>
	<section class="dropdown">
		<div class="center">
			<a href="<?php echo $domain ?>">Home</a>
			<a href="<?php echo $domain ?>/shop">Shop</a>
			<a href="<?php echo $domain ?>/team">Team</a>
			<a href="<?php echo $domain ?>/reviews">Reviews</a>
			<a href="<?php echo $domain ?>/contact">Contact</a>
			<a href="<?php echo $domain ?>/discord">Discord</a>
		</div>
	</section>
	<section class="navbar">
		<div class="left">
			<img src="<?php echo $logo ?>">
		</div>
		<div class="right">
			<div class="links">
				<a href="<?php echo $domain ?>">Home</a>
				<a href="<?php echo $domain ?>/shop">Shop</a>
				<a href="<?php echo $domain ?>/team">Team</a>
				<a href="<?php echo $domain ?>/reviews">Reviews</a>
				<a href="<?php echo $domain ?>/contact" class="active">Contact</a>
				<a href="<?php echo $domain ?>/discord">Discord</a>
			</div>
			<a onclick="dropdown()" class="dropdownbtn"><i class="fas fa-bars"></i></a>
			<a onclick="dropdown()" class="dropdownbtnclose"><i class="fas fa-times"></i></a>
		</div>
	</section>
	<section class="top">
		<div class="screen">
			<div class="center">
				<h1>Contact</h1>
				<p>Do you want to contact us? Well, submit the form below and we'll get back to you as soon as possible.</p>
			</div>
		</div>
	</section>
	<section class="body">
		<form class="container" method="POST">
			<h1>Contact Us</h1>
			<?php
				if($response == "" or null) {
				}

				elseif ($response !== "" or null) {
					$breakdown = explode(";", $response);
			?>
				<p class="<?php echo $breakdown[0] ?>"><?php echo $breakdown[1] ?></p>
			<?php } ?>
			<div class="line">
				<input type="email" name="email" placeholder="Email" required>
				<input type="text" name="discord" placeholder="Discord Identifier" required>
			</div>
			<textarea name="message" placeholder="Type your message here" required></textarea>
			<input type="submit" value="Submit">
			<div class="bottom">
				<div class="g-recaptcha" data-sitekey="<?php echo $sitekey ?>"></div>
			</div>
		</form>
	</section>
	<section class="footer">
		&copy; Copyright <?php echo $name." ".date("Y") ?> | All rights reserved
	</section>
	<script src="<?php echo $domain ?>/js/main.js"></script>
</body>
</html>