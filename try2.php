<?php
session_start();
if (!isset($_SESSION['log'])) {
  die("You are not allowed to view this page");
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>Sugar Clouds</title>
    <link rel="stylesheet" href="style.css">

<style>
/* Global Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
}

/* Navigation Bar */
.nav-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f7d195;
  padding: 20px;
  
}

.logo img {
  height: 50px;
}

.nav-menu {
  list-style: none;
  display: flex;
  align-items: center;
  

}

.nav-menu li {
  margin-right: 20px;
}

.nav-menu a {
  color: #333;
  text-decoration: none;
  font-size: 18px;
}

.menu-icon {
  display: none;
  font-size: 24px;
  cursor: pointer;
  
}

.hero {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  background-image: url("bcsgd.jpg");
    padding: 50px;
}

.hero-text {
  flex-basis: 50%;
  text-align: center;
}

.hero-text h1 {
  font-size: 48px;
  margin-bottom: 20px;
}

.hero-text p {
  font-size: 24px;
  margin-bottom: 30px;
}

.hero-image {
  flex-basis: 50%;
  display: flex;
  justify-content: center;
  align-items: center;

}

.hero-image img {
  max-height: 500px;
}

/* Featured Products Section */
.featured-products {
  padding: 50px;
  background-color: #f7d195;

}

.featured-products h2 {
  font-size: 36px
}

.featured-products {
padding: 50px;
}

.featured-products h2 {
font-size: 36px;
margin-bottom: 30px;
text-align: center;

}

.product-container {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 50px;
}

.product-image {
flex-basis: 40%;
display: flex;
justify-content: center;
align-items: center;
}

.product-image img {
max-width: 100%;
}

.product-details {
flex-basis: 50%;
}

.product-details h3 {
font-size: 24px;
margin-bottom: 20px;
}

.product-details p {
font-size: 18px;
margin-bottom: 20px;
}

.product-details .price {
font-size: 24px;
font-weight: bold;
margin-bottom: 20px;
}

.product-details .btn {
display: block;
padding: 10px 20px;
background-color: #333;
color: #fff;
text-align: center;
text-decoration: none;
font-size: 18px;
border-radius: 5px;
transition: background-color 0.3s ease;
}

.product-details .btn:hover {
background-color: #555;
}

/* Footer */
footer {
background-color: #333;
color: #fff;
text-align: center;
padding: 20px;
}

.footer-text p {
font-size: 18px;
}

/* Responsive Design */
@media (max-width: 768px) {
.hero {
flex-direction: column;
}

.hero-text {
flex-basis: 100%;
margin-bottom: 50px;
}

.hero-image {
flex-basis: 100%;
}

.nav-menu {
display: none;
}

.menu-icon {
display: block;
}

.nav-menu.active {
display: flex;
flex-direction: column;
position: absolute;
top: 100%;
left: 0;
width: 100%;
background-color: #e1e1e1;
padding: 20px;
}

.nav-menu.active li {
margin-right: 0;
margin-bottom: 10px;
}

.product-container {
flex-direction: column;
}

.product-image {
margin-bottom: 30px;
}

.product-details {
margin-bottom: 30px;
text-align: center;
}
}

.nav-menu li a {
    font-size: 18px;
    font-weight: 400;
    color: #69453a;
    transition: 0.5s;
    font-family:  Century, serif;

  }
  
  .nav-menu li a:hover {
    color: #f0fafa;
  }
  .hero p{
    font-family:  Century, serif;
    color: #f0fafa;


  }
  .hero h1{
    font-family:  Century, serif;
    color: #f0fafa;

  }

  .hero button {
  background-color: #f26522;
  color: #fff;
  font-size: 18px;
  padding: 10px 30px;
  border-radius: 5px;
  cursor: pointer;

  transition: background-color 0.3s ease-in-out;
}

.hero button:hover {
  background-color: #e04c00;
}


/* Add a smooth fade-out transition for the body element */
body {
  opacity: 5;
  transition: opacity 0.5s ease-in-out;
}

/* Add a fade-in animation for the container */
.container {
  opacity: 0;
  animation: fade-in 1.5s forwards;
}

@keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}









/* The drawer */
.drawer {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #f1f1f1;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.5s;
}

/* Links inside the drawer */
.drawer a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* Change color on hover */
.drawer a:hover {
  color: black;
}

/* Close button */
.closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the open button */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #333;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
}

.openbtn:hover {
  background-color: #555;
  color: white;
}

/* Push content to the right when drawer is open */
.content {
  margin-left: 250px;
  transition: 0.5s;
}

.drawer-open {
  margin-left: 0;
}

.drawer-closed {
  margin-left: -250px;
}



</style>
</head>



  <body>
    <header>
      
    <!-- Navigation Bar -->
    <nav class="nav-bar">
    
        
<!-- Add your page content here -->
<button class="openbtn" onclick="openDrawer()">&#9776; Menu</button>
      </div>
      <ul class="nav-menu">
     

        <li><a href="try.php">HOME</a></li>
        <li><a href="searchitem.php">MENU</a></li>
        <li> <a href="search_supplier.php">SUPPLIERS</a> </li>
              
              <li> <a href="additem.php" >ADD ITEM</a> </li>
              <li> <a href="addsupplier.php" class="nav-link">ADD SUPPLIERS</a> </li>

        <li><a href="userlogs.php">ABOUT US</a></li>
      
      </ul>
      <div class="menu-icon">
        <i class="fas fa-bars"></i>
      </div>
    </nav>
</header>


<div id="myDrawer" class="drawer">
  <a href="javascript:void(0)" class="closebtn" onclick="closeDrawer()">&times;</a>
  <a href="home.php">HOME</a>
  <a href="index2.php">MENU</a></li>
  <a href="search_supplier.php">SUPPLIERS</a>
  <a href="additem.php" >ADD ITEM</a>
  <a href="addsupplier.php" class="nav-link">ADD SUPPLIERS</a>
  <a href="userlogs.php">USER LOG</a>
  <a href="#">Products</a>
  <a href="about.php">About Us</a>
  <a href="#">Contact Us</a>
</div>




    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-text">
        <h1>Welcome to Pastry Shop</h1>
        <p>Enjoy our freshly roasted coffee and delicious baked goods.</p>


        
        <button><a href="index2.php" class="button">Order Now</a></button>
      
    
    
    </div>
      <div class="hero-image">
        <img src="a7.jpg" alt="Cafe Interior">
      </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products">
      <h2>Featured Products</h2>
      <!-- JavaScript code will add products here -->
    </section>

    <!-- Footer -->
    <footer>
      <div class="footer-text">
        <p>&copy; Pastry Shop 2023. All rights reserved.</p>
        
      </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
  document.body.style.opacity = '0'; // Set initial opacity to 0
});

window.addEventListener('load', function() {
  document.body.style.opacity = '3'; // Trigger the fade-in transition by setting opacity to 1
});


/* Open the drawer */
function openDrawer() {
  document.getElementById("myDrawer").classList.add("drawer-open");
  document.getElementById("myDrawer").classList.remove("drawer-closed");
  document.querySelector(".content").classList.add("drawer-open");
  document.querySelector(".content").classList.remove("drawer-closed");
}

/* Close the drawer */
function closeDrawer() {
  document.getElementById("myDrawer").classList.add("drawer-closed");
  document.getElementById("myDrawer").classList.remove("drawer-open");
  document.querySelector(".content").classList.add("drawer-closed");
  document.querySelector(".content").classList.remove("drawer-open");
}
</script>
  
</body>

</html>
