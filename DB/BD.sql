CREATE DATABASE newsletter;

CREATE TABLE News(
    news_id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(30),
    résumé VARCHAR(90),
    contenu TEXT(400),
    date_publication DATETIME DEFAULT NOW()
);

CREATE TABLE Internaute(
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(30)
);