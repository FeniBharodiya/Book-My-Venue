<?php
session_start();
        $otp = rand(100000,999999);
        // Send OTP
        $C_Email = $_SESSION['Email'];
        require_once("./mail_function.php");
        $mail_status = sendCOTP($C_Email,$otp);
        $_SESSION['ownerOTP'] = $otp;
        header('Refresh: 0; url=OTPC.php');
?>