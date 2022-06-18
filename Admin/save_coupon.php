<?php
	//Sever name
        $servername="localhost";
        //username
        $username="root";
        //password
        $password="";
        //database name
        $database_name="book_venue";
        //Connection
        $con = mysqli_connect("$servername","$username","$password","$database_name");
        if(!$con)
        {
            die("connection failed...". mysqli_connect_error());
        }
	if(ISSET($_POST['save'])){
		$coupon_code = $_POST['coupon'];
		$discount = $_POST['discount'];
		$status = "Valid";
		$query = mysqli_query($con, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code'") or die(mysqli_error());
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			echo "<script>alert('Coupon Already Use')</script>";
			echo "<script>window.location = 'Genrate-Coupan.php'</script>";
		}else{
			mysqli_query($con, "INSERT INTO `coupon` VALUES('', '$coupon_code', '$discount', '$status')") or die(mysqli_error());
			echo "<script>alert('Coupon Saved!')</script>";
			echo "<script>window.location = '../Admin/Genrate-Coupan.php'</script>";
		}
	}
?>