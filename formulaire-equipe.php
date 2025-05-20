<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

if (isset($_SESSION['usager'])) {
    $requete = "SELECT id, nom FROM jeux";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo '<form id="contactForm" method="post" action="ajouter-equipe.php">';
    echo '<h2 style="text-align: center;">AJouter une équipe</h2>';
    echo '<label for="nom">Nom * :</label>';
    echo '<input type="text" id="nom" name="nom" maxlength="50">';
    echo '<span class="message-erreur-formulaire" id="erreurNom"></span>';

    echo '<label for="slogan">Slogan * :</label>';
    echo '<input type="text" id="slogan" name="slogan" maxlength="100">';
    echo '<span class="message-erreur-formulaire" id="erreurSlogan"></span>';

    echo '<label for="dateAjout">Date ajout *:</label>';
    echo '<input type="date" id="dateAjout" name="dateAjout">';
    echo '<span class="message-erreur-formulaire" id="erreurDateAjout"></span>';

    echo '<label for="jeu">Jeu *:</label>';
    echo '<select name="jeu" id="jeu">';
    foreach ($resultat as $jeu) {
        echo '<option value="' . htmlspecialchars($jeu['id']) . '">';
        echo htmlspecialchars($jeu['id']) . ' - ' . htmlspecialchars($jeu['nom']);
        echo '</option>';
    }
    echo '</select>';
    echo '<button name="boutton-soumission" class="boutton-style" type="submit">Envoyer</button>';
    echo '</form>';
}
else{
    echo '<div class="container">';
    echo '<p class="alert alert-danger">Vous devez être connecté pour accéder à cette page.</p>';
    echo '</div>';
}

    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');
