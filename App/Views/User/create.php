<?php
//title
$pageTitle = "Register";
ob_start();
?>
<h1>Register</h1>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>