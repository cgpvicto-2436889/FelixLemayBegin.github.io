<?php
    session_start();
    require_once 'include/ma-bibliotheque.php';
// ─── 4. Connexion PDO (PostgreSQL Supabase ou MySQL fallback) ───────────
$supabase_pooler_url = getenv('SUPABASE_POOLER_URL');
if ($supabase_pooler_url) 
{
    // Connexion PostgreSQL
    $parsed = parse_url($supabase_pooler_url);
    if (!$parsed || !isset($parsed['host'], $parsed['user'], $parsed['pass'], $parsed['path']))
    {
        die("L'URL de connexion Supabase est invalide ou mal formée.");
    }
    $host   = $parsed['host'];
    $port   = $parsed['port'] ?? 5432;
    $user   = $parsed['user'];
    $pass   = $parsed['pass'];
    $dbname = ltrim($parsed['path'], '/');
    $dsn    = "pgsql:host=$host;port=$port;dbname=$dbname";
    try 
    {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } 
    catch (PDOException $e)
    {
        die("Erreur de connexion PostgreSQL : " . $e->getMessage());
    }

} 

else 
{
    // Fallback MySQL (Render)
    $dbHost = getenv('MYSQL_HOST')     ?: 'localhost';
    $dbName = getenv('MYSQL_DATABASE') ?: 'db_name';
    $dbUser = getenv('MYSQL_USER')     ?: 'user';
    $dbPass = getenv('MYSQL_PASSWORD') ?: 'pass';
    $dsn    = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
    try 
    {
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    catch (PDOException $e)
    {
        die("Erreur de connexion MySQL : " . $e->getMessage());
    }
}

    // Récupère le nom du fichier en cours (ex: "index.php")
    $nomPage = basename($_SERVER['SCRIPT_NAME']);



    $requete = "SELECT titre, description, h1, texte FROM pages WHERE url = :url";
    $stmt = $pdo->prepare($requete);

    // Liaison du paramètre
    $stmt->bindParam(':url', $nomPage);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si on ne trouve pas de résultat, on met des valeurs par défaut
    if ($resultat) 
    {
        $titre = $resultat['titre'];
        $description = $resultat['description'];
        $h1 = $resultat['h1'];
        $texte = $resultat['texte'];
    } 
    else
    {
        $titre = "Page introuvable";
        $description = "Aucune description disponible.";
        $h1 = "Erreur 404";
        $texte = "<p>La page demandée n'existe pas.</p>";
    }

    // Fermeture du curseur (facultatif avec PDO)
    $stmt->closeCursor();

// Vous pouvez maintenant utiliser les variables $titre, $description, $h1 et $texte
// pour afficher le contenu de votre page.

?>