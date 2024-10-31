<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "shop";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $customerPrice = $_POST['customer_price'];

    $stmt = $conn->prepare("SELECT itemID, stockOnHand, price FROM items WHERE itemName = ?");
    $stmt->bind_param("s", $itemName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $itemID = $row['itemID'];
        $stockOnHand = $row['stockOnHand'];
        $supplierPrice = $row['price'];

        if ($quantity <= $stockOnHand) {
            $totalPrice = $quantity * $customerPrice;

            $newStockOnHand = $stockOnHand - $quantity;
            $updateStmt = $conn->prepare("UPDATE items SET stockOnHand = ? WHERE itemID = ?");
            $updateStmt->bind_param("ii", $newStockOnHand, $itemID);
            $updateStmt->execute();

            $insertStmt = $conn->prepare("INSERT INTO transactions (itemID, quantity, totalPrice) VALUES (?, ?, ?)");
            $insertStmt->bind_param("iid", $itemID, $quantity, $totalPrice);
            $insertStmt->execute();

            echo "Transaction completed successfully.";
        } else {
            echo "Insufficient stock on hand. Please adjust the quantity.";
        }
    } else {
        echo "Item not found.";
    }
}

$conn->close();
?>

<html>
<head>
    <title>Customer Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            height: 40px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Customer Transaction</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" />
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" />
        </div>
        <div class="form-group">
            <label for="customer_price">Customer Price:</label>
            <input type="text" id="customer_price" name="customer_price" />
        </div>
        <div class="form-group">
            <input type="submit" value="Process Transaction">
            <input type="reset" value="Clear">
        </div>
    </form>
</body>
</html>
