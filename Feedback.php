<!DOCTYPE html>
<html lang="en">

<head>

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
        ?>
    
    <title>Feedback</title>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="star-rating.css">
    
    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min_owner.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .btn1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: #ed563b;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            /* margin-left: 70px; */
        }
        .fa-star{
            font-size: 40px;   
        }
        .stars{
            display: flex;
            /*flex-direction: row;*/
            
        }
        .star{
            list-style: none;
            padding-left: 20px;
            color: white;
        }
        .star:first-child{padding:0;}
        .orange{color: orange;}
        .yellow{color: yellow;}
    </style>

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Book <em> Venue</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="Venues.php">Venues</a></li>
                            <li><a href="Wishlist.php">WishList</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <?php
                            if(isset($_SESSION['OName']))
                            {
                                echo "<li><a href='Logout.php'>Logout</a></li>";
                            }
                               
                           ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <section class="form section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <form action="Feedback-DBC.php" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-10  text-left">
                        <h2><b>Feedback</b></h2><br>
                    </div>
                    <div class="col-lg-10 text-left">
                        <label>Comment</label>
                        <textarea class="form-control my-2 p-3" name="comment" id="comments" placeholder="Your Comments" maxlength="6000" rows="7" required></textarea><br>
                    </div>
                    <div class="col-lg-10 text-left">
                        <label>Rating</label>
                        <ul class="stars">
                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <script>
                        const stars=document.querySelectorAll('.star');
                        const output=document.querySelector('.output');
                        
                        for(x=0; x<stars.length; x++){
                           //stars[x].starValue=(x+1); 
                           //stars[x].addEventListener('click', function(){
                           //console.log("i am clicked");
                        //}) 
                        ["click", "mouseover", "mouseout"].forEach(function(e){
                            stars[x].addEventListener(e, showRating);
                        })
                        }
                        function showRating(e){
                            let type=e.type;
                            //console.log(type);
                            let starValue=this.starValue;
                            //console.log(starValue);
                            
                            stars.forEach(function(elem, ind){
                                if(type==='click'){
                                    if(ind< starValue){
                                        elem.classList.add("orange");
                                    }else{
                                       elem.classList.remove("orange"); 
                                    }
                                }
                                if(type==='mouseover'){
                                    if(ind< starValue){
                                        elem.classList.add("yellow");
                                    }else{
                                       elem.classList.remove("yellow"); 
                                    }
                                }
                                if(type==='mouseout'){
                                        elem.classList.remove("yellow");
                                }
                            })
                        }
                        
                    </script>
                    <div class="col-lg-12 ">
                        <button type="submit" name="btnsubmit" class="btn1 mt-3 mb-5">Send Feedback</button>
                    </div>


                </form>
            </div>
        </div>
    </section>





    <?php include './Footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>