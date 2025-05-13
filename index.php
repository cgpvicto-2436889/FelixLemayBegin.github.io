<?php
require ('include/configuration.inc');
require ('include/entete.inc');

if (isset($_GET['message'])) {
    if ($_GET['message'] === 'ajoutE-ok') {
        echo '<p class="confirmation">Votre equipe a bien été créée !</p>';
    } elseif ($_GET['message'] === 'ajoutR-ok') {
        echo '<p class="confirmation">Votre résultat a bien été ajouté !</p>';
    } elseif ($_GET['message'] === 'envoi-ok') {
        echo '<p class="confirmation">Votre message a bien été envoyé. Merci !</p>';
    } elseif ($_GET['message'] === 'erreur') {
        echo '<p class="erreur">Une erreur est survenue. Veuillez réessayer plus tard.</p>';
    }
}
echo  '<div class="items">';
$requete = "SELECT nom, slogan, id FROM equipes";
$stmt = $pdo->query($requete);

if ($stmt) {
    if ($stmt->rowCount() > 0) {
        while ($enreg = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<div class="item first">';
            echo '<a href="#">';
            echo '<div class="content">';
            echo '</div>';
            echo '<div class="caption">';
            echo '<div class="middle">';
            echo '<i class="fa-solid fa-shield"></i>';
            echo '</div>';
            echo "<div class='title'>$enreg[0]</div>";
            echo "<div class='subtitle'>$enreg[1]</div>";
            echo '</div>';
            echo " <a href='details-equipe.php?id=" . $enreg[2] . "' class='boutton-style'>Joueurs</a> ";
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo "<p class='message-avertissement'>Il n'y a présentement aucun item.</p>";
    }

    // Pas besoin de faire $stmt->free() avec PDO
} else {
    echo "<p class='message-erreur'>Nous sommes désolés, les items ne peuvent pas être affichés.</p>";
    echo_debug($pdo->errorInfo()[2]); // Récupération de l'erreur PDO
}


echo  '</div>';
if (isset($_SESSION['usager'])) {
    echo '<div class="boutton-container">';
    echo '    <a href="formulaire-equipe.php" class="boutton-style">Ajouter une équipe</a>';
    echo '</div>';
}



require ('include/pied-page.inc');
require ('include/nettoyage.inc');
?>