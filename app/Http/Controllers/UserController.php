<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('auth.index', compact('users'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('auth.edit',compact('user','roles'));
    }
    public function update(Request $request, $id){

        $user = User::where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::find($id);

        $roles = $request->role_id;

        $user->roles()->sync($roles);

        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function viewAssignRoleToUser($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('auth.users.viewAssignRoleToUser',compact('user','roles'));
    }

    public function assignRoleToUser(Request $request, $id){
        $user = User::find($id);
        $roles = $request->role_id;

        foreach ($roles as $key => $role) {
            if (!empty($roles)) {
                $user->roles()->sync($role);
            }
        }

        return redirect()->route('users.index');
    }
}
