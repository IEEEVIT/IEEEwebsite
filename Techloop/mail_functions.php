<?php
    //PHPMailer Autoload php file should be included before calling this function
    function sendMail($recipients, $subject, $body, $altBody = null, $isSMTP = false, $host = 'smtp.gmail.com', $port = 465, $userName = 'subscribelist@techloop.esy.es', $password = 'techconverge', $debugLevel = 0) {
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer;
        if($isSMTP) {
            $mail->isSMTP();
            $mail->SMTPDebug = $debugLevel;
            $mail->Debugoutput = 'html';
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = $userName;
            $mail->Password = $password;
        }
        $mail->setFrom($userName, 'Techloop | IEEE-VIT');
        $mail->addReplyTo($userName, 'Techloop | IEEE-VIT');
        foreach ($recipients as $recipient) {
            $mail->addAddress($recipient['email'], $recipient['name']);
        }
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->AltBody = $altBody;
        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }

    //PHPMailer Autoload php file and connect database file should be included before calling this function
    function sendMailToAll($subject, $body, $altBody = null, $isSMTP = false, $host = 'smtp.gmail.com', $port = 587, $userName = 'ieeetechloop@gmail.com', $password = 'techconverge', $debugLevel = 0) {
        //Retreiving all email ids
        $result = mysqli_query($link, "SELECT name, email from subscribedusers WHERE status='confirmed'");
        $emails = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $emails[] = $row;
        }
        $i = 0;
        $recipients = array();
        foreach ($emails as $email) {
            $recipients[$i]['name'] = $email[0];
            $recipients[$i]['email'] = $email[1];
            $i++;
        }

        //Calling sendMail function
        sendMail($recipients, $subject, $body, $altBody, $isSMTP, $host, $port, $userName, $password, $debugLevel);
    }