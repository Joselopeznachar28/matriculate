<?php

use App\Http\Controllers\AcademicPeriodController;
use App\Http\Controllers\LapsoSchoolController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRecordController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\StudentRecord;
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
Route::get('Dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('Usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('Crear-Usuario', [UserController::class, 'create'])->name('users.create');
Route::post('Crear-Usuario', [UserController::class, 'store'])->name('users.store');
Route::get('Editar-Usuario/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('Editar-Usuario/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::delete('Eliminar-Usuario/{id}', [UserController::class, 'destroy'])->name('users.destroy');

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
Route::get('Estudiantes/Detalles/{id}', [StudentController::class, 'show'])->name('students.show');
Route::post('Estudiantes', [StudentController::class, 'store'])->name('students.store');
Route::get('Estudiantes/{id}/editar', [StudentController::class, 'edit'])->name('students.edit');
Route::put('Estudiantes/{id}/update', [StudentController::class, 'update'])->name('students.update');
//Student Records
Route::get('Fichas-de-estudiantes', [StudentRecordController::class, 'index'])->name('student_records.index');
Route::get('Ficha-de-estudiante/crear/{id}', [StudentRecordController::class, 'create'])->name('student_records.create');
Route::get('Ficha-de-estudiante/detalles/{id}', [StudentRecordController::class, 'show'])->name('student_records.show');
Route::post('Ficha-de-estudiante', [StudentRecordController::class, 'store'])->name('student_records.store');
Route::get('Ficha-de-estudiante/{id}/editar', [StudentRecordController::class, 'edit'])->name('student_records.edit');
Route::put('Ficha-de-estudiante/{id}/update', [StudentRecordController::class, 'update'])->name('student_records.update');
//pdf para constancias
Route::get('Constancia-de-estudio/{id}', [StudentRecordController::class, 'proof_of_study'])->name('student_records.proof_of_study');
Route::get('Constancia-de-inscripcion/{id}', [StudentRecordController::class, 'proof_of_registration'])->name('student_records.proof_of_registration');
Route::get('Boletin-de-estudio/{id}', [StudentRecordController::class, 'bulletin'])->name('student_records.bulletin');
//Teachers
Route::get('Profesor', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('Profesor/crear', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('Profesor', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('Profesor/{id}/editar', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('Profesor/{id}/update', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('Profesor/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
//generar usuario
Route::post('ProfesorUsuario/{id}', [TeacherController::class, 'generateUserTeacher'])->name('teachers.generateUserTeacher');
//asignar materias al profesor
Route::get('Asignacion-de-materias', [TeacherController::class, 'asigneSubjectToTeacherView'])->name('teachers.asigneSubjectToTeacherView');
Route::get('Materias-por-años/{id}', [TeacherController::class, 'subjectYear'])->name('teachers.subjectYear');
Route::post('Asignacion-de-materias/{id}', [TeacherController::class, 'asigneSubjectToTeacher'])->name('teachers.asigneSubjectToTeacher');
//Periodo Academico
Route::get('PeriodoAcademico', [AcademicPeriodController::class, 'index'])->name('academic_period.index');
Route::get('PeriodoAcademico/create', [AcademicPeriodController::class, 'create'])->name('academic_period.create'); 
Route::post('PeriodoAcademico', [AcademicPeriodController::class, 'store'])->name('academic_period.store'); 
Route::get('PeriodoAcademico/Editar/{id}', [AcademicPeriodController::class, 'edit'])->name('academic_period.edit'); 
Route::put('PeriodoAcademico/{id}', [AcademicPeriodController::class, 'update'])->name('academic_period.update'); 
//Lapsos (por años)
Route::get('Lapsos', [LapsoSchoolController::class, 'index'])->name('lapso_schools.index');
Route::get('AñadirLapso/create/{id}', [LapsoSchoolController::class, 'create'])->name('lapso_schools.create'); 
Route::post('AñadirLapso', [LapsoSchoolController::class, 'store'])->name('lapso_schools.store'); 
Route::get('changeStatus', [LapsoSchoolController::class, 'changeStatus'])->name('changeStatus');
//Seccion (por Materia)
Route::get('Seccion', [SectionController::class, 'index'])->name('sections.index');
Route::get('Seccion/crear', [SectionController::class, 'create'])->name('sections.create');
Route::post('Seccion', [SectionController::class, 'store'])->name('sections.store');
//Carga Academica y de notas
Route::get('Carga-Academica', [TeacherController::class, 'academic_charge'])->name('academic_charge.index'); 
Route::get('Carga-de-Notas/{year_school_id}/{subject_id}/{section_id}', [TeacherController::class, 'notes_charge'])->name('notes_charge'); 
Route::post('Carga-de-Notas', [TeacherController::class, 'notes_charge_store'])->name('notes_charge.store'); 
//roles
Route::get('Roles', [RoleController::class,'index'])->name('roles.index');
Route::get('Roles/Crear', [RoleController::class,'create'])->name('roles.create');
Route::post('Roles', [RoleController::class,'store'])->name('roles.store');
Route::get('Roles/Editar/{id}', [RoleController::class,'edit'])->name('roles.edit');
Route::put('Roles/{id}', [RoleController::class,'update'])->name('roles.update');
Route::get('Roles/Detalles/{id}', [RoleController::class,'show'])->name('roles.show');
Route::delete('Roles/{id}', [RoleController::class,'destroy'])->name('roles.destroy');
Route::get('AsignandoRol/{id}', [UserController::class,'viewAssignRoleToUser'])->name('users.viewAssignRoleToUser');
Route::post('AsignandoRol/{id}', [UserController::class,'assignRoleToUser'])->name('users.assignRoleToUser');
//permissions
Route::get('Permisos', [PermissionController::class,'index'])->name('permissions.index');
Route::get('Permisos/Crear', [PermissionController::class,'create'])->name('permissions.create');
Route::post('Permisos', [PermissionController::class,'store'])->name('permissions.store');
Route::get('Permisos/Editar/{id}', [PermissionController::class,'edit'])->name('permissions.edit');
Route::put('Permisos/{id}', [PermissionController::class,'update'])->name('permissions.update');
Route::get('Permisos/Detalles/{id}', [PermissionController::class,'show'])->name('permissions.show');
Route::delete('Permisos/{id}', [PermissionController::class,'destroy'])->name('permissions.destroy');



