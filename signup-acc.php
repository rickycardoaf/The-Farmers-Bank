<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
    include("connection.php");
    include("functions.php");
 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        // $password = mysqli_real_escape_string($con,$_POST['reg_password']);
        //echo $name ." ". $email . " ".$user_name." " .$password;
        // $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
        // if(mysqli_num_rows($select)) {
        //     exit('This email address is already used!');
        // }
        $uppC = preg_match('@[A-Z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        // validate fielf on the signup page
        if($fname == "" || $lname == ""){
            $error = "Your name is required";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        }elseif(!$uppC || !$number || strlen($password) < 6){
            $error = "Password should be at least 6 characters in length and should include at least one upper case letter and a number";
        }elseif($password == ""){
            $error = "Password is required";
        }else{
            
            
            $checkForEmail = mysqli_query($con, "SELECT useremail FROM usertable WHERE useremail = '".$email."'");
        
            if(mysqli_num_rows($checkForEmail) > 0){
                while($row = mysqli_fetch_assoc($checkForEmail)){
                    // $dbuname = $row['user_name'];
                    $dbemail = $row['useremail'];
                  }
                //   check if username and email exist
                  if($dbemail == $email){
                    $error = "Email address already exist.";
                  }
                //   if($dbuname == $user_name){
                //     $error = "Username address already exist.";
                //   }
                
            
            }else{
                
                $user_id = $user_id = rand(10,100000);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 5; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }

                    //save to database 
                    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                   
                    
                     
  
    
                    date_default_timezone_set("Jamaica");
                    $date = date("d/M/Y --- h:i:sa");
                    
                    $query = "INSERT INTO usertable (userAccnum ,userfirstname, userlastname ,useremail	, userpassword) values ('$user_id', '$fname', '$lname','$email','$password_hashed')";

                    if(mysqli_query($con, $query)){

                         $checkForuser_id = mysqli_query($con, "SELECT user_id FROM usertable WHERE useremail = '".$email."'"); 

                        if(mysqli_num_rows($checkForuser_id) > 0){

                            while($row = mysqli_fetch_assoc($checkForuser_id)){

                                // $dbuname = $row['user_name'];
                                $dbUser_Id = $row['user_id'];

                              }

                        }
                        
                       
                            
                            $userNew_Id = "FB-000"."-".$dbUser_Id."-".$user_id;
                            $vC = $dbUser_Id.$randomString;
                            $updateUserInfo = mysqli_query($con, "UPDATE usertable SET userAccnum = '".$userNew_Id."', verifycode = '".$vC."', isverify = 'false' WHERE user_id = '".$dbUser_Id."'");
                                $newuserbal = 10000;
                            
                 $query = "INSERT INTO accountbaltble (account_num, amount_bal) values ('$userNew_Id','$newuserbal')";
                        mysqli_query($con, $query);
    
                            mysqli_close($con);
                            $success = "$fname, your account was created. Please check the inbox or spam folder of the email address ($email) you provided for a verification email. ";
                            $name = "";
                            
                            
                            
                            $msg = "Hi $fname, \n\nWelcome to the Farmers Bank online platform. We are happy to have you. \nPlease note, on this platform you can:\n1. Check your account balance\n2. Add beneficiaries.\n3. Make tranfers.\nThe below link should be used to verify your account. \nhttps://carishield.com/hwBackup/farm/verified.php?id=$vC";
    
                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        
                        // send email
                        mail("$email","Welcome to Farmers Bank",$msg);
                            
                    }


                    
                
            }
        }
    }
?>
