<?php
$pageTitle = "Create Task";
ob_start();
?>
<h1>Create task</h1>
<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>