<?php
// Add this PHP code at the very beginning (before <!DOCTYPE html>)
if(isset($_POST['register'])) {
    // Include database connection
    include("connect.php");
    
    // Get form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashed password
    
    // Check if email already exists
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert new user (plain text password)
        $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registration failed: " . mysqli_error($conn) . "');</script>";
        }
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="../images/favicon.png" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
     <link rel="stylesheet" href="register.css">
    <title>Agri Connect - Register</title>
</head>
<body>
    <header class="header">
            <a href="../main/main.html" class="logo"><i class="fas fa-seedling"></i>Agri Connect</a>
  
             <nav class="navbar">
                    <div id="nav-close"class ="fas fa-times"></div>
                  
                
                </nav>
            
                <div class="icons">
                    <div class="fas fa-bars" id="menu-btn"></div>
                 
            
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
                <h2>Create an Account</h2>
                <form action="register.php" method="post">

                    <div class="input-box">
                        <label for="firstname">Firstname</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>

                    <div class="input-box">   
                        <label for="lastname">Lastname</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>

                  
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <input type="submit" class="btn" value ="Sign Up" name="register">
                    <div class="register-link">
                            <p>Already have an account? <a href="login.php">Log in</a></p>
                        </div> 
                    
                    
                      
                </form>
            </div>
        </div>

         <script src="script.js"></script>
</body>
</html>