<?php
require_once '../config/config.php';
require_once '../helpers/database.php';
require_once '../helpers/session.php';

// Démmare la session
start_session();
$db = db_connect();

// Récupérer l'URL de la page
$page_url = $_SERVER['REQUEST_URI'];

// Préparer la requête SQL pour insérer ou mettre à jour le nombre de visites
$sql = "INSERT INTO page_visits (page_url, visit_count) VALUES (:page_url, 1)
        ON DUPLICATE KEY UPDATE visit_count = visit_count + 1";
$stmt = $pdo->prepare($sql);

// Exécuter la requête
$stmt->execute([
    ':page_url' => $page_url,
]);
?>
