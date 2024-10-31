<?php
session_start();

?>

<!DOCTYPE html>
<html>
<title>Pastry shop</title>

<head>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<style>

@import url('https://fonts.googleapis.com/css2?family=Diphylleia&display=swap');

.drawer {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #F9D9B2;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.5s;
}

.drawer a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #904747;
  display: block;
  transition: 0.3s;
}

.drawer a:hover {
  color: white;
}

.closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 25px;
  cursor: pointer;
  background-color: #f9c476;
  color: #904747;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
}

.openbtn:hover {
  background-color: #f9c476;
  color: white;
}

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






body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  align-items: center;
  

}

header {
  background-color: #f9c476;
  color: #fff;
  padding: 20px;
  

}

header h1 {
  margin: 0;
  font-size: 24px;
  
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  
}

nav ul li {
  display: inline-block;
  margin-right: 10px;
}

header ul li a:hover {
    color: #C1B086;
    text-decoration:none;
  }


nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 16px;
}

main {
  padding: 20px;
  background-color: #F9D9AA;

  
}

footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
  font-size: 14px;
}



.container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            color: #fff;
        }

        .banner {
            position: relative;
            height: 300px;
            margin-bottom: 0px;
            overflow: hidden;
        }

        .banner-slides {
            display: flex;
            width: 300%;
            transition: transform 0.8s ease-in-out;
        }

        .banner-slide {
            flex-basis: 33.33%;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-content {
            position: absolute;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .banner h2 {
            font-size: 36px;
            margin: 0;
            padding: 10px;
            color: #fff;
            
        }

        h2{
          color:#904747;
          font-family: 'Diphylleia', serif;;
        }

        .banner p {
            font-size: 18px;
            margin: 10px 0;
            color: #fff;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .gallery-item {
            flex-basis: 25%;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            position: relative;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius:30px
            
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease-in-out;
            cursor: pointer;
            border-radius:30px

        }

        .gallery-overlay h3 {
            font-size: 20px;
            color: #fff;
            margin: 0;
            padding: 10px;
        }

        .gallery-overlay p {
            font-size: 14px;
            color: #fff;
            margin: 0;
            padding: 10px;
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


</style> 

</head>
<body>
<div id="myDrawer" class="drawer">
  <a href="javascript:void(0)" class="closebtn" onclick="closeDrawer()">&times;</a>
  <a href="home.php">HOME</a>
  <a href="index2.php">MENU</a></li>
  <a href="search_supplier.php">SUPPLIERS</a>
  <a href="additem.php" >ADD ITEM</a>
  <a href="addsupplier.php" class="nav-link">ADD SUPPLIERS</a>
  <a href="userlogs.php">USER LOG</a>
  <a href="search_supplier1.php">SEARCH SUPP</a>
  <a href="about.php"> ABOUT US</a>
  <a href="purchase.php"> PURCHASE</a>
</div>


<header>

    <nav>
      <ul>
      <button class="openbtn" onclick="openDrawer()">&#9776;</button>    

        <li><a href="home.php">HOME</a></li>
        <li><a href="searchitem.php">SEARCH ITEM</a></li>
        <li> <a href="search_supplier.php">SUPPLIERS</a> </li>   
         <li> <a href="additem.php" >ADD ITEM</a> </li>
        <li> <a href="addsupplier.php" class="nav-link">ADD SUPPLIERS</a> </li>
        <li><a href="userlogs.php">USERLOGS</a></li>
        <li><a href="logout2.php">LOGOUT</a></li>

      </ul>
    </nav>
  </header>
  <main>
  <div class="container">
        <div class="banner">
            <div class="banner-slides">
                <div class="banner-slide">
                    <img class="banner-image" src="des4.1.png" alt="Banner Image 1">
                    <div class="banner-content">
                    </div>
                </div>
                <div class="banner-slide">
                    <img class="banner-image" src="des5.1.png" alt="Banner Image 2">
                    <div class="banner-content">
                    </div>
                </div>
                <div class="banner-slide">
                    <img class="banner-image" src="des6.1.png" alt="Banner Image 3">
                    <div class="banner-content">
                    </div>
                </div>
            </div>
        </div>
        
        <h2>Popular Categories</h2>

        <div class="gallery">
            <div class="gallery-item">
                <img src="prodadmin4.png" alt="Category 1">
                <div class="gallery-overlay">
                    <h3> WELCOME </h3>
                    <p> Don't miss out on these delectable delights  (^ _ ^) </p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="prodadmin1.png" alt="Category 2">
                <div class="gallery-overlay">
                    <h3> Bread </h3>
                    <p>soft and fluffy texture with a crusty outer layer  (´ε｀ )♡</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="prodadmin2.png" alt="Category 3">
                <div class="gallery-overlay">
                    <h3> Cake </h3>
                    <p>Light and fluffy and moist  ( ˘ ³˘)♥ </p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="prodadmin3.png" alt="Category 4">
                <div class="gallery-overlay">
                    <h3 >Coffee </h3>
                    <p> Made from the roasted seeds of the Coffea plant (ˆ⌣ˆc) </p>
                </div>
            </div>
        </div>
    </div>
  
  </main>
    <footer>
      <div class="footer-text">
        <p>&copy; Pastry Shop 2023. All rights reserved.</p>
        
      </div>
    </footer>



</body>

<script>
function openDrawer() {
  document.getElementById("myDrawer").classList.add("drawer-open");
  document.getElementById("myDrawer").classList.remove("drawer-closed");
  document.querySelector(".content").classList.add("drawer-open");
  document.querySelector(".content").classList.remove("drawer-closed");
}

function closeDrawer() {
  document.getElementById("myDrawer").classList.add("drawer-closed");
  document.getElementById("myDrawer").classList.remove("drawer-open");
  document.querySelector(".content").classList.add("drawer-closed");
  document.querySelector(".content").classList.remove("drawer-open");
}



        var bannerSlides = document.querySelector('.banner-slides');
        var bannerImages = document.querySelectorAll('.banner-image');
        var currentSlide = 0;
        var slideInterval = setInterval(nextSlide, 3000); 

        function nextSlide() {
    currentSlide = (currentSlide + 1) % bannerImages.length;
    bannerSlides.style.transform = 'translateX(-' + currentSlide * 33.33 + '%)';
}

</script>
</html>


