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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
}

.nav-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f9c476;
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
  background-image: url("bcsgdnew2.png");
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
  border-radius:40px
}

.featured-products {
  padding: 50px;
  background-color: #F9D9AA;

}

.featured-products h2 {
  font-size: 36px
}

.featured-products {
padding: 50px;
}

.featured-products h2 {
font-size: 50px;
margin-bottom: 30px;
text-align: center;
color: #904747;
font-family: 'Diphylleia', serif;


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

footer {
background-color: #f9c476;
color: #fff;
text-align: center;
padding: 20px;
}

.footer-text p {
font-size: 18px;
}

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
    color: #904747;


  }
  .hero h1{
    font-family: 'Diphylleia', serif;
        color: #904747;

  }

  .hero button {
    background-image: url("buttonnew.png");
  color: #fff;
  font-size: 18px;
  padding: 10px 30px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  list-style: none;

  transition: background-color 0.3s ease-in-out;
}




.hero button:hover {
  background-color: #e04c00;
}


body {
  opacity: 5;
  transition: opacity 0.5s ease-in-out;
  
}

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





   .gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
      padding: 20px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      cursor: pointer;
    }

    .gallery-item img {
      width: 100%;
      height: auto;
      transition: transform 0.3s ease-in-out;
    }

    .gallery-item:hover img {
      transform: scale(1.5); 
    }

    .gallery-item .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
    }

    .gallery-item:hover .overlay {
      opacity: 1;
    }

    .gallery-item .overlay-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
    }

    h1 {
      text-align: center;
      padding: 20px;
    }


    a{
  color:#904747;
  font-size: 15px;
  font-family: 'Diphylleia', serif;
  
}

</style>
</head>



  <body>
    <header>
    <nav class="nav-bar">
      <div class="logo">
        <img src="logo1.png" alt="Cafe Logo">
      </div>
      <ul class="nav-menu">
     

        <li><a href="home.php">HOME</a></li>
        <li><a href="index2.php">MENU</a></li>
        <li> <a href="search_supplier.php">SUPPLIERS</a> </li>
        <li> <a href="see.php">SEARCH ITEM</a> </li>

              

        <li><a href="logout.php"> LOGOUT</a></li>

      
      </ul>
      <div class="menu-icon">
        <i class="fas fa-bars"></i>
      </div>
    </nav>
</header>

    <section class="hero">
      <div class="hero-text">
        <h1>Welcome to Pastry Shop</h1>
        <p>Enjoy our freshly roasted coffee and delicious baked goods.</p>


        
        <button><a href="index2.php" class="button" style= "text-decoration: none",  >Order Now</a></button>
      
    
    
    </div>
      <div class="hero-image">
        <img src="feuturepic.png" alt="Cafe Interior">
      </div>
      
    </section>

    <section class="featured-products">
      <h2>Featured Products</h2>
  <div class="gallery">
    <div class="gallery-item">
      <img src="product1.3.png" alt="Image 1">

      <div class="overlay">
        <div class="overlay-content">
          <h3> Cakes </h3>
          <p>Oreo cake</p>
        </div>
      </div>
    </div>
    <div class="gallery-item">
      <img src="product2.4.png" alt="Image 2">
      <div class="overlay">
        <div class="overlay-content">
          <h3> Bread </h3>
          <p> Impanada</p>
        </div>
      </div>
    </div>
    <div class="gallery-item">
      <img src="product3.png" alt="Image 3">
      <div class="overlay">
        <div class="overlay-content">
          <h3> Drinks</h3>
          <p> Coffee </p>
        </div>
      </div>
    </div>
  </div>
    </section>

    
    <footer>
      <div class="footer-text">
        <p>&copy; Pastry Shop 2023. All rights reserved.</p>
        
      </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
  document.body.style.opacity = '0'; 
});

window.addEventListener('load', function() {
  document.body.style.opacity = '3'; 
});
</script>
  
</body>

</html>
