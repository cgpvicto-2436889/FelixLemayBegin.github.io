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
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le joueur.";
            error_log($e->getMessage()); // Tu dois avoir une fonction log_debug définie
        }
    }

    header('Location: joueurs.php');
    exit;
    require('include/nettoyage.inc');
} else {
    header("Location: joueurs.php");
    exit;
    require('include/nettoyage.inc');
}