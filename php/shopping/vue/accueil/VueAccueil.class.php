<?php

namespace vue\accueil;
use vue\VueGenerique;

/**
 * Description Page d'accueil du site
 *
 * @author apineau
 * @version 2021
 */
class VueAccueil extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficher() {
        include $this->getEntete();
        ?>
            <h1>Bienvenue sur mon site</h1>
        <?php
        include $this->getPied();
    }

}