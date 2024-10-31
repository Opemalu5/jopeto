<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Choose</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7d195;
            color: #fff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }
        
        .container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background: linear-gradient(0deg, rgba(249,207,142,0.7805497198879552) 100%, 
            rgba(242,149,4,0.7413340336134453) 100%);         
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        
        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .profile {
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid transparent;
            transition: border-color 0.3s;
        }
        
        .profile span {
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }
        
        .profile:hover {
            transform: scale(1.05);
        }
        
        .profile:hover img {
            border-color: #f29504;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">What is Your Role?</h2>
        <div class="profile" onclick="selectProfile(1)">
            <img src="admin1.jpg" alt="Profile 1">
            <span> Admin </span>
        </div>
        <div class="profile" onclick="selectProfile(2)">
            <img src="supplogo.png" alt="Profile 2">
            <span> Suppliers </span>
        </div>
        <div class="profile" onclick="selectProfile(3)">
            <img src="logouser.jpg" alt="Profile 3">
            <span> User </span>
        </div>
        <!-- Add more profiles as needed -->
    </div>
    <script>
        function selectProfile(profileId) {
            // Handle profile selection logic here
            console.log("Profile " + profileId + " selected");
        }
    </script>
</body>
</html>
