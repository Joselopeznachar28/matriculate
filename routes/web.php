<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//subjects
Route::get('Materias', [SubjectController::class, 'index'])->name('subjets.index');
Route::get('Materias/crear', [SubjectController::class, 'create'])->name('subjets.create');
Route::post('Materias', [SubjectController::class, 'store'])->name('subjets.store');
Route::get('Materias/{id}/editar', [SubjectController::class, 'edit'])->name('subjets.edit');
Route::put('Materias/{id}/update', [SubjectController::class, 'update'])->name('subjets.update');
Route::delete('Materias/{id}', [SubjectController::class, 'destroy'])->name('subjets.destroy');
//Students
Route::get('Estudiantes', [StudentController::class, 'index'])->name('students.index');
Route::get('Estudiantes/crear', [StudentController::class, 'create'])->name('students.create');
Route::post('Estudiantes', [StudentController::class, 'store'])->name('students.store');
Route::get('Estudiantes/{id}/editar', [StudentController::class, 'edit'])->name('students.edit');
Route::put('Estudiantes/{id}/update', [StudentController::class, 'update'])->name('students.update');
Route::delete('Estudiantes/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
//Teachers
Route::get('Profesor', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('Profesor/crear', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('Profesor', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('Profesor/{id}/editar', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('Profesor/{id}/update', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('Profesor/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');



