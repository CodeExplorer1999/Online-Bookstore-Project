<!DOCTYPE html>
<?php
	session_start();
	include("connect.php");

	if(isset($_POST['login'])){

    $user = mysqli_real_escape_string($db,$_POST['uid']);
    $password = mysqli_real_escape_string($db,$_POST['pwd']);

    if ($user != "" && $password != ""){

        $query = "select count(*) as countUser from CUSTOMER where username='".$user."' and password='".$password."'";
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_array($result);

        $count = $row['countUser'];

        if($count > 0){
            $_SESSION['login_user'] = $user;
            header('Location: cart.php');
        }else{
            echo "Invalid username and password";
        }

    }
    else{
    	echo "Invalid Username or Password";
    }

}
?>


<html>
<head>
	<meta charset="utf-8">
	<title>ACE Bookstore</title>
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="login-body">
	<header>
		<a href="index.php" class="header-brand">ace</a>
		<nav>
			<ul>
				<li><a href="#">New</a></li>
				<li><a href="#">Holiday</a></li>
				<li><a href="cart.php">Books</a></li>
			</ul>
				<img src="images/ace.png" alt="ACE logo" class="header-logo">
		</nav>
	</header>
<main>
	<div class="signup-header">
		<h2>Login</h2>
	</div>

	<form action="login.php" method="post">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="uid" id="uid" placeholder="Username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="pwd" id="pwd" placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" id="login" class="btn">Login</button>
		</div>

		<p>Not a member yet?<a href="signup.php"> Sign Up</p>
	</form>
</main>

<footer class="login-footer">
	<ul>
		<li><a href="#">Home</li>
		<li><a href="cart.php">Books</li>
		<li><a href="signup.php">Sign-Up</li>
		<li><a href="#">About Us</li>
		<li><a href="#">Contact Us</li>
	</ul>
		<div class="footer-socialmedia">
			<a href="#">
			<img src="images/twitter.png" alt="twitter logo">
			</a>
			<a href="#">
			<img src="images/instagram.png" alt="instagram logo">
			</a>
			<a href="#">
			<img src="images/facebook.png" alt="facebook logo">
			</a>
		</div>
</footer>
</body>
</html>