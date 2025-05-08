<?php
    echo "<!DOCTYPE html>";
    echo "<html lang='fr-CA'>";
    echo "<head>";
    echo "    <title>$titre</title>";
    echo "    <meta charset='UTF-8'>";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "    <meta name='description' content='$description'>";
    echo "    <meta name='author' content='Christiane Lagacé : https://christianelagace.com'>";
    echo "    <link rel='icon' href='medias/commun/favico.ico'>";
    echo "    <link rel='apple-touch-icon' href='apple-touch-icon.png'>";
    echo "    <link rel='stylesheet' href='css/style.css'>";
    echo "    <link rel='stylesheet' href='css/mes-styles.css'>";
    echo "    <script src='https://kit.fontawesome.com/b73f095700.js' crossorigin='anonymous'></script>";
    echo "    <script src='js/formulaire-contact.js' defer></script>";
    echo "    <script src='js/formulaire-joueurs.js' defer></script>";
    echo "    <script src='js/formulaire-equipe.js' defer></script>";
    echo "    <script src='js/formulaire-resultats.js' defer></script>";
    echo "    <script src='js/formulaire-authentification.js' defer></script>";
    echo "</head>";

    echo "<nav>";
    echo "  <div class='nav-container'>";
    echo "    <div class='nav-gauche'>";
    echo "      <a href='index.php'>Accueil</a>";
    echo "      <a href='a-propos.php'>À propos</a>";
    echo "      <a href='joueurs.php'>Joueurs</a>";
    echo "      <a href='resultats.php'>Résultats</a>";
    echo "      <a href='formulaire-contact.php'>Nous contacter</a>";
    echo "      <a href='a-venir.php'>À venir</a>";
    echo "    </div>";
    echo "    <div class='nav-droite'>";

    if (isset($_SESSION['usager'])) {
        echo '<a href="deconnecter.php" class="icone-auth" title="Déconnexion">';
        echo '<i class="fas fa-sign-out-alt"></i>';
        echo '</a>';
    } else {
        echo '<a href="formulaire-authentification.php" class="icone-auth" title="Connexion">';
        echo '<span class="texte-auth">Connexion</span> <i class="fas fa-user"></i>';
        echo '</a>';
    }
    if (isset($_SESSION['usager'])) {
        $usager = $_SESSION['usager'];
        $prenom = htmlspecialchars($usager['prenom']);
        $nom = htmlspecialchars($usager['nom']);

        echo "<span class='texte-auth'>Bienvenue, $prenom $nom</span>";
    }

    echo "    </div>";
    echo "  </div>";
    echo "</nav>";


    echo "<div class='separation'></div>";
    echo "<header>";
    echo "    <div class='logo-text container'>";
    echo "        <div class='logo'><img src='medias/commun/logoLanParty.png'></div>";
    echo "        <div>";
    echo "            <div class= title>$titre</div>";
    echo "        </div>";
    echo "    </div>";
    echo "</header>";
    echo "<div class='separation'></div>";
    echo "<div id='main'>";
    echo "    <div class='container'>";
    echo "        <h1>$h1</h1>";
    echo "        <div class='items'>";
    echo "<body>";