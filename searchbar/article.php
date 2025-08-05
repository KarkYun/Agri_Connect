<?php
include 'header.php';
?>

<h1>Article page</h1>

<div class= "article-container">
    <?php
        $title = mysqli_real_escape_string($conn, $_GET['title']);
        $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM article WHERE search_term= '$title' AND result_title='$search'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class= 'article-box' >
            <h3>".$row['search_term']."</h3>
            <h3>".$row['result_title']."</h3>
            <h3>".$row['result_content']."</h3>
            </div>";
        } 
    }
    ?>
</div>
</body>

</html>