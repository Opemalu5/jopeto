<!DOCTYPE html>
<html lang="en">

<head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

  
  body  {
  font-family:serif;	
  background-image: url("bcgdss.png");
    background-size: cover;
  color:#db6119;
  }
    
form {
  display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgb(247,209,153);
background: linear-gradient(0deg, rgba(247,209,153,0.6993172268907564) 100%, rgba(247,209,153,0.6993172268907564) 100%, rgba(249,196,118,0.7525385154061625) 188%);
            width: 300px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            color:#db6119;
            font-family: 'Diphylleia', serif;

        }



        input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ccc;
  transition: 0.5s;
}
input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
  border-bottom: 2px solid #2ecc71;
}


  .container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}
input[type=submit] {
  background-color: #904747;
			color: white;
			border: none;
			padding: 15px 15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			border-radius: 100px;
			cursor: pointer;
			border-bottom: 5px solid black;
  font-family: 'Diphylleia', serif;

}

input [type=submit]:hover {
            background-color: #db6119;
}
</style>



</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
           $address = $_POST["address"];
		   $phone_number = $_POST["phone_number"];
			$url = $_POST["url"];
           
           $passHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($username) || empty($password) || empty($address) || empty($phone_number) || empty($url)) {
            array_push($errors, "Fields are required");
        }

           if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if (strlen($phone_number)<11) {
            array_push($errors,"phone must be at least 11 charactes long");
           }
           
           require_once "connections.php";


		   

           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (username, password, phone_number, address, url) VALUES (?, ?, ?, ?, ?)";
           
            $stmt = mysqli_stmt_init($con);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sssss",$username, $password, $phone_number, $address, $url );
                mysqli_stmt_execute($stmt);
                echo '<script>alert("You are Registered Successfully")</script>';
               
                
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>  
        <div class="container">

        <form action="signup2nd.php" method="post">



            
                <label for="text"><b>Email</b></label>
                <input type="text" class="form-control" name="username" placeholder="Email:" size="50">
                <label for="password"><b>password</b></label>
                <input type="password" class="form-control" name="password" placeholder="Password: " size="50">
                <label for="text"><b>Address</b></label>
                <input type="text" class="form-control" name="address" placeholder="address: " size="50">
            
                <label for="text"><b>Phone number</b></label>
                <input type="text" class="form-control" name="phone_number" placeholder="phone: " size="50">
                <label for="text"><b>URL/Link</b></label>
                <input type="text" class="form-control" name="url" placeholder="url: " size="50">
                
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
    </div>

    <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleIcon = document.querySelector(".toggle-password");
      
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.innerHTML = "&#128064;"; 
      } else {
        passwordInput.type = "password";
        toggleIcon.innerHTML = "&#128065;"; 
      }
    }
  </script>

</body>
</html>