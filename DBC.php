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
        ?>
