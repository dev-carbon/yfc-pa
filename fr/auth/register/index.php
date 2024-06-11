<?php include_once dirname(__DIR__, 3) . '/fr/components/header.php'; ?>

<main class="main">
    <div class="container">
        <h1>Inscription</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="/services/auth/register.php" method="POST" class="form-horizontal">
                    <div class="mb-4">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="mb-4">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="mb-4">
                        <label for="email">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
                    </div>
                    <div class="mb-4">
                        <label for="mot_de_passe">Mot de passe</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
                    </div>
                    <div class="mb-4">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="g-recaptcha" data-sitekey="6LeJzr8pAAAAAByiZQN2JqyZDtMlIyyVFzZq7PN0A"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Inscription</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once dirname(__DIR__, 3) . '/fr/components/footer.php'; ?>