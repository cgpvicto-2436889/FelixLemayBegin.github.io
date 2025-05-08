<?php
    session_start();
    require_once 'include/ma-bibliotheque.php';
    try {
        $mysqli = new mysqli("127.0.0.1", "root", "mysql", "lanparty_felixlemaybegin");
    } catch (Exception $e) {
        die('Erreur de connexion à la base de données.');
    }

    $mysqli->set_charset("utf8mb4");

    // Récupère le nom du fichier en cours (ex: "index.php")
    $nomPage = basename($_SERVER['SCRIPT_NAME']);

    // Préparation de la requête avec une condition sur l'URL
    $requete = "SELECT titre, description, h1, texte FROM pages WHERE url = ?";

    if ($stmt = $mysqli->prepare($requete)) {
        $stmt->bind_param("s", $nomPage); // Passe la variable dans la requête
        $stmt->execute();
        $stmt->bind_result($titre, $description, $h1, $texte);

        // Si on ne trouve pas de résultat, on met des valeurs par défaut
        if (!$stmt->fetch()) {
            $titre = "Page introuvable";
            $description = "Aucune description disponible.";
            $h1 = "Erreur 404";
            $texte = "<p>La page demandée n'existe pas.</p>";
        }

        $stmt->close();
    } else {
        die("Erreur SQL : " . $mysqli->error);
    }