<?php
//Add title
$pageTitle = "Project";
ob_start();
?>
<h1>View project</h1>
<form action="/Projectmanager/App/projects" method="POST">
    <button type="sub">Save</button>
</form>
<?php
print_r($data["project"]);
?>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>