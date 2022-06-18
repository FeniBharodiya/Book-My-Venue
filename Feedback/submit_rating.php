
<?php
//submit_rating.php
session_start();
//data base connection file included
include '../DBC.php';
if(isset($_POST["btnSubmit"]))
{
    //stored value in variable
    $C_ID = $_SESSION['CID'];
    $Rating = $_POST['Rating'];
    $Comment = $_POST['Comment'];
    date_default_timezone_set('Asia/Calcutta'); 
    $Feedback_DateTime = date('Y-m-d H:i:s');
 	
 	//query to add data in databse
    $add_rec="INSERT INTO feedback (C_ID,Rating,Comment,Feedback_DateTime)VALUES('$C_ID','$Rating','$Comment','$Feedback_DateTime')";
    $qryReturn = $con->query($add_rec);
    if($qryReturn == TRUE)
        {
        //redirect user to index
        echo '<script>alert("Thank you for feedback!");'
            . 'window.location.href = "../index.php";'
            . '</script>'; 
    }
    else
    {
        echo $con->error;
    }
}

/*$connect = new PDO("mysql:host=localhost;dbname=", "root", "");
if(isset($_POST["rating_data"]))
{
	$data = array(
		':Booking_ID'		=>	$_POST["Booking_ID"],
		':Rating'		=>	$_POST["Rating"],
		':Comment'		=>	$_POST["Comment"],
		':Feedback_DateTime'	        =>	time()
	);

	$query = "
	INSERT INTO Feedback_table 
	(Booking_ID, Rating, Comment, Feedback_DateTime) 
	VALUES (:Booking_ID, :Rating, :Comment, :Feedback_DateTime)
	";

	$statement = $connect->prepare($query);
	$statement->execute($data);
	echo "Your Review & Rating Successfully Submitted";
}*/

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM Feedback_table 
	ORDER BY Rating DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$review_content[] = array(
			'Booking_ID'		=>	$row["Booking_ID"],
			'Rating'	        =>	$row["Rating"],
			'Comment'			=>	$row["Comment"],
			'Feedback_DateTime'	=>	date('l jS, F Y h:i:s A', $row["Feedback_DateTime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] === '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] === '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] === '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] === '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);
}
?>
