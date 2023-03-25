<?php
//title
$pageTitle = "Task";
ob_start();
?>
<h1>view task</h1>
<?php
print_r($data["task"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>