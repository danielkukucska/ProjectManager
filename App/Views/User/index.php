<?php
//title
$pageTitle = "Me";
ob_start();
?>
<h1>Me</h1>
<?php
print_r($data["user"]);
?>

<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>