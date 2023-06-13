<?php
include 'dbh.inc.php';

$id = $_GET['id'];
// First, delete the related rows from the inventory_stock table
$delete_query = "DELETE FROM inventory_stock WHERE Item_ID = $id";
$result = mysqli_query($conn, $delete_query);

// Then, delete the row from the inventory table
$delete_query = "DELETE FROM inventory WHERE Item_ID = $id";
$result = mysqli_query($conn, $delete_query);

if ($result) {
  header("Location: ../u-manageinv.php");
} else {
  echo "Failed:" . mysqli_error($conn);
}