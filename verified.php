<?php
 include("connection.php");
$id = $_GET['id'];
  
  
  
  $checkForVCode = mysqli_query($con, "SELECT verifiedCode, isVerified FROM Users WHERE verifiedCode = '".$id."'");
        
            if(mysqli_num_rows($checkForVCode) > 0){
                while($row = mysqli_fetch_assoc($checkForVCode)){
                    $dbisVerified = $row['isVerified'];
                    $dbVCode = $row['verifiedCode'];
                  }
                //   check if username and email exist
               
                    if($dbisVerified == true){
                        
                        $error = 'Your account is already verified. Please go head and <a href="login.php">Login</a> with the email address and password used to create your account';
                    
                    }elseif($dbVCode == $id && $dbisVerified == false){
                        $isVerified = "true";
                      $userVerified = mysqli_query($con, "UPDATE Users SET isVerified = '".$isVerified."' WHERE verifiedCode = '".$id."'");
                      if($userVerified){
                          $success = 'Your account was verified. Please go head and <a href="login.php">Login</a>';
                      }else{
                          $error = "Please try again.";
                      }
                        
                    }
                
                
            
            }else{
                $error = "Invalid id";
            }
            

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
            </div>
            </body>
</html>