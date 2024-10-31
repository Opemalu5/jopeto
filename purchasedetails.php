<?php
	session_start();
?>
<html>
<head>
	<title>Purchase Order Details</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

		body {
			font-family: 'Diphylleia', serif;
			background-image: url("bcduserlog.png");
		}

		.container {
			width: 600px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 4px;
			background-color: #F9D9AA;
			box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid black;
		}

		tr:hover {
			background-color: #edac4c;
		}

		h3 {
			margin: 0;
			padding: 0;
		}

		.btn-container {
			text-align: center;
		}

		input[type="submit"], input[type="reset"] {
			background-color: #ee9716;
			color: white;
			border: none;
			padding: 15px 15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			border-radius: 100px;
			cursor: pointer;
			border-bottom: 3px solid black;

		}

		.select-box {
			width: 100%;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 14px;
			background-color: #ecbc74;
		}

		.select-box option {
			font-size: 14px;
			background-color: #F9D9AA;
		}

		.box {
			background-color: #F9D9AA;
			font-size: 14px;
			border: 1px solid #ccc;
			width: 100%;
			padding: 6px 12px;
			box-sizing: border-box;
			font-family: 'Diphylleia', serif;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server down please try again later");
			$qry = "Select * from suppliers where supplierID='".$_SESSION['supplier']."'";
			$result = @mysqli_query($con, $qry) or die ("Can't execute the query");
			echo "<table>";
			while($rec=@mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>Supplier</td>";
				echo "<td>".$rec['supplierName']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Supplier Address</td>";
				echo "<td>".$rec['supplierAddress']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Supplier Phone</td>";
				echo "<td>".$rec['supplierPhone']."</td>";
				echo "</tr>";
				$_SESSION['supplierID']=$rec['supplierID'];
				$_SESSION['supplierName']=$rec['supplierName'];
				$_SESSION['supplierAddress']=$rec['supplierAddress'];
				$_SESSION['supplierPhone']=$rec['supplierPhone'];
			}
			echo "</table>";
			echo "<table>";
			echo "<tr>";
			echo "<td colspan='3'><h3>Order Detail</h3></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>No.</td>";
			echo "<td>Item</td>";
			echo "<td>Quantity</td>";
			echo "</tr>";
			echo "<form action='neworder.php' method='post' />";
			$ctr = 0;
			while($ctr <10) {
				$qry = "Select * from items where supplier='".$_SESSION['supplierID']."'";
				$result = @mysqli_query($con, $qry) or die ("Can't execute the query");
				echo "<tr>";
				echo "<td>".($ctr + 1)."</td>";
				echo "<td><select name='itm[".$ctr."]' class='select-box'>";
				echo "<option value='none'>--- Select the item to order ---</option>";
				while($rec=@mysqli_fetch_array($result)){
					echo "<option value='".$rec['itemID']."'>".$rec['itemName']."</option>";
				}
				echo "</select></td>";
				echo "<td><input type='text' class='box' name='qty[".$ctr."]' /></td>";
				echo "</tr>";
				$ctr++;
			}
			echo "<tr>";
			echo "<td colspan='3' class='btn-container'>";
			echo "<input type='submit' value='Submit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Clear'>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
		?>
	</div>
</body>
</html>
