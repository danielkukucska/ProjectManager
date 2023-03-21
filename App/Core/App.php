<?php
class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        // Define routes
        Route::get('/projects', 'ProjectController@index');
        Route::get('/projects/{id}', 'ProjectController@show');
        Route::get('/projects/create', 'ProjectController@create');
        Route::post('/projects', 'ProjectController@store');
        Route::get('/projects/{id}/edit', 'ProjectController@edit');
        Route::put('/projects/{id}', 'ProjectController@update');
        Route::get('/projects/{id}/delete', 'ProjectController@delete');
        Route::delete('/projects/{id}', 'ProjectController@destroy');

        // Dispatch the request
        Route::resolve();
    }
}
