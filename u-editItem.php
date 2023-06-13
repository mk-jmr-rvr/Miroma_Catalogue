<?php
include "Php/dbh.inc.php";
$id = $_GET['id'];

if(isset($_POST['save'])) {
  $Itemname = $_POST["Itemname"];
  $description = $_POST["description"];
  $price = $_POST["price"]; 
  $stock = $_POST["stock"];
  $Incstock = $_POST["Incstock"];

  // Update the row in the inventory table
  $sql = "UPDATE `inventory` SET `Item_name`='$Itemname',`Item_description`='$description',`Item_price`='$price' WHERE Item_ID=$id";
  $result = mysqli_query($conn, $sql);

  // Update the row in the inventory_stock table
  $sql = "UPDATE `inventory_stock` SET `Item_stock`='$stock', `Incoming_stock`='$Incstock' WHERE Item_ID=$id";
  $result2 = mysqli_query($conn, $sql);

  if ($result && $result2) {
    header("Location: u-manageinv.php");
  } else {
    echo "Failed:" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>[U] Manage Inventory</title>
<link rel="stylesheet" href="css/manageinv_design.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}

.side-nav {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  width: 260px;
  background-color: #222;
  display: flex;
  flex-direction: column;
  text-decoration: none !important;
}

.side-nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  flex-grow: 1;
  text-decoration: none !important;
}

.side-nav li {
    display: flex; 
    padding: 10px; 
    padding-top: 15px;
    text-decoration: none !important;
  }


.side-nav li:hover{
  transform: scale(1.05);
  margin-left: 10px;
  background-color: #223651;
  color: #fff;
  text-decoration: none !important;
  }

.side-nav a {
  margin-left: 20px;
  font-size: 18px;
  display: block;
  color: #fff;
  text-decoration: none;
}

.side-nav li:first-child{
  margin-top: 10px;
}

.side-nav li:last-child{
  margin-top: 400px;
}

.logo {
  width: auto;
  height: 80px;
  padding: 4px;
  background:#223651;
  border-bottom: 6px solid #1f2d40;
}

.logo img {
  height: 70px;
  max-width: auto;
  padding-top: 4px;;
  padding-left: 10px;
  padding-bottom: 10px;
  margin-top: 4px;
  margin-left: 60px;
  margin-right: auto;
}

.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    

/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-header h4{
	text-align: center;
}
.modal .modal-title {
	display: inline-block;
	
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
	
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
.DeleteButton{
	display: flex;
	justify-content: center;
	align-items: center;
}
.DeleteButton .deletebutton{
	background-color: green;
	font-size: 30px;
	text-align: center;
	color: #ccc;
	width: 150px;
	height: 50px;
	border-radius: 4px;
}

</style>
</head>

<body>
	<nav class="side-nav">
		<div class="logo">
		  <img src="images/nav-logo.png" alt="Logo">
		</div>
		<ul>
			<li>
				<img src="images/HomeIcon.png" alt="Button" style="max-width: 30px; height: 30px;">
				<a href="u-dashboard.php">DASHBOARD</a>
			  </li>
			  
			  <li>
				<img src="images/InventoryIcon.png" alt="Button" style="max-width: 30px; height: 30px; padding:10;">
				<a href="u-view-inv.php">VIEW INVENTORY</a>
			  </li>
			  <li>
				<img src="images/InventoryIcon(manage).png" alt="Button" style="max-width: 30px; height: 30px; padding:10;">
				<a href="u-manageinv.php">MANAGE INVENTORY</a>
			  </li>
			  <li> <img src="images/LogOutIcon.png" alt="Button" style="max-width: 30px; height: 30px; padding:10;">
				<a href="logoutconf.php">LOGOUT</a>
			  </li>
		</ul>   
	  </nav>
  
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Inventory</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="u-manageinv.php" class="btn btn-danger" data-toggle="modal">X</a>
					</div>
				</div>
			</div>
				<div class="Deletecontainer">	
					<?php
						$sql = "SELECT * FROM  inventory
						LEFT JOIN inventory_stock ON inventory.Item_ID = inventory_stock.Item_ID
						WHERE inventory.Item_ID = $id LIMIT 1";
				
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
					?>	
					<form action="" method="post">
						<div class="modal-header">						
							<h4 class="modal-title">Edit Item</h4>
						</div>
						<div class="modal-body">					
						<div class="form-group">
								<label>Item Name</label>
								<input type="text" class="form-control" placeholder="Item name" name="Itemname" value="<?php echo $row['Item_name']?>">
							</div>
							<div class="form-group">
								<label>Description</label>
								<input type="textarea" class="form-control" placeholder="Description" name="description" value="<?php echo $row['Item_description']?>">
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $row['Item_price']?>">
							</div>		
							<div class="form-group">
								<label>Stock</label>
								<input type="text" class="form-control" placeholder="Stock" name="stock" value="<?php echo $row['Item_stock']?>">
							</div>
							<div class="form-group">
								<label>Incoming Stock</label>
								<input type="text" class="form-control" placeholder="Incoming Stock" name="Incstock" value="<?php echo $row['Incoming_stock']?>">
							</div>					
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-success" value="Save" name="save">
					</form>
				</div>
		</div>
	</div>
</div>
</body>
</html>