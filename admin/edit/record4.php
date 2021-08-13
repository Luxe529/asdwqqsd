<?php
/*
Allows the user to both create new records and edit existing records
*/

// connect to the database
include("../../config.php");

// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($one = '', $two = '', $three = '', $four = '', $five = '', $error = '', $id = '')
{ ?>
<?php 
	include('../important/session.php');
	include('../important/information.php');
?><!DOCTYPE html>
<html>
<head>
	<title>Admin Panel - <?php echo $sname ?></title>
	<link rel="icon" type="image/png" href="<?php echo $slogo ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<meta name="theme-color" content="<?php echo $scolor ?>">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@" />
	<meta name="twitter:creator" content="@jekeltor" />
	<meta property="og:url" content="<?php echo $sdomain ?>" />
	<meta property="og:title" content="<?php echo $sname ?>" />
	<meta property="og:description" content="<?php echo $sdesc ?>" />
	<meta property="og:image" content="<?php echo $slogo ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<style>
		body {
			display: flex;
			margin: 0;
			align-items: center;
			justify-content: center;
			font-family: 'Source Sans Pro', sans-serif;
		}

		input, button {
			font-family: 'Source Sans Pro', sans-serif;
		}

		.rotate {
			display: none;
			height: 100vh;
			width: 100%;
			position: fixed;
			background-color: #333940;
			font-size: 3vh;
			color: #fff;
			text-align: center;
			align-items: center;
			justify-content: center;
			z-index: 10;
		}

		.navbar {
			display: flex;
			position: absolute;
			left: 0;
			top: 0;
			height: 5vh;
			width: 100%;
			background-color: #333940;
			z-index: 3;
			align-items: center;
			justify-content: center;
		}

		.navbar .l {
			display: inline-flex;
			height: 5vh;
			width: 10%;
			align-items: center;
			justify-content: center;
		}

		.navbar .l h1 {
			margin: 0;
			padding: 0;
			font-size: 3vh;
			color: #fff;
		}

		.navbar .r {
			display: inline-block;
			width: 90%;
			text-align: right;
			padding-right: 2.5%;
		}

		.navbar .r a {
			font-size: 3vh;
			color: #fff;
		}

		.left {
			display: inline-block;
			text-align: left;
			position: relative;
			width: 11%;
			background-color: #202429;
			padding: 7vh 2%;
			height: 86vh;
			transition: width 1s;
		}

		.left .top {
			text-align: center;
			margin-bottom: 5vh;
		}

		.left .top img {
			display: inline-block;
			height: 15vh;
			width: auto;
			transition: height 1s;
		}

		.left .top p {
			margin: 0;
			font-size: 1.75vh;
			color: #fff;
			font-weight: 700;
		}

		.left .section {
			margin-bottom: 7vh;
		}

		.left .section h1 {
			font-size: 1.75vh;
			color: #4A4D50;
			margin: 0;
			margin-bottom: 3vh;
		}

		.left .section .active {
			color: #fff !important;
		}

		.left .section a {
			display: block;
			font-size: 2.25vh;
			color: #676c70;
			text-decoration: none;
			font-weight: 700;
			transition: .1s ease;
			margin-bottom: 2vh;
		}

		.left .section a:hover {
			color: #fff;
			cursor: pointer;
		}

		.left .section a i {
			margin-right: 3%;
		}

		.left .bottom {
			position: absolute;
			bottom: 3vh;
			width: 70%;
			text-align: center;
		}

		.left .bottom #open {
			display: none;
		}

		.left .bottom a {
			font-size: 4vh;
			color: #fff;
		}

		.left .bottom a:hover {
			cursor: pointer;
		}

		.right {
			display: inline-block;
			width: 82%;
			height: 89vh;
			padding: 0 1.5%;
			padding-top: 9vh;
			overflow-y: auto;
			padding-bottom: 2vh;
			transition: width 1s;
		}

		.right h1 {
			font-size: 5vh;
			color: #000;
			margin: 0;
			margin-bottom: 1vh;
		}

		.right input[type=submit] {
			display: block;
			width: 50.25%;
			background-color: #202429;
			color: #fff;
			border: none;
			outline: none;
			padding: 2vh 0;
			font-size: 1.75vh;
		}

		.right input[type=submit]:hover {
			cursor: pointer;
		}

		.right .input {
			margin-bottom: 2vh;
			width: 50%;
		}

		.right .input input {
			width: 100%;
			font-size: 1.35vh;
		}

		.right .input textarea {
			width: 100%;
			resize: none;
		}

		.right .input strong {
			display: block;
			font-weight: 600;
			font-size: 1.75vh;
		}

		.activee {
			display: block !important;
		}

		@media screen and (max-width: 600px), (orientation : portrait) {
			.rotate {
				display: flex;
			}
		} 
	</style>
