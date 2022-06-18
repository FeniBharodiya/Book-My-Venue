
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>OTP </title>
        <!-- Sign-in page CSS -->
        <link rel="stylesheet" href="../assets/css/Signin.css">
        <style>
            .timer {
                width: 515px;
                font-size: 1.5em;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <section class="form my-4 mx-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <h4 class="font-weight-bold py-5">Check your E-mail For OTP</h4>
                        <!-- SIgn-in form-->
                        <form action="OTPCDBC.php" method="POST">

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- password Field-->
                                    <label>Enter OTP</label>
                                    <input type="text" name="CEnterdOTP" id="password" placeholder="Enter OTP" class="form-control my-2 " required>
                                    <div class="timer">
                                        <h6>Didn't recieved OTP - <time id="countdown">3:00</time><a href="Resend.php" id="Resend" style="display: none">Resend?</a></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Forgot Password link-->

                            <div class="form-row">
                                <div class="col-lg-10">
                                    <!-- Login Button-->
                                    <button type="submit" name="enterOtp" class="btn1 mt-3 mb-5">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
            var seconds = 180;
            function secondPassed() {
                var minutes = Math.round((seconds - 30) / 60),
                        remainingSeconds = seconds % 60;

                if (remainingSeconds < 10) {
                    remainingSeconds = "0" + remainingSeconds;
                }
                    
                var resend = document.getElementById('Resend');
                document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
                if (seconds == 0) {
                    clearInterval(countdownTimer);
                    //form1 is your form name
                    resend.style.display = 'block';
                } else {
                    seconds--;
                }
            }
            var countdownTimer = setInterval('secondPassed()', 1000);
        </script>
    </body>
</html>