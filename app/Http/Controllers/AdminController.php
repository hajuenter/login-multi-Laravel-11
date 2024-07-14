<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword as RequestsResetPassword; // Menggunakan class RequestsResetPassword dari namespace App\Http\Requests\ResetPassword
use Illuminate\Http\Request; // Menggunakan class Request dari Illuminate\Http
use Illuminate\Support\Facades\Auth; // Menggunakan facade Auth dari Illuminate\Support\Facades
use App\Models\User; // Menggunakan model User dari namespace App\Models
use Illuminate\Support\Facades\Hash; // Menggunakan facade Hash dari Illuminate\Support\Facades
use Illuminate\Support\Str; // Menggunakan class Str dari Illuminate\Support
use Illuminate\Support\Facades\DB; // Menggunakan facade DB dari Illuminate\Support\Facades
use Illuminate\Support\Facades\Mail; // Menggunakan facade Mail dari Illuminate\Support\Facades
use App\Mail\RegisteredMail; // Menggunakan class RegisteredMail dari namespace App\Mail

class AdminController extends Controller
{
    // Method untuk menampilkan dashboard admin
    public function AdminDashboard(Request $request)
    {
        // Mengambil data diagram dari tabel users menggunakan DB facade
        $userDiagram = DB::table('users')
            ->selectRaw('count(id) as count, DATE_FORMAT(created_at, "%Y-%M") as month')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Persiapkan data diagram untuk dikirimkan ke view
        $data_diagram['months'] = $userDiagram->pluck('month');
        $data_diagram['counts'] = $userDiagram->pluck('count');

        // Kembalikan view admin.index dengan data diagram
        return view('admin.index', $data_diagram);
    }

    // Method untuk logout admin
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout(); // Logout user dari guard 'web'
        $request->session()->invalidate(); // Invalidasi session
        $request->session()->regenerateToken(); // Regenerate token session

        // Redirect ke halaman admin/login setelah logout
        return redirect('admin/login');
    }

    // Method untuk menampilkan halaman login admin
    public function AdminLogin(Request $request)
    {
        return view('admin.admin_login'); // Tampilkan view admin.admin_login
    }

    // Method untuk menampilkan profil admin
    public function admin_profile(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id); // Ambil data user yang sedang login
        return view('admin.admin_profile', $data); // Tampilkan view admin.admin_profile dengan data user
    }

    // Method untuk mengupdate profil admin
    public function admin_profile_update(Request $request)
    {
        // Validasi input form
        $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data user sesuai input form
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if (!empty($request->file('photo'))) {
            $file = $request->file('photo');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename); // Simpan file upload ke direktori 'upload/'
            $user->photo = $filename;
        }
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);
        $user->about = trim($request->about);
        $user->website = trim($request->website);
        $user->save(); // Simpan perubahan data user

        // Redirect ke halaman admin/profile dengan pesan sukses
        return redirect('admin/profile')->with('success', 'Profil Update Sukses Woiiiiiiiiiiii');
    }

    // Method untuk menampilkan daftar pengguna (users) admin
    public function admin_users(Request $request)
    {
        $data['getRecord'] = User::getRecord($request); // Ambil data pengguna sesuai request
        return view('admin.users.list', $data); // Tampilkan view admin.users.list dengan data pengguna
    }

    // Method untuk menampilkan detail pengguna admin
    public function admin_users_view($id)
    {
        $dataView['getRecord'] = User::find($id); // Ambil data pengguna berdasarkan ID
        return view('admin.users.view', $dataView); // Tampilkan view admin.users.view dengan data pengguna
    }

    // Method untuk menampilkan halaman tambah pengguna admin
    public function admin_users_add(Request $request)
    {
        return view('admin.users.add_users'); // Tampilkan view admin.users.add_users
    }

    // Method untuk menambahkan pengguna admin ke database
    public function admin_users_add_post(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'role' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Kolom Nama harus diisi.',
            'username.required' => 'Kolom Username harus diisi.',
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
        $newUser->save(); // Simpan data pengguna baru ke database

        Mail::to($newUser->email)->send(new RegisteredMail($newUser)); // Kirim email notifikasi pendaftaran

        // Redirect ke halaman admin/users/add dengan pesan sukses
        return redirect('admin/users/add')->with('success', 'User berhasil ditambahkan');
    }

    // Method untuk menampilkan halaman set password baru
    public function set_password_baru($token) {
        $datatoken['token'] = $token; // Mendapatkan data token
        return view('auth.set_password_baru', $datatoken); // Tampilkan view auth.set_password_baru dengan data token
    }

    // Method untuk mengatur password baru dari pengguna dengan token
    public function set_password_baru_post($token, RequestsResetPassword $request) {
        $user = User::where('remember_token', $token)->first(); // Cari pengguna berdasarkan token
    
        if(!$user) {
            abort(403); // Jika pengguna tidak ditemukan, hentikan proses dengan HTTP status 403
        }
    
        $user->password = Hash::make($request->password); // Enkripsi password baru
        $user->remember_token = Str::random(50); // Buat remember token baru
        $user->status = 'active'; // Ubah status pengguna menjadi aktif jika diperlukan
        $user->save(); // Simpan perubahan
    
        return redirect('admin/login')->with('success', 'Password baru berhasil ditambahkan'); // Redirect ke halaman admin/login dengan pesan sukses
    }
}
