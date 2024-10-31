<?php
session_start();

if (isset($_POST['itm']) && isset($_POST['qty'])) {
    $itm = $_POST['itm'];
    $qty = $_POST['qty'];
    
    $con = mysqli_connect("localhost", "root", "", "shop") or die("Server down, please try again later");
    date_default_timezone_set('Asia/Manila');
    $dt = date("Y-m-d");
    $qry = "INSERT INTO purchaseorder VALUES (NULL, '".$dt."', '".$_SESSION['supplierID']."')";
    mysqli_query($con, $qry) or die("Can't execute the query: " . mysqli_error($con));
    $pid = mysqli_insert_id($con);
    
    if (is_array($itm) && is_array($qty)) {
        $num = count($itm);
        
        for ($ctr = 0; $ctr < $num; $ctr++) {
            if ($itm[$ctr] == "none" && $qty[$ctr] == "") {
                break;
            }
            
            $qry = "INSERT INTO purchasedetails VALUES ('".$pid."', '".$itm[$ctr]."', '".$qty[$ctr]."')";
            mysqli_query($con, $qry) or die("Can't insert the record: " . mysqli_error($con));
        }
    }
    
    echo "Purchase orders were successfully recorded";
} else {
    echo "No items were selected for the purchase order";
}

?>
	