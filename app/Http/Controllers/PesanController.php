<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmailModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeEmailMail;

class PesanController extends Controller {

    public function pesan_compose() {
        // echo "WOIII"; die();
        $datapesan['getEmail'] = User::where('role', 'agent')
        ->orWhere('role', 'user')
        ->get();
        return view('admin.email.compose', $datapesan);
    }

    public function pesan_compose_post(Request $request) {
        // dd($request->all());

        $save = new ComposeEmailModel;
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->deskripsi = trim($request->deskripsi);
        $save->save();

        //email start
        $getUserEmail = User::where('id', '=', $request->user_id)->first();
        Mail::to($getUserEmail->email)->cc($request->cc_email)->send(new ComposeEmailMail($save));
        //email end

        return redirect('admin/pesan/compose')->with('success', 'Pesan sukses terkirim');
    }

    public function pesan_kirim(Request $request) {
        // echo "coba";die();
        $datainbox['getRecord'] = ComposeEmailModel::get();
        return view('admin.email.inbox', $datainbox);

    }

    public function admin_email_kirim_hapus(Request $request) {
        if (!empty($request->id)) {
            $option = explode(',', $request->id);
            foreach ($option as $id) {
                if (!empty($id)) {
                    $getRecord = ComposeEmailModel::find($id);
                    $getRecord->delete();
                    }
                }
            }
        return redirect()->back()->with('success', 'Pesan berhasil dihapus');
    }

    public function admin_pesan_baca($id, Request $request) {
        //echo $id;die();
        $datapesan['getRecord'] = ComposeEmailModel::find($id);
        return view('admin.email.read', $datapesan);
    }

    public function admin_pesan_baca_hapus($id, Request $request) {
        $hapusbacapesan = ComposeEmailModel::find($id);
    
        if (!$hapusbacapesan) {
            return redirect()->back()->with('error', 'Pesan tidak ditemukan.');
        }
    
        $hapusbacapesan->delete();
    
        return redirect('admin/pesan/kirim')->with('success', 'Pesan berhasil dihapus');
    }

}