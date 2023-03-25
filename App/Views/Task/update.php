<?php
$pageTitle = "Update Task";
ob_start();
?>
<h1>Update task</h1>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>