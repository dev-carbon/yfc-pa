<?php
require_once dirname(__DIR__, 2) .  '/config/init.php';
require_once dirname(__DIR__, 2) . '/helpers/analytics.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' | ' . "YFC-PA" : "YFC-PA"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/logo.png" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/fr/events" class="nav-link">Événements</a>
                        </li>
                        <li>
                            <a href="/fr/fighters" class="nav-link">Combattants</a>
                        </li>
                        <li>
                            <a href="/fr/media" class="nav-link">Médias</a>
                        </li>

                        <li>
                            <a href="/fr/forum" class="nav-link">Forum</a>
                        </li>
                        <li>
                            <a href="/fr/shop" class="nav-link">Boutique</a>
                        </li>
                        <li>
                            <a href="/fr/faq" class="nav-link">FAQ</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Bonjour, <?= $_SESSION['prenom_utilisateur'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION['id_admin']) && $_SESSION['id_admin']) : ?>
                                <li>
                                    <a href="pages/back-office/back-office.php" class="nav-link">Admin</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="../services/logout.php" class="nav-link">Déconnexion</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="/fr/auth/login" class="nav-link">Connexion</a>
                            </li>
                            <li>
                                <a href="/fr/auth/register" class="nav-link">Inscription</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>