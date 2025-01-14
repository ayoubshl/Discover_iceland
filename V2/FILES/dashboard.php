<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'db_connection.php';
?>

<?php include 'header.php'; ?>

<div class="dashboard-container">
    <h1>Welcome back, Admin</h1>
    <a href="logout.php">Logout</a>

    <!-- Add news form -->
    <form action="add_news.php" method="post">
        <input type="text" name="titre" placeholder="Title" required>
        <textarea name="resume" placeholder="Summary" required></textarea>
        <textarea name="contenu" placeholder="Content" required></textarea>
        <button type="submit">Add News</button>
    </form>

    <!-- Display news -->
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        $query = "SELECT * FROM news ORDER BY date_publication DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['titre']}</td>
                    <td>{$row['resume']}</td>
                    <td>{$row['date_publication']}</td>
                    <td>
                        <a href='edit_news.php?id={$row['news_id']}'>Edit</a>
                        <a href='delete_news.php?id={$row['news_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>

<?php include 'footer.php'; ?>