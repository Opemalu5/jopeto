<!DOCTYPE html>
<html>
<head>
	<title>Search Supplier Record</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<style>
			@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

		body {
			background-color: #f2f2f2;
font-family: 'Diphylleia', serif;
background-image: url("fornew7.png");
        color: #904747;


			
		}
		
		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
			color: #904747;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
		}
		
		form {
			max-width: 500px;
			margin: 0 auto;
			background-color: none;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.90);
			text-align: center;
			
		}
		
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}
		
		select, input[type="text"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
			margin-bottom: 20px;
		}
		
		select {
			height: 40px;
		}
		
		input[type="submit"] {
			color: #fff;
		background-color: #69453a;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			transition: background-color 0.3s;
		}
		
		input[type="submit"]:hover {
			background-color: #603c32;
		}
		
		.error-message {
			color: #ff0000;
			font-size: 14px;
			margin-top: -10px;
			margin-bottom: 10px;
		}

		button{
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
		
	</style>
	<script>
		function validateForm() {
			var svalue = document.forms["searchForm"]["svalue"].value;
			if (svalue == "") {
				var errorMessage = document.getElementById("error-message");
				errorMessage.style.display = "block";
				return false;
			}
		}
	</script>



</head>
<body>
<div class="container">
		<h1>Search Items Record</h1>
		<form name="searchForm" action="view_item.php" method="post" onsubmit="return validateForm()">
			<div class="form-group">
				<label for="column">Search by:</label>
				<select id="column" name="column" class="form-control">
					<option value="itemID"> Item ID </option>
					<option value="itemName"> itemName </option>
					<option value="barcode"> barcode</option>
					<option value="pic"> picture </option>
					<option value="description"> description </option>
					<option value="packaging"> packaging </option>
					<option value="price"> price </option>
					<option value="supplier"> price </option>
					<option value="lastEditedBy"> last edited by </option>



				</select>
				</div>
			<div class="form-group">
				<label for="opt">Condition:</label>
				<select id="opt" name="opt" class="form-control">
					<option value="=">=</option>
					<option value="<"><</option>
					<option value=">">></option>
					<option value="<="><=</option>
					<option value=">=">>=</option>
					<option value="!="><></option>
				</select>
			</div>
			<div class="form-group">
				<label for="svalue">Search value:</label>
				<input type="text" id="svalue" name="svalue" class="form-control" />
				<div id="error-message" class="error-message" style="display:none;">Please enter a search value</div>
			</div>
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div>
</body>
</html>