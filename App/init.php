<?php


require_once "Core/config.php";
require_once "Core/App.php";
require_once "Core/Controller.php";

// Define a function to autoload classes
spl_autoload_register(function ($className) {
    $directories = [
        "../App/Controllers/",
        "../App/Core/",
        // "../App/DTO/**/*",
        "../App/DTO/Project/",
        "../App/DTO/Task/",
        "../App/DTO/Timesheet/",
        "../App/DTO/TimesheetCell/",
        "../App/DTO/TimesheetLine/",
        "../App/DTO/User/",
        "../App/Models/",
        "../App/Repositories/",
        "../App/Services/",
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
