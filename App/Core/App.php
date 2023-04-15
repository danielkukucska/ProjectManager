<?php
class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        session_start();

        // Define routes
        //projects
        Route::get("/projects", "ProjectController@index", true);
        Route::get("/projects/create", "ProjectController@create", true);
        Route::get("/projects/{projectId}", "ProjectController@show", true);
        Route::get("/projects/{projectId}/edit", "ProjectController@edit", true);
        Route::get("/projects/{projectId}/delete", "ProjectController@delete", true);

        Route::post("/projects", "ProjectController@store", true);
        Route::post("/projects/{projectId}", "ProjectController@update", true);
        Route::post("/projects/{projectId}/delete", "ProjectController@destroy", true);

        //tasks
        Route::get("/projects/{projectId}/tasks", "TaskController@index", true);
        Route::get("/projects/{projectId}/tasks/create", "TaskController@create", true);
        Route::get("/projects/{projectId}/tasks/{taskId}", "TaskController@show", true);
        Route::get("/projects/{projectId}/tasks/{taskId}/edit", "TaskController@edit", true);
        Route::get("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@delete", true);

        Route::post("/projects/{projectId}/tasks", "TaskController@store", true);
        Route::post("/projects/{projectId}/tasks/{taskId}", "TaskController@update", true);
        Route::post("/projects/{projectId}/tasks/{taskId}/assignments", "TaskController@addAssignment", true);
        Route::post("/projects/{projectId}/tasks/{taskId}/assignments/{userId}/delete", "TaskController@removeAssignment", true);
        Route::post("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@destroy", true);

        //timesheets
        Route::get("/timesheets", "TimesheetController@index", true);
        Route::get("/timesheets/create", "TimesheetController@create", true);
        Route::get("/timesheets/{timesheetId}", "TimesheetController@show", true);
        Route::get("/timesheets/{timesheetId}/edit", "TimesheetController@edit", true);

        Route::post("/timesheets", "TimesheetController@store", true);
        Route::post("/timesheets/{timesheetId}", "TimesheetController@update", true);
        Route::post("/timesheets/{timesheetId}/delete", "TimesheetController@destroy", true);

        //ath
        Route::get("/auth", "UserController@index", true);
        Route::get("/auth/sign-up", "UserController@signUp", false);
        Route::get("/auth/sign-in", "UserController@signIn", false);
        Route::get("/auth/sign-out", "UserController@signOut", true);
        Route::get("/auth/change-password", "UserController@changePassword", true);

        Route::post("/auth/sign-in", "UserController@authenticate", false);
        Route::post("/auth/sign-up", "UserController@store", false);
        Route::post("/auth/{userId}/update", "UserController@update", true);


        // Dispatch the request
        Route::resolve();
    }
}
