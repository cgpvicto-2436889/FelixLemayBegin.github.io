<?php
require('include/configuration.inc');
session_start();
ob_end_clean();

$code = $_POST['code'] ?? '';
$motDePasse = $_POST['motdepasse'] ?? '';

if (empty($code) || empty($motDePasse)) {
    $_SESSION['erreur_auth'] = "Le courriel et le mot de passe sont requis.";
    header('Location: formulaire-authentification.php');
    exit;
}

$requete = "SELECT * FROM usagers WHERE code = :code AND actif = 1";
$stmt = $pdo->prepare($requete);
$stmt->bindParam(':code', $code);
$stmt->execute();
$usager = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usager) {
    if (password_verify($motDePasse, $usager['motdepasse'])) {
        $_SESSION['usager'] = [
            'id' => $usager['id'],
            'prenom' => $usager['prenom'],
            'nom' => $usager['nomfamille']
        ];
        header('Location: index.php');
        exit;
    }
}

$_SESSION['erreur_auth'] = "Courriel ou mot de passe invalide.";
header('Location: formulaire-authentification.php');
exit;
?>