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

// --- Début de l'ajout pour TinyMCE ---

// 1. Incluez le script principal de TinyMCE
// Assurez-vous que ce chemin est correct pour votre installation de TinyMCE.
// Vous pouvez le télécharger et le placer localement ou utiliser un CDN si vous préférez.
echo "    <script src='path/to/tinymce/tinymce.min.js'></script>";

// 2. Ajoutez le script d'initialisation de TinyMCE
echo "    <script>";
echo "        tinymce.init({";
echo "            selector: 'textarea.tinymce', // Cible les <textarea> avec la classe 'tinymce'";
echo "            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',";
echo "            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'";
echo "        });";
echo "    </script>";
// --- Fin de l'ajout pour TinyMCE ---

echo "    <script src='js/formulaire-contact.js' defer></script>";
echo "    <script src='js/formulaire-joueurs.js' defer></script>";
echo "    <script src='js/formulaire-equipe.js' defer></script>";
echo "    <script src='js/formulaire-resultats.js' defer></script>";
echo "    <script src='js/formulaire-authentification.js' defer></script>";
echo "</head>";

echo "<body>"; // La balise <body> doit être ouverte avant la balise <nav> pour une structure HTML valide

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
echo "        <div class='logo'><img src='../medias/commun/LogoLANParty.png'></div>";
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