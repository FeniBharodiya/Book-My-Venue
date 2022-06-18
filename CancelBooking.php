<?php
//Session Started
session_start();
//database included
include './DBC.php';
//Customer id from session
$cid = $_SESSION['CID'];

if (isset($_POST['cancel'])) {

    $bookingid = $_POST['bookingid'];
    $venueid = $_POST['Venueid'];
    
    $getdate = mysqli_query($con, "Select * FROM venuebooking where Booking_ID = $bookingid");

    $data = mysqli_fetch_assoc($getdate);

    $now = time(); // or your date as well
    $your_date = strtotime($data['Check_in_date']);
    $datediff = $now - $your_date;    

    $totalAmt = $data['Total_Amount'];
    $refundAmt = 0; 
    $dateDifferent = abs(round($datediff / 86400));

    
    if($dateDifferent >= 30){
        $refundAmt =  number_format($totalAmt * 90 / 100,2);
    }elseif($dateDifferent >= 15 && $dateDifferent < 30){
        $refundAmt =  number_format($totalAmt * 50 / 100,2);
    }elseif($dateDifferent >= 7 && $dateDifferent < 15){
        $refundAmt =  number_format($totalAmt * 15 / 100,2);
    }else{
        $refundAmt =  0;
    }

    $delete =  mysqli_query($con,"DELETE FROM `venuebooking` WHERE `Booking_ID` = $bookingid");

    if($delete){
        
        $msg = "Your Booking Cancel. Your Refund Amount is ".$refundAmt." And it will be refunded within 7 days";
        echo '<script>alert("'.$msg.'");'
                            . 'window.location.href = "Bookings.php";'
                            . '</script>';
        ;
    }else{
        $msg = "Something Went To Wrong";
        echo '<script>alert("'.$msg.'");'
        . 'window.location.href = "Bookings.php";'
        . '</script>';
    }

    
}
