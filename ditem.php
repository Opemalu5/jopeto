<?php

session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['id'];
$qry = "DELETE FROM items WHERE itemID = '".$sid."'";
@mysqli_query($con, $qry) or die ("Cant delete record");
header("location:searchitem.php");
?>