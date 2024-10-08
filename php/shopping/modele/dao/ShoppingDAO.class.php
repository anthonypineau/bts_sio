<?php
namespace modele\dao;

use modele\metier\Utilisateur;
use PDO;

/**
 * Copyright (c)
 * @author apineau
 * @version 2021
 */

 /*
use Shopping;
use PDO;
use PDOStatement;
*/

class ShoppingDAO {
    
    /**
     * Instancier un objet de la classe Shopping à partir d'un enregistrement de la table shopping
     * @param array $enreg
     * @return Shopping
     */
    private static function enregVersMetier(array $enreg) {
        $titre = $enreg['TITRE'];
        $shopping = new Shopping($titre);

        return $shopping;
    }

    /**
     * Valorise les paramètres d'une requête préparée avec l'état d'un objet Shopping
     * @param Shopping $objet Metier un shopping
     * @param PDOStatement $stmt requête préparée
     */
    private static function metierVersEnreg(Shopping $objetMetier, PDOStatement $stmt) {
        // On utilise bindValue plutôt que bindParam pour éviter des variables intermédiaires
        // Note : bindParam requiert une référence de variable en paramètre n°2 ;
        // avec bindParam, la valeur affectée à la requête évoluerait avec celle de la variable sans
        // qu'il soit besoin de refaire un appel explicite à bindParam

        $stmt->bindValue(':titre', $objetMetier->getTitre());
    }

    /**
     * Retourne la liste de tous les shoppings
     * @return array tableau d'objets de type Shopping
     */
    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM test";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau shopping au tableau
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }

    /**
     * Recherche un lieu selon la valeur de son identifiant
     * @param string $id
     * @return Lieu le groupe trouvé ; null sinon
     */
    public static function getOneById($id) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Lieu WHERE idLieu = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }

    /**
     * Insérer un nouveau lieu dans la table à partir de l'état d'un objet métier
     * @param Lieu $objet objet métier à insérer
     * @return boolean =FALSE si l'opération échoue
     */
    public static function insert(Lieu $objet) {
        $requete = "INSERT INTO Lieu VALUES (:idLieu, :nomLieu, :adrLieu, :capAccueil)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }

    /**
     * Mettre à jour enregistrement dans la table à partir de l'état d'un objet métier
     * @param string identifiant de l'enregistrement à mettre à jour
     * @param Lieu $objet objet métier à mettre à jour
     * @return boolean =FALSE si l'opérationn échoue
     */
    public static function update($id, Lieu $objet) {
        $ok = false;
        $requete = "UPDATE  Lieu SET nomLieu =:nomLieu, adrLieu =:adrLieu,
           capAccueil =:capAccueil WHERE idLieu =:idLieu";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':idLieu', $id);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }

    /**
     * Détruire un enregistrement de la table LIEU d'après son identifiant
     * @param string identifiant de l'enregistrement à détruire
     * @return boolean =TRUE si l'enregistrement est détruit, =FALSE si l'opération échoue
     */
    public static function delete($id) {
        $ok = false;
        $requete = "DELETE FROM Lieu WHERE idLieu = :idLieu";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idLieu', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

    /**
     * Permet de vérifier s'il existe ou non un lieu ayant déjà le même identifiant dans la BD
     * @param string $id identifiant du lieu à tester
     * @return boolean =true si l'id existe déjà, =false sinon
     */
    public static function isAnExistingId($id) {
        $requete = "SELECT COUNT(*) FROM Lieu WHERE idLieu =:idLieu";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idLieu', $id);
        $stmt->execute();
        return $stmt->fetchColumn(0);
    }
}
