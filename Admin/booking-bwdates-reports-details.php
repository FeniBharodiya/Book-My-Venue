<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <title>Onlind DJ Management System - B/W Dates Booking Report</title>

        <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    </head>
    <body>
        
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
           
           <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>


            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <h2 class="content-heading">B/W Dates Booking Report</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">B/W Dates Booking Report</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                         
                            <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<table  style="width:100px;" bordercolor="#C0C0C0" border="1px" align="center">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Booking_Id</th>
                                        <th class="d-none d-sm-table-cell">Check_in_date</th>
                                        <th class="d-none d-sm-table-cell">Check_out_date</th>
                                        <th class="d-none d-sm-table-cell">Total_Amount</th>
                                        <th class="d-none d-sm-table-cell">Booking_DateTime</th>
                                        <th class="d-none d-sm-table-cell">Venue_ID</th>
                                        <th class="d-none d-sm-table-cell">C_ID</th>
                                        <th class="d-none d-sm-table-cell">Start_Time</th>
                                        <th class="d-none d-sm-table-cell">End_Time</th>
                                       </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
$sql="SELECT * from venuebooking where Booking_DateTime BETWEEN '$fdate' and '$tdate'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
//if($query->rowCount() > 0)

foreach($results as $row)
{               ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Booking_ID);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Check_in_date);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Check_out_date);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Total_Amount);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Booking_DateTime);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Venue_ID);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->C_ID);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Start_Time);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->End_Time);?></td>
                                        
                                   
                                
                                <?php $cnt=$cnt+1;} ?>
                                  
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

           <?php include_once('includes/footer.php');?>
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
<?php }  ?>