<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page or handle the case when the user is not logged in
    header("Location: login.php");
    exit();
}

// Store the logout date and time in session variables
date_default_timezone_set('Asia/Manila');
$logout_date = date("Y-m-d");
$logout_time = date("h:i:s A");

// Insert logout information into userlogs table
$con = mysqli_connect("localhost", "root", "", "shop");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID based on the logged-in username
$username = $_SESSION['username'];
$query = "SELECT id FROM users WHERE username = '$username' LIMIT 1";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $userID = $user_data['id'];

    $qry = "UPDATE userlogs SET logoutDate = '$logout_date', logoutTime = '$logout_time' WHERE userID = '$userID' AND logoutDate IS NULL AND logoutTime IS NULL";
    if (mysqli_query($con, $qry)) {
        // Logout successful
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "User not found!";
}

mysqli_close($con);
?>
