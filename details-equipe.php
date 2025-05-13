<?php
require('include/configuration.inc');
require('include/entete.inc');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation côté PHP

    // Requête SQL avec jointures pour récupérer les joueurs et le nom de l'équipe
    $requete = "
        SELECT joueurs.prenom, joueurs.nomfamille, joueurs.pseudo, equipes.nom AS nom_equipe
        FROM joueurs
        INNER JOIN equipes_joueurs ON joueurs.id = equipes_joueurs.joueur_id
        INNER JOIN equipes ON equipes.id = equipes_joueurs.equipe_id
        WHERE equipes_joueurs.equipe_id = :id
    ";

    try {
        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_NUM);

        if ($resultats && count($resultats) > 0) {
            echo "<table class='table'>";
            echo "<tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Pseudo</th>
                    <th>Équipe</th>
                  </tr>";

            foreach ($resultats as $enreg) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($enreg[0]) . "</td>";
                echo "<td>" . htmlspecialchars($enreg[1]) . "</td>";
                echo "<td>" . htmlspecialchars($enreg[2]) . "</td>";
                echo "<td>" . htmlspecialchars($enreg[3]) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='message-avertissement'>Il n'y a présentement aucun joueur.</p>";
        }

    } catch (PDOException $e) {
        echo "<p class='message-erreur'>Nous sommes désolés, les données ne peuvent pas être affichées.</p>";
        echo "<!-- Erreur : " . htmlspecialchars($e->getMessage()) . " -->";
    }

    echo "<!--Vient de apical-->";
}

require('include/pied-page.inc');
require('include/nettoyage.inc');
?>
