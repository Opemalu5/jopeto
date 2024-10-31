<?php

session_start();
$con = @mysqli_connect("localhost", "root", "", "shop") or die ("Server is down");
$sid = $_POST['sid'];
$username = $_POST['sname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$url = $_POST['url'];
$date = date("Y-m-d H:i:s");
$qry = "UPDATE users SET username='".$username."', address='".$address."',
phone_number='".$phone."', url='".$url."', date='".$date."' WHERE id='".$sid."'";
@mysqli_query($con, $qry) or die ("Can't update record");
echo "Record was successfully updated";

?>