</head>
<body>
	<section class="rotate">
		To use this panel, please rotate your device.
	</section>
	<section class="navbar">
		<div class="l">
			<h1></h1>
		</div>
		<div class="r">
			<a href="<?php echo $sadminurl ?>/logout.php"><i class="fas fa-sign-out-alt"></i></a>
		</div>
	</section>
	<section class="left" id="left">
		<div class="top">
			<img src="<?php echo $slogo ?>" id="pfp" />
			<p id="welcome">Welcome, <?php echo ucfirst($login_session) ?></p>
		</div>
		<div class="section">
			<h1>CORE</h1>
			<a href="<?php echo $sadminurl ?>" id="onee" class="active"><i class="fas fa-chevron-circle-left"></i> <span id="span1">Return Back</span></a>
		</div>
		<div class="bottom" id="bottom">
			<a onclick="myResize()" id="close"><i class="fas fa-chevron-circle-left"></i></a>
			<a onclick="myResize()" id="open"><i class="fas fa-chevron-circle-right"></i></a>
		</div>
	</section>
	<section class="right" id="right">
			<h1>Team</h1>
			<form action="" method="post">
				<?php if ($id != '') { ?>
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<p>ID: <?php echo $id; ?></p>
				<?php } ?>

				<div class="input">
					<strong>Order:</strong> <input type="text" name="order1"
					value="<?php echo $one; ?>"/>
				</div>
				<div class="input">
					<strong>Name:</strong> <input type="text" name="name"
					value="<?php echo $two; ?>"/>
				</div>
				<div class="input">
					<strong>Logo:</strong> <input type="text" name="logo"
					value="<?php echo $three; ?>"/>
				</div>
				<div class="input">
					<strong>Rank:</strong> <input type="text" name="rank"
					value="<?php echo $four; ?>"/>
				</div>
				<div class="input">
					<strong>About:</strong> <textarea name="about"><?php echo $five; ?></textarea>
				</div>
				<input type="submit" name="submit" value="Update Record" />
			</form>
	</section>
	<script>
		function myResize() {
			var left = document.getElementById('left');
			var right = document.getElementById('right');
			var open = document.getElementById('open');
			var bottom = document.getElementById('bottom');
			var close = document.getElementById('close');
			var pfp = document.getElementById('pfp');
			var welcome = document.getElementById('welcome');
			var span1 = document.getElementById('span1');

			if (left.style.width == '4%') {
				left.style.width = '11%';
				left.style.padding = 'auto 2% auto 2%';
				left.style.textAlign = 'left';
				right.style.width = '82%';
				open.style.display = 'none';
				close.style.display = 'block';
				bottom.style.width = '70%'
				pfp.style.height = '15vh';
				welcome.style.display = 'inline-block';
				span1.style.display = 'inline-block';
			}

			else {
				left.style.width = '4%';
				left.style.padding = 'auto 0 auto 0';
				left.style.textAlign = 'center';
				right.style.width = '90%';
				open.style.display = 'block';
				close.style.display = 'none';
				bottom.style.width = '45%';
				pfp.style.height = '7vh';
				welcome.style.display = 'none';
				span1.style.display = 'none';
			}
		}
	</script>
</body>
</html><?php }



/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$order1 = htmlentities($_POST['order1'], ENT_QUOTES);
$name = htmlentities($_POST['name'], ENT_QUOTES);
$logo = htmlentities($_POST['logo'], ENT_QUOTES);
$rank = htmlentities($_POST['rank'], ENT_QUOTES);
$about = htmlentities($_POST['about'], ENT_QUOTES);

// check that name and img are both not empty
if ($name == '' || $logo == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($order1, $name, $logo, $rank, $about, $error, $id);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $mysqli->prepare("UPDATE team SET order1 = ?, name = ?, logo = ?, rank = ?, about = ? WHERE id=?"))
{
$stmt->bind_param("sssssi", $order1, $name, $logo, $rank, $about, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: ../index.php?name=four");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
}
// if the form hasn't been submitted yet, get the general from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the recod from the database
if($stmt = $mysqli->prepare("SELECT * FROM team WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $order1, $name, $logo, $rank, $about);
$stmt->fetch();

// show the form
renderForm($order1, $name, $logo, $rank, $about, NULL, $id);

$stmt->close();
}
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the view.php page
else
{
}
}
}

/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// get the form data
$order1 = htmlentities($_POST['order1'], ENT_QUOTES);
$name = htmlentities($_POST['name'], ENT_QUOTES);
$logo = htmlentities($_POST['logo'], ENT_QUOTES);
$rank = htmlentities($_POST['rank'], ENT_QUOTES);
$about = htmlentities($_POST['about'], ENT_QUOTES);

// check that name and img are both not empty
if ($name == '' || $logo == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($order1, $name, $logo, $rank, $about, $error);
}
else
{
// insert the new record into the database
if ($stmt = $mysqli->prepare("INSERT team (order1, name, logo, rank, about) VALUES (?, ?, ?, ?, ?)"))
{
$stmt->bind_param("sssss", $order1, $name, $logo, $rank, $about);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: ../index.php?name=four");
}

}
// if the form hasn't been submitted yet, show the form
else
{
renderForm();
}
}

// close the mysqli connection
$mysqli->close();
?>