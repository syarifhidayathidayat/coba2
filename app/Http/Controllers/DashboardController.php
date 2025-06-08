<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }
}
// This controller handles the dashboard functionality of the application.  
