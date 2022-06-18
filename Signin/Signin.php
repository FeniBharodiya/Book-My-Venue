<?php
session_start();
if (isset($_SESSION['CName'])) {
    echo '<script>alert("You are looged-in ");'
                            . 'window.location.href = "../index.php";'
                            . '</script>';
}
if (isset($_SESSION['OName'])) {
    echo '<script>alert("You are looged-in ");'
                            . 'window.location.href = "../Owner/OwnerProfile.php";'
                            . '</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign In</title>
    <!-- Sign-in page CSS -->
    <link rel="stylesheet" href="../assets/css/Signin.css">

  </head>
  <body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                
                <h4 class="font-weight-bold py-3">Sign in into your account</h4>
                <!-- SIgn-in form-->
                <form action="SigninDBC.php" method="POST">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <!-- Email Field-->
                                <label>E-mail</label>
                                <input type="text" name="sgninEmail" id="email" placeholder="Enter Your E-mail" class="form-control my-2 " required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <!-- password Field-->
                                <label>Password</label>
                                <input type="password" name="sgninPassword" id="password" placeholder="Enter Password" class="form-control my-2 " required>
                            </div>
                        </div>
                            <!-- Forgot Password link-->
                        
                            <p>Forgot Password ? <a class="SULink" href="../ForgotPassword/EmailVerify.php">Reset Password</a></p>
                           
                        <div class="form-row">
                            <div class="col-lg-10">
                                <!-- Login Button-->
                                <button type="submit" name="sgninBtn" class="btn1 mt-3 mb-5"> Login</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <p>Don't have account ? <a class="SULink" href="../SignupCustomer/signupCustomer.php">Sign-up customer</a>|<a class="SULink" href="../SignupOwner/signup.php">Sign-up Owner</a></p>
                            </div>
                        </div>
                            
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>