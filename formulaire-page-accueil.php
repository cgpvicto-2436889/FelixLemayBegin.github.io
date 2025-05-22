<?php
require('include/configuration.inc');
require('include/entete.inc');

// Protection : seuls les utilisateurs connectés peuvent accéder
if (isset($_SESSION['usager'])) {

// Charger le texte actuel depuis la base
    $stmt = $pdo->prepare("SELECT texte FROM pages WHERE url = 'index'");
    $stmt->execute();
    $page = $stmt->fetch();

    echo '<form id="contactForm" method="post" action="traiter-joueurs.php">';
    echo '<h2 style="text-align: center;">Ajouter un joueur</h2>';

    echo '<label for="texteIndex">Texte dans l’entête de index :</label>';
    echo '<textarea name="texte" class="tinymce" rows="15" cols="80">' . $page['texte'] . '</textarea>';
    echo '<span class="message-erreur-formulaire" id="erreurNom"></span>';
    echo '<button type="submit">Enregistrer</button>';
    echo '</form>';
}
else{
    echo '<div class="container">';
    echo '<p class="alert alert-danger">Vous devez être connecté pour accéder à cette page.</p>';
    echo '</div>';
}

require ('include/pied-page.inc');
require ('include/nettoyage.inc');
