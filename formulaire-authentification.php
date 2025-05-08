<?php
require ('include/configuration.inc');
require ('include/entete.inc');
?>

    <form id="contactForm" method="post" action="verifier-authentification.php">
        <h2 style="text-align: center;">Connecter-vous</h2>
        <label for="code">Code * :</label>
        <input type="text" id="Code" name="code" maxlength="100">
        <span class="message-erreur-formulaire" id="erreurCode"></span>

        <label for="motdepasse">Mot de passe * :</label>
        <input type="text" id="motdepasse" name="motdepasse">
        <span class="message-erreur-formulaire" id="erreurMotDePasse"></span>

        <button name="boutton-soumission" class="boutton-style" type="submit">Se connecter</button>
    </form>

<?php
require ('include/pied-page.inc');
require ('include/nettoyage.inc');
?>