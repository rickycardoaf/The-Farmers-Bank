<?php
    session_start();   /// Start session to capture user information
    ob_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('usrAccop-acc.php');
    
if(!isset($_SESSION['User_Id'])){
       $error = "Please log in to access this page";
       header('Location:index.php');
       
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
<style>
    #exportSent, #exportRe{
        float: right;
    }
</style>
</head>

<body>
     <?php
                if($_SESSION['isVerified'] != "true" ){
                    
                    $remind = '<div class="alert alert-primary" role="alert"><marquee behavior="scroll" direction="left"> You are seeing this message becasue your account was not verified. Please use the link that was sent to your email at the time of signing up to verify your account.</marquee></div>';


                }
                
                
                if(isset($error)){
                    
                    echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                  </div>';
                }elseif(isset($success)){
                    echo '<div class="alert alert-success" role="alert">
                    '.$success.'
                  </div>';
                }elseif(isset($remind)){
                    echo $remind;
                  
                }
            
            ?>
    <div class="d-flex align-items-start">


        <nav class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-size:30px">
                    <img src="images/fmimg.png" alt="" width="100" height="70" class="d-inline-block align-text-top" >
                    Farmers Bank
                </a>
            </div>
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Transactions</button>
<!----------------------------------------------------------------------------->                
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Transfers</button>
<!----------------------------------------------------------------------------->                
            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Accounts</button>
<!----------------------------------------------------------------------------->           
            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
<!----------------------------------------------------------------------------->                
                 <button class="btn btn-outline-dark" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target=""
                type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="relocate_home()">Log Out</button>
