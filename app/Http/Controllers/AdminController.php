<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //membuat class yang di akan dipanggil oleh route ketika 
    //yang login adalah admin
    public function AdminDashboard(Request $request) {
        //mengembalikan atau memberi view dengan mengambil
        //di resource lalu views lalu folder admin lalu buat file
        //dengan nama admin_dashboard.blade.php
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
}
