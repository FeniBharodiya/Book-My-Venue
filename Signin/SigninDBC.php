<?php

            //Session Started
            session_start();
            //included Database file
            include '../DBC.php'; 
            
            if(isset($_POST['sgninBtn']))
            {
                // email and password sent from form 
                $Email = $_POST['sgninEmail'];
                $Password = md5($_POST['sgninPassword']);
               
                //for customer login query
                $sqlC = "SELECT * FROM customer WHERE C_Email = '$Email' and C_Password = '$Password'";
                $resultC = mysqli_query($con,$sqlC);
                $rowC = mysqli_fetch_array($resultC,MYSQLI_ASSOC);    
                $countC = mysqli_num_rows($resultC);
                
                //for owner login query
                $sqlO = "SELECT * FROM owner WHERE O_Email = '$Email' and O_Password = '$Password'";
                $resultO = mysqli_query($con,$sqlO);
                $rowO = mysqli_fetch_array($resultO,MYSQLI_ASSOC);    
                $countO = mysqli_num_rows($resultO);
                
                //for admin login query
                $sqlA = "SELECT * FROM admin WHERE A_Email = '$Email' and A_Password = '$Password'";
                $resultA = mysqli_query($con,$sqlA);
                $rowA = mysqli_fetch_array($resultA,MYSQLI_ASSOC);    
                $countA = mysqli_num_rows($resultA);
                
                if($countC == 1)
                {  
                    //Storing customers data in session
                    $_SESSION['CID'] = $rowC['C_ID'];
                    $_SESSION['CName'] = $rowC['C_Name'];
                    $_SESSION['CNumber'] = $rowC['C_PhoneNumber'];
                    $_SESSION['CEmail'] = $rowC['C_Email'];
                    $_SESSION['CGender'] = $rowC['C_Gender'];

                    //redirect link after succesfully login of customer
                    header('Refresh: 0; url=../index.php');  
                }
                
                elseif($countO == 1)
                {  
                    
                    //Storing Owners Data in session
                    $_SESSION['OID'] = $rowO['O_ID'];
                    $_SESSION['OName'] = $rowO['O_Name'];
                    $_SESSION['ONumber'] = $rowO['O_PhoneNumber'];
                    $_SESSION['OEmail'] = $rowO['O_Email'];
                    //redirect link after succesfully login of owner
                    header('Refresh: 0; url=../Owner/OwnerProfile.php');
                 }  
                 elseif($countA == 1)
                 {
                     //Storing data in session
                     $_SESSION['odmsaid'] = $rowA['A_ID'];
                    $_SESSION['AName'] = $rowA['A_Name'];
                    $_SESSION['ANumber'] = $rowA['A_PhoneNumber'];
                    $_SESSION['AEmail'] = $rowA['A_Email'];
                    //redirect link after succesfully login of customer
                    header('Refresh: 0; url=../Admin/dashboard.php'); 
                    
                 }
                 else
                 {
                     //If Email Password is invalid the it will alert the user
                    echo '<script>alert("Invalid Email Or Password");'
                    . 'window.location.href = "Signin.php";'
                            . '</script>';
                 }
            }
?>
