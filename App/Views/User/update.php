<?php
//title
$pageTitle = "Update user";
ob_start();
?>
<h1>Update user</h1>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>