<?php

include("fpss-acc.php");

 

    
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
</head>
<body>
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
                    <p class="text-center">Forgot your password?</p>
                    <p class="text-center">Please enter your email address.</p>
                    <form class="form-box px-3" method="post">
                         <div class="form-input">
                                        <span><i class="fa fa-key"></i></span>
                                        <label for="email">Email</label>
                                        <input type="eamil" name="email" id="email" placeholder="email"
                                            required />
                                    </div>
                                    
                                
                                   
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-block text-uppercase" id="pwreset" name="pwreset">
                                            Reset
                                        </button>
                                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div><hr class="my-4" />
                        <a href="index.php">Back to the login page.</a>
    </div>
</body>
</html>





   