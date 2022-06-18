<?php
session_start();
include '../DBC.php';
if(isset($_POST['enterEmail']))
{
    $REmail = $_POST['REmail'];
    //for customer login query
    $sqlC = "SELECT * FROM customer WHERE C_Email = '$REmail'";
    $resultC = mysqli_query($con, $sqlC);
    $rowC = mysqli_fetch_array($resultC, MYSQLI_ASSOC);
    $countC = mysqli_num_rows($resultC);

    //for owner login query
    $sqlO = "SELECT * FROM owner WHERE O_Email = '$REmail'";
    $resultO = mysqli_query($con, $sqlO);
    $rowO = mysqli_fetch_array($resultO, MYSQLI_ASSOC);
    $countO = mysqli_num_rows($resultO);
    
    if ($countC == 1) {
        
        $_SESSION['REmail'] = $REmail;
        $otp = rand(100000,999999);
        // Send OTP
        require_once("./mail_function.php");
        $mail_status = sendCOTP($REmail,$otp);
        $_SESSION['customerOTP'] = $otp;
        //redirect link after succesfully login of customer
        header('Refresh: 0; url=OTP.php');
        
    } elseif ($countO == 1) {
        
        $_SESSION['REmail'] = $REmail;
        $otp = rand(100000,999999);
        // Send OTP
        require_once("./mail_function.php");
        $mail_status = sendCOTP($REmail,$otp);
        $_SESSION['customerOTP'] = $otp;
        //redirect link after succesfully login of customer
        header('Refresh:0; url=OTP.php');
    }
    else {
        //If Email Password is invalid the it will alert the user
        echo '<script>alert("Enter Valid Email");'
        . 'window.location.href = "../ForgotPassword/EmailVerify.php";'
        . '</script>';
    }
}

?>