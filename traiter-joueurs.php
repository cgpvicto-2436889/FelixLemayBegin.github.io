<?php
    require ('include/configuration.inc');

    if (!empty($_POST)) {
        // Le formulaire a été soumis → pour l'instant, on ne fait rien
        // Plus tard tu pourras traiter les données ici

        // Exemple de redirection (temporaire) après traitement :
        // header("Location: merci.php");
        // exit;
    } else {
        header("Location: joueurs.php");
        exit;
    }
    foreach($_POST as $cle => $valeur)
    {
        $_POST[$cle] = htmlspecialchars($valeur);
    }
    echo "<!--Vient de apical-->";
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $courriel = $_POST["courriel"];

    if (isset($_POST['nom'])) {
        $nomfamille = $_POST['nom'];
    }
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    }
    if (isset($_POST['pseudo'])) {
        $pseudo = $_POST['pseudo'];
    }
    if (isset($_POST['courriel'])) {
        $courriel = $_POST['courriel'];
    }

    $messageErreur = '';

    if ('' == $messageErreur) {
        $requete = "INSERT INTO joueurs (nomfamille, prenom, pseudo, courriel) VALUES (?, ?, ?, ?)";

        try {
            $stmt = $mysqli->prepare($requete);
            $stmt->bind_param('ssss', $nomfamille, $prenom, $pseudo, $courriel);
            $stmt->execute();
            if (0 == $stmt->errno) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "Le joueur a été ajouté avec succès !";
            }
            else {
                $_SESSION['operation_reussie'] = false;
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le joueur (code 1).";
                log_debug($stmt->error);
            }
            $stmt->close();
        } catch (Exception $e) {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le joueur (code 2).";
            log_debug($mysqli->error);
        } catch (Error $e) {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le joueur (code 3).";
            log_debug($e->getMessage());
        }
    }
    else {

    }
    echo "<!--Le modele vient de apical-->";
    header('Location: joueurs.php');

    require ('include/nettoyage.inc');
?>