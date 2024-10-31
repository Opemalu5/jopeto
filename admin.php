<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "shop";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['log'] = 1;
        

        header('Location: try.php');
        exit();
    } else {
        echo '<script>alert("Wrong Username or Password")</script>';
    }
}

if (isset($_POST['supplierName']) && isset($_POST['supplierPhone'])) {
    $supplierName = $_POST['supplierName'];
    $supplierPhone = $_POST['supplierPhone'];

    $stmt = $conn->prepare("SELECT * FROM suppliers WHERE supplierName = ? AND supplierPhone = ?");
    $stmt->bind_param("ss", $supplierName, $supplierPhone);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['supplierName'] = $supplierName;
        $_SESSION['log'] = 1;

        header('Location: supphome.php');
        exit();
    } else {
        echo '<script>alert("Wrong Username or Password")</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');
        body {
            font-family: Arial, sans-serif;
            background-image: url("bcgd7.png");
            color: #fff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }
        
        .container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background: rgb(247,209,153);
            background: linear-gradient(0deg, rgba(247,209,153,0.6993172268907564) 170%,
            rgba(192,165,121,0.7413340336134453) 179%);     
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            color:#904747;

        }
        
        /*----.container {
    
        max-width: 400px;
        margin: 0 auto;
    }---*/


        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color:#904747;
            

        }
        
        .profile {
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s;
            font-family: 'Diphylleia', serif;
        }
        
        .profile img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid transparent;
            transition: border-color 0.3s;
        }
        
        .profile span {
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }
        
        .profile:hover {
            transform: scale(1.05);
        }
        
        .profile:hover img {
            border-color: #904747;
        }

     .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.3s;
    }

    .overlay.active {
        visibility: visible;
        opacity: 1;
    }

    .login-form {
        display: flex;
            flex-direction: column;
            align-items: center;
            text-align:center;
            justify-content: center;
           background: rgb(249,210,151);
background: linear-gradient(0deg, rgba(249,210,151,0.80015756302521) 170%, rgba(242,149,4,0.7413340336134453) 179%);
            width: 300px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            color:#904747;
            font-family: 'Diphylleia', serif;


    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

   

    .form-message {
        color: red;
        font-size: 14px;
        text-align: center;
    }


    .form-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f9d297;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #f1a022;
        }


        .profile {
        transition: transform 0.3s;
    }

    .profile:hover {
        transform: scale(1.05);
    }

    .login-form {
        transform: scale(1);
        opacity: 1;
    }
    h2{
        font-family: 'Diphylleia', serif;
    }

   
    .login-form2 {
        display: flex;
            flex-direction: column;
            align-items: center;
            text-align:center;
            justify-content: center;
           background: rgb(249,210,151);
background: linear-gradient(0deg, rgba(249,210,151,0.80015756302521) 170%, rgba(242,149,4,0.7413340336134453) 179%);
            width: 300px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            color:#904747;
            font-family: 'Diphylleia', serif;


    }

    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">What is Your Role?</h2>
        <div class="profile" onclick="selectProfile(1)">
            <img src="user1.png" alt="Profile 1">
            <span> Admin </span>
        </div>
        <div class="profile" onclick="selectProfile(2)">
            <img src="supplier.png" alt="Profile 2">
        
            <span> Suppliers </span>
        </div>
        <div class="profile" onclick="selectProfile(3)">
            <img src="user.png" alt="Profile 3">
            
            <span> User </span>
        </div>
    </div>





<div class="overlay" id="loginFormOverlay">
        <div class="login-form">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="form-message">
                <?php
                if (isset($_GET['error'])) {
                    echo "Invalid username or password.";
                }
                ?>
            </div>
        </div>
    </div>



    <div class="overlay" id="loginFormOverlay2">
        <div class="login-form2">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="supplierName">Username:</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                </div>
                <div class="form-group">
                    <label for="supplierPhone">Password:</label>
                    <input type="password" id="supplierPhone" name="supplierPhone" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="form-message">
                <?php
                if (isset($_GET['error'])) {
                    echo "Invalid username or password.";
                }
                ?>
            </div>
        </div>
    </div>



    <script>
        function selectProfile(profileId) {
            if (profileId === 1) {
                showLoginForm();
            } else if (profileId === 2) {
                showLoginForm2();
            } else if (profileId === 3) {
                window.location.href = "signup2nd.php"; 
            }
        }

        function showLoginForm() {
            var overlay = document.getElementById('loginFormOverlay');
            overlay.classList.add('active');
        }

        function showLoginForm2() {
            var overlay = document.getElementById('loginFormOverlay2');
            overlay.classList.add('active');
        }
    </script>
</body>
</html>
