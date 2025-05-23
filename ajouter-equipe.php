<?php
require('include/configuration.inc');
$_SESSION['operation_reussie'] = null;

if (empty($_POST)) {
    header("Location: index.php");
    exit;
}

// Sécurisation des données entrantes
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur);
}

// Récupération des données avec fallback
$nom       = $_POST['nom'] ?? '';
$slogan    = $_POST['slogan'] ?? '';
$dateAjout = $_POST['dateAjout'] ?? '';
$jeu       = isset($_POST['jeu']) ? (int)$_POST['jeu'] : null;

$messageErreur = '';

// Validation simple
if (empty($nom) || empty($dateAjout) || empty($jeu)) {
    $messageErreur = "Veuillez remplir tous les champs obligatoires.";
}

// Insertion seulement si pas d'erreur
if ($messageErreur === '') {
    $requete = "INSERT INTO equipes (nom, slogan, dateajout, jeu_id) VALUES (:nom, :slogan, :dateAjout, :jeu)";

    try {
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':slogan', $slogan, PDO::PARAM_STR);
        $stmt->bindParam(':dateAjout', $dateAjout, PDO::PARAM_STR); // YYYY-MM-DD
        $stmt->bindParam(':jeu', $jeu, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "L'équipe a été ajoutée avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Erreur SQL : " . implode(', ', $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Erreur technique PDO : " . $e->getMessage();
        error_log($e->getMessage());
    } catch (Error $e) {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Erreur PHP : " . $e->getMessage();
        error_log($e->getMessage());
    }
} else {
    $_SESSION['operation_reussie'] = false;
    $_SESSION['message_operation'] = $messageErreur;
}

if ($stmt->execute()) {
    header('Location: index.php?message=ajoutE-ok');
    exit;
} else {
    echo "Erreur lors de l'ajout de l'équipe.";
}

header('Location: index.php');
require('include/nettoyage.inc');
exit;