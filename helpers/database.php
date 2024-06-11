<?php

require_once dirname(__FILE__, 2) . '/config/config.php';

function db_connect()
{
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }
}

function create_users_table()
{
    $pdo = db_connect();
    $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            role VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;
    ";
    $pdo->exec($sql);
    echo "users table created!\n";
}

function create_events_table()
{
}
function create_figthers_table()
{
}
function create_logs_table()
{
}
function create_comments_table()
{
}
function create_captcha_table()
{
}


function get_users() {
    $pdo = db_connect();
    $stmt = $pdo->query("SELECT id, first_name, last_name, email, role, created_at FROM users");
    return $stmt->fetchAll();
}

function get_user($id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT id, first_name, last_name, email, role FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}
