<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();

session_start();
include("connection.php");
include("functions.php");

$userLgId = "";
$userEM = "";
    
                                                
           
               
                                              
                                            
                                            
    if(isset($_SESSION['User_id']) && isset($_SESSION['Email_Address'])){
 
        $userEM = $_SESSION['Email_Address'];
        $userLgId = $_SESSION['User_Id'];
        echo $_SESSION['Email_Address']."<br>";
                            echo $_SESSION['User_Id']."<br>";
                            echo $_SESSION['fName']."<br>";
                            echo $_SESSION['lName'];
        
    }
    

    
//   $user_data = check_login($con);

//   $uid = 50554027;
//   $user_data['user_name'] = "test@email.com";

if(isset($_POST['logout'])){
    session_destroy();
    header("Location: logout.php");
}

    if(isset($_POST['saveBtn'])){
        if(isset($_POST['gridCheck']) == "agreesave" ){
            $success = "Please agree";
        }else{
            $error = "Please agree to changes first";
        }
        
        // streetNN
        //                                 cityT
        //                                 parish
        //                                 country
        //                                 gridCheck
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Styles/index.css">

    <title><?php
    
    if(isset($_SESSION['fName'])){
       
       echo $_SESSION['fName'];
    }else {
        echo "Nothing found";
    
    }
    
    ?></title>

</head>

<body>
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
    <div class="d-flex align-items-start">


        <nav class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"
                        class="d-inline-block align-text-top">
                    Farmers Bank
                </a>
            </div>
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Transactions</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Transfers</button>
            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Accounts</button>
            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
            <section class="d-flex flex-column-reverse">
                <input type="button" aria-selected="false" class="btn btn-primary mb-auto" value="Log Out"
                    onclick=" relocate_home()">
            </section>
            <script>
            function relocate_home() {
                location.href = "logout.php";
            }
            </script>
        </nav>
        <main class="container">
            <section class="tab-content" id="v-pills-tabContent">
                <section class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand">
                                <h3>Transactions</h3>
                            </a>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search transactions"
                                    aria-label="Search">
                                <button class="btn" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>

                    <section class="row">
                        <div class="col-sm-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Total Balance</div>
                                <div class="card-body">
                                    <h5 class="card-title">Total Balance:</h5>
                                    <p class="card-text">
                                        <?php
                                    $accBalanceCheck = mysqli_query($con, "SELECT accountBalance FROM accountSum WHERE user_id = '".$_SESSION['User_Id']."'");

                                    if($accBalanceCheck){
                                
                                        if(mysqli_num_rows($accBalanceCheck) > 0 ){
                                            $error = "money";
                                            //$userFound = mysqli_fetch_assoc($checkForEmail); 
                                            while($row = mysqli_fetch_assoc($accBalanceCheck)) {
                                                    $formatter = new NumberFormatter('JMD',  NumberFormatter::CURRENCY);
                                                    $accBal = $row['accountBalance'];
                                                    echo $formatter->formatCurrency($accBal, 'JMD'), PHP_EOL;
                                                }
                                        }
                                    }

                                    //mysqli_close($con);
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Total Balance:</h5>
                                    <p class="card-text">$10,000.00</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand">
                                <h5 class="sub-heading">Transactions List</h5>
                            </a>
                            <!-- <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search transactions"
                                    aria-label="Search">
                                <button class="btn" type="submit">Search</button>
                            </form> -->

                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Credit / Debit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                    
                                        $checkForAccount = mysqli_query($con, "SELECT transaction_date, transaction_amount,transaction_type, transaction_processtype  FROM transactions WHERE user_id = '".$_SESSION['User_Id']."'");

                                        if($checkForAccount){
                                    
                                            if(mysqli_num_rows($checkForAccount) > 0 ){
                                    
                                                //$userFound = mysqli_fetch_assoc($checkForEmail); 
                                                while($row = mysqli_fetch_assoc($checkForAccount)) {

                                                    $tranDate = $row['transaction_date'];
                                                    $tranAmount = $row['transaction_amount'];
                                                    $tranType = $row['transaction_type'];
                                                    $tranProcesty = $row['transaction_processtype'];

                                                    echo'
                                                        <tr>
                                                            <th scope="row">'.$tranDate.'</th>
                                                            <td>'.$tranAmount.'</td>
                                                            <td>'.$tranType.'</td>
                                                            <td>'.$tranProcesty.'</td>
                                                        </tr>
                                                        ';
                                                    }
                                            }else{
                                                echo'
                                                        <tr>
                                                            <th scope="row"><p class="text-info">No Records Found</p></th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        ';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </nav>
                </section>

                <section class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">

                    <section class="tab-content" id="v-pills-tabContent">
                        <section class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <nav class="navbar navbar-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand">
                                        <h3>Transfers</h3>
                                    </a>
                                </div>
                            </nav>


                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Account to Account</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">External Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Recurring Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Manage
                                        Beneficiaries</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">...</div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">...</div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>
                        </section>

                        <!--Accounts Tab-->
                        <section class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <nav class="navbar navbar-light">
                                <div class="container-fluid">
                                    
                                    <a class="navbar-brand">
                                        <h3>Accounts</h3>
                                    </a>
                                </div>
                                <section class="row">
                                    <h6>Photo</h6>
                                    <img id="pro-pic" class="img-fluid" src="images/585e4bf3cb11b227491c339a.png"
                                        class="rounded float-start" alt="...">
                                </section>

                                <!--Accounts page form-->
                                <section id="acc-form" class="row">
                                    <form class="row g-3">
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control acc-input" id="inputEmail4"
                                                value="<?php 
    
    if(isset($_SESSION['Email_Address'])){
       
       echo $_SESSION['Email_Address'];
    }
    
    ?>" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="fullname" class="form-label">First and Last Name</label>
                                            <input type="text" class="form-control" id="fullname" value="<?php
    
    if(isset($_SESSION['fName']) && isset($_SESSION['lName'])){
       
       echo $_SESSION['fName']." ".$_SESSION['lName'];
    }else {
        echo "Nothing found";
    
    }
    
    ?>" disabled>
                                                                            </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Strest name and number</label>
                                            <input type="text" class="form-control" id="streetNN" name="streetNN"
                                                placeholder="1st Young Street">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">City/Town</label>
                                            <input type="text" class="form-control" id="cityT" name="cityT"
                                                placeholder="Spanish town/Portmore">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Parish</label>
                                            <select id="parish" name="parish" class="form-select">
                                                <option selected>Choose...</option>
                                                <option value="Clarendon">Clarendon</option>
                                        <option value="Hanover">Hanover</option>
                                        <option value="Kingston">Kingston</option>
                                        <option value="Manchester">Manchester</option>
                                        <option value="Portland">Portland</option>
                                        <option value="Saint Andrew">Saint Andrew</option>
                                        <option value="Saint Ann">Saint Ann</option>
                                        <option value="Saint Catherine">Saint Catherine</option>
                                        <option value="Saint Elizabeth">Saint Elizabeth</option>
                                        <option value="Saint James">Saint James</option>
                                        <option value="Saint Mary">Saint Mary</option>
                                        <option value="Saint Thomas">Saint Thomas</option>
                                        <option value="Trelawny">Trelawny</option>
                                        <option value="Westmoreland">Westmoreland</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCity" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="country" id="country">
                                        </div>
                                        

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="gridCheck" id="gridCheck" value="agreesave">
                                                <label class="form-check-label" for="gridCheck">
                                                    I agree to changes made
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" id="saveBtn" name="saveBtn" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </section>
                        </section>

                        <section class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde architecto ex, natus atque
                                maxime
                                numquam est perspiciatis cumque cum reiciendis eum exercitationem aliquam eveniet
                                tempore. Sequi
                                ea est sunt eum!</p>
                        </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    </main>
</body>

</html>