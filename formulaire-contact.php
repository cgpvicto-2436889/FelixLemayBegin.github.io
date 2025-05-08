<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

    if (isset($_SESSION['usager'])) {
        echo '<form id="contactForm" method="post" action="traiter-contact.php">';
        echo '<h2 style="text-align: center;">Contactez-nous</h2>';
        echo '<label for="nom">Nom * :</label>';
        echo '<input type="text" id="nom" name="nom" maxlength="100">';
        echo '<span class="message-erreur-formulaire" id="erreurNom"></span>';

        echo '<label for="courriel">Courriel * :</label>';
        echo '<input type="text" id="courriel" name="courriel">';
        echo '<span class="message-erreur-formulaire" id="erreurCourriel"></span>';

        echo '<label for="sujet">Sujet * :</label>';
        echo '<input class="" type="text" id="sujet" name="sujet" maxlength="100">';
        echo '<span class="message-erreur-formulaire" id="erreurSujet"></span>';

        echo '<label for="message">Message * :</label>';
        echo '<textarea id="message" name="message"></textarea>';
        echo '<span class="message-erreur-formulaire" id="erreurMessage"></span>';

        echo '<button name="boutton-soumission" class="boutton-style" type="submit">Envoyer</button>';
        if (isset($_SESSION['usager'])) {
            echo '<a href="liste-demandes.php" class="boutton-style">Voir les contacts</a>';
        }
        echo '</form>';
    }
    else {
        echo '<div class="container">';
        echo '<p class="alert alert-danger">Vous devez être connecté pour accéder à cette page.</p>';
        echo '</div>';
    }

    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');
