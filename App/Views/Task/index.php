<?php
//prject title
$pageTitle = "Tasks";
ob_start();
?>
<h1>Tasks</h1>
<?php
print_r($data["tasks"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>