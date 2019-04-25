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



Route::middleware('can:accessAdminpanel')->name('admin.')->group(function () {
    
    Route::get('admin', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/groups', 'Admin\GroupsController');
    Route::resource('admin/trainings', 'Admin\TrainingsController');

    Route::get('admin/users/{user}/training/{training}','Admin\UserTrainingController@getUserTraining')->name('trainings.user_training');
    // Manipulate groups for User
    Route::patch('admin/users/{user}/groups','Admin\UserGroupsController@update')->name('users.updateGroups');
    Route::get('admin/users/{user}/groups','Admin\UserGroupsController@edit')->name('users.editGroups');

    // Manipulate groups for Training
    Route::patch('admin/trainings/{training}/groups','Admin\TrainingGroupsController@update')->name('trainings.updateGroups');
    Route::get('admin/trainings/{training}/groups','Admin\TrainingGroupsController@edit')->name('trainings.editGroups');

    Route::patch('admin/users/{user}/training/{training}','Admin\UserTrainingController@updateTrainingStatus')->name('trainings.update_status');

});


Route::name('member.')->group(function () {
    
    Route::get('member/dashboard', 'Member\DashboardController@index')->name('dashboard');
   
    Route::get('member/trainings', 'Member\TrainingsController@index')->name('trainings.index');
    Route::get('member/trainings/show', 'Member\TrainingsController@show')->name('trainings.show');

});


