<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function AgentController(Request $request) {
        //mengembalikan atau memberi view dengan mengambil
        //di resource lalu views lalu folder agent lalu buat file
        //dengan nama agent_dashboard.blade.php
        return view('agent.agent_dashboard');
    }
}
