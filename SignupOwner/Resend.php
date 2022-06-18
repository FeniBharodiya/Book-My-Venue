<?php
session_start();
        $otp = rand(100000,999999);
        // Send OTP
        $O_Email = $_SESSION['Email'];
        require_once("./mail_function.php");
        $mail_status = sendCOTP($O_Email,$otp);
        $_SESSION['ownerOTP'] = $otp;
        header('Refresh: 0; url=OTPO.php');
?>