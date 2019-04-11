<?php

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

Route::get('/', 'HomeController@index')->name('home');


Route::resource('users', 'UsersController');
Route::resource('groups', 'GroupsController');
Route::resource('trainings', 'TrainingsController');

Route::get('users/{user}/training/{training}','UserTrainingController@getUserTraining')->name('trainings.user_training');

Route::patch('users/{user}/training/{training}','UserTrainingController@updateTrainingStatus')->name('trainings.update_status');

Auth::routes(['register' => false]);


