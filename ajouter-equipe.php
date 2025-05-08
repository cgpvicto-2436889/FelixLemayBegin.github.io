<?php
    require ('include/configuration.inc');

    $_SESSION['operation_reussie'] = null;

    if (!empty($_POST)) {
        // Le formulaire a été soumis → pour l'instant, on ne fait rien
        // Plus tard tu pourras traiter les données ici

        // Exemple de redirection (temporaire) après traitement :
        // header("Location: merci.php");
        // exit;
    } else {
        header("Location: index.php");
        exit;
    }
    foreach ($_POST as $cle => $valeur) {
        $_POST[$cle] = htmlspecialchars($valeur);
    }

    $nom = $_POST["nom"];
    $sujet = $_POST["sujet"];
    $dateAjout = $_POST["dateAjout"];
    $jeu = $_POST["jeu"];

    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    if (isset($_POST['slogan'])) {
        $slogan = $_POST['slogan'];
    }
    if (isset($_POST['dateAjout'])) {
        $dateAjout = $_POST['dateAjout'];
    }
    if (isset($_POST['jeu'])) {
        $jeu = $_POST['jeu'];
    }

    $messageErreur = '';

    if ('' == $messageErreur) {
        $requete = "INSERT INTO equipes (nom, slogan, dateajout, jeu_id) VALUES (?, ?, ?, ?)";

        try {
            $stmt = $mysqli->prepare($requete);
            $stmt->bind_param('sssi', $nom, $slogan, $dateAjout, $jeu);
            $stmt->execute();
            if (0 == $stmt->errno) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "Le client a été ajouté avec succès !";
            } else {
                $_SESSION['operation_reussie'] = false;
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 1).";
                log_debug($stmt->error);
            }
            $stmt->close();
        } catch (Exception $e) {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 2).";
            log_debug($mysqli->error);
        } catch (Error $e) {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 3).";
            log_debug($e->getMessage());
        }
    }


    header('Location: index.php');

    require ('include/nettoyage.inc');