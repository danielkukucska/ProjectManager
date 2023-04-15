<?php
$project = $data["project"];
$pageTitle = $project->getName();
ob_start();
?>

<div class="container my-3 p-0 rounded-3 border shadow-md table-responsive">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md mb-3">
                <h2 class="mb-3 anchor">Project Details</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">ID</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $project->getId() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Name</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $project->getName() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Description</div>
                            <p><?= $project->getDescription() ?></p>
                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Start Date</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"> <time datetime="<?= date_format($project->getStartDate(), "Y.m.d") ?>"><?= date_format($project->getStartDate(), "Y.m.d") ?></time></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">End Date</div>
                        </div>
                        <span class="badge bg-primary rounded-pill"> <time datetime="<?= date_format($project->getEndDate(), "Y.m.d") ?>"><?= date_format($project->getEndDate(), "Y.m.d") ?></time></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto w-100">
                            <div class="fw-bold">Time elapsed</div>
                            <div class="progress " style="height: 25px">
                                <?php
                                $startDate = $project->getStartDate();
                                $endDate = $project->getEndDate();
                                $today = new DateTime();

                                $totalDays = $endDate->diff($startDate)->days;
                                $elapsedDays = $today->diff($startDate)->days;

                                if ($elapsedDays < 0) {
                                    $percentage = 0;
                                } elseif ($elapsedDays >= $totalDays) {
                                    $percentage = 100;
                                } else {
                                    $percentage = round(($elapsedDays / $totalDays) * 100, 2);
                                }
                                ?>
                                <div class="progress-bar bg-primary text-left pl-2" role="progressbar" style="width: <?= $percentage ?>%" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100">
                                    <?= $percentage ?>%
                                </div>

                            </div>
                        </div>

                    </li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-md mb-3">
                <h2 class="mb-3 anchor">Employees</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $project->getOwner()->getName() ?></div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $project->getOwner()->getEmail() ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $project->getOwner()->getName() ?></div>
                            TODO: list employees
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $project->getOwner()->getEmail() ?></span>
                    </li>


                </ul>
            </div>

            <div class="col-md mb-3">
                <h2 class="mb-3 anchor">Tasks</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            All tasks
                        </div>
                        <a class="btn badge bg-primary rounded-pill" href="./<?= $project->getId() ?>/tasks">Go</a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">TODO</div>
                            TODO: list task count by status
                        </div>
                        <span class="badge bg-primary rounded-pill">2</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">In Progress</div>
                            TODO: list task count by status
                        </div>
                        <span class="badge bg-primary rounded-pill">10</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Done</div>
                            TODO: list task count by status
                        </div>
                        <span class="badge bg-primary rounded-pill">40</span>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>