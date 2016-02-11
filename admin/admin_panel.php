<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	} else if ($_SESSION['login_user']!="ieee_admin") {
		header("location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
        <h1>Welcome Admin!</h1>
			<p>Please be careful before making any changes as this will modify the main techloop page</p>
		    <a href="logout.php">Log Out</a>
			<a href="admin_panel.php" class="active">Dashboard</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="send_mail.php">Send Mail</a>
</html>