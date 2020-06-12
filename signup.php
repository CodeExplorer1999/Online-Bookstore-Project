<!DOCTYPE html>
<?php
	$user = $password = $email = $name = $street = $province = $country = $postal_code = $confirm_password = "";
	$errors = array();
	include("connect.php");

	if(isset($_POST['signup-submit'])){
		$user = mysqli_real_escape_string($db,$_POST['uid']);
    	$password = mysqli_real_escape_string($db,$_POST['pwd']);
    	$email = mysqli_real_escape_string($db,$_POST['mail']);
    	$name = mysqli_real_escape_string($db,$_POST['name']);
    	$street = mysqli_real_escape_string($db,$_POST['street']);
    	$province = mysqli_real_escape_string($db,$_POST['province']);
    	$country = mysqli_real_escape_string($db,$_POST['country']);
    	$postal_code = mysqli_real_escape_string($db,$_POST['postal_code']);
    	$confirm_password = mysqli_real_escape_string($db,$_POST['pwd-repeat']);

    	if (empty($user)) { array_push($errors, "Username is required"); }
 		if (empty($email)) { array_push($errors, "Email is required"); }
  		if (empty($password)) { array_push($errors, "Password is required"); }
  		if (empty($name)) { array_push($errors, "Name is required"); }
  		if (empty($street)) { array_push($errors, "Street is required"); }
  		if (empty($province)) { array_push($errors, "Province is required"); }
  		if (empty($country)) { array_push($errors, "Country is required"); }
  		if (empty($postal_code)) { array_push($errors, "Postal Code is required"); }
  		if ($password != $confirm_password) {
			array_push($errors, "The two passwords do not match");
  		}

  		$user_check_query = "SELECT * FROM CUSTOMER WHERE username='$username' OR email='$email' LIMIT 1";
  		$result = mysqli_query($db, $user_check_query);
 		$users = mysqli_fetch_assoc($result);
  
	  	if ($users) { // if user exists
	    if ($users['username'] === $username) {
	      array_push($errors, "Username already exists");
	    }

	    if ($users['email'] === $email) {
	      array_push($errors, "email already exists");
	    }
	  	}

	  	
	  	if (count($errors) == 0) {
	  	//$password = md5($password);//encrypt the password before saving in the database

	  	$query = "INSERT INTO CUSTOMER (username, email, password, name, street, province, country, postal_code) 
	  			  VALUES('$user', '$email', '$password','$name', '$street', '$province','$country', '$postal_code')";
	  	mysqli_query($db, $query);
	  	$_SESSION['username'] = $username;
	  	$_SESSION['success'] = "You are now logged in";
	  	header('location: index2.php');
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
<body>
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
		<h2>Sign-Up</h2>
	</div>

	<form action="signup.php" method="post">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="uid" placeholder="Username">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="mail" placeholder="Email">
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Name">
		</div>
		<div class="input-group">
			<label>Street</label>
			<input type="text" name="street" placeholder="Street">
		</div>
		<div class="input-group">
			<label>Province</label>
			<input type="text" name="province" placeholder="Province">
		</div>
		<div class="input-group">
			<label>Postal Code</label>
			<input type="text" name="postal_code" placeholder="Postal Code">
		</div>
		<div class="input-group">
			<label>Country</label>
			<input type="text" name="country" placeholder="Country">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="pwd" placeholder="Password">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="pwd-repeat" placeholder="Confirm Password">
		</div>
		<div class="input-group">
			<button type="submit" name="signup-submit" class="btn">Sign-Up</button>
		</div>

		<p>Already a member?<a href="login.php"> Sign In</p>
	</form>
</main>

<footer>
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