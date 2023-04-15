<?php
$project = $data["project"];
$task = $data["task"];
$pageTitle = "Update Task";
ob_start();
?>
<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Update Task: <?= $task->getName(); ?></h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/<?= $task->getId() ?>" method="POST">
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
            <select class="form-select" aria-label="Default select example" id="status" name="status">
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
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>