<?php
$pageTitle = "Project Manager";
ob_start();
?>

<div class="container p-0 my-3 rounded-3 border shadow-md">
    <div class="row p-4 align-items-center justify-content-between">
        <div class="col-md-7 p-3">
            <h1 class="display-4 fw-bold lh-1">Project Manager</h1>
            <p>
                This project was created for TBI_PI743G2 - Web Development II. lecture. <br />
                For further information please visit my
                <a class="text-muted link-underline-opacity-0" href="https://github.com/danielkukucska/ProjectManager" target="_blank">
                    Github repository
                </a>
            </p>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>