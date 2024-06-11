<?php

require_once dirname(__FILE__, 4) . '/helpers/database.php';

$db = db_connect();
$title = 'Utilisateurs';
$users = [];
$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';

    // Validate inputs
    if ($firstName && $lastName && $email && $role) {
        try {
            $stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, role) VALUES (:first_name, :last_name, :email, :role)");
            $stmt->execute([
                ':first_name' => htmlspecialchars($firstName),
                ':last_name' => htmlspecialchars($lastName),
                ':email' => htmlspecialchars($email),
                ':role' => htmlspecialchars($role),
            ]);
            $success_message = "User added successfully!";
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    } else {
        $error_message = "All fields are required!";
    }
}
?>


<!-- HEADER -->
<?php include_once dirname(__FILE__, 3) . '/components/header.php'; ?>

<main class="main">
    <div class="container">
        <div class="row">

            <?php if ($success_message) : ?>
                <div class="alert alert-success" role="alert">
                    A simple danger alert—check it out!
                </div>
            <?php endif; ?>

            <?php if ($error_message) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif; ?>

            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Ajouter un utilisateur</h1>
                </div>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role" name="role" required>
                    </div>
                    <a href="/admin/users/" type="submit" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->
<?php include_once dirname(__FILE__, 3) . '/components/footer.php'; ?>