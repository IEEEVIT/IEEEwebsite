<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	}
	else if ($_SESSION['login_user']!="ieee_admin") {
        header("location: index.php");
    }
	else
	{
		echo '<html><body><a href="logout.php">Log Out</a>
			<a href="admin_panel.php" class="active">Dashboard</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="send_mail.php">Send Mail</a>
			<a href="check_contact_messages.php" >Check Contact Messages</a></body></html>';
		require("../connect_db.php");
		$sql="SELECT * FROM contactus;";
		if($result=$conn->query($sql))
		{
			while($row=$result->fetch_assoc())
			{
				echo "<p>".$row["id"]." ".$row["name"]." ".$row["email"]." ".$row["phone"]." ".$row["regno"]."</p>";
				echo "<p>".$row["message"]."</p><br />";
			}
		}
		else
		{
			echo "No new messages.";
		}
	}
?>