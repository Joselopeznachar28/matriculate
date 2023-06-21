<?php

use App\Http\Controllers\AcademicPeriodController;
use App\Http\Controllers\LapsoSchoolController;
use App\Http\Controllers\SectionController;
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
//Periodo Academico
Route::get('PeriodoAcademico', [AcademicPeriodController::class, 'index'])->name('academic_period.index');
Route::get('PeriodoAcademico/create', [AcademicPeriodController::class, 'create'])->name('academic_period.create'); 
Route::post('PeriodoAcademico', [AcademicPeriodController::class, 'store'])->name('academic_period.store'); 
//Lapsos (por años)
Route::get('Lapsos', [LapsoSchoolController::class, 'index'])->name('lapso_schools.index');
Route::get('AñadirLapso/create/{id}', [LapsoSchoolController::class, 'create'])->name('lapso_schools.create'); 
Route::post('AñadirLapso', [LapsoSchoolController::class, 'store'])->name('lapso_schools.store'); 
//Seccion (por Materia)
Route::get('Seccion', [SectionController::class, 'index'])->name('sections.index');
Route::get('Seccion/crear', [SectionController::class, 'create'])->name('sections.create'); 
Route::post('Seccion', [SectionController::class, 'store'])->name('sections.store'); 



