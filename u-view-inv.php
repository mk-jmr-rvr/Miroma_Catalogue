<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>[U] View Inventory</title>
<link rel="stylesheet" href="css/manageinv_design.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

#btnPrint{
  font-size: 14px;
  background: rgb(65, 109, 191);
  color: white;
  padding: 4px;
  border: 3px solid rgb(37, 40, 112);
  border-radius: .08rem;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 2px;
  transition: background .5s;
  margin-right: 2px;
  margin-left: 340px;
  width: 180px;
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
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
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
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
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
						<h2 style="">View <b>Inventory</b></h2>
                        </div>
                        <div class="col-sm-6 text-end">
						<input type="button" id="btnPrint" onclick="PrintTable();" value="Print"/>
                        </div>
						<style id="table_style" type="text/css">
							body
							{
								font-family: Arial;
								font-size: 10pt;
							}
							table
							{
								border: 1px solid #ccc;
								border-collapse: collapse;
							}
							table th
							{
								background-color: #F7F7F7;
								color: #333;
								font-weight: bold;
							}
							table th, table td
							{
								padding: 5px;
								border: 1px solid #ccc;
							}
						</style>
						<script type="text/javascript">
							function PrintTable() {
								var printWindow = window.open('', '', 'height=800,width=800');
								printWindow.document.write('<html><head><title>Table Contents</title>');
						
								//Print the Table CSS.
								var table_style = document.getElementById("table_style").innerHTML;
								printWindow.document.write('<style type = "text/css">');
								printWindow.document.write(table_style);
								printWindow.document.write('</style>');
								printWindow.document.write('</head>');
						
								//Print the DIV contents i.e. the HTML Table.
								printWindow.document.write('<body>');
								var divContents = document.getElementById("dvContents").innerHTML;
								printWindow.document.write(divContents);
								printWindow.document.write('</body>');
						
								printWindow.document.write('</html>');
								printWindow.document.close();
								printWindow.print();
							}
						</script>
					</div>				
				</div>
			</div>
			<div id="dvContents" >
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>ITEM NAME</th>
						<th>DESCRIPTION</th>
						<th>PRICE</th>
						<th>STOCK</th>
						<th>INCOMING STOCK</th>
					</tr>
				</thead>
				<form action="Php/deleteItem.inc.php">
					<tbody>
					
					<?php
							include "Php/dbh.inc.php";
							$sql = "SELECT * FROM  inventory
									LEFT JOIN inventory_stock ON inventory.Item_ID = inventory_stock.Item_ID";
							$result = mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($result)){
						?>

						<tr>
							<td><?php echo $row['Item_ID'] ?></td>
							<td><?php echo $row['Item_name'] ?></td>
							<td><?php echo $row['Item_description'] ?></td>
							<td><?php echo $row['Item_price'] ?></td>
							<td><?php echo $row['Item_stock'] ?></td>
							<td><?php echo $row['Incoming_stock'] ?></td>
						</tr>
			
						<?php
							}
						?>
						
					</tbody>
					</form>
				</table>
		</div>
	</div>   
</div>
</div>
</body>
</html>