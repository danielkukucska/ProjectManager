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

        //home
        Route::get("", "HomeController@index", false, false);

        //projects
        Route::get("/projects", "ProjectController@index", true, false);
        Route::get("/projects/create", "ProjectController@create", true, false);
        Route::get("/projects/{projectId}", "ProjectController@show", true, false);
        Route::get("/projects/{projectId}/edit", "ProjectController@edit", true, false);
        Route::get("/projects/{projectId}/delete", "ProjectController@delete", true, false);

        Route::post("/projects", "ProjectController@store", true, false);
        Route::post("/projects/{projectId}", "ProjectController@update", true, false);
        Route::post("/projects/{projectId}/delete", "ProjectController@destroy", true, false);

        //tasks
        Route::get("/projects/{projectId}/tasks", "TaskController@index", true, false);
        Route::get("/projects/{projectId}/tasks/create", "TaskController@create", true, false);
        Route::get("/projects/{projectId}/tasks/{taskId}", "TaskController@show", true, false);
        Route::get("/projects/{projectId}/tasks/{taskId}/edit", "TaskController@edit", true, false);
        Route::get("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@delete", true, false);

        Route::post("/projects/{projectId}/tasks", "TaskController@store", true, false);
        Route::post("/projects/{projectId}/tasks/import", "TaskController@import", true, false);
        Route::post("/projects/{projectId}/tasks/{taskId}", "TaskController@update", true, false);
        Route::post("/projects/{projectId}/tasks/{taskId}/assignments", "TaskController@addAssignment", true, false);
        Route::post("/projects/{projectId}/tasks/{taskId}/assignments/{userId}/delete", "TaskController@removeAssignment", true, false);
        Route::post("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@destroy", true, false);

        //timesheets
        Route::get("/timesheets", "TimesheetController@index", true, false);
        Route::get("/timesheets/create", "TimesheetController@create", true, false);
        Route::get("/timesheets/{timesheetId}", "TimesheetController@show", true, false);
        Route::get("/timesheets/{timesheetId}/edit", "TimesheetController@edit", true, false);

        Route::post("/timesheets", "TimesheetController@store", true, false);
        Route::post("/timesheets/{timesheetId}", "TimesheetController@update", true, false);
        Route::post("/timesheets/{timesheetId}/timesheetlines", "TimesheetController@createTimesheetLine", true, false);
        Route::post("/timesheets/{timesheetId}/timesheetlines/update", "TimesheetController@updateTimesheetLine", true, false);

        //users
        Route::get("/users", "UserController@listUsers", true, true);
        Route::get("/users/{userId}", "UserController@show", true, true);
        Route::post("/users/{userId}/update", "UserController@update", true, false);


        //auth
        Route::get("/auth", "UserController@index", true, false);
        Route::get("/auth/sign-up", "UserController@signUp", false, false);
        Route::get("/auth/sign-in", "UserController@signIn", false, false);
        Route::get("/auth/sign-out", "UserController@signOut", true, false);
        Route::get("/auth/change-password", "UserController@changePassword", true, false);

        Route::post("/auth/sign-in", "UserController@authenticate", false, false);
        Route::post("/auth/sign-up", "UserController@store", false, false);


        // Dispatch the request
        Route::resolve();
    }
}
