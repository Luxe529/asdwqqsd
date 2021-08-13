<?php
    include("../config.php");
   	include("important/information.php");
   	session_start();
   
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      	$myusername = mysqli_real_escape_string($db, $_POST['username']);
      	$mypassword = mysqli_real_escape_string($db, $_POST['password']); 
      
      	$sql = "SELECT * FROM admin WHERE username = '$myusername'";
      	$result = mysqli_query($db,$sql);

      	while($row = mysqli_fetch_array($result)) {
        	if(password_verify($mypassword, $row["password"])) {
  	         	$_SESSION['login_user'] = $myusername;
  	         	header("location: index.php");
    		} 
  			
  			else {
  				$error = "Password incorrect";
  			}
  		}
   	}
?>
<html> 
<head>
	<title>Login - <?php echo $sname ?></title>
	<link rel="icon" type="image/png" href="<?php echo $slogo ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<meta name="theme-color" content="#0068FE">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@" />
	<meta name="twitter:creator" content="@jekeltor" />
	<meta property="og:url" content="<?php echo $sdomain ?>" />
	<meta property="og:title" content="<?php echo $sname ?>" />
	<meta property="og:description" content="<?php echo $sdesc ?>" />
	<meta property="og:image" content="<?php echo $slogo ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            font-family: 'Rubik', sans-serif;
            margin: 0;
            height: 100vh;
            width: 100%;
            align-items: center;
            justify-content: center;
            background-color: #<?php echo $color ?>;
        }

       	.form {
       		padding: 8vh 2%;
       		background-color: #fff;
       		width: 25%;
       		text-align: center;
       		box-shadow: 0 0 5vh rgba(0,0,0,0.6);
			-moz-box-shadow: 0 0 5vh rgba(0,0,0,0.6);
			-webkit-box-shadow: 0 0 5vh rgba(0,0,0,0.6);
			-o-box-shadow: 0 0 5vh rgba(0,0,0,0.6);
       	}

       	.form .logo {
        	display: inline-block;
        	height: 25vh;
        	width: auto;
        	margin-bottom: 3vh;
        }

       	.form form input {
       		-webkit-appearance: none;
       		width: 100%;
       		padding: 1.5vh 2%;
       		font-size: 1.75vh;
       		margin-bottom: 2vh;
       		border: none;
       		outline: none;
       		background-color: #e3e3e3;
       	}

       	.form form input[type=submit] {
       		-webkit-appearance: none;
       		margin-bottom: 0;
       		background-color: #<?php echo $color ?>;
       		border: none;
       		outline: none;
       		color: #fff;
       		padding: 2.5vh 2%;
       	}

       	.form form input[type=submit]:hover {
       		cursor: pointer;
       	}

       	@media screen and (max-width: 600px), (orientation : portrait) {
       		.form {
       			width: 75%;
       		}
		} 
    </style>
</head>
<body>
    <div class="form">
    	<img src="<?php echo $slogo ?>" class="logo" />
        <form action="" method="post">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value = "Login">
        </form>
        <div><?php echo $error; ?></div>		
    </div>
</body>
</html>