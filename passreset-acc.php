<?php


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
            
            
            $checkForEmail = mysqli_query($con, "SELECT Email_Address FROM Users WHERE Email_Address = '".$email."'");
        
            if(mysqli_num_rows($checkForEmail) > 0){

                while($row = mysqli_fetch_assoc($checkForEmail)){

                    // $dbuname = $row['user_name'];
                    $dbemail = $row['Email_Address'];

                  }

                //   check if username and email exist
                  if($dbemail == $email){
                    $error = "Email address already exist.";
                  }

                //   if($dbuname == $user_name){
                //     $error = "Username address already exist.";
                //   }

                
            
            }else{
                

               
                    //save to database 
                    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                    $user_id = random_num(20);
                    date_default_timezone_set("Jamaica");
                    $date = date("d/M/Y --- h:i:sa");
                    $query = "INSERT INTO Users (User_Id,First_Name, Last_Name,Email_Address, User_Password, Reg_date) values ('$user_id', '$fname', '$lname','$email','$password_hashed', '$date')";

                    if(mysqli_query($con, $query)){
                        mysqli_close($con);
                        $success = "Account created";
                        $name = "";
                        $email = ""; 
                        $password = "";
                    }else{
                        $error = "There was an issue with you registration.";
                    }
                    

                
            }
        }
    }
?>
