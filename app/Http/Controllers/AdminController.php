<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredMail;


class AdminController extends Controller
{
    //membuat class yang di akan dipanggil oleh route ketika 
    //yang login adalah admin
    public function AdminDashboard(Request $request)
    {
        // Gunakan DB facade untuk membangun query
        $userDiagram = DB::table('users')
            ->selectRaw('count(id) as count, DATE_FORMAT(created_at, "%Y-%M") as month')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Siapkan data untuk dilewatkan ke view
        $data_diagram['months'] = $userDiagram->pluck('month');
        $data_diagram['counts'] = $userDiagram->pluck('count');

        // Kembalikan view dengan data yang diperlukan
        return view('admin.index', $data_diagram);
    }


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    public function AdminLogin(Request $request)
    {
        return view('admin.admin_login');
    }

    public function admin_profile(Request $request)
    {
        // echo "berhasil"; die();

        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function admin_profile_update(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|min:6',  // nullable means optional
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // example validation for photo upload
        ]);


        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->email = trim($request->email);
        // $user->password =trim($request->password);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        // $user->photo =trim($request->photo);
        if (!empty($request->file('photo'))) {
            $file = $request->file('photo');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('uploud/', $filename);
            $user->photo = $filename;
        }
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);
        $user->about = trim($request->about);
        $user->website = trim($request->website);
        $user->save();

        return redirect('admin/profile')->with('success', 'Profil Update Sukses Woiiiiiiiiiiii');
    }

    public function admin_users(Request $request)
    {
        // echo "string"; die();
        $data['getRecord'] = User::getRecord($request);
        return view('admin.users.list', $data);
    }

    public function admin_users_view($id)
    {
        // echo "string";die();
        $dataView['getRecord'] = User::find($id);
        return view('admin.users.view', $dataView);
    }

    public function admin_users_add(Request $request)
    {
        // echo "coba";die();
        return view('admin.users.add_users');
    }

    public function admin_users_add_post(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'role' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Kolom Nama harus diisi.',
            'username.required' => 'Kolom Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Kolom Email harus diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'phone.required' => 'Kolom Phone harus diisi.',
            'phone.unique' => 'Nomor telepon sudah terdaftar.',
            'role.required' => 'Kolom Role harus dipilih.',
            'status.required' => 'Kolom Status harus dipilih.',
        ]);


        // Buat objek User baru dan simpan ke database
        $newUser = new User();
        $newUser->name = trim($request->input('name'));
        $newUser->username = trim($request->input('username'));
        $newUser->email = trim($request->input('email'));
        $newUser->phone = trim($request->input('phone'));
        $newUser->role = $request->input('role');
        $newUser->status = $request->input('status');
        $newUser->remember_token = Str::random(50);
        $newUser->save();

        Mail::to($newUser->email)->send(new RegisteredMail($newUser));

        // Redirect dengan pesan sukses
        return redirect('admin/users/add')->with('success', 'User berhasil ditambahkan');
    }
}
