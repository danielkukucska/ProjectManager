<?php
$tasks = $data["tasks"];
$project = $data["project"];
$pageTitle = $project->getName() . " - Tasks";
ob_start();
?>
<div class="container p-3 my-3 rounded-3 border shadow-md d-flex align-items-center justify-content-between">
    <h1 class="display-4 fw-bold lh-1">Tasks for project: <?= $project->getName() ?></h1>
    <a class="btn btn-primary" href="./tasks/create">Create new task</a>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <table class="table table-striped table-dark mb-0">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($tasks as $task) : ?>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="./tasks/<?= $task->getId() ?>">View</a>
                        <a class="btn btn-secondary" href="./tasks/<?= $task->getId() ?>/edit">Edit</a>
                    </td>
                    <td><?= $task->getId() ?></td>
                    <td><?= $task->getName() ?></td>
                    <td><?= $task->getDescription() ?></td>
                    <td><?= $task->getStatus() ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>