<?php
session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['sid'];
$qry = "SELECT id, username, password, date, address, phone_number, url  FROM users WHERE id='".$sid."'";
$record = @mysqli_query($con, $qry) or die ("Cannot extract record");
while($rec = @mysqli_fetch_array($record)){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Supplier Record</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		  		@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

body {
background-image: url("bcduserlog2.1.png");
			font-family: 'Diphylleia', serif;

}

.container {
  max-width: 500px;
margin: 0 auto;
background-color: none;
padding: 30px;
border-radius: 10px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.90);
text-align: center;

}

.form-group label {
	font-weight: 600;
	font-size: 16px;
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
</head>
<body>
	<div class="container">
		<form action="usupplier.php" method="post">
			<input type='hidden' name='sid' value='<?php echo $rec['id']; ?>' />
			<div class="form-group">
				<label for="sname">Supplier Name:</label>
				<input type="text" class="form-control" id="sname" name="sname" value="<?php echo $rec['username']; ?>">
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<input type="text" class="form-control" id="address" name="address" value="<?php echo $rec['address']; ?>">
			</div>
			<div class="form-group">
				<label for="phone">Phone:</label>
				<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $rec['phone_number']; ?>">
			</div>
			<div class="form-group">
				<label for="url">URL:</label>
				<input type="text" class="form-control" id="url" name="url" value="<?php echo $rec['url']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-secondary">Reset</button>
		</form>
	</div>
</body>
</html>

<?php
}
?>