<!----------------------------------------------------------------------------->                
            <!--<section class="d-flex flex-column-reverse">
                <input type="button" aria-selected="false" class="btn btn-primary mb-auto" value="Log Out"
                    onclick="relocate_home()">
            </section>-->
           
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
                            
                            </form>
                        </div>
                    </nav>

                    <section class="row">
                        <div class="col-sm-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Total Balance</div>
                                <div class="card-body">
                                    
                                    <p class="card-text">
                                       <?php
                                    // if(isset($_SESSION['User_Id'])){
                                        
                                    // $u_id = $_SESSION['User_Id'];
                                if(isset($_SESSION['useraccnum'])){
                                        
                                    $u_id = $_SESSION['useraccnum'];
                                        
                                    $getBalance = mysqli_query($con, "SELECT amount_bal FROM accountbaltble WHERE account_num = '".$u_id."'");
                                    
                            
                                    if($getBalance){
                            
                                             if(mysqli_num_rows($getBalance) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($getBalance)) {
                                                    echo "$ ".number_format($row['amount_bal'], 2);
                                                    
                                                  }
                                            }
                     
                                    }
                                    
                                    }
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Account number</div>
                                <div class="card-body">

                                    <p class="card-text">
                                       
                                    <?php
                                    if(isset($_SESSION['User_Id'])){
                                        
                                    $u_id = $_SESSION['User_Id'];
                                        
                                        
                                    $checkForEmail = mysqli_query($con, "SELECT userAccnum FROM usertable WHERE user_id = '".$u_id."'");
                                    //     //$checkForEmail = mysqli_query($con, "SELECT user_id, user_name, password, email FROM users WHERE user_name = '".$user_name."' OR email = '".$user_name."'");
                            
                                    if($checkForEmail){
                            
                                             if(mysqli_num_rows($checkForEmail) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($checkForEmail)) {
                                                    echo $row['userAccnum'];
                                                    
                                                  }
                                            }
                     
                                    }
                                    
                                    }
                                    ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            
                            
                            <h6 class="sub-heading text-primary">Transaction list for funds Received</h6> 
                            <form method="POST">
                                <div class="col-12">
                                                    <button type="submit" id="exportRe" name="exportRe"
                                                        class="btn btn-primary">Export to excel</button>
                                                </div>
                                
                            </form>

                            <table class="table table-striped table-borderless">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Credit / Debit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!---->
                                    <?php
                                    
                                    if(isset($_SESSION['useraccnum'])){
                                        
                                    $acc_num = $_SESSION['useraccnum'];
                                    }
                                    
                                    
           // $getTrans = mysqli_query($con, "SELECT transactionTbl.tran_date AS _date, transactionTbl.trans_amount AS _amount, transactionTbl.trans_description AS _des, transactionTbl.trans_processtyle AS _style ,bentable.acctype AS _type FROM transactionTbl, bentable WHERE bentable.assoc_accnum = '".$acc_num."' AND transactionTbl.acc_num = '".$acc_num."'");
           
           $getTrans = mysqli_query($con, "SELECT tranfertable.transferred_amt As amt, tranfertable.transfer_date AS dte FROM tranfertable where to_accnum = '".$acc_num."'");
                                    $count = 1;
                    if($getTrans){
                            
                        if(mysqli_num_rows($getTrans) > 0 ){
                           //date('Y-m-d',strtotime($row['dte']))
                                                //$userFound = mysqli_fetch_assoc($getTrans); 
                        while($row = mysqli_fetch_assoc($getTrans)) {
                             
                            echo '<tr>
                            <td>'.$count.'</td>
                            <td>'.date('Y-m-d',strtotime($row['dte'])).'</td>
                            <td>$ '.number_format($row['amt'],2).'</td>
                            <td>Debit</td>
                            
                            </tr>';
                                                    
                                       $count++;            
                                                  }
                                            }else{
                                                echo '<tr>
                            
                            <td>No records found</td>
                            
                            </tr>';
                                            }
                     
                                    }else{
                                                echo '<tr>
                            
                            <td>No records found</td>
                            
                            </tr>';
                                            }
                                    
                                    
                                    ?>
                                       
                                </tbody>
                            </table>
                            
                            
                            <h6 class="sub-heading text-primary">Transaction list for funds Sent</h6>
                            
                            <form method="POST">
                                <div class="col-12">
                                                    <button type="submit" id="exportSent" name="exportSent"
                                                        class="btn btn-primary">Export to excel</button>
                                                </div>
                                
                            </form>
                             
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Credit / Debit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!---->
                                    <?php
                                    
                                    if(isset($_SESSION['useraccnum'])){
                                        
                                    $acc_num = $_SESSION['useraccnum'];
                                    }
                                    
                                    
           // $getTrans = mysqli_query($con, "SELECT transactionTbl.tran_date AS _date, transactionTbl.trans_amount AS _amount, transactionTbl.trans_description AS _des, transactionTbl.trans_processtyle AS _style ,bentable.acctype AS _type FROM transactionTbl, bentable WHERE bentable.assoc_accnum = '".$acc_num."' AND transactionTbl.acc_num = '".$acc_num."'");
           
           $getTrans = mysqli_query($con, "SELECT DISTINCT  transactionTbl.tran_date AS _date, transactionTbl.trans_amount AS _amount, transactionTbl.trans_description AS _des, transactionTbl.trans_processtyle AS _style ,bentable.acctype AS _type FROM transactionTbl LEFT JOIN bentable ON  transactionTbl.other_accnum = bentable.acc_num WHERE transactionTbl.acc_num = '".$acc_num."'");
                                    $count = 1;
                    if($getTrans){
                            
                        if(mysqli_num_rows($getTrans) > 0 ){
                           //date('Y-m-d',strtotime(['$row['_date']']))
                                                //$userFound = mysqli_fetch_assoc($getTrans); 
                        while($row = mysqli_fetch_assoc($getTrans)) {
                             
                            echo '<tr>
                            <td>'.$count.'</td>
                            <td>'.date('Y-m-d',strtotime($row['_date'])).'</td>
                            <td>$ '.number_format($row['_amount'],2).'</td>
                            <td>'.$row['_des']." - ".$row['_type'].'</td>
                            <td>'.$row['_style'].'</td>
                            
                            </tr>';
                                                    
                                       $count++;            
                                                  }
                                            }else{
                                                echo '<tr>
                            
                            <td>No records found</td>
                            
                            </tr>';
                                            }
                     
                                    }else{
                                                echo '<tr>
                            
                            <td>No records found</td>
                            
                            </tr>';
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
                                    <button class="nav-link active" id="pills-account2account-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Account to Account</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-externaltransfer-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">External Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-recurringtransfer-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Recurring Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-managebenn-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-be" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Manage
                                        Beneficiaries</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-account2account-tab">
                                    <nav class="navbar navbar-light">
                                        <div class="container-fluid">
                                            <a class="navbar-brand">
                                                <h5>Account to Account Transfer</h5>
                                            </a>
                                        </div>
                                        <section class="row">
                                            <form class="row g-3" method="POST">


                                                <div class="col-md-3">
                                                    <label for="transferfr" class="form-label">Transfer From</label>
                                                    <select id="transferfr" class="form-select" name="transferfr">
                                                        <option selected></option>
                                       <?php
                                       
                                         if(isset($_SESSION['User_Id'])){
                                        
                                    $u_id = $_SESSION['User_Id'];
                                        
                                    $myaccnum = mysqli_query($con, "SELECT userAccnum FROM usertable WHERE user_id = '".$u_id."'");
                                    
                            
                                    if($myaccnum){
                            
                                             if(mysqli_num_rows($myaccnum) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($myaccnum)) {
                                                    //echo '$row['ben_name'];
                                
 echo '<option value="'.$row['userAccnum'].'">'.$row['userAccnum'].'</option>';
                                                    
                                                  }
                                            }
                     
                                    }else{
                                        echo "No account found";
                                    }
                                    
                                    }
                                       
                                       ?>
    
                                                    </select>
                                                </div>
                                                
                                               
                    
                                                 <div class="col-12">
                                                    <label for="amount" class="form-label">To</label>
                                                     <select id="toacc" class="form-select" name="toacc">
                                                        <option selected></option>
                                                        
                                                         <?php
                                    
                                if(isset($_SESSION['useraccnum'])){
                                        
                                    $u_id = $_SESSION['useraccnum'];
                                        
                                    $benefi = mysqli_query($con, "SELECT ben_name, acc_num, acctype FROM bentable WHERE assoc_accnum = '".$u_id."'");
                                    
                            
                                    if($benefi){
                            
                                             if(mysqli_num_rows($benefi) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($benefi)) {
                                                    //echo '$row['ben_name'];
                                $acc_num = $row['acc_num'];
 echo '<option value="'.$row['acc_num'].'">'.$row['ben_name']." - ".$row['acc_num'].'</option>';
                                                    
                                                  }
                                            }
                     
                                    }else{
                                        echo "No ben found";
                                    }
                                    
                                    }
                                    ?>
                                       
    
                                                    </select>
                                                    <!--<input type="text" class="form-control" id="toacc" name="toacc">-->
                                                </div>
                                                
                                                
                                                <div class="col-12">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="text" class="form-control" id="amount" name="amount">
                                                </div>
                                                
                                                <?php
                                                    
                                                        
                                       
                                                
                                                ?>
                                                



                                                <div class="col-12">
                                                    <button type="submit" id="sendmoney" name="sendmoney"
                                                        class="btn btn-primary">Continue</button>
                                                </div>
                                            </form>
                                        </section>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-externaltransfer-tab">
                                    <nav class="navbar navbar-light">
                                        <div class="container-fluid">
                                            <a class="navbar-brand">
                                                <h5>External Transfers</h5>
                                            </a>
                                        </div>
                                        <section class="row">
                                            <form class="row g-3" method="POST">
