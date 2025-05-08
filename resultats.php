<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

    if ($_SESSION['operation_reussie'] == true) {
    echo "<div class='alert alert-success' role='alert'>";
        }
        else if ($_SESSION['operation_reussie'] == null) {
        echo"<div>";
            }
            else {
            echo "<div class='alert alert-danger' role='alert'>";
                }

            echo $_SESSION['message_operation'];
            echo "</div>";

            $_SESSION['operation_reussie'] = null;
            $_SESSION['message_operation'] = null;

    echo "<!--Permet de faire le tableau avec les équipes-->";

        $requete = "SELECT slogan, rang, score_final, date_partie, equipes.id FROM resultats INNER JOIN equipes ON resultats.equipe_id = equipes.id ORDER BY date_partie DESC";
        $resultat = $mysqli->query($requete);

        if ($resultat)
        {
            if ($mysqli->affected_rows > 0)
            {
                echo "<table class='table'>";
                    echo "<tr>";
                        echo "<th>Slogan</th>";
                        echo "<th>Rang</th>";
                        echo "<th>Score final</th>";
                        echo "<th>Date Partie</th>";
                    echo "</tr>";

                while ($enreg = $resultat->fetch_row())
                {
                    echo" <tr>";
                        echo"    <td>$enreg[0]</td>";
                        echo"    <td>$enreg[1]</td>";
                        echo"    <td>$enreg[2]</td>";
                        echo"    <td>$enreg[3]</td>";
                        echo"    <td><a href='details-equipe.php?id=$enreg[4]' class='boutton-style'> Afficher </a></td>";
                    echo" </tr>";
                }
                echo "</table>";
                echo "<button class='boutton-style' onclick=\"window.location.href='formulaire-resultat.php';\">Ajouter un résultat</button>";
                $resultat->free();
            }
        }
        else
        {
            echo "<p class='message-erreur'>Nous sommes désolés, les items ne peuvent pas être affichés.</p>";
            echo_debug($mysqli->error);
        }
    echo "<!--Vient de apical-->";

    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');
?>
