<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//auth

//award
Route::get('/awards', 'AwardController@index');
Route::get('/award/{id}', 'AwardController@show');
Route::get('/award/user/{id}', 'AwardController@showUser');
Route::post('/award', 'AwardController@store');
Route::put('/award/{id}', 'AwardController@update');
Route::delete('/award/{id}', 'AwardController@delete');

//education
Route::get('/education', 'EducationController@index');
Route::get('/education/{id}', 'EducationController@show');
Route::get('/education/user/{id}', 'EducationController@showUser');
Route::post('/education', 'EducationController@store');
Route::put('/education/{id}', 'EducationController@update');
Route::delete('/education/{id}', 'EducationController@delete');

//exprience
Route::get('/expriences', 'ExprienceController@index');
Route::get('/exprience/{id}', 'ExprienceController@show');
Route::get('/exprience/user/{id}', 'ExprienceController@showUser');
Route::post('/exprience', 'ExprienceController@store');
Route::put('/exprience/{id}', 'ExprienceController@update');
Route::delete('/exprience/{id}', 'ExprienceController@delete');

//portofolio
Route::get('/portofolio', 'PortofolioController@index');
Route::get('/portofolio/{id}', 'PortofolioController@show');
Route::get('/portofolio/user/{id}', 'PortofolioController@showUser');
Route::post('/portofolio', 'PortofolioController@store');
Route::put('/portofolio/{id}', 'PortofolioController@update');
Route::delete('/portofolio/{id}', 'PortofolioController@delete');

//profile
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{id}', 'ProfileController@show');
Route::get('/profile/user/{id}', 'ProfileController@showUser');
Route::post('/profile', 'ProfileController@store');
Route::put('/profile/{id}', 'ProfileController@update');
Route::delete('/profile/{id}', 'ProfileController@delete');

//Skill
Route::get('/skill', 'SkillController@index');
Route::get('/skill/{id}', 'SkillController@show');
Route::get('/skill/user/{id}', 'SkillController@showUser');
Route::post('/skill', 'SkillController@store');
Route::put('/skill/{id}', 'SkillController@update');
Route::delete('/skill/{id}', 'SkillController@delete');

//user
Route::get('/users', 'UserController@index');

//auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});