<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();
include("signup-acc.php");
 
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/signup.css">
    <title>Farmers Bank Registration Page</title>
    
    <style>
         
      #shpw{
            width: 15px;
            height: 15px;
             padding-left: 40px!important;
        }
  </style>

</head>
<body>
    <!-- <div id="h1t">
         <h2 align="center" >Welcome to the Farmer's Bank Please login to continue</h2>
    </div> -->
    <?php
                // if(isset($error)){
                    
                //     echo '<div class="alert alert-danger" role="alert">
                //     '.$error.'
                //   </div>';
                // }else{
                //     echo "";
                // }
    ?>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <!-- <div class="img-right d-none d-md-flex">
                    <img id="signupimg" src="images/greenforce-staffing-bYZn_C-RswQ-unsplash.jpg" alt="">
                </div> -->
                <div class="card-body">
                    <?php
                if(isset($error)){
                    
                    echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                  </div>';
                }elseif(isset($success)){
                    echo '<div class="alert alert-success" role="alert">
                    '. $success.'
                  </div>';
                   
                }else{
                    echo "";
                }
            ?>
                    <h2 class="title text-center mt-4">Welcome To Farmers Bank!</h2>
                    <h3 class="title text-center mt-4">Let's get started</h3>
                    <p class="text-center">Please enter your information</p>
                    <form class="form-box px-3" method="post">
                        <div class="form-input">
                            <div class="container">
                                <div class="row">
                                    <span><i class="fa fa-key"></i></span>
                                    <div class="col-md-6 form-input">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="fname" id="fname" placeholder="Enter first name"
                                            required />
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" id="lname" placeholder="Enter last name"
                                            required />
                                    </div>
                                    <div class="form-input">
                                        <span><i class="fa fa-envelope-o"></i></span>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Email" required />
                                    </div>
                                   <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password" placeholder="Password" required /> <input type="checkbox" id="shpw" onclick="myFunction()">         Show Password
     
                        </div>

                                    
                               
                                   
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-block text-uppercase">
                                            Create an account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb1" name="" />
                                <label class="custom-control-label" for="cb1">Remember me</label>
                            </div>
                        </div> -->
                        <hr class="my-4" />
                        <div class="text-center mb-2">
                            Already have an account? Click
                            <a href="index.php" class="login-link">  here </a>to sign in
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
   
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
}
</script>
</body>
</html>