<?php
require('include/configuration.inc');
require('include/entete.inc');

$stmt = $pdo->prepare("SELECT texte FROM pages WHERE url = 'index.php'"); // Changed 'index' to 'index.php'
$stmt->execute();
$page = $stmt->fetch();
?>

<script src="https://cdn.tiny.cloud/1/pfnaypto23akuj617eypkbrdanfdq3bcqzm0me7tekcofmex/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '.tinymce'
    });
</script>

<?php
if (!isset($_SESSION['usager'])) {
    header('Location: index.php');
    exit;
}
echo '<form method="post" novalidate action="enregistrer-page-accueil.php">';
echo    '<label for="texte">Texte de la page d accueil</label>';
echo    '<textarea id="texte" name="texte" class="tinymce" required>' . htmlspecialchars($page['texte']) . '</textarea>';
echo    '<button type="submit">Enregistrer</button>';
echo '</form>';

require('include/pied-page.inc');
require('include/nettoyage.inc');



