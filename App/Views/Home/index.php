<?php
$pageTitle = "Project Manager";
ob_start();
?>

<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Project Manager</h1>
            <p>TODO: repo description</p>
        </div>
    </div>
</div>


<div class="row g-3 p-3">
    <div class="col-md-4 card p-0">
        <h5 class="card-header">Projects</h5>
        <div class="card-body">
            <h5 class="card-title">todo</h5>
            <p class="card-text">todo</p>
            <a href="/ProjectManager/projects" class="btn btn-primary">Go</a>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>