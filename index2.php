<?php 
session_start();
include('connections.php');
include('functions.php');


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;

			echo '<script>alert("Item Added to Cart")</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);

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
  background-image: url("cartimg2.png");
font-family:  Century, serif;
font-style: normal;
font-size: 20px;
text-align: center;
padding-top: 215px;


}

h1{
color: #69453a;
font-size: 50px;
font-family:  inherit;
font-style:bold;

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
  height: 30px; */
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


button {
    padding: 1px 40px;
    background: none;
    outline: none;
    border: 2px solid rgb(255, 255, 255);
    border-radius: 50px;
    color: rgb(99, 45, 45);
    margin-top: 0px;
    cursor: pointer;
    
  }



header{
  text-align: center;

  
}

  
  
  
  header nav {
    display: flex;
    justify-content: space-between;
    
  }
  

  
  header ul li a:hover {
    color: #C1B086;
    text-decoration:none;
  }



  
  header ul li {
    margin-left: 2rem;
  }
  
  header ul li a {
    font-size: 3rem;
    font-weight: 400;
    color: #69453a;
    transition: 0.5s;
  }
  
 



  
  

</style>


		
	</head>
	<body>

	<header class="header">
			 
        <div class="container">
          <nav>
            
            <ul class="nav-menu">

            <li><a href="home.php"><button type="home" class="nav-link" style= "text-decoration: none"  >Home</a></li>
              <li><a href="cart.php"><button type="home" class="nav-link" style= "text-decoration: none" >Cart</a></li>
      

            </ul>
            

          </nav>
        </div>

      
        <br>


        
      
      </header>
      		

			<?php
$con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-3">';
    echo '<br>';
    echo '<form method="post" action="index2.php?action=add&id=' . $row["itemID"] . '">';
    echo '<div style="border:2px solid #333; background-color:#FDCD87; border-radius:50px; padding:30px;">';
    echo '<img style="width: 200px; height: 250px;" src="' . $row["pic"] . '" class="img-responsive" /><br/>';
    echo '<h4 class="text-info">' . $row["itemName"] . '</h4>';
    echo '<h4 class="text-danger">₱ ' . $row["price"] . '</h4>';
    echo '<input type="text" name="quantity" value="1" class="form-control" />';
    echo '<input type="hidden" name="hidden_name" value="' . $row["itemName"] . '" />';
    echo '<input type="hidden" name="hidden_price" value="' . $row["price"] . '" />';
    echo '<input type="submit" name="add_to_cart" style="margin-top:5px; background-color:#ffc3a0; border:2px solid #333;" class="btn btn-success" value="Add to Cart" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
  }
} else {
  echo "No items found in the database.";
}

mysqli_close($con);
?>




      
			
            
	</div>
	</div>
  <br><br>
  <br><br>
  <br><br>

	


          


	  

	</body>

 


</html>
