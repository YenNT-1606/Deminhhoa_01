<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\student;

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
Route::get('/student', [StudentController::class, 'get_all_student'])->name('listStudent_UI');
// Route::post('/student_add', [StudentController::class, 'create'])->name('student');

// render ui 
Route::get('/createMember',[StudentController::class, 'create'])->name('createNemberUI');

Route::get('/editMember/{id}',[StudentController::class, 'get_student_by_id'])->name('edit_member_ui');

Route::post('/edit/{id}', [StudentController::class, 'edit'])->name('update_member');

// create member 
Route::post('/student_add', [StudentController::class, 'add_member'])->name('add_member');


//delate

Route::DELETE('/delete/{id}', [StudentController::class, 'destroy'])->name('delete-student');



// update 
// Route::post('/update')


// Route::get('/student_add', [StudentController::class, 'add_student'])->name('add');
// Route::get('student', [StudentController::class, 'add_student'])->name('add_student');
