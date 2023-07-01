<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\FiliereMatiereController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\PDFController;











/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'Postforgotpassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);






Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //student

    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);


    //Teacher

    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    // filiere url

    Route::get('admin/filiere/list', [FiliereController::class, 'list']);
    Route::get('admin/filiere/add', [FiliereController::class, 'add']);
    Route::post('admin/filiere/add', [FiliereController::class, 'insert']);
    Route::get('admin/filiere/edit/{id}', [FiliereController::class, 'edit']);
    Route::post('admin/filiere/edit/{id}', [FiliereController::class, 'update']);
    Route::get('admin/filiere/delete/{id}', [FiliereController::class, 'delete']);

    // matiere url

    Route::get('admin/matiere/list', [MatiereController::class, 'list']);
    Route::get('admin/matiere/add', [MatiereController::class, 'add']);
    Route::post('admin/matiere/add', [MatiereController::class, 'insert']);
    Route::get('admin/matiere/edit/{id}', [MatiereController::class, 'edit']);
    Route::post('admin/matiere/edit/{id}', [MatiereController::class, 'update']);
    Route::get('admin/matiere/delete/{id}', [MatiereController::class, 'delete']);

    // assign_subject url

    Route::get('admin/assign_subject/list', [FiliereMatiereController::class, 'list']);
    Route::get('admin/assign_subject/add', [FiliereMatiereController::class, 'add']);
    Route::post('admin/assign_subject/add', [FiliereMatiereController::class, 'insert']);
    Route::get('admin/assign_subject/delete/{id}', [FiliereMatiereController::class, 'delete']);


    // assign_teacher to class url

    Route::get('admin/class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);

    //class timetable

    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);


});


Route::group(['middleware' => 'teacher'], function (){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/my_student', [StudentController::class, 'my_student']);
    Route::get('teacher/my_timetable', [ClassTimetableController::class, 'teacherTimetable']);

    Route::get('teacher/addFile', [PDFController::class, 'addFile']);
    Route::post('teacher/addFile', [PDFController::class, 'insert']);
    Route::get('teacher/delete/{id}', [PDFController::class, 'delete']);









});

Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('student/mysubject', [MatiereController::class, 'mysubject']);
    Route::get('student/my_timetable', [ClassTimetableController::class, 'myTimetable']);

    Route::get('student/readFile', [PDFController::class, 'readFile']);




});

Route::group(['middleware' => 'directeur'], function (){

    Route::get('directeur/dashboard', [DashboardController::class, 'dashboard']);

});
