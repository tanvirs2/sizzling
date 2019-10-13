<?php

/* ======================================================= EMAIL FUNCTIONS START =================================================== */

/**
 * This function used to send emails using PHP Mailer Class<br> 
 * @input: $UserEmail, $UserName, $ReplyToEmail, $EmailSubject, $EmailBody; return true/$status(if error) 
 */
function sendEmailFunction($UserEmail = '', $UserName = '', $ReplyToEmail = '', $EmailSubject = '', $EmailBody = '') {

    global $config;
    $status = '';

    if ($UserEmail == '' OR $UserName == '' OR $EmailSubject == '' OR $EmailBody == '') {
        $status = "Parameters missing.";
    } else {
        require_once(basePath("library/email/class.phpmailer.php"));
        $mail = new PHPMailer();
        $mail->Host = get_option('SMTP_SERVER_ADDRESS');
        $mail->Port = get_option('SMTP_PORT_NO');
        $mail->SMTPSecure = 'tls';
        $mail->IsSMTP(); // Send via SMTP
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true; // Turn on SMTP authentication
        $mail->Username = get_option('HOSTING_ID'); // Enter your SMTP username
        $mail->Password = get_option('HOSTING_PASS'); // SMTP password
        $webmaster_email = get_option('EMAIL_ADDRESS_GENERAL'); //Add reply-to email address
        $email = $UserEmail; // Add recipients email address
        $name = $UserName; // Add Your Recipient's name
        $mail->From = get_option('EMAIL_ADDRESS_GENERAL');
        $mail->FromName = get_option('EMAIL_ADDRESS_GENERAL');
        $mail->AddAddress($email, $name);
        $mail->AddReplyTo($ReplyToEmail, "CANALI SOFTWARE ENGINEERS LTD");
        $mail->WordWrap = 50; // Set word wrap
        $mail->IsHTML(true); // Send as HTML
        $mail->Subject = $EmailSubject;
        $mail->Body = $EmailBody;
        $mail->AltBody = $mail->Body; //Plain Text Body

        if (!$mail->Send()) {
            $status = "Email sending failed.";
        } else {
            $status = '';
        }
    }

    if ($status == '') {
        return true;
    } else {
        return $status;
    }
}

/* ======================================================= EMAIL FUNCTIONS END =================================================== */
?>