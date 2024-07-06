<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PesanController extends Controller {

    public function pesan_compose() {
        // echo "WOIII"; die();
        return view('admin.email.compose');
    }

    public function pesan_compose_post(Request $request) {

        dd($request->all());
    }

}