<?php
session_start();

include("connection.php");
include("functions.php");
    
   $user_data = check_login($con);

   

?>

<!DOCTYPE html>
<html>

<head>
    <title><?php if(isset($user_data['user_name']) && isset($_SESSION['user_id'])){

        echo $user_data['user_name'];
        $uid = $_SESSION['user_id'];
        
      }?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="mainC.css">
    <script>
    document.addEventListener("click", e => {
        const isDropdownButton = e.target.matches("[data-dropdown-button]")
        if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

        let currentDropdown
        if (isDropdownButton) {
            currentDropdown = e.target.closest("[data-dropdown]")
            currentDropdown.classList.toggle("active")
        }

        document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
            if (dropdown === currentDropdown) return
            dropdown.classList.remove("active")
        })
    })
    </script>
</head>

<body>
    <div class="mainContent">
        <div class="header">
            <?php if(isset($user_data['user_name'])){
            //echo $user_data['user_name'] ;
                echo '<div id="userIfo">
                      <u>'.$user_data['user_name'].'</u>
                    </div>
                    <a href="index.php" class="link" active>Accounts</a>
                    <a href="transactions.php" class="link">Transactions</a>
                    <div class="dropdown" data-dropdown>
                        <button class="link" data-dropdown-button>Tranfers</button>
                        <div class="dropdown-menu information-grid">
                            <div>
                                <div class="dropdown-links">
                                    <a href="transfer.php" class="link">Within my bank</a>
                                    <a href="#" class="link">Other Banks</a>
                                    <a href="#" class="link">Manage Beneficiaries</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="loans.php" class="link">Loans</a>
                    <a href="payments.php" class="link">Payments</a>
                    <div class="dropdown" data-dropdown>
                    <button class="link" data-dropdown-button>Account Settings</button>
                    <div class="dropdown-menu information-grid">
                        <div>
                            <div class="dropdown-links">
                                <a href="logout.php" class="link">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>';
                    
                }else{
                  header("Location: login.php");
                  $error = "Please login to continue.";
                }
            ?>
        </div>

        <div class="contentView">
            <div class="accInfo">
                <table stye="">
                    <tr>
                        <th>Account type</th>
                        <th>Account Num.</th>
                        <th>Balance($)</th>
                    </tr>
                    <?php
                  $checkForAccount = mysqli_query($con, "SELECT accountNum,accountType, accountBalance  FROM accountSum WHERE user_id = '".$uid."'");

                  if($checkForAccount){
              
                      if(mysqli_num_rows($checkForAccount) > 0 ){
              
                          //$userFound = mysqli_fetch_assoc($checkForEmail); 
                          while($row = mysqli_fetch_assoc($checkForAccount)) {
                              $accNum = $row['accountNum'];
                              $accType = $row['accountType'];
                              $accBalance = $row['accountBalance'];

                              echo'
                                  <tr>
                                    <td>'.$accType.'</td>
                                    <td>'.$accNum.'</td>
                                    <td>'.$accBalance.'</td>
                                  </tr>
                                ';
                            }
                      }
                  }
                ?>
                </table>
            </div>


        </div>
    </div>
    <script type="text/javascript">
    function getDetail(user_id) {
        $('#acc_id').html('');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: {
                user_id: user_id
            },
            success: function(data) {
                $('#acc_id').html(data);
            }
        })
    }
    </script>
</body>

</html>