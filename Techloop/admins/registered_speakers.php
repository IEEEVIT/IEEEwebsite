<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	} else if ($_SESSION['login_user']!="techloop_admin") {
		header("location: index.php");
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
	<link rel="stylesheet" type="text/css" href="../css/registered_speakers-styles.css">
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
			<a href="registered_speakers.php" class="active">Registered Speakers</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="change_password.php">Change Password</a>
		</div>
		<div class="main col ten">
			<h2>Registered Speakers</h2>
			<?php
                require('../connect_database.php');
				$result=mysqli_query($link, "SELECT * FROM speakerdetails");
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    $arr[] = $row;
                }
				$n = mysqli_num_rows($result);
				if($n==0) {
					echo "<p class='warn'>No Speakers Registered!</p>";
				} else {
					for($i=0; $i<$n; $i++) {
						echo "<div class='speaker'>";
						echo "<p><span class='title'>First Name: &nbsp;</span>".$arr[$i][1]."</p>";
						echo "<p><span class='title'>Last Name: &nbsp;</span>".$arr[$i][2]."</p>";
						echo "<p><span class='title'>Registration Number: &nbsp;</span>".$arr[$i][3]."</p>";
						echo "<p><span class='title'>Contact: &nbsp;</span>".$arr[$i][4]."</p>";
						echo "<p><span class='title'>Email: &nbsp;</span>".$arr[$i][5]."</p>";
						switch($arr[$i][6]) {
							case 'electronics':
								echo "<p><span class='title'>Areas of Expertise: &nbsp;</span>Electronics</p>";
								break;
							case 'computer':
								echo "<p><span class='title'>Areas of Expertise: &nbsp;</span>Computer Science</p>";
								break;
							case 'automotive':
								echo "<p><span class='title'>Areas of Expertise: &nbsp;</span>Automotive</p>";
								break;
							case 'biotech':
								echo "<p><span class='title'>Areas of Expertise: &nbsp;</span>Biotechnology and Medical Sciences</p>";
								break;
							case 'other':
								echo "<p><span class='title'>Areas of Expertise: &nbsp;</span>".$arr[$i][7]."</p>";
								break;
						}
						echo "<p><span class='title'>Topic of the Session: &nbsp;</span>".$arr[$i][8]."</p>";
						if($arr[$i][9]!="") {
							echo "<p><span class='title'>Preferred Date for Session: &nbsp;</span>".$arr[$i][9]."</p>";
						}
						if($arr[$i][10]!="") {
							echo "<p><span class='title'>Previous Experience: &nbsp;</span>".$arr[$i][10]."</p>";
						}
						if($arr[$i][11]!="") {
							echo "<p><span class='title'>Prior Projects: &nbsp;</span>".$arr[$i][11]."</p>";
						}
						if($arr[$i][12]!="") {
							echo "<p><span class='title'>Link to publicised work/blogs: &nbsp;</span>".$arr[$i][12]."</p>";
						}
						echo "</div>";
					}	
				}
				
			?>
		</div>
	</div>
	
<!--------------------------Scripts--------------------------------->
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>