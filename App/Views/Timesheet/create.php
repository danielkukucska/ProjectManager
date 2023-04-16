<?php
$pageTitle = "Create Timesheet";
ob_start();
?>


<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Create Timesheet</h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/timesheets" method="POST">

        <div class="mb-3">
            <label class="form-label" for="selectedDate">
                Week
            </label>
            <input class="form-control" type="date" id="selectedDate" name="selectedDate" class="card-title" placeholder="Week" />
        </div>

        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Create" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>