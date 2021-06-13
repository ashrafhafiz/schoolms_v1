<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Users management routes.
Route::prefix('users')->name('users.')->group(function () {

    Route::get('view', [UserController::class, 'UsersView'])->name('view');
    Route::get('add', [UserController::class, 'UsersCreate'])->name('create');
    Route::post('add', [UserController::class, 'UsersStore'])->name('store');
    Route::get('edit/{id}', [UserController::class, 'UsersEdit'])->name('edit');
    Route::put('edit/{id}', [UserController::class, 'UsersUpdate'])->name('update');
    Route::get('delete/{id}', [UserController::class, 'UsersDelete'])->name('delete');
});

// Profile management routes.
Route::prefix('profile')->name('profile.')->group(function () {

    Route::get('view', [ProfileController::class, 'ProfileView'])->name('view');
    Route::get('edit', [ProfileController::class, 'ProfileEdit'])->name('edit');
    Route::put('edit', [ProfileController::class, 'ProfileUpdate'])->name('update');
    Route::get('password/view', [ProfileController::class, 'ProfilePasswordView'])->name('password.view');
    Route::put('password/update', [ProfileController::class, 'ProfilePasswordUpdate'])->name('password.update');
});


// Setup management routes.
Route::prefix('setup')->name('setup.')->group(function () {

    // Student routes
    Route::get('student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassCreate'])->name('student.class.create');
    Route::post('student/class/add', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::put('student/class/edit/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    // Year routes
    Route::get('student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'StudentYearCreate'])->name('student.year.create');
    Route::post('student/year/add', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::put('student/year/edit/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    // Group routes
    Route::get('student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupCreate'])->name('student.group.create');
    Route::post('student/group/add', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::put('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

    // Shift routes
    Route::get('student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftCreate'])->name('student.shift.create');
    Route::post('student/shift/add', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::put('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
});
