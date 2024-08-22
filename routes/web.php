<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/routes', function () {
    return response(app('router')->getRoutes());
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/user/register', 'UserController@register');
    $router->post('/user/sign-in', 'UserController@signIn');
    $router->post('/user/recover-password', 'UserController@recoverPassword');
    $router->patch('/user/recover-password', 'UserController@recoverPassword');

    $router->group(['middleware' => 'auth:sanctum'], function () use ($router) {
        $router->get('/user/companies', 'CompanyController@getCompanies');
        $router->post('/user/companies', 'CompanyController@createCompany');
    });
});
