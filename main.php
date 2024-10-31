<?php
session_start();


?>
<html>
<head>
<title>Search Supplier Record</title>
</head>
<body>
<form action="view_supplier.php" method="post">
<table>
<tr>
<td><select name="column">

<option value="id">Supplier ID</option><br>
<option value="username">Supplier Name</option><br>
<option value="address">Supplier Address</option><br>
<option value="phone">Supplier Phone</option><br>
<option value="url">Supplier URL</option><br>
</select>
</td>
<td><select name="opt">
<option value="&equals;">&equals;</option><br>
<option value="&lt;">&lt</option><br>
<option value="&gt;">&gt;</option><br>
<option value="&lt;&equals;">&lt;&equals;</option><br>
<option value="&gt;&equals;">&gt;&equals;</option><br>
<option value="&lt;&gt;">&lt;&gt;</option><br>
</select>
</td>

<td><input type="text" name="svalue" /></td>
<td><input type="submit" value="Search" /></td>
</tr>
</table>
</form>
</body>
</html>