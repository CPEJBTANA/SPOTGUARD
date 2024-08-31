<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewDashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            return redirect('admin/login');
        } elseif (Auth::user()->hasRole('Resident')) {
            return redirect()->route('resident.dashboard'); 
        }
    }
    
    public function __invoke(Request $request)
    {
        //
    }
}
