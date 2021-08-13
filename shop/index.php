<?php
	include("../config.php");
?><!DOCTYPE html>
<html>
<head>
	<title>Shop - <?php echo $name ?></title>
	<link rel="icon" type="image/png" href="<?php echo $logo ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo $domain ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo $domain ?>/css/subpages.css">
	<meta name="theme-color" content="#<?php echo $color ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@<?php echo $twitter ?>">
	<meta name="twitter:creator" content="@jekeltor">
	<meta property="og:url" content="<?php echo $domain ?>/shop">
	<meta property="og:title" content="Shop - <?php echo $name ?>">
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

		.body .grid {
			display: grid;
			width: 100%;
			grid-auto-rows: 1fr;
			grid-column-gap: 5%;
			grid-row-gap: 6vh;
			grid-template-columns: repeat(3, 1fr);
			text-align: center;
		}

		.body .grid .item {
			background-color: #141414;
			padding: 4vh 3% 4vh 3%;
			border-radius: .5vh;
		}

		.body .grid .item .background {
			display: inline-block;
			width: 20vw;
			height: 11.25vw;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			margin-bottom: 1vh;
			border-radius: .5vh;
		}

		.body .grid .item .information h1 {
			font-size: 3vh;
			color: #fff;
			margin: 0;
			margin-bottom: .25vh;
		}

		.body .grid .item .information h2 {
			font-size: 1.75vh;
			color: #c2c2c2;
			margin: 0;
			font-weight: 400;
			margin-bottom: 3vh;
		}

		.body .grid .item .information a {
			display: inline-block;
			font-size: 1.75vh;
			color: #fff;
			background-color: var(--theme-color);
			outline: none;
			border: none;
			padding: 1vh 3%;
			border-radius: .25vh;
			cursor: pointer;
			text-decoration: none;
		}

		@media screen and (max-width: 600px), (orientation : portrait) {
			.body .grid {
				grid-template-columns: repeat(1, 1fr);
			}

			.body .grid .item .background {
				width: 70vw;
				height: 39.37vw;
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
			<div class="center">
				<h1>Shop</h1>
				<p>Want to see the best products in the world? Well, some of them are below.</p>
			</div>
		</div>
	</section>
	<section class="body">
		<div class="grid">
			<?php
				$select = "SELECT * FROM shop ORDER BY order1 ASC";
				$query = mysqli_query($db, $select);
				while ($row = mysqli_fetch_array($query)) {
					$background = explode("; ", $row['images']);
			?>
			<div class="item">
				<div class="background" style="background-image: url(<?php echo $background[0] ?>)">
				</div>
				<div class="information">
					<h1><?php echo $row['name'] ?></h1>
					<?php
						if(is_numeric($row['price'])) {
					?>
					<h2>$<?php echo $row['price'] ?></h2>
					<?php
						}

						else {
					?>
					<h2>FREE</h2>
					<?php
						}
					?>
					<a href="<?php echo $domain ?>/shop/listing.php?id=<?php echo $row['id'] ?>">View More</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
	<section class="footer">
		&copy; Copyright <?php echo $name." ".date("Y") ?> | All rights reserved
	</section>
	<script src="<?php echo $domain ?>/js/main.js"></script>
</body>
</html>