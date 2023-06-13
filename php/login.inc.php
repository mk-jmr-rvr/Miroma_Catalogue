<?php

if(isset($_POST["submit"])){
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
     
    if(emptyInputLogin($password,$username ) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else{
    header("location: ../login.php");
    exit();
}

