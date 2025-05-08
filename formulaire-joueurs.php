<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

    if (isset($_SESSION['usager'])) {
        echo '<form id="contactForm" method="post" action="traiter-joueurs.php">';
        echo '<h2 style="text-align: center;">AJouter un joueur</h2>s';
        echo '<label for="nom">Nom * :</label>';
        echo '<input type="text" id="nom" name="nom" maxlength="100">';
        echo '<span class="message-erreur-formulaire" id="erreurNom"></span>';

        echo '<label for="prenom">Prenom * :</label>';
        echo '<input type="text" id="prenom" name="prenom">';
        echo '<span class="message-erreur-formulaire" id="erreurPrenom"></span>';

        echo '<label for="pseudo">Pseudo * :</label>';
        echo '<input class="" type="text" id="pseudo" name="pseudo" maxlength="100">';
        echo '<span class="message-erreur-formulaire" id="erreurPseudo"></span>';

        echo '<label for="courriel">Courriel * :</label>';
        echo '<input type="text" id="courriel" name="courriel">';
        echo '<span class="message-erreur-formulaire" id="erreurCourriel"></span>';

        echo '<button name="boutton-soumission" class="boutton-style" type="submit">Envoyer</button>';
        echo '</form>';
    }
    else {
        echo '<div class="container">';
        echo '<p class="alert alert-danger">Vous devez être connecté pour accéder à cette page.</p>';
        echo '</div>';
    }
    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');
?>