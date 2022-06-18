<?php
//Session Started
session_start();
//included database
include '../DBC.php';
     
     if(isset($_POST["sgninBtn"]))
        {
            //storing data in variable
            $Venue_Name = $_POST['venuename'];
            $Venue_Description = $_POST['venueDesc'];
            $Venue_Address = $_POST['venueaddress'];
            $Price = $_POST['priceperday'];
            $VType_ID= $_POST['venuetype'];
            $Capacity = $_POST['Capacity'];
            
            $Venue_Image = $_FILES['venueimage']['name']; 
            $O_ID = $_SESSION['OID'];
            //data inserted into venue table
            $add_recV = "INSERT INTO venue (Venue_Name,Venue_Description,Capacity,Venue_Address,Price_PerDay,VType_ID,O_ID)VALUES('$Venue_Name','$Venue_Description','$Capacity','$Venue_Address','$Price','$VType_ID','$O_ID')";
            
            $qryReturn = $con->query($add_recV);
            if($qryReturn == TRUE)
            {
                //query to get the last added venue's venue id
                $sel_recI = "SELECT * FROM  venue ORDER BY Venue_ID DESC LIMIT 1";
                $result_I = $con -> query($sel_recI);
                $Img_I = $result_I -> fetch_assoc();
                $Venue_Id = $Img_I['Venue_ID'];
                //query to add image path/name of uplaoded image 
                $add_recI = "INSERT INTO venueimage (Venue_image,Venue_ID)VALUES('$Venue_Image',$Venue_Id)";
                
                $qryReturn1 = $con -> query($add_recI);
                if($qryReturn1 == true)
                {
                    //redirect Owenr Venue page
                    header('Refresh: 0; url=../Owner/OViewVenue.php');
                }
                else{
                    echo $con->error;
                }  
            }
            else
            {
                 echo $con->error;
            }
           
        }
        
     ?>