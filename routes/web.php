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

Route::get('/logout', 'HomeController@logout');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'StudentController@index')->name('dashboard');
Route::get('/profile', 'StudentController@profile')->name('profile');
Route::get('/courses', 'StudentController@studentCourses')->name('courses');
Route::get('/messages', 'MessageController@show')->name('messages');
Route::get('/subscription', 'StudentController@subscription')->name('billing');
Route::post('user/update-profile', 'StudentController@updateprofile')->name('profile.update');
Route::get('/profile/update', 'StudentController@profileUpdate')->name('update.profile');
Route::post('update-password', 'StudentController@updatePassword')->name('password.update');
Route::get('/user/update-password', 'StudentController@password')->name('updatepassword');
Route::get('/curriculum/{id}', 'CourseController@curriculum')->name('curriculum');
Route::get('/mymessages/{id}', 'MessageController@getMessages')->name('message.all');
Route::post('messagesent', 'MessageController@storeMessage')->name('message.store');
Route::get('curriculum/lessons/{course_id}/{module_id}', 'CourseController@curriculumLesson')->name('curriculum.lessons');
Route::get('/lesson/view/{id}', 'CourseController@renderLesson')->name('lesson.render');

Route::get('/mycourses', 'StudentController@mycourses')->name('mycourses');
Route::get('/course/{course}/price/{price}', 'StudentController@subscribe')->name('sub');
Route::post('/pay', 'StudentController@pay')->name('pay');
Route::get('/lesson/material/{id}', 'CourseController@show_lesson')->name('pdf.html');

/**
 *
 * Admin
 */

Route::get('/all', 'AdminController@getIndex');
Route::get('/all', 'AdminController@getIndex')->name('datatables.data');

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('exams/create/{id}', 'ExamController@create')->name('exam-create');
    Route::get('exams/example', 'ExamController@downloadExample')->name('exam-example');
    Route::resource('exam', 'ExamController');

    Route::post('/admin/assign-role/', 'AdminController@saveTutor')->name('store.tutor');
    Route::get('/admin/assign-role/{id}', 'AdminController@assignTutor')->name('assign.tutor');
    Route::get('/facilitator/profile/{id}', 'AdminController@facilitator_profile')->name('facilitator.profile');
    Route::get('/admin/facilitators', 'AdminController@facilitators')->name('facilitators');
    Route::get('/student/profile/{id}', 'AdminController@profile')->name('student.profile');
    Route::get('/student/course/{id}', 'AdminController@studentCourse')->name('student.allCourse');
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/admin/course/edit', 'AdminController@createCourse')->name('admin.course.edit');
    Route::get('/admin/course/lesson/{id}', 'AdminController@lessons')->name('admin.course.lessons');
    Route::get('/admin/course/edit-lesson/{id}', 'AdminController@createLesson')->name('admin.course.edit-lesson');
    Route::get('/admin/course/edit-description', 'AdminController@createCourseDescription')->name('admin.course.edit-description');
    Route::get('/admin/courses', 'AdminController@course')->name('admin.courses');
    Route::get('/admin/students', 'StudentController@students')->name('students');
    Route::get('/student/disable/{id}', 'StudentController@destroy')->name('student.disable');

    Route::get('/admin/profile', 'AdminController@adminProfile')->name('admins_profile');
    Route::post('/admin/profile', 'AdminController@adminProfileUpdate')->name('admins_profile_update');
    Route::get('/course/{id}/students', 'StudentController@courseStudent')->name('course.students');
    Route::get('/course/{id}/facilitator', 'TutorController@viewFacilitator')->name('course.facilitator');

    Route::get('/admin/password/update', 'AdminController@updatePassword')->name('update.pass');
    Route::post('/admin/password/store', 'AdminController@storePassword')->name('pass.store');


    Route::get('/admin/create-module/{id}', 'AdminController@moduleCreate')->name('module.create');
    Route::post('/module/', 'AdminController@moduleStore')->name('module.store');
    Route::get('/admin/modules/{id}', 'AdminController@moduleShow')->name('module.show');

    Route::get('/module/edit/{id}', 'AdminController@editModule')->name('module.edit');
    Route::post('/module/update', 'AdminController@updateModule')->name('module.update');

    Route::get('/lessons/{id}', 'AdminController@lessonShow')->name('lesson.show');
    Route::get('/lessons/create/{id}', 'AdminController@lessonCreate')->name('lesson.form');
    Route::post('/lesson/save', 'AdminController@LessonStore')->name('store.lesson');
    Route::get('/lessons/edit/{id}', 'AdminController@editLesson')->name('lesson-edit');
    Route::post('/lesson/update', 'AdminController@updateLesson')->name('lesson-update');

    Route::get('/tutor/{id}', 'TutorController@create')->name('tutor.create');
    Route::post('/tutor/create', 'TutorController@store')->name('tutor.store');

    Route::get('/admin/course/edit/{id}', 'AdminController@editCourse')->name('update.course');
    Route::get('/admin/course/edit-description/{id}', 'AdminController@editDescription')->name('update.description');
    Route::get('/admin/edit-tutor/{id}', 'TutorController@editTutor')->name('update.tutor');

    Route::post('/admin/course/edit/{id}', 'AdminController@updateCourse')->name('update.course.store');
    Route::post('/admin/course/edit-description/{id}', 'AdminController@updateDescription')->name('update.description.store');
    Route::post('/admin/update-tutor/', 'TutorController@update')->name('update.tutor.store');

    Route::post('/admin/create-course', 'CourseController@nextCourse')->name('course.create');
    Route::post('/admin/store-course', 'CourseController@storeCourse')->name('course.store');


    Route::post('/lesson', 'LessonController@store')->name('lesson.store');
    Route::post('/lessons/update', 'LessonController@update')->name('lesson.update');
    Route::get('/lesson/edit/{id}', 'LessonController@editLesson')->name('edit');

    Route::get('/admin/course/{course}/lesson/{lesson}', 'LessonController@lessonVideos')->name('lesson.videos');
    Route::get('/admin/course/{course}/lesson/{lesson}/create', 'LessonController@createVideo')->name('create.videos');
    Route::post('/admin/add-video', 'LessonController@storeVideo')->name('video.store');

});

Route::get('admin/create/user', 'SuperAdminController@create')->name('user.create');
Route::post('/admin/create', 'SuperAdminController@store')->name('admin_create.store');

//Student Quiz Routes
Route::group(['prefix' => 'student'], function () {
    Route::get('question', 'UserExaminationController@index')->name('question.index');
    Route::get('question/{question_id}/course/{course_id}', 'UserExaminationController@getQuestions')->name('question.take');
    //Route::get('question/{url}', 'UserExaminationController@takeQuestions')->name('question.take');
    Route::post('question/submit', 'UserExaminationController@submitAnswers')->name('question.submit');
    Route::get('start/exam/{course_id}', 'UserExaminationController@startExam')->name('start.exam');
    Route::get('finish/exam/{course_id}', 'UserExaminationController@finishExam')->name('finish.exam');
});
