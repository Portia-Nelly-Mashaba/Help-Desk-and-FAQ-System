<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelDashboard extends Controller
{
    public function home()
    { 
        //return view('admin.home'); 
        
        return view('admin.dashboard'); 

        //return view('admin.category.new_categories');
    }
}
