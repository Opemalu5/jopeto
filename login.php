<?php
session_start();
include("connections.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        

        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['username'] = $user_data['username'];

                    $login_date = date("Y-m-d");
                    date_default_timezone_set('Asia/Manila');
                    $login_time = date("h:i:s A");
                    $userID = $user_data['id'];
                    $username = $user_data['username'];
                    $_SESSION['log']=1;
                    $qry = "INSERT INTO userlogs (username, userID, loginDate, loginTime, logoutDate, logoutTime, lastEditedOn)
                            VALUES (
                                '$username',
                                '$userID',
                                '$login_date',
                                '$login_time',
                                NULL,
                                NULL,
                            
                                ''
                            )";
                    mysqli_query($con, $qry) or die("Can't execute query");

                    header("Location: home.php");

                    die;
                }
                
            }

        }

        echo '<script>alert("Wrong Username or Password")</script>';
        
    } else {
        echo '<script>alert("Missing Fields")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<title>Pastry shop</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

        body  {
            font-family: 'Diphylleia', serif;;
            background-image: url("bg1.png");
            text-align: center;
            font-size: 20px;
            background-size: cover;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
           background: rgb(249,210,151);
background: linear-gradient(0deg, rgba(249,210,151,0.80015756302521) 170%, rgba(242,149,4,0.7413340336134453) 179%);
            width: 300px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            color:#904747;
        }

        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 20px;
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

        button[type=submit] {
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

        
        button [type=submit]:hover {
            background-color: white;
        }

        .container .logo {
            color: #904747;
            font-size: 40px;
            
        }


body {
  opacity: 1;
  transition: opacity 0.5s ease-in-out;
}

.container {
  opacity: 0;
  transform: translateY(20px);
  animation: fade-in 0.5s forwards, slide-up 0.5s forwards;
}

@keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slide-up {
  from {
    transform: translateY(20px);
  }
  to {
    transform: translateY(0);
  }
}
body {
    transition: opacity 1.5s ease-in-out;
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"><h1>Pastry Shop</h1></div>
        <form method="post">
            <div class="textbox">
                <label> User Name</label> <br>
                <input id="text" type="text" name="username" placeholder="User Name" value=""><br><br>

                <label> Password</label><br>
                <input id="password" type="password" name="password" placeholder="Password" value="">
            </div>

            <button type="submit" value="Login">Log in</button>
            
            <a href="admin.php">Choose or Sign Up Here </a><br><br>
            
        </form>
    </div>






    <script>
        document.addEventListener('DOMContentLoaded', function() {
  document.body.style.opacity = '0';
  document.querySelector('.container').style.opacity = '0'; 
});

window.addEventListener('load', function() {
  document.body.style.opacity = '1'; 
  document.querySelector('.container').style.opacity = '1'; 
});

    </script>
</body>
</html>
