<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact (firstname, lastname, phone, msg) VALUES ('$firstname', '$lastname', '$phone', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>

<?php include 'header.php'; ?>

<div class="flex-container">
    <?php include 'sidenav.php'; ?>

    <section class="contact" id="contact">
        <div class="main-text">
            <h2>Contact</h2>
            <h1>Get in touch</h1>
        </div>
        <div class="main-container">
            <form action="contact.php" method="post">
                <div class="name">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div class="name">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="phone">
                    <label for="phone">Email or Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="message">
                    <label for="message">Your message</label>
                    <textarea id="message" name="message" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn-send">Send</button>
            </form>
        </div>
    </section>

    <div class="video-container">
        <iframe width="300" height="300" src="./videos/ICELAND｜Cinematic Video.mp4" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<?php include 'footer.php'; ?>