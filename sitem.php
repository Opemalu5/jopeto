<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shop");
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$sid = $_POST['sid'];
$qry = "SELECT itemID, itemName, barcode, pic, description, packaging, price FROM items WHERE itemID = '$sid'";
$record = mysqli_query($con, $qry) or die("Cannot extract record");

while ($rec = mysqli_fetch_array($record)) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Item Record</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            body {
                background-image: url("bcduserlog2.png");
            }

            .container {
                margin-top: 50px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1);
                padding: 30px;
            }

            .form-group label {
                font-weight: 600;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <form action="uitem.php" method="post">
            <input type='hidden' name='sid' value='<?php echo $rec['itemID']; ?>' />
            <div class="form-group">
                <label for="sname">Item Name:</label>
                <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $rec['itemName']; ?>">
            </div>
            <div class="form-group">
                <label for="barcode">Barcode:</label>
                <input type="text" class="form-control" id="barcode" name="barcode" value="<?php echo $rec['barcode']; ?>">
            </div>
            <div class="form-group">
                <label for="pic">Pic:</label>
                <input type="text" class="form-control" id="pic" name="pic" value="<?php echo $rec['pic']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $rec['description']; ?>">
            </div>
            <div class="form-group">
                <label for="packaging">Packaging:</label>
                <input type="text" class="form-control" id="packaging" name="packaging" value="<?php echo $rec['packaging']; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $rec['price']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
    </body>
    </html>

    <?php
}
mysqli_close($con);
?>
