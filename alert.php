<?php
session_start();

$db_host = "localhost";
$db_name = "shop";
$db_user = "root";
$db_password = "";

$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = :username AND password = :password";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['success_message'] = "Login successful!";
    $_SESSION['log']=1;

    $login_date = date("Y-m-d");
    date_default_timezone_set('Asia/Manila');
    $login_time = date("h:i:s A");
    $userID = $user['id'];
    $username = $user['username'];
    
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
    $stmt = $conn->prepare($qry);
    $stmt->execute();
    
    header("Location: home.php"); 
    exit();
  } else {
    $_SESSION['error_message'] = "Invalid username or password";
    header("Location: alert.php"); 
    exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
</head>
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
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.5s;
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
<body>
  <div class="container">
  <div class="logo"><h1>Pastry Shop</h1></div>
    <form method="post" action="">
      <div class="textbox">
        <label>User Name</label><br>
        <input id="username" type="text" name="username" placeholder="User Name" required><br><br>

        <label>Password</label><br>
        <input id="password" type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit" value="Login">Log in</button>
      <a href="admin.php">Choose or Sign Up Here </a><br><br>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.body.style.opacity = '0'; 
      document.querySelector('.container').style.opacity = '0'; 
    });

    window.addEventListener('load', function() {
      document.body.style.opacity = '1'; 
      document.querySelector('.container').style.opacity = '1'; 
    });

    <?php if(isset($_SESSION['success_message'])): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo $_SESSION['success_message']; ?>',
        showConfirmButton: false,
        timer: 3000
      });
      <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['error_message'])): ?>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '<?php echo $_SESSION['error_message']; ?>',
        showConfirmButton: false,
        timer: 3000
      });
      <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
  </script>
</body>
</html>
