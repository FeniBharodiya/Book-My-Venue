<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Index
*/

// Database Connection
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: DB Connection
*/

// Connection variables
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "book_venue"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// List Users
$query = "SELECT C_ID,Comment FROM feedback";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    $users = '<table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>'.$number.'</td>
            <td>'.$row['C_ID'].'</td>
            <td>'.$row['Comment'].'</td>
        </tr>';
        $number++;
    }
    $users .= '</table>';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Export Data from MySQL to CSV Tutorial | iTech Empires</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <!--  Header  -->
    <div class="row">
        <div class="col-md-12">
            <h2>Export Data from MySQL to CSV</h2>
        </div>
    </div>
    <!--  /Header  -->

    <!--  Content   -->
    <div class="form-group">
        <?php echo $users ?>
    </div>
    <div class="form-group">
        <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
    </div>
    <!--  /Content   -->

    <script>
        function Export()
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>
</div>
</body>
</html>