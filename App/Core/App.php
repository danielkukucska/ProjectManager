<?php
class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        // Define routes
        //projects
        Route::get("/projects", "ProjectController@index");
        Route::get("/projects/create", "ProjectController@create");
        Route::get("/projects/{projectId}", "ProjectController@show");
        Route::get("/projects/{projectId}/edit", "ProjectController@edit");
        Route::get("/projects/{projectId}/delete", "ProjectController@delete");

        Route::post("/projects", "ProjectController@store");
        Route::post("/projects/{projectId}", "ProjectController@update");
        Route::delete("/projects/{projectId}", "ProjectController@destroy");

        //tasks
        Route::get("/projects/{projectId}/tasks", "TaskController@index");
        Route::get("/projects/{projectId}/tasks/create", "TaskController@create");
        Route::get("/projects/{projectId}/tasks/{taskId}", "TaskController@show");
        Route::get("/projects/{projectId}/tasks/{taskId}/edit", "TaskController@edit");
        Route::get("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@edit");

        Route::post("/projects/{projectId}/tasks", "TaskController@store");
        Route::post("/projects/{projectId}/tasks/{taskId}", "TaskController@update");
        Route::delete("/projects/{projectId}/tasks/{taskId}", "TaskController@destroy");

        //timesheets
        Route::get("/timesheets", "TimesheetController@index");
        Route::get("/timesheets/create", "TimesheetController@create");
        Route::get("/timesheets/{timesheetId}", "TimesheetController@show");
        Route::get("/timesheets/{timesheetId}/edit", "TimesheetController@edit");

        Route::post("/timesheets", "TimesheetController@store");
        Route::post("/timesheets/{timesheetId}", "TimesheetController@update");
        Route::delete("/timesheets/{timesheetId}", "TimesheetController@destroy");

        //ath
        Route::get("/auth", "UserController@index");
        Route::get("/auth/sign-up", "UserController@create");
        Route::get("/auth/sign-in", "UserController@login");

        Route::post("/auth/sign-in", "UserController@authenticate");
        Route::post("/auth/sign-up", "UserController@store");
        Route::post("/auth/{userId}/update", "UserController@store");


        // Dispatch the request
        Route::resolve();
    }
}
