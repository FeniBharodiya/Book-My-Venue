<?php
session_start();

include '../DBC.php';
            
     if(isset($_POST["btnsubmit"]))
        {
            //Use of MD5 to store encrypted data
            $Type = $_POST['type'];
            $O_Name = $_POST['txtname'];
            $O_PhoneNumber = $_POST['mnumber'];
            $O_Email = $_POST['email'];
            $O_Password = md5($_POST['txtpassword']);
            $O_Registration_Date = date('Y-m-d');
            
            $_SESSION['Name'] = $O_Name;
            $_SESSION['PhoneNumber'] = $O_PhoneNumber;
            $_SESSION['Email'] = $O_Email;
            $_SESSION['Password'] = $O_Password;
            $_SESSION['Type'] = $Type;
            
            
            $sql="select * from owner where O_Email= '$O_Email'";
            $sql2 = "select * from Customer where C_Email= '$O_Email'";
            $res= $con->query($sql);
            $res2 = $con->query($sql2);
            if (mysqli_num_rows($res) >= 0 || mysqli_num_rows($res2) >= 0) 
            {
                error_reporting(E_ERROR | E_PARSE);
                    $row = $res->fetch_assoc();
                    $row2 = $res2 ->fetch_assoc();
                    if($O_Email == $row['O_Email'] || $O_Email == $row2['C_Email'])
                    {
                           // alert box to show alert that email is already there
                        echo '<script>alert("Email is Already in use");'
                            . 'window.location.href = "signup.php";'
                            . '</script>';
                    }
                    else{
                        
                            $otp = rand(100000,999999);
                            // Send OTP
                            require_once("./mail_function.php");
                            $mail_status = sendCOTP($O_Email,$otp);
                            $_SESSION['ownerOTP'] = $otp;
                            //redirect link after succesfully login of customer
                            header('Refresh: 0; url=OTPO.php');
                        
                    }
            
            
            }
            else{
               
//                    $otp = rand(100000,999999);
//                    // Send OTP
//                    require_once("./mail_function.php");
//                    $mail_status = sendCOTP($O_Email,$otp);
//                    $_SESSION['ownerOTP'] = $otp;
//                    //redirect link after succesfully login of customer
//                    header('Refresh: 0; url=OTPO.php');
                
                    echo $con->error;
                
            }
        }
     ?>

