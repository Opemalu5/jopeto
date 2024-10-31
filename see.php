<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shop") or die("Server is down");

// Retrieve items from the database
$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);

?>

<html>
<head>
    <title>View Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>View Items</h1>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Barcode</th>
            <th>Picture</th>
            <th>Description</th>
            <th>Packaging</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Last Edited By</th>
            <th>Last Edited On</th>
        </tr>
        <?php
        // Display items in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['itemName']."</td>";
            echo "<td>".$row['barcode']."</td>";
            echo "<td><img src='".$row['pic']."' width='100' height='100'></td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['packaging']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['supplier']."</td>";
            echo "<td>".$row['lastEditedBy']."</td>";
            echo "<td>".$row['lastEditedOn']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
