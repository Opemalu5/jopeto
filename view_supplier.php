<?php
session_start();

$column = $_POST['column'];
$opt = $_POST['opt'];
$svalue = $_POST['svalue'];

$con = mysqli_connect("localhost", "root", "", "shop");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$qry = "SELECT id, username, password, date, address, phone_number, url  FROM users WHERE $column $opt ?";

$stmt = mysqli_prepare($con, $qry);
mysqli_stmt_bind_param($stmt, "s", $svalue);
mysqli_stmt_execute($stmt);
$records = mysqli_stmt_get_result($stmt);

mysqli_close($con);
?>

<html>

<head>
    <title>View Supplier Record</title>
    <script>
        function askUser() {
            return confirm("Are you sure you want to delete this supplier record?");
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
            <th>id</th>
            <th>username</th>
            <th>date</th>
            <th>address</th>
            <th>phone_number</th>
            <th>url</th>
            <th>Action</th>
        </tr>

        <?php
        while ($rec = mysqli_fetch_array($records)) {
            echo "<tr>";
            echo "<td>" . $rec['id'] . "</td>";
            echo "<td>" . $rec['username'] . "</td>";
            echo "<td>" . $rec['date'] . "</td>";
            echo "<td>" . $rec['address'] . "</td>";
            echo "<td>" . $rec['phone_number'] . "</td>";
            echo "<td>" . $rec['url'] . "</td>";

            echo "<td>
                <form action='esupplier.php' method='post'>
                    <input type='hidden' name='sid' value='" . $rec['id'] . "'>
                    <button type='submit' class='btn-edit'>Edit</button>
                </form>
                <form action='dsupplier.php' onSubmit='return askUser();' method='post'>
                    <input type='hidden' name='id' value='" . $rec['id'] . "'>
                    <button type='submit' class='btn-delete'>Delete</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
