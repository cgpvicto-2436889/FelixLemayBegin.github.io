<?php
    require ('include/configuration.inc');

if (!empty($_POST)) {

    // Sécurisation des données (contre XSS)
    foreach ($_POST as $cle => $valeur) {
        $_POST[$cle] = htmlspecialchars($valeur);
    }

    $nomfamille = $_POST["nom"] ?? '';
    $prenom     = $_POST["prenom"] ?? '';
    $pseudo     = $_POST["pseudo"] ?? '';
    $courriel   = $_POST["courriel"] ?? '';

    $messageErreur = '';

    // Tu peux ajouter ici des vérifications (ex : email valide, champs non vides, etc.)

    if ('' == $messageErreur) {
        $requete = "INSERT INTO joueurs (nomfamille, prenom, pseudo, courriel) VALUES (:nomfamille, :prenom, :pseudo, :courriel)";

        try {
            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':nomfamille', $nomfamille);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':courriel', $courriel);
            $stmt->execute();

            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "Le joueur a été ajouté avec succès !";

        } catch (PDOException $e) {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Erreur technique : " . $e->getMessage(); // temporairement
            error_log($e->getMessage()); // conserve pour logs}
        }
    }

    require('include/nettoyage.inc');
    header('Location: joueurs.php');
    exit;

} else {
    require('include/nettoyage.inc');
    header("Location: joueurs.php");
    exit;

}