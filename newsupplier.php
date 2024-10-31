<?php
session_start();

$con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

$supplier = $_POST['supplier'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$URL = $_POST['url'];
$date = date("Y-m-d H:i:s");

$qry = "INSERT INTO suppliers (supplierName, supplierAddress, supplierPhone, supplierURL, lastEditedby, lasteditedOn)
        VALUES ('".$supplier."', '".$address."', '".$phone."', '".$URL."','".$_SESSION['supplierID']."', '".$date."')";

@mysqli_query($con, $qry) or die("Can't execute query");
echo "Record successfully added";
?>
