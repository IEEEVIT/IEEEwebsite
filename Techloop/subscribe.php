<?php
    require('connect_database.php');

    if(isset($_REQUEST['name']) && isset($_REQUEST['email'])) {
        $name = mysqli_real_escape_string($link, ucwords($_REQUEST['name']));
        $email = mysqli_real_escape_string($link, $_REQUEST['email']);
        $verificationid = generateVerificationId();
        $inserted = mysqli_query($link, "INSERT INTO subscribedusers(name, email, verificationid) VALUES ('$name', '$email', '$verificationid')");
        if($inserted) {
            $confirmationLink = generateConfirmationLink($verificationid);
            require 'libraries/PHPMailer/PHPMailerAutoload.php';
            require 'mail_functions.php';
            $recipients[0]['name'] = $name;
            $recipients[0]['email'] = $email;
            //$body = file_get_contents('html_files/mails/confirmation_mail.html');
            //$altBody = null;
            $body = '<html><body><h2>Confirmation Link: </h2>' . $confirmationLink . '<p>Please click the above link to confirm your subscription</p></body></html>';
            sendMail($recipients, 'Subscription confirmation', $body, $altBody);
        }
    }

    if(isset($_REQUEST['key']) && !isset($_REQUEST['unsubscribe'])) {
        $verificationid = $_REQUEST['key'];
        $check = mysqli_query($link, "SELECT COUNT(*) from subscribedusers WHERE verificationid='$verificationid'");
        $num = mysqli_fetch_array($check,MYSQLI_NUM);
        if($num[0] == 1) {
            $result = mysqli_query($link, "SELECT status from subscribedusers WHERE verificationid='$verificationid'");
            $status = mysqli_fetch_array($result);
            if($status['status'] == 'pending') {
                $query = mysqli_query($link, "UPDATE subscribedusers SET status = 'confirmed' WHERE verificationid = '$verificationid'");
                if($query) {
                    echo file_get_contents('html_files/subscribed.html');
                } else {
                    echo file_get_contents('html_files/something_wrong.html');
                }
            } else {
                echo file_get_contents('html_files/already_subscribed.html');
            }
        } else {
            echo file_get_contents('html_files/invalid_subscription.html');
        }
    }

    if(isset($_REQUEST['key']) && isset($_REQUEST['unsubscribe'])) {
        if($_REQUEST['unsubscribe'] === '1') {
            $verificationid = $_REQUEST['key'];
            $check = mysqli_query($link, "SELECT COUNT(*) from subscribedusers WHERE verificationid='$verificationid'");
            $num = mysqli_fetch_array($check,MYSQLI_NUM);
            if($num[0] == 1) {
                $result = mysqli_query($link, "DELETE FROM `subscribedusers` WHERE verificationid='$verificationid'");
                if($result) {
                    echo file_get_contents('html_files/unsubscribed.html');
                } else {
                    echo file_get_contents('html_files/something_wrong.html');
                }
            } else {
                echo file_get_contents('html_files/invalid_subscription.html');
            }
        }
    }

    function generateVerificationId($length = 50) {
        global $link;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $check = mysqli_query($link, "SELECT COUNT(*) from subscribedusers WHERE verificationid='$randomString'");
        $num = mysqli_fetch_array($check,MYSQLI_NUM);
        if($num[0] == 0) {
            return $randomString;
        } else {
            return generateVerificationId();
        }
    }

    function generateConfirmationLink($verificationid, $host = 'www.techloop.esy.es') {
        $confirmationLink = 'http://' . $host . '/subscribe.php?key=' . $verificationid;
        return $confirmationLink;
    }

    function generateUnsubscribeLink($verificationid, $host = 'www.techloop.esy.es') {
        $unsubscribeLink = 'http://' . $host . '/subscribe.php?key=' . $verificationid . '&unsubscribe=1';
        return $unsubscribeLink;
    }