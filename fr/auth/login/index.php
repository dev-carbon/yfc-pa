<?php
$title = 'Connexion';

include_once dirname(__DIR__, 3) . '/fr/components/header.php';
?>

<main class="main">
    <div class="container">
        <h1>Connexion</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="/services/auth/login.php" method="POST" class="login-form">
                    <div class="mb-4">
                        <label for="email">Adresse e-mail :</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once dirname(__DIR__, 3) . '/fr/components/footer.php'; ?>