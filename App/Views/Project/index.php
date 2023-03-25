<?php
$pageTitle = "Projects";
ob_start();
?>

<h1>Welcome to my app</h1>


<?php
print_r($data["projects"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>