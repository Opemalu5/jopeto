<?php
session_start();

$column = $_POST['column'];
$opt = $_POST['opt'];
$svalue = $_POST['svalue'];

$con = mysqli_connect("localhost", "root", "", "shop");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$qry = "SELECT itemID, itemName, barcode, pic, description, packaging, price, supplier, lastEditedBy FROM items WHERE $column $opt ?";

$stmt = mysqli_prepare($con, $qry);
mysqli_stmt_bind_param($stmt, "s", $svalue);
mysqli_stmt_execute($stmt);
$records = mysqli_stmt_get_result($stmt);

mysqli_close($con);
?>


<html>

<head>
    <title>View Item Records</title>
    <script>
        function askUser() {
            return confirm("Are you sure you want to delete this item record?");
        }
    </script>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: brown;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: burlywood;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>ItemID</th>
            <th>ItemName</th>
            <th>Barcode</th>
            <th>Image</th>
            <th>Description</th>
            <th>Packaging</th>
            <th>Price</th>
            <th>Action</th>
            <th>Last Edited By</th>

        </tr>

        <?php
        while ($rec = mysqli_fetch_array($records)) {
            echo "<tr>";
            echo "<td>" . $rec['itemID'] . "</td>";
            echo "<td>" . $rec['itemName'] . "</td>";
            echo "<td>" . $rec['barcode'] . "</td>";
            echo "<td><img src='" . $rec['pic'] . "' width='100' height='100'></td>";
            echo "<td>" . $rec['description'] . "</td>";
            echo "<td>" . $rec['packaging'] . "</td>";
            echo "<td>" . $rec['price'] . "</td>";
            echo "<td>" . $rec['supplier'] . "</td>";
            echo "<td>" . $rec['lastEditedBy'] . "</td>";

             

            echo "<td>
                <form action='sitem.php' method='post'>
                    <input type='hidden' name='sid' value='" . $rec['itemID'] . "'>
                    <button type='submit' class='btn-edit'>Edit</button>
                </form>
                <form action='ditem.php' onSubmit='return askUser();' method='post'>
                    <input type='hidden' name='id' value='" . $rec['itemID'] . "'>
                    <button type='submit' class='btn-delete'>Delete</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
