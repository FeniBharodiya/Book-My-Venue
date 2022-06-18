<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <title>Venue Booking</title>
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">

            <?php include_once('includes/sidebar.php'); ?>

            <?php include_once('includes/header.php'); ?>


            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="viewowner.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totalcanbooking); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-support fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Owner Record</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="viewcustomer.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totalserv); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-wallet fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Customer Record</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="all-booking.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totaleventtype); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-bubbles fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total All Booking</p>
                                </div>
                            </a>
                        </div>
                        <!-- End Row #1 -->
                    </div>
                </div>
                
                <div class="content">
                    <div class="row gutters-tiny" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="manage-event-type.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totalcanbooking); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-support fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Venue Type</p>
                                </div>
                            </a>
                        </div>
                        <!--<div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="viewcustomer.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totalserv); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-wallet fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Customer Record</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="all-booking.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                    
                                    <div class="ribbon-box"><?php echo htmlentities($totaleventtype); ?></div>
                                    <p class="mt-5">
                                        <i class="si si-bubbles fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total All Booking</p>
                                </div>
                            </a>
                        </div>-->
                        <!-- End Row #1 -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <?php include_once('includes/footer.php'); ?>
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
    </body>
</html>