<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin/ourwork/quatation/test','OutworkController@test');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/ourwork/index', 'OutworkController@index');
    Route::get('/admin/ourwork/create', 'OutworkController@create');
    Route::post('/admin/ourwork/store', 'OutworkController@store');
    Route::get('/admin/ourwork/Quatation','OutworkController@Quatations');

    Route::post('/add/slide/font/{slide}', 'BannershowController@storeFont');
    Route::post('/admin/Bannerandfont/store', 'BannershowController@store');
    Route::get('/add/slide/font/{slide}', 'BannershowController@addFont');
    Route::get('/admin/bannerforn/create', 'BannershowController@create');
    Route::get('/admin/Bannerandfont/bannershow','BannershowController@bannershow');
    Route::get('/admin/Bannerandfont/fontshow','BannershowController@fontshow');
    Route::get('/admin/Bannerandfont/edit/{slide}','BannershowController@edit');
    Route::post('/admin/Bannerandfont/edit/{slide}','BannershowController@update');


    Route::get('/admin/ourwork/{ourwork}/detail', 'OutworkController@detail');
    Route::post('/admin/ourwork/{ourwork}/update', 'OutworkController@update');
    Route::post('/admin/ourwork/{ourwork}/delete', 'OutworkController@delete');
    Route::post('/admin/ourwork/{ourworkfile}/set/coverpage', 'OutworkController@set_coverpage');
    Route::post('/admin/ourwork/{ourworkfile}/file/delete', 'OutworkController@file_delete');
    Route::post('/admin/ourwork/{ourwork}/add/file', 'OutworkController@add_file');


    Route::get('/admin/housestyles', 'HousestyleController@admin_index');
    Route::get('/admin/housestyle/create', 'HousestyleController@admin_create');
    Route::post('/admin/housestyle/store', 'HousestyleController@admin_store');
    Route::get('/admin/housestyle/{housestyle}/detail', 'HousestyleController@admin_detail');
    Route::post('/admin/housestyle/{housestyle}/update', 'HousestyleController@admin_update');
    Route::post('/admin/housestyle/{plantotag}/tag/delete', 'HousestyleController@tage_delete');

    Route::get('/admin/tag/index', 'HousestyleController@tag_index');
    Route::get('/admin/tag/create', 'HousestyleController@tag_create');
    Route::post('/admin/tag/store', 'HousestyleController@tag_store');
    Route::post('/admin/tag/{housestyle}/update', 'HousestyleController@update_tag');
    Route::post('/admin/tag/update/{tag}', 'HousestyleController@tag_update');


    Route::get('/admin/promotions', 'PromotionController@admin_index');
    Route::get('/admin/promotion/create', 'PromotionController@admin_create');
    Route::post('/admin/promotion/store', 'PromotionController@admin_store');
    Route::get('/admin/promotion/{promotion}/detail', 'PromotionController@detail');
    Route::post('/admin/promotion/{promotion}/update', 'PromotionController@update');
    Route::post('/admin/promotion/{promotion}/delete', 'PromotionController@delete');

    Route::post('/admin/auth/user/update/{user}', 'UserController@auth_update');
    Route::get('/admin/auth/user/show', 'UserController@show');
    Route::post('/admin/match/user/{user}', 'Point\MatchUserController@match');
    Route::post('/admin/match/user/edit/{user}', 'Point\MatchUserController@matchEdit');
    Route::post('/match/to/mytcg/{user}', 'Point\MatchUserController@matchMytcg');

    Route::get('/admin/manage/user/point/{user}/detals', 'Point\UserPointController@detals');
    Route::get('/admin/manage/user/point/reports', 'Point\UserPointController@reports');
    Route::post('/admin/cut/point/{user}', 'Point\UserPointController@cutPoint');
    Route::post('/admin/add/point/{user}', 'Point\UserPointController@addPoint');
    Route::get('/admin/current_points', 'Point\UserPointController@current_points');
    Route::get('/admin/point/users', 'UserController@point');


    Route::get('/aboutme', 'UserController@index');
    Route::post('/aboutme/name/{user}', 'UserController@name');
    Route::post('/aboutme/photo/{user}', 'UserController@photo');
    Route::post('/aboutme/updatePassword/{user}', 'UserController@updatePassword');
    Route::get('/builder/admin/users', 'UserController@lists');
    Route::post('/builder/admin/user/{user}', 'UserController@update');
    Route::get('/user/register', 'UserController@store');

    Route::get('/admin/index', 'AdminController@index')->name('home');;

    Route::get('/admin/dashboard', 'AdminController@index');

    Route::get('/builder/admin/roles', 'RoleController@index');
    Route::get('/builder/admin/role/create', 'RoleController@create');
    Route::post('/builder/admin/role', 'RoleController@store');
    Route::get('/builder/admin/role/{role}/edit', 'RoleController@edit');
    Route::patch('/builder/admin/role/{role}', 'RoleController@update');

    Route::get('/builder/admin/permissions', 'PermissionController@index');
    Route::get('/builder/admin/permission/create', 'PermissionController@create');
    Route::post('/builder/admin/permission', 'PermissionController@store');
    Route::get('/builder/admin/permission/{permission}/edit', 'PermissionController@edit');
    Route::patch('/builder/admin/permission/{permission}', 'PermissionController@update');


    // Auth::routes();

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::group(['middleware' => 'web_counter'], function () {
    Route::get('/', 'HomeController@index');
});

Route::post('/send/user-email', 'UserEmailController@store');

Route::get('/promotion/{promotion}/show', 'PromotionController@show');

Route::get('/user-review', 'PromotionController@user_receive');

Route::get('/promotions', 'PromotionController@index');

Route::get('/ourwork/{ourwork}/show', 'OurworkController@show');
Route::get('/ourworks', 'OurworkController@index');

Route::get('/construction', 'HomeController@construction');
Route::get('/preparing', 'HomeController@preparing');
Route::get('/contact', 'HomeController@contact');


Route::get('/housestyle/{housestyle}/show', 'HousestyleController@show');
Route::get('/housestyles', 'HousestyleController@index');

Route::post('/join_us', 'HomeController@store');
Route::get('/join_us', 'HomeController@join_us');

Route::get('/joinuscl', 'joinusController@index');

Route::get('/show_user/detail/{joinus_id}', 'joinusController@detail');

Route::post('/joinuscl/accept/{joinus}', 'joinusController@accept');




 Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
