<?php
$timesheet = $data["timesheet"];
$timesheetLines = $timesheet->getTimesheetLines();
$pageTitle = "Timesheet";
ob_start();
?>
<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Timesheet</h1>
            <p class="lead">
                From: <?= date_format($timesheet->getStartDate(), "Y.m.d") ?> -
                To: <?= date_format($timesheet->getEndDate(), "Y.m.d") ?>
            </p>
        </div>
    </div>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <table class="table table-striped table-dark mb-0">
        <thead>
            <tr>
                <th>Project</th>
                <th>Task</th>
                <th><?= $timesheet->getStartDate()->modify("monday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("tuesday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("wednesday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("thursday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("friday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("saturday this week")->format("Y-m-d") ?></th>
                <th><?= $timesheet->getStartDate()->modify("sunday this week")->format("Y-m-d") ?></th>
                <th>Sum</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($timesheetLines as $timesheetLine) : ?>
                <tr>
                    <td><?= ($timesheetLine->getProjectName()) ?></td>
                    <td><?= ($timesheetLine->getTaskName()) ?></td>
                    <?php $sum = 0; ?>
                    <?php foreach ($timesheetLine->getTimesheetCells() as $timesheetCell) : ?>
                        <?php $sum += $timesheetCell->getHoursWorked() ?>
                        <td><?= $timesheetCell->getHoursWorked() ?></td>
                    <?php endforeach; ?>
                    <td><?= $sum ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>