<?php
//john
include ('connections.php');

?>

<!DOCTYPE html>
<html>

<title>Update product</title>
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

.button {
border-radius: 10px;
font-size: 50px;
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
   
   <link rel="stylesheet" href="style.css">
 </head>
 
<body>

			<header>     
            <div>
			<i>Pastry Shop</i>
            </div>
            </header>
            <marquee width="60%" direction="left" scrollamount="12" height="30px">Welcome
            </marquee>
			
</header>
<?php

$result = mysqli_query($con,"SELECT * FROM imhproducts");

if (mysqli_num_rows($result) > 0) {
?>

<br><br>
<table border="10">
Product View
	  <tr>
	    <td>ID</td>
		<td>Name of Product</td>
		<td>Image</td>
		<td>Price</td>
		<td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["image"]; ?></td>
		<td><?php echo $row["price"]; ?></td>
		<td><a href="updateprodprocess.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
//john
?>
<br><br>
<li><a href="index2.php"><button type="home" class="homebutton" style="height:40px; width:200px;">Go to homepage</a></li>

 </body>
</html>