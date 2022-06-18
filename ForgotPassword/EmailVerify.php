
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Verify Email</title>
        <!-- Sign-in page CSS -->
        <link rel="stylesheet" href="../assets/css/Signin.css">
        
    </head>
    <body>
        <section class="form my-4 mx-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <h4 class="font-weight-bold py-5">Enter Your Registrated Email</h4>
                        <!-- SIgn-in form-->
                        <form action="EmailVerifyDBC.php" method="POST">

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- password Field-->
                                    <label>Enter Email</label>
                                    <input type="text" name="REmail" id="password" placeholder="Enter Email" class="form-control my-2 " required>
                                    
                                </div>
                            </div>
                            <!-- Forgot Password link-->

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- Login Button-->
                                    <button type="submit" name="enterEmail" class="btn1 mt-3 mb-5">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>