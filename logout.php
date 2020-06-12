<?php
if (session_destroy()) {
	header("Location: index.php");
}
?>


<?php
include ('login.php');

if (isset($_SESSION['login_user'])) {
	header("location: cart.php");
}
?>