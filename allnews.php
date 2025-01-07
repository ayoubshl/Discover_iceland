<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add your styles here */

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }

        /* Style for news modal */
        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .news {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 200px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .date {
            color: #3498db;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
        }

        /* Style for 'Tous les news' link */
        .link-2 {
            display: block;
            text-align: center;
            color: #fff;
            background-color: #3498db;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .link-2:hover {
            background-color: #2980b9;
        }

        /* Style for 'S'inscrire à la newsletter' link */
        .link-3 {
            display: block;
            text-align: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            background-color: #4bc970;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .link-3:hover {
            background-color: #45a85f;
        }

        /* Style for the newsletter container */
        .newsletter {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2c3e50;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div>
    <?php

$connection = mysqli_connect('localhost:3307', 'root', '', 'newsletter');

if($connection) {

    $query = "SELECT news_id, titre, contenu, date_publication
                FROM news
                ORDER BY date_publication DESC
                LIMIT 3";
        
    $result = mysqli_query($connection, $query);
        
    while([$id, $titre, $contenu, $date]= mysqli_fetch_row($result)) {
        $date = substr($date, 0, -3);
        echo "<div class='news-$id modal hidden'>
                <div>
                    <div class='news'>
                        <p><b style='font-family: inherit;'>date de publication:</b> $date</p>
                        <h2>$titre</h2>
                        <p>$contenu</p>
                    </div>       
                </div>
            </div>";
    }

    $query = "SELECT news_id, titre, contenu, date_publication
              FROM news
              ORDER BY date_publication DESC";

    $result = mysqli_query($connection, $query); 
    
    if(mysqli_num_rows($result) <= 0) {

        echo "<div class='allnews modal hidden'>
                <div class='news-container'>";

        while([$id, $titre, $contenu, $date] = mysqli_fetch_row($result)) {
            $date = substr($date, 0, -3);

            echo "<div class='news'>
                    <p><b style='font-family: inherit;'>date de publication:</b> $date</p>
                    <h2>$titre</h2>
                    <p>$contenu</p>
                </div>";
        }

        echo "</div>
            </div>
            </div>";            

    } else {
        
        echo "<div class='allnews modal hidden'>
                <div class='newsletter-2'>
                    <table border='2' width='430' class='news-table'>";

        while([$id, $titre, $contenu, $date]= mysqli_fetch_row($result)) {
            $date = substr($date, 0, -3);
            echo "<tr>
                    <td>
                        <p class='date-2'>$date</p>
                        <p class='title-2'>$titre</p>
                        <a class='link-4 details-2' data-number='$id' href='#'>Cliquez ici pour plus de details</a>
                    </td>
                </tr>";
        }

        echo "</table>";

    }
        
} else 
    die("Database connection failed!" . mysqli_error());

?>
    </div>
</body>
</html>
