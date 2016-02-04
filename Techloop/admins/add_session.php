<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	} else if ($_SESSION['login_user']!="techloop_admin") {
		header("location: index.php");
	} else {
		if(isset($_POST['submit'])) {
            require('../connect_database.php');
			$title = mysqli_real_escape_string($link, isset($_POST['title']) ? $_POST['title'] : "");
			$speaker = mysqli_real_escape_string($link, isset($_POST['speaker']) ? $_POST['speaker'] : "");
			$venue = mysqli_real_escape_string($link, isset($_POST['venue']) ? $_POST['venue'] : "");
			$time = mysqli_real_escape_string($link, isset($_POST['time']) ? $_POST['time'] : "");
			$date = mysqli_real_escape_string($link, isset($_POST['sDate']) ? $_POST['sDate'] : "");
			$description = mysqli_real_escape_string($link, isset($_POST['description']) ? $_POST['description'] : "");
			$result=mysqli_query($link,"SELECT COUNT(*) from sessions");
			$arr=mysqli_fetch_array($result,MYSQLI_NUM);
			$id=intval($arr[0]);
			$id++;
            if(file_exists($_FILES['zip']['tmp_name']) || is_uploaded_file($_FILES['zip']['tmp_name'])) {
                $info = pathinfo($_FILES['zip']['name']);
                $ext = $info['extension'];
                $newname = $title.".".$ext;
                $target1 = 'files/'.$newname;
                $tempTarget1 = '../' . $target1;
                move_uploaded_file( $_FILES['zip']['tmp_name'], $tempTarget1);
            } else {
                $target1 = '';
            }
            if(file_exists($_FILES['poster']['tmp_name']) || is_uploaded_file($_FILES['poster']['tmp_name'])) {
                $info = pathinfo($_FILES['poster']['name']);
                $ext = $info['extension'];
                $newname = $title.".".$ext;
                $target2 = 'img/'.$newname;
                $tempTarget2 = '../' . $target2;
                move_uploaded_file( $_FILES['poster']['tmp_name'], $tempTarget2);
            } else {
                $target2='img/poster_placeholder.png';
            }
			$ins = mysqli_query($link, "INSERT INTO sessions(id,Title,speaker,venue,date,time,description,content,poster) VALUES ('$id','$title','$speaker','$venue','$date','$time','$description','$target1','$target2')");

            if(isset($_POST['sendMail'])) {
                require '../libraries/PHPMailer/PHPMailerAutoload.php';
                require '../connect_database.php';
                require '../mail_functions.php';
                //$body = file_get_contents('../html_files/mails/next_session_mail.html');
                //$altBody = null;
                //sendMailToAll('Next Session', $body, $altBody);
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
	<link rel="stylesheet" type="text/css" href="../css/add_session-styles.css">
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
			<a href="add_session.php" class="active">Add a Session</a>
			<a href="delete_session.php">Delete a Session</a>
			<a href="registered_speakers.php">Registered Speakers</a>
            <a href="subscribed_users.php">Subscribed Users</a>
			<a href="change_password.php">Change Password</a>
		</div>
		<div class="main col ten form">
			<h2>Enter Session Details</h2>
			<form id="form" action="add_session.php" method="POST" enctype="multipart/form-data" onSubmit="return validate();">
				<input id="title" name="title" type="text" placeholder="Title of Session">
				<input name="speaker" type="text" placeholder="Speaker Name">
				<input name="venue" type="text" placeholder="Venue of the Session">
				<input id="sDate" name="sDate" type="text" placeholder="Session Date DD/MM/YYYY">
				<input name="time" type="text" placeholder="Session Timings">
				<textarea name="description" placeholder="Description of Session"></textarea>
                <p>Upload Session Content</p>
                <input name="zip" type="file">
                <p>Upload Session Poster</p>
                <input name="poster" type="file">
                <div>
                    <input id="sendMail" name="sendMail" type="checkbox"/>
                    <label for="sendMail">Send emails to all subscribed users about this session</label>
                </div>
				<div class="error"></div>
				<input name="submit" type="submit" value="Add Session">
			</form>
			<div class="instructions">
				<h4>Instructions:</h4>
				<p>Title and Date of the Session are mandatory</p>
				<p>Date of the Session should be in DD/MM/YYYY format</p>
                <p>Compressed file (ZIP) is preferred for the Session Content</p>
				<p>PNG file is preferred for the poster</p>
				<p>Make sure that width of poster is 300px</p>
				<p>Use <a href="https://tinypng.com/">tinypng.com</a> to compress the png file before uploading</p>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	function titleValidate() {
		var title = $("#title").val();
		if(title!="") {
			return true;
		} else {
			return false;
		}
	}
	function dateValidate () {
		var dateV = $("#sDate").val(); 
		var year = (new Date()).getFullYear();
		var error = false;  
		re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/; 
		if(dateV != '') { 
			if(regs = dateV.match(re)) { 
				if(regs[1] < 1 || regs[1] > 31)  { 
					error = true;
				} else if(regs[2] < 1 || regs[2] > 12) { 
					error = true; 
				} else if((regs[2]==4 || regs[2]==6 || regs[2]==9 || regs[2]==11) && regs[1]==31) { 
					error = true; 	
				} else if (regs[2]==2) {
					var isleap = (regs[3] % 4 == 0 && (regs[3] % 100 != 0 || regs[3] % 400 == 0));
					if (regs[1]>29 || (regs[1]==29 && !isleap)) {
						error = true;
					}
				}	
			} else { 
				error = true; 
			} 
		} else {
			error = true;
		}

		if(error) { 
			return false; 
		} else {
			return true;
		} 
	}
	function validate() {
		if(!dateValidate()) {
			$(".error").html("Please Enter a Valid Date DD/MM/YYYY");
		}
		if(!titleValidate()) {
			$(".error").html("Please Enter the Title of the Session");
		}
		return dateValidate()&&titleValidate();
	}
</script>

<!--------------------------Scripts--------------------------------->
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>