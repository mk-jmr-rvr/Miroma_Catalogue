<?php
if(isset($_POST["create"])){
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $password = $_POST["password"];
    $repeatpass = $_POST["repeatpass"];
    $username = $_POST["username"]; 

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputAddUser($Fname,$Lname,$password,$repeatpass,$username ) !== false){
        header("location: ../a-manageuser.php?error=emptyinput");
        exit();
    }
    if(invalidUidAddUser($username ) !== false){
        header("location: ../a-manageuser.php?error=invalidUid");
        exit();
    }
    if(pwdMatchAddUser($password,$repeatpass) !== false){
        header("location: ../a-manageuser.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExistsAddUser($conn,$username) !== false){
        header("location: ../a-manageuser.php?error=usernametaken");
        exit();
    }

    createUser_AddUser($conn,$Fname,$Lname,$password,$username);

}else{
    header("location: ../a-manageuser.php");
    exit();
}