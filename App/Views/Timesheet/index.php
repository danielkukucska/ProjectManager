<?php
$timesheets = $data["timesheets"];
$pageTitle = "Timesheets";
ob_start();
?>
<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Timesheets</h1>
        </div>
    </div>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <table class="table table-striped table-dark mb-0">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($timesheets as $timesheet) : ?>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="./timesheets/<?= $timesheet->getId() ?>">View</a>
                        <a class="btn btn-secondary" href="./timesheets/<?= $timesheet->getId() ?>/edit">Edit</a>
                    </td>
                    <td><?= $timesheet->getId() ?></td>
                    <td><?= date_format($timesheet->getStartDate(), "Y.m.d") ?></td>
                    <td><?= date_format($timesheet->getEndDate(), "Y.m.d") ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>