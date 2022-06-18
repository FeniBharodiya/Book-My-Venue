<?php 
//Session started
session_start();
//database included
include './DBC.php';
//checking wether owner is logged in or not
if (!isset($_SESSION['CName'])) {
    header('location:Signin/Signin.php');
}
//getting the venue id
if(!isset($_GET['id']))
{
    header('location:venues.php');
}
                $venueid = $_GET['id'];
                $Customerid = $_SESSION['CID'];
                //query to delete venue detail 
                $del_recI = "DELETE FROM wishlist WHERE Venue_ID = '$venueid' && C_ID='$Customerid'";
                
                $qryReturn1 = $con -> query($del_recI);
                if($qryReturn1 == true)
                {
                    //redirect to page
                    header('Refresh: 0; url=Wishlist.php');
                }
                else{
                    echo $con->error;
                }
?>
