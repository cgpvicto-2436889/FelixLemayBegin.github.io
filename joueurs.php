<?php
require_once 'include/configuration.inc';
require_once 'include/entete.inc';

if (isset($_SESSION['operation_reussie'])) {
    if ($_SESSION['operation_reussie'] === true) {
        echo "<div class='alert alert-success' role='alert'>";
    } elseif ($_SESSION['operation_reussie'] === null) {
        echo "<div>"; // Correction : éviter d'afficher une div vide
    } else {
        echo "<div class='alert alert-danger' role='alert'>";
    }

    echo $_SESSION['message_operation'];
    echo "</div>";
    echo "";
    $_SESSION['operation_reussie'] = null;
    $_SESSION['message_operation'] = null;
}

try {
    // La connexion PDO à PostgreSQL devrait être établie dans configuration.inc
    // Assurez-vous que $pdo est défini dans ce fichier.
    $requete = "SELECT nomfamille, prenom, pseudo, courriel FROM joueurs";
    $stmt = $pdo->prepare($requete); // Utilisation de prepare()
    $stmt->execute();
    $liste_joueurs = $stmt->fetchAll(PDO::FETCH_ASSOC); // Utilisation de fetchAll et FETCH_ASSOC

    if ($liste_joueurs) { // Vérification directe du résultat de fetchAll
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>Prenom</th>";
        echo "<th>Nom</th>";
        echo "<th>Pseudo</th>";
        echo "<th>Courriel</th>";
        echo "</tr>";

        foreach ($liste_joueurs as $joueur) { // Boucle foreach simplifiée
            echo "<tr>";
            echo "<td>" . htmlspecialchars($joueur['prenom']) . "</td>"; // htmlspecialchars pour la sécurité
            echo "<td>" . htmlspecialchars($joueur['nomfamille']) . "</td>";
            echo "<td>" . htmlspecialchars($joueur['pseudo']) . "</td>";
            echo "<td>" . htmlspecialchars($joueur['courriel']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        //$liste_joueurs->free(); // Pas nécessaire avec PDO et fetchAll
    } else {
        echo "<p class='message-erreur'>Aucun joueur trouvé.</p>"; //Message plus approprié.
    }
} catch (PDOException $e) {
    $_SESSION['operation_reussie'] = false;
    $_SESSION['message_operation'] = "Erreur technique : " . $e->getMessage(); // temporairement
    error_log($e->getMessage()); // conserve pour logs}
}


if (isset($_SESSION['usager'])) {
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button class='boutton-style' onclick=\"window.location.href='formulaire-joueurs.php';\">Ajouter un joueur</button>";
    echo "</div>";
}

require ('include/pied-page.inc');
require ('include/nettoyage.inc');
?>
