<?php
	if(isset($_POST['submit'])) {
        require('connect_database.php');
		$firstName = isset($_POST['firstName']) ? ucwords($_POST['firstName']) : "" ;
		$lastName = isset($_POST['lastName']) ? ucwords($_POST['lastName']) : "" ;
		$regNo = isset($_POST['regno']) ? strtoupper($_POST['regno']) : "" ;
		$contact = isset($_POST['contact']) ? $_POST['contact'] : "" ;
		$email = isset($_POST['mail']) ? $_POST['mail'] : "" ;
		$expertise = isset($_POST['areas']) ? $_POST['areas'] : "" ;
		$other = isset($_POST['other']) ? $_POST['other'] : "" ;
		$topic = isset($_POST['topic']) ? $_POST['topic'] : "" ;
		$dat = isset($_POST['date']) ? $_POST['date'] : "" ;
		$experience = isset($_POST['prev']) ? $_POST['prev'] : "" ;
		$projects = isset($_POST['proj']) ? $_POST['proj'] : "" ;
		$links = isset($_POST['link']) ? $_POST['link'] : "" ;
		$firstName = mysqli_real_escape_string($link, $firstName);
		$lastName = mysqli_real_escape_string($link, $lastName);
		$regNo = mysqli_real_escape_string($link, $regNo);
		$contact = mysqli_real_escape_string($link, $contact);
		$email = mysqli_real_escape_string($link, $email);
		$expertise = mysqli_real_escape_string($link, $expertise);
		$other = mysqli_real_escape_string($link, $other);
		$topic = mysqli_real_escape_string($link, $topic);
		$dat = mysqli_real_escape_string($link, $dat);
		$experience = mysqli_real_escape_string($link, $experience);
		$projects = mysqli_real_escape_string($link, $projects);
		$links = mysqli_real_escape_string($link, $links);
	    $ins = mysqli_query($link, "INSERT INTO speakerdetails(FirstName,LastName,RegNo,Contact,Email,Expertise,Other,Topic,Date,Experience,Projects,Links) VALUES ('$firstName','$lastName','$regNo','$contact','$email','$expertise','$other','$topic','$dat','$experience','$projects','$links')");

        require 'libraries/PHPMailer/PHPMailerAutoload.php';
        require 'mail_functions.php';
        $recipients[0]['name'] = $firstName . ' ' . $lastName;
        $recipients[0]['email'] = $email;
        //$body = file_get_contents('html_files/mails/registered_speakers_mail.html');
        //$altBody = null;
        //sendMail($recipients, 'Speaker Registration', $body, $altBody);
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
	<title>Techloop | IEEE-VIT</title>
	<link rel="icon" href="img/favicon.png">
	<!-----------------------------Stylesheets---------------------------->
	<link rel="stylesheet" type="text/css" href="css/default-styles.css">
	<link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/site-styles.css">
	<link rel="stylesheet" type="text/css" href="css/registration-styles.css">
	<!-------------------------------------------------------------------->
	<script src="js/init.js" type="text/javascript"></script>
</head>
<body>
	<div class="banner">
		<a href="index.php"><img src="img/techloop-logo.png" alt="Techloop Logo" class="logo"></a>
	</div>
	<div class="navbar">
		<i class="fa fa-bars menu"></i>
		<img src="img/small-logo.png" alt="Small Logo" class="small-logo">
		<ul class="navlist">
			<li><a href="index.php">Home</a></li>
			<li><a href="sessions.php">Sessions</a></li>
			<li><a href="registration.php" class="active">Take a Session</a></li>
			<li><a href="about.php">About Us</a></li>
		</ul>
		<div class="searchbar">
			<i class="fa fa-search"></i>
			<input type="text" placeholder="Search" class="search">
		</div>
	</div>
	<div class="row">
		<div class="col nine">
			<div class="title">
                <h2>Your chance to become a certified technical speaker!</h2>
                <h3>Register now to take your own session. We welcome students from different branches and chapters to take sessions on topics pertaining to their forte.</h3>
            </div>
			<form action="registration.php" class="form clearfix" Method="POST">
				<div class="col six form-box validB" id="nameB">
					<div class="label">
						<label for="first-name">Name <sup><i class="fa fa-asterisk"></i></sup></label>
					</div>
					<input type="text" id="first-name"  placeholder="First Name" name="firstName">
					<input type="text" id="last-name" placeholder="Last Name" name="lastName">
					<div class="col twelve validT">
						<p>Please enter your full name <i class="fa fa-warning"></i></p>
					</div>
				</div>
				<div class="col six form-box validB" id="regnoB">
					<div class="label">
						<label for="regno">Registration Number <sup><i class="fa fa-asterisk"></i></sup></label>
					</div>
					<input type="text" id="regno" placeholder="e.g: 13BCE0164" name="regno">
					<div class="col twelve validT">
						<p>Please enter a valid registration number <i class="fa fa-warning"></i></p>
					</div>	
				</div>
				<div class="col six form-box validB" id="contactB">
					<div class="label">
						<label for="contact">Contact <sup><i class="fa fa-asterisk"></i></sup></label>
					</div>
					<input type="text" id="contact" placeholder="Your Mobile Number" name="contact">
					<div class="col twelve validT">
						<p>Please enter a valid mobile number <i class="fa fa-warning"></i></p>
					</div>	
				</div>
				<div class="col six form-box validB" id="mailB">
					<div class="label">
						<label for="mail">Email <sup><i class="fa fa-asterisk"></i></sup></label>
					</div>
					<input type="text" id="mail" placeholder="e.g: ieeetechloop@gmail.com" name="mail">
					<div class="col twelve validT">
						<p>Please enter a valid e-mail id <i class="fa fa-warning"></i></p>
					</div>	
				</div>
				<div class="col twelve">
					<div class="col six form-box validB" id="expertB">
						<div class="label">
							<label for="expert">Areas of expertise <sup><i class="fa fa-asterisk"></i></sup></label>
						</div>
						<select id="expert" class="turnintodropdown" name="areas">
							<option value="temp">Select your area</option>
							<option value="electronics">Electronics</option>
							<option value="computer">Computer Science</option>
							<option value="automotive">Automotive</option>
							<option value="biotech">Biotechnology and Medical Sciences</option>
							<option value="other">Other</option>
						</select>
						<div class="col twelve validT">
							<p>Please select an area <i class="fa fa-warning"></i></p>
						</div>
						<div class="other validB" id="otherB">
							<input type="text" id="other" placeholder="Mention it here" name="other">
							<div class="col twelve validT">
								<p>Please mention your area <i class="fa fa-warning"></i></p>
							</div>
						</div>
					</div>
					<div class="col six form-box validB" id="topicB">
						<div class="label">
							<label for="topic">Topic of the session <sup><i class="fa fa-asterisk"></i></sup></label>
						</div>
						<input type="text" id="topic" placeholder="e.g: Web Development" name="topic">
						<div class="col twelve validT">
							<p>Please enter the topic <i class="fa fa-warning"></i></p>
						</div>
					</div>
				</div>
				<div class="col six form-box" id="dateB">
					<div class="label">
						<label for="date">Preferred date for your session</label>
					</div>
					<input type="text" id="date" placeholder="e.g: 21/05/2015" name="date">	
				</div>
				<div class="col six form-box" id="prevB">
					<div class="label">
						<label for="prev">Previous Experience</label>
					</div>
					<input type="text" id="prev" placeholder="Any taken sessions" name="prev">	
				</div>
				<div class="col six form-box" id="projB">
					<div class="label">
						<label for="proj">Prior Projects</label>
					</div>
					<input type="text" id="proj" placeholder="Any undergoing projects" name="proj">
				</div>
				<div class="col six form-box validB" id="linkB">
					<div class="label">
						<label for="link">Link to publicised work/blogs</label>
					</div>
					<input type="text" id="link" placeholder="e.g: http://www.sample.com" name="link">
					<div class="col twelve validT">
						<p>Please enter a valid link <i class="fa fa-warning"></i></p>
					</div>
				</div>
				<div class="col twelve form-box registerB">
					<input type="submit" value="Register" id="submit" name="submit">
					<p class="feedback"></p>
				</div>
			</form>
		</div>
	<?php
		$today=intval(date("Ymd"));
        require('connect_database.php');
		$result=mysqli_query($link, "SELECT * FROM sessions");
		$id=array();
		$dates=array();
		while($arr=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($id,intval($arr['id']));
			$dateInput = explode('/',$arr['date']);
			$newDate = $dateInput[2].$dateInput[1].$dateInput[0];
			array_push($dates,intval($newDate));
		}
		$n=count($dates);
		for($i=1;$i<$n;$i++) {
			$temp=$dates[$i];
			$temp1=$id[$i];
			$j=$i-1;
			while(@($temp<$dates[$j])&&($j>=0)){
				$dates[$j+1]=$dates[$j];
				$id[$j+1]=$id[$j];
				$j--;
			}
			$dates[$j+1]=$temp;
			$id[$j+1]=$temp1;
		}
		for($i=0;@($today>$dates[$i]&&($i<$n)) ;$i++);	
		$prev=$i-1;
		$current=$i;
        echo '<div class="col three">';
        if($current!=$n){
            $result=mysqli_query($link, "SELECT * FROM sessions where id='$id[$current]'");
            $arr=mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo('<div class="nextS">
                    <a href="sessions.php">
                        <img src="'.$arr['poster'].'" alt="Next Session Poster">
                        <h2>Next Session</h2>
                        <p>'.$arr['Title'].'</p>
                    </a>
                    </div>');
        } else {
            echo('<div class="nextS">
                    <a href="registration.php">
                        <img src="img/speakerposter.png" alt="Take a Session Poster">
                        <h2>Register Now</h2>
                    </a>
                </div>');
        }
        echo '<div class="subscribe">
                <h2>Subscribe</h2>
                <p>to receive regular updates by email</p>
                <div class = "subscribeInput">
                    <i class = "fa fa-user"></i>
                    <input type = "text" id = "subscriberName" placeholder = "Your Name"/>
                </div>
                <div class = "subscribeInput">
                    <i class = "fa fa-envelope"></i>
                    <input type = "text" id = "subscriberEmail" placeholder = "Your E-Mail ID"/>
                </div>
                <button class = "submitSubscriber"><i class = "fa fa-chevron-right"></i></button>
                <p class = "subscriberFeedback"></p>
            </div>
        </div>';
	?>
	<div class="footer row">
		<div class="col six contactUs">
			<p>Contact Us</p>
			<div class="icons">
				<a href="https://www.facebook.com/Techloop.in" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank" class="twit"><i class="fa fa-twitter"></i></a>
				<a href="https://plus.google.com/111989802299294396894/posts" target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a>
			</div>
		</div>
		<div class="col six footerLogo">
			<p class="initiative">An Initiative by</p>
			<a href="http://www.ieeevit.com/" target="_blank" class="ieee-logo"><img src="img/ieee-logo.png" alt="IEEE-Logo"></a>
		</div>
		<div class="col twelve copyright">
			<p>&copy; 2014 Copyright, IEEE VIT</p>
		</div>
	</div>

    <div class="dialog-box-container">
        <div class="dialog-box-shade"></div>
        <div class="dialog-box">
            <h2>Thanks for subscribing!</h2>
            <p>Please confirm your email id with confirmation link sent to your mail. This mail may go to your spam folder because of some technical reasons. If it is in spam folder then report not as spam.</p>
            <div class="close-button">Close</div>
        </div>
    </div>

<!--------------------------Scripts--------------------------------->
<script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="js/site-js.js" type="text/javascript"></script>
<script src="js/registration-js.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>