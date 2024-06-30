<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //membuat class yang di akan dipanggil oleh route ketika 
    //yang login adalah admin
    public function AdminDashboard(Request $request) {
        //mengembalikan atau memberi view dengan mengambil
        //di resource lalu views lalu folder admin lalu buat file
        //dengan nama admin_dashboard.blade.php
        return view('admin.admin_dashboard');
    }
}
