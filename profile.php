<?php
session_start();

// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Connect to the database

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "shop";
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Get the user's details from the database
$userID = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$userID'";
$result = mysqli_query($conn, $query);
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    .profile {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .profile-image {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
    }

    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .profile-details {
      margin-left: 20px;
    }

    .profile-details p {
      margin: 5px 0;
    }

    .logout {
      text-align: center;
      margin-top: 20px;
    }

    .logout button {
      background-color: #904747;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>User Profile</h1>
    <div class="profile">
      <div class="profile-image">
        <img src="profile-picture.jpg" alt="Profile Picture">
      </div>
      <div class="profile-details">
        <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
        <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
      </div>
    </div>
    <div class="logout">
      <button onclick="logout()">Logout</button>
    </div>
  </div>

  <script>
    function logout() {
      // Add your logout logic here
      alert('Logged out successfully');
    }
  </script>
</body>

</html>
