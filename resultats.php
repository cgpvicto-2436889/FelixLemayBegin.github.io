<?php
require_once 'include/ma-bibliotheque.php';
require_once 'include/configuration.inc'; // Assurez-vous que ce fichier contient la connexion PDO à PostgreSQL

// Affichage du message de session (succès ou erreur)
if (isset($_SESSION['operation_reussie'])) {
    if ($_SESSION['operation_reussie'] === true) {
        echo "<div class='alert alert-success' role='alert'>";
    } elseif ($_SESSION['operation_reussie'] === null) {
        echo "<div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>";
    }

    echo htmlspecialchars($_SESSION['message_operation'] ?? '');
    echo "</div>";

    $_SESSION['operation_reussie'] = null;
    $_SESSION['message_operation'] = null;
}

// Récupération des résultats depuis la base PostgreSQL
try {
    $requete = "
        SELECT slogan, rang, score_final, date_partie, equipes.id 
        FROM resultats 
        INNER JOIN equipes ON resultats.equipe_id = equipes.id 
        ORDER BY date_partie DESC
    ";

    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultats && count($resultats) > 0) {
        echo "<table class='table'>";
        echo "<tr>
                <th>Slogan</th>
                <th>Rang</th>
                <th>Score final</th>
                <th>Date Partie</th>
                <th>Actions</th>
              </tr>";

        foreach ($resultats as $resultat) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($resultat['slogan']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['rang']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['score_final']) . "</td>";
            echo "<td>" . htmlspecialchars($resultat['date_partie']) . "</td>";
            echo "<td><a href='details-equipe.php?id=" . urlencode($resultat['id']) . "' class='boutton-style'>Afficher</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<button class='boutton-style' onclick=\"window.location.href='formulaire-resultat.php';\">Ajouter un résultat</button>";
    } else {
        echo "<p class='message-erreur'>Aucun résultat trouvé.</p>";
    }

} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des résultats : " . htmlspecialchars($e->getMessage()) . "</p>";
}

require('include/pied-page.inc');
require('include/nettoyage.inc');
?>