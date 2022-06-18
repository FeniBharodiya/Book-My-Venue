<?php

include '../DBC.php';

$result = mysqli_query($con,"select count(1) FROM venuebooking");
$row = mysqli_fetch_array($result);

$total = $row[0];
echo $total;
for($i=1;$i<=$total;$i++)
{
    $id = $i;
    $CurrentDate = date('Y-m-d');
    $sql = mysqli_query($con, "SELECT * FROM venuebooking where Check_out_date < date(now())"); 
    while ($row1 = $sql->fetch_assoc()) {
        $bid = $row1['Booking_ID'];
        $checkin = $row1['Check_in_date'];
        $checkout = $row1['Check_out_date'];
        $totalamount = $row1['Total_Amount'];
        $BookingDT = $row1['Booking_DateTime'];
        $venueid = $row1['Venue_ID'];
        $cid = $row1['C_ID'];
    }
}
?>