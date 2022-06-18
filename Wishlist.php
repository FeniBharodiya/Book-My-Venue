<?php
//session started
session_start();
//disable all warnigns
error_reporting(E_ERROR | E_PARSE);
//database included
include './DBC.php';
//customer id from session
$CustID = $_SESSION['CID'];
//query to get all venue id from wishlist table
$prj = "SELECT * FROM wishlist WHERE C_ID = $CustID";
$stmt = $con->query($prj);
if ($stmt) {
    while ($row = $stmt->fetch_assoc()) {
        $Idrecord[] = $row['Venue_ID'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Wishlist</title>
        <!-- ***** Bootsrtap and css style links start ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/style_2.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- ***** Bootsrtap and css style links ends ***** -->
    </head>

    <body>    
        <!-- ***** Header included ***** -->
        <?php include './Header.php'; ?>

        <!-- ***** Below Header Start ***** -->
        <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cta-content">
                            <br>
                            <br>
                            <h2>Your <em>Wishlist</em></h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Below Header End ***** -->

        <!-- ***** Section for wishlisted venues Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <br>
                        <br>
                        <div class="row" style="display: inline-flex;">
                            <?php foreach ($Idrecord as $rec) { ?>
                                <div class="col-md-4">
                                    <div class="trainer-item" style="width: 22rem">
                                        <div class="image-thumb1">
                                            <?php
                                            $idvenue = $rec;
                                            $srcimg = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue");
                                            while ($row = $srcimg->fetch_assoc()) {
                                                $id = $row['Venue_Image'];
                                                echo "<img src=\"Venue_Images/" . "$id\" >";
                                            }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <h4>
                                                <?php
                                                $idvenue = $rec;
                                                $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                                while ($row = $srcprice->fetch_assoc()) {
                                                    $id = $row['Venue_Name'];
                                                    echo $id;
                                                }
                                                ?></h4>

                                            <h7>Price Per Day ₹<?php
                                            $idvenue = $rec;
                                            $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                            while ($row = $srcprice->fetch_assoc()) {
                                                $id = $row['Price_PerDay'];
                                                echo $id;
                                            }
                                                ?>
                                            </h7>
                                            <br>

                                            <h7><i class="fas fa-location-arrow">&nbsp;&nbsp; </i><?php
                                            $idvenue = $rec;
                                            $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                            while ($row = $srcprice->fetch_assoc()) {
                                                $id = $row['Venue_Address'];
                                                echo $id;
                                            }
                                                ?>
                                            </h7>
                                            <br>
                                            <h7><i class="fa fa-group"></i>&nbsp;&nbsp;<?php
                                            $idvenue = $rec;
                                            $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                            while ($row = $srcprice->fetch_assoc()) {
                                                $id = $row['Capacity'];
                                                echo $id;
                                            }
                                                ?>
                                            </h7>

                                            <ul class="social-icons">
                                                <li><?php echo '<a href="Venue-Detail.php?link=' . $idvenue . ' "> + View Detial</a>'; ?></li>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <li><?php echo '<a href="RemoveWishlistDBC.php?id=' . $idvenue . '" name="WishList">- Remove</a>'; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ***** Section for wishlisted venues Ends ***** -->


        <!-- ***** Footer included ***** -->
        <?php include './Footer.php'; ?>


    </body>
</html>