<?php
$pageTitle = "Projects";
ob_start();
?>

<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Projects</h1>
            <p class="lead">The table below shows the list of all projects.</p>
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
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Owner</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($data["projects"] as $project) : ?>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="./projects/<?= $project->getId() ?>">View</a>
                        <a class="btn btn-secondary" href="./projects/<?= $project->getId() ?>/edit">Edit</a>
                    </td>
                    <td><?= $project->getId() ?></td>
                    <td><?= $project->getName() ?></td>
                    <td><?= $project->getDescription() ?></td>
                    <td><?= date_format($project->getStartDate(), "Y.m.d") ?></td>
                    <td><?= date_format($project->getEndDate(), "Y.m.d") ?></td>
                    <td>
                        <?= $project->getOwner()->getName() ?>
                        <br>
                        <?= $project->getOwner()->getEmail() ?>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>