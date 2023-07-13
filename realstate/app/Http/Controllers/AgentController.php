<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function AgentDshboard(){
        return view('agent.agent_dashboard');
    }
    //
}
