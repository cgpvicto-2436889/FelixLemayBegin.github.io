<?php
require('include/configuration.inc');

$_SESSION['operation_reussie'] = null;

if (!empty($_POST)) {
    // Traitement du formulaire à venir
} else {
    header("Location: index.php");
    exit;
}

// Sécurisation des données entrantes
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur);
}

// Récupération des données
$nom = $_POST['nom'] ?? null;
$slogan = $_POST['slogan'] ?? null;
$dateAjout = $_POST['dateAjout'] ?? null;
$jeu = $_POST['jeu'] ?? null;

$messageErreur = '';

// Traitement d'insertion avec PDO
if ('' === $messageErreur) {
    $requete = "INSERT INTO equipes (nom, slogan, dateajout, jeu_id) VALUES (:nom, :slogan, :dateAjout, :jeu)";

    try {
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':slogan', $slogan, PDO::PARAM_STR);
        $stmt->bindParam(':dateAjout', $dateAjout, PDO::PARAM_STR); // format ISO YYYY-MM-DD
        $stmt->bindParam(':jeu', $jeu, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "Le client a été ajouté avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 1).";
            log_debug(implode(', ', $stmt->errorInfo()));
        }
    } catch (PDOException $e) {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Erreur technique : " . $e->getMessage(); // temporairement
        error_log($e->getMessage()); // conserve pour logs
    } catch (Error $e) {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 3).";
        log_debug($e->getMessage());
    }
}

header('Location: index.php');

require('include/nettoyage.inc');
