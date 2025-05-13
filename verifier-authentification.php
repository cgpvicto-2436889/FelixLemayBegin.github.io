<?php
require('include/configuration.inc');

$code = $_POST['code'] ?? '';
$motDePasse = $_POST['motdepasse'] ?? '';

    if (empty($code) || empty($motDePasse)) {
        $_SESSION['erreur_auth'] = "Le code et le mot de passe sont requis.";
        header('Location: formulaire-authentification.php');
        exit;
    }
    
    try {
        $requete = "SELECT * FROM usagers WHERE code = :code AND actif = 1";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
    
        $usager = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usager && password_verify($motDePasse, $usager['motdepasse'])) {
            $_SESSION['usager'] = [
                'id' => $usager['id'],
                'prenom' => $usager['prenom'],
                'nom' => $usager['nomfamille']
            ];
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['erreur_auth'] = "Code ou mot de passe invalide.";
            header('Location: formulaire-authentification.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['erreur_auth'] = "Erreur technique lors de l'authentification.";
        header('Location: formulaire-authentification.php');
        exit;
    }
?>
