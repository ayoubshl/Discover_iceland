<?php include 'header.php'; ?>

<div class="flex-container">
    <?php include 'sidenav.php'; ?>

    <section class="media" id="media">
        <div class="main-container">
            <div class="image image-1">
                <img src="https://images.unsplash.com/photo-1617191979724-f755c6d83e01?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" alt="Erupting Volcano">
                <h3>Erupting Volcano</h3>
            </div>
            <!-- Add more images here -->
        </div>
    </section>

    <div class="video-container">
        <iframe width="300" height="300" src="./videos/ICELAND｜Cinematic Video.mp4" frameborder="0" allowfullscreen></iframe>
        <div class="newsletter">
            <table border="2" width="380" class="news_table">
                <?php
                include 'db_connection.php';

                $query = "SELECT news_id, titre, date_publication FROM news ORDER BY date_publication DESC LIMIT 3";
                $result = mysqli_query($conn, $query);

                while ([$id, $titre, $date] = mysqli_fetch_row($result)) {
                    $date = substr($date, 0, -3);
                    echo "<tr>
                            <td>
                                <p class='date'>$date</p>
                                <p class='title'>$titre</p>
                                <a class='link details' data-number='$id' href='#'>Cliquez ici pour plus de details</a>
                            </td>
                          </tr>";
                }

                mysqli_close($conn);
                ?>
                <tr>
                    <td>
                        <a class="link-2" href="allnews.php">&#x226B; Tous les news</a>
                    </td>
                </tr>
            </table>
            <a class="link-3" href="signup.php">S'inscrire à la newsletter</a>
            <a class="link-3" href="login.php">Se connecter</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>