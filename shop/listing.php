<?php
	include("../config.php");
	$select = "SELECT * FROM shop WHERE id=".$_GET['id'];
	$query = mysqli_query($db, $select);
	$row = mysqli_fetch_array($query);
?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['name']." - ".$name ?></title>
	<link rel="icon" type="image/png" href="<?php echo $logo ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo $domain ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo $domain ?>/css/subpages.css">
	<meta name="theme-color" content="#<?php echo $color ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@<?php echo $twitter ?>">
	<meta name="twitter:creator" content="@jekeltor">
	<meta property="og:url" content="<?php echo $domain ?>/shop/listing.php?id=<?php echo $row['id'] ?>">
	<meta property="og:title" content="<?php echo $row['name']." - ".$name ?>">
	<meta property="og:description" content="<?php echo $description ?>">
	<meta property="og:image" content="<?php echo $logo ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

		.body .item {
			background-color: #1c1c1c;
			width: 70%;
			padding: 6vh 5%;
			margin: -55vh 10% 0vh 10%;
			text-align: center;
			border-radius: .5vh;
		}

		.body .itemtop {
			display: inline-flex;
			width: 50vw;
			height: 28.12vw;
			overflow-x: hidden;
			position: relative;
			align-items: center;
			justify-content: center
		}

		.body .itemtop .overflow {
			display: flex;
			left: 0;
			position: absolute;
			transition: all .5s ease;
		}

		.body .itemtop .overflow .image {
			width: 50vw;
			height: 28.12vw;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
		}

		.body .itemtop .controls {
			display: flex;
			position: absolute;
			width: 100%;
			align-items: center;
			justify-content: center;
		}

		.body .itemtop .controls .left, .body .itemtop .controls .right {
			width: 40%;
		}

		.body .itemtop .controls .left {
			text-align: left;
			margin-right: 5%;
		}

		.body .itemtop .controls .right {
			text-align: right;
			margin-left: 5%;
		}

		.body .itemtop .controls a {
			font-size: 3vh;
			color: #fff;
			cursor: pointer;
			transition: all .5s ease;
			padding: .5vh 2%;
		}

		.body .itemtop .controls a.conleft {
			margin-left: -1vh;
		}

		.body .itemtop .controls a.conright {
			margin-right: -1vh;
		}

		.body .itemtop .controls a:hover {
			margin-left: 0vh;
			margin-right: 0vh;
		}

		.body .itembottom h1 {
			margin: 0;
			margin-top: 3vh;
			font-size: 4vh;
			color: #fff;
		}

		.body .itembottom h2 {
			font-size: 2vh;
			margin: 0;
			margin-top: 1vh;
			color: #fff;
		}

		.body .itembottom h3 {
			font-size: 3vh;
			color: #fff;
			margin: 0;
			margin-bottom: 1.5vh;
			margin-top: 7vh;
		}

		.body .itembottom .grid {
			display: grid;
			width: 100%;
			grid-auto-rows: 1fr;
			grid-column-gap: 2.5%;
			grid-row-gap: 1vh;
			grid-template-columns: repeat(4, 1fr);
			margin-top: 4vh;
		}

		.body .itembottom .grid li {
			margin-bottom: 1vh;
			color: #fff;
			font-size: 1.75vh;
		}

		.body .itembottom .buy {
			width: 100%;
			text-align: center;
			margin-top: 5vh;
		}

		.body .itembottom .buy a {
			display: inline-block;
			font-size: 2vh;
			color: #fff;
			padding: 1vh 2%;
			border-radius: .5vh;
			background-color: var(--theme-color);
			text-decoration: none;
		}

		@media screen and (max-width: 600px), (orientation : portrait) { 
			.body {
				width: 100%;
				padding: 7.5vh 0%;
				color: #0a0a0a;
			}

			.body .item {
				width: 80%;
				margin: -55vh 5% 0vh 5%;
			}

			.body .itemtop {
				width: 80vw;
				height: 44.99vw;
			}

			.body .itemtop .overflow .image {
				width: 80vw;
				height: 44.99vw;
			}

			.body .itembottom .grid {
				grid-template-columns: repeat(2, 1fr);
			}
		}
	</style>
