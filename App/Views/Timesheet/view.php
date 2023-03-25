<?php
//title
$pageTitle = "Timesheet";
ob_start();
?>
<h1>view Timesheet</h1>
<?php
print_r($data["timesheet"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>