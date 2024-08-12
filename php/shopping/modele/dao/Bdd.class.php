<?php
namespace modele\dao;

/**
 * Description of Bdd
 * Singleton de connexion à la base de données
 * @author apineau
 * @version 2021
 */

use \PDO;
use \PDOException;

class Bdd {

    /**
     * @var PDO Objet de type PDO, dépositaire de la connexion courante à la BDD
     */
    private static $pdo = null;

    /**
     * Crée un objet de type PDO et ouvre la connexion 
     * @return \PDO un objet de type PDO pour accéder à la base de données
     */
    public static function connecter()  {
        // on ne crée une connexion que si elle n'existe pas déjà ...
        if (is_null(self::$pdo)) {
            try {
                // Attributs de connexion
                $pdo_options = array();
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;       // permet la gestion des exceptions
                $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";  // pour récupérer les données en UTF8
                $pdo_options[PDO::ATTR_CASE] = PDO::CASE_UPPER;                 // pour compatibilité avec Oracle database (noms de champs trancrits en majuscules)
                // instanciation d'un objet de connexion PDO
                self::$pdo = new PDO("mysql:host=localhost;dbname=shopping","root","",$pdo_options);
                
            } catch (PDOException $e) {
                echo "ERREUR : " . $e->getMessage();
                die();
            }
        }
        return self::$pdo;
    }

    public static function deconnecter() {
        self::$pdo = null;
    }

    /**
     * Accesseur
     * @return PDO objet d'accès à la BDD ou bien null
     */
    public static function getPdo()  {
        return self::$pdo;
    }

}