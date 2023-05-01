<?php
$project = $data["project"];
$task = $data["task"];
$pageTitle = "Task";
ob_start();
?>
<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-3 anchor">Task Details</h2>
                    <div>
                        <a class="btn btn-primary" href="./<?= $task->getId() ?>/edit">Edit</a>
                        <a class="btn btn-danger" href="./<?= $task->getId() ?>/delete">Delete</a>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">ID</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $task->getId() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Name</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $task->getName() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Description</div>
                            <p><?= $task->getDescription() ?></p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Status</div>
                            <p><?= $task->getStatus() ?></p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-md mb-3">
                <h2 class="mb-3 anchor">Assignees</h2>
                <ul class="list-group">
                    <?php foreach ($task->getAssignees() as $assignee) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?= $assignee->getName() ?></div>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= $assignee->getEmail() ?></span>
                        </li>
                    <?php endforeach ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>