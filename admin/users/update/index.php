<?php

require_once dirname(__FILE__, 4) . '/helpers/database.php';

$db = db_connect();
$title = 'Utilisateurs';
$users = [];
$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'] ?? '';
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';

    // Validate inputs
    if ($firstName && $lastName && $email && $role) {
        try {
            if ($userId) {
                // Update existing user
                $stmt = $db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, role = :role WHERE id = :id");
                $stmt->execute([
                    ':first_name' => htmlspecialchars($firstName),
                    ':last_name' => htmlspecialchars($lastName),
                    ':email' => htmlspecialchars($email),
                    ':role' => htmlspecialchars($role),
                    ':id' => htmlspecialchars($userId),
                ]);
                $success_message = "Utilisateur mis à jour!";
            }
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    } else {
        $error_message = "All fields are required!";
    }
}

$user = null;
if (isset($_GET['id'])) {
    $user = get_user($_GET['id']);
}
?>


<!-- HEADER -->
<?php include_once dirname(__FILE__, 3) . '/components/header.php'; ?>

<main class="main">
    <div class="container">
        <div class="row">

            <?php if ($success_message) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $success_message ?>
                </div>
            <?php endif; ?>

            <?php if ($error_message) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif; ?>

            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifier un utilisateur</h1>
                </div>

                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?? '' ?>">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $user['first_name'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $user['last_name'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value=""></option>
                            <option value="admin" <?= isset($user) && $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="user" <?= isset($user) && $user['role'] == 'user' ? 'selected' : '' ?>>Utilisateur</option>
                        </select>
                    </div>
                    <a href="/admin/users/" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->
<?php include_once dirname(__FILE__, 3) . '/components/footer.php'; ?>