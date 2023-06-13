<?php
include 'dbh.inc.php';

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE UserID = $id"; 
$result = mysqli_query($conn, $sql);
if($result) {
header("Location: ../a-manageuser.php");
}
else{
echo "Failed:" .mysqli_error($conn);
}