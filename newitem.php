<?php

session_start();

if ((is_uploaded_file($_FILES['myphoto']['tmp_name'])) && ($_FILES['myphoto']['size'] <= 819200) && (($_FILES['myphoto']['type'] == 'image/jpeg') || ($_FILES['myphoto']['type'] == 'image/jpg') || ($_FILES['myphoto']['type'] == 'image/pjpeg') || ($_FILES['myphoto']['type'] == 'image/gif') || ($_FILES['myphoto']['type'] == 'image/png'))) {

    $target = "allphotos/" . basename($_FILES['myphoto']['name']);

    if (move_uploaded_file($_FILES['myphoto']['tmp_name'], $target)) {

        $item = $_POST['item'];
        $barcode = $_POST['barcode'];
        $pic = $target;
        $description = $_POST['description'];
        $packaging = $_POST['packaging'];
        $price = $_POST['price'];
        $supplier = $_POST['supplier'];
        $date = date("Y-m-d H:i:s");

        $con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

        $qry = "INSERT INTO items (itemName, barcode, pic, description, packaging, price, supplier, lastEditedBy, lastEditedOn) 
                VALUES ('$item', '$barcode', '$pic', '$description', '$packaging', '$price', '$supplier', '".$_SESSION['supplierID']."', '$date')";

        $result = mysqli_query($con, $qry);
        if (!$result) {
            die("Error: " . mysqli_error($con));
        } else {
            echo "Record was successfully added";
        }

    }
}

?>
