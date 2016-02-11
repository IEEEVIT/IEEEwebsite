<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IEEE|VIT students chapter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="css/nb.css" rel="stylesheet">

    <!-- TODO -->
    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="IEEE | VIT sudents chapter" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body >

        

    <!-- About Section -->
    <section id="mailing list" class="about-section">
        <div class="container">
            


            <div class="row headtext">
                
                <a  href="index.html#page-top"><img src="img/ieee-main1.png" class="hero-logo" onmouseover="this.src='img/ieeevit.png';" onmouseout="this.src='img/ieee-main1.png';"></a>
                <h1 style="color:#ecf0f1; font-family: Helvetica">
                    We just need a few more details to add you to our mailing list! 
                </h1>
                
        </div>

            <div class="row" >
                <div class="col-lg-12"id="contact-mid">
                    <form name="sentMessage" method="post" action="mailing_list.php" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="regno" class="form-control" placeholder="Your Registration number *" id="regno" required data-validation-required-message="Please enter your registration number.">
                                    <p class="help-block text-danger"></p>
                                </div>
									<input type="hidden" name="email" value="<?php echo $_POST["email"].'"'; ?></input>
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" id="confrm-subscribe">Subscribe !</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jsscript.js"></script>

</body>

</html>
