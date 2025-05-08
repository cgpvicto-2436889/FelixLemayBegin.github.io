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
    echo "<!--Vient de apical-->";
    $_SESSION['operation_reussie'] = null;
    $_SESSION['message_operation'] = null;

    $requete = "SELECT nomfamille, prenom, pseudo, courriel FROM joueurs";
    $liste_joueurs = $mysqli->query($requete);

    if ($liste_joueurs)
    {
        if ($mysqli->affected_rows > 0)
        {
            echo "<table class='table'>";
                echo "<tr>";
                    echo "<th>Prenom</th>";
                    echo "<th>Nom</th>";
                    echo "<th>Pseudo</th>";
                    echo "<th>Courriel</th>";
                echo "</tr>";

            while ($enreg = $liste_joueurs->fetch_row())
            {
                echo"<tr>";
                    echo "<td>$enreg[0]</td>";
                    echo "<td>$enreg[1]</td>";
                    echo "<td>$enreg[2]</td>";
                    echo "<td>$enreg[3]</td>";
                echo "</tr>";
            }
            echo "</table>";
            $liste_joueurs->free();
        }
    }
    else
    {
        echo "<p class='message-erreur'>Nous sommes désolés, les items ne peuvent pas être affichés.</p>";
        echo_debug($mysqli->error);
    }

    if (isset($_SESSION['usager'])) {
        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<button class='boutton-style' onclick=\"window.location.href='formulaire-joueurs.php';\">Ajouter un joueur</button>";
        echo "</div>";
    }

    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');