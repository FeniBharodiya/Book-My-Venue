<?php 
//session started
session_start();  
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>About Us</title>
<!-- ***** Bootsrtap and css style links start ***** -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
<!-- ***** Bootsrtap and css style links ends ***** -->
    </head>
    
<body>
    <!-- ***** Header included ***** -->
   <?php include './Header.php'; ?>
    <!-- ***** Main block started ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Learn more <em>About Us</em></h2>
                        <p>Explore the greates places in the city. You won’t be disappointed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ***** Main block ends***** -->

    <!-- ***** Detail block Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Our Goals</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Our Work</a></a></li>
                  <li><a href='#tabs-3'><i class="fa fa-heart"></i> Our Passion</a></a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="assets/images/about-image-1-940x460.jpg" alt="">
                    <h4>Our Goal Is To Change The Way People Celebrate</h4>

                    <p>Book venue is an online venue booking portal with the widest range of venues available in Surat. At Bookvenue, we connect our customers with the best venues in city based on their unique requirements so that they can get the ideal deal for their event. We believe that online venue booking is just as personal as offline venue booking, except much simpler and our goal is to provide hassle-free online venue booking experience to our customers.</p>

                    </article>
                  <article id='tabs-2'>
                    <img src="assets/images/about-image-2-940x460.jpg" alt="">
                    <h4>Our Work</h4>
                    <p></p>
                    </article>
                  <article id='tabs-3'>
                    <img src="assets/images/about-image-3-940x460.jpg" alt="">
                    <h4>Our Passion</h4>
                    <p></p>

                    </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Detail block Start ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
                        <div class="main-button">
                            <a href="contact.php">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Footer Start ***** -->
    
    <?php include './Footer.php'; ?>
    
  </body>
</html>