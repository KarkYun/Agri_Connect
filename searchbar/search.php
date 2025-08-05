<?php

include 'header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/jpeg" href="../images/favicon.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link rel="stylesheet" href="search.css"/>
    <title>Agri Connect - Pineapple</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-seedling"></i>Agri Connect</a>

        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="../main/main.html">Home</a>
            <a href="../index.php">Crops</a>
            <a href="../index.php">About</a>
            <a href="../shop/more.html">Shop</a>
           
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <a href="../shop/more.html">
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
            </a>
            <div class="fas fa-user" id="login-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
        </div>
    </header>

    <div class="search-form">
        <div id="close-search" class="fas fa-times"></div>
        <form action="">
            <input
              type="search"
              name=""
              placeholder="search here..."
              id="search-box"
            />
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

 

<section class="search" id="search">
   <h1><br></h1>

<div class="article-container">
    <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        
       
        $sql = "SELECT * FROM article WHERE 
                search_term LIKE '%$search%' OR 
                result_title LIKE '%$search%' OR 
                result_content LIKE '%$search%'";
        
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "<div class='search-result'>";
        echo "Hello " . $queryResult . " Results matching your search!<br>";
        echo "</div>";

        if ($queryResult > 0) {
            while($row = mysqli_fetch_assoc($result)){
                // Function to get the anchor section based on search term
                $section = getSectionAnchor($row['search_term']);
                
                echo "<a href='../index.php".$section."'>
                        <div class='article-box'>
                            <h3>Category: ".$row['search_term']."</h3>
                            <h3>Title: ".$row['result_title']."</h3>
                            <h3>".$row['result_content']."</h3>
                        </div>
                      </a>";        
            }
        } else {
            echo "No matching search results!";
        }
    }
    
    // Function to determine which section to scroll to
    function getSectionAnchor($searchTerm) {
        $term = strtolower($searchTerm);
        
        if (strpos($term, 'shop') !== false || 
        strpos($term, 'product') !== false || 
        strpos($term, 'featured') !== false || 
        strpos($term, 'featured products') !== false) {
        return '#shop';
        }
        elseif (strpos($term, 'about') !== false) {
            return '#about';
        }
        elseif (strpos($term, 'more crops') !== false || strpos($term, 'crops') !== false) {
            return '#category';
        }
        elseif (strpos($term, 'facility') !== false || strpos($term, 'facilities') !== false) {
            return '#facilities';
        }
        elseif (strpos($term, 'gallery') !== false) {
            return '#gallery';
        }
        elseif (strpos($term, 'contact') !== false || strpos($term, 'newsletter') !== false) {
            return '#newsletter';
        }
        elseif (strpos($term, 'home') !== false || strpos($term, 'hero') !== false) {
            return '#home';
        }
        else {
            // Default to top of page
            return '';
        }
    }
    ?>
    </section>    
</div>
    <!--footer starts-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
           <a href="../main/main.html">Home</a>
            <a href="../index.html">Crops</a>
            <a href="#about">About</a>
            <a href="../shop/more.html">Shop</a>
            <a href="#reviews">Reviews</a>
            <a href="#blogs">Blogs</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#">my account</a>
                <a href="#">my orders</a>
                <a href="#">my wishlist</a>
                <a href="#">contact support</a>
                <a href="#">terms of use</a>
                <a href="#">privacy policy</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i>+233-24-157-3153</a>
                <a href="#"><i class="fas fa-envelope"></i>test@mail.com</a>
                <a href="https://shorturl.at/tpnw1"><i class="fas fa-map"></i> Ghana </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>twitter now x</a>
                <a href="#"><i class="fab fa-instagram"></i>instagram</a>
                <a href="#"><i class="fab fa-github"></i>github</a>
            </div>
            <div class="credit">created by <span>Group 10</span> | all rights reserved!</div>
        </div>
    </section>

    <script src="../js/script.js"></script>
</body>
</html>
