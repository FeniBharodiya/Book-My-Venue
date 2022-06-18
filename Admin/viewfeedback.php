<?php

$cmd = "python senti.py";
$response = shell_exec($cmd);
;

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
            <title>Feedback</title>

            <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

            <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
            <style>
                tr:hover
                {
                    background-color: coral;
                }
                td{
                    border:1px solid black; 
                }
            </style>
        </head>
        <body>

            <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">

    <?php include_once('includes/sidebar.php'); ?>

                <?php include_once('includes/header.php'); ?>


                <!-- Main Container -->
                <main id="main-container">
                    <!-- Page Content -->
                    <div class="content">
                        <h2 class="content-heading">View Feedback</h2>



                        <!-- Dynamic Table Full Pagination -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">View Feedback</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                                
                                   
<?php
		echo "<table>\n\n";

		// Open a file
		$file = fopen("senti.csv", "r");

		// Fetching data from csv file row by row
		while (($data = fgetcsv($file)) !== false) {

			// HTML tag for placing in row format
			echo "<tr >";
			foreach ($data as $i) {?>
                            <td class='font-w600'>
				<?php echo  htmlspecialchars($i);
?>
                                </td><?php			}
			echo "</tr> \n";
		}

		// Closing the file
		fclose($file);

		echo "\n</table>";
		?>

                               
                            </div>
                        </div>
                        <!-- END Dynamic Table Full Pagination -->
<div class="form-group">
        <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
    </div>
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
<script>
        function Export()
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("./test/export.php", '_blank');
            }
        }
    </script>