<?php
session_start();
?>
<html>
<head>
<title>Add Item to Inventory</title>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-size: 18px;
  margin-bottom: 5px;
}

input[type="text"],
select {
  width: 100%;
  height: 40px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="file"] {
  margin-top: 10px;
}

input[type="submit"],
input[type="reset"] {
  display: inline-block;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
}
h1{
  text-align: center;
  color: #904747;
            font-size: 40px;
}
</style>
</head>
<body>
  <div class="container">
    <form action="newitem.php" method="post" enctype="multipart/form-data">
      <h1>Add New Item</h1>
      <div class="form-group">
        <label for="item">Item Name:</label>
        <input type="text" id="item" name="item" />
      </div>
      <div class="form-group">
        <label for="barcode">Barcode:</label>
        <input type="text" id="barcode" name="barcode" />
      </div>
      <div class="form-group">
        <label for="myphoto">Picture:</label>
        <input type="file" id="myphoto" name="myphoto" />
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" />
      </div>
      <div class="form-group">
        <label for="packaging">Packaging:</label>
        <input type="text" id="packaging" name="packaging" />
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" />
      </div>
      <div class="form-group">
        <label for="supplier">Supplier:</label>
        <select id="supplier" name="supplier">
          <?php
          $con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");
          $qry = "SELECT supplierID, supplierName FROM suppliers";
          $record = @mysqli_query($con, $qry) or die("Can't execute the query");
          while ($rec = @mysqli_fetch_array($record)) {
            echo "<option value='" . $rec['supplierID'] . "'>" . $rec['supplierName'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
        <input type="reset" value="Clear">
      </div>
    </form>
  </div>
</body>
</html>
