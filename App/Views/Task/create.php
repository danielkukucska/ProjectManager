<?php
$project = $data["project"];
$pageTitle = "Create Task";
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/task/createTask.js"></script>

<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Create Task for project: <?= $project->getName(); ?></h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks" method="POST" onsubmit="return validateCreateTask(event)">
        <div class="mb-3">
            <label class="form-label" for="name">
                Task Name
            </label>
            <input class="form-control" type="text" id="name" name="name" class="card-title" placeholder="Task Name" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">
                Description
            </label>
            <textarea class="form-control" type="text" id="description" name="description" class="card-title" placeholder="Description" rows="3"></textarea>
        </div>

        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Save" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>

    <form class="row g-3 p-3" action="/Projectmanager/projects/<?= $project->getId() ?>/tasks/import" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="tasks">
                Import Tasks
            </label>
            <input class="form-control" type="file" id="tasks" name="tasks" class="card-title" accept=".csv" required />
        </div>

        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Import" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>