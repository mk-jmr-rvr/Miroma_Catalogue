<?php
//SIGN UP FUNCTIONS
function emptyInputSignup($Fname,$Lname,$password,$repeatpass,$username){

    if(empty($Fname)|| empty($Lname)|| empty($password)|| empty($repeatpass)|| empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function invalidUid($username){
        
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function pwdMatch($password,$repeatpass){
        
    if($password !== $repeatpass){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function uidExists($conn,$username){
    $sql = "SELECT * FROM user WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$Fname,$Lname,$password,$username){
    $sql = "INSERT INTO user (first_name, last_name, password, username) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $Fname, $Lname, $hashedPwd, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php");
    exit();
}

//LOG IN FUNCTIONS
// check if the username and password are empty.
function emptyInputLogin($username, $password){
   
    if(empty($username)|| empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $uidExist = uidExists($conn,$username);

    if($uidExist=== false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["password"];
    $checkPwd = password_verify($password,$pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    } 
    else if($checkPwd === true){
        session_start();
        $_SESSION["userType"] = $uidExist["userType"];        
        $_SESSION["UserID"]=$uidExist["UserID"];
        $_SESSION["username"]=$uidExist["username"];
        $checkusertype = $_SESSION["userType"];
        if($checkusertype == "admin"){
            header("location: ../dashboard.php");
        }
        if($checkusertype == "user"){
            header("location: ../u-dashboard.php");
        }
        exit();
    }
}

//ADD USER FUNCTIONS

function emptyInputAddUser($Fname,$Lname,$password,$repeatpass,$username){

    if(empty($Fname)|| empty($Lname)|| empty($password)|| empty($repeatpass)|| empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function invalidUidAddUser($username){
        
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function pwdMatchAddUser($password,$repeatpass){
        
    if($password !== $repeatpass){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}
function uidExistsAddUser($conn,$username){
    $sql = "SELECT * FROM user WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../a-manageuser.php?error=usernametaken");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser_AddUser($conn,$Fname,$Lname,$password,$username){
    $sql = "INSERT INTO user (first_name, last_name, password, username) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../a-manageuser.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $Fname, $Lname, $hashedPwd, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../a-manageuser.php");
    exit();
}


function View_DisplayUsers($conn){
    $sql = "SELECT * FROM  user";
    $query = mysqli_query($conn,$sql);
    $checkdisplay = mysqli_num_rows($query);

    if($checkdisplay>0){
        while($row=mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td> " . $row['UserID'] . "</td>";
            echo "<td> " . $row['first_name'] . "</td>";
            echo "<td> " . $row['last_name'] . "</td>";
            echo "<td> " . $row['username'] . "</td>";
            echo "</tr>";
        }
    }
    

}

function Manage_DisplayItems($conn){
    $sql = "SELECT * FROM  inventory
            LEFT JOIN inventory_stock ON inventory.Item_ID = inventory_stock.Item_ID";
    $query = mysqli_query($conn,$sql);
    $checkdisplay = mysqli_num_rows($query);
    $id="SELECT * FROM inventory WHERE ID ='Item_ID'";
    if($checkdisplay>0){
        while($row=mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td> " . $row['Item_ID'] . "</td>";
            echo "<td> " . $row['Item_name'] . "</td>";
            echo "<td> " . $row['Item_description'] . "</td>";
            echo "<td> " . $row['Item_price'] . "</td>";
            echo "<td> " . $row['Item_stock'] . "</td>";
            echo "<td> " . $row['Incoming_stock'] . "</td>";
            echo "<td> " . "<button><a href=''> Edit</a> </button>". "</td>";
            echo "<td> " . "<button><a href='Php/deleteItem.inc.php?deleteID='.$id,''>Delete</a> </button>". "</td>";
            echo "</tr>";
        }
    }
  

}
function View_DisplayItems($conn){
    $sql = "SELECT * FROM  inventory
            LEFT JOIN inventory_stock ON inventory.Item_ID = inventory_stock.Item_ID";
    $query = mysqli_query($conn,$sql);
    $checkdisplay = mysqli_num_rows($query);

    if($checkdisplay>0){
        while($row=mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td> " . $row['Item_ID'] . "</td>";
            echo "<td> " . $row['Item_name'] . "</td>";
            echo "<td> " . $row['Item_description'] . "</td>";
            echo "<td> " . $row['Item_price'] . "</td>";
            echo "<td> " . $row['Item_stock'] . "</td>";
            echo "<td> " . $row['Incoming_stock'] . "</td>";
           echo "</tr>";
        }
    }
    

}

function userCounter ($connection) 
{
    $sql = "SELECT COUNT(id) FROM persons";
    $result = mysqli_query($connection,$sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}

