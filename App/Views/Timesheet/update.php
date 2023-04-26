<?php
$timesheet = $data["timesheet"];
$timesheetLines = $timesheet->getTimesheetLines();
$tasks = $data["tasks"];
$pageTitle = "Update Timesheet";
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/timesheet/updateTimesheet.js"></script>

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
    <form method="POST" id="createTimesheetLine" action="/Projectmanager/timesheets/<?= $timesheet->getId() ?>/timesheetlines" onsubmit="return validateCreateTimesheetLine(event)"></form>
    <!-- nyehh -->
    <form method="POST" id="updateTimesheetLine" action="/Projectmanager/timesheets/<?= $timesheet->getId() ?>/timesheetlines/update" onsubmit="return validateUpdateTimesheetLine(event)"></form>
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
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($timesheetLines as $timesheetLine) : ?>
                <tr>
                    <td><?= ($timesheetLine->getProjectName()) ?></td>
                    <td><?= ($timesheetLine->getTaskName()) ?></td>
                    <?php foreach ($timesheetLine->getTimesheetCells() as $timesheetCell) : ?>
                        <td>
                            <input class="form-control" type="number" min="0" id="<?= $timesheetCell->getId() ?>" name="<?= $timesheetCell->getId() ?>" value="<?= ($timesheetCell->getHoursWorked()) ?>" form="updateTimesheetLine">
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">
                    <select class="form-select" id="taskId" name="taskId" form="createTimesheetLine">
                        <option selected>No task selected...</option>
                        <?php foreach ($tasks as $task) : ?>
                            <option value="<?= $task->getId() ?>"><?= $task->getName() ?> </option>;
                        <?php endforeach; ?>
                    </select>
                </td>
                <td colspan="5"></td>

                <td><input class="form-control" type="submit" value="Add Task" form="createTimesheetLine" /></td>
                <td><input class="form-control" type="submit" value="Save Changes" form="updateTimesheetLine" /></td>
            </tr>
        </tbody>
    </table>
</div>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>