<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Sécurisation de l'ID

            // Requête SQL pour récupérer les joueurs et le nom de l'équipe
            $requete = "SELECT joueurs.prenom, joueurs.nomfamille, joueurs.pseudo, equipes.nom AS nom_equipe FROM joueurs INNER JOIN equipes_joueurs ON joueurs.id = equipes_joueurs.joueur_id INNER JOIN equipes ON equipes.id = equipes_joueurs.equipe_id WHERE equipes_joueurs.equipe_id = $id";

            $resultat = $mysqli->query($requete);

            if ($resultat) {
                if ($mysqli->affected_rows > 0) {
                    echo "<table class='table'>";
                        echo "<tr>";
                            echo "<th>Prénom</th>";
                            echo "<th>Nom</th>";
                            echo "<th>Pseudo</th>";
                            echo "<th>Équipe</th>";
                        echo "</tr>";

                    while ($enreg = $resultat->fetch_row()) {
                        echo "<tr>";
                            echo "<td>{$enreg[0]}</td>";
                            echo "<td>{$enreg[1]}</td>";
                            echo "<td>{$enreg[2]}</td>";
                            echo "<td>{$enreg[3]}</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='message-avertissement'>Il n'y a présentement aucun joueur.</p>";
                }
                $resultat->free();
            } else {
                echo "<p class='message-erreur'>Nous sommes désolés, les données ne peuvent pas être affichées.</p>";
                echo_debug($mysqli->error);
            }
            echo "<!--Vient de apical-->";
        }
    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');

