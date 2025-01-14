<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials (replace with secure password hashing)
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<?php include 'header.php'; ?>

<div class="login-container">
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>

<?php include 'footer.php'; ?>