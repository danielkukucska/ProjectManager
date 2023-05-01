<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Daniel Kukucska" />
    <meta name="description" content="Webdevelopment I. - First assessment" />
    <title><?= $pageTitle ?></title>
    <link rel="icon" type="image/x-icon" href="Public/images/favicon-32x32.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="/ProjectManager/Public/css/main.css" />
</head>

<body class="d-flex flex-column justify-content-between min-vh-100">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a href="/ProjectManager" class="navbar-brand">Daniel Kukucska</a>
                <button class="btn btn-dark navbar-toggler border-3 px-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start-md bg-dark d-flex align-items-md-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                    <div class="offcanvas-header d-flex d-md-none">
                        <h5 class="offcanvas-title text-white" id="offcanvasLabel">Daniel Kukucska</h5>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/ProjectManager" class="nav-link">
                                    <img class="d-md-block" src="/ProjectManager/Public/images/icons/home.svg" alt="Home icon" />
                                    Home
                                </a>
                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="/ProjectManager/projects" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="d-md-block" src="/ProjectManager/Public/images/icons/calendar.svg" alt="Calendar icon" />
                                    Projects
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li>
                                        <a class="dropdown-item" href="/ProjectManager/projects/create">Create</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/ProjectManager/projects">All</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="/ProjectManager/timesheets" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="d-md-block" src="/ProjectManager/Public/images/icons/calendar.svg" alt="Calendar icon" />
                                    Timesheets
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li>
                                        <a class="dropdown-item" href="/ProjectManager/timesheets/create">Create</a>
                                    </li>
                                    <!-- <li>
                                        <a class="dropdown-item" href="/ProjectManager/timesheets?filter=current">This week</a>
                                    </li> -->
                                    <!-- <li>
                                        <hr class="dropdown-divider" />
                                    </li> -->
                                    <li>
                                        <a class="dropdown-item" href="/ProjectManager/timesheets">All</a>
                                    </li>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION["user"])) : ?>
                                <?php if ($_SESSION["user"]->getRole() == "admin") : ?>
                                    <li class="nav-item">
                                        <a href="/ProjectManager/users" class="nav-link">
                                            <img class="d-md-block" src="/ProjectManager/Public/images/icons/videos.svg" alt="Videos icon" />
                                            Users
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="/ProjectManager/auth" class="nav-link">
                                        <img class="d-md-block" src="/ProjectManager/Public/images/icons/videos.svg" alt="Videos icon" />
                                        Me
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/ProjectManager/auth/sign-out" class="nav-link">
                                        <img class="d-md-block" src="/ProjectManager/Public/images/icons/videos.svg" alt="Videos icon" />
                                        Sign Out
                                    </a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="/ProjectManager/auth/sign-in" class="nav-link">
                                        <img class="d-md-block" src="/ProjectManager/Public/images/icons/videos.svg" alt="Videos icon" />
                                        Sign In
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/ProjectManager/auth/sign-up" class="nav-link">
                                        <img class="d-md-block" src="/ProjectManager/Public/images/icons/videos.svg" alt="Videos icon" />
                                        Sign Up
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </nav>
    <main>
        <?= $content ?>
    </main>

    <footer class="container d-flex flex-wrap justify-content-between align-items-center my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="md-0 text-muted">&copy; 2023, Daniel Kukucska</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted" href="mailto:daniel.kukucska.txt@gmail.com" target="_blank">
                    <img src="/ProjectManager/Public/images/icons/envelope.svg" alt="Envelope icon" />
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="https://github.com/danielkukucska" target="_blank">
                    <img src="/ProjectManager/Public/images/icons/github.svg" alt="GitHub icon" />
                </a>
            </li>
        </ul>
    </footer>
</body>

</html>