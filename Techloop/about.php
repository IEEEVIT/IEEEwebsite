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
	<link rel="stylesheet" type="text/css" href="css/about-styles.css">
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
			<li><a href="registration.php">Take a Session</a></li>
			<li><a href="about.php" class="active">About Us</a></li>
		</ul>
		<div class="searchbar">
			<i class="fa fa-search"></i>
			<input type="text" placeholder="Search" class="search">
		</div>
	</div>
	<div class="row">
		<div class="col nine">
			<div class="about clearfix">
				<img src="img/techloop-logo.png" alt="Techloop Logo">
				<p class="what">What is Techloop?</p>
				<p class="details">&emsp;&emsp;&emsp;&emsp;<span>T</span>echloop is an IEEE VIT initiative. It is a platform for individuals to showcase their knowledge and exchange their ideas pertaining to various technical fields. Achieved through the process of weekly sessions, in a structured manner where technical speakers share their experiences. A thorough screening process takes place before the actual session, which helps us decide the credibility of the speaker. The speakers then have dry runs for their session after being selected, and are given certificates for the session.</p>
				<p class="stay">-- Stay in the Loop --</p>
				<div class="col six">
					<div class="member">
						<img src="img/president.png" alt="President">
						<p>President</p>
						<p>Aishani Chhabra</p>
						<p><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 8870213701</p>
					</div>
				</div>
				<div class="col six">
					<div class="member">
						<img src="img/vicepresident.png" alt="Vice President">
						<p>Vice President</p>
						<p>Abhinav Bakshi</p>
						<p><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 9597599240</p>
					</div>
				</div>
				<div class="col six">
					<div class="member">
						<img src="img/technicalhead.png" alt="Technical Head">
						<p>Technical Head</p>
						<p>Harjatin Singh Baweja</p>
						<p><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 9159873001</p>
					</div>
				</div>
				<div class="col six">
					<div class="member">
						<img src="img/techloopincharge.png" alt="Techloop Incharge">
						<p>Techloop Incharge</p>
						<p>Karthik Narayan</p>
						<p><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 9994840238</p>
					</div>
				</div>	
				<p class="contactinfo">Contact Information</p>
				<div class="contact">
					<p>IEEE-VIT Chapter</p>
					<p>VIT University</p>
					<p>Vellore - 632014</p>
					<p>Tamil Nadu</p>
					<p><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 8870213701</p>
					<p><i class="fa fa-envelope"></i>&nbsp;&nbsp; ieeevit@vit.ac.in</p> 
				</div>	
			</div>
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
	</div>
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
<!------------------------------------------------------------------>
</body>
</html>