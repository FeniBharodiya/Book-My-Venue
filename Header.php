<!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <?php
//            if(!isset($_SESSION['CName']))
//            {
//                echo "<div class='SigninLinks'>
//                <span><a href='Signin/Signin.php'>Sign-in</a>|<a href='SignupCustomer/signupCustomer.php'>Sign-up as customer</a>|<a href='SignupOwner/signup.php'>Sign-up as Owner</a></span>
//            </div>";
//            }
//            
//            ?>
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Venue<em>azy</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="Venues.php">Venues</a></li>
                            <li><a href="Wishlist.php">WishList</a></li>
                            <li><a href="Bookings.php">Bookings</a></li>
                            <?php
                            if(isset($_SESSION['CName']))
                            {
                                echo "<li><a href='Logout.php'>Logout</a></li>";
                            }
                               
                           ?>
                            <?php
                            if(!isset($_SESSION['CName']))
                            {
                                echo "<li><a href='Signin/Signin.php'>Login</a></li>";
                            }
                               
                           ?>
                            <?php
                            if(isset($_SESSION['CName']))
                            {
                                echo "<li><a href='CustomerProfile.php'><img src='assets/images/ProfileIcon.jpg' id='profileIcon' height='30px' width='30px' style='border-radius: 15px;'/></a></li>";
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