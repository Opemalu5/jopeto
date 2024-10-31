<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = @mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

    $supplierName = $_POST['supplierName'];
    $supplierPhone = $_POST['supplierPhone'];


    $qry = "SELECT * FROM suppliers WHERE supplierName = ? AND supplierPhone = ?";
    $stmt = mysqli_prepare($con, $qry);
    mysqli_stmt_bind_param($stmt, "ss", $supplierName, $supplierPhone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['supplierName'] = $supplierName;
        echo "Login successful. Welcome, " . $supplierName . "!";
        header("Location: supphome.php");

    } else {
        echo "Invalid supplier name or phone. Please try again.";
    }

    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Login Form</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" class="form-control" id="supplierName" name="supplierName" required>
            </div>
            <div class="form-group">
                <label for="supplierPhone">Supplier Phone:</label>
                <input type="text" class="form-control" id="supplierPhone" name="supplierPhone" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JX8jB1sEcsD/pLSc+tknakA4Z3ti0lZBk8e+nXQmik6"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUc8v+4FqnqgL5sPVHk5c9z0o4z4O73/biFF2pGywr7l2"
        crossorigin="anonymous"></script>
</body>
</html>
