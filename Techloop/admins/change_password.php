<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	} else if ($_SESSION['login_user']!="techloop_admin") {
		header("location: index.php");
	} else {
		$error = "";
		if(isset($_POST['submit'])) {
			$oldPwd = $_POST['oldPwd'];
			if($_POST['newPwd']==$_POST['cNewPwd']) {
				if(strlen($_POST['newPwd'])>=4) {
                    require('../connect_database.php');
					$newPwd = $_POST['newPwd'];
					$oldPwd = mysqli_real_escape_string($link, $oldPwd);
					$newPwd = mysqli_real_escape_string($link, $newPwd);
                    $newPwd = password_hash($newPwd,  PASSWORD_DEFAULT);
					$result=mysqli_query($link, "SELECT password FROM login WHERE username = 'techloop_admin'");
					$arr=mysqli_fetch_array($result);
					if(password_verify($oldPwd, $arr['password'])) {
						$result=mysqli_query($link, "UPDATE login SET password = '$newPwd' WHERE username = 'techloop_admin'");
						if($result) {
							$error = "Password Changed Successfully!";
							mysqli_close($link);
						} else {
							$error = "Something Wrong happened, Please Try Again!";
							mysqli_close($link);
						}
					} else {
						$error = "Wrong Password!";
						mysqli_close($link);
					}
				} else {
					$error = "Password should contain atleast 4 characters!";
				}
			}
			else {
				$error = "Passwords don't match!";
			}
		}
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
	<title>Techloop | Admin Panel</title>
	<link rel="icon" href="../img/favicon.png">
	<!-----------------------------Stylesheets---------------------------->
	<link rel="stylesheet" type="text/css" href="../css/default-styles.css">
	<link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/change_password-styles.css">
	<!-------------------------------------------------------------------->
	<script src="../js/init.js" type="text/javascript"></script>
</head>
<body>
	<div class="navbar">
		<img src="../img/small-logo.png" alt="Techloop Logo">
		<h2>Techloop Admin Panel</h2>
		<a href="logout.php">Log Out</a>
	</div>
	<div class="container row">
		<div class="sidebar col two">
			<a href="admin_panel.php">Dashboard</a>
			<a href="add_session.php">Add a Session</a>
			<a href="delete_session.php">Delete a Session</a>
			<a href="registered_speakers.php">Registered Speakers</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="change_password.php" class="active">Change Password</a>
		</div>
		<div class="main col ten">
			<div class="form">
				<h2>Change Password</h2>
				<form action="" method="POST">
				<input name="oldPwd" type="password" placeholder="Current Password">
				<input name="newPwd" type="password" placeholder="New Password">
				<input name="cNewPwd" type="password" placeholder="Confirm New Password">
				<div class="error"><?php echo $error ?></div>
				<input name="submit" type="submit" value="Change Password">
			</form>
			</div>
		</div>
	</div>
	
<!--------------------------Scripts--------------------------------->
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>