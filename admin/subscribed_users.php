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
<head>
<body>
        <a href="logout.php">Log Out</a>
        <a href="admin_panel.php">Dashboard</a>
        <a href="subscribed_users.php" >Subscribed Users</a>
		<a href="send_mail.php" >Send Mail</a>
		<a href="check_contact_messages.php" >Check Contact Messages</a>
        <h2>Subscribed Users</h2><br />
        <?php
        require('../connect_db.php');
        $count = 0;
        $total=$conn->query("SELECT * FROM mailinglist WHERE status=1;");
        while($row = $total->fetch_assoc()) {
            $count++;
            echo("<div class='user clearfix'>
					<p class='id'>" . $count . "</p>
					<p class='name'>" . $row['name']."</p>
					<p class='email'>" . $row['email']."</p>
					<p class='regno'>" . $row['regno']."</p>
				</div><br />");
        }
        if($count == 0) {
            echo "<p class='warn'>No Users Subscribed!</p>";
        }
        ?>
    </div>
</div>
</body>
</html>