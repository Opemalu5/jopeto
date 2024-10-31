<?php
	session_start();
?>

<html>
<head>
	<title>Purchase Order Form</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
            background-image: url("bcduserlog1.png");
			
		}

		.container {
			width: 400px;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 4px;
			background-color: #fff;
			box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
			background-color: #ecbc74;

		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #F9D9AA;
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

		.home-button {
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

	</style>
</head>
<body>
	<div class="container">
		<form action='' method='post'>
			<table>
				<tr>
					<td colspan='2'>Purchase Order Form</td>
				</tr>
				<tr>
					<td>Supplier</td>
					<td>
						<select name='supplier' class='select-box'>
							<?php
								$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server down please try again later");
								$qry = "SELECT supplierID, supplierName FROM suppliers";
								$result = @mysqli_query($con, $qry) or die("Can't execute the query");
								while($rec = @mysqli_fetch_array($result)){
									echo "<option value='".$rec['supplierID']."'>".$rec['supplierName']."</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
					<a class="home-button" href="purchasedetails.php"> Go > </a>
						<input type='submit' name='sub' value='Submit' />
						<input type='reset' name='clr' value='Clear' />
					</td>
				</tr>
			</table>
		</form>
		<?php
			if($_POST){
				$_SESSION['supplier'] = $_POST['supplier'];
				header("location:purchasedetails.php");
			}
		?>
	</div>
</body>
</html>
