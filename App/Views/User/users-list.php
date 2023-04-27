<?php
$pageTitle = "Users";
$users = $data["users"];
ob_start();
?>

<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Users</h1>
            <p class="lead">The table below shows the list of all users.</p>
        </div>
    </div>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <table class="table table-striped table-dark mb-0">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="./users/<?= $user->getId() ?>">Open</a>
                    </td>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getRole() ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>