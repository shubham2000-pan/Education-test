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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['IsUser']], function () {
Route::get('user', 'userdashbordController@index');
Route::get('profile', 'userdashbordController@show');
Route::post('profile_update', 'userdashbordController@update');
Route::get('password', 'userdashbordController@password');
});

Route::get('/', 'WebsiteController@show');
Route::get('cource', 'CourceController@cource');
Route::get('cource_details/{id}', 'CourceController@cource_deatails');
Route::get('about', 'WebsiteController@about');
Route::get('contact', 'ContactController@create');
Route::post('contact-store', 'ContactController@store');
Route::get('teacher', 'TeacherController@teacher');
Route::get('teacher/{id}', 'TeacherController@teacher_detailes');
Route::get('event', 'EventController@website');
Route::get('event_deatiles/{id}', 'EventController@event_deatiles');
Route::post('comment_store','CommentController@store');
Route::post('teachercomment_store','TeachercommentController@store');

Route::group(['middleware' => ['IsAdmin']], function () {
Route::get('admin', 'AdmindashbordController@index');
Route::get('cource-list', 'CourceController@index');
Route::post('cource_list', 'CourceController@show');
Route::get('admin/cource', 'CourceController@create');
Route::post('store', 'CourceController@store');
Route::get('cource-delete/{id}', 'CourceController@destroy');
Route::get('cource-edit/{id}', 'CourceController@edit');
Route::post('cource-update', 'CourceController@update');
Route::get('syllabus/{id}', 'SyllabusController@show');
Route::post('syllabus_store', 'SyllabusController@store');
Route::get('syllabus', 'SyllabusController@index');
Route::get('add_syllabus', 'SyllabusController@create');
Route::get('syllabus-delete/{id}', 'SyllabusController@destroy');
Route::get('syllabus-edit/{id}', 'SyllabusController@edit');
Route::post('syllabus_update', 'SyllabusController@update');
Route::post('syllabus_list', 'SyllabusController@ajax');
Route::get('notes_create', 'NotesController@create');
Route::post('notes_store', 'NotesController@store');
Route::get('notes_list', 'NotesController@index');
Route::post('notes-list', 'NotesController@show');
Route::get('notes-delete/{id}', 'NotesController@destroy');
Route::get('notes-edit/{id}', 'NotesController@edit');
Route::post('notes_update', 'NotesController@update');
Route::post('courceselect', 'NotesController@courceselect');
Route::get('add_user', 'UserController@create');
Route::post('user-store', 'UserController@store');
Route::get('user_list', 'UserController@index');
Route::post('user-list', 'UserController@ajax');
Route::get('delete-user/{id}', 'UserController@destroy');
Route::get('user_edit/{id}', 'UserController@edit');
Route::post('user_upadate', 'UserController@update');
Route::get('add_package', 'PackageController@create');
Route::post('package_store', 'PackageController@store');
Route::get('package_list', 'PackageController@index');
Route::post('package-list', 'PackageController@show');
Route::get('delete-package/{id}', 'PackageController@destroy');
Route::get('package_edit/{id}', 'PackageController@edit');
Route::post('package_update', 'PackageController@update');
Route::get('feestype_create', 'FeestypeController@create');
Route::post('feestype_store', 'FeestypeController@store');
Route::get('feestype_list', 'FeestypeController@index');
Route::post('feestype-list', 'FeestypeController@show');
Route::get('delete-feestype/{id}', 'FeestypeController@destroy');
Route::get('feestype_edit/{id}', 'FeestypeController@edit');
Route::post('feestype_update', 'FeestypeController@update');
Route::get('teacher_create', 'TeacherController@create');
Route::post('teacher-store', 'TeacherController@store');
Route::get('teacher_list', 'TeacherController@index');
Route::post('teacher-list', 'TeacherController@show');
Route::get('delete-teacher/{id}', 'TeacherController@destroy');
Route::get('teacher_edit/{id}', 'TeacherController@edit');
Route::post('teacher_update', 'TeacherController@update');
Route::get('event_create', 'EventController@create');
Route::post('event-store', 'EventController@store');
Route::get('event_list', 'EventController@index');
Route::post('event-list', 'EventController@show');
Route::get('delete-event/{id}', 'EventController@destroy');
Route::get('event_edit/{id}', 'EventController@edit');
Route::post('event_update', 'EventController@update');
Route::get('contact_list', 'ContactController@index');
Route::post('contact-list', 'ContactController@show');
Route::get('delete-contact/{id}', 'ContactController@destroy');
Route::get('contact_edit/{id}', 'ContactController@edit');
Route::post('contact_update', 'ContactController@update');


});

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

?>