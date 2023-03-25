<?php
//prject title
$pageTitle = "Timesheets";
ob_start();
?>
<h1>Timesheets</h1>
<?php
print_r($data["timesheets"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>