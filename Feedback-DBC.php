<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php

        $servername="localhost";
        $username="root";
        $password="";
        $database_name="book_venue";
        $con = mysqli_connect("$servername","$username","$password","$database_name");
        if(!$con)
        {
            die("connection failed...". mysqli_connect_error());
        }
       

            
     if(isset($_POST["btnsubmit"]))
        {
            //Use of MD5 to store encrypted data
            $Booking_ID = $_POST['bookingid'];
            $Comment = $_POST['comment'];
            $Ratings = $_POST['rating'];
            $Feedback_DateTime = date('d-m-y');
            
            
            $add_rec="INSERT INTO feedback(Booking_ID,Comment,Ratings,Feedback_DateTime)VALUES('$Booking_ID','$Comment','$Ratings','$Feedback_DateTime')";
            
            $qryReturn = $con->query($add_rec);
            if($qryReturn == TRUE)
            {
                
                echo "<script>alert('your feedback is successfully post')</script>"; 
                
            }
            else
            
                echo $con->error;
           
        }
        
     ?>
    </body>
</html>
