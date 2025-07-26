<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="../images/favicon.png" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
     <link rel="stylesheet" href="login.css">
    <title>Agri Connect - Login</title>
</head>
<body>
    <header class="header">
            <a href="#" class="logo"><i class="fas fa-seedling"></i>Agri Connect</a>
                <!---<img src="images/logo.png" alt="Agro Logo">-->

                <nav class="navbar">
                    <div id="nav-close"class ="fas fa-times"></div>
                    <a href="../main/main.html">Home</a>
                    <a href="../index.html">Crops</a>
                    <a href="#about">About</a>
                    <a href="../shop/more.html">Shop</a>
                    <a href="#reviews">Reviews</a>
                    <a href="#blogs">Blogs</a>
                    
                
                </nav>
            
                <div class="icons">
                    <div class="fas fa-bars" id="menu-btn"></div>
                    <a href="login.html"> 
                    <div class="fas fa-shopping-cart" id="cart-btn"></div>
                    </a>
                    <div class="fas fa-user" id="login-btn"></div>
                    <div class="fas fa-search" id="search-btn"></div>
                </div>
            
        </header>

        <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label  for="search-box" class="fas fa-search"></label>
        </form>
        </div>

        <div class="wrapper">
            <div class="form-box login">
                <h2>Sign in</h2>
                <form action="homepage.php" method="post">
                    <div class="input-box">
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-box">
                       
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    
                    <input type="submit" class="btn" value ="Login" name="login">
                    
                    <div class="forgot">
                         <a href="#">Forgot Password?</a>
                    </div> 
                        <div class="register-link">
                            <p>Don't have an account? <a href="register.php">Register Now</a></p>
                        </div> 
                </form>
            </div>
        </div>

        <style>

        </style>

         <script src="script.js"></script>
</body>
</html>