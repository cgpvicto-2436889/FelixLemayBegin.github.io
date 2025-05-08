<?php
require_once 'include/configuration.inc'; // Assurez-vous que ce fichier contient la connexion PDO à PostgreSQL
require_once 'include/entete.inc';

try {
    $requete = "SELECT id, slogan FROM equipes";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $equipes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des équipes : " . htmlspecialchars($e->getMessage()) . "</p>";
    // Consider logging the error for debugging
    $equipes = []; // Ensure $equipes is defined to avoid errors later
}
?>

<form id="contactForm" method="post" action="ajouter-resultat.php">
    <h2 style="text-align: center;">Ajouter un résultat</h2>
    <label for="equipe">Slogan *:</label>
    <select name="equipe" id="equipe">
        <?php if (empty($equipes)): ?>
            <option value="" disabled>Aucune équipe disponible</option>
        <?php else: ?>
            <?php foreach ($equipes as $equipe) : ?>
                <option value="<?= htmlspecialchars($equipe['id']) ?>">
                    <?= htmlspecialchars($equipe['slogan']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
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