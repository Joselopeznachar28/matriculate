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
//pdf para constancias
Route::get('Constancia-de-estudio/{id}', [StudentController::class, 'proof_of_study'])->name('students.proof_of_study');
Route::get('Constancia-de-inscripcion/{id}', [StudentController::class, 'proof_of_registration'])->name('students.proof_of_registration');
//Teachers
Route::get('Profesor', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('Profesor/crear', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('Profesor', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('Profesor/{id}/editar', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('Profesor/{id}/update', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('Profesor/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
//Años (Grados)
Route::get('Año-Escolar', [TeacherController::class, 'index'])->name('school_years.index'); //Realizar
Route::get('Añadir-Año-Escolar', [TeacherController::class, 'create'])->name('school_years.create'); //Realizar
Route::post('Añadir-Año-Escolar', [TeacherController::class, 'store'])->name('school_years.store'); //Realizar
//Lapsos (por años)
Route::get('Lapsos', [TeacherController::class, 'index'])->name('school_lapso.index'); //Realizar
Route::get('Añadir-Lapso', [TeacherController::class, 'create'])->name('school_lapsos.create'); //Realizar
Route::post('Añadir-Lapso', [TeacherController::class, 'store'])->name('school_lapsos.store'); //Realizar
//Notas (por lapso)
Route::get('Añadir-Nota', [TeacherController::class, 'create'])->name('notes.create'); //Realizar
Route::post('Añadir-Nota', [TeacherController::class, 'store'])->name('notes.store'); //Realizar



