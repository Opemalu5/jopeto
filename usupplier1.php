<?php

session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['sid'];
$username = $_POST['sname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$url = $_POST['url'];
$date = date("Y-m-d H:i:s");
$qry = "UPDATE suppliers SET supplierName='".$username."', supplierAddress='".$address."',
supplierPhone='".$phone."', supplierURL='".$url."', lastEditedOn='".$date."' WHERE supplierID='".$sid."'";
@mysqli_query($con, $qry) or die ("Can't update record");
echo "Record was successfully updated";

?>
