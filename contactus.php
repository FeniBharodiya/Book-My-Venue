<?php
//session start
session_start();
//data base connection file included
include './DBC.php';
            
     if(isset($_POST["btnSubmit"]))
        {
            //stored value in variable
            $C_Name = $_POST['name'];
            $C_Email = $_POST['email'];
            $C_Subject = $_POST['subject'];
            $C_Message = $_POST['message'];
         
            //query to add data in databse
            $add_rec="INSERT INTO contactus (Contact_Name,Contact_Email,Contact_subject,Contact_Message)VALUES('$C_Name','$C_Email','$C_Subject','$C_Message')";
            
            $qryReturn = $con->query($add_rec);
            if($qryReturn == TRUE)
            {
                //redirect user to index
                echo '<script>alert("Thank you for contacting us!");'
                            . 'window.location.href = "index.php";'
                            . '</script>'; 
            }
            else
            {
                 echo $con->error;
            }
        }
//        }
     ?>
    </body>
</html>