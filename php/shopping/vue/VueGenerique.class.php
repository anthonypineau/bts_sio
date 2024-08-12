<?php

namespace vue;

use controleur\GestionParametres;

/**
 * Implémentation d'une classe vue pour ce projet
 * Toutes les vues en héritent
 * @author apineau
 * @version 2021
 */
abstract class VueGenerique {

    /** @var string titre de la vue (dans debut.inc.php) */
    private $titre;

    /** @var string chemin d'accès vers le fichier d'inclusion pour l'entête  */
    private $entete;

    /** @var string chemin d'accès vers le fichier d'inclusion pour la partie centrale */
    private $centre;

    /** @var string chemin d'accès vers le fichier d'inclusion pour le pied de page */
    private $pied;

    /** @var bool statut des liens des onglets ; =true => actif ; =false => inactif (dans debut.inc.php) */
    private $lienOngletActif;

    /** @var bool un utilisateur est-il authentifié sur cette session */
    private $estConnecte;
        
    public function __construct() {
        // initialisation des valeurs par défaut
        $this->setTitre('Anthony');
        $this->setEntete('vue/includes/debut.inc.php');
        $this->setPied('vue/includes/fin.inc.php');
    }

    /**
     *  Afficher la vue signifie l'inclure au flux de sortie HTML
     */
    public abstract function afficher();

    // ACCESSEURS ET MUTATEURS


    function getTitre(): string {
        return $this->titre;
    }

    function getEntete(): string {
        return $this->entete;
    }

    function getCentre(): string {
        return $this->centre;
    }

    function getPied(): string {
        return $this->pied;
    }

    function getLienOngletActif(): bool {
        return $this->lienOngletActif;
    }

    public function getEstConnecte() : bool {
        return $this->estConnecte;
    }

    function setTitre(string $titre) {
        $this->titre = $titre;
    }

    function setEntete(string $entete) {
        $this->entete = $entete;
    }

    function setCentre(string $centre) {
        $this->centre = $centre;
    }

    function setPied(string $pied) {
        $this->pied = $pied;
    }


    function setLienOngletActif(bool $lienOngletActif) {
        $this->lienOngletActif = $lienOngletActif;
    }
    
    public function setEstConnecte(bool $estConnecte) {
        $this->estConnecte = $estConnecte;
    }
}