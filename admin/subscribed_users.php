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
        <a href="add_session.php">Add a Session</a>
        <a href="delete_session.php">Delete a Session</a>
        <a href="registered_speakers.php">Registered Speakers</a>
        <a href="subscribed_users.php" class="active">Subscribed Users</a>
        <a href="change_password.php">Change Password</a>
        <h2>Subscribed Users</h2><br />
        <?php
        require('../connect_database.php');
        $count = 0;
        $total=$conn->query("SELECT * FROM mailinglist;");
        while($row = $conn->fetch_assoc()) {
            $count++;
            echo("<div class='user clearfix'>
					<p class='id'>" . $count . "</p>
					<p class='name'>" . $row['name']."</p>
					<p class='email'>" . $row['email']."</p>
					<p class='regno'>" . $row['regno']."</p>
					<p class='status'>" . $row['status']."</p>
				</div>");
        }
        if($count == 0) {
            echo "<p class='warn'>No Users Subscribed!</p>";
        }
        ?>
    </div>
</div>
</body>
</html>