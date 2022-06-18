<?php

//Session start
session_start();
//Setting time zone
date_default_timezone_set('Asia/Kolkata');
//including database
include './DBC.php';

if (isset($_POST['book'])) {
    //storing data in variable

    $Checkin = $_POST['CheckIn'];
    $Checkout = $_POST['CheckOut'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];
    $DateTime = date('Y-m-d h:i:s');
    $C_ID = $_SESSION['CID'];
    $C_Name = $_SESSION['CName'];
    $idvenue = $_POST['id'];
    $TotalAmount = $_POST['price'];
//    if ($Checkin == $Checkout) {
//        
//        $check = "SELECT * from venuebooking WHERE (Start_Time >= $StartTime OR End_Time <= $EndTime) AND Venue_ID = '$idvenue'";
//        $res_check = mysqli_query($con,$check);
//        if(!$res_check ||mysqli_num_rows($res_check) > 0)
//        {
//            $Reminder = "INSERT INTO Reminder (Check_in_date, Venue_ID,Customer_ID) VALUES ($Checkin,$idvenue,$C_ID)";
//            $QryReminder = $con -> query($Reminder);
//            //If result foung in database then redirect to venue-Detail page
//            echo '<script>alert("Venue is Not Available");'
//                            . 'window.location.href = "Venue-Detail.php";'
//                            . '</script>';
//        }else{
//                //query to add details of booking in database                
//                $add_Booking = "INSERT INTO venuebooking (Check_in_date,Check_out_date,Start_Time,End_Time,Total_Amount,Booking_DateTime,Venue_ID,C_ID)VALUES('$Checkin','$Checkout','$StartTime','$EndTime','$TotalAmount','$DateTime','$idvenue','$C_ID')";
//                            
//                $qryReturn1 = $con -> query($add_Booking);
//                if($qryReturn1 == true)
//                {
//                    //succes
//                    echo '<script>alert("Venue is Booked");'
//                            . 'window.location.href = "Bookings.php";'
//                            . '</script>';
//                    
//                }
//                else{
//                    //print errors
//                    echo $con->error;
//            }
//        }
//        
//        
//    } else {
    $check = "SELECT * from venuebooking WHERE Venue_ID = $idvenue AND (Check_in_date >= '$Checkin' AND Check_out_date <= '$Checkout')";
    $res_check = mysqli_query($con, $check);
    $numofrow = mysqli_num_rows($res_check);
    echo $numofrow;
    
    if ($numofrow > 0) {

        $CheckReminder = "SELECT * from Reminder WHERE (Check_in_date >= '$Checkin' OR Check_out_date <= '$Checkout') AND Venue_ID='$idvenue' AND Customer_ID='$C_ID'";
        $res_Rcheck = mysqli_query($con, $CheckReminder);
        $row = mysqli_num_rows($res_Rcheck);
        if ($row > 0) {
            echo '<script>alert("Venue is Not Available");'
            . 'window.location.href = "Venue-Detail.php";'
            . '</script>';
        } else {
            $Reminder = "INSERT INTO Reminder (Check_in_date,Check_out_date, Venue_ID,Customer_ID) VALUES ('$Checkin','$Checkout','$idvenue','$C_ID')";
            $QryReminder = $con->query($Reminder);

            echo '<script>alert("Venue is Not Available");'
            . 'window.location.href = "Venue-Detail.php";'
            . '</script>';
        }
    } else {
        //query to add details of booking in database                
        $add_Booking = "INSERT INTO venuebooking (Check_in_date,Check_out_date,Total_Amount,Booking_DateTime,Venue_ID,C_ID)VALUES('$Checkin','$Checkout','$TotalAmount','$DateTime','$idvenue','$C_ID')";

        $qryReturn1 = $con->query($add_Booking);
        if ($qryReturn1 == true) {
            //succes
            echo '<script>alert("Venue is Booked");'
            . 'window.location.href = "Bookings.php";'
            . '</script>';
        } else {
            //print errors
            echo $con->error;
        }
    }
}
//}
?>