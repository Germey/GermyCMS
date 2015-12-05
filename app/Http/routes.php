<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */


    Route::get('/', 'WelcomeController@index');

    Route::get('home', 'HomeController@index');


    /* 前台登录注册 */
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);


    /* 路由模型绑定 */
    Route::model('article', 'App\Model\Article');
    Route::model('tag', 'App\Model\Tag');
    Route::model('info', 'App\Model\User');

    /* 后台管理 */
    Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin', 'namespace' => 'Admin'], function() {
        Route::get('/', 'HomeController@index');
        Route::resource('tag', 'TagController');
        Route::resource('article', 'ArticleController');
        Route::resource('user', 'UserController');
        Route::resource('info', 'InfoController');
    });


    /* 后台权限，单独分离，防止发生重定向循环 */
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::controllers([
            'auth' => 'AuthController',
            'password' => 'PasswordController',
        ]);
    });


    /* 操作管理 */
    Route::group(['namespace' => 'Admin'], function() {
        Route::get('ajaxGetTags', 'TagController@ajaxGetTags');
        Route::post('ajaxAddTags', 'TagController@ajaxAddTags');
    });



