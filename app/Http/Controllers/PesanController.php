<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Menggunakan class Request dari Illuminate\Http
use App\Models\User; // Menggunakan model User dari namespace App\Models\User
use App\Models\ComposeEmailModel; // Menggunakan model ComposeEmailModel dari namespace App\Models\ComposeEmailModel
use Illuminate\Support\Facades\Mail; // Menggunakan facade Mail dari Illuminate\Support\Facades
use App\Mail\ComposeEmailMail; // Menggunakan class ComposeEmailMail dari namespace App\Mail

class PesanController extends Controller {

    // Method untuk menampilkan halaman compose email
    public function pesan_compose() {
        // Mendapatkan data email pengguna dengan role 'agent' atau 'user'
        $datapesan['getEmail'] = User::where('role', 'agent')
            ->orWhere('role', 'user')
            ->get();

        // Mengembalikan view admin.email.compose dengan data email yang didapat
        return view('admin.email.compose', $datapesan);
    }

    // Method untuk mengirim email setelah compose
    public function pesan_compose_post(Request $request) {
        // Validasi dan simpan data dari form compose email
        $save = new ComposeEmailModel;
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->deskripsi = trim($request->deskripsi);
        $save->save();

        // Mengirim email menggunakan Mail facade
        $getUserEmail = User::where('id', '=', $request->user_id)->first();
        Mail::to($getUserEmail->email)->cc($request->cc_email)->send(new ComposeEmailMail($save));

        // Redirect ke halaman compose dengan pesan sukses
        return redirect('admin/pesan/compose')->with('success', 'Pesan sukses terkirim');
    }

    // Method untuk menampilkan halaman inbox email
    public function pesan_kirim(Request $request) {
        // Mendapatkan semua record email dari ComposeEmailModel
        $datainbox['getRecord'] = ComposeEmailModel::get();
        
        // Mengembalikan view admin.email.inbox dengan data record email
        return view('admin.email.inbox', $datainbox);
    }

    // Method untuk menghapus email dari kotak kirim
public function admin_email_kirim_hapus(Request $request) {
    // Memproses penghapusan email berdasarkan ID yang diterima dari request
    if (!empty($request->id)) {
        // Memisahkan ID-email yang diterima menjadi array menggunakan koma sebagai delimiter
        $option = explode(',', $request->id);
        
        // Melakukan iterasi untuk setiap ID yang dipisahkan
        foreach ($option as $id) {
            // Memeriksa apakah ID tidak kosong
            if (!empty($id)) {
                // Mencari record email berdasarkan ID menggunakan model ComposeEmailModel
                $getRecord = ComposeEmailModel::find($id);
                
                // Jika record email ditemukan
                if ($getRecord) {
                    $getRecord->delete(); // Menghapus record email dari database
                }
            }
        }
    }

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses setelah email berhasil dihapus
    return redirect()->back()->with('success', 'Pesan berhasil dihapus');
}


    // Method untuk membaca email dari kotak kirim
    public function admin_pesan_baca($id, Request $request) {
        // Menampilkan detail email berdasarkan ID yang diterima
        $datapesan['getRecord'] = ComposeEmailModel::find($id);
        
        // Mengembalikan view admin.email.read dengan data detail email
        return view('admin.email.read', $datapesan);
    }

    // Method untuk menghapus email setelah dibaca dari kotak kirim
    public function admin_pesan_baca_hapus($id, Request $request) {
        // Menghapus email dari kotak kirim berdasarkan ID yang diterima
        $hapusbacapesan = ComposeEmailModel::find($id);
    
        if (!$hapusbacapesan) {
            // Redirect dengan pesan error jika email tidak ditemukan
            return redirect()->back()->with('error', 'Pesan tidak ditemukan.');
        }
    
        // Menghapus email dan redirect dengan pesan sukses
        $hapusbacapesan->delete();
        return redirect('admin/pesan/kirim')->with('success', 'Pesan berhasil dihapus');
    }

}
