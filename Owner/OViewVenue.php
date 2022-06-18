<?php session_start();
//checking user is sign ined or not
if (!isset($_SESSION['OName'])) {
    header('location:../Signin/Signin.php');
}
//database included
include '../DBC.php';
//owner id in session
$ownerid = $_SESSION['OID'];
//query to get all the venues whose owner id is as above
$prj = "SELECT * FROM venue WHERE O_ID= $ownerid";
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
    
    <title>View Venue</title>
 <!-- ***** Bootstrap and css Starts ***** -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <!-- ***** Bootstrap and css start ***** -->
</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-13">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="OwnerProfile.php" class="logo">Venue<em>azy</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->

                        <ul class="nav">
                            <li><a href="AddVenue.php">Add Venue</a></li>
                            <li><a href="OViewVenue.php">View Venues</a></li>
                            <li><a href="AllOVenues.php">All Bookings</a></li>
                            <?php
                            if (isset($_SESSION['OName'])) {
                                echo "<li><a href='../Logout.php'>Logout</a></li>";
                            }

                            ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <section class="section pt-5" id="trainers" style="background-image: url(assets/images/BG-C.jpg)">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="container pt-5">
                    <div class="row" style="display: inline-flex;">
                        <?php
                        foreach ($Idrecord as $rec) { ?>
                            <div class="col-md-4">
                                <div class="trainer-item">
                                     <div class="image-thumb1">
                                        <?php
                                        $idvenue = $rec;
                                        $srcimg = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue");
                                        while ($row = $srcimg->fetch_assoc()) {
                                            $id = $row['Venue_Image'];
                                            echo "<img src=\"../Venue_Images/" . "$id\" >";
                                        }
                                        ?>
                                    </div>
                                    <div class="down-content">
                                        <br>
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
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <li><a href="">- Edit Details</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php }  ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

     <!-- ***** Footer included ***** -->
    <?php include '../Footer.php'; ?>
</body>

</html>
