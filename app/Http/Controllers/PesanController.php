<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmailModel;

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

        return redirect('admin/pesan/compose')->with('success', 'Pesan sukses terkirim');
    }

}