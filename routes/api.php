<?php

use Illuminate\Http\Request;

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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::get('subjects/{subject}/students', 'SubjectController@showStudents');
Route::get('subjects/{subject}/professors', 'SubjectController@showProfessors');
Route::get('students/{student}/subjects', 'StudentController@showSubjects');

Route::group(['middleware'=>['jwt.auth']], function()
{
    Route::group(['middleware'=>'App\Http\Middleware\Admin'], function()
    {
        Route::resource('roles','RoleController');
        Route::resource('payments','PaymentController');
        Route::resource('users','UserController');

        Route::resource('semesters','SemesterController',['except' => 'index','show']);
        Route::resource('courses','CourseController',['except' => 'index','show']);
        Route::resource('students','StudentController',['except' => 'index','show']);
        Route::resource('professors','ProfessorController',['except' => 'index','show']);
        Route::resource('subjects','SubjectController',['except' => 'index','show']);

        Route::resource('subject_professor','Subject_ProfessorController');

    });

    Route::group(['middleware'=>'App\Http\Middleware\Professor'], function()
    {
        Route::resource('student_subject','Student_SubjectController');
    });

    Route::group(['middleware'=>'App\Http\Middleware\Student'], function()
    {

    });

    Route::get('semesters','SemesterController@index');
    Route::get('courses','CourseController@index');
    Route::get('students','StudentController@index');
    Route::get('professors','ProfessorController@index');
    Route::get('subjects','SubjectController@index');

    Route::get('semesters','SemesterController@show');
    Route::get('courses','CourseController@show');
    Route::get('students','StudentController@show');
    Route::get('professors','ProfessorController@show');
    Route::get('subjects','SubjectController@show');

    Route::get('logout', 'AuthController@logout');
});


