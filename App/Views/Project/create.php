<?php
$pageTitle = "Create Project";
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/project/createProject.js"></script>

<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Create Project</h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/projects" method="POST" onsubmit="return validateCreateProject(event)">
        <div class="mb-3">
            <label class="form-label" for="name">
                Project Name
            </label>
            <input class="form-control" type="text" id="name" name="name" class="card-title" placeholder="Project Name" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">
                Description
            </label>
            <textarea class="form-control" type="text" id="description" name="description" class="card-title" placeholder="Description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="startDate">
                Start Date
            </label>
            <input class="form-control" type="date" id="startDate" name="startDate" class="card-title" placeholder="Start Date" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="endDate">
                End Date
            </label>
            <input class="form-control" type="date" id="endDate" name="endDate" class="card-title" placeholder="End Date" />
        </div>


        <div class="mb-3">
            <label for="ownerId" class="form-label">Owner</label>
            <select class="form-select" id="ownerId" name="ownerId">
                <option selected>No owner selected...</option>
                <?php foreach ($data["users"] as $user) : ?>
                    <option value="<?= $user->getId() ?>"><?= $user->getName() ?> - <?= $user->getEmail() ?></option>;
                <?php endforeach; ?>
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