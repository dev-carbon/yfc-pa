<?php

require_once dirname(__FILE__, 3) . '/helpers/database.php';

$db = db_connect();
$title = 'Utilisateurs';
$users = get_users();

?>

<!-- HEADER -->
<?php include_once dirname(__FILE__, 2) . '/components/header.php'; ?>

<main class="main">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <a href="/admin/users/create" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= htmlspecialchars($user['id']) ?></th>
                            <td><?= htmlspecialchars($user['first_name']) ?></td>
                            <td><?= htmlspecialchars($user['last_name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <th>
                                <form method="POST" action="/admin/users/delete/" class="d-inline-block">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                                <a href="/admin/users/update?id=<?= $user['id'] ?>" class="btn btn-secondary btn-sm">Modifier</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- FOOTER -->
<?php include_once dirname(__FILE__, 2) . '/components/footer.php'; ?>