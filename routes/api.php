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

    Route::resource('student_subject','Student_SubjectController');
    Route::resource('subject_professor','Subject_ProfessorController');
    Route::resource('semesters','SemesterController');
    Route::resource('courses','CourseController');
    Route::resource('payments','PaymentController');
    Route::resource('students','StudentController');
    Route::resource('professors','ProfessorController');
    Route::resource('users','UserController');
    Route::resource('roles','RoleController');
    Route::resource('subjects','SubjectController');
    Route::get('logout', 'AuthController@logout');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
