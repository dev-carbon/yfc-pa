<?php

require_once dirname(__FILE__, 4) . '/helpers/database.php';

$db = db_connect();
$success_message = '';
$error_message = '';

// Handle form submission for deletion
if (isset($_POST['id'])) {
    $deleteId = $_POST['id'];

    try {
        $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $deleteId]);
        header("Location: /admin/users/");
        exit();
    } catch (PDOException $e) {
        $error_message = "Erreur: " . $e->getMessage();
    }
}
