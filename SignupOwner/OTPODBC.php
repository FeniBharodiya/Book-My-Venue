<?php
//database connection
include '../DBC.php';
            //Session Started
            session_start();
            //getting otp on click of button and verifying it
            if(isset($_POST['enterOtp']))
            {
                $Type = $_SESSION['Type'];
                $Name = $_SESSION['Name'];
                $PhoneNumber = $_SESSION['PhoneNumber'];
                $Email = $_SESSION['Email'];
                $Password = $_SESSION['Password'];
                $Registration_Date = date('Y-m-d');
                
                $enteredotp = $_POST['OEnterdOTP'];
                if($enteredotp == $_SESSION['ownerOTP'])
                {
                    $add_rec="INSERT INTO owner(O_Name,O_PhoneNumber,O_Email,O_Password,O_Type,O_Registration_Date)VALUES('$Name','$PhoneNumber','$Email','$Password','$Type','$Registration_Date')";

                    $qryReturn = $con->query($add_rec);
                    if($qryReturn == TRUE)
                    {
                    
                    echo '<script>alert("Registration successful");'
                            . 'window.location.href = "../Signin/Signin.php";'
                            . '</script>';
                    //header('Refresh: 0; url=../Signin/Signin.php');\
                    }
                    else
                    {
                        echo $con->error;
                    }
                }
                else
                {
                    echo 'invalid otp';
                    echo $con->error;
                }
            }
?>
