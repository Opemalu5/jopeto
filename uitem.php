<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shop");
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$sid = $_POST['sid'];
$itemName = $_POST['sname'];
$barcode = $_POST['barcode'];
$pic = $_POST['pic'];
$description = $_POST['description'];
$packaging = $_POST['packaging'];
$price = $_POST['price'];

$qry = "UPDATE items SET itemName=?, barcode=?, pic=?, description=?, packaging=?, price=? WHERE itemID=?";
$stmt = mysqli_prepare($con, $qry);
mysqli_stmt_bind_param($stmt, "ssssssi", $itemName, $barcode, $pic, $description, $packaging, $price, $sid);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Record was successfully updated";
} else {
    echo "No changes were made to the record";
}

mysqli_close($con);
?>
