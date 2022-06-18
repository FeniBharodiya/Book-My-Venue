<?php
//Session Started
session_start();
//database included
include './DBC.php';
//Query to get the 3 random venues from database
$prj = "SELECT * FROM venue ORDER BY RAND() LIMIT 3";
$stmt = $con->query($prj);
if ($stmt) {
    $srcprice = mysqli_query($con, "SELECT Venue_ID, COUNT(Venue_ID) AS `value_occurrence` FROM venuebooking GROUP BY Venue_ID ORDER BY `value_occurrence` DESC LIMIT 3;");
                                            while ($row = $srcprice->fetch_assoc()) {
                                                $Idrecord[] = $row['Venue_ID'];
                                            }
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>   
        <!-- ***** Page title ***** -->
        <title>Venueazy</title>
        <!-- ***** Bootstrap link ***** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- ***** Font style css ***** -->
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
        <!-- ***** Style css ***** -->
        <link rel="stylesheet" href="assets/css/style.css">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="VenuAzyBot/static/css/chat.css"></link>  
        <link rel="stylesheet" href="VenuAzyBot/static/css/home.css">
    </head>

    <body>

        <!-- ***** Header included ***** -->
        <?php include './Header.php'; ?>

        <!-- ***** Main Banner Area Start ***** -->

        <div class="main-banner" id="top">
            <img src="assets/images/BG-C.jpg" class="bg-img" />

            <div class="video-overlay header-text">
                <div class="caption">
                    <h6>Discover</h6>
                    <h2><em>Explore</em> best Venues Arround you !</h2>
                    <div class="main-button">
                        <a href="Venues.php">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** main block Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>Featured <em> Venues</em></h2>
                            <img src="assets/images/line-dec.png" alt="">
                            <p></p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="container">
                        <div class="row" style="display: inline-flex;">
                            <?php foreach ($Idrecord as $rec) { ?>
                                <div class="col-md-4">
                                    <div class="trainer-item">
                                        <div class="image-thumb1">
                                            <?php
                                            //variable to store the venue id 
                                            $idvenue = $rec;
                                            //query to search the image associated with venue id 
                                            
                                            $srcimg = mysqli_query($con, "Select * FROM venueimage where Venue_ID = $idvenue");
                                            while ($row = $srcimg->fetch_assoc()) {
                                                //fatching image name/path associated with the given id
                                                $id = $row['Venue_Image'];
                                                echo "<img src=\"Venue_Images/" . "$id\" >";
                                            }
                                            ?>
                                        </div>
                                        <div class="down-content">

                                            <h4>
                                                <?php
                                                //variable to store the venue id
                                                $idvenue = $rec;
                                                //query to select from venue whose venue is as fetched
                                                $srcprice = mysqli_query($con, "Select * FROM venue where Venue_ID = $idvenue");
                                                while ($row = $srcprice->fetch_assoc()) {
                                                    //fetching venue name associated with the venue id as above
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
                                                <!-- ***** Link for venue detail ***** -->
                                                <li><?php echo '<a href="Venue-Detail.php?link=' . $idvenue . ' "><b> + View Detial</b></a>'; ?></li>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <!-- ***** Link to add venue in wish list ***** -->
                                                <li><?php echo '<a href="WishlistDBC.php?id=' . $idvenue . '" name="WishList"><b>+Add to WishList</b></a>'; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-5">
                            <div class="main-button">
                                <!-- ***** Link to view more venues ***** -->
                                <a href="Venues.php">More Venues</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- ***** Main block Ends ***** -->

        <!-- ***** About us block start ***** -->
        <section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-us.jpg); height: 552px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading dark-bg">
                            <h2>Read <em>About Us</em></h2>
                            <img src="assets/images/line-dec.png" alt="">
                            <p>Who Exactly is BookVenue.com ?</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cta-content text-center">
                            <p>Number one Portal for Venue Discovery and Booking We are an online platform that helps users find perfect venues for their events.</p>

                            <p>BookVenue is leading network of trusted venues that provides best in class services to clients for Wedding, Parties and Corporate events. Our venues have a wide range of properties such as Villa,Auditorium,Farm Houses,Party Plots and Halls</p>
                            <div class="main-button">
                                <a href="about.php">About us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** About us block Ends ***** -->

        <!-- ***** Send us message block Start ***** -->
        <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/Contact-us.png); height: 554px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cta-content">
                            <h2>Send us a <em>message</em></h2>
                            <p>If you have any questions about the site or need support, Send us your query We will get back to you within few hours and thats for sure</p>
                            <div class="main-button">
                                <a href="contact.php">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Send us message block End ***** -->

        <!-- ***** Feedback block Start ***** -->
        <section class="section" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>What our<em> Customer's Says </em></h2>
                            <img src="assets/images/line-dec.png" alt="waves">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="features-items">
                            <li class="feature-item">
                                <div class="left-icon">
                                    <img src="assets/images/features-first-icon.png" alt="First One">
                                </div>
                                <div class="right-content">
                                    <h4>Harsh Koli</h4>
                                    <p><em>"Thank you so much BookVenue ! you did an amazing job on such short notice."</em></p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="left-icon">
                                    <img src="assets/images/features-first-icon.png" alt="second one">
                                </div>
                                <div class="right-content">
                                    <h4>Gaurav Patel</h4>
                                    <p><em>"Book Venue has been of great help on searching for location for our corporate part."</em></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="features-items">
                            <li class="feature-item">
                                <div class="left-icon">
                                    <img src="assets/images/features-first-icon.png" alt="fourth muscle">
                                </div>
                                <div class="right-content">
                                    <h4>Harsh Singh</h4>
                                    <p><em>"We would like to thanks to the team of bookVenue for provide such easy to use website for booking venues."</em></p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="left-icon">
                                    <img src="assets/images/features-first-icon.png" alt="training fifth">
                                </div>
                                <div class="right-content">
                                    <h4>Aryanshi sharma</h4>
                                    <p><em>"Had an great stay in villa booked through bookVenue all thanks to the team BookVenue"</em></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <br>

                <div class="main-button text-center">
                    <a href="">Read More</a>
                </div>
            </div>
        </section>
        <!-- ***** Feedback block End ***** -->
        
<!--        Chatbot block start-->
<div id="player"></div>
          <!-- ***** ChatBot Area Start ***** -->
    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>
        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-microphone"
                                    onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
        <!-- ***** ChatBot Area End ***** -->        

<!--        chatbot block end-->

        <!-- ***** Footer included ***** -->
        <?php include './Footer.php'; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="VenuAzyBot/static/scripts/responses.js"></script>
<script src="VenuAzyBot/static/scripts/chat.js"></script>
    </body>

</html>