<div class="alert alert-info">
  <strong>Info!</strong> <h2>This section of the website is under contruction.</h2>
</div>

                                                <!--<div class="col-md-3">
                                                    <label for="transferfr" class="form-label">Transfer From</label>
                                                    <select id="transferfr" class="form-select" name="transferfr">
                                                        <option selected>Select account</option>
                                                        <option value="">Selection1 - User Account information and Name
                                                        </option>
                                                        <option value="">Selection2 - User Account information and Name
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="transferto" class="form-label">Transfer To</label>
                                                    <select id="transferto" class="form-select" name="transferto">
                                                        <option selected>Select receiver</option>
                                                        <option value="">(Selection2 - Account information and
                                                            Name transfering to)</option>
                                                        <option value="">(Selection2 - Account information and
                                                            Name transfering to)</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="number" class="form-control" id="amount" name="amount">
                                                </div>



                                                <div class="col-12">
                                                    <button type="submit" id="chanBtn" name="chanBtn"
                                                        class="btn btn-primary">Continue</button>
                                                </div>-->
                                            </form>
                                        </section>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-recurringtransfer-tab">
                                    <nav class="navbar navbar-light">
                                        <div class="container-fluid">
                                            <a class="navbar-brand">
                                                <h5>Recurring Transfers</h5>
                                            </a>
                                        </div>
                                        <section class="row">
                                            <form class="row g-3" method="POST">

<div class="alert alert-info">
  <strong>Info!</strong> <h2>This section of the website is under contruction.</h2>
