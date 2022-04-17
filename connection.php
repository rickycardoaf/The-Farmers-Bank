<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();

  


            $dbhost  = "gator3215";
            $dbuser  = "hummions_avaloni";
            $dbpass  = "SuNmoon123!dayna";
            $dbname  = "hummions_farmers_bank";

            // $dbhost  = "localhost";
            // $dbuser  = "root";
            // $dbpass  = "root";
            // $dbname  = "farmers_bank";

            //$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
            {

                die("Failed to connect!");

            }
        
?>