</head>
<body>
	<section class="preloader">
	</section>
	<section class="dropdown">
		<div class="center">
			<a href="<?php echo $domain ?>">Home</a>
			<a href="<?php echo $domain ?>/shop" class="active">Shop</a>
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
				<a href="<?php echo $domain ?>/shop" class="active">Shop</a>
				<a href="<?php echo $domain ?>/team">Team</a>
				<a href="<?php echo $domain ?>/reviews">Reviews</a>
				<a href="<?php echo $domain ?>/contact">Contact</a>
				<a href="<?php echo $domain ?>/discord">Discord</a>
			</div>
			<a onclick="dropdown()" class="dropdownbtn"><i class="fas fa-bars"></i></a>
			<a onclick="dropdown()" class="dropdownbtnclose"><i class="fas fa-times"></i></a>
		</div>
	</section>
	<section class="top">
		<div class="screen">
		</div>
	</section>
	<section class="body">
		<div class="item">
			<div class="itemtop">
				<div class="overflow" id="overflow">
					<?php
						$background = explode("; ", $row['images']);
						foreach($background as $number => $image) {
					?>
						<div class="image" style="background-image: url(<?php echo $image ?>)">
						</div>
					<?php } ?>
				</div>
				<div class="controls">
					<div class="left">
						<a class="conleft" onclick="carousel('back')"><i class="fas fa-chevron-left"></i></a>
					</div>
					<div class="right">
						<a class="conright" onclick="carousel('forward')"><i class="fas fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<div class="itembottom">
				<h1><?php echo $row['name'] ?></h1>
				<?php
					if(is_numeric($row['price'])) {
				?>
				<h2>$<?php echo $row['price'] ?></h2>
				<h3>Features</h3>
				<div class="grid">
					<?php 
						$features = explode("; ", $row['features']);
						foreach($features as $number => $feature) {
					?>
						<li><?php echo $feature ?></li>
					<?php } ?>
				</div>
				<div class="buy">
					<a href="<?php echo $domain ?>/discord">Buy Now</a>
				</div>
				<?php
					}
					else {
				?>
				<h2>FREE</h2>
				<h3>Features</h3>
				<div class="grid">
					<?php 
						$features = explode("; ", $row['features']);
						foreach($features as $number => $feature) {
					?>
						<li><?php echo $feature ?></li>
					<?php } ?>
				</div>
				<div class="buy">
					<a href="<?php echo $row['price'] ?>" target="_blank">Download</a>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</section>
	<script src="<?php echo $domain ?>/js/main.js"></script>
	<script>
		function carousel(direction) {
			var itemtop = document.querySelector(".itemtop");

			if (window.innerHeight > window.innerWidth){
				var number = 80;
			}

			else {
				var number = 50;
			}

			var total = <?php echo count($background, COUNT_RECURSIVE) ?> * - number;
			var overflow = document.querySelector(".overflow");
			var currentleft = overflow.style.left;

			if (currentleft == "") {
				overflow.style.left = "0vw";
			}

			else if (direction == "forward" || direction == null) {
				var newtotal = currentleft.replace("vw", "") - number + "vw";
				if (newtotal.replace("vw", "") == total) {
					overflow.style.left = "0vw";
				}

				else {
					overflow.style.left = newtotal;
				}
			}

			else if (direction == "back") {
				var newtotal = Number(currentleft.replace("vw", "")) + number + "vw";
				if (newtotal == "50vw") {
				}

				else {
					overflow.style.left = newtotal;
				}
			}
		}

		function startcarousel() {
			carousel();
			setTimeout(startcarousel, 7500);
		}

		startcarousel();
	</script>
</body>
</html>