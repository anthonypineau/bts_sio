<?php
namespace modele\metier;

/**
 * Description of Utilisateur
 *
 * @author apineau
 */
class Utilisateur {
    private $id;
    private $login;
    private $mdp;

    
    function __construct($id, $login, $mdp) {
        $this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
    }
    public function __toString() {
        return get_class($this). "{ id=". $this->id . " - login=". $this->login . "- mdp= ". $this->mdp . "}";
    }

    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }
}