<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function render_dashboard_page(){
        return view('admin.dashboard');
    }
}
