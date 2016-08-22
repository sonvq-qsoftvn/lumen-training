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

function rest($path, $controller) {
    global $app;

    $app->get($path, $controller . '@index');
    $app->get($path . '/{id}', $controller . '@show');
    $app->post($path, $controller . '@store');
    $app->put($path . '/{id}', $controller . '@update');
    $app->delete($path . '/{id}', $controller . '@destroy');
}

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('auth/login', [
    'as' => 'article_store', 'uses' => 'AuthController@postLogin'
]);

$app->get('/{name}', function($name) use ($app) {

    $options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));

    $context = stream_context_create($options);
    $url = "https://api.github.com/users/" . urlencode($name);
    $result = json_decode(file_get_contents($url, true, $context));

    return response([
        'result' => $result
    ]);
});


$app->get('api/cassandra', [
    'as' => 'cassandra_index', 'uses' => 'CassandraController@index'
]);


$app->post('oauth2/access_token', function () use ($app) {
    return response()->json(app('oauth2-server.authorizer')->issueAccessToken());
});


rest('api/article', 'ArticleController');

//$app->group(['prefix' => 'api', 'middleware' => 'jwt.auth'], function($app) {
//    
//});


//rest('/api/article', 'ArticleController');

$app->group(['middleware' => 'oauth'], function () use ($app) {
    $app->get('user', function () use ($app) {
        // return the protected resource
        //echo “success authentication”;
        $user_id = Authorizer::getResourceOwnerId(); // the token user_id
        var_dump($user_id);die;
    });
});


//$app->get('api/article', [
//    'as' => 'article_index', 'uses' => 'ArticleController@index'
//]);
//
//$app->get('api/article/{id}', [
//    'as' => 'article_show', 'uses' => 'ArticleController@show'
//]);
//
//$app->post('api/article', [
//    'as' => 'article_store', 'uses' => 'ArticleController@store'
//]);
//
//$app->put('api/article/{id}', [
//    'as' => 'article_update', 'uses' => 'ArticleController@update'
//]);
//
//$app->delete('api/article/{id}', [
//    'as' => 'article_destroy', 'uses' => 'ArticleController@destroy'
//]);
//
//$app->delete('api/article', [
//    'as' => 'article_delete', 'uses' => 'ArticleController@delete'
//]);

