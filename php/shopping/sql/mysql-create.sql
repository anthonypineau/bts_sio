CREATE TABLE Utilisateur (
    id int PRIMARY KEY,
    civilite varchar(12),
    nom varchar(25) NOT NULL,
    prenom varchar(25) NOT NULL,
    email varchar(25),
    login varchar(25) UNIQUE NOT NULL,
    mdp varchar(255),
    role varchar(20) NOT NULL DEFAULT 'Visiteur'
)ENGINE=INNODB;

