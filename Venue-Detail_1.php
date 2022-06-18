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

                                <form action="Checkout.php" method="post">
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

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5 mb-5">FEEDBACK</h1>
            <div class="card">
                <div class="card-header">Venue Rating's</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> Review</h3>
                        </div>
                        <div class="col-sm-4">
                            <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                            </p>
                            <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                            </p>
                            <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                            </p>
                            <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                            </p>
                        </div>
                        <!--                        <div class="col-sm-4 text-center">
                                                    <h3 class="mt-4 mb-3">Write Review Here</h3>
                                                    <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                                                </div>-->
                    </div>
                </div>
            </div>
            <div class="mt-5" id="review_content"></div>
        </div>
    </body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>

<style>  
    .progress-label-left
    {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }
    .progress-label-right
    {
        float: right;
        margin-left: 0.3em;
        Lien-height: 1em;
    }
    .star-light
    {
        color:#e9ecef
    }
</style>
<script>
            $(document).ready(function () {
                var rating_data = 0;

                $('#add_review').click(function () {

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

                    var user_name = $('#user_name').val();

                    var user_review = $('#user_review').val();

                    if (user_name === '' || user_review === '')
                    {
                        alert("Please Fill Both Field");
                        return false;
                    } else
                    {
                        $.ajax({
                            url: "submit_rating.php",
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

            });
</script>


<?php include './Footer.php'; ?>