<?php
require_once dirname(__DIR__, 2) .  '/config/init.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' | ' . "YFC-PA" : "YFC-PA"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeJzr8pAAAAAByiZQN2JqyZDtMlIyyVFzZq7PN0"></script>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li>
                            <a class="navbar-brand" href="/">
                                <img src="/assets/images/logo.png" alt="Logo" class="logo">
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/events" class="nav-link">Événements</a>
                        </li>
                        <li>
                            <a href="/admin/fighters" class="nav-link">Combattants</a>
                        </li>
                        <li>
                            <a href="/admin/media" class="nav-link">Médias</a>
                        </li>

                        <li>
                            <a href="/admin/forum" class="nav-link">Forum</a>
                        </li>
                        <li>
                            <a href="/admin/shop" class="nav-link">Boutique</a>
                        </li>
                        <li>
                            <a href="/admin/faq" class="nav-link">FAQ</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li>
                            <a href="../services/logout.php" class="btn btn-secondary">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>