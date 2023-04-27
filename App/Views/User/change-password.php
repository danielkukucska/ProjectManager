<?php
$userId = $data["userId"];
$pageTitle = "Update user";
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/user/changePassword.js"></script>

<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Change Password</h1>
</div>

<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/auth/<?= $userId  ?>/update" method="POST" onsubmit="return validateChangePassword(event)">
        <input type="hidden" name="action" value="change-password">
        <div class="mb-3">
            <label class="form-label" for="email">
                Email
            </label>
            <input class="form-control" type="email" id="email" name="email" class="card-title" placeholder="Email" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="currentPassword">
                Current Password
            </label>
            <input class="form-control" type="password" id="currentPassword" name="currentPassword" class="card-title" placeholder="Password" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="newPassword">
                New Password
            </label>
            <input class="form-control" type="password" id="newPassword" name="newPassword" class="card-title" placeholder="Password" />
        </div>
        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Save" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>
</div>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>