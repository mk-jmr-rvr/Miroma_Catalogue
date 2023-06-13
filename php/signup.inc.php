<?php
if(isset($_POST["cancel"])){
    header("location: ../login.php");
    exit();
}

if(isset($_POST["submit"])){
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $password = $_POST["password"];
    $repeatpass = $_POST["repeatpass"];
    $username = $_POST["username"]; 

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($Fname,$Lname,$password,$repeatpass,$username ) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username ) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(pwdMatch($password,$repeatpass) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn,$username) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$Fname,$Lname,$password,$username);

}else{
    header("location: ../signup.php");
}
?>