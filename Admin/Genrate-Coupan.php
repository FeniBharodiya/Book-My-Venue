<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <!doctype html>
    <html lang="en" class="no-focus"> <!--<![endif]-->
        <head>
            <title>Generate Coupon</title>

            <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

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
                        <h2 class="content-heading">Generate Coupon</h2>
                        <form action="save_coupon.php" method="POST">
                        <div class="form-group">
                            <label>Coupon Code</label>
                            <input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
                            <br />
                            <button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
                        </div>
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="number" class="form-control" name="discount" min="10" required="required"/>
                        </div>
                        
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
                        </form>>
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
            <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page JS Code -->
            <script src="assets/js/pages/be_tables_datatables.js"></script>
            <script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>
        </body>
    </html>
<?php } ?>