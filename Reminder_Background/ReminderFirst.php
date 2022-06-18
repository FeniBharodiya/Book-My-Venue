
<?php

//Session Started
//session_start();
//database included
include '../DBC.php';
//Customer id from session


$result = mysqli_query($con,"select count(1) FROM reminder");
$row = mysqli_fetch_array($result);

$total = $row[0];

$result1 = mysqli_query($con,"select count(1) FROM reminder");
$rowc = mysqli_fetch_array($result1);

$totalC = $rowc[0];


for($i=1; $i<=$total; $i++)
{
    $id = $i;
    $sql = mysqli_query($con, "SELECT * FROM reminder where R_ID= $id"); 
    while ($row1 = $sql->fetch_assoc()) {
        $Remcheckin = $row1['Check_in_date'];
        $Remcheckout = $row1['Check_out_date'];
        $Remvid = $row1['Venue_ID'];
        $Remcid = $row1['Customer_ID'];
    
        for($j=1;$j<=$totalC;$j++)
        {
            $idb = $j;
            $sqlVenueB = mysqli_query($con, "SELECT * FROM venuebooking where Booking_ID= $idb"); 
            while ($rowb = $sqlVenueB->fetch_assoc()) {
               $vbCheckin = $rowb['Check_in_date'];
               $vbCheckout = $rowb['Check_out_date'];
               $vbvid = $rowb['Venue_ID'];
               $vbcid = $rowb['C_ID'];
               
               if($Remcheckin == $vbCheckin && $Remcheckout == $vbCheckout && $Remvid == $vbvid && $Remcid== $vbcid)
               {
                   break;
               }
               else{
                   $Customerdata = mysqli_query($con, "SELECT * FROM customer where C_ID= $Remcid"); 
                    while ($rowdata = $Customerdata ->fetch_assoc()) {
                        $cemail = $rowdata['C_Email'];
                        
                        require_once("./mail_function.php");
                        $mail_Reminder = sendCOTP($cemail,$Remvid);
                    }
                }
            }
        }
    }
}

?>

