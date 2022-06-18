<?php 
//session started
session_start();
//disable all warnigns
error_reporting(E_ERROR | E_PARSE);
//database included
include './DBC.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Profile</title>
<!-- ***** Bootsrtap and css style links start ***** -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="./assets/css/style_2.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- ***** Bootsrtap and css style links ends ***** -->
    </head>
    
    <body>    
    <!-- ***** Header included ***** -->
    <?php include './Header.php'; ?>

 <!-- ***** Below Header Start ***** -->
<!--    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ***** Below Header End ***** -->

    <!-- ***** Section for Customer Detail Starts ***** -->
    <section class="section" id="call-to-action" style="background-color: #2d3740">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content">
                        <!-- ***** With session getting name of owner ***** -->
                        <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['CName'] ?>" class="OwnerIcon">
                        <h2>Welcome <em><?php echo $_SESSION['CName'] ?></em></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="cta-content">
                        <br>
                        <br>
                        <br>
                        <!-- ***** getting name of owner with session ***** -->
                        <h3 class="ODetailrow">Name - <?php echo $_SESSION['CName'] ?></h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="cta-content">
                        <br>
                        <!-- ***** getting email of owner with session ***** -->
                        <h3 class="ODetailrow">Email - <?php echo $_SESSION['CEmail'] ?></h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="cta-content">
                        <br>
                        <!-- ***** getting Phone number of owner with session ***** -->
                        <h3 class="ODetailrow">PhoneNumber - <?php echo $_SESSION['CNumber'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- ***** Section for Customer Detail venues Ends ***** -->


    <!-- ***** Footer included ***** -->
    <?php include './Footer.php'; ?>


  </body>
</html>