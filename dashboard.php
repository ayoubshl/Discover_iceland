<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/dashboard.css">
    <script defer src="./javaScript/dashboard.js"></script>
</head>

<body>
    <div class="header">
        <h1>welcome back, admin</h1>
        <a href="index.php">Disconnect</a>
    </div>
    <div class="ajouter">
        <p>Ajouter des news: &nbsp;&nbsp;&nbsp;</p>
        <button class="btn btn-ajouter">Ajouter</button>
    </div>
    <table align="center" border="2px">
        <tr>
            <th>Titre</th>
            <th width="400">Résumé</th>
            <th width="190">Date de publication</th>
            <th>Actions</th>
        </tr>
        <?php

            $connection = mysqli_connect('localhost:3307', 'root', '', 'newsletter');

            if($connection) {

                $query = "SELECT news_id, titre, résumé, date_publication
                          FROM news
                          ORDER BY date_publication DESC";

                $result = mysqli_query($connection, $query);

                while([$id, $titre, $resume, $date]= mysqli_fetch_row($result)) {
                    echo "<tr>
                            <td>$titre</td>
                            <td>$resume</td>
                            <td>$date</td>
                            <td>
                                <form action='dashboard.php' method='post'>
                                    <button data-number='$id' class='btn-modify'>Modifier</button>
                                    <button type='submit' name='delete-$id'>Supprimer</button>
                                </form>
                            </td>
                        </tr>";
                }

            } else 
                die("Database connection failed!" . mysqli_error());

        ?>
    </table>



    <div class="modal-ajouter modal hidden">
        <button class="close-button">&times;</button>
        <form class="form" action="dashboard.php" method="post">
            <h1> Ajouter des news </h1>

            <fieldset>

                <label for="titre">Titre:<label>
                        <input type="text" id="titre" name="titre" required>

                        <label for="resume">résumé:</label>
                        <textarea  class="resume" id="resume" name="resume" required></textarea>

                        <label for="contenu">contenu:</label>
                        <textarea  class="contenu" id="contenu" name="contenu" required></textarea>

            </fieldset>
            <button class="btn-form" type="submit" name="submit-1">Ajouter</button>
        </form>
    </div>

    <?php

        $connection = mysqli_connect('localhost:3307', 'root', '', 'newsletter');
        if($connection) {

            $query = "SELECT news_id, titre, résumé, contenu
                      FROM news";

            $result = mysqli_query($connection, $query);

            while([$id, $titre, $resume, $contenu]= mysqli_fetch_row($result)) {

                echo "<div class='news-$id modal hidden'>
                        <button class='close-button'>&times;</button>
                        <form class='form' action='dashboard.php' method='post'>
                            <h1> Modifier des news </h1>
                            <fieldset>
        
                                <label for='titre'>Titre:<label>
                                <input type='text' id='titre' name='titre' value='$titre' required>
        
                                <label for='resume'>résumé:</label>
                                <textarea class='resume' id='resume' name='resume' required>$resume</textarea>
        
                                <label for='contenu'>contenu:</label>
                                <textarea class='contenu' id='contenu' name='contenu' required>$contenu</textarea>
        
                            </fieldset>
                            <button class='btn-form' type='submit' name='submitnews-$id'>Modifier</button>
                        </form>
                    </div>";
                
            }

        }

    ?>
    <div class="register-modal modal hidden">
        <button class="close-button">&times;</button>
        <div class="form-panel two">
            <div class="form-header">
                <h1>S'inscrice à la newsletter</h1>
            </div>
            <div class="form-content">
                <form method="POST" action="registration.php">
                    <div class="form-group">
                        <label for="firstname">Prenom</label>
                        <input type="text" id="firstname" name="firstname" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" id="lastname" name="lastname" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required="required" />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">S'incrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="overlay hidden"></div>

</body>

</html>

<?php

if(isset($_POST['submit-1'])) {
    
    $titre = $_POST['titre'];
    $resume = $_POST['resume'];
    $contenu = $_POST['contenu'];

    $connection = mysqli_connect('localhost:3307', 'root', '', 'newsletter');

    if($connection) {

        $query = "INSERT INTO news(titre, résumé, contenu) VALUES
                  ('$titre', '$resume', '$contenu')";

        $result = mysqli_query($connection, $query);

    } else 
        die("Database connection failed!" . mysqli_error());
}

$connection = mysqli_connect('localhost:3307', 'root', '', 'newsletter');

if($connection) {

    $query = "SELECT MAX(news_id)
                FROM news";

    $result = mysqli_query($connection, $query);
    [$max_id] = mysqli_fetch_row($result);
    
    for($id = 1; $id <= $max_id; $id++) 
        if(isset($_POST["delete-$id"])) {
            
            $query = "DELETE FROM news
                      WHERE news_id = $id";

            $result = mysqli_query($connection, $query);

        }

    for($id = 1; $id <= $max_id; $id++) 
        if(isset($_POST["submitnews-$id"])) {

            $titre = $_POST['titre'];
            $resume = $_POST['resume'];
            $contenu = $_POST['contenu'];
            
            $query = "UPDATE news
                      SET titre = '$titre',
                      résumé = '$resume',
                      contenu = '$contenu'
                      WHERE news_id = $id";

            $result = mysqli_query($connection, $query);

        }


} else 
    die("Database connection failed!" . mysqli_error());

?>