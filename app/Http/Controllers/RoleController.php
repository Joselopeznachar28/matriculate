<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }
    public function create(){
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request){

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        $permissions = $request->permission_id;

        foreach ($permissions as $permission) {
            if ($permissions) {
                $role->permissions()->attach($permission);
            }
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index');

    }

    public function edit($id){
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('roles.edit', compact('role','permissions'));
    }

    public function show($id){
        $role = Role::find($id)->load('permissions');
        return view('roles.show', compact('role'));
    }

    public function update(Request $request, $id){

        $role = Role::where('id', '=', $id )->update([
            'name' => $request->name,
        ]);

        $role = Role::find($id);

        $permissions = $request->permission_id;

        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index');

    }

    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return back();
    }
    
}
