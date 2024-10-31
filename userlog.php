<?php
session_start();
date_default_timezone_set('Asia/Manila');
$logout_date = date("Y-m-d");
$logout_time = date("H:i:s");
$con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

$id = $_SESSION['users'] ?? '';

$qry = "INSERT INTO userlogs (userID, loginDate, loginTime, logoutDate, logoutTime, lastEditedBy, lastEditedOn)
        VALUES (
          (SELECT userID FROM usersprofile WHERE userName = '".$userID."'),
          '".$_SESSION['login_date']."',
          '".$_SESSION['login_time']."',
          '".$logout_date."',
          '".$logout_time."',
          1,  -- Set the appropriate value for lastEditedBy
          CURRENT_TIMESTAMP
        )";
@mysqli_query($con, $qry) or die("Can't execute query");

session_destroy();
header("location: login.php");
?>
