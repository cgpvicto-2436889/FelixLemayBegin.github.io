<?php
    require ('include/configuration.inc');
    require ('include/entete.inc');

    $requete = "SELECT id, slogan FROM equipes";
    $resultat = $mysqli->query($requete);
?>


    <form id="contactForm" method="post" action="ajouter-resultat.php">
        <h2 style="text-align: center;">AJouter un résultat</h2>
        <label for="equipe">Slogan *:</label>
        <select name="equipe" id="equipe">
            <?php while ($equipe = $resultat->fetch_assoc()) : ?>
                <option value="<?= htmlspecialchars($equipe['id'])?>">
                    <?=htmlspecialchars($equipe['slogan']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="rang">Rang * :</label>
        <input type="text" id="rang" name="rang">
        <span class="message-erreur-formulaire" id="erreurRang"></span>

        <label for="scoreFinal">Score final * :</label>
        <input type="text" id="scoreFinal" name="scoreFinal" maxlength="100">
        <span class="message-erreur-formulaire" id="erreurScoreFinal"></span>

        <label for="dateAjout">Date ajout *:</label>
        <input type="date" id="dateAjout" name="dateAjout">
        <span class="message-erreur-formulaire" id="erreurDateAjout"></span>

        <button name="boutton-soumission" class="boutton-style" type="submit">Envoyer</button>
    </form>

<?php
    require ('include/pied-page.inc');
    require ('include/nettoyage.inc');
?>