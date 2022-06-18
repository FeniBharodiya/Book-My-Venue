<?php

//database connection
include '../DBC.php';
//Session Started
session_start();
//getting otp on click of button and verifying it
if (isset($_POST['enterOtp'])) {
    $enteredotp = $_POST['ROTP'];
    if ($enteredotp == $_SESSION['customerOTP']) {
        header('Refresh: 0; url=ChangePassword.php');
    }
    } else {
        echo 'invalid otp';
        echo $con->error;
    }
?>
