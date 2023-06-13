<!DOCTYPE html>
<html>
  <head>
    <title> Miroma </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/addItem_design.css">
  </head>
  <body>
    <h1> Add Users </h1> 
    <div class="container">
      <form action="Php/addUsers.inc.php" method="post">
        <input type="text" placeholder="ID" name="ID">
        <input type="text" placeholder="Item name" name="Itemname">
        <input type="text" placeholder="Description" name="description">
        <input type="text" placeholder="Price" name="price">
        <input type="text" placeholder="Stock" name="stock">
        <input type="text" placeholder="Incoming Stock" name="Instock">
        <button type="submit"name="create">Create</button>  
        <button type="submit"name="cancel">Cancel</button>      
      </form>
    </div>
 
   <div class="notification">
     
   
    
  </div>
  </body>
</html>
