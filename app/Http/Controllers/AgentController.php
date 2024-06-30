<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    //membuat class yang di akan dipanggil oleh route ketika 
    //yang login adalah agent
    public function AgentDashboard(Request $request) {
        //mengembalikan atau memberi view dengan mengambil
        //di resource lalu views lalu folder agent lalu buat file
        //dengan nama agent_dashboard.blade.php
        return view('agent.agent_dashboard');
    }
}
