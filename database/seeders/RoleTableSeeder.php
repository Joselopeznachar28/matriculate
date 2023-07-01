<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systemAdmin = Role::create([
            'name' => 'SystemAdmin',
        ]);
        $teacher = Role::create([
            'name' => 'Teacher',
        ]);

            //USUARIOS
            $usersIndex = Permission::create([
                'name' => 'socios.index',
                'description' => 'Listado de Usuario'
            ])->syncRoles([$systemAdmin]);

            $usersCreate = Permission::create([
                'name' => 'socios.create',
                'description' => 'Crear Usuario',
            ])->syncRoles([$systemAdmin]);

            $usersShow = Permission::create([
                'name' => 'socios.show',
                'description' => 'Detalles Usuario',
            ])->syncRoles([$systemAdmin]);

            $usersEdit = Permission::create([
                'name' => 'socios.edit',
                'description' => 'Editar Usuario',
            ])->syncRoles([$systemAdmin]);

            $usersDestroy = Permission::create([
                'name' => 'socios.destroy',
                'description' => 'Eliminar Usuario',
            ])->syncRoles([$systemAdmin]);

            $generateUser = Permission::create([
                'name' => 'generateUserTeacher',
                'description' => 'Generar Usuario',
            ])->syncRoles([$systemAdmin]);

            //MATERIAS
            $subjectsIndex = Permission::create([
                'name' => 'subjects.index',
                'description' => 'Listar Materia',
            ])->syncRoles([$systemAdmin]);

            $subjectsCreate = Permission::create([
                'name' => 'subjects.create',
                'description' => 'Crear Materia',
            ])->syncRoles([$systemAdmin]);

            $subjectsEdit = Permission::create([
                'name' => 'subjects.edit',
                'description' => 'Editar Materia',
            ])->syncRoles([$systemAdmin]);

            $subjectsDestroy = Permission::create([
                'name' => 'subjects.destroy',
                'description' => 'Eliminar Materia',
            ])->syncRoles([$systemAdmin]);

            $asigneSubjectToTeacherView = Permission::create([
                'name' => 'teachers.asigneSubjectToTeacherView',
                'description' => 'Asignar Materia',
            ])->syncRoles([$systemAdmin]);

            $subjectYear = Permission::create([
                'name' => 'teachers.subjectYear',
                'description' => 'Asignar Materia',
            ])->syncRoles([$systemAdmin]);

            //ESTUDIANTES
            $studentsIndex = Permission::create([
                'name' => 'students.index',
                'description' => 'Listar Estudiante',
            ])->syncRoles([$systemAdmin]);

            $studentsCreate = Permission::create([
                'name' => 'students.create',
                'description' => 'Crear Estudiante',
            ])->syncRoles([$systemAdmin]);

            $studentsEdit = Permission::create([
                'name' => 'students.edit',
                'description' => 'Editar Estudiante',
            ])->syncRoles([$systemAdmin]);

            //FICHAS DE ESTUDIANTES
            $recordsStudentsIndex = Permission::create([
                'name' => 'student_records.index',
                'description' => 'Listar Ficha de Estudiante',
            ])->syncRoles([$systemAdmin]);

            $recordsStudentsCreate = Permission::create([
                'name' => 'student_records.create',
                'description' => 'Crear Ficha de Estudiante',
            ])->syncRoles([$systemAdmin]);

            $recordsStudentsEdit = Permission::create([
                'name' => 'student_records.edit',
                'description' => 'Editar Ficha de Estudiante',
            ])->syncRoles([$systemAdmin]);

            $recordsStudentsConstanciaEstudio = Permission::create([
                'name' => 'student_records.proof_of_study',
                'description' => 'Constancia de Estudio',
            ])->syncRoles([$systemAdmin]);

            $recordsStudentsConstanciaInscripcion = Permission::create([
                'name' => 'student_records.proof_of_registration',
                'description' => 'Constancia de Inscripcion',
            ])->syncRoles([$systemAdmin]);

            //PROFESORES
            $lapsosIndex = Permission::create([
                'name' => 'lapsos.index',
                'description' => 'Listar Profesores',
            ])->syncRoles([$systemAdmin]);

            $lapsosCreate = Permission::create([
                'name' => 'lapsos.create',
                'description' => 'Crear Profesores',
            ])->syncRoles([$systemAdmin]);

            $lapsosEdit = Permission::create([
                'name' => 'lapsos.edit',
                'description' => 'Editar Profesores',
            ])->syncRoles([$systemAdmin]);

            $lapsosChangeStatus = Permission::create([
                'name' => 'changeStatus',
                'description' => 'Cambiar Status para cargar Notas',
            ])->syncRoles([$systemAdmin]);

            $uploadNotes = Permission::create([
                'name' => 'lapso_schools.uploadNotes',
                'description' => 'Cargar Notas',
            ])->syncRoles([$systemAdmin,$teacher]);

            //Seccion
            $sectionsIndex = Permission::create([
                'name' => 'sections.index',
                'description' => 'Listar Seccion',
            ])->syncRoles([$systemAdmin]);

            $sectionssCreate = Permission::create([
                'name' => 'sections.create',
                'description' => 'Crear Seccion',
            ])->syncRoles([$systemAdmin]);

            $sectionsEdit = Permission::create([
                'name' => 'sections.edit',
                'description' => 'Editar Seccion',
            ])->syncRoles([$systemAdmin]);

            $asigneSections = Permission::create([
                'name' => 'sections.asigneSection',
                'description' => 'Asignar Secciones',
            ])->syncRoles([$systemAdmin]);

            $asignarSeccionStudents = Permission::create([
                'name' => 'sections.asigneSectionToStudents',
                'description' => 'Cargar Notas',
            ])->syncRoles([$systemAdmin]);
    }
}
