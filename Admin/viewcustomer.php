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
            <title>Customer Record</title>

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
                        <h2 class="content-heading">Customer</h2>



                        <!-- Dynamic Table Full Pagination -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Total Record</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>Customer ID</th>
                                            <th class="d-none d-sm-table-cell">Customer Name</th>
                                            <th class="d-none d-sm-table-cell">Customer Email</th>
                                            <th class="d-none d-sm-table-cell">Customer PhoneNumber</th>
                                            <th class="d-none d-sm-table-cell">Customer Gender</th>
                                            <th class="d-none d-sm-table-cell">Customer Registration Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    $sql = "SELECT * from customer";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {
            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_ID); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_Name); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_Email); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_PhoneNumber); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_Gender); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->C_Registration_Date); ?></td>
                                                    
                                                     
                                                    
                                                    
                                                </tr>
                                                    <?php $cnt = $cnt + 1;
                                                }
                                            } ?> 



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Dynamic Table Full Pagination -->

                        <!-- END Dynamic Table Simple -->
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
        </body>
    </html>
<?php } ?>