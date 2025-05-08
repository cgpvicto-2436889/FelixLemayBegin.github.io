<?php
session_start();
require_once 'include/ma-bibliotheque.php';
require_once 'include/configuration.inc'; // Assurez-vous que ce fichier contient la connexion PDO à PostgreSQL

if (isset($_SESSION['operation_reussie'])) {
    if ($_SESSION['operation_reussie'] === true) {
        echo "<div class='alert alert-success' role='alert'>";
    } elseif ($_SESSION['operation_reussie'] === null) {
        echo "<div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>";
    }

    echo $_SESSION['message_operation'];
    echo "</div>";

    $_SESSION['operation_reussie'] = null;
    $_SESSION['message_operation'] = null;
}

echo "";

try {
    // La connexion PDO à PostgreSQL doit être établie dans configuration.inc
    $requete = "SELECT slogan, rang, score_final, date_partie, equipes.id 
                    FROM resultats 
                    INNER JOIN equipes ON resultats.equipe_id = equipes.id 
                    ORDER BY date_partie DESC";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); // Utilisez fetchAll et FETCH_ASSOC

    if ($resultats) {
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>Slogan</th>";
        echo "<th>Rang</th>";
        echo "<th>Score final</th>";
        echo "<th>Date Partie</th>";
        echo "<th>Actions</th>"; // Ajout d'une colonne pour le lien
        echo "</tr>";

        foreach ($resultats as $resultat) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($resultat['slogan']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['rang']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['score_final']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['date_partie']) . "</td>";
            echo "<td><a href='details-equipe.php?id=" . htmlspecialchars($resultat['id']) . "' class='boutton-style'>Afficher</a></td>"; // Utilisation de l'ID de l'équipe
            echo "</tr>";
        }
        echo "</table>";
        echo "<button class='boutton-style' onclick=\"window.location.href='formulaire-resultat.php';\">Ajouter un résultat</button>";
    } else {
        echo "<p class='message-erreur'>Aucun résultat trouvé.</p>"; // Message plus approprié
    }
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des résultats : " . htmlspecialchars($e->getMessage()) . "</p>"; // Afficher l'erreur PDO
}

echo "";

require ('include/pied-page.inc');
require ('include/nettoyage.inc');
?>