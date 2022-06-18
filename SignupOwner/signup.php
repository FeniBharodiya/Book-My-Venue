<!doctype html>
<html lang="en">
  <head> 
       <!--validation's on the fields-->
      <script type="text/javascript">
          function validation(){
              var name = document.getElementById('name').value;
              var mnumber = document.getElementById('mnumber').value;
              var email = document.getElementById('email').value;
              var password = document.getElementById('password').value;
              
              var namecheck = /^[A-Za-z. ]{3,30}$/ ;
              var mnumbercheck = /^[0-9]{10}$/ ;
              var emailcheck = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ ;
              var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,10}$/ ;

              if(namecheck.test(name)){
                  document.getElementById('usernameerror').innerHTML = " ";
              }else{
                  document.getElementById('usernameerror').innerHTML = "*Enter valid name";
                  return false;
              }
              if(mnumbercheck.test(mnumber)){
                  document.getElementById('mnumbererror').innerHTML = " ";
              }else{
                  document.getElementById('mnumbererror').innerHTML = "*Enter valid Mobile Number";
                  return false;
              }
              if(emailcheck.test(email)){
                  document.getElementById('emailerror').innerHTML = " ";
              }else{
                  document.getElementById('emailerror').innerHTML = "*Enter valid Email";
                  return false;
              }
              if(passwordcheck.test(password)){
                  document.getElementById('passworderror').innerHTML = " ";
              }else{
                  document.getElementById('passworderror').innerHTML = "*Enter valid Password";
                  return false;
              }
          }
      </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup</title>
    
    <link rel="stylesheet" href="../assets/css/SignupOwner.css">
  </head>
  <body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                
                <h4 class="font-weight-bold py-3">Sign Up As Owner</h4>
                <form action="SignupOwnerDBC.php" method="POST" onsubmit="return validation()">
                            
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label>Name</label>
                                <input type="text" name="txtname" placeholder="Enter Your Name" class="form-control my-2" id="name">
                                <span id="usernameerror" class="text-danger" font-weight-bold></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label>Mobile Number</label>
                                <input type="numeric" name="mnumber" placeholder="Enter Your Mobile Number" class="form-control my-2" id="mnumber">
                                <span id="mnumbererror" class="text-danger" font-weight-bold></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Enter Your E-mail" class="form-control my-2" id="email">
                                <span id="emailerror" class="text-danger" font-weight-bold></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label>Password</label>
                                <input type="password" name="txtpassword" placeholder="********" class="form-control my-2" id="password">
                                <span id="passworderror" class="text-danger" font-weight-bold></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <button type="submit" name="btnsubmit" class="btn1 mt-3 mb-5">Sign Up</button>
                            </div>
                        </div>
                        
                    <p>Already have an account ? <a class="SULink" href="../Signin/Signin.php">Sign in</a></p>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>