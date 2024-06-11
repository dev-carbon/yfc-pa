<?php

require_once dirname(__FILE__, 2) . '/config/config.php';

function db_connect() {
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

function create_users_table() {}
function create_events_table() {}
function create_figthers_table() {}
function create_logs_table() {}
function create_comments_table() {}
function create_captcha_table() {}


function get_users() {}
function get_user($id) {}
?>
