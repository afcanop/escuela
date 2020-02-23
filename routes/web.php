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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::prefix('academic')->group(function () {
        Route::get('student/{codigoCurso}', 'academic\StudentController@create')->name('student.create');
        Route::post('student/{codigoCurso}', 'academic\StudentController@store')->name('student.store');
        Route::resource('student', 'academic\StudentController')->except(['create', 'store']);
        Route::get('lessons/{codigoCurso}', 'academic\LessonsController@create')->name('lessons.create');
        Route::post('lessons/{codigoCurso}', 'academic\LessonsController@store')->name('lessons.store');
        Route::get('lessons/{codeCurso}/{codeLesson}', 'academic\LessonsController@qualification')->name('lessons.qualification');
        Route::resource('lessons', 'academic\LessonsController')->except(['create', 'store']);
        Route::resource('courses', 'academic\CoursesController');
        Route::resource('quialification', 'academic\QuialificationsController')->only(['store']);

    });
});




