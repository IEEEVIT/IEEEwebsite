<?php
	session_start();
	$error='';
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Please enter Username and Password";
		}
		else
		{
            require('../connect_database.php');
			$username=$_POST['username'];
			$password=$_POST['password'];
			$username = mysqli_real_escape_string($link	, $username);
			$password = mysqli_real_escape_string($link, $password);
			$result = mysqli_query($link, "SELECT * FROM login WHERE username='$username'");
			$arr = mysqli_fetch_assoc($result);
            if($arr) {
                if (password_verify($password, $arr['password'])) {
                    $_SESSION['login_user']=$username;
                    header("location: admin_panel.php");
                } else {
                    $error = "Wrong Password! Try Again";
                }
            } else {
                $error = "Invalid Username";
            }
			mysqli_close($link);
		}
	}
	if(isset($_SESSION['login_user']) == "techloop_admin"){
		header("location: admin_panel.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="IEEE-2013">
	<meta name="description" content="Techloop is an initiative launched by IEEE-VIT Students Chapter to promote and encourage Technical Speaking in VIT University.">
	<meta name="keywords" content="Techloop, IEEE, VIT, Vellore, Students, Workshops">
	<title>Techloop | Login</title>
	<link rel="icon" href="../img/favicon.png">
	<!-----------------------------Stylesheets---------------------------->
	<link rel="stylesheet" type="text/css" href="../css/default-styles.css">
	<link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login-styles.css">
	<!-------------------------------------------------------------------->
	<script src="../js/init.js" type="text/javascript"></script>
</head>
<body>
	<div class="loginForm">
		<h2>Login</h2>
		<form action="" method="POST">
			<input name="username" type="text" placeholder="Username"></br>
			<input name="password" type="password" placeholder="Password"></br>
			<div class="error"><?php echo $error ?></div>
			<input name="submit" type="submit" value="Login">
		</form>
	</div>
<!--------------------------Scripts--------------------------------->
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>