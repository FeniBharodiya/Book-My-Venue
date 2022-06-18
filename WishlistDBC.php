<?php 
//session start
session_start();
//database connection included
include './DBC.php';
//checking customer is sign ined or not
if (!isset($_SESSION['CName'])) {
    header('location:Signin/Signin.php');
}
//checking id is there in the page or not
if(!isset($_GET['id']))
{
    header('location:venues.php');
}

                $venueid = $_GET['id'];
                $Customerid = $_SESSION['CID'];
                
                //query to check wether the venue is there in wish already or not
                $check = "SELECT * FROM wishlist WHERE Venue_ID= $venueid && C_ID = $Customerid";
                $res_check = mysqli_query($con, $check);
                
                if (mysqli_num_rows($res_check) > 0)
                {
                    //if there then alert
                    echo '<script>alert("Already added to wishlist");'
                    . 'window.location.href = "Venues.php";'
                            . '</script>';
                   
                }
                else{
                    //query to add venue in wishlist
                    $add_recI = "INSERT INTO wishlist (Venue_ID,C_ID)VALUES($venueid,$Customerid)";
                
                $qryReturn1 = $con -> query($add_recI);
                if($qryReturn1 == true)
                {
                    header('Refresh: 0; url=Wishlist.php');
                }
                else{
                    echo $con->error;
                }
                }
                
?>