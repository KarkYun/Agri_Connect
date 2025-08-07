<?php
session_start(); // Start session for user management

if(isset($_POST['login'])) {
    // Include database connection
    include("connect.php");
    
    // Get form data and sanitize
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Check if user exists with this email
    $check_user = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_user);
    
    if(mysqli_num_rows($result) > 0) {
        // User exists, now verify password
        $user = mysqli_fetch_assoc($result);
        
        // Check if password matches (assuming you're using hashed passwords)
        if(password_verify($password, $user['password'])) {
            // Password is correct, create session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['firstName'] . ' ' . $user['lastName'];
            $_SESSION['logged_in'] = true;
            
            // Check if "Remember me" is checked
            if(isset($_POST['remember'])) {
                // Set cookies for 30 days
                setcookie('user_email', $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie('user_name', $user['firstName'] . ' ' . $user['lastName'], time() + (30 * 24 * 60 * 60), '/');
            }
            
            echo "<script>alert('Login successful! Welcome back.'); window.location.href='../index.php';</script>";
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // User doesn't exist
        echo "<script>alert('No account found with this email address. Please register first.');</script>";
    }
    
    mysqli_close($conn);
}

// Check if user is already logged in via cookies
if(!isset($_SESSION['logged_in']) && isset($_COOKIE['user_email'])) {
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['user_name'] = $_COOKIE['user_name'];
    $_SESSION['logged_in'] = true;
}
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
            <a href="../main/main.html" class="logo"><i class="fas fa-seedling"></i>Agri Connect</a>

                <nav class="navbar">
                    <div id="nav-close" class="fas fa-times"></div>
                </nav>
            
                <div class="icons">
                    <div class="fas fa-bars" id="menu-btn"></div>
                </div>
        </header>

        <div class="search-form">
            <div id="close-search" class="fas fa-times"></div>
            <form action="">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
        </div>

        <div class="wrapper">
            <div class="form-box login">
                <h2>Sign in</h2>
                <form action="" method="post">
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required 
                               value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>">
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <label><input type="checkbox" name="remember" 
                                 <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>> Remember me</label>
                    
                    <input type="submit" class="btn" value="Login" name="login">
                    
                    <div class="forgot">
                         <a href="forgot_password.php">Forgot Password?</a>
                    </div> 
                        <div class="register-link">
                            <p>Don't have an account? <a href="register.php">Register Now</a></p>
                        </div> 
                </form>
            </div>
        </div>

         <script src="script.js"></script>
</body>
</html>