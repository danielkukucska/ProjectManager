<?php
$pageTitle = "Projects";
ob_start();
?>
<h1>404</h1>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>