
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Change Password</title>
        <!-- Sign-in page CSS -->
        <link rel="stylesheet" href="../assets/css/Signin.css">
        
    </head>
    <body>
        <section class="form my-4 mx-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <h4 class="font-weight-bold py-5">Enter New Password</h4>
                        <!-- SIgn-in form-->
                        <form action="ChangePasswordDBC.php" method="POST">

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- password Field-->
                                    <label>Password</label>
                                    <input type="password" name="Password" id="password" placeholder="Enter Password" class="form-control my-2 " required>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- password Field-->
                                    <label>Confirm Password</label>
                                    <input type="password" name="CPassword" id="cpassword" placeholder="Enter Confirm Password" class="form-control my-2 " required>
                                    
                                </div>
                            </div>
                           

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- Change password Button-->
                                    <button type="submit" name="Change" class="btn1 mt-3 mb-5">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>