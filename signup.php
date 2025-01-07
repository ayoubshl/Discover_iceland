<!DOCTYPE html>
<html>
        <link rel="stylesheet" type="text/css" href= "login.css" />
        <title></title>
        <meta charset="utf-8" />
        
        <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2c3e50;
            margin: 0;
        }

        #join {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        legend {
            color: #3498db;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #3498db;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4bc970;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a85f;
        }
    </style>
       
    <body>
        
        <div >
        <div id="join" > 
                            <h1> veuiller entrer votre nom et email</h1>
                            <form  name="quest1"  action="" method="post" >
                                <legend>nom:</legend>
                                <input type="text" name="nom" required><br>
                                <legend>email:</legend>
                                <input type="text" name="mail" required><br>
                                <input type="submit"  name="submit">
                            </form>
                            <?php
                              if (isset($_POST['submit'])) {
                                joinNewsletter();
                            }
                            
                            function joinNewsletter() {
                                $conn = mysqli_connect("localhost:3307", "root", "", "newsletter");
                            
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                            
                                $nom = mysqli_real_escape_string($conn, $_POST['nom']);
                                $email = mysqli_real_escape_string($conn, $_POST['mail']);
                            
                                $insert = "INSERT INTO internaute (nom, email) VALUES ('$nom', '$email')";
                            
                                if (mysqli_query($conn, $insert)) {
                                    echo "Record added successfully";
                                } else {
                                    echo "Error adding record: " . mysqli_error($conn);
                                }
                            
                                mysqli_close($conn);
                            }
                            
                               ?>
                        </div>
        </div> 
       
    </body>
 
</html>