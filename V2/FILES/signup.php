<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO internaute (nom, email) VALUES ('$nom', '$email')";
    if (mysqli_query($conn, $query)) {
        echo "<p>Record added successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>

<?php include 'header.php'; ?>

<div class="signup-container">
    <h1>Sign Up</h1>
    <form method="post">
        <label for="nom">Name:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Sign Up</button>
    </form>
</div>

<?php include 'footer.php'; ?>