<?php

session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['id'];
$qry = "DELETE FROM suppliers WHERE supplierID = '".$sid."'";
@mysqli_query($con, $qry) or die ("Cant delete record");
header("location:search_supplier1.php");
?>