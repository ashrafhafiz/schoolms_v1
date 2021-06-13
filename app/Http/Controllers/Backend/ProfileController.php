<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $data['user'] = User::find(Auth::user()->id);
        // dd($data);
        return view('backend.profile.index', $data);
    }

    public function ProfileEdit()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('backend.profile.edit', $data);
    }

    public function ProfileUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if (!($request->email == $user->email)) {
            $request->validate([
                'email' => ['required', 'unique:users'],
            ]);
            $user->email = $request->email;
        }

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('storage/' . $user->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/profile-photos'), $filename);
            $user->profile_photo_path = 'profile-photos/' . $filename;
            $user->image = $filename;
        }

        $user->save();

        $notification = array('message' => 'User profile updated successfully!', 'alert-type' => 'info');
        return redirect()->route('profile.view')->with($notification);
    }

    public function ProfilePasswordView()
    {
        return view('backend.password.index');
    }

    public function ProfilePasswordUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed']
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array('message' => 'Password updated successfully!', 'alert-type' => 'info');
            return redirect()->route('login')->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
