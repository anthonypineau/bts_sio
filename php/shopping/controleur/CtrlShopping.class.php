<?php
/**
 * Contrôleur de la page d'accueil
 * @author apineau
 * @version 2021
 */

namespace controleur;

use vue\shopping\VueShopping;

class CtrlShopping extends ControleurGenerique {

    /** controleur= accueil & action= defaut
     * Afficher la page d'accueil      */
    function defaut() {
        $this->vue = new VueShopping();
        $this->vue->setTitre("Anthony - shopping");
        if (SessionAuthentifiee::estConnecte()) {
            parent::controlerVueAutorisee();
        }else{
            parent::controlerVueNonAutorisee();
        }
        $this->vue->afficher();

    }
}