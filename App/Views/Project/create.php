<?php
$pageTitle = "Create Project";
ob_start();
?>
<h1>Create project</h1>
<form action="/Projectmanager/App/projects" method="POST">
    <button type="sub">Save</button>
</form>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>