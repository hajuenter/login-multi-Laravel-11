<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //membuat class yang di akan dipanggil oleh route ketika 
    //yang login adalah admin
    public function AdminDashboard(Request $request) {
        //mengembalikan atau memberi view dengan mengambil
        //di resource lalu views lalu folder admin lalu buat file
        //dengan nama index.blade.php yang mengambil secsion dari admin
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    public function AdminLogin(Request $request) {
        return view('admin.admin_login');
    }

    public function admin_profile(Request $request) {
        // echo "berhasil"; die();

        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function admin_profile_update(Request $request) {
        $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|min:6',  // nullable means optional
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // example validation for photo upload
        ]);


        $user = User::find(Auth::user()->id);
        $user->name =trim($request->name);
        $user->username =trim($request->username);
        $user->email =trim($request->email);
       // $user->password =trim($request->password);
       if(!empty($request->password)) {
        $user->password = Hash::make($request->password);
       }
       // $user->photo =trim($request->photo);
       if(!empty($request->file('photo'))) {
        $file = $request->file('photo');
        $randomStr = Str::random(30);
        $filename = $randomStr .'.'.$file->getClientOriginalExtension();
        $file->move('uploud/', $filename);
        $user->photo = $filename;

       }
        $user->phone =trim($request->phone);
        $user->address =trim($request->address);
        $user->about =trim($request->about);
        $user->website =trim($request->website);
        $user->save();
        
        return redirect('admin/profile')->with('success', 'Profil Update Sukses Woiiiiiiiiiiii');
    }

    public function admin_users(Request $request) {
        // echo "string"; die();
        $data['getRecord'] = User::getRecord();
        return view('admin.users.list', $data);
    }

    public function admin_users_view($id) {
        // echo "string";die();
        $dataView['getRecord'] = User::find($id);
        return view('admin.users.view', $dataView);
    }

}
