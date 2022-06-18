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
	$coupon_code = $_POST['coupon'];
	$price = $_POST['price'];
	
	$query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
	$count = mysqli_num_rows($query);
	$fetch = mysqli_fetch_array($query);
	$array = array();
	if($count > 0){
		$discount = $fetch['discount'] / 100;
		$total = $discount * $price;
		$array['discount'] = $fetch['discount'];
		$array['price'] = $price - $total;
		
		echo json_encode($array);
		
	}else{
		echo "error";
	}
?>