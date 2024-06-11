<?php
require_once dirname(__DIR__, 2) .  '/config/init.php';
require_once dirname(__DIR__, 2) . '/helpers/analytics.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . '|' . "YFC-PA" : "YFC-PA"; ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body>

    <header class="header">
        <nav class="navbar">

            <ul class="nav-left">
                <li>
                    <a class="logo" href="/">
                        <img src="/assets/images/logo.png" alt="Logo" class="logo">
                    </a>
                </li>

                <li>
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
            <ul class="nav-right">
                <?php
                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION['user_id'])) {
                    $prenom_utilisateur = $_SESSION['prenom_utilisateur'];
                    echo '<span>Bonjour, ' . htmlspecialchars($prenom_utilisateur) . '</span>';
                    if (isset($_SESSION['est_admin']) && $_SESSION['est_admin']) {
                        echo '<a href="pages/back-office/back-office.php" class="nav-link">Back-Office</a>';
                    }
                    echo '<a href="../services/logout.php" class="nav-link">Déconnexion</a>';
                } else {
                    echo '<a href="connexion.php" class="nav-link">Connexion</a>';
                    echo '<a href="inscription.php" class="nav-link">S\'inscrire</a>';
                }
                ?>
            </ul>
        </nav>
    </header>