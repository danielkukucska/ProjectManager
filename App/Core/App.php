<?php
class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        // Define routes
        Route::get("/projects", "ProjectController@index");
        Route::get("/projects/create", "ProjectController@create");
        Route::get("/projects/{projectId}", "ProjectController@show");
        Route::get("/projects/{projectId}/edit", "ProjectController@edit");
        Route::get("/projects/{projectId}/delete", "ProjectController@delete");

        Route::post("/projects", "ProjectController@store");
        Route::put("/projects/{projectId}", "ProjectController@update");
        Route::delete("/projects/{projectId}", "ProjectController@destroy");


        Route::get("/projects/{projectId}/tasks", "TaskController@index");
        Route::get("/projects/{projectId}/tasks/create", "TaskController@create");
        Route::get("/projects/{projectId}/tasks/{taskId}", "TaskController@show");
        Route::get("/projects/{projectId}/tasks/{taskId}/edit", "TaskController@edit");
        Route::get("/projects/{projectId}/tasks/{taskId}/delete", "TaskController@edit");

        Route::post("/projects/{projectId}/tasks/{taskId}", "ProjectController@store");
        Route::put("/projects/{projectId}/tasks/{taskId}", "ProjectController@update");
        Route::delete("/projects/{projectId}/tasks/{taskId}", "ProjectController@destroy");

        Route::get("/timesheets", "TimeshetController@index");
        Route::get("/timesheets/create", "TaskController@create");
        Route::get("/timesheets/{timesheetId}", "TaskController@show");
        Route::get("/timesheets/{timesheetId}/edit", "TaskController@edit");

        Route::post("/timesheets", "ProjectController@store");
        Route::put("/timesheets/{timesheetId}", "ProjectController@update");
        Route::delete("/timesheets/{timesheetId}", "ProjectController@destroy");



        Route::get("/auth", "UserController@index");
        Route::get("/auth/sign-up", "UserController@create");
        Route::get("/auth/sign-in", "UserController@login");

        Route::post("/auth/sign-in", "ProjectController@authenticate");
        Route::post("/auth/sign-up", "ProjectController@store");
        Route::post("/auth/{userId}/update", "ProjectController@store");


        // Dispatch the request
        Route::resolve();
    }
}
