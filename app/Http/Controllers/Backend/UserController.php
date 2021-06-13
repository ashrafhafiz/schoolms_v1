<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UsersView()
    {
        $data['users'] = User::all();
        return view('backend.users.index', $data);
    }

    public function UsersCreate()
    {
        $data['roles'] = Role::all();
        return view('backend.users.create', $data);
    }

    public function UsersStore(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'usertype' => $request->usertype,
        ]);

        // $user->roles()->sync($request->roles);

        $notification = array('message' => 'User created successfully!', 'alert-type' => 'success');
        return redirect()->route('users.view')->with($notification);
    }

    public function UsersEdit($id)
    {
        $data['user'] = User::find($id);
        $data['roles'] = Role::all();
        return view('backend.users.edit', $data);
    }

    public function UsersUpdate($id, Request $request)
    {
        $user = User::findOrFail($id);

        if ($request->email == $user->email) {
            $user->update($request->except(['email']));
        } else {
            $request->validate([
                'email' => ['required', 'unique:users'],
            ]);
            $user->update($request->only(['name', 'email', 'usertype']));
        }

        $notification = array('message' => 'User updated successfully!', 'alert-type' => 'info');
        return redirect()->route('users.view')->with($notification);
    }

    public function UsersDelete($id)
    {
        User::destroy($id);

        $notification = array('message' => 'User delete successfully!', 'alert-type' => 'info');
        return redirect()->route('users.view')->with($notification);
    }
}
