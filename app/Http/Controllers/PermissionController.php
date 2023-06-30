<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }
    public function create(){
        return view('permissions.create');
    }

    public function store(Request $request){

        $permission = Permission::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('permissions.index');
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
    }
    
    public function update(Request $request, $id){
        $permission = Permission::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=> $request->description,
        ]);

        return redirect()->route('permissions.index');
    }

    public function show($id){
        $permission = Permission::find($id);
        return view('permissions.show', compact('permission'));
    }


    public function destroy($id){

        $permission = Permission::find($id);
        $permission->delete();

        return back();
    }
}
