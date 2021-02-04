<?php

use Illuminate\Routing\Router;

Admin::routes();
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    //设置
    $router->get('forms/settings', 'FormController@settings');
    //私密
    $router->get('forms/configpris', 'FormController@configpris');
    //技能认证
    $router->resource('attestations', AttestationController::class);
    //身份认证
    $router->resource('skills', SkillController::class);
    //技能订单
    $router->resource('skillorder', SkillorderController::class);
    //动态列表
    $router->resource('dynamic', DynamicController::class);

});
