<?php
include("login-acc.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-control" content="no-cache">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="Styles/style.css">
  <style>
      #shpw{
            width: 15px;
            height: 15px;
        }
  </style>

    <title>Farmers Bank Login Page</title>
</head>

<body>
    <!-- <div id="h1t">
         <h2 align="center" >Welcome to the Farmer's Bank Please login to continue</h2>
     </div> -->
    <?php
                if(isset($error)){
                    
                    echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                  </div>';
                }elseif(isset($success)){
                    echo '<div class="alert alert-success" role="alert">
                    '.$success.'
                  </div>';
                }
            ?>

    <div class="container">
        
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-right d-none d-xl-flex d-lg-flex">
                    <img class="img-fluid" src="images/nate-johnston-MRh6Kb16afE-unsplash - Copy.jpg" alt="">
                </div>


                <div class="card-body">
                    <h4 class="title text-center mt-4">Farmers Bank</h4>
                    <p class="text-center">Welcome Back. Please login to continue</p>
                    <form class="form-box px-3" method="post">
                        <div class="form-input">
                            <span><i class="fa fa-envelope-o"></i></span>
                            <label for="email">Email</label><br>
                            <input type="email" name="useremail" id="useremail" placeholder="Email" tabindex="10"
                                required />
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password" placeholder="Password" required /> <input type="checkbox" id="shpw" onclick="myFunction()">        Show Password
     
                        </div>

                        <!--<div class="mb-3" >
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remeberme" name="remeberme" />
                                <label class="custom-control-label" for="cb1">Remember me</label>
                            </div>
                        </div>-->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase">
                                Login
                            </button>
                        </div>

                        <div class="text-right">
                            <a href="fpss.php" class="forget-link"> Forget Password? </a>
                        </div>

                        <hr class="my-4" />

                        <div class="text-center mb-2">
                            Don't have an account?
                            <a href="signup.php" class="register-link"> Register here </a>
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
</script>
</body>

</html>