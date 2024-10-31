<?php
session_start();
?>

<html>
<head>
  <title>Supplier Information Sheet</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-image: url("bcduserlog3.png");

    }
    
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: none;
      width: 80%;
      max-width: 400px;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
      margin: 0 auto;

    }
    
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;

    }
    
    table {
      width: 100%;
    }
    
    td {
      padding: 10px;
    }
    
    input[type="text"] {
      width: 100%;
      height: 30px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    input[type="submit"],
    input[type="reset"] {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #45a049;
    }

    h2{
      text-align: center;
    }
  </style>
</head>
<body>
<div class="container">
  <form action='newsupplier.php' method='post'>
    <table>
      <tr>
        <td colspan='2'><h2>Supplier Info</h2></td>
      </tr>
      <tr>
        <td>Supplier Name</td>
        <td><input type='text' name='supplier' maxlength='50' /></td>
      </tr>
      <tr>
        <td>Supplier Address</td>
        <td><input type='text' name='address' maxlength='100' /></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><input type='text' name='phone' maxlength='20' /></td>
      </tr>
      <tr>
        <td>URL</td>
        <td><input type='text' name='url' maxlength='100' /></td>
      </tr>
      <tr>
        <td><input type='submit' value='SUBMIT' /></td>
        <td><input type='reset' value='CLEAR' /></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
