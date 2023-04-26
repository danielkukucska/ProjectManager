<?php
$project = $data["project"];
$task = $data["task"];
$pageTitle = "Update Task";
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/task/updateTask.js"></script>

<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Update Task: <?= $task->getName(); ?></h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/<?= $task->getId() ?>" method="POST" onsubmit="return validateUpdateTask(event)">
        <div class="mb-3">
            <label class="form-label" for="name">
                Task Name
            </label>
            <input class="form-control" type="text" id="name" name="name" class="card-title" placeholder="Task Name" value="<?= $task->getName() ?>" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">
                Description
            </label>
            <textarea class="form-control" type="text" id="description" name="description" class="card-title" placeholder="Description" rows="3"><?= $task->getDescription() ?></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="TO DO" <?= $task->getStatus() == "TO DO" ? "selected" : "" ?>>TO DO</option>;
                <option value="In Progress" <?= $task->getStatus() == "In Progress" ? "selected" : "" ?>>In Progress</option>;
                <option value="Done" <?= $task->getStatus() == "Done" ? "selected" : "" ?>>Done</option>;
            </select>
        </div>

        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Save" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>
</div>
<div class="container my-3 p-0 rounded-3 border shadow-md">
    <div class="row g-3 p-3">
        <div class="col-md mb-3">
            <h2 class="mb-3 anchor">Assignees</h2>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <form class="d-flex gap-3 justify-content-between w-100" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/<?= $task->getId() ?>/assignments" method="POST">
                        <select class="form-select" id="userId" name="userId">
                            <option selected>Add assignee</option>
                            <?php foreach ($data["users"] as $user) : ?>
                                <option value="<?= $user->getId() ?>"><?= $user->getName() ?> - <?= $user->getEmail() ?></option>;
                            <?php endforeach; ?>
                        </select>

                        <input class="form-control" type="submit" value="Add" />

                    </form>
                </li>
                <?php foreach ($task->getAssignees() as $assignee) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $assignee->getName() ?></div>
                            <p><?= $assignee->getEmail() ?></p>
                        </div>
                        <form action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/<?= $task->getId() ?>/assignments/<?= $assignee->getId() ?>/delete" method="POST">
                            <button type="submit" class="btn btn-danger badge rounded-pill">Delete</button>
                        </form>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>