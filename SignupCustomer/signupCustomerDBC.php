<?php
session_start();

include '../DBC.php';
            
     if(isset($_POST["btnsubmit"]))
        {
            //Use of MD5 to store encrypted data
            $C_Name = $_POST['txtname'];
            $C_Email = $_POST['email'];
            $C_PhoneNumber = $_POST['mnumber'];
            $C_Gender = $_POST['gender'];
            $C_Password = md5($_POST['txtpassword']);
            
            $_SESSION['Name'] = $C_Name;
            $_SESSION['PhoneNumber'] = $C_PhoneNumber;
            $_SESSION['Email'] = $C_Email;
            $_SESSION['Gender'] = $C_Gender;
            $_SESSION['Password'] = $C_Password;
            
            
            $sql="select * from customer where C_Email = '$C_Email'";
            $sql2="select * from owner where O_Email = '$C_Email'";
            $res= $con->query($sql); 
            $res2= $con->query($sql2); 
            if (mysqli_num_rows($res) >= 0 || mysqli_num_rows($res2) >= 0) 
            {
                    error_reporting(E_ERROR | E_PARSE);
                    $row = $res->fetch_assoc();
                    $row2 = $res2->fetch_assoc();
                    if($C_Email == $row['C_Email'] || $C_Email == $row2['O_Email'])
                    {
                           // alert box to show alert that email is already there
                        echo '<script>alert("Email is Already in use");'
                            . 'window.location.href = "signupCustomer.php";'
                            . '</script>';
                    }
                    else{
                    
                        $otp = rand(100000,999999);
                        // Send OTP
                        require_once("./mail_function.php");
                        $mail_status = sendCOTP($C_Email,$otp);
                        $_SESSION['customerOTP'] = $otp;
                        //redirect link after succesfully login of customer
                        header('Refresh: 0; url=OTPC.php');
                        
                    }
            
            
            }
            else{
                
//                    $otp = rand(100000,999999);
//                    // Send OTP
//                    require_once("./mail_function.php");
//                    $mail_status = sendCOTP($C_Email,$otp);
//                    $_SESSION['customerOTP'] = $otp;
//                    //redirect link after succesfully login of customer
//                    header('Refresh: 0; url=OTPC.php');
                
                    echo $con->error;
                
            }
        }
?>
