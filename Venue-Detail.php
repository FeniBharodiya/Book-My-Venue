<?php
session_start();
//Database included
include './DBC.php';

//checking customer has loggedin or not
if (!isset($_SESSION['CName'])) {
    header('location:Signin/Signin.php');
}
//Checking variable recieved from previous page or not
if (!isset($_GET['link'])) {
    header('location:venues.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Venue Detail</title>
        <!-- ***** CSS links Start ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/style.css">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- ***** CSS links end ***** -->
        <!-- ***** CSS links for date-picker ***** -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
    </head>

    <body>

        <!-- ***** Header included ***** -->
        <?php include './Header.php'; ?>

        <!-- ***** Image venue ***** -->
        <section class="section bg-img" id="call-to-action" style="background-image: url(<?php
        $idvenue = $_GET['link'];
        $srcimg = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue");
        while ($row = $srcimg->fetch_assoc()) {
            $id = $row['Venue_Image'];
            echo "Venue_Images/" . "$id\" ";
        }
        ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cta-content">

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** image venue End ***** -->

        <!-- ***** Details start ***** -->

        <section class="section" id="our-classes">
            <div class="container">
                <br>
                <br>
                <br>
                <div class="row" id="tabs">
                    <div class="col-lg-4">
                        <ul>
                            <li><a href='#tabs-1'><i class="fa fa-gift"></i> Package Description</a></li>
                            <li><a href='#tabs-2'><i class="fa fa-plus-circle"></i> Availability &amp; Prices</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <h4>Package Description</h4>
                                <p><?php
                                    $idvenue = $_GET['link'];
                                    //Venue Description
                                    $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                    while ($row = $srcprice->fetch_assoc()) {
                                        $Venue_Desc = $row['Venue_Description'];
                                        echo "<p>$Venue_Desc</p>";
                                    }
                                    ?></p>
                            </article>
                            <article id='tabs-2'>
                                <h4>Availability &amp; Prices</h4>
                                <span>
                                    Price Per Day - ₹ <?php
                                    $idvenue = $_GET['link'];
                                    //query to get price
                                    $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                    while ($row = $srcprice->fetch_assoc()) {
                                        $Price = $row['Price_PerDay'];
                                        echo $Price;
                                    }
                                    ?>
                                </span>
                                <br>
                                <br>

                                <form action="Venue-DetailDBC_1.php" method="post">
                                    <table>
                                        <tr>
        <!--                                    <td>Check-in<input type="text" id="demo-3_1" name="CheckIn" class="form-control form-control-sm" autocomplete="off"/></td>
                                            <td>Check-out<input type="text" id="demo-3_2" name="CheckOut" class="form-control form-control-sm" onchange="myfun()" autocomplete="off"/></td>-->
                                            <td>Check-in<br><input type="text" id="checkin" name="CheckIn" autocomplete="off" required/></td>
                                            <td>Check-out<br><input type="text" id="checkout" name="CheckOut" onchange="myfun()" autocomplete="off" required/></td>
                                        </tr>                                
                                    </table>

                                    <input type="hidden" name="id" value="<?php echo $idvenue; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $Price; ?>" />

                                    <div id="timeslots">
                                        <br>
                                        Start Time<input type="time" id="startTime" name="StartTime" step="3600">
                                        &nbsp;&nbsp;End Time<input type="time" id="endTime" name="EndTime" step="3600">
                                        <p style="color : red">Time is in 24* HR format</p>
                                    </div>

                                    <div class="main-button">
                                        <br>
                                        <button type="submit" name="book" >Check Out</button>

                                    </div>
                                </form>

                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Details end's ***** -->

        <?php include './Footer.php'; ?>

        <!-- ***** Script for date range selector ***** -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- ** Script for date validation ** -->
        <!-- ** Script links for style of datepicker ** -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- ** Script links for style of datepicker ** -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
                                                $(document).ready(function () {
                                                    var minDate = new Date();
                                                    $("#checkin").datepicker({
                                                        showAnim: 'drop',
                                                        numberOfMonth: 1,
                                                        minDate: 1,
                                                        dateFormat: 'yy-mm-dd',
                                                        onClose: function (selectedDate) {
                                                            $("#checkout").datepicker("option", "minDate", selectedDate);
                                                        }
                                                    });

                                                    $("#checkout").datepicker({
                                                        showAnim: 'drop',
                                                        numberOfMonth: 1,
                                                        maxDate: '+152d',
                                                        dateFormat: 'yy-mm-dd',
                                                        onClose: function (selectedDate) {
                                                            $("#checkin").datepicker("option", "maxDate", selectedDate);
                                                        }
                                                    });

                                                });


        </script>

        <script>
            document.getElementById('timeslots').style.display = 'none';

            function myfun() {
                var str1 = $("#checkin").val();
                var str2 = $("#checkout").val();

                if (str1 == str2) {
                    document.getElementById('timeslots').style.display = 'block';
                } else
                {
                    document.getElementById('timeslots').style.display = 'none';
                }


            }
        </script>


    </body>
</html>