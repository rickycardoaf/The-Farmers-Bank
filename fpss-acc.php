<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();
    include("connection.php");

 
    //if($_SERVER['REQUEST_METHOD'] == "POST")
    if(isset($_POST['pwreset'])){
        //something was posted
       //$error = "inside";
        $email = trim(mysqli_real_escape_string($con, $_POST['email']));
        
        $checkForEmail = mysqli_query($con, "SELECT user_id,userfirstname, useremail FROM usertable WHERE useremail = '".$email."'");
        
        

            if($checkForEmail){

                if(mysqli_num_rows($checkForEmail) > 0 ){

                    //$userFound = mysqli_fetch_assoc($checkForEmail); 
                    while($row = mysqli_fetch_assoc($checkForEmail)) {
                        
                        $user_id = $row['user_id'];
                       $user_name = $row['userfirstname'];
                      }



                      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error = "Invalid email format";
                   }else{
               
                           
                         // $checkForEmail = mysqli_query($con, "SELECT Email_Address FROM Users WHERE Email_Address = '".$email."'");
                       $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                   $charactersLength = strlen($characters);
                                   $randomString = '';
                                   for ($i = 0; $i < 3; $i++) {
                                       $randomString .= $characters[rand(0, $charactersLength - 1)];
                                   }
               
                          $password = "FmB".$email[0].$user_id.$randomString;
                          
                                   //save to database 
                       $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                       $updateUserInfo = mysqli_query($con, "UPDATE usertable SET userpassword = '".$password_hashed."' WHERE useremail = '".$email."'");
                               
                               if($updateUserInfo){
                                   
                               }
                               
                               mysqli_close($con);
                                       $success = "Reset email sent to $email. ";
                                       $name = "";
                                       
                                       
                                       
                                       $msg = "Hi $user_name, \n\n\nPlease use your temporary  below to sign into your account. After which you can change your password under settings\n.Please note that once the your password is udated in the system, youur most recent password is what yous hould use to login.\n\n\nPassword: $password";
               
                                   // use wordwrap() if lines are longer than 70 characters
                                   $msg = wordwrap($msg,70);
                                   
                                   // send email
                                   mail("$email","Password reset, Farmers Bank",$msg);
                                       
                       }
                    }else{
                        $error = "Email address does not exist.  Please check the spelling and try again.";
                    }
        
       
                }
    }

    
?>
