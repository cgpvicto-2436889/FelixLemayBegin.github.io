<?php
    /**
    * Affiche une information de débogage seulement lorsque DEVEL est à true.
    * @author Christiane Lagacé <christiane.lagace@hotmail.com>
    *
    * Utilisation : echo_debug($mysqli->error);
    * Suppositions critiques : pour un meilleur affichage, définir la classe debug dans la feuille de style.
    * @param String $message Information à afficher. Affichera "débogage" si ne reçoit aucun paramètre.
    */
    function echo_debug($message = 'débogage')
    {
        if (defined('DEVEL') && DEVEL === false) {
            echo "<div class='debug'>";

            if (is_array($message) || is_object($message)) {
                print_r($message);
            } else {
                echo $message;
            }

            echo "</div>";
        }
    }
