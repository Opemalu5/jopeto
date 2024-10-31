<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<?php 
session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
	
	
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
	
			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
	
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
	
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
	
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
				 echo "Wrong username or password!";
		}
		
		else
		{
			echo "Wrong username or password!";
		}
	}
	?>



<!DOCTYPE html>
<html>
<title>Log In-IMH Iphone Gadgets and Accessories</title>
<head>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body  {
  font-family: Garamond,  serif;	
  background-image: url("https://i.pinimg.com/originals/85/6f/31/856f31d9f475501c7552c97dbe727319.jpg");
  text-align: center;
  font-size: 20px;

font-family: 'Inter';
font-style: normal;
}

li {
  display: inline;
}

header {
    text-align: center;
    font-size: 25px;
}
</style> 

</head>
<body>
            <div id="logo"><h1>IMH Iphone Gadgets and Accessories</h1></div>

		    <form method="post">

		    <h2>Log-in</h2>  
			
			<label> User Name</label> <br>
			<input id="text" type="text" name="user_name" placeholder="User Name"><br><br>

			<label> Password</label><br>
			<input id="password" type="password" name="password" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">No Account? Sign Up Here</a><br><br>

</form>
</body>
</html>

