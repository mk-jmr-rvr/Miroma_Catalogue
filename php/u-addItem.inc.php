<?php
include 'dbh.inc.php';
if(isset($_POST['create'])){ 
    $Itemname=$_POST['Itemname'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $Incstock=$_POST['Incstock'];

    // Insert into inventory table
    $sql = "INSERT INTO inventory (Item_name, Item_description, Item_price) 
            VALUES ('$Itemname', '$description', '$price')";
    $result1 = mysqli_query($conn, $sql);

    if($result1){
        // Get the ID of the last inserted row in the inventory table
        $inventory_id = mysqli_insert_id($conn);

        // Insert into inventory_stock table
        $sql = "INSERT INTO inventory_stock (Item_ID, Item_stock, Incoming_stock) 
                VALUES ('$inventory_id', '$stock', '$Incstock')";
        $result2 = mysqli_query($conn, $sql);

        if($result2){
            header("location: ../u-view-inv.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

