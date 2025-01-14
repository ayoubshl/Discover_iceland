<?php include 'header.php'; ?>

<div class="allnews-container">
    <h1>All News</h1>
    <?php
    include 'db_connection.php';

    $query = "SELECT * FROM news ORDER BY date_publication DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='news-item'>
                <h2>{$row['titre']}</h2>
                <p>{$row['resume']}</p>
                <p><small>{$row['date_publication']}</small></p>
              </div>";
    }

    mysqli_close($conn);
    ?>
</div>

<?php include 'footer.php'; ?>