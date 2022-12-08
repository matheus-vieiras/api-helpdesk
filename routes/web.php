<?php

use App\Http\Controllers\V1\Ticket\TicketController;
use App\Models\Ticket\Ticket;
use App\Models\Post\Post;
use App\Models\Category\Category;
use App\Models\Agents\Agents;
use Illuminate\Support\Facades\Mail;

/** @var \Laravel\Lumen\Routing\Router $router */

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/', 'TicketController@index');
$router->post('/email', 'ContactController@store');

########### TICKETS

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Ticket'], function () use ($router) {
    $router->post('/tickets', [
        'uses' => 'TicketController@create'
    ]);
    $router->get('/tickets', [
        'uses' => 'TicketController@findAll'
    ]);
    $router->get('/tickets/{id}', [
        'uses' => 'TicketController@findOneBy'
    ]);
    $router->get('/tickets/service/{services}', [
        'uses' => 'TicketController@findByService'
    ]);
    $router->get('/tickets/category/{category}', [
        'uses' => 'TicketController@findByCategory'
    ]);
    $router->put('/tickets/{param}', [
        'uses' => 'TicketController@editBy'
    ]);
    $router->delete('/tickets/{id}', [
        'uses' => 'TicketController@delete'
    ]);
    $router->post('/tickets/email', [
        'uses' => 'TicketController@store'
    ]);
});

########### POSTS

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Post'], function () use ($router) {
    $router->post('/posts', [
        'uses' => 'PostController@create'
    ]);
    $router->get('/posts', [
        'uses' => 'PostController@findAll'
    ]);
    $router->get('/posts/ticket/{ticket}', [
        'uses' => 'PostController@findByTicket'
    ]);
    $router->get('/posts/{param}', [
        'uses' => 'PostController@findBy'
    ]);
    $router->put('/posts/{param}', [
        'uses' => 'PostController@editBy'
    ]);
//    $router->delete('/posts/ticket/{id}', [
//        'uses' => 'PostController@delete'
//    ]);
    $router->delete('/posts/ticket/{param}', [
        'uses' => 'PostController@deleteBy'
    ]);
    $router->delete('/posts/{ticket}', [
        'uses' => 'PostController@deleteByTicket'
    ]);
});

########### CATEGORIES

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Categories'], function () use ($router) {
    $router->post('/category', [
        'uses' => 'CategoryController@create'
    ]);
    $router->get('/category', [
        'uses' => 'CategoryController@findAll'
    ]);
    $router->get('/category/{id}', [
        'uses' => 'CategoryController@findOneBy'
    ]);
    $router->put('/category/{param}', [
        'uses' => 'CategoryController@editBy'
    ]);
    $router->delete('/category/{id}', [
        'uses' => 'CategoryController@delete'
    ]);
});

########### AGENTS

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Agents'], function () use ($router) {
    $router->post('/agents', [
        'uses' => 'AgentsController@create'
    ]);
    $router->get('/agents', [
        'uses' => 'AgentsController@findAll'
    ]);
    $router->get('/agents/{id}', [
        'uses' => 'AgentsController@findOneBy'
    ]);
    $router->put('/agents/{param}', [
        'uses' => 'AgentsController@editBy'
    ]);
    $router->delete('/agents/{id}', [
        'uses' => 'AgentsController@delete'
    ]);
});

########### SERVICES

$router->group(['prefix' => 'api/v1', 'namespace' => 'V1\Services'], function () use ($router) {
    $router->post('/services', [
        'uses' => 'ServicesController@create'
    ]);
    $router->get('/services', [
        'uses' => 'ServicesController@findAll'
    ]);
    $router->get('/services/{id}', [
        'uses' => 'ServicesController@findOneBy'
    ]);
    $router->put('/services/{param}', [
        'uses' => 'ServicesController@editBy'
    ]);
    $router->delete('/services/{id}', [
        'uses' => 'ServicesController@delete'
    ]);
});


