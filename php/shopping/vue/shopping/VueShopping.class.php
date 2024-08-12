<?php

namespace vue\shopping;

use vue\VueGenerique;

/**
 * Description Page shopping
 *
 * @author apineau
 * @version 2021
 */
class VueShopping extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficher() {
        include $this->getEntete();
        ?>
        <div class="formulaire">
            <form>
                <div>
                    <label for="article">Article :</label>
                    <input type="text" id="article" name="article" required>
                    <input type="submit" value="Ajouter">
                </div>
            </form>
        </div>

        <p>Test</p>
        <button onclick="buttonAlert()">Click</button>
        <?php
        include $this->getPied();
    }

}