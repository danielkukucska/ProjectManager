<?php
$pageTitle = "Register";
ob_start();
?>
<div class="container p-4 my-3 rounded-3 border shadow-md">
    <h1 class="display-4 fw-bold lh-1">Sign Up</h1>
</div>
<script src="https://cdn.jsdelivr.net/npm/zod@3.21.4/lib/index.umd.min.js "></script>
<script src="/ProjectManager/Public/js/formValidator.js"></script>
<script src="/ProjectManager/Public/js/user/signUp.js"></script>


<div class="container my-3 p-0 rounded-3 border shadow-md">
    <form class="row g-3 p-3" action="/Projectmanager/auth/sign-up" method="POST" onsubmit="return validateSignUp(event)">
        <div class="mb-3">
            <label class="form-label" for="name">
                Name
            </label>
            <input class="form-control" type="text" id="name" name="name" class="card-title" placeholder="Name" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">
                Email
            </label>
            <input class="form-control" type="email" id="email" name="email" class="card-title" placeholder="Email" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">
                Password
            </label>
            <input class="form-control" type="password" id="password" name="password" class="card-title" placeholder="Password" />
        </div>
        <div class="mb-3 d-flex gap-3 flex-md-row flex-column">
            <input class="form-control" type="submit" value="Sign Up" />
            <input class="form-control" type="reset" value="Reset" />
        </div>
    </form>
</div>


<?php
$content = ob_get_clean();
include "./App/Views/Common/Layout.php";
?>