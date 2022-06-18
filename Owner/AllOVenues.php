<?php
session_start();
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

        <title>All Venue Booking</title>
        <!-- ***** Bootstrap and css Starts ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="../assets/css/style.css">
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
                                    echo "<li><a href='Logout.php'>Logout</a></li>";
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
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">



                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">

                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination" style="margin-top: 100px">
                                <thead>
                                    <tr>
                                        
                                        <th>Booking ID</th>
                                        <th>Customer Name</th>
                                        <th class="d-none d-sm-table-cell">Check_in_date</th>
                                        <th class="d-none d-sm-table-cell">Check_out_date</th>
                                        <th class="d-none d-sm-table-cell">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../DBC.php"; // Using database connection file here

                                    $records = mysqli_query($con, "select * from venuebooking"); // fetch data from database

                                    while ($row = mysqli_fetch_array($records)) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['Booking_ID'] ?></td>
                                            <td class="font-w600"><?php
                                                    include "../DBC.php";
                                            $cid = $row['C_ID']; 
                                                   $getName = mysqli_query($con, "select * from customer where C_ID= $cid");
                                                   $get = mysqli_fetch_assoc($getName);
                                                   echo $get['C_Name'];
                                                   
                                                    
                                                    ?></td>
                                            <td class="font-w600"><?php echo $row['Check_in_date'] ?></td>
                                            <td class="font-w600"><?php echo $row['Check_out_date'] ?></td>
                                            <td class="font-w600"><?php echo $row['Total_Amount'] ?></td>
<!--                                            <td class="font-w600"><a href="edit.php?id=<?php echo $row['Booking_ID']; ?>">View</a></td>
                                            <td class="font-w600"><a href="edit.php?id=<?php echo $row['Booking_ID']; ?>">Edit</a></td>-->
                                        </tr>
                                        <?php
                                    }
                                        ?> 



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Dynamic Table Full Pagination -->

                        <!-- END Dynamic Table Simple -->
                    </div>
                    <!-- END Page Content -->
                </main>
            </section>

            <!-- ***** Footer included ***** -->
    <?php include '../Footer.php'; ?>
    </body>

</html>
