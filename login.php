<!DOCTYPE html>
<html>
        <link rel="stylesheet" type="text/css" href= "login.css" />
        <title></title>
        <meta charset="utf-8" />
        <script>
             function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }
        
             function closeNav() {
                 document.getElementById("mySidenav").style.width = "0";
             }
             function popup(id){
            document.getElementById(id).style.display="block";

            }
            function closepop(id){
            document.getElementById(id).style.display="none";
            }
        </script>
        <style>
            body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

#mySidenav {
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    color: white;
}

#mySidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

#mySidenav a:hover {
    color: #f1f1f1;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

legend {
    font-weight: bold;
    margin-bottom: 10px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error-message {
    color: red;
    text-align: center;
}
        </style>
       
    <body>
        
        <div >
            <div >
            <div >
                                
                                <h1> Insert your username and password</h1>
                            <form  name="quest1"  action="" method="post" >
                                <legend>usrname:</legend>
                                <input type="text" name="username"><br>
                                <legend>password:</legend>
                                <input type="password" name="password"><br>
                                <input type="submit"  name="dkhel">
                            </form>
                            <?php
                            $conn = new mysqli("localhost:3307", "root", "", "newsletter");
                            if ($conn->connect_error) {
                            die("Connection failed:" . $conn->connect_error);}

                            if(isset($_POST['dkhel'])) {

                                $username = $_POST['username'];
                                $password = $_POST['password'];

                                if($username === 'admin' && $password === 'admin') {
                                    header("Location: dashboard.php");
                                    
                                    exit;

                                } else 
                                    echo "<p>L'identifiant ou le mot de passe est incorrect</p>";
                            }

                        ?>
                        </div>
            </div>    
        </div> 
       
    </body>
 
</html>