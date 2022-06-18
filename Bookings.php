<?php
session_start();
//database included
include './DBC.php';
//error reporting off
error_reporting(E_ERROR | E_PARSE);
//Customer id from session
$C_id = $_SESSION['CID'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>


        <title>Bookings</title>
        <!-- ***** Bootstrap and CSS Start ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/style_2.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                            <h2>Your <em>Bookings</em></h2>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Main Block End ***** -->

        <!-- ***** Booked venue section Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <br>
                        <br>
                        <div class="row" style="display: inline-flex;">
                            <?php
                            //query to get all venue whose customer id is as above
                            $prj = "SELECT * FROM venuebooking WHERE Check_out_date >= date(now()) AND C_ID = $C_id";
                            $stmt = $con->query($prj);
                            if ($stmt) {
                                while ($row = $stmt->fetch_assoc()) {
                                    $Idrecord[] = $row['Venue_ID'];
                                    $bookingID = $row['Booking_ID'];
                                }
                            }
                            foreach ($Idrecord as $rec) {
                                ?>
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
                                            <form action="CancelBooking.php" method="POST">
                                                <ul class="main-button">
                                                    <input type="hidden" name="bookingid" value="<?php echo $bookingID; ?>" />
                                                    <input type="hidden" name="Venueid" value="<?php echo $idvenue; ?>" />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="submit" name="cancel" >Cancel Booking</button>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ***** Booked venue section End ***** -->

        <!-- ***** Main Block2 ***** -->
        <section class="section section-bg" id="call-to-action" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="cta-content">
                            <br>
                            <br>
                            <h2>Former <em> Bookings</em></h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Main Block End ***** -->

        <!-- ***** Booked venue section Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <br>
                        <br>
                        <div class="row" style="display: inline-flex;">
                            <?php
                            $Date = date('Y-m-d');
                            //query to get all venue whose customer id is as above
                            $prj1 = "SELECT * FROM venuebooking WHERE Check_out_date <= date(now()) AND C_ID= $C_id";
                            $stmt1 = $con->query($prj1);
                            if ($stmt1) {
                                while ($row1 = $stmt1->fetch_assoc()) {
                                    $Idrecord1[] = $row1['Venue_ID'];
                                    $bookingID1 = $row1['Booking_ID'];
                                }
                            }
                            foreach ($Idrecord1 as $rec1) {
                                ?>
                                <div class="col-md-4">
                                    <div class="trainer-item">
                                        <div class="image-thumb1">
                                            <?php
                                            $idvenue1 = $rec1;
                                            $srcimg1 = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue1");
                                            while ($row1 = $srcimg1->fetch_assoc()) {
                                                $id1 = $row1['Venue_Image'];
                                                echo "<img src=\"Venue_Images/" . "$id1\" >";
                                            }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <h4>
                                                <?php
                                                $idvenue1 = $rec1;
                                                $srcprice1 = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue1");
                                                while ($row1 = $srcprice1->fetch_assoc()) {
                                                    $id1 = $row1['Venue_Name'];
                                                    echo $id1;
                                                }
                                                ?></h4>

                                            <h7>Price Per Day ₹<?php
                                                $idvenue1 = $rec1;
                                                $srcprice1 = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue1");
                                                while ($row1 = $srcprice1->fetch_assoc()) {
                                                    $id1 = $row1['Price_PerDay'];
                                                    echo $id1;
                                                }
                                                ?>
                                            </h7>
                                            <br>

                                            <h7><i class="fas fa-location-arrow">&nbsp;&nbsp; </i><?php
                                                $idvenue1 = $rec1;
                                                $srcprice1 = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue1");
                                                while ($row1 = $srcprice1->fetch_assoc()) {
                                                    $id1 = $row1['Venue_Address'];
                                                    echo $id1;
                                                }
                                                ?>
                                            </h7>
                                            <br>
                                            <h7><i class="fa fa-group"></i>&nbsp;&nbsp;<?php
                                                $idvenue1 = $rec1;
                                                $srcprice1 = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue1");
                                                while ($row1 = $srcprice1->fetch_assoc()) {
                                                    $id1 = $row1['Capacity'];
                                                    echo $id1;
                                                }
                                                ?>
                                            </h7>
                                            <form action="CancelBooking.php" method="POST">
                                                <ul class="main-button">
                                                    <input type="hidden" name="bookingid" value="<?php echo $bookingID1; ?>" />
                                                    <input type="hidden" name="Venueid" value="<?php echo $idvenue1; ?>" />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" name="add_review" class="add_review">Give Feedback</button>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ***** Booked venue section End ***** -->
        <div id="review_modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Submit Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="frm_feedback" method="POST" action="Feedback/submit_rating.php">
        <!--                <input type="hidden" name="C_ID" id="C_ID" value="<?php session_start();
                            echo $_SESSION['CID']; ?>"/>-->
                        <div class="modal-body">
                            <h4 class="text-center mt-2 mb-4">
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1" onclick="rating_click(1);"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2" onclick="rating_click(2);"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3" onclick="rating_click(3);"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4" onclick="rating_click(4);"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5" onclick="rating_click(5);"></i>
                                <input type="hidden" name="Rating" id="Rating" value="0">
                            </h4>

                            <div class="form-group">
                                <textarea name="Comment" id="Comment" class="form-control" placeholder="Type Review Here"></textarea>
                            </div>
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function rating_click(rating)
            {
                //alert(rating);
                $("#Rating").val(rating);
            }
            $(document).ready(function () {
                var rating_data = 0;

                $('.add_review').click(function () {

                    $('#review_modal').modal('show');

                });

                $(document).on('mouseenter', '.submit_star', function () {

                    var rating = $(this).data('rating');

                    reset_background();

                    for (var count = 1; count <= rating; count++)
                    {

                        $('#submit_star_' + count).addClass('text-warning');

                    }

                });

                function reset_background()
                {
                    for (var count = 1; count <= 5; count++)
                    {

                        $('#submit_star_' + count).addClass('star-light');

                        $('#submit_star_' + count).removeClass('text-warning');

                    }
                }

                $(document).on('mouseleave', '.submit_star', function () {

                    reset_background();

                    for (var count = 1; count <= rating_data; count++)
                    {

                        $('#submit_star_' + count).removeClass('star-light');

                        $('#submit_star_' + count).addClass('text-warning');
                    }

                });

                $(document).on('click', '.submit_star', function () {

                    rating_data = $(this).data('rating');

                });

                $('#save_review').click(function () {



                    var user_review = $('#user_review').val();

                    if (user_name === '' || user_review === '')
                    {
                        alert("Please Fill Both Field");
                        return false;
                    } else
                    {
                        $.ajax({
                            url: "Feedback/submit_rating.php",
                            method: "POST",
                            data: {rating_data: rating_data, user_name: user_name, user_review: user_review},
                            success: function (data)
                            {
                                $('#review_modal').modal('hide');

                                load_rating_data();

                                alert(data);
                            }
                        });
                    }

                });
                load_rating_data();

                function load_rating_data()
                {
                    $.ajax({
                        url: "submit_rating.php",
                        method: "POST",
                        data: {action: 'load_data'},
                        dataType: "JSON",
                        success: function (data)
                        {
                            $('#average_rating').text(data.average_rating);
                            $('#total_review').text(data.total_review);

                            var count_star = 0;

                            $('.main_star').each(function () {
                                count_star++;
                                if (Math.ceil(data.average_rating) >= count_star)
                                {
                                    $(this).addClass('text-warning');
                                    $(this).addClass('star-light');
                                }
                            });

                            $('#total_five_star_review').text(data.five_star_review);

                            $('#total_four_star_review').text(data.four_star_review);

                            $('#total_three_star_review').text(data.three_star_review);

                            $('#total_two_star_review').text(data.two_star_review);

                            $('#total_one_star_review').text(data.one_star_review);

                            $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                            $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                            $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                            $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                            $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                            if (data.review_data.length > 0)
                            {
                                var html = '';

                                for (var count = 0; count < data.review_data.length; count++)
                                {
                                    html += '<div class="row mb-3">';

                                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                                    html += '<div class="col-sm-11">';

                                    html += '<div class="card">';

                                    html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                                    html += '<div class="card-body">';

                                    for (var star = 1; star <= 5; star++)
                                    {
                                        var class_name = '';

                                        if (data.review_data[count].rating >= star)
                                        {
                                            class_name = 'text-warning';
                                        } else
                                        {
                                            class_name = 'star-light';
                                        }

                                        html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                    }

                                    html += '<br />';

                                    html += data.review_data[count].user_review;

                                    html += '</div>';

                                    html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                                    html += '</div>';

                                    html += '</div>';

                                    html += '</div>';
                                }

                                $('#review_content').html(html);
                            }
                        }
                    })
                }

            });
        </script>


        <!-- ***** Footer included ***** -->
        <?php include './Footer.php'; ?>



    </body>
</html>