</div>
                                                <!--<div class="col-md-3">
                                                    <label for="transferfr" class="form-label">Transfer From</label>
                                                    <select id="transferfr" class="form-select" name="transferfr">
                                                        <option selected>Select account</option>
                                                        <option value="">(Selection1 - User Account information and
                                                            Name)</option>
                                                        <option value="">(Selection2 - User Account information and
                                                            Name)</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="transferto" class="form-label">Transfer To</label>
                                                    <select id="transferto" class="form-select" name="transferto">
                                                        <option selected>Select receiver</option>
                                                        <option value="">(Selection1 - Account information and
                                                            Name transfering to)</option>
                                                        <option value="">(Selection2 - Account information and
                                                            Name transfering to)</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="number" class="form-control" id="amount" name="amount">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="acctype" class="form-label">Frequency</label>
                                                    <select id="time" name="time" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option value="">Daily</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Fortnightly</option>
                                                        <option value="">Monthly</option>
                                                        <option value="">Quarterly</option>
                                                        <option value="">Half Yearly</option>
                                                        <option value="">Yearly</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="startdate" class="form-label">Start Date</label>
                                                    <input type="date" class="form-control" id="startdate"
                                                        name="startdate">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="enddate" class="form-label">End Date</label>
                                                    <input type="date" class="form-control" id="enddate" name="enddate">
                                                </div>



                                                <div class="col-12">
                                                    <button type="submit" id="chanBtn" name="chanBtn"
                                                        class="btn btn-primary">Continue</button>
                                                </div>-->
                                            </form>
                                        </section>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="pills-be" role="tabpanel"
                                    aria-labelledby="pills-managebenn-tab">
                                    <nav class="navbar navbar-light">
                                        <div class="container-fluid">
                                            <a class="navbar-brand">
                                                <h5>Manage Beneficiaries</h5>
                                            </a>
                                        </div>
                                        <section class="row">
                                            <form class="row g-3" method="POST">


                                                <div class="col-md-6">
                                                    <label for="acctype" class="form-label">Account Type</label>
                                                    <select id="acctype" name="acctype" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <!--Based on selection should add information to external transfer or account to account-->
                                                        <option value="Internal">Internal</option>
                                                        <option value="External">External</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="holdername" class="form-label">Account Holder
                                                        Name</label>
                                                    <input type="text" class="form-control" id="holdername"
                                                        name="holdername">
                                                </div>
                                                <div class="col-12">
                                                    <label for="accnumber" class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" id="accnumber"
                                                        name="accnumber">
                                                </div>



                                                <div class="col-12">
                                                    <button type="submit" id="addBenef" name="addBenef"
                                                        class="btn btn-primary">Add Beneficiary</button>
                                                </div>
                                            </form>
                                        </section>
                                    </nav>
                                </div>
                            </div>
                        </section>
                    </section>
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
                                    <form class="row g-3" method="POST">
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control acc-input" id="inputEmail4" value="
                                            <?php
                                    if(isset($_SESSION['User_Id'])){
                                        
                                    $u_id = $_SESSION['User_Id'];
                                        
                                        
                                    $checkForEmail = mysqli_query($con, "SELECT useremail FROM usertable WHERE user_id = '".$u_id."'");
                                    
                            
                                    if($checkForEmail){
                            
                                             if(mysqli_num_rows($checkForEmail) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($checkForEmail)) {
                                                    echo $row['useremail'];
                                                    
                                                  }
                                            }
                     
                                    }
                                    
                                    }
                                    ?>
                                            " readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="fullname" class="form-label">First and Last Name</label>
                                            
                                            <input type="email" class="form-control acc-input" id="inputEmail4" value="
                                            <?php
                                    if(isset($_SESSION['User_Id'])){
                                        
                                    $u_id = $_SESSION['User_Id'];
                                        
                                        
                                    $checkForEmail = mysqli_query($con, "SELECT userfirstname, userlastname FROM usertable WHERE user_id = '".$u_id."'");
                                    
                            
                                    if($checkForEmail){
                            
                                             if(mysqli_num_rows($checkForEmail) > 0 ){
                            
                                    //             //$userFound = mysqli_fetch_assoc($checkForEmail); 
                 while($row = mysqli_fetch_assoc($checkForEmail)) {
                                                    echo $row['userfirstname']." ".$row['userlastname'];
                                                    
                                                  }
                                            }
                     
                                    }
                                    
                                    }
                                    ?> " readonly>
    
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
                                            <input type="text" class="form-control" id="country" name="country">
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="gridCheck"
                                                    id="gridCheck" value="agreesave">
                                                <label class="form-check-label" for="gridCheck">
                                                    I agree to changes made
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" id="saveBtn" name="saveBtn"
                                                class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </section>
                        </section>

                        <section class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <nav class="navbar navbar-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand">
                                        <h3>Settings</h3>
                                    </a>
                                </div>
                            </nav>

                            <nav class="navbar navbar-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand">
                                        <h5>Change Password</h5>
                                    </a>
                                </div>
                                <section class="row">
                                    <form class="row g-3" method="POST">


                                        <div class="col-md-12">
                                            <label for="newpassword1" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="newpassword1"
                                                name="newpassword1">
                                        </div>
                                        <div class="col-12">
                                            <label for="newpassword2" class="form-label">Re-Enter Password</label>
                                            <input type="password" class="form-control" id="newpassword2"
                                                name="newpassword2">
                                        </div>



                                        <div class="col-12">
                                            <button type="submit" id="chanBtn" name="chanBtn"
                                                class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </section>
                            </nav>
                        </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
    <script type="text/javascript" >
                    
                    function relocate_home() {
                location.href = "logout-acc.php";
            }
    </script>
    </main>
</body>

</html>