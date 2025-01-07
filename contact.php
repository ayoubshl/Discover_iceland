<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iceland Travel</title>
    <link rel="shortcut icon" href="public/images/logo/icceland.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- css  -->
    <link rel="stylesheet" href="./style/contact.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

</head>

<body>
    <div id="preloadder">
    </div>
    <!-- header  -->
    <header class="primary-header">
        <div class="left-part">
            <i class="fas fa-bars" onclick="shownav()" id="shownav"></i>
        </div>
        <div class="middle-part">
            <a href="./index.php"><img src="public/images/logo/iceland.svg" alt=""></a>
            <div class="logo">
                <h1>I<span>ce</span>land</h1>
            </div>
        </div>
        <div class="right-part">
            <div class="navbar">
                <ul>
                    <li><a href="./aboutUs.html">Qui somme-nous ?</a></li>
                    <li><a href="./contact.html">Contact Us</a></li>
                    <li><a href="#newsletter">newsletter</a></li>

                </ul>

            </div>

        </div>
    </header>



    <div class="flex-container">
        <!-- sidenav -->
        <aside class="sidenav">
            <ul>
                <li><a href="./sitesAndMonuments.html">Sites et Monuments</a></li>
                <li><a href="./ville.html">Index des villes</a></li>
                <li><a href="./Gmap.html">Google Map</a></li>
                <li><a href="#liens-utiles">Liens utiles</a></li>
            </ul>
        </aside>
        <section class="contact" id="contact">
            <div class="main-text">
                <h2>Contact</h2>
                <h1>Get in touch</h1>
            </div>
            <div class="main-container">
                <form action="contact.php">
                    <div class="name">
                        <label for="name">FirstName</label>
                        <input type="text" placeholder="Enter Your firstname " id="firstname" name="firstname">
                    </div>
                    <div class="name">
                        <label for="name">LastName</label>
                        <input type="text" placeholder="Enter Your lastname " id="lastname" name="lastname">
                    </div>
                    <div class="phone">
                        <label for="phone">Email or Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter Your Number or phone">
                    </div>
                    <div class="message">
                        <label for="message">Your message</label>
                        <textarea name="message" id="message" cols="30" rows="10"
                            placeholder="Tell us about your interests passion needs and any other details relevent to your trip"></textarea>
                    </div>
                    <button class="btn-send">
                        Send
                    </button>
                </form>
            </div>
        </section>
        <!-- ----- -->
        <!-- video -->
        <div class="video-container">
            <iframe width="300" height="300" src="./videos/ICELAND｜Cinematic Video.mp4"frameborder="0"
                allowfullscreen></iframe>
        </div>
        <!--  -->
    </div>
    <!-- Monuments Shower -->



    <!-- contact  -->


    <!-- ----- -->
















    <script src="public/js/main.js"></script>


</body>
<!-- footer -->
<footer>

    <div class="main-container">
        <div class="suggestion">
            <h1>suggestion</h1>
        </div>
        <div class="Condition">
            <h1>Condition d’utilisation</h1>
        </div>
        <div class="Condition">
            <h1>Copyright 2023 - 2024</h1>
        </div>
    </div>

</footer>
<!-- ----- -->

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted
    if (isset($_POST["submit"])) {
        $name = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        $servername = "127.0.0.1:3307";
        $username = "root";
        $password = "";
        $dbname = "newsletter";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO contact (firstname, lastname, phone, msg) VALUES ('$firstname','$name', '$phone','$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
