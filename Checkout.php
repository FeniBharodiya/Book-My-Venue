<?php
session_start();
//database included
include './DBC.php';
//error reporting off
error_reporting(E_ERROR | E_PARSE);
//if(isset($_POST['book'])){
//  $idVenue = $_POST['id'];
//}
//if($idVenue == null){
//     header('location:venues.php');
//}
$idVenue = $_GET['idVenue'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>


        <title>Check Out</title>
        <!-- ***** Bootstrap and CSS Start ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/style_Checkout.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- ***** Bootstrap and CSS end ***** -->
    </head>

    <body>    
        <!-- ***** Header included ***** -->
<?php include './Header.php'; ?>

        <!-- ***** Main Block ***** -->
        <section class="section section-bg" id="call-to-action" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="cta-content">
                            <br>
                            <br>
                            <h2>Check Out</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Main Block End ***** -->

        <!-- ***** Booked venue section Starts ***** -->
        <table>
            <tr>
                <td>
                    <section class="section" id="trainers">
                        <div class="container">
                            <div class="row">

                                        <div class="col-md-5">
                                            <div class="trainer-item">
                                                <div class="image-thumb1">
                                                    <?php
                                                    $idvenue = $idVenue;
                                                    $srcimg = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue");
                                                    while ($row = $srcimg->fetch_assoc()) {
                                                        $id = $row['Venue_Image'];
                                                        echo "<img src=\"Venue_Images/" . "$id\" >";
                                                    }
                                                    ?>
                                                </div>
                                               
                                            </div>
                                        </div>
                                <div class="col-md-5">
                                     <div class="down-content">
                                                    <h4>
                                                        <?php
                                                        $idvenue = $_GET['idVenue'];
                                                        $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idVenue");
                                                        while ($row = $srcprice->fetch_assoc()) {
                                                            $id = $row['Venue_Name'];
                                                            echo $id;
                                                        }
                                                        ?></h4>

                                                    <h7>Price Per Day ₹<?php
                                                        $idvenue = $_GET['idVenue'];
                                                        $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idVenue");
                                                        while ($row = $srcprice->fetch_assoc()) {
                                                            $id = $row['Price_PerDay'];
                                                            echo $id;
                                                        }
                                                        ?>
                                                    </h7>
                                                    <br>

                                                    <h7><i class="fas fa-location-arrow">&nbsp;&nbsp; </i><?php
                                                        $idvenue = $_GET['idVenue'];
                                                        $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idVenue");
                                                        while ($row = $srcprice->fetch_assoc()) {
                                                            $id = $row['Venue_Address'];
                                                            echo $id;
                                                        }
                                                        ?>
                                                    </h7>
                                                    <br>
                                                    <h7><i class="fa fa-group"></i>&nbsp;&nbsp;<?php
                                                        $idvenue = $_GET['idVenue'];
                                                        $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idVenue");
                                                        while ($row = $srcprice->fetch_assoc()) {
                                                            $id = $row['Capacity'];
                                                            echo $id;
                                                        }
                                                        ?>
                                                    </h7>

                                                </div>
                                </div>
                            </div>
                        </div>
                    </section></td>
                <td>
                    <section class="section" id="trainers">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            $bookingID = $_GET['bookingId'];
                                             $check = "SELECT * from venuebooking WHERE  Booking_ID = '$bookingID'";
                                             $res_check = mysqli_query($con,$check);
                                             $res = mysqli_fetch_object($res_check);
                                            ?>
                                            
                                            
                                            Total Amount:- <?php echo $res->Total_Amount;?>
                                            <br>
                                            From date :- <?php echo $res->Check_in_date;?>
                                            <br>
                                            To date :- <?php echo $res->Check_out_date;?>
                                            <br>
                                            <button onclick="myFunction()" style="background-color: #ed563b">CheckOut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </td>
            </tr>
        </table>
        <!-- ***** Booked venue section End ***** -->


        <!-- ***** Footer included ***** -->
<?php include './Footer.php'; ?>


<script>
function myFunction() {
  alert("Venues Booked");
}
</script>
    </body>
</html>