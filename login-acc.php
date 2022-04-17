<?php
session_start();   /// Start session to capture user information
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");

 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $uppC = preg_match('@[A-Z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if($useremail == "" || $password == ""){
            $error = "Email and password required";
        }elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        }elseif(!$uppC || !$number || strlen($password) < 6){
            $error = "Password should be at least 6 characters in length and should include at least one upper case letter and a number";
        }else{
        

            //read from database 
            // fix OR clause
            $checkForEmail = mysqli_query($con, "SELECT user_id, userAccnum, useremail, userpassword, userfirstname, userlastname, isverify FROM usertable WHERE useremail = '".$useremail."'");
            

            if($checkForEmail){

                if(mysqli_num_rows($checkForEmail) > 0 ){

                    //$userFound = mysqli_fetch_assoc($checkForEmail); 
                    while($row = mysqli_fetch_assoc($checkForEmail)) {
                        $dbpass = $row['userpassword'];
                        $u_id = $row['user_id'];
                        $dbemaladd = $row['useremail'];
                        $fName = $row['userfirstname'];
                        $lName = $row['userlastname'];
                        $useraccnum = $row['userAccnum'];
                        $isVerified = $row['isverify'];
                      }
                      
                     
                    
                      
                        // // verify hash against user typed password
                        if(password_verify($password, $dbpass)){ 
                           
                            $_SESSION['Email_Address'] = $dbemaladd;
                            $_SESSION['User_Id'] = $u_id;
                            $_SESSION['fName'] = $fName;
                            $_SESSION['lName'] = $lName;
                            $_SESSION['isVerified'] = $isVerified;
                            $_SESSION['useraccnum'] = $useraccnum;
                            // echo $_SESSION['Email_Address']."<br>";
                            // echo $_SESSION['User_Id']."<br>";
                            // echo $_SESSION['fName']."<br>";
                            // echo $_SESSION['lName'];
                            
                            header('Location:index-view.php');
                            
                        }else{
                            $error = "Incorrect Username or Password";
                        }
                    
                }else{

                    $error = "No account found for user with email address : ". "" . '<p><u class="link-danger">'.$useremail.'</u></p>';
                    
                }
            }

           
        }
    }

?>

