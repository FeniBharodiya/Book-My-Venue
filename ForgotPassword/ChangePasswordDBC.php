<?php
session_start();
include '../DBC.php';
if(isset($_POST['Change']))
{
    $REmail = $_SESSION['REmail'];
    $Password = md5($_POST['Password']);
    $CPassword = md5($_POST['CPassword']);

    if($Password == $CPassword)
    {
        $sqlC = "SELECT * FROM customer WHERE C_Email = '$REmail'";
        $resultC = mysqli_query($con, $sqlC);
        $rowC = mysqli_fetch_array($resultC, MYSQLI_ASSOC);
        $countC = mysqli_num_rows($resultC);

        //for owner login query
        $sqlO = "SELECT * FROM owner WHERE O_Email = '$REmail' ";
        $resultO = mysqli_query($con, $sqlO);
        $rowO = mysqli_fetch_array($resultO, MYSQLI_ASSOC);
        $countO = mysqli_num_rows($resultO);
        if ($countC == 1) {
                
                $updt_pswd = "UPDATE customer SET C_Password = '$Password' WHERE C_Email = '$REmail' ";
                $qryReturn = $con->query($updt_pswd);
                if ($qryReturn == TRUE) {

                    echo '<script>alert("Password Updated Successful");'
                    . 'window.location.href = "../Signin/Signin.php";'
                    . '</script>';
//                        header('Refresh: 0; url=../Signin/Signin.php');
                } else {
                    echo $con->error;
                }
        } elseif ($countO == 1) {
                $updt_pswd = "UPDATE owner SET O_Password = '$Password' WHERE C_Email = '$REmail' ";
                $qryReturn = $con->query($updt_pswd);
                if ($qryReturn == TRUE) {

                    echo '<script>alert("Password Updated Successful");'
                    . 'window.location.href = "../Signin/Signin.php";'
                    . '</script>';
            
                } else {
                    echo $con->error;
                }
        }
        
    }
    else {
        echo '<script>alert("Password Is Not Same");'
                    . 'window.location.href = "ChangePassword.php";'
                    . '</script>';
    }
}

?>