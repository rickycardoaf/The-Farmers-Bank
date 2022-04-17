<?php
  
      if(isset($error)){                
        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
      }elseif(isset($success)){
        echo '<div class="alert alert-success" role="alert">'. $success.'</div>';
                      
      }elseif(isset($remind)){
        echo '<div class="alert alert-info" role="alert">'. $remind.'</div>';
                      
      }else{
        echo "";
      }
    

   
      
      if(isset($_SESSION['isVerified'])){
        if($_SESSION['isVerified'] == "false"){
            $remind = '<marquee behavior="scroll" direction="right">Please check the inbox or spam folder and verify your account</marquee>';
            
            

        }
    }
  
?>