<?php
$con = mysqli_connect("localhost", "root", "", "shop");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete']) && isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    $query = "DELETE FROM userlogs WHERE userID = '$userID'";
    mysqli_query($con, $query);
    header("Location: userlogs.php");
    exit();
}




$query = "SELECT * FROM userlogs";
$result = mysqli_query($con, $query);

$userLogs = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userLogs[] = $row;
    }
} else {
    echo "No user logs found.";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>User Logs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url("bcduserlog.png");

        }

        h1 {
            text-align: center;
            font-family: 'Diphylleia', serif;
        color: #904747;
        font-size: 48px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease-in-out;
            background-color: #F9D9AA;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background-image: url("bcduserlog2.png");


        }

        .no-logs {
            text-align: center;
            color: #999;
            font-style: italic;
            margin-top: 20px;
        }


        .home-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.home-button:hover {
    background-color: #45a049;
    text-decoration: none
}

    </style>
</head>
<body>
    <div class="container">
        			<div style="clear:both"></div>

        <h1>User Logs</h1>

        <?php if (!empty($userLogs)): ?>
            
            <div class="table-responsive">

            <table id="userlog-table">
                <thead>
                    <tr>
                        <th width="5%">User ID</th>
                        <th width="25%">User Name</th>
                        <th width="15%">Login Date</th>
                        <th width="15%">Login Time</th>
                        <th width="15%">Logout Date</th>
                        <th width="10%">Logout Time</th>
                        <th width="30%">Last Edited On</th>
                        <th width="10%"> Action </th>

                    </tr>
                </thead>
                <tbody>
                <a class="home-button" href="home.php">Home</a>
                
                    <?php foreach ($userLogs as $log): ?>
                        <tr>
                            <td><?php echo $log['userID']; ?></td>
                            <td><?php echo $log['username']; ?></td>
                            <td><?php echo $log['loginDate']; ?></td>
                            <td><?php echo $log['loginTime']; ?></td>
                            <td><?php echo $log['logoutDate']; ?></td>
                            <td><?php echo $log['logoutTime']; ?></td>
                            <td><?php echo $log['lastEditedOn']; ?></td>
                          </td> <td> <a href="userlogs.php?delete=true&userID=<?php echo $log['userID']; 
                          ?>" onclick="return confirm('Are you sure you want to delete this user log?')" >Delete</a>
                           </td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-logs">No user logs found.</p>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('userlog-table');
            const rows = table.getElementsByTagName('tr');

            Array.from(rows).forEach(function(row) {
                row.addEventListener('click', function() {
                    const userID = this.cells[0].textContent;
                    window.location.href = 'userlogs.php?userID=' + userID;
                });
            });

            Array.from(rows).forEach(function(row) {
                row.addEventListener('mouseover', function() {
                    this.style.backgroundColor = '#e6f7ff';
                    this.style.cursor = 'pointer';
                });

                row.addEventListener('mouseout', function() {
                    this.style.backgroundColor = '';
                    this.style.cursor = 'default';
                });
            });
        });
    </script>
</body>
</html>
