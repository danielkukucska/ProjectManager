<?php


require_once "Core/config.php";

spl_autoload_register(function ($className) {
    $directories = [
        "./App/Controllers/",
        "./App/Core/",
        "./App/Exceptions/",
        "./App/DTO/Project/",
        "./App/DTO/Task/",
        "./App/DTO/UserTask/",
        "./App/DTO/Timesheet/",
        "./App/DTO/TimesheetCell/",
        "./App/DTO/TimesheetLine/",
        "./App/DTO/User/",
        "./App/Models/",
        "./App/Repositories/",
        "./App/Services/",
    ];

    foreach ($directories as $directory) {
        $classFile = $directory . $className . ".php";
        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }
});

$app = new App();
