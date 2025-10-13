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
Route::get('/schools/create', 'SchoolController@create')->name('schools.create');
Route::post('/schools', 'SchoolController@store')->name('schools.store');
Route::get('/schools/{school}', 'SchoolController@show')->name('schools.show');
Route::get('/schools/{school}/edit', 'SchoolController@edit')->name('schools.edit');
Route::put('/schools/{school}', 'SchoolController@update')->name('schools.update');
Route::delete('/schools/{school}', 'SchoolController@destroy')->name('schools.destroy');

/* Teacher Resource Routes */
Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
Route::get('/teachers/create', 'TeacherController@create')->name('teachers.create');
Route::post('/teachers', 'TeacherController@store')->name('teachers.store');
Route::get('/teachers/{teacher}', 'TeacherController@show')->name('teachers.show');
Route::get('/teachers/{teacher}/edit', 'TeacherController@edit')->name('teachers.edit');
Route::put('/teachers/{teacher}', 'TeacherController@update')->name('teachers.update');
Route::delete('/teachers/{teacher}', 'TeacherController@destroy')->name('teachers.destroy');

/* Course Resource Routes */
Route::get('/courses', 'CourseController@index')->name('courses.index');
Route::get('/courses/create', 'CourseController@create')->name('courses.create');
Route::post('/courses', 'CourseController@store')->name('courses.store');
Route::get('/courses/{course}', 'CourseController@show')->name('courses.show');
Route::get('/courses/{course}/edit', 'CourseController@edit')->name('courses.edit');
Route::put('/courses/{course}', 'CourseController@update')->name('courses.update');
Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
