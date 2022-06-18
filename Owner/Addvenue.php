<?php
//Session Started
session_start();
//database included
include '../DBC.php';

//checking if owner is sign-ined or not
if (!isset($_SESSION['OName'])) {
    header('location:../Signin/Signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!--validation's on the fields-->
        <script type="text/javascript">
            function validation() {
                var Vname = document.getElementById('Vname').value;
                var VDesc = document.getElementById('Vdescription').value;
                var Vaddress = document.getElementById('Vaddress').value;
                var Vprice = document.getElementById('Price').value;

                var namecheck = /^[A-Za-z. ]{3,30}$/;
                var VDesccheck = /^[A-Za-z. ]{20,500}$/;
                var Vaddresscheck = /^[#.0-9a-zA-Z\s,-]{20,300}$/;
                var Vpricecheck = /^[0-9]{3,10}$/;

                if (namecheck.test(Vname)) {
                    document.getElementById('Venuenameerror').innerHTML = " ";
                } else {
                    document.getElementById('Venuenameerror').innerHTML = "*Enter valid Venue name";
                    return false;
                }
                if (VDesccheck.test(VDesc)) {
                    document.getElementById('VenueDescerror').innerHTML = " ";
                } else {
                    document.getElementById('VenueDescerror').innerHTML = "*Enter valid Description";
                    return false;
                }
                if (Vaddresscheck.test(Vaddress)) {
                    document.getElementById('Venueaddresserror').innerHTML = " ";
                } else {
                    document.getElementById('Venueaddresserror').innerHTML = "*Enter valid Address";
                    return false;
                }
                if (Vpricecheck.test(Vprice)) {
                    document.getElementById('Venuepriceerror').innerHTML = " ";
                } else {
                    document.getElementById('Venuepriceerror').innerHTML = "*Enter valid Price";
                    return false;
                }
            }
        </script>
        <!-- Validations ends -->

        <title>Add Venue</title>
        <!-- ***** Bootstrap link ***** -->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min_owner.css">
        <!-- ***** Font style css ***** -->
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
        <!-- ***** Style css ***** -->
        <link rel="stylesheet" href="../assets/css/style_owner.css">
        <!-- ***** button Style css ***** -->

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

        <!-- ***** Main Block start ***** -->
        <section class="form section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
            <div class="container">
                <div class="row">
                     
                    <form action="AddVenueDBC.php" class="AddVenueForm" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
                        <div class="col-lg-10 text-left">
                            <label>Venue Name</label>
                            <input type="text" name="venuename" placeholder="Enter Your Venue Name" class="form-control my-2 p-3" id="Vname">
                            <span id="Venuenameerror" class="text-danger" font-weight-bold></span>
                        </div>
                        <div class="col-lg-10 text-left">
                            <label>Venue Description</label>
                            <textarea name="venueDesc" placeholder="Enter Your Venue " class="form-control my-2 p-3" id="Vdescription"></textarea>
                            <span id="VenueDescerror" class="text-danger" font-weight-bold></span>
                        </div>
                        <div class="col-lg-10  text-left">
                            <label>Venue Address</label>
                            <textarea name="venueaddress" placeholder="Enter Your venue address" class="form-control my-2 p-3" id="Vaddress" ></textarea>
                            <span id="Venueaddresserror" class="text-danger" font-weight-bold></span>
                        </div>
                        <div class="col-lg-10  text-left">
                            <label>Price Per Day</label>
                            <input type="text" name="priceperday" placeholder="Enter price per day" class="form-control my-2 p-3" id="Price" >
                            <span id="Venuepriceerror" class="text-danger" font-weight-bold></span>
                        </div>
                        <div class="col-lg-10  text-left">
                            <label>Capacity</label>
                            <input type="text" name="Capacity" placeholder="Capacity" class="form-control my-2 p-3" id="Capacity" >
                            <span id="Venuepriceerror" class="text-danger" font-weight-bold></span>
                        </div>
                        <div class="col-lg-10  text-left">
                            <label>Venue Type</label>
                            <select name="venuetype" class="form-control">
                                <option value="Select">--select--</option>
        <?php
        $sql = mysqli_query($con, "SELECT * FROM venuetype");
        while ($row = $sql->fetch_assoc()) {
            $id = $row['VType_ID'];
            echo "<option value=\"$id\">" . $row['VType_Name'] . "</option>";
        }
        ?>
                            </select>
                        </div>
                        <div class="col-lg-10  text-left">
                            <label>Venue Image</label><br>
                            <input type="file" name="venueimage" />

                        </div>
                        <div class="col-lg-12 ">
                            <button type="submit" name="sgninBtn" class="btn btn-danger mt-3 mb-5"> Add Venue</button>
                        </div>
        <?php
        if (isset($_FILES['sgninBtn'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = explode('.', $_FILES['image']['name']);
            $file_ext = (end($temp));

            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "Venue_Images/" . $file_name);
            } else {
                print_r($errors);
            }
        }
        ?>

                    </form>
                     
                </div>
            </div>
        </section>

        <!-- Add venue form -->
<!--        <section class="section" id="contact-us" style="margin-top: 0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div id="map">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="contact-form " >
                            <form id="contact" action="contactus.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject" placeholder="Subject">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" name="btnSubmit" id="form-submit" class="main-button">Send Message</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- Add venue form ends-->
        <!-- ***** Footer included ***** -->
        <?php include '../Footer.php'; ?>



    </body>

</html>