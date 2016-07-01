<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('foo', function () {
    return 'Hello World';
});

$app->get('user/{id}', function ($id) {
    return 'User ' . $id;
});

$app->get('/{name}', function($name) use ($app) {

    $options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));

    $context = stream_context_create($options);
    $url = "https://api.github.com/users/" . urlencode($name);
    $result = json_decode(file_get_contents($url, true, $context));

    return response([
        'result' => $result
    ]);
});

$app->get('api/article', [
    'as' => 'article_index', 'uses' => 'ArticleController@index'
]);

$app->get('api/article/{id}', [
    'as' => 'article_show', 'uses' => 'ArticleController@show'
]);

$app->post('api/article', [
    'as' => 'article_store', 'uses' => 'ArticleController@store'
]);

$app->put('api/article/{id}', [
    'as' => 'article_update', 'uses' => 'ArticleController@update'
]);

$app->delete('api/article/{id}', [
    'as' => 'article_destroy', 'uses' => 'ArticleController@destroy'
]);

$app->delete('api/article', [
    'as' => 'article_delete', 'uses' => 'ArticleController@delete'
]);

