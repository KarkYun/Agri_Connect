<?php
// Newsletter subscription handler
if(isset($_POST['subscribe'])) {
    // Include database connection
    include("../login/connect.php");
    // Include header
    include '../searchbar/dbh.php';

    
    // Get email from newsletter form
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    
    // Check if email already exists in email table
    $check_email = "SELECT * FROM email WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($result) > 0) {
       // echo "<script>alert('You are already subscribed to our newsletter!');</script>";
    } else {
        // Insert new subscriber into email table
        $sql = "INSERT INTO email (email) VALUES ('$email')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thank you for subscribing to our newsletter!');</script>";
        } else {
            echo "<script>alert('Subscription failed: " . mysqli_error($conn) . "');</script>";
        }
    }

    
    mysqli_close($conn);
}
?>