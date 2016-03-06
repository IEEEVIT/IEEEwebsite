<?php
    //All the plumbing in the backend for initiating a mail to be sent.
    require('PHPMailer-master\PHPMailerAutoload.php');

    $mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Port = 587;
    $mail->Username = 'thatemail@thatwebsite.com';
    $mail->Password = "thatpassword";
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->From = "simplebro97@gmail.com";
    $mail->FromName = "IEEE-VIT";
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);