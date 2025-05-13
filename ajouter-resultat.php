<?php
require('include/configuration.inc');

$_SESSION['operation_reussie'] = null;

if (!empty($_POST)) {
    // Le formulaire a été soumis → pour l'instant, on ne fait rien
    // Plus tard tu pourras traiter les données ici

    // Exemple de redirection (temporaire) après traitement :
    // header("Location: merci.php");
    // exit;
} else {
    header("Location: resultats.php");
    exit;
}

foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur);
}

$equipe = $_POST["equipe"];
$rang = $_POST["rang"];
$scoreFinal = $_POST["scoreFinal"];
$dateAjout = $_POST["dateAjout"];

if (isset($_POST['equipe'])) {
    $equipe = $_POST['equipe'];
}
if (isset($_POST['rang'])) {
    $rang = $_POST['rang'];
}
if (isset($_POST['scoreFinal'])) {
    $scoreFinal = $_POST['scoreFinal'];
}
if (isset($_POST['dateAjout'])) {
    $dateAjout = $_POST['dateAjout'];
}

$messageErreur = '';

if ('' == $messageErreur) {
    $requete = "INSERT INTO resultats (equipe_id, rang, score_final, date_partie) VALUES (:equipe, :rang, :scoreFinal, :dateAjout)";

    try {
        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':equipe', $equipe, PDO::PARAM_INT);
        $stmt->bindValue(':rang', $rang, PDO::PARAM_INT);
        $stmt->bindValue(':scoreFinal', $scoreFinal, PDO::PARAM_INT);
        $stmt->bindValue(':dateAjout', $dateAjout, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "L'équipe a été ajoutée avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer l'équipe.";
        }
    } catch (PDOException $e) {
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer l'équipe (code 2).";
        log_debug($e->getMessage());
    } catch (Exception $e) {
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer l'équipe (code 3).";
        log_debug($e->getMessage());
    }
}

header('Location: resultats.php');

require('include/nettoyage.inc');
?>
