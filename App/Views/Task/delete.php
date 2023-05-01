<?php
$project = $data["project"];
$task = $data["task"];
$pageTitle = "Delete Task";
ob_start();
?>
<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Delete Task: <?= $task->getName(); ?></h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/<?= $task->getId() ?>/delete" method="POST">
        <h3>Deleting project will also delete:</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Assignments</li>
            <li class="list-group-item">Timesheet data for tasks</li>
        </ul>
        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Delete" />
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>