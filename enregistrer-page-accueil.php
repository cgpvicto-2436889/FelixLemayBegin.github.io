<?php
require 'include/configuration.inc';

if (!isset($_SESSION['usager'])) {
    header('Location: index.php');
    exit;
}

// Mise à jour sans protection XSS (car on veut garder le HTML)
if (isset($_POST['texte'])) {
    $stmt = $pdo->prepare("UPDATE pages SET texte = ?, modification = NOW() WHERE url = 'index.php'");
    $stmt->execute([$_POST['texte']]);
}

header('Location: index.php');
exit;
