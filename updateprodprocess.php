<?php
//john
include ('connections.php');

if(count($_POST)>0) {
mysqli_query($con,"UPDATE imhproducts set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', image='" . $_POST['image'] . "', price='" . $_POST['price'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";

}
$result = mysqli_query($con, "SELECT * FROM imhproducts WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>



<html>

<title>Change product Information</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
body{
  background-image: url("https://i.pinimg.com/originals/85/6f/31/856f31d9f475501c7552c97dbe727319.jpg");
font-family:  Century, serif;
font-style: normal;
font-size: 20px;

}

li {
  display: inline;
}

* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 35%;
  padding: 10px;
  height: 300px; */
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


header {
    text-align: center;
	font-size: 50px;
}

marquee {
    text-align: center;

}


</style>

<head>

</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>
id: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>
Name of product: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
Image:<br>
<input type="text" name="image" class="txtField" value="<?php echo $row['image']; ?>">
<br>
Price:<br>
<input type="text" name="price" class="txtField" value="<?php echo $row['price']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Submit" class="button">

<br><br>
<li><a href="index2.php"><button type="home" class="homebutton" style="height:40px; width:200px;">Go to homepage</a></li>
<li><a href="updateprod.php"><button type="home" class="homebutton" style="height:40px; width:200px;">Product List</a></li>


</form>
</body>
</html>