<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* School Resource Routes */
Route::get('/schools', 'SchoolController@index')->name('schools.index');
Route::middleware('auth')->group(function () {
    Route::get('/schools/create', 'SchoolController@create')->name('schools.create');
});
Route::get('/schools/{school}', 'SchoolController@show')->where('school', '[0-9]+')->name('schools.show');
Route::middleware('auth')->group(function () {
    Route::post('/schools', 'SchoolController@store')->name('schools.store');
    Route::get('/schools/{school}/edit', 'SchoolController@edit')->where('school', '[0-9]+')->name('schools.edit');
    Route::put('/schools/{school}', 'SchoolController@update')->where('school', '[0-9]+')->name('schools.update');
    Route::delete('/schools/{school}', 'SchoolController@destroy')->where('school', '[0-9]+')->name('schools.destroy');
});

/* Teacher Resource Routes */
Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
Route::middleware('auth')->group(function () {
    Route::get('/teachers/create', 'TeacherController@create')->name('teachers.create');
});
Route::get('/teachers/{teacher}', 'TeacherController@show')->where('teacher', '[0-9]+')->name('teachers.show');
Route::middleware('auth')->group(function () {
    Route::post('/teachers', 'TeacherController@store')->name('teachers.store');
    Route::get('/teachers/{teacher}/edit', 'TeacherController@edit')->where('teacher', '[0-9]+')->name('teachers.edit');
    Route::put('/teachers/{teacher}', 'TeacherController@update')->where('teacher', '[0-9]+')->name('teachers.update');
    Route::delete('/teachers/{teacher}', 'TeacherController@destroy')->where('teacher', '[0-9]+')->name('teachers.destroy');
});

/* Course Resource Routes */
Route::get('/courses', 'CourseController@index')->name('courses.index');
Route::middleware('auth')->group(function () {
    Route::get('/courses/create', 'CourseController@create')->name('courses.create');
});
Route::get('/courses/{course}', 'CourseController@show')->where('course', '[0-9]+')->name('courses.show');
Route::middleware('auth')->group(function () {
    Route::post('/courses', 'CourseController@store')->name('courses.store');
    Route::get('/courses/{course}/edit', 'CourseController@edit')->where('course', '[0-9]+')->name('courses.edit');
    Route::put('/courses/{course}', 'CourseController@update')->where('course', '[0-9]+')->name('courses.update');
    Route::delete('/courses/{course}', 'CourseController@destroy')->where('course', '[0-9]+')->name('courses.destroy');
});
