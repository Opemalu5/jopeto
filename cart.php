<?php 
session_start();

include('connections.php');
include('functions.php');

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
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


</style>


		
	</head>
	<body>
		<br />
		<div class="container"> 
			<br />
			<br />
			<br />
			
			<header>     
            <div>
            <h1 left><i>Pastry shop</i></h1> 
			
            </div>
            </header>
			
             <br><br>
            <h1 center>Your Cart</h1>

			<?php
				$query = "SELECT * FROM items ORDER BY itemID ASC";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

			<?php
					}
				}
			?>

			<div style="clear:both"></div>
			<br />
			<h3>In Cart</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Name of Product</th>
						<th width="10%">Qty</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td>  <?php echo $values["item_name"]; ?></td>
						<td>  <?php echo $values["item_quantity"]; ?></td>
						<td>₱ <?php echo $values["item_price"]; ?></td>
						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" right>Total</td>
						<td right>₱ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
                    
				</table>
			</div>

            <li><a href="index2.php"><button type="home" class="homebutton" style="height:40px; width:150px;">Back to Home</a></li>
            
		</div>
	</div>
	<br />
	</body>
</html>
