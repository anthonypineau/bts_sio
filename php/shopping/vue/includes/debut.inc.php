<?php

/**
 * Code inclus en tête de chaque vue
 * @var string $titre de l'onglet concerné
 * @var string $version statut des liens des onglets ; =true => actif ; =false => inactif
 * @var bool $lienOngletActif statut des liens des onglets ; =true => actif ; =false => inactif
 * @author apineau
 * @version 2021
 */
use controleur\GestionParametres;
?>
<!DOCTYPE html">
<html lang="fr">
    <head>
        <title><?= $this->getTitre() ?></title>
        <!--<base href="<?= GestionParametres::get('racineWeb') ?>" />-->
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../shopping/vue/styles/cssGeneral.css" rel="stylesheet" type="text/css">
        <link href="../shopping/vue/styles/cssOnglets.css" rel="stylesheet" type="text/css">
        <script src="../shopping/includes/main.js"></script>
        <!--<link rel="shortcut icon" type="image/png" href="/logo-guitare.png"/>-->
    </head>
    <body class='basePage'>
        <div id="entete">
            <?php
            // bouton de connexion ou de déconnexion et identité de l'utilisateur connecté
            include "vue/includes/boutonConnexion.inc.php";
            ?>
            <div id="entete_version">version : <?= GestionParametres::get("version") ?> / auteur : <?= GestionParametres::get("auteur") ?></div>
        </div>
        <!--  Tableau contenant le titre et les menus -->
        <table width="100%" cellpadding="0" cellspacing="0">
            <!-- Titre -->
            <tr> 
                <td class="titre">Anthony Pinaeu <br>
                    <span id="texteNiveau2" class="texteNiveau2">Application</span><br>&nbsp;
                </td>
            </tr>
            <!-- Menus -->
            <tr> 
                <td>
                    <!-- On inclut le fichier de gestion des onglets ; si on a des 
                    menus traditionnels, il faudra inclure le fichier adéquat -->
                    <?php include "vue/includes/onglets.inc.php"; ?>

                    <div id='barreMenus'>
                        <ul class='menus'>
                            <?php
                            if (isset($_GET['controleur'])) {
                                $controleur = $_GET['controleur'];
                            } else {
                                // le contrôleur par défaut est CtrlAccueil
                                $controleur = 'accueil';
                            }
                            $lienOngletActif = $this->getLienOngletActif();
                            for ($i = 0; $i < count(getTabOnglets()); $i++) {
                                echo construireMenu($i, $controleur, $lienOngletActif);
                            }
                            ?>
                        </ul>
                    </div>

                </td>
            </tr>
            <!-- Fin des menus -->
            <tr>
                <td class="basePage">
                    <br /><center><br />