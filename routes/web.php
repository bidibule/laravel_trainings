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



Auth::routes(['register' => false]);



Route::middleware('can:accessAdminpanel')->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('groups', 'Admin\GroupsController');
    Route::resource('trainings', 'Admin\TrainingsController');

    Route::get('users/{user}/training/{training}','Admin\UserTrainingController@getUserTraining')->name('trainings.user_training');
    
    // Manipulate groups for User
    Route::patch('users/{user}/groups','Admin\UserGroupsController@update')->name('users.updateGroups');
    Route::get('users/{user}/groups','Admin\UserGroupsController@edit')->name('users.editGroups');

    // Manipulate groups for Training
    Route::patch('trainings/{training}/groups','Admin\TrainingGroupsController@update')->name('trainings.updateGroups');
    Route::get('trainings/{training}/groups','Admin\TrainingGroupsController@edit')->name('trainings.editGroups');

    Route::patch('users/{user}/training/{training}','Admin\UserTrainingController@updateTrainingStatus')->name('trainings.update_status');

});


Route::prefix('member')->name('member.')->group(function () {
    
    Route::get('dashboard', 'Member\DashboardController@index')->name('dashboard');
   
    Route::get('trainings', 'Member\TrainingsController@index')->name('trainings.index');
    Route::get('trainings/{training}', 'Member\TrainingsController@show')->name('trainings.show');

    Route::get('profile', 'Member\UsersController@profile')->name('profile');

    Route::patch('trainings/{training}','Member\TrainingsController@updateTrainingStatus')->name('trainings.update_status');

});


