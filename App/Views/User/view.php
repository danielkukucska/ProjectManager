<?php
$user = $data["user"];
$pageTitle = $user->getName();
ob_start();
?>
<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md mb-3">
                <h2 class="mb-3 anchor">Me</h2>
                <ul class="mb-3 list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">ID</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $user->getId() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Name</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $user->getName() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Email</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $user->getEmail() ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Role</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $user->getRole() ?></span>
                    </li>
                </ul>

                <?php if ($user->getRole() == "regular") : ?>
                    <form class="d-flex gap-3 justify-content-between w-100" action="/Projectmanager/users/<?= $user->getId() ?>/update" method="POST">
                        <input type="hidden" name="action" value="promote">
                        <input class="form-control" type="submit" value="Promote" />
                    </form>
                <?php else : ?>
                    <form class="d-flex gap-3 justify-content-between w-100" action="/Projectmanager/users/<?= $user->getId() ?>/update" method="POST">
                        <input type="hidden" name="action" value="demote">
                        <input class="form-control" type="submit" value="Demote" />
                    </form>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>