<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(5);

        return view('auth.index', compact('users','search'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(UsersRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        notify()->success('El usuario ' . "'$user->name'" . ' ha sido creado exitosamente!', 'Creado');
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
        notify()->success('El usuario ' . "'$user->name'" . ' ha sido editado exitosamente!', 'Editado');
        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        notify()->success('El usuario ' . "'$user->name'" . ' ha sido eliminado exitosamente!', 'Eliminado');
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

        notify()->success('Los roles del usuario ' . "'$user->name'" . ' han sido asignados exitosamente!', 'Exitoso');
        return redirect()->route('users.index');
    }
}
