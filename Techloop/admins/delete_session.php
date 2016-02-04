<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	} else if ($_SESSION['login_user']!="techloop_admin") {
		header("location: index.php");
	} else {
		if(isset($_POST['sessionID'])){
			$sessionID = $_POST['sessionID'];
            require('../connect_database.php');
			$del = mysqli_query($link,"DELETE FROM sessions WHERE id='$sessionID'");
			$ins = mysqli_query($link,"UPDATE sessions SET id=id-1 WHERE id>'$sessionID'");
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
	<link rel="stylesheet" type="text/css" href="../css/delete_session-styles.css">
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
			<a href="delete_session.php" class="active">Delete a Session</a>
			<a href="registered_speakers.php">Registered Speakers</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="change_password.php">Change Password</a>
		</div>
		<div class="main col ten">
		<?php
            require('../connect_database.php');
			$total=mysqli_query($link,"SELECT * FROM sessions");
			while($row = mysqli_fetch_array($total,MYSQLI_ASSOC))
			{
				echo("<div class='session clearfix'>
					<p class='id'>".$row['id']."</p>
					<p>".$row['Title']."</p>
					<form action='' method='POST'>
						<button name='sessionID' value='".$row['id']."'>Delete</button>
					</form>
				</div>");
			}
		?>
		</div>
	</div>
	
<!--------------------------Scripts--------------------------------->
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>