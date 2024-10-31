<?php

session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['id'];
$qry ="Delete from users where id='".$sid."'";
@mysqli_query($con, $qry) or die ("Cant delete record");
header("location:search_supplier.php");
?>