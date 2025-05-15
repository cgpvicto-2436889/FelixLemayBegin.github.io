<?php
    require ('include/configuration.inc');

// Initialisation
$_SESSION['operation_reussie'] = null;

// Vérifie si le formulaire a été soumis
if (empty($_POST)) {
    header("Location: index.php");
    exit;
}

// Sécurise les entrées
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur);
}

echo "<!--Vient de apical-->";

// Récupération des champs du formulaire
$nom      = $_POST['nom'] ?? '';
$sujet    = $_POST['sujet'] ?? '';
$message  = $_POST['message'] ?? '';
$courriel = $_POST['courriel'] ?? '';

// Tu pourrais ajouter ici des validations si besoin
$messageErreur = '';

if ($messageErreur === '') {
    $requete = "INSERT INTO contacts (nom, sujet, courriel, message) VALUES (:nom, :sujet, :courriel, :message)";

    try {
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':sujet', $sujet);
        $stmt->bindParam(':courriel', $courriel);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        $_SESSION['operation_reussie'] = true;
        $_SESSION['message_operation'] = "Le message a été envoyé avec succès !";

    } catch (PDOException $e) {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique empêche l'enregistrement du message.";
        error_log($e->getMessage()); // Fonction perso, à définir dans ton projet
    }
}

header('Location: index.php');
exit;

require('include/nettoyage.inc');
?>
